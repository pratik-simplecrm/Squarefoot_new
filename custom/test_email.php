<?php
if (!defined('sugarEntry') || !sugarEntry) {

    die('Not A Valid Entry Point');
}
require_once('include/SugarPHPMailer.php');
global $db, $current_user,$sugar_config;


$reports_to_email = "azimuddin.azimuddin@sc.com";  
$emailObj = new Email();  
$defaults = $emailObj->getSystemDefaultEmail();  
$mail = new SugarPHPMailer();
$mail->IsHTML(true);								
$mail->setMailerForSystem();  
$mail->From = $defaults['email'];  
$mail->FromName = $defaults['name'];  
$subject = 'Test email refers to the complaint to IMB';
                        $mail->Subject = $subject;
                        $mail->IsHTML(true);
                        $body = <<<Email
									<p>Hello,</p>
									<p>test email refers to the complaint to IMB that the automated emails to the inquiry  were not being received.</p>
									
									
Email;
                        $mail->Body = $body;
                        $mail->prepForOutbound();
                        $mail->AddAddress($reports_to_email);
                        $mail->AddCC('pratik@simplecrm.com');
                        if (!$mail->Send()){
                            $GLOBALS['log']->fatal('Email Send : Error Info:'.$mail->ErrorInfo);
                                $APILogFile = 'email_send_status.txt';
								$handle = fopen($APILogFile, 'a');
								$timestamp = date('Y-m-d H:i:s');
								$info = 'Email Send : Error Info:'.$mail->ErrorInfo;
								$logArray = array('mail_send_status'=>$info,'Email_Sent_On'=>$reports_to_email);
								$logArray2 = print_r($logArray, true);
								$logMessage1 = "\nemail_send_status Result at $timestamp :-\n$logArray2";		
								fwrite($handle, $logMessage1);
								fclose($handle);
                        }else{

                        	  $APILogFile = 'email_send_status.txt';
								$handle = fopen($APILogFile, 'a');
								$timestamp = date('Y-m-d H:i:s');
								$info = 'Email sent successfully';
								$logArray = array('mail_send_status'=>$info,'Email_Sent_On'=>$reports_to_email);
								$logArray2 = print_r($logArray, true);
								$logMessage1 = "\nemail_send_status Result at $timestamp :-\n$logArray2";		
								fwrite($handle, $logMessage1);
								fclose($handle);
                        }