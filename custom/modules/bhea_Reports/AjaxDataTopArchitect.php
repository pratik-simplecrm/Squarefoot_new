<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
ini_set("display_errors","Off");
require_once('include/entryPoint.php');
global $db;

/**
Collect all filter
*/

//1. Team Filter
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
			$assigned_users_team = " and A.team_id in ($tmp) ";
		else
			$assigned_users_team = '';
	} 
}

//2. assigned_users filter
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
            $assigned_users = " and A.assigned_user_id in ($tmp) ";
        else
            $assigned_users = '';
    } 
}
 
// 3. From Date & 4. To Date filter Condition
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
    $from_date = " and A.date_modified >= '$from_date' ";
}
$to_date = $_REQUEST['to_date'];
if(!empty($to_date))
{
    $tmp = explode("/",$to_date);
    if( count($tmp) == 3)
    {
        $to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]);
		$to_date = date('Y-m-d', strtotime($to_date. ' + 1 days'));		
    } else 
    $to_date = '';
}
if(!empty($to_date))
{
    $to_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($to_date)));
    $to_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($to_date)));
    $to_date = " and A.date_modified <= '$to_date' ";
} 


$limit = '';
if(!empty($_REQUEST['curr_index'])) {
    if($_REQUEST['curr_index'] =='end') 
    {
         $query = " SELECT 
				count(AR.id) as total_rows
				FROM arch_architects_contacts AR
					LEFT OUTER JOIN arch_architects_contacts_opportunities_1_c ARO ON AR.id=ARO.arch_archi342contacts_ida AND ARO.deleted=0

					LEFT OUTER JOIN opportunities O ON O.id=ARO.arch_architects_contacts_opportunities_1opportunities_idb AND O.deleted=0
					
				WHERE AR.deleted=0 
					$from_date
					$to_date
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
          $query = "SELECT IFNULL(O.id,'') opp_id,
						IFNULL(O.name,'') opp_name,
						O.amount opp_amount ,
						O.currency_id opp_amount_currency,
						CONCAT(IFNULL(AR.first_name,''),' ',IFNULL(AR.last_name,'')) archi_name
					FROM arch_architects_contacts AR
						LEFT OUTER JOIN arch_architects_contacts_opportunities_1_c ARO ON AR.id=ARO.arch_archi342contacts_ida AND ARO.deleted=0

						LEFT OUTER JOIN opportunities O ON O.id=ARO.arch_architects_contacts_opportunities_1opportunities_idb AND O.deleted=0
						
					WHERE AR.deleted=0 
						$from_date
						$to_date												
						ORDER BY archi_name  ASC  $limit    ";
		
                                           
        $result = $db->query($query);
        $data = array();
        $r = 1;
        while($row = $db->fetchByAssoc($result))
        {
            $data[$r]['opp_id'] 	= $row['opp_id'];
			$data[$r]['opp_name'] 	= ucwords(strtolower($row['opp_name']));
			$data[$r]['opp_amount'] = $row['opp_amount'];		
			
			$data[$r]['archi_name'] = $row['archi_name'];      
           
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
				$data .= '<td><label><b><a href="index.php?module=Accounts&action=DetailView&record='.$d['opp_id'].'">'.$d['opp_name'].'</a></b></lable></td>';
				$data .= '<td><label>'.$d['opp_amount'].'</lable></td>';
				$data .= '<td><label>'.$hidden.$d['archi_name'].'</lable></td>';
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