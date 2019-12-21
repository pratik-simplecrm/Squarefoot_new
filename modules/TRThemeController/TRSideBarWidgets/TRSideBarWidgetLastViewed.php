<?php

require_once('modules/TRThemeController/TRSideBarWidgets/TRSideBarWidget.php');

class TRSideBarWidgetLastViewed extends TRSideBarWidget {

    var $widget_name = "LastViewed";

    public function display($closed = true) {
        global $current_user;
        require_once('modules/Trackers/Tracker.php');
        $tracker = new Tracker();
        $history = $tracker->get_recently_viewed($current_user->id);
        foreach ($history as $key => $row) {
            $history[$key]['item_summary_short'] = to_html(getTrackerSubstring($row['item_summary'])); //bug 56373 - need to re-HTML-encode
            // $history[$key]['image'] = SugarThemeRegistry::current()->getImage($row['module_name'], 'border="0" align="absmiddle"', null, null, '.gif', $row['item_summary']);
        }
        $recentRecords = $history;

        $ss = new Sugar_Smarty();
        $ss->assign('closed', $closed);
        $ss->assign('items', $recentRecords);
        $ss->assign('NTC_NO_ITEMS_DISPLAY', $GLOBALS['app_strings']['NTC_NO_ITEMS_DISPLAY']);
        return $ss->fetch('modules/TRThemeController/TRSideBarWidgets/tpls/TRSideBarGenericItems.tpl');
    }

    public function refresh() {
        return $this->display(false);
    }

    public static function getCount() {
        global $current_user;
        require_once('modules/Trackers/Tracker.php');
        $tracker = new Tracker();
        $history = $tracker->get_recently_viewed($current_user->id);
        return count($history);
    }

    public static function getJsAfterLoad() {
        if (self::getCount() > 0) {
            require_once('modules/TRThemeController/TRThemeController.php');
            $user_toggle = TRThemeController::getToggle('LastViewed');
            //return " toggled['LastViewed'] = " . $user_toggle . ";\ntwentyreasonstheme.getToggle('LastViewed');";
            return " toggled['LastViewed'] = " . (empty($user_toggle)?'false':$user_toggle) . ";" . ($user_toggle == 'true' ? "twentyreasonstheme.collapsedStatic['LastViewed']=true;": "");
        } else {
            return '';
        }
    }

}
