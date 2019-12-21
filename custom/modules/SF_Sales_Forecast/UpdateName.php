<?php
ini_set('display_errors','On');
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class UpdateName {
	function update_name($bean,$event,$arguments)
	{
		$sales_user_name = $bean->users_sf_sales_forecast_1_name;
		$sales_year = $bean->year;
		//~ $sales_quarter = $bean->quarter;
		//~ if($sales_quarter == '1')
		//~ {
			//~ $quarter ='Q1';
		//~ }
		//~ else if($sales_quarter == '2')
		//~ {
			//~ $quarter = 'Q2';
		//~ }
		//~ else if($sales_quarter == '3')
		//~ {
			//~ $quarter = 'Q3';
		//~ }
		//~ else if($sales_quarter == '4')
		//~ {
				//~ $quarter = 'Q4';
		//~ }
		$Name = $sales_user_name.' '.'-'.' '.$sales_year;
		$bean->name = $Name;
	}
}
?>
