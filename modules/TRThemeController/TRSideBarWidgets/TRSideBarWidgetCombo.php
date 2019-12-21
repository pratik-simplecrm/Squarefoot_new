<?php
require_once('modules/TRThemeController/TRSideBarWidgets/TRSideBarWidget.php');
class TRSideBarWidgetCombo extends TRSideBarWidget {
	var $widget_name = "Combo";
	public function display($closed = true, $children_closed = false){
		global $current_language;
		if(file_exists('modules/TRThemeController/language/'.$current_language.'.lang.php')){
			include('modules/TRThemeController/language/'.$current_language.'.lang.php');
		}else{
			include('modules/TRThemeController/language/en_us.lang.php');
		}
		if(file_exists('custom/modules/TRThemeController/language/'.$current_language.'.lang.php')){
			include('custom/modules/TRThemeController/language/'.$current_language.'.lang.php');
		}

		$return = '<div id="combo_buttons"><span id="combo_prev" class="arrow_left" style="float: left; margin-top: 6px;"></span><span id="combo_item_title" class="shortcutstitle" style="color: #444444;"></span><span id="combo_next" class="arrow_right" style="float: right; margin-top: 6px; margin-right: 5px;"></span></div>';
		$return .= '<ul id="combo_container">';

		require_once('modules/TRThemeController/TRSideBarWidgets/TRSideBarWidgetLastViewed.php');
		require_once('modules/TRThemeController/TRSideBarWidgets/TRSideBarWidgetFavorites.php');
		require_once('modules/TRThemeController/TRSideBarWidgets/TRSideBarWidgetReminders.php');
		$lastviewed = new TRSideBarWidgetLastViewed();
		$favorites = new TRSideBarWidgetFavorites();
		$reminders = new TRSideBarWidgetReminders();
		$return .= '<div class="combo_item" id="combo_LastViewed" label="'.$mod_strings['LBL_LASTVIEWED'].'">';
		$return .= $lastviewed->display($children_closed);
		$return .= '</div><div class="combo_item" id="combo_Favorites" label="'.$mod_strings['LBL_FAVORITES'].'">';
		$return .= $favorites->display($children_closed);
		$return .= '</div><div class="combo_item" id="combo_Reminders" label="'.$mod_strings['LBL_REMINDERS'].'">';
		$return .= $reminders->display($children_closed);
		$return .= '</div>';
		$return.='</ul>';

		return $return;
	}

	public function refresh(){
		return $this->display(false,false);
	}

	public static function getCount(){
		return 3;
	}

	public static function getJsAfterLoad(){
		require_once('modules/TRThemeController/TRThemeController.php');
		$user_toggle = TRThemeController::getToggle('Combo');
		$combo_active_element = TRThemeController::getWidgetUserConfig('combo_active_element');
		if(empty($combo_active_element)){
			$combo_active_element = 'combo_LastViewed';
			global $current_user;
			$current_user->setPreference('combo_active_element', $combo_active_element);
			$current_user->savePreferencesToDB();
		}
		return " toggled['Combo'] = ".(empty($user_toggle)?'false':$user_toggle).";\ntwentyreasonstheme.getToggle('Combo');\nvar combo_active_element = '".$combo_active_element."'; TRSideBarWidgetCombo.initialize(combo_active_element);";
	}

	public static function getJsAfterRefresh(){
		require_once('modules/TRThemeController/TRThemeController.php');
		$user_toggle = TRThemeController::getToggle('Combo');
		$combo_active_element = TRThemeController::getWidgetUserConfig('combo_active_element');
		if(empty($combo_active_element)) $combo_active_element = 'combo_LastViewed';
		return " toggled['Combo'] = ".$user_toggle.";". ($user_toggle == 'true' ? "twentyreasonstheme.collapsedStatic['Combo']=true;": "")."\nvar combo_active_element = '".$combo_active_element."'; TRSideBarWidgetCombo.initialize(combo_active_element);";
	}

	public static function getJsIncludeAfterRefresh(){
		return 'modules/TRThemeController/TRSideBarWidgets/js/TRSideBarWidgetCombo.js';
	}

	public static function getJsIncludes(){
		return 'modules/TRThemeController/TRSideBarWidgets/js/TRSideBarWidgetCombo.js';
	}
}
