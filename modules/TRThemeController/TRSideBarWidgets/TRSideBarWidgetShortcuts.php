<?php
require_once('modules/TRThemeController/TRSideBarWidgets/TRSideBarWidget.php');
class TRSideBarWidgetShortcuts extends TRSideBarWidget {
	var $widget_name = "Shortcuts";
	public function display($closed = true){
		require_once('include/MVC/View/SugarView.php');
		$view = new SugarView();
		$view->module = $GLOBALS['currentModule'];
		// build the shortcut menu
		$shortcut_menu = array();
		foreach ( $view->getMenu() as $key => $menu_item )
			$shortcut_menu[$key] = array(
					"URL"         => $menu_item[0],
					"LABEL"       => $menu_item[1],
					"MODULE_NAME" => $menu_item[2],
					"IMAGE"       => SugarThemeRegistry::current()->getImage($menu_item[2],"border='0' align='absmiddle'",null,null,'.gif',$menu_item[1]),
			);

                $ss = new Sugar_Smarty();
                $ss->assign('closed', $closed);
                $ss->assign('shortcuts', $shortcut_menu);
                return $ss->fetch('modules/TRThemeController/TRSideBarWidgets/tpls/TRSideBarShortcuts.tpl');

	}

	public function refresh(){
		return $this->display(false);
	}

	public static function getCount(){
		require_once('include/MVC/View/SugarView.php');
		$view = new SugarView();
		$view->module = $GLOBALS['currentModule'];
		$menu_items = $view->getMenu();
		return count($menu_items);
	}

	public static function getJsAfterLoad(){
		if(self::getCount()>0){
			require_once('modules/TRThemeController/TRThemeController.php');
			$user_toggle = TRThemeController::getToggle('Shortcuts');
			//return "toggled['Shortcuts'] = ".$user_toggle.";\ntwentyreasonstheme.getToggle('Shortcuts');";
                        return "toggled['Shortcuts'] = ".(empty($user_toggle)?'false':$user_toggle).";". ($user_toggle == 'true' ? "twentyreasonstheme.collapsedStatic['Shortcuts']=true;": "");
		}else{
			return '';
		}
	}
}