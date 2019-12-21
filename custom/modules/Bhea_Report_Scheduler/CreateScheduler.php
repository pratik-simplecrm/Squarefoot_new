<?php
ini_set("display_errors",0);
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class Create_Scheduler
{

	function Create_Scheduler_Fn($bean, $event, $arguments)
	{
		global $db,$sugar_config;
		$site_url = $sugar_config['site_url']; 
		$url_index = "/index.php?entryPoint=";
		
		$id 			= $bean->id;
		$name 		 	= $bean->name;
		$status 	 	= $bean->status;
		$frequency  	= $bean->frequency;
		$start_date  	= $bean->start_date;
		//$next_run    	= $bean->next_run;
		$assigned_user	= $bean->assigned_user_id;
		$today_date = date('Y-m-d H:i:s');	

		$update = "UPDATE bhea_report_scheduler SET next_run ='$start_date' where id = '$id' ";
		//$update = "UPDATE bhea_report_scheduler SET start_date = '$today_date',next_run ='$today_date' where id = '$id' ";
		$db->query($update);

	}
}
?>
