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
			$assigned_users_team = " and C.team_id in ($tmp) ";
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
            $assigned_users = " and C.assigned_user_id in ($tmp) ";
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
    $from_date = " and C.date_entered >= '$from_date' ";
}
$to_date = $_REQUEST['to_date'];
if(!empty($to_date))
{
    $tmp = explode("/",$to_date);
    if( count($tmp) == 3)
    {
        //$to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]+1);
		$to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]);
		$to_date = date('Y-m-d', strtotime($to_date. ' + 1 days'));
    } else 
    $to_date = '';
}
if(!empty($to_date))
{
     $to_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($to_date)));
             $to_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($to_date)));
    $to_date = " and C.date_entered <= '$to_date' ";
} 


$limit = '';
if(!empty($_REQUEST['curr_index'])) {
    if($_REQUEST['curr_index'] =='end') 
    {
         $query = " SELECT 
             count(C.id) as total_rows
        FROM 
            calls C
			
			LEFT JOIN  users U ON C.assigned_user_id = U.id AND U.deleted=0 AND U.status ='Active' 

			LEFT JOIN  accounts A ON C.parent_id = A.id AND A.deleted=0 AND C.parent_type = 'Accounts'					
			LEFT JOIN  calls_contacts CRC ON C.id = CRC.call_id AND CRC.deleted=0
			LEFT JOIN  contacts Con ON Con.id = CRC.contact_id AND Con.deleted=0
			
			LEFT JOIN  arch_architectural_firm ARF ON C.parent_id=ARF.id AND ARF.deleted=0 
			AND C.parent_type = 'Arch_Architectural_Firm'
			
			LEFT JOIN  arch_architects_contacts AR ON C.parent_id= AR.id AND AR.deleted=0
			AND C.parent_type = 'Arch_Architects_Contacts'
			
			LEFT JOIN team as T ON T.id=C.team_id and T.deleted=0
        WHERE C.deleted=0  
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
          $query = " SELECT
					IFNULL(C.id,'') id,
					IFNULL(C.name,'') calls_name,
					IFNULL(A.id,'') acc_id,
					IFNULL(A.name,'') acc_name,
					IFNULL(Con.id,'') cont_id,
					CONCAT(IFNULL(Con.first_name,''),' ',IFNULL(Con.last_name,'')) contact_full_name,
					IFNULL(ARF.id,'') firm_id,
					IFNULL(ARF.name,'') firm_name,
					IFNULL(AR.id,'') archi_id,
					CONCAT(IFNULL(AR.first_name,''),' ',IFNULL(AR.last_name,'')) archi_full_name,
					IFNULL(C.description,'') calls_description,
					CONCAT(IFNULL(U.first_name,''),' ',IFNULL(U.last_name,'')) as user_name,
					T.name team_name
				FROM calls C 

					LEFT JOIN  users U ON C.assigned_user_id = U.id AND U.deleted=0 AND U.status ='Active' 

					LEFT JOIN  accounts A ON C.parent_id = A.id AND A.deleted=0 AND C.parent_type = 'Accounts'					
					LEFT JOIN  calls_contacts CRC ON C.id = CRC.call_id AND CRC.deleted=0
					LEFT JOIN  contacts Con ON Con.id = CRC.contact_id AND Con.deleted=0
					
					LEFT JOIN  arch_architectural_firm ARF ON C.parent_id=ARF.id AND ARF.deleted=0 
					AND C.parent_type = 'Arch_Architectural_Firm'
					
					LEFT JOIN  arch_architects_contacts AR ON C.parent_id= AR.id AND AR.deleted=0
					AND C.parent_type = 'Arch_Architects_Contacts'
					
					LEFT JOIN team as T ON T.id=C.team_id and T.deleted=0

				WHERE  C.deleted=0
					$from_date
					$to_date
					$assigned_users_team
					$assigned_users
					ORDER BY C.date_entered DESC  $limit
        ";
                                           
        $result = $db->query($query);
        $data = array();
        $r = 1;
        while($row = $db->fetchByAssoc($result))
        {
            $data[$r]['id'] 				= $row['id'];
			$data[$r]['subject'] 	   		= ucwords(strtolower($row['calls_name']));
			
			$data[$r]['acc_id'] 			= $row['acc_id'];
			$data[$r]['acc_name'] 	    	= ucwords(strtolower($row['acc_name']));
            
			$data[$r]['cont_id'] 			= $row['cont_id'];
			$data[$r]['contact_full_name'] 	= ucwords(strtolower($row['contact_full_name']));
           
    	    $data[$r]['firm_id'] 			= $row['firm_id'];
			$data[$r]['firm_name'] 	    	= ucwords(strtolower($row['firm_name']));
			
			$data[$r]['archi_id'] 			= $row['archi_id'];
			$data[$r]['archi_full_name']    = ucwords(strtolower($row['archi_full_name']));
             
			$data[$r]['calls_description'] 	= $row['calls_description'];
					
			$data[$r]['user_name'] 			= trim($row['user_name']);
            $data[$r]['user_name']     		= ucwords(strtolower($data[$r]['user_name']));
            $data[$r]['team_name'] 			= trim($row['team_name']);           
           
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
				$data .= '<td><label><b><a href="index.php?module=Calls&action=DetailView&record='.$d['id'].'">'.$d['subject'].'</a></b></lable></td>';
				$data .= '<td><label><b><a href="index.php?module=Accounts&action=DetailView&record='.$d['acc_id'].'">'.$d['acc_name'].'</a></b></lable></td>';
				$data .= '<td><label><b><a href="index.php?module=Contacts&action=DetailView&record='.$d['cont_id'].'">'.$d['contact_full_name'].'</a></b></lable></td>';				
				$data .= '<td><label><b><a href="index.php?module=Arch_Architectural_Firm&action=DetailView&record='.$d['firm_id'].'">'.$d['firm_name'].'</a></b></lable></td>';
				$data .= '<td><label><b><a href="index.php?module=Arch_Architects_Contacts&action=DetailView&record='.$d['archi_id'].'">'.$d['archi_full_name'].'</a></b></lable></td>';
				$data .= '<td><label>'.$d['calls_description'].'</lable></td>';
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