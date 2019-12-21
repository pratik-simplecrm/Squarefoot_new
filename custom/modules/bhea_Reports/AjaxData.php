<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
ini_set("display_errors","Off");
require_once('include/entryPoint.php');
global $db;

/**
Collect all filter
*/


//4. lead_status filter
$lead_status = $_REQUEST['lead_status'];
if(!empty($lead_status))
{
    if(is_array($lead_status))
    {
        $tmp = '';
        foreach($lead_status as $b_id)
        {
            if(!empty($b_id)) {
                if(empty($tmp))
                    $tmp  = "'".$b_id."'";
                else    
                    $tmp .= ",'".$b_id."'";
            }
        }
        if(!empty($tmp))
            $lead_status = " and L.status in ($tmp) ";
        else
            $lead_status ='';
            
    } 
}

//5. assigned_users filter
$assigned_users = $_REQUEST['assigned_users'];
if(!empty($assigned_users))
{
    if(is_array($assigned_users))
    {
        $tmp = '';
        foreach($assigned_users as $b_id)
        {
            if(!empty($b_id)) { 
                if(empty($tmp))
                    $tmp  = "'".$b_id."'";
                else    
                    $tmp .= ",'".$b_id."'";
            }
        }
        if(!empty($tmp))
            $assigned_users = " and L.assigned_user_id in ($tmp) ";
        else
            $assigned_users = '';
    } 
}

 //lead_source filter
$lead_source = $_REQUEST['lead_source'];
if(!empty($lead_source))
{
	if(is_array($lead_source))
	{
		$tmp = '';
		foreach($lead_source as $b_id)
		{
			if(!empty($b_id)) {
				if(empty($tmp))
					$tmp  = "'".$b_id."'";
				else    
					$tmp .= ",'".$b_id."'";
			}
		}
		if(!empty($tmp))
			$lead_source = " and L.lead_source in ($tmp) ";
		else
			$lead_source ='';
			
	} 
}

// Team Filter
$assigned_users_team = $_REQUEST['teams'];
if(!empty($assigned_users_team))
{
	if(is_array($assigned_users_team))
	{
		$tmp = '';
		foreach($assigned_users_team as $b_id)
		{
			if(!empty($b_id)) { 
				if(empty($tmp))
					$tmp  = "'".$b_id."'";
				else    
					$tmp .= ",'".$b_id."'";
			}
		}
		if(!empty($tmp))
			$assigned_users_team = " and L.team_id in ($tmp) ";
		else
			$assigned_users_team = '';
	} 
}

 
// 8. From Date & 9. To Date filter Condition
$from_date = $_REQUEST['from_date'];
if(!empty($from_date))
{
    $tmp = explode("/",$from_date);
    if( count($tmp) == 3)
    {
        $from_date = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
    } else 
    $from_date = '';
}
if(!empty($from_date))
{
    $from_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($from_date)));
    $from_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($from_date)));
	$from_date = " and L.date_entered >= '$from_date' ";
}

$to_date = $_REQUEST['to_date'];
if(!empty($to_date))
{
    $tmp = explode("/",$to_date);
    if( count($tmp) == 3)
    {
        $to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]);
		$to_date = date('Y-m-d', strtotime($to_date. ' + 1 days'));
		//$to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]+1);
    } else 
    $to_date = '';
}
if(!empty($to_date))
{
    $to_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($to_date)));
    $to_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($to_date)));
    $to_date = " and L.date_entered <= '$to_date' ";
}



$limit = '';
if(!empty($_REQUEST['curr_index'])) {
    if($_REQUEST['curr_index'] =='end') 
    {
       $query = " SELECT
             count(L.id) as total_rows
		
		FROM 
			leads AS L join leads_cstm AS LC ON L.id = LC.id_c
			left join team as T ON T.id=L.team_id and T.deleted=0
            left join users as U ON U.id=L.assigned_user_id and U.deleted=0 AND U.status ='Active' 
			
			LEFT JOIN arch_architects_contacts_leads_1_c ARL ON L.id=ARL.arch_architects_contacts_leads_1leads_idb AND ARL.deleted=0 
			LEFT JOIN arch_architects_contacts AR ON AR.id=ARL.arch_architects_contacts_leads_1arch_architects_contacts_ida AND AR.deleted=0 
			
			LEFT JOIN arch_architectural_firm_leads_1_c ARFL ON L.id=ARFL.arch_architectural_firm_leads_1leads_idb AND ARFL.deleted=0 
			LEFT JOIN arch_architectural_firm ARF ON ARF.id=ARFL.arch_architectural_firm_leads_1arch_architectural_firm_ida AND ARF.deleted=0
			
		where L.deleted=0 
			$from_date
			$to_date			
			$lead_source
			$lead_status
            $assigned_users_team
			$assigned_users
			
          
        ";

        $result = $db->query($query);
        if($row = $db->fetchByAssoc($result))
        {
            $total_rows = $row['total_rows'];
        }
        
        $rem_rows_start =  roundToFifty($total_rows);
        
        if($rem_rows_start > 50) {
            $limit = ' limit '.$rem_rows_start.' , '.$total_rows;
            $hidden = ' <input type="hidden" value="'.$rem_rows_start.'" name="rem_rows_start" class="rem_rows_start" id="rem_rows_start" />';
            $hidden .= ' <input type="hidden" value="'.$total_rows.'" name="total_last_rows"  class="total_last_rows" id="total_last_rows" />';
        }
        else
            $limit = ' limit 0, 50 ';
    } else if($_REQUEST['curr_index'] =='start') {
        
        $limit = ' limit 0, 50 ';    
    }
    else         
    $limit = ' limit '.($_REQUEST['curr_index']+1).' , '.($_REQUEST['curr_index']+50).' ';
}
else
   $limit = ' limit 0, 50 ';
   
