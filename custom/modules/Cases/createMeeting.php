<?php
/* 
***
Author : Pratik Tambekar
*/
ini_set('display_errors','Off');
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/SugarPHPMailer.php');  
class CreateMeeting
{
		static $already_ran = false;
		
		function create_meeting($bean,$event,$arguments)
        {
			
			if(self::$already_ran == true) return;
			self::$already_ran = true;
		
			global $db, $current_user,$app_list_strings,$sugar_config; 
			$reschedule_arr = array_filter(array_keys($app_list_strings['reasonofreschedule_list']));
			//echo "<pre>";
			//print_r($app_list_strings['reasonofreschedule_list']);
			//print_r($GLOBALS['app_list_strings']);
			//print_r($bean);
			//exit;
			
				if(isset($bean->casetype_c) && isset($bean->state))
				{
					$sales_person_id='';
					$created_by_name = $bean->created_by_name;
					$assigned_user_name = $bean->assigned_user_name;
					$case_type = $bean->casetype_c;
					$state = $bean->state;
					$account_id = $bean->account_id;
					$meeting_type = "INS";
					$subject = "Schedule visit for Installation";
					$status = "Planned";
				    $date_created = date('Y-m-d H:i:s');//,strtotime('+5 hours +30 minutes', strtotime('now')));
					$parent_module = "Opportunities";
					$sales_person_id = $bean->user_id1_c;
					$branch_name = $bean->region_c;
					$date_start = date('Y-m-d H:i:s',strtotime('-5 hours -30 minutes', strtotime('now')));
						
					if(isset($bean->rel_fields_before_value['opportunities_cases_1opportunities_ida']))
					{
						$parent_opp_id = $bean->rel_fields_before_value['opportunities_cases_1opportunities_ida'];
					}
					$service_coordinator_id = $bean->assigned_user_id;
					
					//Guid creation
						$charid = md5(uniqid(rand(),true));
						$hyphen = chr(45);
						$uuid =  substr($charid,0,8).$hyphen.substr($charid,8,4).$hyphen.substr($charid,12,4).$hyphen.substr($charid,16,4).$hyphen.substr($charid,20,12);
					// end of code
					
					/*
					create meeting under oppurtunity module on case type pre-installation and ticket state is closed
					*/
					if($case_type == 'PREINS' && strtolower($state) == 'closed')
					{
						//check wheather the meeeting is aready created or not
						$get_meeting_details = $db->query("SELECT * FROM `meetings` WHERE LOWER(`name`) = 'Schedule for Installation' and `parent_type`='Opportunities' and `parent_id`='$parent_opp_id' and `deleted`=0");
						if($get_meeting_details->num_rows == 0)
						{
					
							//create meeting 
							$ceate_meeting_under_opp = $db->query("INSERT INTO `meetings`(`id`, `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `assigned_user_id`, `date_start`, `date_end`, `parent_type`, `status`, `parent_id`) VALUES ('$uuid','$subject','$date_created','$date_created','1',
							'$sales_person_id','$sales_person_id','$date_start','$date_start','$parent_module','$status','$parent_opp_id')"); 
							
							
							$ceate_meeting_under_opp1 = $db->query("INSERT INTO `meetings_cstm`(`id_c`,`meetingtype_c`,`account_id_c`,`opportunity_id_c`,`user_id_c`,`user_id1_c`,`region_c`) VALUES ('$uuid','$meeting_type','$account_id','$parent_opp_id','$sales_person_id','$supervisor_user_id','$branch_name')"); 
							
							//send installation meeting mail to assigned user id start:
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
								
								$link = $sugar_config['site_url']."/index.php?module=Meetings&action=DetailView&record=".$uuid;
								$meeting_link = '<a href='.$link.'>review this Meeting.</a>';
								
								$emailObj = new Email();  
								$defaults = $emailObj->getSystemDefaultEmail();  
								$mail = new SugarPHPMailer();
								$mail->IsHTML(true);								
								$mail->setMailerForSystem();  
								$mail->From = $defaults['email'];  
								$mail->FromName = $defaults['name'];  
								$mail->Subject = 'Schedule visit for Installation';  
								$mail->Body = '<html><body>';
								$mail->Body .= '<p style="color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; line-height: 20.8px; padding: 0px; margin: 0px;"><strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;"></strong>&nbsp;A Meeting has been assigned to&nbsp;<strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">'.$created_by_name.'</strong>.</p>
								<p style="color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; line-height: 20.8px; padding: 0px; margin: 0px;">&nbsp;</p>
								<p style="color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; line-height: 20.8px; padding: 0px; margin: 0px;">Subject: '.$subject.'<br style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;" />Status: '.$status.'<br style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;" />Start Date: '.$date_start.'<br style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;" />End Date: '.$date_start.'</p>';
								$mail->Body .= '<p>You may '.$meeting_link.'</p></body></html>';
								$mail->prepForOutbound();  
								$mail->AddAddress($emailadd_sercvice_co);  
								@$mail->Send(); 
							 }  
							//end of code
							
						}
						
						
					}
					/*
					create meeting under cases module on reason of reaschedule and state is open
					*/
					else if(($case_type == 'MS' || $case_type == 'PREINS' || $case_type == 'INS' || $case_type == 'SRV') && in_array($bean->reasonofreschedule_c,$reschedule_arr) && strtolower($state) == 'open')
					{
						/* echo "<pre>";
						print_r($bean);
						exit; */
						
						$meeting_type1 = $case_type;
						if($case_type == 'MS')
						{
							$subject1 = "Schedule for Measurement";
						}else if($case_type == 'PREINS')
						{
							$subject1 = "Schedule for Pre-Installation";
						}else if($case_type == 'INS')
						{
							$subject1 = "Schedule for Installation";
						}
						else if($case_type == 'SRV')
						{
							$subject1 = "Schedule for Service";
						}
						
						$fetched_row = $bean->fetched_row;
						$parent_module1 = "Cases";
						$previous_value = $bean->fetched_row['reasonofreschedule_c'];
						$updated_value = $bean->reasonofreschedule_c;
						$case_id = $bean->id;
						$supervisor_user_id = $bean->user_id_c;
						if($previous_value!=$updated_value)
						{
							
							
							
							//create meeting 
							  
							$ceate_meeting_under_cases = $db->query("INSERT INTO `meetings`(`id`, `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `assigned_user_id`, `date_start`, `date_end`, `parent_type`, `status`, `parent_id`) VALUES ('$uuid','$subject1','$date_created','$date_created','1','$sales_person_id','$sales_person_id','$date_start','$date_start','$parent_module1','$status','$case_id')");
							
							//on rescheduling assigning without supervisor id(user_id1_c)
							$ceate_meeting_under_cases1 = $db->query("INSERT INTO `meetings_cstm`(`id_c`,`meetingtype_c`,`account_id_c`,`opportunity_id_c`,`region_c`) VALUES ('$uuid','$meeting_type1','$account_id','$parent_opp_id','$branch_name')");  
							
							//send meeting mail to sales person
							$get_sales_person_emailid = "SELECT `email_address_id` FROM `email_addr_bean_rel` WHERE `bean_id`='$sales_person_id' and `deleted`=0";
							 $emailadd = $db->query($get_sales_person_emailid);
							 $row11 = $db->fetchByAssoc($emailadd);
							 $emailadd_id = trim($row11['email_address_id']);
							 
							 if($emailadd_id!='')
							 {
								 
								 $link = $sugar_config['site_url']."/index.php?module=Cases&action=DetailView&record=".$case_id;
								 $meeting_link = '<a href='.$link.'>review this Case.</a>';
								 $createdby_name = $bean->created_by_name;
								 $case_number = $bean->case_number;
								 $case_types = $bean->casetype_c;
								 $reasonfor_reaschedule = $bean->reasonforreschedule_c;
								 $account_name = $bean->account_name;
								 $oppurtunity_name = $bean->opportunities_cases_1_name;
								 if($case_types=='MS')
									 $ctype = 'Measurement';
								 else if($case_types=='PREINS')
									 $ctype = 'Pre-Installation';
								 else if($case_types=='INS') 
									 $ctype = 'Installation';
								 else if($case_types == 'SRV')
									$ctype = "Service";
						 
						        $reasons = $bean->reasonofreschedule_c;
								if($reasons=='CRS')
									$reason_of_res = 'Customer Re-scheduled';
								else if($reasons=='RWND')
									$reason_of_res = 'Repair Work Not Completed';
								else if($reasons=='INV')
									$reason_of_res = 'Installer not available';
								else if($reasons=='MNV')
									$reason_of_res = 'Material not available';
								else if($reasons=='OTH')
									$reason_of_res = 'Others';
								
								 
								 $get_emailadd = "SELECT `email_address` FROM `email_addresses` WHERE `id`='$emailadd_id'";
								 $emailadd_serco = $db->query($get_emailadd);
								 $row12 = $db->fetchByAssoc($emailadd_serco);
								 $emailadd_sales_person = trim($row12['email_address']);
								
								
								
								$emailObj = new Email();  
								$defaults = $emailObj->getSystemDefaultEmail();  
								$mail = new SugarPHPMailer();
								$mail->IsHTML(true);								
								$mail->setMailerForSystem();  
								$mail->From = $defaults['email'];  
								$mail->FromName = $defaults['name'];  
								$mail->Subject = 'Reschedule for '.$ctype;  
								$mail->Body = '<html><body>';
								
								$mail->Body .= '<h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; line-height: 28.8px; color: #444444; padding: 0px; margin: 0px;">Hi '.$createdby_name.',</h2>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">&nbsp;</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">A meeting has been rescheduled for,</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Case number - '.$case_number.'</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Case type - '.$ctype.'</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Re-schedule - '.$reason_of_res.'</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Reason for Re-Schedule -'.$reasonfor_reaschedule.'</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Account name - '.$account_name.'</p>
								<p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">Opportunity - '.$oppurtunity_name.'</p>';
								$mail->Body .= '<p>You may '.$meeting_link.'</p></body></html>';
							
								$mail->prepForOutbound();  
								$mail->AddAddress($emailadd_sales_person);  
								@$mail->Send();
							 }
						}
						
					}
					/*
					create meeting under oppurtunity module on case type is service and state is open
					*/
					else if($case_type == 'SRV' && strtolower($state) == 'open')
					{
						
						 
						 if(isset($_REQUEST['opportunities_cases_1opportunities_ida']))
						{
							//print_r($_REQUEST);exit;
							$parent_opp_id = $_REQUEST['opportunities_cases_1opportunities_ida'];
							$get_opp_cust_name="SELECT A.`name`,A.`id` FROM `accounts` as A inner join `accounts_opportunities` as B on A.id =B.account_id where B.opportunity_id='$parent_opp_id' and A.deleted=0 and B.deleted=0";
							$response2 = $db->query($get_opp_cust_name);
							$row22 = $db->fetchByAssoc($response2);
							$account_person_name = (!empty($row22['name'])?$row22['name']:'name not available');
							$account_person_id = (!empty($row22['id'])?$row22['id']:'');
							
							$meeting_type='SRV';
							$get_meeting_details = $db->query("SELECT * FROM `meetings` WHERE LOWER(`name`) = 'Schedule visit for Service' and `parent_type`='Opportunities' and `parent_id`='$parent_opp_id' and `deleted`=0");
							
							if($get_meeting_details->num_rows == 0)
							{
							    

								
								$ceate_meeting_under_opp = $db->query("INSERT INTO `meetings`(`id`, `name`, `date_entered`, `date_modified`, `created_by`, `assigned_user_id`,`date_start`, `date_end`, `parent_type`, `status`, `parent_id`) VALUES ('$uuid','Schedule visit for Service','$date_created','$date_created','$sales_person_id','$sales_person_id','$date_start','$date_start','$parent_module','$status','$parent_opp_id')");
								
								$ceate_meeting_under_opp1 = $db->query("INSERT INTO `meetings_cstm`(`id_c`,`meetingtype_c`,`account_id_c`,`opportunity_id_c`,`user_id1_c`,`region_c`) VALUES ('$uuid','$meeting_type','$account_person_id','$parent_opp_id','$supervisor_user_id','$branch_name')");


								//send service meeting mail to assigned user id start:
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
								
								
								$link = $sugar_config['site_url']."/index.php?module=Meetings&action=DetailView&record=".$uuid;
								$meeting_link = '<a href='.$link.'>review this Meeting.</a>';
								$createdby_person_name = $bean->created_by_name;
								$emailObj = new Email();  
								$defaults = $emailObj->getSystemDefaultEmail();  
								$mail = new SugarPHPMailer();
								$mail->IsHTML(true);								
								$mail->setMailerForSystem();  
								$mail->From = $defaults['email'];  
								$mail->FromName = $defaults['name'];  
								$mail->Subject = 'Schedule visit for Service';  
								$mail->Body = '<html><body>';
								$mail->Body .= '<p style="color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; line-height: 20.8px; padding: 0px; margin: 0px;"><strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;"></strong>&nbsp;A Meeting has been assigned to&nbsp;<strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">'.$createdby_person_name.'</strong>.</p>
								<p style="color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; line-height: 20.8px; padding: 0px; margin: 0px;">&nbsp;</p>
								<p style="color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; line-height: 20.8px; padding: 0px; margin: 0px;">Subject: '.$subject.'<br style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;" />Status: '.$status.'<br style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;" />Start Date: '.$date_start.'<br style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;" />End Date: '.$date_start.'</p>';
								$mail->Body .= '<p>You may '.$meeting_link.'</p></body></html>';
								$mail->prepForOutbound();  
								$mail->AddAddress($emailadd_sercvice_co);  
								@$mail->Send(); 
							 }  
							//end of code
							}
						}
					}
					
				}
				 
		}
				
}
?>