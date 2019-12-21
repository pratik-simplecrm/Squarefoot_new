<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not a valid entry point');

class NotificationEmailHook {

	/**
	 * Purpose: To update the quote stage on change of Opp sales stage
	 * Author: Hatim Alam
	 * Dated: 14th July 2014
	 */
	function notifyUserFor10LOpp (&$bean, $event, $arguments) {
		global $sugar_config;
		//get the opportunity amount
		$opp_amount = $bean->amount;
		$id = $bean->id;
		$name = $bean->name;
		$assigned_user_id = $bean->assigned_user_id;
		$email=$this->fetch_project_head_email($assigned_user_id);
		//If amount is more than 10L
		if($opp_amount > 1000000) {
			//include the required files for php mailer
			require_once('include/SugarPHPMailer.php');
			require_once('modules/Administration/Administration.php');
			$mail = new SugarPHPMailer();
			//echo '<pre>';print_r($mail);echo '</pre>';exit;
			$admin = new Administration();
			$admin->retrieveSettings();

			//prepare the mail body
			// $body = "<a href='".$sugar_config['site_url']."/index.php?module=Opportunities&action=DetailView&record=".$bean->id."' title='Click here to view the opportunity'>Click here to view the opportunity</a>";
			// //set the subject
			$subject = "> 10 lac opportunity created - ".$bean->name;
			// //set up the mailer object
			// $mail->AddAddress('vijay@bhea.com');
			// //required authentication
			// $mail->IsSMTP();
			// $mail->SMTPAuth = true;
			// $mail->IsHTML(true);
			// $mail->Body = from_html($body);
			// $mail->Subject = $subject;
			// $mail->From = 'vijay@bhea.com';
			// $mail->FromName = "Square Foot";
			// $mail->ContentType= "text/html";
			
			
			require_once('include/SugarPHPMailer.php');
			$emailObj = new Email();         
			$defaults = $emailObj->getSystemDefaultEmail();
			$mail = new SugarPHPMailer();
			$mail->setMailerForSystem();
			$mail->IsHTML(true);
			$mail->From = $defaults['email'];
			$mail->FromName = $defaults['name'];
			$mail->AddAddress($email);
			$mail->AddAddress('gsaraf@squarefoot.co.in');
			$mail->AddAddress('asaraf@squarefoot.co.in');
			$mail->Subject = ($subject); 
			$mail->Body = "<a href='".$sugar_config['site_url']."/index.php?module=Opportunities&action=DetailView&record=".$bean->id."' title='Click here to view the opportunity'>Click here to view the opportunity</a>";		
			if(!$mail->Send()){
				$GLOBALS['log']->fatal("Could not send notification: ". $mail->ErrorInfo);
			} else {
				$GLOBALS['log']->info("Notification Sent");
			}
		}
	}
	function fetch_project_head_email($user_id)
	{
		global $db;
		$getproject ="SELECT reports_to_id FROM users WHERE id='$user_id' AND deleted=0";					    
		$getproject_res = $db->query($getproject);
		$rowget=$db->fetchByAssoc($getproject_res);		
		$project_head_id=$rowget['reports_to_id'];	
		
		$customer_email="";
		$get_acc_email="select email_address
						from email_addresses e, email_addr_bean_rel ec
						where bean_id = '$project_head_id'
						and ec.email_address_id = e.id
						and e.opt_out =0
						and e.deleted =0
						and ec.deleted =0";
		$get_acc_email_res=$db->query($get_acc_email);				
		$get_acc_email_row=$db->fetchByAssoc($get_acc_email_res);	
		$customer_email=$get_acc_email_row['email_address'];
		return $customer_email;
	} 
}

?>
