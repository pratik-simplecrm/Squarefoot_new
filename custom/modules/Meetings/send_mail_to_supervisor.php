<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
   
class SendNotification
{
		static $already_ran = false;
		function send_mail_to_supervisor($bean,$event,$arguments)
        {
			
			if(self::$already_ran == true) return;
			self::$already_ran = true;
		
			global $db, $current_user,$sugar_config; 
			//$meeting_types_arr = array("MS","PREINS","INS");
			$flooring_type=$final_address=$parent_opp_id='';
			 //echo "<pre>";
			//print_r($bean);
			//exit; 
			
			if($bean->status =='Planned' && !empty($bean->status))
			{
					$m_s_date = date("Y-m-d H:i:s",strtotime('+5 hours +30 minutes', strtotime($bean->date_start)));	
					$e_s_date = date("Y-m-d H:i:s",strtotime('+5 hours +30 minutes', strtotime($bean->date_end)));
					$supervisor_co_id = $bean->user_id1_c;
					$account_id = $bean->account_id_c;
					$meeting_type = $bean->meetingtype_c;
					$meeting_subject = $bean->name;
					$supervisor_name = $bean->supervisor_c;
					if(isset($bean->opportunity_id_c))
					{
						$parent_opp_id = $bean->opportunity_id_c;
					}
					
					if($parent_opp_id!='')
					{
						$get_flooring_type = "SELECT `flooring_type_c` FROM `opportunities` as A inner join `opportunities_cstm` as B on A.id=B.id_c WHERE A.deleted=0 and id='$parent_opp_id'";
						$res = $db->query($get_flooring_type);
						$row = $db->fetchByAssoc($res);
						$flooring_type = trim($row['flooring_type_c']);
						
					}
					if($account_id!='')
					{
						$get_account_address = "SELECT `name`,`phone_office`,`billing_address_street`,`billing_address_city`,`billing_address_state`,`billing_address_postalcode`,`billing_address_country` FROM `accounts` WHERE `id`='$account_id' and `deleted`=0";
						$res1 = $db->query($get_account_address);
						$row1 = $db->fetchByAssoc($res1);
						$street = trim($row1['billing_address_street']);
						$city = trim($row1['billing_address_city']);
						$state = trim($row1['billing_address_state']);
						$pincode = trim($row1['billing_address_postalcode']);
						$country = trim($row1['billing_address_country']);
						$final_address = $street.", ".$city.", ".$state.", ".$pincode.", ".$country;
						$cust_name = trim($row1['name']);
						$phone_office = trim($row1['phone_office']);
						
					}
					//****************LOG Creation*********************
								$APILogFile = 'send_email_notification_to_supervisor.txt';
								$handle = fopen($APILogFile, 'a');
								$timestamp = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes', strtotime('now')));
								//date('Y-m-d H:i:s');
								$logArray = array('meeting_start_date'=>$m_s_date,'meeting_end_date'=>$e_s_date,'supervisor_id'=>$supervisor_co_id,'account_id'=>$account_id,'meeting_subject'=>$meeting_subject,'meeting_type'=>$meeting_type,'supervisor_name'=>$supervisor_name,'final_address'=>$final_address,'oppurtunity_id'=>$parent_opp_id,'cust_name'=>$cust_name,'customer Phone Number'=>$phone_office);
								$logArray2 = print_r($logArray, true);
								$logMessage1 = "\nsend_email_notification_to_supervisor Result at $timestamp :-\n$logArray2";		
								fwrite($handle, $logMessage1);										
								
					//****************ENd OF Code*****************
					if($supervisor_co_id!='')
					{
							 $get_supervisor_emailid = "SELECT `email_address_id` FROM `email_addr_bean_rel` WHERE `bean_id`='$supervisor_co_id' and `deleted`=0";
							 $emailadd = $db->query($get_supervisor_emailid);
							 $row11 = $db->fetchByAssoc($emailadd);
							 $emailadd_id = trim($row11['email_address_id']);
							 
							 if($emailadd_id!='')
							 {
								 $get_emailadd = "SELECT `email_address` FROM `email_addresses` WHERE `id`='$emailadd_id'";
								 $emailadd_supervisor = $db->query($get_emailadd);
								 $row12 = $db->fetchByAssoc($emailadd_supervisor);
								 $emailadd_supervisor = trim($row12['email_address']);
								 
								 $logMessage2 = "\nsend_email_notification_to_supervisor Result at $timestamp :-\n supervisor_email_address:$emailadd_supervisor";		
								 fwrite($handle, $logMessage2);
								 fclose($handle);
								
								require_once('include/SugarPHPMailer.php');  
								$emailObj = new Email();  
								$defaults = $emailObj->getSystemDefaultEmail();  
								$mail = new SugarPHPMailer();
								$mail->IsHTML(true);								
								$mail->setMailerForSystem();  
								$mail->From = $defaults['email'];  
								$mail->FromName = $defaults['name'];  
								$mail->Subject = $meeting_subject;  
								$mail->Body = '<html><body>';
								//$mail->Body .= $created_by_name.' has assigned a Meeting to '.$assigned_user_name. "\n" . 
								//'Subject:' .$subject. "\n" . 'Status: Planned' . "\n". 'Start Date:' .$date_start. "\n" .'End Date:' .$date_start. "\n". 'You may ' .$meeting_link. "\n";
								$mail->Body .= '<h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; line-height: 28.8px; color: #444444; padding: 0px; margin: 0px;">Hi '.$supervisor_name.',</h2>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Site-visit is scheduled for you,</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Subject - '.$meeting_subject.'</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Start date - '.$m_s_date.'</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">End date - '.$e_s_date.'</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;"><strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Customer Name</strong> -&nbsp;'.$cust_name.',&nbsp;&nbsp;</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;"><strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Customer Contact Number</strong> -&nbsp;'.$phone_office.',&nbsp;&nbsp;</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;"><strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Site visit address</strong> -&nbsp;'.$final_address.',&nbsp;&nbsp;</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;"><strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Flooring Type</strong> -&nbsp;'.$flooring_type.'</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">&nbsp;</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">&nbsp;</p>
								<div class="mozaik-clear" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px; height: 0px;">&nbsp;</div>';
								$mail->Body .= '</body></html>';
								//$mail->Body = 'Hello, ' .strtoupper($user_name). "\n" . 'Your Updated Password is ' .$new_passowrd. "\n\n" .'Thank You!';  
							   // $mail->addAttachment('/location/of/file/in/filesystem/file.csv', "name-of-attached-file-in-the-email.csv", Encoding::Base64, "text/csv");   
								$mail->prepForOutbound();  
								$mail->AddAddress($emailadd_supervisor);  
								@$mail->Send();  
					
							}
					}
					/* if(!empty($bean->assigned_user_id))
					{
							//echo "<pre>";
							//print_r($bean);
							//exit; 
						$prev_service_coid = $bean->fetched_row['assigned_user_id'];
						$meeting_id = $bean->id;
						$service_coordinator_id = $bean->assigned_user_id;
						$assigned_user_name = $bean->assigned_user_name;
						$created_by_name = $bean->created_by_name;
						//exit;
						$created_by_id = $bean->created_by;
						$status = $bean->status;
						$link = $sugar_config['site_url']."/index.php?module=Meetings&action=DetailView&record=".$meeting_id;
						$meeting_link = '<a href='.$link.'>review this Meeting.</a>';
						
						//****************LOG Creation*********************
								$APILogFile = 'send_email_notification_to_service_coordinator.txt';
								$handle = fopen($APILogFile, 'a');
								$timestamp = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes', strtotime('now')));
								//date('Y-m-d H:i:s');
								$logArray = array('prev_service_coid'=>$prev_service_coid,'meeting_id'=>$meeting_id,'service_coordinator_id'=>$service_coordinator_id,'assigned_user_name'=>$assigned_user_name,'created_by_name'=>$created_by_name,'created_by_id'=>$created_by_id,'status'=>$status,'meeting_subject'=>$meeting_subject,'meeting_start_date'=>$m_s_date,'meeting_end_date'=>$e_s_date,'meeting_link'=>$meeting_link);
								$logArray2 = print_r($logArray, true);
								$logMessage1 = "\nsend_email_notification_to_service_coordinator Result at $timestamp :-\n$logArray2";		
								fwrite($handle, $logMessage1);										
								
					  //****************ENd OF Code*****************
						if($prev_service_coid!=$service_coordinator_id && !empty($prev_service_coid))
						{
						//send meeting mail to service co-ordinator start
							 $get_service_co_emailid = "SELECT `email_address_id` FROM `email_addr_bean_rel` WHERE `bean_id`='$service_coordinator_id' and `deleted`=0";
							 $emailadd = $db->query($get_service_co_emailid);
							 $row11 = $db->fetchByAssoc($emailadd);
							 $emailadd_id = trim($row11['email_address_id']);
							 
							 if($emailadd_id!='')
							 {
								 $get_emailadd = "SELECT `email_address` FROM `email_addresses` WHERE `id`='$emailadd_id'";
								 $emailadd_serco = $db->query($get_emailadd);
								 $row12 = $db->fetchByAssoc($emailadd_serco);
								 $emailadd_sercvice_co = trim($row12['email_address']);
								
								
								require_once('include/SugarPHPMailer.php');  
								$emailObj = new Email();  
								$defaults = $emailObj->getSystemDefaultEmail();  
								$mail = new SugarPHPMailer();
								$mail->IsHTML(true);								
								$mail->setMailerForSystem();  
								$mail->From = $defaults['email'];  
								$mail->FromName = $defaults['name'];  
								$mail->Subject = $meeting_subject;  
								$mail->Body = '<html><body>';
								//$mail->Body .= $created_by_name.' has assigned a Meeting to '.$assigned_user_name. "\n" . 
								//'Subject:' .$subject. "\n" . 'Status: Planned' . "\n". 'Start Date:' .$date_start. "\n" .'End Date:' .$date_start. "\n". 'You may ' .$meeting_link. "\n";
								$mail->Body .= '<p style="color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; line-height: 20.8px; padding: 0px; margin: 0px;"><strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">'.$created_by_name.'</strong>&nbsp;has assigned a Meeting to&nbsp;<strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">'.$assigned_user_name.'</strong>.</p>
								<p style="color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; line-height: 20.8px; padding: 0px; margin: 0px;">&nbsp;</p>
								<p style="color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; line-height: 20.8px; padding: 0px; margin: 0px;">Subject: '.$meeting_subject.'<br style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;" />Status: '.$status.'<br style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;" />Start Date: '.$m_s_date.'<br style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;" />End Date: '.$e_s_date.'</p>';
								$mail->Body .= '<p>You may '.$meeting_link.'</p></body></html>';
								//$mail->Body = 'Hello, ' .strtoupper($user_name). "\n" . 'Your Updated Password is ' .$new_passowrd. "\n\n" .'Thank You!';  
							   // $mail->addAttachment('/location/of/file/in/filesystem/file.csv', "name-of-attached-file-in-the-email.csv", Encoding::Base64, "text/csv");   
								$mail->prepForOutbound();  
								$mail->AddAddress($emailadd_sercvice_co);  
								@$mail->Send();  
							 }
							 //end
						}
						
					} */
			}
		
	}
}