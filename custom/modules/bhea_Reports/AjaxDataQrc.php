<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
ini_set("display_errors","Off");
require_once('include/entryPoint.php');
global $db;

/**
Collect all filter
*/
//1. branches filter
$branches = $_REQUEST['branches'];
if(!empty($branches))
{
    if(is_array($branches))
    {
        $tmp = '';
        foreach($branches as $b_id)
        {
            if(!empty($b_id)) {
                if(empty($tmp))
                    $tmp  = "'".$b_id."'";
                else    
                    $tmp .= ",'".$b_id."'";
            }
        }
        if(!empty($tmp))
            $branches = " and B.id in ($tmp) ";
        else
            $branches = '';
    }
}


//2. regions filter
$regions = $_REQUEST['regions'];
if(!empty($regions))
{
    if(is_array($regions))
    {
        $tmp = '';
        foreach($regions as $b_id)
        {
            if(!empty($b_id)) {
                if(empty($tmp))
                    $tmp  = "'".$b_id."'";
                else    
                    $tmp .= ",'".$b_id."'";
            }
        }
        if(!empty($tmp))
            $regions = " and R.id in ($tmp) ";
         else
            $regions = '';
    } 
}

//3. zones filter
$zones = $_REQUEST['zones'];
if(!empty($zones))
{
    if(is_array($zones))
    {
        $tmp = '';
        foreach($zones as $b_id)
        {
            if(!empty($b_id)) {
                if(empty($tmp))
                    $tmp  = "'".$b_id."'";
                else    
                    $tmp .= ",'".$b_id."'";
            }
        }
        if(!empty($tmp))
            $zones = " and Z.id in ($tmp) ";
         else
            $zones = '';
        
    } 
}

//4. lead_status filter
$status = $_REQUEST['status'];
if(!empty($status))
{
    if(is_array($status))
    {
        $tmp = '';
        foreach($status as $b_id)
        {
            if(!empty($b_id)) {
                if(empty($tmp))
                    $tmp  = "'".$b_id."'";
                else    
                    $tmp .= ",'".$b_id."'";
            }
        }
        if(!empty($tmp))
            $status = " and C.status in ($tmp) ";
        else
            $status ='';
            
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
            $assigned_users = " and C.assigned_user_id in ($tmp) ";
        else
            $assigned_users = '';
    } 
}
// 6.products filter
$products = $_REQUEST['products'];
$product_where= '';
if(!empty($products))
{
    if(is_array($products))
    {
        $tmp = '';
        foreach($products as $b_id)
        {
            if(!empty($b_id)) {  
                if(empty($tmp)) 
                    $tmp  = " and P.id in ( '".$b_id."' ";
                else    
                    $tmp .= " , '".$b_id."' ";
            }
        }
        if(!empty($tmp)) 
            $tmp .= ' ) ';
        if(!empty($tmp))
            $product_where = " $tmp ";
    } 
 }

//7.Status Unaltered for
$status_unaltere = '';
if(!empty($_REQUEST['status_duration']))
{
    $du = intval($_REQUEST['status_duration'][0]);
    if($du > 0)
     $status_unaltere =  " and ( C.id not in (SELECT parent_id FROM `cases_audit` WHERE  `date_created` >= ( CURDATE() - INTERVAL $du DAY ) and field_name='status') )  ";
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
    $from_date = " and C.date_entered >= '$from_date' ";
}
$to_date = $_REQUEST['to_date'];
if(!empty($to_date))
{
    $tmp = explode("/",$to_date);
    if( count($tmp) == 3)
    {
        $to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]+1);
    } else 
    $to_date = '';
}
if(!empty($to_date))
{
     $to_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($to_date)));
             $to_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($to_date)));
    $to_date = " and C.date_entered <= '$to_date' ";
} 





          //QRC Source filter
        $source = $_REQUEST['source'];
        if(!empty($source))
        {
            if(is_array($source))
            {
                $tmp = '';
                foreach($source as $b_id)
                {
                    if(!empty($b_id)) {
                        if(empty($tmp))
                            $tmp  = "'".$b_id."'";
                        else    
                            $tmp .= ",'".$b_id."'";
                    }
                }
                if(!empty($tmp))
                    $source = " and C.type in ($tmp) ";
                else
                    $source ='';
                    
            } 
        }
         
      
        
        //Customer Type filter
        $customer_type = $_REQUEST['customer_type'];
        if(!empty($customer_type))
        {
            if(is_array($customer_type))
            {
                $tmp = '';
                foreach($customer_type as $b_id)
                {
                    if(!empty($b_id)) {
                        if(empty($tmp))
                            $tmp  = "'".$b_id."'";
                        else    
                            $tmp .= ",'".$b_id."'";
                    }
                }
                if(!empty($tmp))
                    $customer_type = " and CC.customer_type_c in ($tmp) ";
                else
                    $customer_type ='';
                    
            } 
        }

