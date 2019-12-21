<?php

class TRThemeSideBarManager{
  function display($ss){
    $user_config = $this->getConfig();
    global $sugar_config;
    if(!isset($sugar_config['twentyreasons']['TRSideBar_load_closed']) || $sugar_config['twentyreasons']['TRSideBar_load_closed']){
    	$load_closed = true;
    }else{
    	$load_closed = false;
    }
    $ss->assign("config_load_closed",$load_closed);

    $jsIncludes = array();

    foreach($user_config as $order => $item){
      if(file_exists('custom/modules/TRThemeController/TRSideBarWidgets/'.$item['classname'].'.php')){
        require_once('custom/modules/TRThemeController/TRSideBarWidgets/'.$item['classname'].'.php');
      }else{
        require_once('modules/TRThemeController/TRSideBarWidgets/'.$item['classname'].'.php');
      }
      $itemBean = new $item['classname']();
      $SideBarContent[] = array('content' => $itemBean->display(false), 'label' => $item['title'], 'count' =>  $itemBean->getCount(),'name' => $item['name'], 'closed' => $item['closed'], 'load_closed' => $load_closed);
      if(!empty($item['jsAfterLoad'])){
        $jsAfterLoad[] = $item['jsAfterLoad'];
      }
      if(!empty($item['jsInclude'])){
        $jsIncludes[] = $item['jsInclude'];
      }
    }

    $ss->assign("TRSideBar",$SideBarContent);

    $jsIncludes_return='';
    if(count($jsIncludes)>0){
    	foreach($jsIncludes as $js){
    		if(is_array($js)){
    			foreach($js as $file){
    				$jsIncludes_return.='<script type="text/javascript" src="'.$file.'"></script>'."\n";
    			}
    		}elseif(is_string($js)){
    			$jsIncludes_return.='<script type="text/javascript" src="'.$js.'"></script>'."\n";
    		}
    	}
    }

    // set the status of the sidebar in the Smarty Template
    //die($this->getToggle("SideBar"));
    $ss->assign("sideBarClosed",$this->getToggle("SideBar"));

    $ss->assign("jsIncludes",$jsIncludes_return);
    require_once('modules/TRThemeController/TRThemeQuickNotes.php');
    $jsAfterLoad_return='';
    if(count($jsAfterLoad)>0){
	    $jsAfterLoad_return.='<script type="text/javascript">$(function() { ';
	    $jsAfterLoad_return.= " toggled['SideBar'] = ".$this->getToggle("SideBar")."; twentyreasonstheme.collapsedStatic['SideBar'] = ".$this->getToggle("SideBar").";twentyreasonstheme.collapsed['SideBar'] = ".$this->getToggle("SideBar").";";
	    foreach($jsAfterLoad as $js){
	    	$jsAfterLoad_return.= $js."\n";
	    }
	    $jsAfterLoad_return.='});</script>';
	}

	$ss->assign("jsAfterLoad",$jsAfterLoad_return);

	$ss->assign('currentModule',$GLOBALS['currentModule']);
	$ss->assign('currentRecord',(!empty($_REQUEST['record']) ? $_REQUEST['record'] : ""));
	$ss->assign('currentAction',(!empty($_REQUEST['action']) ? $_REQUEST['action'] : ""));
	if(!isset($sugar_config['twentyreasons']['subpanelsTabbed']) || !$sugar_config['twentyreasons']['subpanelsTabbed']){
		$subpanelsTabbed = false;
	}else{
		$subpanelsTabbed = true;
	}
	$ss->assign('subpanelsTabbed',$subpanelsTabbed);

  }

  function getConfig(){
    global $current_user,$current_language;

    // load module Language
    $mod_strings = return_module_language($current_language, 'TRThemeController');

    $sidebarConfig = $current_user->getPreference('TRThemeSideBarConfig');
    if(empty($sidebarConfig)){
      $sidebarConfig = 'Shortcuts,LastViewed,Favorites,Reminders';
      // write initial config since the user seemingly did not have any set yet
      $current_user->setPreference('TRThemeSideBarConfig', $sidebarConfig);
      $current_user->setPreference('Shortcuts_collapsed', 'false');
      $current_user->setPreference('LastViewed_collapsed', 'false');
      $current_user->setPreference('Favorites_collapsed', 'false');
      $current_user->setPreference('Reminders_collapsed', 'false');
      $current_user->savePreferencesToDB();
    }
    $config_array = explode(',',$sidebarConfig);
    foreach($config_array as $key => $widget){
    	if(!empty($widget)){
    		$widget = ucfirst($widget);
	      if(file_exists('custom/modules/TRThemeController/TRSideBarWidgets/TRSideBarWidget'.$widget.'.php')){
	        require_once('custom/modules/TRThemeController/TRSideBarWidgets/TRSideBarWidget'.$widget.'.php');
	      }else{
	        require_once('modules/TRThemeController/TRSideBarWidgets/TRSideBarWidget'.$widget.'.php');
	      }
	      $widgetClass= 'TRSideBarWidget'.$widget;
	      $widgetBean = new $widgetClass();
	      $jsAfterLoad = $widgetBean->getJsAfterLoad();
	      $jsInclude = $widgetBean->getJsIncludes();
	      $title = $mod_strings['LBL_'.strtoupper($widget)];
	      $closed = $widgetBean->getToggle($widget);
	      $return[]=array('classname' => $widgetClass, 'title' => $title, 'name' => $widget, 'jsAfterLoad' => $jsAfterLoad, 'jsInclude' => $jsInclude, 'closed' => $closed);
	    }
    }

    return $return;
  }

