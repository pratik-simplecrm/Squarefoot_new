<?php
ini_set('display_errors','On');
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
   
class CreateMeeting
{
		static $already_ran = false;
		
		function create_meeting($bean,$event,$arguments)
        {
			
			if(self::$already_ran == true) return;
			self::$already_ran = true;
		
			global $db, $current_user,$app_list_strings,$sugar_config; 
			$reschedule_arr = array_filter(array_keys($app_list_strings['reasonofreschedule_list']));//array('RWND','CRS','INV','MNV','OTH');
			//print_r($reschedule_arr);
			//echo "<pre>";
			//print_r($app_list_strings['reasonofreschedule_list']);
			//print_r($GLOBALS['app_list_strings']);
			//print_r($bean);
			//exit;
			//$fetched_row = $bean->fetched_row;
			//print_r($bean->rel_fields_before_value['opportunities_cases_1opportunities_ida']);
			
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
					
					if($case_type == 'PREINS' && strtolower($state) == 'closed')
					{
						//check wheather the meeeting is aready created or not
						$get_meeting_details = $db->query("SELECT * FROM `meetings` WHERE LOWER(`name`) = 'Schedule for Installation' and `parent_type`='Opportunities' and `parent_id`='$parent_opp_id' and `deleted`=0");
						if($get_meeting_details->num_rows == 0)
						{
												
							/* $meetingBean=BeanFactory::newBean('Meetings');
							 //print_r($meetingBean);
							 //exit;
							 $meetingBean->name=$subject;
							 // $meetingBean->date_entered=$date_created;
							 $meetingBean->date_start=$date_start;
							 $meetingBean->date_end=$date_start;
							 $meetingBean->assigned_user_id=$service_coordinator_id;
							 $meetingBean->created_by=$service_coordinator_id;
							 $meetingBean->parent_type=$parent_module;
							 $meetingBean->parent_id=$parent_opp_id; 
							 $meetingBean->meetingtype_c=$meeting_type1;
							 $meetingBean->account_id_c=$account_id;
							 $meetingBean->opportunity_id_c=$parent_opp_id;
							 $meetingBean->user_id1_c=$supervisor_user_id; 
							 $meetingBean->save(); 	 */
							 
							//create meeting 
							$date_start = date('Y-m-d H:i:s',strtotime('-5 hours -30 minutes', strtotime('now')));
							$ceate_meeting_under_opp = $db->query("INSERT INTO `meetings`(`id`, `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `assigned_user_id`, `date_start`, `date_end`, `parent_type`, `status`, `parent_id`) VALUES ('$uuid','$subject','$date_created','$date_created','1',
							'$service_coordinator_id','$service_coordinator_id','$date_start','$date_start','$parent_module','$status','$parent_opp_id')");
							
							$ceate_meeting_under_opp1 = $db->query("INSERT INTO `meetings_cstm`(`id_c`,`meetingtype_c`,`account_id_c`,`opportunity_id_c`,`user_id_c`) VALUES ('$uuid','$meeting_type','$account_id','$parent_opp_id','$sales_person_id')"); 
							
							
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
								require_once('include/SugarPHPMailer.php');  
								$emailObj = new Email();  
								$defaults = $emailObj->getSystemDefaultEmail();  
								$mail = new SugarPHPMailer();
								$mail->IsHTML(true);								
								$mail->setMailerForSystem();  
								$mail->From = $defaults['email'];  
								$mail->FromName = $defaults['name'];  
								$mail->Subject = 'Schedule visit for Installation';  
								$mail->Body = '<html><body>';
								//$mail->Body .= $created_by_name.' has assigned a Meeting to '.$assigned_user_name. "\n" . 
								//'Subject:' .$subject. "\n" . 'Status: Planned' . "\n". 'Start Date:' .$date_start. "\n" .'End Date:' .$date_start. "\n". 'You may ' .$meeting_link. "\n";
								$mail->Body .= '<p style="color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; line-height: 20.8px; padding: 0px; margin: 0px;"><strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">'.$created_by_name.'</strong>&nbsp;has assigned a Meeting to&nbsp;<strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;">'.$assigned_user_name.'</strong>.</p>
								<p style="color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; line-height: 20.8px; padding: 0px; margin: 0px;">&nbsp;</p>
								<p style="color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; line-height: 20.8px; padding: 0px; margin: 0px;">Subject: '.$subject.'<br style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;" />Status: '.$status.'<br style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;" />Start Date: '.$date_start.'<br style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; color: #444444; padding: 0px; margin: 0px;" />End Date: '.$date_start.'</p>';
								$mail->Body .= '<p>You may '.$meeting_link.'</p></body></html>';
								//$mail->Body = 'Hello, ' .strtoupper($user_name). "\n" . 'Your Updated Password is ' .$new_passowrd. "\n\n" .'Thank You!';  
							   // $mail->addAttachment('/location/of/file/in/filesystem/file.csv', "name-of-attached-file-in-the-email.csv", Encoding::Base64, "text/csv");   
								$mail->prepForOutbound();  
								$mail->AddAddress($emailadd_sercvice_co);  
								@$mail->Send();  
							 }
						}
						
						
					}
					else if(($case_type == 'MS' || $case_type == 'PREINS' || $case_type == 'INS') && in_array($bean->reasonofreschedule_c,$reschedule_arr) && strtolower($state) == 'open')
					{
						
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
						//echo "<pre>";
						//print_r($bean);
						//exit;
						$fetched_row = $bean->fetched_row;
						//print_r($fetched_row);
						//print_r($bean);exit;
						$parent_module1 = "Cases";
						$previous_value = $bean->fetched_row['reasonofreschedule_c'];
						$updated_value = $bean->reasonofreschedule_c;
						$case_id = $bean->id;
						$supervisor_user_id = $bean->user_id_c;
						$date_start = date('Y-m-d H:i:s',strtotime('-10 hours +00 minutes', strtotime('now')));
						if($previous_value!=$updated_value)
						{
							
							//through bean start
							 //$accountBean = BeanFactory::getBean('Cases');
							 //$accountBean->load_relationship('Meetings');
						     /* $meetingBean=BeanFactory::newBean('Meetings');
							 //print_r($meetingBean);
							 //exit;
							 $meetingBean->name=$subject1;
							 // $meetingBean->date_entered=$date_created;
							 $meetingBean->date_start=$date_start;
							 $meetingBean->date_end=$date_start;
							 $meetingBean->assigned_user_id=$service_coordinator_id;
							 $meetingBean->created_by=$service_coordinator_id;
							 $meetingBean->parent_type='Cases';
							 $meetingBean->parent_id=$case_id; 
							 $meetingBean->meetingtype_c=$meeting_type1;
							 $meetingBean->account_id_c=$account_id;
							 $meetingBean->opportunity_id_c=$parent_opp_id;
							 $meetingBean->user_id1_c=$supervisor_user_id; 
							 $meetingBean->save();  */	
							//exit;							 
							
							// end 
							
							//create meeting 
							  $date_start2 = date('Y-m-d H:i:s',strtotime('-5 hours -30 minutes', strtotime('now')));
							$ceate_meeting_under_cases = $db->query("INSERT INTO `meetings`(`id`, `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `assigned_user_id`, `date_start`, `date_end`, `parent_type`, `status`, `parent_id`) VALUES ('$uuid','$subject1','$date_created','$date_created','1','$service_coordinator_id','$service_coordinator_id','$date_start2','$date_start2','$parent_module1','$status','$case_id')");
							
							//on rescheduling assigning supervisor id
							$ceate_meeting_under_cases1 = $db->query("INSERT INTO `meetings_cstm`(`id_c`,`meetingtype_c`,`account_id_c`,`opportunity_id_c`,`user_id1_c`) VALUES ('$uuid','$meeting_type1','$account_id','$parent_opp_id','$supervisor_user_id')");  
							
							
							
					
							/*
								//Guid creation
									$charid1 = md5(uniqid(rand(),true));
									$hyphen1 = chr(45);
									$uuid3 =  substr($charid1,0,8).$hyphen1.substr($charid1,8,4).$hyphen1.substr($charid1,12,4).$hyphen1.substr($charid1,16,4).$hyphen1.substr($charid1,20,12);
								// end of code
							
									$sql3 = "INSERT INTO `opportunities_meetings_1_c`(`id`, `date_modified`, `opportunities_meetings_1opportunities_ida`, `opportunities_meetings_1meetings_idb`) VALUES ('$uuid3','$date_created','$parent_opp_id','$uuid')";
									$insert_meetings_opportunity_relation_table = $db->query($sql3);
							*/
							
						
						}
						
					}else if($case_type == 'SRV' && strtolower($state) == 'open')
					{
						 if(isset($_REQUEST['relate_id']))
						{
							$parent_opp_id = $_REQUEST['relate_id'];
							$get_opp_cust_name="SELECT A.`name`,A.`id` FROM `accounts` as A inner join `accounts_opportunities` as B on A.id =B.account_id where B.opportunity_id='$parent_opp_id' and A.deleted=0 and B.deleted=0";
							$response2 = $db->query($get_opp_cust_name);
							$row22 = $db->fetchByAssoc($response2);
							$account_person_name = (!empty($row22['name'])?$row22['name']:'name not available');
							$account_person_id = (!empty($row22['id'])?$row22['id']:'');
							
							//echo $query = "SELECT * FROM `meetings` WHERE LOWER(`name`) = 'Schedule visit for Service' and `parent_type`='Opportunities' and `parent_id`='$parent_opp_id' and `deleted`=0";
							//exit;
							$meeting_type='SRV';
							$get_meeting_details = $db->query("SELECT * FROM `meetings` WHERE LOWER(`name`) = 'Schedule visit for Service' and `parent_type`='Opportunities' and `parent_id`='$parent_opp_id' and `deleted`=0");
							
							if($get_meeting_details->num_rows == 0)
							{
								//echo "ffffffff";
								//exit;							
								//create meeting 
								$date_start3 = date('Y-m-d H:i:s',strtotime('-5 hours -30 minutes', strtotime('now')));
								/*
								$ceate_meeting_under_opp = $db->query("INSERT INTO `meetings`(`id`, `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `assigned_user_id`, `date_start`, `date_end`, `parent_type`, `status`, `parent_id`) VALUES ('$uuid','Schedule visit for Service','$date_created','$date_created','1','$service_coordinator_id','$service_coordinator_id','$date_start3','$date_start3','$parent_module','$status','$parent_opp_id')");*/
								
								//removed assigned user id
								$ceate_meeting_under_opp = $db->query("INSERT INTO `meetings`(`id`, `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `date_start`, `date_end`, `parent_type`, `status`, `parent_id`) VALUES ('$uuid','Schedule visit for Service','$date_created','$date_created','1','$service_coordinator_id','$date_start3','$date_start3','$parent_module','$status','$parent_opp_id')");
								
								$ceate_meeting_under_opp1 = $db->query("INSERT INTO `meetings_cstm`(`id_c`,`meetingtype_c`,`account_id_c`,`opportunity_id_c`,`user_id_c`) VALUES ('$uuid','$meeting_type','$account_person_id','$parent_opp_id','$sales_person_id')"); 
							}
						}
					}
					
				}
				 
		}
				
}
?>