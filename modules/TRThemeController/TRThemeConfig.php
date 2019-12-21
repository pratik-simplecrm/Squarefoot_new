<?php

global $mod_strings,$sugar_config;
//2013-02-15 avoid notive in log
if(!empty($_GET['save']) && $_GET['save'] == "1"){
	require_once 'modules/Configurator/Configurator.php';
	$configurator = new Configurator();
	$configurator->loadConfig();
	$configurator->config['twentyreasons']['subpanelsTabbed'] = $_REQUEST['subpanelsTabbed'];
	$configurator->config['twentyreasons']['TRSideBar_load_closed'] = $_REQUEST['TRSideBar_load_closed'];
	$configurator->config['twentyreasons']['themecolor1'] = $_REQUEST['color1'];
	$configurator->config['twentyreasons']['themecolor2'] = $_REQUEST['color2'];
	$configurator->saveConfig();
	$css_master = trim(sugar_file_get_contents('themes/20reasons/css/master/style_master.css'));
	$css_new1 = str_replace('#862C7E', $_REQUEST['color1'], $css_master);
	$css_new2 = str_replace('#BCC000', $_REQUEST['color2'], $css_new1);
	$fd = fopen('themes/20reasons/css/style.css', "w");
	fwrite($fd,$css_new2);
	fclose($fd);
	$css_master = trim(sugar_file_get_contents('themes/20reasons/css/master/login_master.css'));
	$css_new1 = str_replace('#862C7E', $_REQUEST['color1'], $css_master);
	$css_new2 = str_replace('#BCC000', $_REQUEST['color2'], $css_new1);
	$fd = fopen('themes/20reasons/login/login.css', "w");
	fwrite($fd,$css_new2);
	fclose($fd);
	require_once('modules/Administration/QuickRepairAndRebuild.php');
	$randc = new RepairAndClear();
	$randc->clearThemeCache();
	$randc->clearSmarty();
}
$changelog = trim(sugar_file_get_contents('themes/20reasons/CHANGELOG.txt'));
$version = trim(substr($changelog,0,strpos($changelog,"-")));
if($sugar_config['twentyreasons']['TRSideBar_load_closed'] || $_REQUEST['TRSideBar_load_closed'] == 1){
	$TRSideBar_load_closed = 'checked="checked"';
}else{
	$TRSideBar_load_closed = '';
}
if($sugar_config['twentyreasons']['subpanelsTabbed']  || $_REQUEST['subpanelsTabbed'] == 1){
	$subpanelsTabbed = 'checked="checked"';
}else{
	$subpanelsTabbed = '';
}
if(isset($sugar_config['twentyreasons']['themecolor1'])  || isset($_REQUEST['color1'])){
	if(isset($_REQUEST['color1'])){
		$color1 = $_REQUEST['color1'];
	}elseif(isset($sugar_config['twentyreasons']['themecolor1'])){
		$color1 = $sugar_config['twentyreasons']['themecolor1'];
	}
}else{
	$color1 = '#862C7E';
}
if(isset($sugar_config['twentyreasons']['themecolor2'])  || isset($_REQUEST['color2'])){
	if(isset($_REQUEST['color2'])){
		$color2 = $_REQUEST['color2'];
	}elseif(isset($sugar_config['twentyreasons']['themecolor2'])){
		$color2 = $sugar_config['twentyreasons']['themecolor2'];
	}
}else{
	$color2 = '#BCC000';
}

$out = <<<EOQ
<h2>{$mod_strings['LBL_TRTHEMECONFIG_TITLE']}</h2><br>
<script type="text/javascript" src="themes/20reasons/js/farbtastic.js"></script>
<link rel="stylesheet" href="themes/20reasons/css/farbtastic.css" type="text/css" />
<form method="post" action="?module=TRThemeController&action=TRThemeConfig&config_section=1&save=1" class="view edit">
	<table width="50%" class="panelContainer"><tr><td scope="col" width="35%">
		<lable for="">{$mod_strings['LBL_TRTHEMECONFIG_SIDEBAR_LOAD_CLOSED']}</lable>
	</td><td width="15%">
		<input type="hidden" name="TRSideBar_load_closed" value="0"/>
		<input type="checkbox" name ="TRSideBar_load_closed" value="1" {$TRSideBar_load_closed}/>
	</td></tr><tr><td scope="col" width="35%">
		<lable for="">{$mod_strings['LBL_TRTHEMECONFIG_SUBPANELS_TABBED']}</lable>
	</td><td width="15%">
		<input type="hidden" name="subpanelsTabbed" value="0"/>
		<input type="checkbox" name ="subpanelsTabbed" value="1" {$subpanelsTabbed}/>
	</td></tr><tr><td scope="col" width="35%">
		<lable for="">{$mod_strings['LBL_TRTHEMECONFIG_COLOR1']}</lable>
	</td><td width="15%">
		<input type="text" id="color1" name="color1" value="{$color1}" />
 <script type="text/javascript">
   $(document).ready(function() {
     $('#colorpicker1').farbtastic('#color1');
   });
 </script>
 		<div id="colorpicker1"></div>
	</td></tr><tr><td scope="col" width="35%">
		<lable for="">{$mod_strings['LBL_TRTHEMECONFIG_COLOR2']}</lable>
	</td><td width="15%">
		<input type="text" id="color2" name="color2" value="{$color2}" />
 <script type="text/javascript">
   $(document).ready(function() {
     $('#colorpicker2').farbtastic('#color2');
   });
 </script>
 		<div id="colorpicker2"></div>
	</td></tr><tr><td colspan="2" style="text-align:center;" width="50%">
		<input type='submit' value="Save Configuration" class="button"/>
	</td></tr></table>
</form>
<hr>
<h3><i>Changelog:</i></h3>
<textarea readonly="readonly" style="width:800px;height:200px;color: #777777;font-size: 12px;">{$changelog}</textarea> <br><br><quote>20reasons Theme {$version} </quote>
EOQ;

echo $out;
