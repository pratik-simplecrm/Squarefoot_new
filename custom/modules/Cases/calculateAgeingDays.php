<?php
if (!defined('sugarEntry') || !sugarEntry) {

    die('Not A Valid Entry Point');
}
error_reporting(0);
global $db;

//fetch all open tickets
	$get_open_tickets = "SELECT * FROM `cases` WHERE LOWER(`state`) = 'open' and `deleted`=0";	
	$result = $db->query($get_open_tickets);
	$ticket_count = $result->num_rows;
	if($ticket_count>=1)
	{
		while($row = $db->fetchByAssoc($result))
		{
			
			$case_id = trim($row['id']);
			$get_ticket_start_date = "SELECT `startdate_c` FROM `cases_cstm` WHERE `id_c`='$case_id'";	
	        $result1 = $db->query($get_ticket_start_date);
			$row1 = $db->fetchByAssoc($result1);
			$start_date = explode(" ",$row1['startdate_c']);
			$sdate = $start_date[0];
			if(!empty($sdate) && $sdate!='')
			{
				//Finding the number of days between two dates
				$now = time(); // or your date as well
				$your_date = strtotime($sdate);
				$datediff = $now - $your_date;

				$ageing_days = (int)round($datediff / (60 * 60 * 24));
				if($ageing_days>=0)
				{
					//create log for tracking issues
						$logArray = array('Case_ID'=>$case_id,'Start_date'=>$sdate,'ageing_days_c'=>$ageing_days);
						//print_r($logArray);
						$myfile_handle = fopen("ageing_days_update.txt", "a");
						//$timestamp = date('Y-m-d H:i:s',strtotime('+5 hours +30 minutes', strtotime('now')));
						$timestamp = date('Y-m-d H:i:s');
						$logArray = print_r($logArray, true);
						$logMessage = "\nageing_days_update Result at $timestamp :-\n$logArray";
						fwrite($myfile_handle, $logMessage);
					// end of the code
					
					$update_ageing_days = "UPDATE `cases_cstm` SET `ageing_days_c`=$ageing_days where `id_c`='$case_id'";
					$update_qry = $db->query($update_ageing_days);
					
				}	
			}
			
			
			
		}
	}
?>