//Main Query
        $query = " SELECT
             L.id as id,
			 CONCAT(IFNULL(L.first_name,''),' ',IFNULL(L.last_name,'')) as lead_name,
			 L.lead_source,
			 L.status,
			 L.phone_mobile,
			 L.account_name,
			 ARF.name as firm,
			 L.opportunity_amount as amount,
			 CONCAT(IFNULL(AR.first_name,''),' ',IFNULL(AR.last_name,'')) as architect,	
			 DATE_FORMAT(L.date_entered,'%d/%m/%Y %H:%i:%s') as date_entered,
			 T.name as team_name,
			 CONCAT(IFNULL(U.first_name,''),' ',IFNULL(U.last_name,'')) as user_name
			 
		FROM 
			leads AS L join leads_cstm AS LC ON L.id = LC.id_c
			left join team as T ON T.id=L.team_id and T.deleted=0
            left join users as U ON U.id=L.assigned_user_id and U.deleted=0 AND U.status ='Active' 
			
			LEFT JOIN arch_architects_contacts_leads_1_c ARL ON L.id=ARL.arch_architects_contacts_leads_1leads_idb AND ARL.deleted=0 
			LEFT JOIN arch_architects_contacts AR ON AR.id=ARL.arch_architects_contacts_leads_1arch_architects_contacts_ida AND AR.deleted=0 
			
			LEFT JOIN arch_architectural_firm_leads_1_c ARFL ON L.id=ARFL.arch_architectural_firm_leads_1leads_idb AND ARFL.deleted=0 
			LEFT JOIN arch_architectural_firm ARF ON ARF.id=ARFL.arch_architectural_firm_leads_1arch_architectural_firm_ida AND ARF.deleted=0
			
		where L.deleted=0 
			$from_date
			$to_date			
			$lead_source
			$lead_status
            $assigned_users_team
			$assigned_users
			
         ORDER BY L.date_entered DESC    $limit
        ";

		$result = $db->query($query);
        $data = array();
        $r = 1;
        while($row = $db->fetchByAssoc($result))
        {
            $data[$r]['id'] 			= $row['id'];
			$data[$r]['lead_name']   	= ucwords(strtolower($row['lead_name']));
            $data[$r]['status'] 		= ucwords(strtolower($GLOBALS['app_list_strings']['status_list'][$row['status']])); 
          	$data[$r]['lead_source'] 	= ucwords(strtolower($GLOBALS['app_list_strings']['lead_source_dom'][$row['lead_source']]));
			$data[$r]['phone_mobile'] 	= $row['phone_mobile'];
			$data[$r]['account_name'] 	= ucwords(strtolower($row['account_name']));
			$data[$r]['firm'] 	        = ucwords(strtolower($row['firm']));
			$data[$r]['architect'] 	    = ucwords(strtolower($row['architect']));
			$data[$r]['amount'] 	    = $row['amount'];
					
			$data[$r]['user_name'] 		= trim($row['user_name']);
            $data[$r]['user_name']      = ucwords(strtolower($data[$r]['user_name']));
            $data[$r]['team_name'] 		= trim($row['team_name']);
           
            $r++;
        }//end of while
        $MData = $data;
        $data = '';
        
        $index = 1;
        if(!empty($MData))
        {
			foreach($MData as $d) 
            {               		
				$data .= '<tr height="25">';
				$data .= '<td><label><b><a href="index.php?module=Leads&action=DetailView&record='.$d['id'].'">'.$d['lead_name'].'</a></b></lable></td>';
				$data .= '<td><label>'.$d['status'].'</lable></td>';
				$data .= '<td><label>'.$d['lead_source'].'</lable></td>';
				$data .= '<td><label>'.$d['phone_mobile'].'</lable></td>';
				$data .= '<td><label>'.$d['account_name'].'</lable></td>';
				$data .= '<td><label>'.$d['firm'].'</lable></td>';
				$data .= '<td><label>'.$d['architect'].'</lable></td>';
				$data .= '<td><label>'.$d['amount'].'</lable></td>';
				$data .= '<td><label>'.$hidden.$d['user_name'].'</lable></td>';
				$data .= '<td><label>'.$d['team_name'].'</lable></td>';
				$data .= '</tr>';
				
                if($index >= 50)    
                    break;
                $index++;
            }
         } 
        
        echo $data;
        
function roundToFifty($roundee)
{
  $r = $roundee % 50;
  $tmp = ($r <= 25) ? $roundee - $r : $roundee + (50 - $r);
  return ($tmp - 50) + 1 ;
}        
?>