<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
ini_set("display_errors","Off");
require_once('include/entryPoint.php');
global $db;

/**
Collect all filter
*/
 //From Date & To Date filter Condition
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
            $from_date = " and O.date_entered >= '$from_date' ";
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
            $to_date = " and O.date_entered <= '$to_date' ";
        }
        
		      //Expected Date Closed filter
		
		 //From Excepted Date & To Excepted Date filter Condition
        $exp_from_date = $_REQUEST['date_closedf']; 
        if(!empty($exp_from_date))
        {
            $tmp = explode("/",$exp_from_date);
            if( count($tmp) == 3)
            {
                 
                $exp_from_date = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
            } else 
            $exp_from_date = '';
        }
        if(!empty($exp_from_date))
        {
            $exp_from_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($exp_from_date)));
            $exp_from_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($exp_from_date)));
            $exp_from_date = " and O.date_closed >= '$exp_from_date' ";
        }
        $exp_to_date = $_REQUEST['date_closedt'];
        if(!empty($exp_to_date))
        {
            $tmp = explode("/",$exp_to_date);
            if( count($tmp) == 3)
            {
                $exp_to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]+1);
            } else 
            $exp_to_date = '';
        }
        if(!empty($exp_to_date))
        {
            $exp_to_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($exp_to_date)));
            $exp_to_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($exp_to_date)));
            $exp_to_date = " and O.date_closed <= '$exp_to_date' ";
        }
       /* //Expected Date Closed filter
        $date_closed = $_REQUEST['date_closed'];
        if(!empty($date_closed))
        {
            $tmp = explode("/",$date_closed);
            if( count($tmp) == 3)
            {
                $date_closed1 = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]);
                $date_closed2 = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]+1);
            } else {
            $date_closed1 = '';
            $date_closed2 = ''; 
            $date_closed = '';
            
            }
        }
        if(!empty($date_closed1))
        {
            $date_closed1 = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($date_closed1)));
            $date_closed1 = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($date_closed1)));
            $date_closed2 = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($date_closed2)));
            $date_closed2 = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($date_closed2)));
            $date_closed = " and ( O.date_closed <= '$date_closed2' and O.date_closed >= '$date_closed1' ) ";
        }*/
         

        //Sales Stage filter
        $sales_stage = $_REQUEST['sales_stage'];
        if(!empty($sales_stage))
        {
            if(is_array($sales_stage))
            {
                $tmp = '';
                foreach($sales_stage as $b_id)
                {
                    if(!empty($b_id)) {
                        if(empty($tmp))
                            $tmp  = "'".$b_id."'";
                        else    
                            $tmp .= ",'".$b_id."'";
                    }
                }
                if(!empty($tmp))
                    $sales_stage = " and O.sales_stage in ($tmp) ";
                else
                    $sales_stage ='';
                    
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
                    $lead_source = " and O.lead_source in ($tmp) ";
                else
                    $lead_source ='';
                    
            } 
        }
		        
        //assigned_users filter
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
                    $assigned_users = " and O.assigned_user_id in ($tmp) ";
                else
                    $assigned_users = '';
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
                    $assigned_users_team = " and O.team_id in ($tmp) ";
                else
                    $assigned_users_team = '';
            } 
        }
		

