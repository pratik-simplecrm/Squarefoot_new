<?php 
 //WARNING: The contents of this file are auto-generated

$GLOBALS['log']->fatal("Hello");
define('sugarEntry', true);
require_once('include/entryPoint.php');

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/SugarPHPMailer.php');
require_once('modules/Administration/Administration.php');

	//~ error_reporting( E_ALL );
    //~ ini_set( "display_errors", 1 );

	$job_strings[] = 'LastContactedDate';
	function LastContactedDate()
	{
		$query = "SELECT  id FROM arch_architects_contacts WHERE deleted='0'";
		$result = $GLOBALS['db']->query($query);
		$row = $GLOBALS['db']->fetchByAssoc($result);
		
		while($row = $GLOBALS['db']->fetchByAssoc($result))
		{
				//~ echo $row['id'];echo "<br />";break;
				//~ $architect_bean = BeanFactory::getBean('Arch_Architects_Contacts', '450bea5d-bb0c-c0cc-d302-549ba04b1403');
				$architect_bean = BeanFactory::getBean('Arch_Architects_Contacts', $row['id']);
				
				if ($architect_bean->load_relationship('arch_architects_contacts_activities_1_calls'))
				{
					$relatedBeans = $architect_bean->arch_architects_contacts_activities_1_calls->getBeans();
					$calls_due_date = array();
					$today_date = strtotime(date('Y-m-d H:i:s'));
					foreach($relatedBeans as $related_bean)
					{
						if(strtotime($related_bean->date_start) < $today_date)
							$calls_due_date[] = strtotime($related_bean->date_start.'-5 hours, -30 minutes');
					}
					rsort($calls_due_date);
				}
				
				if ($architect_bean->load_relationship('arch_architects_contacts_activities_1_meetings'))
				{
					$relatedBeans = $architect_bean->arch_architects_contacts_activities_1_meetings->getBeans();
					$meeting_due_date = array();
					$today_date = strtotime(date('Y-m-d H:i:s'));
					foreach($relatedBeans as $related_bean)
					{
						if(strtotime($related_bean->date_end) < $today_date)
							$meeting_due_date[] = strtotime($related_bean->date_start.'-5 hours, -30 minutes');
					}
					$GLOBALS['log']->fatal($meeting_due_date);
					rsort($meeting_due_date);
				}
				if(!empty($calls_due_date[0]) && !empty($meeting_due_date[0]))
				{
					if($calls_due_date[0] > $meeting_due_date[0])
					{
						//~ print_r(date("m/d/Y H:i:s",$calls_due_date[0]));
						$architect_bean->last_contacted_date_c = date("Y-m-d H:i:s",$calls_due_date[0]);
						$architect_bean->save();
					}
					else
					{
						//~ print_r(date("m/d/Y H:i:s",$meeting_due_date[0]));
						$architect_bean->last_contacted_date_c = date("Y-m-d H:i:s",$meeting_due_date[0]);
						$architect_bean->save();
					}
				}
				else if(!empty($calls_due_date[0]))
				{
						$architect_bean->last_contacted_date_c = date("Y-m-d H:i:s",$calls_due_date[0]);
						$architect_bean->save();
				}
				else if(!empty($meeting_due_date[0]))
				{
						$architect_bean->last_contacted_date_c = date("Y-m-d H:i:s",$meeting_due_date[0]);
						$architect_bean->save();
				}
				
		}
		return true;
	}
	$job_strings[] = 'LastContactDateOpportunity';
	function LastContactDateOpportunity()
	{
		$query = "SELECT  id,sales_stage FROM opportunities WHERE deleted='0'";
		$result = $GLOBALS['db']->query($query);
		$row = $GLOBALS['db']->fetchByAssoc($result);
		
		while($row = $GLOBALS['db']->fetchByAssoc($result))
		{
			$type = array('Negotiation/Review','Draft');
			if(in_array($row['sales_stage'],$type))
			{
				//~ echo $row['id'];echo "<br />";break;
				//~ $architect_bean = BeanFactory::getBean('Arch_Architects_Contacts', '450bea5d-bb0c-c0cc-d302-549ba04b1403');
				//~ $opp_bean = BeanFactory::getBean('Opportunities', '500af0e7-291c-8ee7-c151-5472e3c72314');
				$opp_bean = BeanFactory::getBean('Opportunities', $row['id']);
				
				if ($opp_bean->load_relationship('calls'))
				{
					$relatedBeans = $opp_bean->calls->getBeans();
					$calls_due_date = array();
					$today_date = strtotime(date('Y-m-d'));
					foreach($relatedBeans as $related_bean)
					{
						$due_date = explode(' ',strtotime($related_bean->date_start.'-5 hours, -30 minutes')); 
						$due_date = strtotime($due_date[0]);
						if($due_date < $today_date)
							$calls_due_date[] = $due_date;
					}
					rsort($calls_due_date);
				}
				
				if ($opp_bean->load_relationship('meetings'))
				{
					$relatedBeans = $opp_bean->meetings->getBeans();
					$meeting_due_date = array();
					$today_date = strtotime(date('Y-m-d'));
					foreach($relatedBeans as $related_bean)
					{
						$due_date = explode(' ',strtotime($related_bean->date_start.'-5 hours, -30 minutes'));
						$due_date = strtotime($due_date[0]);
						if($due_date < $today_date)
							$meeting_due_date[] = $due_date;
					}
					rsort($meeting_due_date);
				}
				if(!empty($calls_due_date[0]) && !empty($meeting_due_date[0]))
				{
					if($calls_due_date[0] > $meeting_due_date[0])
					{
						//~ print_r(date("m/d/Y H:i:s",$calls_due_date[0]));
						$contact_date = date("Y-m-d",$calls_due_date[0]);
						$query1 = "UPDATE opportunities_cstm SET last_contacted_date_c='$contact_date' where id_c = '$opp_bean->id'";
						$result1 = $GLOBALS['db']->query($query1);
						//~ $opp_bean->save();
					}
					else
					{
						//~ print_r(date("m/d/Y H:i:s",$meeting_due_date[0]));
						$contact_date = date("Y-m-d",$meeting_due_date[0]);
						$query1 = "UPDATE opportunities_cstm SET last_contacted_date_c='$contact_date' where id_c = '$opp_bean->id'";
						$result1 = $GLOBALS['db']->query($query1);
						//~ $opp_bean->save();
					}
				}
				else if(!empty($calls_due_date[0]))
				{
						$contact_date = date("Y-m-d",$calls_due_date[0]);
						$query1 = "UPDATE opportunities_cstm SET last_contacted_date_c='$contact_date' where id_c = '$opp_bean->id'";
						$result1 = $GLOBALS['db']->query($query1);
						//~ $opp_bean->save();
				}
				else if(!empty($meeting_due_date[0]))
				{
						$contact_date = date("Y-m-d",$meeting_due_date[0]);
						$query1 = "UPDATE opportunities_cstm SET last_contacted_date_c='$contact_date' where id_c = '$opp_bean->id'";
						$result1 = $GLOBALS['db']->query($query1);
						//~ $opp_bean->save();
				}
				// $due_date = strtotime(date('Y-m-d').'- 15 days');
				// if(strtotime($opp_bean->last_contacted_date_c) == $due_date)
				// {
					// global $sugar_config;
					// global $db;
					// //get the opportunity amount
					// //~ $opp_amount = $bean->amount;
					// //~ $id = $bean->id;
					// $user_id = $opp_bean->assigned_user_id;
					// //~ $email=$this->fetch_project_head_email($assigned_user_id);
					// $getproject ="SELECT reports_to_id FROM users WHERE id='$user_id' AND deleted=0";					    
					// $getproject_res = $db->query($getproject);
					// $rowget=$db->fetchByAssoc($getproject_res);		
					// $project_head_id=$rowget['reports_to_id'];	
					
					// $customer_email="";
					// $get_acc_email="select email_address
									// from email_addresses e, email_addr_bean_rel ec
									// where bean_id = '$project_head_id'
									// and ec.email_address_id = e.id
									// and e.opt_out =0
									// and e.deleted =0
									// and ec.deleted =0";
									
									// $GLOBALS['log']->fatal($get_acc_email);
					// $get_acc_email_res=$db->query($get_acc_email);				
					// $get_acc_email_row=$db->fetchByAssoc($get_acc_email_res);	
					// $customer_email=$get_acc_email_row['email_address'];
					// $GLOBALS['log']->fatal("Email: ".$customer_email);
					// $subject = 'Opportunity not contacted before 15 days.';
					// $emailObj = new Email();         
					// $defaults = $emailObj->getSystemDefaultEmail();
					// $mail = new SugarPHPMailer();
					// $mail->setMailerForSystem();
					// $mail->IsHTML(true);
					// $mail->From = $defaults['email'];
					// $mail->FromName = $defaults['name'];
					// $mail->AddAddress($customer_email);
					// $mail->Subject = ($subject); 
					// $mail->Body = "<a href='".$sugar_config['site_url']."/index.php?module=Opportunities&action=DetailView&record=".$opp_bean->id."' title='Click here to view the opportunity'>Click here to view the opportunity</a>";		
					// if(!$mail->Send()){
						// $GLOBALS['log']->fatal("Could not send notification: ". $mail->ErrorInfo);
					// } else {
						// $GLOBALS['log']->info("Notification Sent");
					// }
				// }
				//~ $opp_bean->save();
			}
		}
		return true;
	}
?>
