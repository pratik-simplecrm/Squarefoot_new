<?php

require_once('modules/TRThemeController/TRSideBarWidgets/TRSideBarWidget.php');

class TRSideBarWidgetFavorites extends TRSideBarWidget {

    var $widget_name = "Favorites";

    public function display($closed = true) {
        require_once('modules/TRThemeController/TRThemeFavorites.php');

        $favorites = TRThemeFavorites::getFavoritesRaw();

        $ss = new Sugar_Smarty();
        $ss->assign('closed', $closed);
        $ss->assign('items', $favorites);
        $ss->assign('NTC_NO_ITEMS_DISPLAY', $GLOBALS['app_strings']['NTC_NO_ITEMS_DISPLAY']);
        return $ss->fetch('modules/TRThemeController/TRSideBarWidgets/tpls/TRSideBarGenericItems.tpl');
    }

    public function refresh() {
        return $this->display(false);
    }

    public static function getCount() {
        return 1;
        require_once('modules/TRThemeController/TRThemeFavorites.php');
        $return = TRThemeFavorites::getFavoritesCountForSideBar(10);
        return $return;
    }

    public static function getJsAfterLoad() {
        if (self::getCount() > 0) {
            require_once('modules/TRThemeController/TRThemeController.php');
            $user_toggle = TRThemeController::getToggle('Favorites');
            //return "toggled['Favorites'] = " . $user_toggle . ";\ntwentyreasonstheme.getToggle('Favorites');";
            return "toggled['Favorites'] = " . (empty($user_toggle)?'false':$user_toggle) . ";" . ($user_toggle == 'true' ? "twentyreasonstheme.collapsedStatic['Favorites']=true;": "");
        } else {
            return '';
        }
    }

}