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
    $from_date = " and A.date_entered >= '$from_date' ";
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
    $to_date = " and A.date_entered <= '$to_date' ";
} 


$limit = '';
if(!empty($_REQUEST['curr_index'])) {
    if($_REQUEST['curr_index'] =='end') 
    {
         $query = " SELECT 
				count(A.id) as total_rows
			FROM accounts A				
					LEFT JOIN  email_addr_bean_rel E_REL ON A.id=E_REL.bean_id AND E_REL.deleted=0 AND E_REL.primary_address = '1' AND E_REL.bean_module = 'Accounts'
					LEFT JOIN  email_addresses E ON E.id=E_REL.email_address_id AND E.deleted=0
					LEFT JOIN  users U ON A.assigned_user_id=U.id AND U.deleted=0 AND U.status ='Active'
					LEFT JOIN team as T ON T.id=A.team_id and T.deleted=0			
			WHERE A.deleted=0 
            $from_date
            $to_date
            $assigned_users
			$assigned_users_team	
         
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
          $query = "SELECT 
					IFNULL(A.id,'') id,
					IFNULL(A.name,'') accounts_name,
					IFNULL(A.account_type,'') account_type,
					IFNULL(A.phone_office,'') phone_office,
					IFNULL(E.id,'') email_id,
					E.email_address email_address,
					IFNULL(A.website,'') accounts_website,
					IFNULL(A.billing_address_city,'') billing_address_city,
					CONCAT(IFNULL(U.first_name,''),' ',IFNULL(U.last_name,'')) as user_name,
					T.name team_name
				FROM accounts A				
					LEFT JOIN  email_addr_bean_rel E_REL ON A.id=E_REL.bean_id AND E_REL.deleted=0 AND E_REL.primary_address = '1' AND E_REL.bean_module = 'Accounts'
					LEFT JOIN  email_addresses E ON E.id=E_REL.email_address_id AND E.deleted=0
					LEFT JOIN  users U ON A.assigned_user_id=U.id AND U.deleted=0 AND U.status ='Active'
					LEFT JOIN team as T ON T.id=A.team_id and T.deleted=0			
				WHERE A.deleted=0 
					$from_date
					$to_date
					$assigned_users_team
					$assigned_users
					ORDER BY A.date_entered DESC  $limit
        ";
                                           
        $result = $db->query($query);
        $data = array();
        $r = 1;
        while($row = $db->fetchByAssoc($result))
        {
            $data[$r]['id'] 				  = $row['id'];
			$data[$r]['accounts_name'] 	      = ucwords(strtolower($row['accounts_name']));
			
			$data[$r]['account_type']         = ucwords(strtolower($GLOBALS['app_list_strings']['customer_type_list'][$row['account_type']]));
			$data[$r]['phone_office'] 		  = $row['phone_office'];			
            
			$data[$r]['email_id'] 			  = $row['email_id'];
			$data[$r]['email_address'] 		  = $row['email_address'];           
    	                
			$data[$r]['accounts_website'] 	  = $row['accounts_website'];
			$data[$r]['billing_address_city'] = $row['billing_address_city'];
					
			$data[$r]['user_name'] 			  = trim($row['user_name']);
            $data[$r]['user_name']     		  = ucwords(strtolower($data[$r]['user_name']));
            $data[$r]['team_name'] 			  = trim($row['team_name']);          
           
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
				$data .= '<td><label><b><a href="index.php?module=Accounts&action=DetailView&record='.$d['id'].'">'.$d['accounts_name'].'</a></b></lable></td>';
				$data .= '<td><label>'.$d['account_type'].'</lable></td>';
				$data .= '<td><label>'.$d['phone_office'].'</lable></td>';
				$data .= '<td><label>'.$d['email_address'].'</lable></td>';
				$data .= '<td><label>'.$d['accounts_website'].'</lable></td>';
				$data .= '<td><label>'.$d['billing_address_city'].'</lable></td>';
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