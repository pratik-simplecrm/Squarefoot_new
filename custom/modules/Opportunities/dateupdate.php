<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
include_once('modules/Opportunities/Opportunity.php');
include_once('include/database/MysqlManager.php');

class update
{

	function update($bean, $event, $arguments) {
		global $db;
		global $sugar_config,$beanFiles,$beanList;
		$sales_stage=$bean->sales_stage;
		$prev_sales_stage =$bean->fetched_row['sales_stage']; 

		
		if ((($prev_sales_stage != 'Closed Won') && ($sales_stage =='Closed Won'))  || (($prev_sales_stage != 'Closed Lost') && ($sales_stage =='Closed Lost'))) {
			$id=$bean->id;
			$close=date("Y-m-d");echo "<br>";
			
			$bean->date_closed =$close;
			
		}
	
	}
}
?>
