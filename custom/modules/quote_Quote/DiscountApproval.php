<?php
//~ ini_set('display_errors','On');
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
   
class DiscountApproval
{
		static $already_ran = false;
		
		function approval_status_check($bean, $event, $arguments) {
			
			
			
			if(($bean->fetched_row['approval_status_c'] != $bean->approval_status_c) && ($bean->fetched_row['approval_status_c'] != 'Approved'))
			$bean->approved_c = 0;
		}
		
        function discount_approval($bean,$event,$arguments)
        {
	
			if(self::$already_ran == true) return;
			self::$already_ran = true;
            
            
            global $db, $current_user,$app_list_strings,$sugar_config; 
            $approval_status = $bean->approval_status_c;
             if($bean->approved_c == 1) {
                 return;
             }
            $dutyfree_arr = array_filter(array_keys($app_list_strings['dutyfree_list']));
            $dutyfree = $bean->dutyfree_c; // EURODutyFree or INRDutyFree
            $loginuser_id = $current_user->id;
            $billing_account_id = $_REQUEST['quote_quote_accountsaccounts_ida'];
            $query_account_details = "SELECT name from accounts where id ='$billing_account_id' and deleted=0";
            $result_account_details = $db->query($query_account_details);
            $row_account_details = $db->fetchByAssoc($result_account_details);
            $account_name = $row_account_details['name'];
            $name = $bean->name;
            $quote_id = $bean->id;
            $quote_number = $bean->custom_quote_num_c;
            $total_amount= $bean->sub_total;
            $assigned_user_id = $bean->assigned_user_id;
            $discount_amount = $bean->discount; 
            $module ='quote_Quote';
            require_once("modules/ACLRoles/ACLRole.php");
            $acl_role_obj = new ACLRole(); 
            $user_roles = $acl_role_obj->getUserRoles($current_user->id);
			//print_r($user_roles);exit;
            $current_user_role = $user_roles[0];
            if($bean->discount == 0.00) {
				$total_unit_price = $this->getTotalUnitPrice($bean->id, $bean->branch_c);
				if($total_unit_price > 0) {
					$discount_amount = $total_unit_price - $total_amount;
				}
			}
            
            $discount = intval(($discount_amount/$total_amount)*100);
			
            $fetch_reports_to_query = "select reports_to_id from users where id ='$assigned_user_id' and deleted='0'";
            $fetch_reports_to_result=$db->query($fetch_reports_to_query);
            $fetch_reports_to_row = $db->fetchByAssoc($fetch_reports_to_result);
            $reports_to_supervisor = $fetch_reports_to_row['reports_to_id'];
                            
            $current_user_id = $current_user->id;                
            
            $query_discount_approval = "SELECT approval_levels_c from scrm_discount_approval_matrix_cstm JOIN scrm_discount_approval_matrix ON id_c=id where role1_c='$current_user_role' OR role2_c='$current_user_role' OR role3_c='$current_user_role' and deleted=0";
            $result = $db->query($query_discount_approval);
            $row = $db->fetchByAssoc($result);
            $approval_level = $row['approval_levels_c'];
            $Approved = explode('^',$approval_level);
			
            
            require_once('include/SugarPHPMailer.php');
            $emailObj = new Email();
            $defaults = $emailObj->getSystemDefaultEmail();
            $mail = new SugarPHPMailer();
            $mail->setMailerForSystem();
            $mail->From = $defaults['email'];
            //$mail->From .= 'Content-type: text/html\r\n';
            $mail->FromName = $defaults['name'];
                        
            

                if($current_user_role == 'Sales Representative')
                {
				
                if(in_array('Level1', $Approved))
                {
                    
                    $query_discount_approval ="SELECT discount1_c from scrm_discount_approval_matrix_cstm JOIN scrm_discount_approval_matrix ON id_c=id where approval_levels_c='$approval_level'";
                    $result_discount_approval = $db->query($query_discount_approval);
                    $row_approval = $db->fetchByAssoc($result_discount_approval);
                    $discount1_c = $row_approval['discount1_c'];
                    
                    if($discount <= $discount1_c)
                    {
                        $update_quote = "UPDATE quote_quote_cstm  SET approval_status_c='Approved', approved_c = 1 where id_c='$quote_id'";
                        $result_quote = $db->query($update_quote);
                         
                    }
                        else if($discount > $discount1_c)
                        {
                            
                        $query_reports_to = "SELECT ea.email_address  as email FROM email_addr_bean_rel eabr JOIN email_addresses ea ON eabr.email_address_id = ea.id WHERE eabr.bean_id = '$reports_to_supervisor' and eabr.deleted='0' and eabr.bean_module='Users'";
                        $query_reports_to_result = $db->query($query_reports_to);
                        $select_from_result = $db->fetchByAssoc($query_reports_to_result);
                        
                        $reports_to_email = $select_from_result['email'];
                        $update_quote = "UPDATE quote_quote_cstm SET approval_status_c='Pending_Approval' where id_c='$quote_id'";
                        $result_quote = $db->query($update_quote);
                        
                        $subject = 'New Quote For Approval';
                        $mail->Subject = $subject;
                        $mail->IsHTML(true);
                        $body = <<<Email
									<p>Hello,</p>
									<p>Please find below quote details for your approval. Kindly review and let me know if any changes are required.</p>
									<br>
									<p>Account: $account_name</p>
									<p>Subject: $name</p>
									<p>Quote Number: $quote_number</p>
									<br>
									<br> 
									<p>Thanks,</p>
									<p>Squarefoot</p>
									<br>
									<p>You may review this Quote at:</p>
									http://18.139.239.214/squarefoot/prodbackup/index.php?action=DetailView&module=quote_Quote&record=$quote_id
Email;
                        $mail->Body = $body;
                        $mail->prepForOutbound();
                        $mail->AddAddress($reports_to_email);
                        if (!$mail->Send()){
                            $GLOBALS['log']->fatal('Email Send : Error Info:'.$mail->ErrorInfo);
                        }
                        
                        
                        }
            } 
            } else if($current_user_role == 'Regional Manager')
                {
                if(in_array('Level2', $Approved))
                {
                    $query_discount_approval ="SELECT discount2_c from scrm_discount_approval_matrix_cstm JOIN scrm_discount_approval_matrix ON id_c=id where approval_levels_c='$approval_level'";
                    $result_discount_approval = $db->query($query_discount_approval);
                    $row_approval = $db->fetchByAssoc($result_discount_approval);
                    $discount1_c = $row_approval['discount2_c'];
                    
                    if($discount <= $discount1_c)
                    {
                        $update_quote = "UPDATE quote_quote_cstm  SET approval_status_c='Approved', approved_c = 1 where id_c='$quote_id'"; 
                        $result_quote = $db->query($update_quote);
                        
                        
                        
                         
                    }
                        else if($discount > $discount1_c)
                        {
                            
                        $query_reports_to = "SELECT ea.email_address  as email FROM email_addr_bean_rel eabr JOIN email_addresses ea ON eabr.email_address_id = ea.id WHERE eabr.bean_id = '$reports_to_supervisor' and eabr.deleted='0' and eabr.bean_module='Users'";
                        $query_reports_to_result = $db->query($query_reports_to);
                        $select_from_result = $db->fetchByAssoc($query_reports_to_result);
                
                        $reports_to_email = $select_from_result['email'];
                        $update_quote = "UPDATE quote_quote_cstm SET approval_status_c='Pending_Approval' where id_c='$quote_id'";
                        $result_quote = $db->query($update_quote);
                        
                        $subject = 'New Quote For Approval';
                        $mail->Subject = $subject;
                        $mail->IsHTML(true);
                        $body = <<<Email
                    <p>Hello,</p>
                    <p>Please find below quote details for your approval. Kindly review and let me know if any changes are required.</p>
                    <br>
                    <p>Account: $account_name</p>
                    <p>Subject: $name</p>
                    <p>Quote Number: $quote_number</p>
                    <br>
                    <br> 
                    <p>Thanks,</p>
                    <p>Squarefoot</p>
                    <br>
                    <p>You may review this Quote at:</p>
                    http://18.139.239.214/squarefoot/prodbackup/index.php?action=DetailView&module=quote_Quote&record=$quote_id
Email;
                        $mail->Body = $body;
                        $mail->prepForOutbound();
                        $mail->AddAddress($reports_to_email);
                        $mail->AddCC('malathir@squarefoot.co.in');
                        if (!$mail->Send()){
                            $GLOBALS['log']->fatal('Email Send : Error Info:'.$mail->ErrorInfo);
                        }
                        
                        
                        }
            }
            } else if($current_user_role == 'Sales Director')
                {
            
                if(in_array('Level3', $Approved))
                {
                    $query_discount_approval ="SELECT discount3_c from scrm_discount_approval_matrix_cstm JOIN scrm_discount_approval_matrix ON id_c=id where approval_levels_c='$approval_level'";
                    $result_discount_approval = $db->query($query_discount_approval);
                    $row_approval = $db->fetchByAssoc($result_discount_approval);
                    $discount1_c = $row_approval['discount3_c'];
                    
                    if($discount <= $discount1_c)
                    {
                        $update_quote = "UPDATE quote_quote_cstm  SET approval_status_c='Approved', approved_c = 1 where id_c='$quote_id'";
                        $result_quote = $db->query($update_quote);
                        
                        
                    }
                        else if($discount > $discount1_c)
                        {
                            
                        $query_reports_to = "SELECT ea.email_address  as email FROM email_addr_bean_rel eabr JOIN email_addresses ea ON eabr.email_address_id = ea.id WHERE eabr.bean_id = '$reports_to_supervisor' and eabr.deleted='0' and eabr.bean_module='Users'";
                        $query_reports_to_result = $db->query($query_reports_to);
                        $select_from_result = $db->fetchByAssoc($query_reports_to_result);
                
                        $reports_to_email = $select_from_result['email'];
                        $update_quote = "UPDATE quote_quote_cstm SET approval_status_c='Pending_Approval' where id_c='$quote_id'";
                        $result_quote = $db->query($update_quote);
                        
                        $subject = 'New Quote For Approval';
                        $mail->Subject = $subject;
                        $mail->IsHTML(true);
                        $body = <<<Email
                    <p>Hello,</p>
                    <p>Please find below quote details for your approval. Kindly review and let me know if any changes are required.</p>
                    <br>
                    <p>Account: $account_name</p>
                    <p>Subject: $name</p>
                    <p>Quote Number: $quote_number</p>
                    <br>
                    <br> 
                    <p>Thanks,</p>
                    <p>Squarefoot</p>
                    <br>
                    <p>You may review this Quote at:</p>
                    http://18.139.239.214/squarefoot/prodbackup/index.php?action=DetailView&module=quote_Quote&record=$quote_id
Email;
                        $mail->Body = $body;
                        $mail->prepForOutbound();
                        $mail->AddAddress($reports_to_email);
                        if (!$mail->Send()){
                            $GLOBALS['log']->fatal('Email Send : Error Info:'.$mail->ErrorInfo);
                        }
                        
                        
                        }
            }
        }
            else
            {

                    $query_reports_to = "SELECT ea.email_address  as email FROM email_addr_bean_rel eabr JOIN email_addresses ea ON eabr.email_address_id = ea.id WHERE eabr.bean_id = '$reports_to_supervisor' and eabr.deleted='0' and eabr.bean_module='Users'";
                        $query_reports_to_result = $db->query($query_reports_to);
                        $select_from_result = $db->fetchByAssoc($query_reports_to_result);
                
                        $reports_to_email = $select_from_result['email'];

                        
                        $update_quote = "UPDATE quote_quote_cstm SET approval_status_c='Pending_Approval' where id_c='$quote_id'";
                        $result_quote = $db->query($update_quote);
                            
                        
                        $subject = 'New Quote For Approval';
                        $mail->Subject = $subject;
                        $mail->IsHTML(true);
                        $body = <<<Email
                    <p>Hello,</p>
                    <p>Please find below quote details for your approval. Kindly review and let me know if any changes are required.</p>
                    <br>
                    <p>Account: $account_name</p>
                    <p>Subject: $name</p>
                    <p>Quote Number: $quote_number</p>
                    <br>
                    <br> 
                    <p>Thanks,</p>
                    <p>squarefoot</p>
                    <br>
                    <p>You may review this Quote at:</p>
                    http://18.139.239.214/squarefoot/prodbackup/index.php?action=DetailView&module=quote_Quote&record=$quote_id
Email;
                        $mail->Body = $body;
                        $mail->prepForOutbound();
                        $mail->AddAddress($reports_to_email);
                        if (!$mail->Send()){
                            $GLOBALS['log']->fatal('Email Send : Error Info:'.$mail->ErrorInfo);
                        }
            }
    }
    
    
    public function getTotalUnitPrice($quote_id, $branch) 
    {
		global $db;
		$Total_unit_price = 0;
		$query2 = "SELECT qp . * , qpc . *, qq.quantity
						FROM quote_products qp
						JOIN quote_products_cstm qpc ON qp.id = qpc.id_c
						JOIN quote_quoteproducts qq ON qp.id = qq.product_id
						AND qq.deleted =0
						WHERE qq.quote_id =  '".$quote_id."'
						AND qp.deleted =0";
                $des2 = $db->query($query2);
                while($row2 = $db->fetchByAssoc($des2)) {
					
                $tax_class = $row2['tax_class_c'];
                $uom = $row2['uom_c'];
                $type = $row2['type_c'];
                $hsn_code = $row2['hsn_code_c'];
                $sac_code = $row2['sac_code_c'];
                $gst = $row2['gst_c'];
                $unit_price = $row2['unit_price_c'];
                $bangalore_unit_price = $row2['bangalore_unit_price_c'];
                $chennai_unit_price = $row2['chennai_unit_price_c'];
                $kerala_unit_price = $row2['kerala_unit_price_c'];
                $kolkata_unit_price = $row2['kolkata_unit_price_c'];
                $delhi_unit_price = $row2['delhi_unit_price_c'];
                $hyderabad_unit_price = $row2['hyderabad_unit_price_c'];
                $mumbai_unit_price = $row2['mumbai_unit_price_c'];
                $pune_unit_price = $row2['pune_unit_price_c'];
                $goa_unit_price = $row2['goa_unit_price_c'];
                $gujarat_unit_price = $row2['gujarat_unit_price_c'];
                $haryana_unit_price = $row2['haryana_unit_price_c'];
                $up_unit_price = $row2['up_unit_price_c'];
                $quantity = $row2['quantity'];
                
                
                if ($branch == 'Bangalore') {
                    if ($bangalore_unit_price != '') {
                        $unit_price = $bangalore_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Chennai') {
                    if ($chennai_unit_price != '') {
                        $unit_price = $chennai_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Kerala') {
                    if ($kerala_unit_price != '') {
                        $unit_price = $kerala_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Kolkata') {
                    if ($kolkata_unit_price != '') {
                        $unit_price = $kolkata_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Delhi') {
                    if ($delhi_unit_price != '') {
                        $unit_price = $delhi_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Hyderabad') {
                    if ($hyderabad_unit_price != '') {
                        $unit_price = $hyderabad_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Mumbai') {
                    if ($mumbai_unit_price != '') {
                        $unit_price = $mumbai_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Pune') {
                    if ($pune_unit_price != '') {
                        $unit_price = $pune_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Pune') {
                    if ($pune_unit_price != '') {
                        $unit_price = $pune_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'goa') {
                    if ($goa_unit_price != '') {
                        $unit_price = $goa_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Gujarat') {
                    if ($gujarat_unit_price != '') {
                        $unit_price = $gujarat_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'Gurgaon') {
                    if ($harayana_unit_price != '') {
                        $unit_price = $harayana_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                } else if ($branch == 'NOIDA') {
                    if ($up_unit_price != '') {
                        $unit_price = $up_unit_price;
                    } else {
                        $unit_price = $unit_price;
                    }
                }
                $unit_price = $quantity * $unit_price;
                $Total_unit_price += $unit_price;
		
	}
	$Total_unit_price = round($Total_unit_price, 2);
	return $Total_unit_price;
	}

    function give_discount_approval_malathi_and_nalini($bean,$event,$arguments)
    {
           
            global $db, $current_user,$app_list_strings,$sugar_config; 
            
            $approval_status = $bean->approval_status_c; 
            
             if($approval_status == 'Approved') {
                 return;
             }

             $dutyfree_arr = array_filter(array_keys($app_list_strings['dutyfree_list']));
             $dutyfree = $bean->dutyfree_c; // EURODutyFree or INRDutyFree
             $loginuser_id = $current_user->id;
             $quote_id = $bean->id;

              //added by pratik on 07022020 to give access of approval quote on discounted applied quoatation(Malathi/Nalini user) start:
                if(!in_array($dutyfree,$dutyfree_arr))
                {
                    $approval_user_ids = array('b118285b-fc33-1bdf-c816-560bacbad068',
                                '627e6b23-9166-e4db-0359-5e3bf9442be3');
                    if(in_array($loginuser_id,$approval_user_ids))
                    {
                        $update_quote = "UPDATE quote_quote_cstm  SET approval_status_c='Approved', approved_c = 1 where id_c='$quote_id'";
                         $result_quote = $db->query($update_quote);        
                    }
                }
                //end
    }        
}
?>