$limit = '';
if(!empty($_REQUEST['curr_index'])) {
    if($_REQUEST['curr_index'] =='end') 
    {
        $query = " SELECT
             count(O.id) as total_rows
        FROM 
            opportunities AS O join opportunities_cstm OC  ON O.id = OC.id_c
            left join accounts_opportunities as AO ON AO.opportunity_id=O.id and AO.deleted=0
            left join accounts as A ON A.id=AO.account_id and A.deleted=0
            left join team as T ON T.id = O.team_id and T.deleted=0
            left join users as U ON U.id=O.assigned_user_id and U.deleted=0 AND U.status ='Active' 
			
			left join arch_architectural_firm_opportunities_1_c as ARFO 
			ON ARFO.arch_architectural_firm_opportunities_1opportunities_idb=O.id AND ARFO.deleted =0

			left join arch_architectural_firm as ARF 
			ON ARFO.arch_archi003bal_firm_ida=ARF.id and ARF.deleted=0            
			
            left join arch_architects_contacts_opportunities_1_c as ARO
			ON ARO.arch_architects_contacts_opportunities_1opportunities_idb=O.id AND ARO.deleted =0
			
			left join arch_architects_contacts as AR 
			ON ARO.arch_archi342contacts_ida=AR.id and AR.deleted=0
			
        where O.deleted=0 
            $from_date
            $to_date
			$exp_from_date
			$exp_to_date
            $sales_stage
			$lead_source
            $date_closed
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
		//$limit = ' limit '.($_REQUEST['curr_index']).' , '.($_REQUEST['curr_index']+50).' '; 
}
else
   $limit = ' limit 0, 50 ';
   
//Main Query
          $query = " SELECT
             O.id as id,
             O.name as opp_name,
             A.name as cust_name,
             O.amount,
             O.sales_stage,
			 O.lead_source,
			 ARF.name as firm,
			 CONCAT(IFNULL(AR.first_name,''),' ',IFNULL(AR.last_name,'')) as architect,	
             DATE_FORMAT(O.date_closed,'%d/%m/%Y') as date_closed,
                       
             DATE_FORMAT(O.date_entered,'%d/%m/%Y %H:%i:%s') as date_entered,
			 T.name as team_name,
             CONCAT(IFNULL(U.first_name,''),' ',IFNULL(U.last_name,'')) as user_name
        FROM 
            opportunities AS O join opportunities_cstm OC  ON O.id = OC.id_c
            left join accounts_opportunities as AO ON AO.opportunity_id=O.id and AO.deleted=0
            left join accounts as A ON A.id=AO.account_id and A.deleted=0
            left join team as T ON T.id = O.team_id and T.deleted=0
            left join users as U ON U.id=O.assigned_user_id and U.deleted=0 AND U.status ='Active' 
			
			left join arch_architectural_firm_opportunities_1_c as ARFO 
			ON ARFO.arch_architectural_firm_opportunities_1opportunities_idb=O.id AND ARFO.deleted =0

			left join arch_architectural_firm as ARF 
			ON ARFO.arch_archi003bal_firm_ida=ARF.id and ARF.deleted=0            
			
            left join arch_architects_contacts_opportunities_1_c as ARO
			ON ARO.arch_architects_contacts_opportunities_1opportunities_idb=O.id AND ARO.deleted =0
			
			left join arch_architects_contacts as AR 
			ON ARO.arch_archi342contacts_ida=AR.id and AR.deleted=0
			
        where O.deleted=0 
            $from_date
            $to_date      
			$exp_from_date
			$exp_to_date
            $sales_stage  
			$lead_source
            $date_closed
            $assigned_users
            $assigned_users_team    
        ORDER BY  O.date_entered DESC      $limit
        ";
            
        $result = $db->query($query);
        $data = array();
        $r = 1;
        while($row = $db->fetchByAssoc($result))
        {
            $data[$r]['id']           = $row['id'];
            $data[$r]['opp_name']     = ucwords(strtolower($row['opp_name']));
            $data[$r]['cust_name']    = ucwords(strtolower($row['cust_name']));
            $data[$r]['architect']    = ucwords(strtolower($row['architect']));
            $data[$r]['firm']    = ucwords(strtolower($row['firm']));
                        
            $data[$r]['sales_stage']    = $GLOBALS['app_list_strings']['sales_stage_dom'][$row['sales_stage']];
            $data[$r]['lead_source']    = ucwords(strtolower($GLOBALS['app_list_strings']['lead_source_dom'][$row['lead_source']]));
            $data[$r]['amount']         = $row['amount'];
            $data[$r]['close_date']     = $row['date_closed'];
          
            $data[$r]['date_entered']   = $row['date_entered'];
            
            $data[$r]['user_name']      = trim($row['user_name']);
           
            $data[$r]['user_name']      = ucwords(strtolower($data[$r]['user_name']));
			$data[$r]['team_name']      = ucwords(strtolower(trim($row['team_name'])));
           
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
                $data .= '<td><label><b><a href="index.php?module=Opportunities&action=DetailView&record='.$d['id'].'">'.$d['opp_name'].'</a></b></lable></td>';
                $data .= '<td><label>'.$d['cust_name'].'</lable></td>';
                $data .= '<td><label>'.$d['architect'].'</lable></td>';
                $data .= '<td><label>'.$d['firm'].'</lable></td>';
               
                $data .= '<td><label>'.$d['sales_stage'].'</lable></td>';
                $data .= '<td><label>'.$d['lead_source'].'</lable></td>';
                $data .= '<td><label>'.$d['amount'].'</lable></td>';
                $data .= '<td><label>'.$d['close_date'].'</lable></td>';
                
                $data .= '<td><label>'.$d['date_entered'].'</lable></td>';
                
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