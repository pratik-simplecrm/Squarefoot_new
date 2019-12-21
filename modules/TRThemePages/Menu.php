<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $mod_strings, $app_strings;

if(ACLController::checkAccess('TRSystems', 'edit', true))$module_menu[]=Array("index.php?module=TRThemePages&action=EditView&return_module=TRThemePages&return_action=DetailView", $mod_strings['LNK_TRTHEMEPAGE_NEW'],"CreateTRThemePage");
if(ACLController::checkAccess('TRSystems', 'list', true))$module_menu[]=Array("index.php?module=TRThemePages&action=index&return_module=TRThemePages&return_action=DetailView", $mod_strings['LNK_TRTHEMEPAGE_LIST'],"TRThemePage");

?>
