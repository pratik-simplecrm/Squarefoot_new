<?php
ini_set("display_errors", "on");
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class Generic_class
{
    function Modules_generic_method($bean, $event, $arguments)
    {
        
        //     echo "<pre>";
        // print_r($bean->table_name);exit();
        
        global $db, $current_user;
        
        $modified_date = $bean->date_modified;
        // echo "anjali";
        $currentDate   = date('Y-m-d');
        
        $user_id = $current_user->id;
        //echo $currentDate.' ---'.date('Y-m-d',strtotime($modified_date));exit;
        //echo date('Y-m-d',strtotime($modified_date));exit;
       // echo date('Y-m-d', strtotime($modified_date).'-->'.$currentDate;exit;
       
            // echo "anjali";
            // exit;
            $query = "SELECT count(id_c) as idcount FROM cstm_activity_count_cstm WHERE userid_c='$user_id' && date_c='$currentDate'";
 

            $result = $db->query($query);
            // print_r($result);exit();
            
            $row1 = $db->fetchByAssoc($result); //print_r($row1);exit;
           // print_r($row1);exit;

           
            
            //if($modified_date== $currentDate){
            // $count= $row['contact_count_c'];
            // echo $count;exit;
            //print_r($bean->table_name);exit;
            $count= 0;
            if (date('Y-m-d', strtotime($modified_date)) != $currentDate) {
                $count= 0;//echo "dsf";exit;
            } 
            if ($row1['idcount'] > 0) {
                
                $query  = "SELECT * FROM cstm_activity_count_cstm WHERE userid_c= '$user_id' && date_c='$currentDate'";
                // echo $query;exit;
                $result = $db->query($query);
                $row    = $db->fetchByAssoc($result);
                // /echo $row['contact_count_c'];exit;
                // print_r($row);exit;
                if (!empty($row)) {
                    // echo $bean->table_name;exit;
                    if ($bean->table_name == 'contacts') {
                        
                        $c = $row['contact_count_c'] + 1;
                        //print_r($c);exit;
                        $sql           = "UPDATE cstm_activity_count_cstm SET contact_count_c = $c WHERE userid_c='$user_id' and date_c='$currentDate'";
                        //echo $sql;exit;
                        //$result=$db->query($a);
                        $result        = $db->query($sql);
                        
                    }
                    if ($bean->table_name == 'opportunities') {
                        
                        $c = $row['opportunity_count_c'] + 1;
                        $sql               = "UPDATE cstm_activity_count_cstm SET opportunity_count_c = $c WHERE userid_c= '$user_id' and date_c='$currentDate'";
                        //$result=$db->query($a);
                        $result            = $db->query($sql);
                        
                    }
                    if ($bean->table_name == 'meetings') {
                        // echo $row['meeting_count_c'];
                        // exit();
                        $c = $row['meeting_count_c'] + 1;
                        $sql            = "UPDATE cstm_activity_count_cstm SET meeting_count_c = $c WHERE userid_c='$user_id' and date_c='$currentDate'";
                        //$result=$db->query($a);
                        $result         = $db->query($sql);
                        
                    }
                    if ($bean->table_name == 'quote_quote') {
                        // echo $row['quote_count_c'];
                        // exit();
                        $c = $row['quote_count_c'] + 1;
                        $sql      = "UPDATE cstm_activity_count_cstm SET quote_count_c = $c WHERE userid_c='$user_id' and date_c='$currentDate'";
                        //$result=$db->query($a);
                        $result   = $db->query($sql);
                        
                    }
                    ////This is for customers modules.
                    if ($bean->table_name == 'accounts') {
                        
                        $c      = $row['customers_count_c'] + 1;
                        $sql    = "UPDATE cstm_activity_count_cstm SET customers_count_c = $c WHERE userid_c= '$user_id' and date_c='$currentDate'";
                        //$result=$db->query($a);
                        $result = $db->query($sql);
                        
                    }
                    if ($bean->table_name == 'calls') {
                        
                        $c      = $row['calls_count_c'] + 1;
                        $sql    = "UPDATE cstm_activity_count_cstm SET calls_count_c = $c WHERE userid_c= '$user_id' and date_c='$currentDate'";
                        //$result=$db->query($a);
                        $result = $db->query($sql);
                        
                    }
                    if ($bean->table_name == 'arch_architectural_firm') {
                        //echo $row['architectural_firm_count_c'] +1;exit;
                        $c      = $row['architectural_firm_count_c'] + 1;
                        $sql    = "UPDATE cstm_activity_count_cstm SET architectural_firm_count_c = $c WHERE userid_c='$user_id' and date_c='$currentDate'";
                        //$result=$db->query($a);
                        $result = $db->query($sql);
                        
                    }
                } else {
                    //echo "Cfdsds";exit();
                    if ($bean->table_name == 'contacts') {
                        $cc     = create_guid();
                        // echo create_guid();
                        // exit();
                        $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',1,0,0,0,0,0,0,'$user_id','$currentDate')";
                        $result = $db->query($query, true, "Error");
                        //print_r($result);exit();
                        
                    }
                    if ($bean->table_name == 'opportunities') {
                        $cc     = create_guid();
                        // echo create_guid();
                        // exit();
                        $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',0,1,0,0,0,0,0,'$user_id','$currentDate')";
                        $result = $db->query($query, true, "Error");
                        //print_r($result);exit();
                        
                    }
                    if ($bean->table_name == 'meetings') {
                        $cc     = create_guid();
                        // echo create_guid();
                        // exit();
                        $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',0,0,1,0,0,0,0,'$user_id','$currentDate')";
                        $result = $db->query($query, true, "Error");
                        //print_r($result);exit();
                        
                    }
                    if ($bean->table_name == 'quote_quote') {
                        $cc     = create_guid();
                        // echo create_guid();
                        // exit();
                        $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',0,0,0,1,0,0,0,'$user_id','$currentDate')";
                        $result = $db->query($query, true, "Error");
                        //print_r($result);exit();
                        
                    }
                    if ($bean->table_name == 'accounts') {
                        $cc     = create_guid();
                        // echo create_guid();
                        // exit();
                        $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',0,0,0,0,1,0,0,'$user_id','$currentDate')";
                        $result = $db->query($query, true, "Error");
                        //print_r($result);exit();
                        
                    }
                    if ($bean->table_name == 'calls') {
                        $cc     = create_guid();
                        // echo create_guid();
                        // exit();
                        $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',0,0,0,0,0,1,0,'$user_id','$currentDate')";
                        $result = $db->query($query, true, "Error");
                        //print_r($result);exit();
                        
                    }
                    if ($bean->table_name == 'arch_architectural_firm') {
                        $cc     = create_guid();
                        // echo create_guid();
                        // exit();
                        $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',0,0,0,0,0,0,1,'$user_id','$currentDate')";
                        $result = $db->query($query, true, "Error");
                        //print_r($result);exit();
                        
                    }
                    
                    
                    
                }
                
            } else {
                if ($bean->table_name == 'contacts') {
                    $cc     = create_guid();
                    // echo create_guid();
                    // exit();
                    $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',1,0,0,0,0,0,0,'$user_id','$currentDate')";
                    $result = $db->query($query, true, "Error");
                    //print_r($result);exit();
                    
                }
                if ($bean->table_name == 'opportunities') {
                    $cc     = create_guid();
                    // echo create_guid();
                    // exit();
                    $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',0,1,0,0,0,0,0,'$user_id','$currentDate')";
                    $result = $db->query($query, true, "Error");
                    //print_r($result);exit();
                    
                }
                if ($bean->table_name == 'meetings') {
                    $cc     = create_guid();
                    // echo create_guid();
                    // exit();
                    $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',0,0,1,0,0,0,0,'$user_id','$currentDate')";
                    $result = $db->query($query, true, "Error");
                    //print_r($result);exit();
                    
                }
                if ($bean->table_name == 'quote_quote') {
                    $cc     = create_guid();
                    // echo create_guid();
                    // exit();
                    $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',0,0,0,1,0,0,0,'$user_id','$currentDate')";
                    $result = $db->query($query, true, "Error");
                    //print_r($result);exit();
                    
                }
                if ($bean->table_name == 'accounts') {
                    $cc     = create_guid();
                    // echo create_guid();
                    // exit();
                    $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',0,0,0,0,1,0,0,'$user_id','$currentDate')";
                    $result = $db->query($query, true, "Error");
                    //print_r($result);exit();
                    
                }
                if ($bean->table_name == 'calls') {
                    $cc     = create_guid();
                    // echo create_guid();
                    // exit();
                    $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',0,0,0,0,0,1,0,'$user_id','$currentDate')";
                    $result = $db->query($query, true, "Error");
                    //print_r($result);exit();
                    
                }
                if ($bean->table_name == 'arch_architectural_firm') {
                    $cc     = create_guid();
                    // echo create_guid();
                    // exit();
                    $query  = "INSERT INTO cstm_activity_count_cstm (id_c,contact_count_c,opportunity_count_c,meeting_count_c,quote_count_c,customers_count_c,calls_count_c,architectural_firm_count_c,userid_c,date_c) VALUES ('$cc',0,0,0,0,0,0,1,'$user_id','$currentDate')";
                    $result = $db->query($query, true, "Error");
                    //print_r($result);exit();
                    
                }
            }
        
    }
}
//}
?>