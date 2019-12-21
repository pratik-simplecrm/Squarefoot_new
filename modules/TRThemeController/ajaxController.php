<?php

require_once('modules/TRThemeController/TRThemeController.php');
ini_set('display_errors','0');
if(isset($_REQUEST['ajaxAction']) && !empty($_REQUEST['ajaxAction']))
{
    $trThemeController = new TRThemeController();
    echo $trThemeController->$_REQUEST['ajaxAction']($this);
}

require_once('modules/TRThemeController/TRThemeSideBarManager.php');

if(isset($_REQUEST['ThemeAjaxAction']) && !empty($_REQUEST['ThemeAjaxAction']))
{
	$TRThemeSideBarManager = new TRThemeSideBarManager();
	echo $TRThemeSideBarManager->$_REQUEST['ThemeAjaxAction']($this);
}
?>
