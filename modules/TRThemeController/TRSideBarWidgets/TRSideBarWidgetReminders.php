<?php
require_once('modules/TRThemeController/TRSideBarWidgets/TRSideBarWidget.php');
class TRSideBarWidgetReminders extends TRSideBarWidget {
	var $widget_name = "Reminders";
	public function display($closed = true){
		require_once('modules/TRThemeController/TRThemeReminders.php');

                $ss = new Sugar_Smarty();
                $ss->assign('closed', $closed);
                $ss->assign('reminders', TRThemeReminders::getReminders(5));
                return $ss->fetch('modules/TRThemeController/TRSideBarWidgets/tpls/TRSideBarWidgetReminders.tpl');

	}

	public function refresh(){
		return $this->display(false);
	}

	public static function getCount(){
		require_once('modules/TRThemeController/TRThemeReminders.php');
		$reminders = TRThemeReminders::getReminderCount(5);
		return count($reminders);
	}

	public static function getJsAfterLoad(){
		if(self::getCount()>0){
			require_once('modules/TRThemeController/TRThemeController.php');
			$user_toggle = TRThemeController::getToggle('Reminders');
			//return "toggled['Reminders'] = ".$user_toggle.";\ntwentyreasonstheme.getToggle('Reminders');";
                        return "toggled['Reminders'] = ".(empty($user_toggle)?'false':$user_toggle).";" . ($user_toggle == 'true' ? "twentyreasonstheme.collapsedStatic['Reminders']=true;": "");
		}else{
			return '';
		}
	}
}