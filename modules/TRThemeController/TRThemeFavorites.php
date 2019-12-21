<?php

class TRThemeFavorites {

    public static function isBeanFavorite($beanId) {
        global $db, $current_user;
        $favResult = $db->query("SELECT * FROM trfavorites WHERE beanid='$beanId' AND user_id='$current_user->id'");
//2013-02-15 MSSQL Support ... seemingly the new SQL Server version by Sugar does not support getRowCount
//if($db->getRowCount($favResult) > 0)
        if ($db->fetchByAssoc($favResult))
            return 1;
        else
            return 0;
    }

    public static function getFavoritesRaw($lastN = 10, $module = '') {
        global $current_user, $db, $beanFiles, $beanList;
        $favorites = array();

        $moduleWhere = '';
        if($module != '')
            $moduleWhere = " AND bean='$module' ";

        // 2013-02-15 add mssql support .. has issues with limit query
        if ($GLOBALS['db']->dbType == 'mssql')
            $favoritesRes = $db->query("SELECT TOP $lastN * FROM trfavorites WHERE user_id='$current_user->id' $moduleWhere ORDER BY 'date_entered' DESC");
        else
            $favoritesRes = $db->limitQuery("SELECT * FROM trfavorites WHERE user_id='$current_user->id' $moduleWhere ORDER BY 'date_entered' DESC", 0, $lastN);

        // 2013-02-15 add mssql support .. has issues with limit query
        $thisBean = null;
        if ($GLOBALS['db']->dbType == 'mssql' || $db->getRowCount($favoritesRes) > 0) {

            while ($thisFav = $db->fetchByAssoc($favoritesRes)) {
                if (!($thisBean instanceof $beanList[$thisFav['bean']])) {
                    $thisBean = BeanFactory::getBean($thisFav['bean']);
                }
                $thisBean->retrieve($thisFav['beanid']);

                $favorites[] = array(
                    'item_id' => $thisFav['beanid'],
                    'module_name' => $thisFav['bean'],
                    'item_summary' => $thisBean->name,
                    'item_summary_short' => substr($thisBean->name, 0, 15)
                );
				$thisBean = null;
				unset($thisBean);
            }
        }

        return $favorites;
    }

    public static function getFavorites($lastN = 10) {
        global $current_user, $db, $beanFiles, $beanList;

        $favorites = TRThemeFavorites::getFavoritesRaw(10, $_REQUEST['currentModule']);
        if(count($favorites) > 0)
        {
            $ss = new Sugar_Smarty();
            $ss->assign('items', $favorites);
            $ss->assign('title', 'Favorites');
            return $ss->fetch('modules/TRThemeController/tpls/TRGenericMenuItems.tpl');
        }

        return '';
    }

    public static function getFavoritesCountForSideBar($lastN = 10) {
       $favorites = TRThemeFavorites::getFavoritesRaw();
       return count($favorites);
    }

}