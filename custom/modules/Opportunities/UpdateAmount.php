<?php
ini_set('display_errors','off');
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class UpdateAmount {
	function Update_Amount($bean,$event,$arguments)
	{
		$beanFetched = $bean->fetched_row;
		$old_sales_stage = $bean->fetched_row['sales_stage'];
		$old_opportunity_amount = $bean->fetched_row['amount'];
		$old_actual_date = $bean->fetched_row['actual_date_closed_c'];
		global $db;
		$current_date = date('d-m-Y');
		 $CurrentDate = explode('-',$current_date);
		 $year = $CurrentDate[2];
		$month = $CurrentDate[1];
		 //~ if(($month == '04') || ($month == '05') || ($month == '06'))
		//~ {
			//~ $quarter = '1';
		//~ }
		//~ else if(($month =='07') || ($month =='08') || ($month =='09'))
		//~ {
			//~ $quarter ='2';
		//~ }
		//~ else if(($month =='10') || ($month =='11') || ($month == '12'))
		//~ {
			//~ $quarter ='3';
		//~ }
		if(($month =='01') || ($month =='02') || ($month =='03'))
		{
			$current_year = $year-1;
		}
		else
		{
				$current_year = $year;
		}
		//~ echo $quarter;
		//~ exit;
		$opportunity_amount = $bean->amount;
		$opportunity_id = $bean->id;
		$sales_stage = $bean->sales_stage;
		$assigned_user_id = $bean->assigned_user_id;
		$query_sales_related_id = "SELECT SF.opportunities_won as opportunities_won,SF.id as sales_forecast_id FROM sf_sales_forecast SF JOIN users_sf_sales_forecast_1_c SFC ON SFC.users_sf_sales_forecast_1users_ida =  '$assigned_user_id'  AND SF.year =  '$current_year' AND SF.deleted =0 AND SFC.users_sf_sales_forecast_1sf_sales_forecast_idb = SF.id";
		$result_sales_related = $db->query($query_sales_related_id);
		$row_sales_related = $db->fetchByAssoc($result_sales_related);
		$opportunity_won = $row_sales_related['opportunities_won'];
		$sales_forecast_id = $row_sales_related['sales_forecast_id'];
		//~ exit;
		//$quarter = $row_sales['quarter'];
		//~ echo $sales_stage;
		//~ echo $old_sales_stage;
		//~ echo $old_opportunity_amount;
		//~ echo $opportunity_amount;
		//~ exit;
		if($sales_stage != $old_sales_stage)
		{
			if($sales_stage =='Closed Won')
			{
			$new_opportunity_won = $opportunity_won + $opportunity_amount;
			$update_sales_allocated = "UPDATE sf_sales_forecast set opportunities_won='$new_opportunity_won' where id='$sales_forecast_id' and year='$current_year'";
			//$GLOBALS['log']->fatal($update_sales_allocated);
			$result_update_sales_allocated = $db->query($update_sales_allocated);
			}
			else if($old_sales_stage=='Closed Won'){
			$new_opportunity_won = $opportunity_won - $opportunity_amount;
			$update_sales_allocated = "UPDATE sf_sales_forecast set opportunities_won='$new_opportunity_won' where id='$sales_forecast_id' and year='$current_year'";
			//~ exit;
			//$GLOBALS['log']->fatal($update_sales_allocated,"Old Closed Won");
			$result_update_sales_allocated = $db->query($update_sales_allocated);
			}
		}
		else if(($sales_stage =='Closed Won') && ($old_sales_stage =='Closed Won'))
		{
			if($old_opportunity_amount != $opportunity_amount)
			{
				$new_opportunity_won = $opportunity_won - $old_opportunity_amount;
				$New_Opportunity_won = $new_opportunity_won + $opportunity_amount;
				$update_sales_allocated = "UPDATE sf_sales_forecast set opportunities_won='$New_Opportunity_won' where id='$sales_forecast_id' and year = '$current_year'";
				//$GLOBALS['log']->fatal($update_sales_allocated,"Old Opportunity amount");
				$result_update_sales_allocated = $db->query($update_sales_allocated);
			}
		}
	}
}
?>
