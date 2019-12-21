<?php
//ini_set('display_errors','On');
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class AfterSave {
	function AfterSave($bean,$event,$arguments)
	{
		global $db;
		$sales_forecast_id=$bean->id;
		 $sales_year = $bean->year;
		//$sales_quarter = $bean->quarter;
		$assigned_user_id = $bean->users_sf_sales_forecast_1users_ida;
		$startdate = $sales_year."-04-01";
		$enddate = ($sales_year+1)."-03-31";
		//~ $quarter = $bean->quarter;
		 // $opportunity ="SELECT sum(amount) as amount, EXTRACT(MONTH FROM OC.actual_date_closed_c ) as month from opportunities O JOIN users_sf_sales_forecast_1_c SFC ON SFC.users_sf_sales_forecast_1users_ida =  '$assigned_user_id'  JOIN opportunities_cstm OC ON OC.id_c = O.id where O.sales_stage='Closed Won' and O.deleted=0 and OC.actual_date_closed_c BETWEEN '$startdate' AND '$enddate' and O.assigned_user_id='$assigned_user_id' ";
		 // //~ exit;
		 // $result  = $db->query($opportunity);
		 // $row = $db->fetchByAssoc($result);
		 // $amount = $row['amount'];
		$opportunity ="SELECT DISTINCT(O.id) as opportunity_id,O.amount from opportunities O JOIN users_sf_sales_forecast_1_c SFC ON SFC.users_sf_sales_forecast_1users_ida =  '$assigned_user_id'  JOIN opportunities_cstm OC ON OC.id_c = O.id where O.sales_stage='Closed Won' and O.deleted=0 and O.date_closed BETWEEN '$startdate' AND '$enddate' and O.assigned_user_id='$assigned_user_id' ";
		 $result  = $db->query($opportunity);
		 $amount = 0;
		 while($row = $db->fetchByAssoc($result))
		 {
		 	$opportunity_id = $row['opportunity_id'];
		 	// $opportunity_records = "SELECT amount from opportunities where id='$opportunity_id' and deleted=0";
		 	// $result_opportunities_records = $db->query($opportunity_records);
		 	// $row_opportunities_records = $db->fetchByAssoc($result_opportunities_records);
		 	$amount += $row['amount'];
		 }
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
		//~ echo $current_year;
		//~ exit;
		//~ echo $sales_year;
		//~ echo $year;
		//~ echo $sales_quarter;
		//~ echo $quarter;
		//~ exit;
		if($sales_year == $current_year)
		{
			$related_opporunities = "UPDATE sf_sales_forecast SET opportunities_won ='$amount' where sf_sales_forecast.id='$sales_forecast_id' and sf_sales_forecast.year='$current_year' and sf_sales_forecast.deleted=0";
		//~ exit;
			//$GLOBALS['log']->fatal($related_opporunities);
		$result_opportunities = $db->query($related_opporunities);
		}
		else
		{
			$related_opporunities = "UPDATE sf_sales_forecast SET opportunities_won ='0.00' where sf_sales_forecast.id='$sales_forecast_id' and sf_sales_forecast.year='$sales_year' and sf_sales_forecast.deleted=0";
		//~ exit;
			//$GLOBALS['log']->fatal($related_opporunities);
		$result_opportunities = $db->query($related_opporunities);
		}
	}
}	


?>
