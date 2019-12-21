<?php

ini_set("display_errors", 'off');
if(!defined('sugarEntry')) define('sugarEntry', true);
global $db;
$opp_id = $_REQUEST['record'];
require_once('modules/Opportunities/Opportunity.php');
$opp_obj = new Opportunity();
$opp_obj->retrieve($opp_id);
$feedback_email_sent = $opp_obj->feeback_email_sent_c;
if($feedback_email_sent =='no')
{
$account_info = "SELECT account_id from accounts_opportunities where opportunity_id='$opp_id'";
$result_account = $db->query($account_info);
$row_account = $db->fetchByAssoc($result_account);
$account_id = $row_account['account_id'];
		require_once('modules/Accounts/Account.php');
		$obj = new Account();
		//$obj->retrieve($_REQUEST['return_id']);
		$obj->retrieve($account_id);
		$account_name = $obj->name;
		require_once('include/SugarPHPMailer.php');
		$emailObj = new Email();
		$defaults = $emailObj->getSystemDefaultEmail();
		$mail = new SugarPHPMailer();
		$mail->setMailerForSystem();
		$mail->From = $defaults['email'];
		//$mail->From .= 'Content-type: text/html';
		$mail->FromName = $defaults['name'];
		$subject = 'Installation is Completed';
		$mail->Subject = $subject;
		$mail->IsHTML(true);
		$body=<<<EOF
		<p style = "margin-bottom: 0in;"><span style = "font-size: medium; font-family: verdana,geneva;">Dear <strong>$obj->name</strong><br /></span></p>
		<p style = "margin-bottom: 0in;">&nbsp;</p>
		<p style = "margin-bottom: 0in;"><span style = "font-size: medium; font-family: verdana,geneva;">Thank you for choosing Square Foot for your flooring needs. It was our pleasure to service your requirement.</span></p>
		<p style = "margin-bottom: 0in;"><span style = "font-size: medium; font-family: verdana,geneva;">We strive to improve ourselves to provide the best quality products and services to our customers. To achieve this, we look forward to an honest feedback from you. </span></p>
		<p style = "margin-bottom: 0in;"><span style = "font-size: medium; font-family: verdana,geneva;">Please click on the below URL to go to our feedback survey form: 
 </span></p>
		<p style = "margin-bottom: 0in;"><a href = "http://squarefoot.simplecrmondemand.com/Survey.php?id=$opp_id&cn=$account_name&ci=$account_id"><strong>click here</strong></a></p>
<p style = "margin-bottom: 0in;">&nbsp;</p>
<p style = "margin-bottom: 0in;"><span style = "font-size: medium; font-family: verdana,geneva;">Thank you,</span></p>
<p style = "margin-bottom: 0in;"><span style = "font-size: medium; font-family: verdana,geneva;">Square Foot</span></p>
		
EOF;

$mail->Body = $body;
		$mail->prepForOutbound();
		$email = $obj->email1;
		$mail->AddAddress($email);
		$GLOBALS['log']->fatal('Email:'.$email);
		if (!$mail->Send()){
			$GLOBALS['log']->fatal('Email Send : Error Info:'.$mail->ErrorInfo);
                }
                $query2 = "UPDATE opportunities_cstm SET feeback_email_sent_c = 'yes',installation_completed_c='1' WHERE id_c = '".$opp_id."'"; 
                        $result2 = $db->query($query2);
}
SugarApplication::redirect('index.php?action=DetailView&module=Opportunities&record='.$opp_id.'');
?>
