<?php

class TRThemeController {

    public function getPage() {
        global $current_user;
        $pages = $current_user->getPreference('pages', 'Home');
        // 2013-02-15 get language support
        $homeModString = return_module_language($GLOBALS['current_language'], 'Home');
        $pageArray = array('index' => $_REQUEST['pageIndex'], 'pageTitle' => (empty($pages[$_REQUEST['pageIndex']]['pageTitle']) ? $homeModString[$pages[$_REQUEST['pageIndex']]['pageTitleLabel']] : $pages[$_REQUEST['pageIndex']]['pageTitle']), 'numColumns' => $pages[$_REQUEST['pageIndex']]['numColumns']);

        return json_encode($pageArray);
    }

    public function setPage() {
        global $current_user;
        if ($_REQUEST['pageIndex'] == 'new') {
            $pages = $current_user->getPreference('pages', 'Home');
            $newPage = $pages[0];
            $newPage['pageTitle'] = $_REQUEST['pageTitle'];
            $newPage['numColumns'] = $_REQUEST['pageColumns'];
            // remove all dashlets we have
            for ($i = 0; $i < $newPage['numColumns']; $i++) {
                $newPage['columns'][$i]['width'] = round(100 / $newPage['numColumns'], 0) . '%';
                $newPage['columns'][$i]['dashlets'] = array();
            }

            $pages[] = $newPage;
            $current_user->setPreference('pages', $pages, 0, 'Home');

            return count($pages) - 1;
        } else {
            $pages = $current_user->getPreference('pages', 'Home');
            $pages[$_REQUEST['pageIndex']]['pageTitle'] = $_REQUEST['pageTitle'];
            $pages[$_REQUEST['pageIndex']]['numColumns'] = $_REQUEST['pageColumns'];

            // manage the Columns
            // if we add a column
            $currentColumns = count($pages[$_REQUEST['pageIndex']]['columns']);

            if ($pages[$_REQUEST['pageIndex']]['numColumns'] > count($pages[$_REQUEST['pageIndex']]['columns'])) {
                for ($i = 0; $i < $pages[$_REQUEST['pageIndex']]['numColumns']; $i++) {
                    $pages[$_REQUEST['pageIndex']]['columns'][$i]['width'] = round(100 / $pages[$_REQUEST['pageIndex']]['numColumns'], 0) . '%';
                    if (!isset($pages[$_REQUEST['pageIndex']]['columns'][$i]['dashlets']))
                        $pages[$_REQUEST['pageIndex']]['columns']['dashlets'][$i] = array();
                }
            }
            // if we remove columns
            elseif ($pages[$_REQUEST['pageIndex']]['numColumns'] < count($pages[$_REQUEST['pageIndex']]['columns'])) {
                // set the width to equal width
                for ($i = 0; $i < $pages[$_REQUEST['pageIndex']]['numColumns']; $i++) {
                    $pages[$_REQUEST['pageIndex']]['columns'][$i]['width'] = round(100 / $pages[$_REQUEST['pageIndex']]['numColumns'], 0) . '%';
                }

                // merge any dashlets
                for ($i = $pages[$_REQUEST['pageIndex']]['numColumns']; $i < count($pages[$_REQUEST['pageIndex']]['columns']); $i++) {
                    $pages[$_REQUEST['pageIndex']]['columns'][0]['dashlets'] = array_merge($pages[$_REQUEST['pageIndex']]['columns'][0]['dashlets'], $pages[$_REQUEST['pageIndex']]['columns'][$i]['dashlets']);
                    unset($pages[$_REQUEST['pageIndex']]['columns'][$i]);
                }
            }

            $current_user->setPreference('pages', $pages, 0, 'Home');

            return $_REQUEST['pageIndex'];
        }
    }

    public function addPage() {
        global $current_user;
        $pages = $current_user->getPreference('pages', 'Home');
        $newPage = $pages[0];
        $newPage['pageTitle'] = 'newPage ' . count($pages);
        // remove all dashlets we have
        foreach ($newPage['columns'] as $columnIndex => $columData)
            $newPage['columns'][$columnIndex]['dashlets'] = array();

        $pages[] = $newPage;
        $current_user->setPreference('pages', $pages, 0, 'Home');

        return count($pages) - 1;
    }

    public function changeGroup($focus) {
        global $current_user;
        $current_user->setPreference('theme_current_group', $_REQUEST['newGroup']);
        $current_user->incrementETag("mainMenuETag");
        // set the current module and echo the menu entries
        $focus->module = $_REQUEST['currentModule'];

        return $focus->displayHeader(true);
    }

    public function deletePage() {
        global $current_user;
        $pages = $current_user->getPreference('pages', 'Home');
        if ($_REQUEST['pageIndex'] != 0) {
            $pages[$_REQUEST['pageIndex']]['pageTitle'] = $_REQUEST['pageTitle'];
            $pages[$_REQUEST['pageIndex']]['numColumns'] = $_REQUEST['pageColumns'];

            unset($pages[$_REQUEST['pageIndex']]);

            $current_user->setPreference('pages', array_values($pages), 0, 'Home');
            $_SESSION['activePage'] = 0;
        }

        return count($pages);
    }