// Type of Ticket filter
        $ticket_type = $_REQUEST['ticket_type'];
        if(!empty($ticket_type))
        {
            if(is_array($ticket_type))
            {
                $tmp = '';
                foreach($ticket_type as $b_id)
                {
                    if(!empty($b_id)) {
                        if(empty($tmp))
                            $tmp  = "'".$b_id."'";
                        else    
                            $tmp .= ",'".$b_id."'";
                    }
                }
                if(!empty($tmp))
                    $ticket_type = " and CC.activity_c in ($tmp) ";
                else
                    $ticket_type ='';
                    
            } 
        }
        // Description (Despostion) filter
        $description = $_REQUEST['description'];
        if(!empty($description))
        {
            if(is_array($description))
            {
                $tmp = '';
                foreach($description as $b_id)
                {
                    if(!empty($b_id)) {
                        if(empty($tmp))
                            $tmp  = "'".$b_id."'";
                        else    
                            $tmp .= ",'".$b_id."'";
                    }
                }
                if(!empty($tmp))
                    $description = " and CC.disposition_c in ($tmp) ";
                else
                    $description ='';
                    
            } 
        }











$limit = '';
if(!empty($_REQUEST['curr_index'])) {
    if($_REQUEST['curr_index'] =='end') 
    {
         $query = " SeLECT 
             count(C.id) as total_rows
        FROM 
            cases AS C join cases_cstm AS CC on C.id=CC.id_c
            
            left join accounts as A ON A.id=C.account_id and A.deleted=0
            left join leads_cases_1_c as LC ON LC.leads_cases_1cases_idb=C.id and LC.deleted=0 
            left join leads as L ON L.id = LC.leads_cases_1leads_ida and L.deleted=0
            left join bhea_demographics as B ON B.id=CC.bhea_demographics_id_c and B.deleted=0
            left join bhea_regions as R ON R.id=CC.bhea_regions_id_c and R.deleted=0
            left join bhea_zones AS Z ON Z.id = CC.bhea_zones_id_c and Z.deleted=0
            left join users as U ON U.id=C.assigned_user_id and U.deleted=0 
            left join quote_products_cases_1_c AS PC ON PC.quote_products_cases_1cases_idb=C.id and PC.deleted=0 
            left join quote_products AS P ON P.id=PC.quote_products_cases_1quote_products_ida and P.deleted=0
        where C.deleted=0  
            $from_date
            $to_date
            $branches
            $regions
            $zones
            $status
                          $source
            $customer_type
            $assigned_users
            $ticket_type
            $description
            $status_unaltere
            $product_where
         
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
          $query = "  SeLECT 
            C.id as id,
             CC.case_id_c,
             C.name as subject,
             A.name as cust_name,
             CC.disposition_c,
             CC.customer_type_c,
             C.type,
             C.status,
             CC.activity_c,
             P.name as products_c,
             DATE_FORMAT(C.date_entered,'%d/%m/%Y %H:%i:%s') as date_entered,
             B.name as branch_name,
             R.name as region_name,
             Z.name as zone_name,
             CC.ageing_c,
             CC.name_c as miscellaneous_cust_name,
             CONCAT(IFNULL(U.first_name,''),' ',IFNULL(U.last_name,'')) as user_name
        FROM 
            cases AS C join cases_cstm AS CC on C.id=CC.id_c
            
            left join accounts as A ON A.id=C.account_id and A.deleted=0
            left join leads_cases_1_c as LC ON LC.leads_cases_1cases_idb=C.id and LC.deleted=0 
            left join leads as L ON L.id = LC.leads_cases_1leads_ida and L.deleted=0
            
            left join bhea_demographics as B ON B.id=CC.bhea_demographics_id_c and B.deleted=0
            left join bhea_regions as R ON R.id=CC.bhea_regions_id_c and R.deleted=0
            left join bhea_zones AS Z ON Z.id = CC.bhea_zones_id_c and Z.deleted=0
            left join users as U ON U.id=C.assigned_user_id and U.deleted=0 
            left join quote_products_cases_1_c AS PC ON PC.quote_products_cases_1cases_idb=C.id and PC.deleted=0 
            left join quote_products AS P ON P.id=PC.quote_products_cases_1quote_products_ida and P.deleted=0
        where C.deleted=0  
            $from_date
            $to_date
            $branches
            $regions
            $zones
            $status
            $source
            $customer_type
            $assigned_users
            $ticket_type
            $description
            $status_unaltere
            $product_where
        ORDER BY  CC.case_id_c DESC      $limit
        ";
                                           
        $result = $db->query($query);
        $data = array();
        $r = 1;
        while($row = $db->fetchByAssoc($result))
        {
             $data[$r]['id']             = $row['id'];
            $data[$r]['case_id_c']      = $row['case_id_c'];
            $data[$r]['subject']        = ucwords(strtolower($row['subject']));
           $data[$r]['cutomer_type_c'] = ucwords(strtolower($GLOBALS['app_list_strings']['customer_type_c_list'][$row['customer_type_c']]));
           
             if($row['customer_type_c'] == 'Prospect')
                $data[$r]['cust_name']  = ucwords(strtolower($row['lead_name']));
            else  if($row['customer_type_c'] == 'Miscellaneous_Customer')
                $data[$r]['cust_name']  = ucwords(strtolower($row['miscellaneous_cust_name']));
              else
                $data[$r]['cust_name']  = ucwords(strtolower($row['cust_name']));
            $data[$r]['type']           = ucwords(strtolower($GLOBALS['app_list_strings']['case_type_dom'][$row['type']]));
            $data[$r]['status']         = ucwords(strtolower($GLOBALS['app_list_strings']['case_status_dom'][$row['status']]));
            $data[$r]['activity_c']     = ucwords(strtolower($GLOBALS['app_list_strings']['activity_list'][$row['activity_c']]));
            $data[$r]['disposition_c']  = ucwords(strtolower($GLOBALS['app_list_strings']['disposition_c_list'][$row['disposition_c']]));
            $data[$r]['products_c']     = ucwords(strtolower($row['products_c']));
            $data[$r]['branch_name']    = ucwords(strtolower($row['branch_name']));
            $data[$r]['region_name']    = ucwords(strtolower($row['region_name']));
            $data[$r]['zone_name']      = ucwords(strtolower($row['zone_name']));
            $data[$r]['date_entered']   = $row['date_entered'];
            $data[$r]['ageing_c']       = trim($row['ageing_c']);
            $data[$r]['user_name']      = ucwords(strtolower($row['user_name']));
            
           
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
                $data .= '<td><label>'.$d['case_id_c'].'</lable></td>';
                $data .= '<td><label><b><a href="index.php?module=Cases&action=DetailView&record='.$d['id'].'">'.$d['subject'].'</a></b></lable></td>';
                $data .= '<td><label>'.$d['cutomer_type_c'].'</lable></td>';
                $data .= '<td><label>'.$d['cust_name'].'</lable></td>';
                $data .= '<td><label>'.$d['type'].'</lable></td>';
                $data .= '<td><label>'.$d['status'].'</lable></td>';
                $data .= '<td><label>'.$d['activity_c'].'</lable></td>';
                $data .= '<td><label>'.$d['disposition_c'].'</lable></td>';
                $data .= '<td><label>'.$d['products_c'].'</lable></td>';
                $data .= '<td><label>'.$d['branch_name'].'</lable></td>';
                $data .= '<td><label>'.$d['region_name'].'</lable></td>';
                $data .= '<td><label>'.$d['zone_name'].'</lable></td>';
                $data .= '<td><label>'.$d['date_entered'].'</lable></td>';
                $data .= '<td><label>'.$d['ageing_c'].'</lable></td>';
                $data .= '<td><label>'.$hidden.$d['user_name'].'</lable></td>';
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