  public function refresh($widget){
  	if(!empty($widget)){
  		$widget = ucfirst($widget);
  		if(file_exists('custom/modules/TRThemeController/TRSideBarWidgets/TRSideBarWidget'.$widget.'.php')){
  			require_once('custom/modules/TRThemeController/TRSideBarWidgets/TRSideBarWidget'.$widget.'.php');
  		}else{
  			require_once('modules/TRThemeController/TRSideBarWidgets/TRSideBarWidget'.$widget.'.php');
  		}
  		$widgetClass= 'TRSideBarWidget'.$widget;
  		$widgetBean = new $widgetClass();
  		if($widgetBean->getCount() > 0){
  			$jsAfterRefresh = $widgetBean->getJsAfterRefresh();
  			$jsInclude = $widgetBean->getJsIncludeAfterRefresh();
  			$return = $widgetBean->refresh();
  			return json_encode(array('content' => $return, 'jsexecute' => $jsAfterRefresh, 'jsinclude' => $jsInclude));
  		}
  	}
  }

  public function setToggle() {
  	global $current_user;
  	if(!empty($current_user)) {
  		$collapsed = isset($_REQUEST['collapsed']) ? $_REQUEST['collapsed'] : 'true';
  		$current_user->setPreference($_REQUEST['menu'].'_collapsed', $collapsed);
  		$current_user->savePreferencesToDB();
  		return $collapsed;
  	}
  }

  public static function getToggle($menu) {
  	global $current_user;
  	$collapsed = $current_user->getPreference($menu.'_collapsed');
  	if($collapsed === null){
  		$collapsed = false;
		$current_user->setPreference($menu.'_collapsed', $collapsed);
  		$current_user->savePreferencesToDB();
  	}
        if(!empty($collapsed))
  	return $collapsed;
        else
            return 'false'; 
  }

  public static function getWidgetUserConfig($param){
  	global $current_user;
  	$config = $current_user->getPreference($param);
  	return $config;
  }

  public function setWidgetUserConfig($param,$value){
  	global $current_user;
  	$current_user->setPreference($param, $value);
  	$current_user->savePreferencesToDB();
  	return $value;
  }

  public function saveSort() {
  	global $current_user;
  	if(!empty($current_user)) {
  		$sort_order = isset($_REQUEST['order']) ? $_REQUEST['order'] : 'Shortcuts,LastViewed,Favorites,Reminders,';
  		$user_config_old = $config = $current_user->getPreference('TRThemeSideBarConfig');
  		$user_config_old = explode(',', $user_config_old);
  		$sort_order = explode(',', $sort_order);
  		foreach($sort_order as $index => $widget){
  			$new_sort[] = $widget;
  			$current_user->setPreference($widget.'_collapsed', false);
  		}
  		foreach($user_config_old as $key => $element){
  			if(!in_array($element,$new_sort)){
  				$new_sort[] = $element;
  			}
  		}
  		$sort_order = implode(',', $new_sort);
  		$current_user->setPreference('TRThemeSideBarConfig', $sort_order);
  		$current_user->savePreferencesToDB();
  		return $sort_order;
  	}
  }

  public function showConfigSideBar(){
  	global $current_language;
  	if(file_exists('modules/TRThemeController/language/'.$current_language.'.lang.php')){
		require_once('modules/TRThemeController/language/'.$current_language.'.lang.php');
	}else{
		require_once('modules/TRThemeController/language/en_us.lang.php');
	}
  	if(file_exists('custom/modules/TRThemeController/language/'.$current_language.'.lang.php')){
  		require_once('custom/modules/TRThemeController/language/'.$current_language.'.lang.php');
  	}
  	if(file_exists('custom/modules/TRThemeController/TRSideBarWidgets/widget.registry.php')){
  		require_once('custom/modules/TRThemeController/TRSideBarWidgets/widget.registry.php');
  	}else{
  		require_once('modules/TRThemeController/TRSideBarWidgets/widget.registry.php');
  	}
  	$userconfig = $this->getWidgetUserConfig('TRThemeSideBarConfig');
  	$user_config = explode(',',$userconfig);
	$return = '<ul id="widget_list">';
  	foreach($widget_registry as $widget){
  		if(in_array($widget, $user_config)){
  			$checked = ' checked="checked"';
  		}else{
  			$checked = '';
  		}
  		$return .= '<li><input type="hidden" name="'.$widget.'" value="0"><input type="checkbox" name="'.$widget.'" value="1"'.$checked.'><span class="shortcutstitle" style="padding: 0px; color: #444444;">'.$mod_strings['LBL_'.strtoupper($widget)].'</span></input></li>';
  	}
	return $return;
  }

}