    public function getMenu($focus) {
        global $db, $current_user, $current_language;
        
        // since we need to load the mod strings manual do this here. 
        $mod_strings = return_module_language($current_language, 'TRThemeController');
        
        $focus->module = $_REQUEST['currentModule'];
        $thisMenu = $focus->getMenu();
        $menuStr = '';

        if (count($thisMenu) > 0) {
            $menuStr .= '<ul class="itemMenuMenu"><span class="itemMenuHeader">' . $mod_strings['LBL_SHORTCUTS'] . '</span>';

            if ($_REQUEST['currentModule'] == 'Home' && $_REQUEST['activeModule'] == 'Home') {
                $menuStr .= '<li onclick="SUGAR.mySugar.showDashletsDialog();">' . $mod_strings['LBL_ADD_DASHLET'] . '</li>
				<li onclick="twentyreasonstheme.addPage()">' . $mod_strings['LBL_ADD_PAGE'] . '</li>';
                $menuStr .= '<li><a href="#" onclick="twentyreasonstheme.showConfigSideBar();return false;">' . $mod_strings['LBL_CONFIG_SIDEBAR'] . '</a></li>';
            }


            foreach ($thisMenu as $menuItem) {
                $menuStr .= '<li>';
                $menuStr .= '<a href="' . $menuItem[0] . '">' . $menuItem[1] . '</a>';
                $menuStr .= '</li>';
            }
            $menuStr .= '</ul>';
        } else {
            if ($_REQUEST['currentModule'] == 'Home' && $_REQUEST['activeModule'] == 'Home') {
                $menuStr .= '<ul class="itemMenuMenu"><span class="itemMenuHeader">' . $mod_strings['LBL_SHORTCUTS'] . '</span>
				<li onclick="SUGAR.mySugar.showDashletsDialog();">' . $mod_strings['LBL_ADD_DASHLET'] . '</li>
				<li onclick="twentyreasonstheme.addPage()">' . $mod_strings['LBL_ADD_PAGE'] . '</li>';
                $menuStr .= '<li><a href="#" onclick="twentyreasonstheme.showConfigSideBar();return false;">' . $mod_strings['LBL_CONFIG_SIDEBAR'] . '</a></li>';
                $menuStr .= '</ul>';
            }
            else
                $menuStr = '';
        }

        $lvStr = '';
        if ($_REQUEST['currentModule'] != 'Home') {
            $lvStr = $this->getLastViewed($_REQUEST['currentModule']);
        } else {
            // instead of the last viewed we shopw the pages for the Home Module
            $lvStr = '<ul class="itemMenuLv"><span class="itemMenuHeader">' . $mod_strings['LBL_DESKTOPS'] . '</span>';
            global $current_user;
            $pages = $current_user->getPreference('pages', 'Home');
            foreach ($pages as $thisPageIndex => $thisPage) {
                // 2013-02-15 get language support
                $homeModString = return_module_language($GLOBALS['current_language'], 'Home');
                $lvStr .= '<li><a href="index.php?module=Home&action=index&activePage=' . $thisPageIndex . '">' . (empty($thisPage['pageTitle']) ? $homeModString[$thisPage['pageTitleLabel']] : $thisPage['pageTitle']) . '</a></li>';
            }
            $lvStr .= '</ul>';
        }
        require_once('modules/TRThemeController/TRThemeFavorites.php');
        $favStr = TRThemeFavorites::getFavorites();


        return json_encode(array('menu' => $menuStr, 'lastviewed' => $lvStr, 'favorites' => $favStr));
    }

    private function getLastViewed($module = '') {
        global $current_user, $current_language;
        
        // since we need to load the mod strings manual do this here. 
        $mod_strings = return_module_language($current_language, 'TRThemeController');
        
        // load the last viewe records from the Tracker
        require_once('modules/Trackers/Tracker.php');
        $tracker = new Tracker();
        $history = $tracker->get_recently_viewed($current_user->id, $module);
        if (count($history > 0)) {
            foreach ($history as $key => $row) {
                $history[$key]['item_summary_short'] = to_html(getTrackerSubstring($row['item_summary']));
                //$history[$key]['image'] = SugarThemeRegistry::current()->getImage($row['module_name'], 'border="0" align="absmiddle"', null, null, '.gif', $row['item_summary']);
            }
            $recentRecords = $history;

            $ss = new Sugar_Smarty();
            $ss->assign('items', $recentRecords);
            $ss->assign('title', $mod_strings['LBL_LASTVIEWED']);
            return $ss->fetch('modules/TRThemeController/tpls/TRGenericMenuItems.tpl');
        }
        return '';
    }

    public function removeReminder() {
        require_once('modules/TRThemeController/TRThemeReminders.php');
        $reminderclass = new TRThemeReminders();
        $reminderclass->removeReminder($_REQUEST['beanId']);

        require_once('modules/TRThemeController/TRSideBarWidgets/TRSideBarWidgetReminders.php');
        $remindersWidget = new TRSideBarWidgetReminders();
        return $remindersWidget->refresh();
    }

