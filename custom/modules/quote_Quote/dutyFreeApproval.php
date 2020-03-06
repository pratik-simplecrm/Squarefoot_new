<?php
 //ini_set('display_errors','On');
/*
Written By: Pratik Tambekar on 14022020
Purpose : If the quote is duty free quote then 100% Approval will be given by only Gaurav Saraf
*/
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
   
class DutyFreeApproval
{
		static $already_ran = false;

		function dutyfree_approval($bean,$event,$arguments)
        {
	
			if(self::$already_ran == true) return;
			self::$already_ran = true;
            
            
            global $db, $current_user,$app_list_strings,$sugar_config; 
            // echo "<pre>";
            // print_r($bean);
            // exit;
            $name = $bean->name;
            $quote_number = $bean->custom_quote_num_c;
            $quote_id = $bean->id;
            $dutyfree_arr = array_filter(array_keys($app_list_strings['dutyfree_list']));
            $dutyfree = $bean->dutyfree_c; // EURODutyFree or INRDutyFree
            // Pending_Approval or Not Approved or Approved
            $approval_status = $bean->approval_status_c; 
            $loginuser_id = $current_user->id;
            $approved = $bean->approved_c; // approved=1

            $give_approval_ids = array('b4357f32-4d34-fda8-047f-4e1ef90d7d83');

            //fetch account name start
            $billing_account_id = $_REQUEST['quote_quote_accountsaccounts_ida'];
            $query_account_details = "SELECT name from accounts where id ='$billing_account_id' and deleted=0";
            $result_account_details = $db->query($query_account_details);
            $row_account_details = $db->fetchByAssoc($result_account_details);
            $account_name = $row_account_details['name'];
            //end

            require_once('include/SugarPHPMailer.php');
            $emailObj = new Email();
            $defaults = $emailObj->getSystemDefaultEmail();
            $mail = new SugarPHPMailer();
            $mail->setMailerForSystem();
            $mail->From = $defaults['email'];
            //$mail->From .= 'Content-type: text/html\r\n';
            $mail->FromName = $defaults['name'];

            if(in_array($dutyfree,$dutyfree_arr))
            {
                  
            	if($approved == 1 && $approval_status=='Approved') 
            	{

                	return;
            	}

            	else if(in_array($loginuser_id,$give_approval_ids))
            	{
            		    $update_quote = "UPDATE quote_quote_cstm  SET approval_status_c='Approved', approved_c = 1 where id_c='$quote_id'";
                        $result_quote = $db->query($update_quote);
            	}
            	else if(!in_array($loginuser_id,$give_approval_ids))
            	{

            			$query_reports_to = "SELECT ea.email_address  as email FROM email_addr_bean_rel eabr JOIN email_addresses ea ON eabr.email_address_id = ea.id WHERE eabr.bean_id = 'b4357f32-4d34-fda8-047f-4e1ef90d7d83' and eabr.deleted='0' 
            			and eabr.bean_module='Users'";
                        $query_reports_to_result = $db->query($query_reports_to);
                        $select_from_result = $db->fetchByAssoc($query_reports_to_result);
                        
                        $reports_to_email = $select_from_result['email'];
                        $update_quote = "UPDATE quote_quote_cstm SET approval_status_c='Pending_Approval' where id_c='$quote_id'";
                        $result_quote = $db->query($update_quote);
                       
                        $subject = 'Duty Free Quote For Approval';
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
									<p>You may review this Duty Free Quote at:</p>
									http://18.139.239.214/squarefoot/prodbackup/index.php?action=DetailView&module=quote_Quote&record=$quote_id
Email;
                        $mail->Body = $body;
                        $mail->prepForOutbound();
                        $mail->AddAddress($reports_to_email);
                        if (!$mail->Send())
                        {
                            $GLOBALS['log']->fatal('Email Send : Error Info:'.$mail->ErrorInfo);
                        }
            	

            	}else{
                        
            	}


            }else{
                 
            }
            

        }
 }