    public function resetPages() {
        global $current_user;
        $pages = $current_user->getPreference('pages', 'Home');
        if (count($pages > 1)) {
            $newPages = array();
            $newPages[] = $pages[0];
            $current_user->setPreference('pages', $newPages, 0, 'Home');
            $_SESSION['activePage'] = 0;
        }
    }

    public function setReminder() {
        require_once('modules/TRThemeController/TRThemeReminders.php');
        $reminderclass = new TRThemeReminders();
        $newReminders = $reminderclass->setReminder($_REQUEST['beanId'], $_REQUEST['beanmodule'], $_REQUEST['reminderDate']);

        require_once('modules/TRThemeController/TRSideBarWidgets/TRSideBarWidgetReminders.php');
        $remindersWidget = new TRSideBarWidgetReminders();
        return $remindersWidget->refresh();
    }

    public function toggleFavorite() {
        global $current_user, $db;
        if ($_REQUEST['favorite'] == '1') {
            //2013-02-15 MSSQL Support
            if ($GLOBALS['db']->dbType == 'mysql')
                $db->query("INSERT INTO trfavorites SET beanid='" . $_REQUEST['beanid'] . "', user_id='$current_user->id', bean='" . $_REQUEST['bean'] . "', date_entered=curdate()");
            else
                $db->query("INSERT INTO trfavorites (beanid, user_id, bean, date_entered) VALUES ('" . $_REQUEST['beanid'] . "', '$current_user->id', '" . $_REQUEST['bean'] . "', '" . gmdate('Y-m-d H:i:s') . "')");
        }
        else {
            $db->query("DELETE FROM trfavorites WHERE beanid='" . $_REQUEST['beanid'] . "' AND user_id='$current_user->id'");
        }
    }

    public function getQuickNotes() {
        require_once('modules/TRThemeController/TRThemeQuickNotes.php');
        return TRThemeQuickNotes::getQuickNotesForBean();
    }

    public function saveQuickNote() {
        require_once('modules/TRThemeController/TRThemeQuickNotes.php');
        return TRThemeQuickNotes::saveQuickNote();
	}
	public function editQuickNote(){
		require_once('modules/TRThemeController/TRThemeQuickNotes.php');
		return TRThemeQuickNotes::editQuickNote();
    }

    public function deleteQuickNote() {
        require_once('modules/TRThemeController/TRThemeQuickNotes.php');
        return TRThemeQuickNotes::deleteQuickNote();
    }

    public function setToggleFooterline() {
        global $current_user;
        if (!empty($current_user)) {
            $footerLineCollapsed = isset($_REQUEST['footerLineCollapsed']) ? $_REQUEST['footerLineCollapsed'] : 'true';
            $current_user->setPreference('footerLineCollapsed', $footerLineCollapsed);
            $current_user->savePreferencesToDB();
            return $footerLineCollapsed;
        }
    }

    public static function getToggleFooterline() {
        global $current_user;
        $footerLineCollapsed = $current_user->_userPreferenceFocus->getPreference('footerLineCollapsed');
        if (!isset($footerLineCollapsed)) {
            $footerLineCollapsed = false;
			$current_user->setPreference('footerLineCollapsed', $footerLineCollapsed);
			$current_user->savePreferencesToDB();
        }
        return $footerLineCollapsed;
    }

    //-------start SideBar actions

    public function setToggle() {
        require_once('modules/TRThemeController/TRThemeSideBarManager.php');
        $SideBarManager = new TRThemeSideBarManager();
        return $SideBarManager->setToggle();
    }

    public static function getToggle($menu) {
        require_once('modules/TRThemeController/TRThemeSideBarManager.php');
        $SideBarManager = new TRThemeSideBarManager();
        return $SideBarManager->getToggle($menu);
    }

    public static function getWidgetUserConfig($param) {
        require_once('modules/TRThemeController/TRThemeSideBarManager.php');
        $SideBarManager = new TRThemeSideBarManager();
        return $SideBarManager->getWidgetUserConfig($param);
    }

    public function setWidgetUserConfig() {
        require_once('modules/TRThemeController/TRThemeSideBarManager.php');
        $SideBarManager = new TRThemeSideBarManager();
        return $SideBarManager->setWidgetUserConfig($_REQUEST['param'], $_REQUEST['value']);
    }

    public function saveSort() {
        require_once('modules/TRThemeController/TRThemeSideBarManager.php');
        $SideBarManager = new TRThemeSideBarManager();
        return $SideBarManager->saveSort();
    }

    public function refresh() {
        if (!empty($_REQUEST['currentModule']))
            $GLOBALS['currentModule'] = $_REQUEST['currentModule'];
        require_once('modules/TRThemeController/TRThemeSideBarManager.php');
        $SideBarManager = new TRThemeSideBarManager();
        return $SideBarManager->refresh($_REQUEST['widget']);
    }

    public function showConfigSideBar() {
        require_once('modules/TRThemeController/TRThemeSideBarManager.php');
        $SideBarManager = new TRThemeSideBarManager();
        return $SideBarManager->showConfigSideBar();
    }

}

?>
