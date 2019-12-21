<?php
ini_set('display_errors','On');
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

  class SendingEmail
    {
        function sendingemail_method($bean, $event, $arguments)
        {
        	global $db;
			// echo $fetched_email = $bean->fetched_row['email1'];
			// echo "<br>";
			$email = $bean->email1;
			if($fetched_email != $email)
			{
				//echo $email;exit;
					require_once('include/SugarPHPMailer.php');
						$emailObj = new Email();
						$defaults = $emailObj->getSystemDefaultEmail();
						$mail = new SugarPHPMailer();
						$mail->setMailerForSystem();
						$mail->From = $defaults['email'];
						//$mail->From .= 'Content-type: text/html\r\n';
						$mail->FromName = $defaults['name'];
						$mail->Subject = 'Thanks for your time';
						$mail->IsHTML(true);
						$body = <<<Email
						<p><img style="vertical-align: middle;" src="http://www.squarefoot.co.in/images/SF-532-17%20EDM%20Sales%20Team%2019%20Feb.jpg" alt="" width="1200" height="1200" /></p>
Email;
						$mail->Body = $body;
						$mail->prepForOutbound();
						$mail->AddAddress($email);
						//$this->AddEmbeddedImage($file_location, $cid, $filename, 'base64', $mime_type);
						if (!$mail->Send()){
							$GLOBALS['log']->fatal('Email Send : Error Info:'.$mail->ErrorInfo);
						}
			}
		}
	}
?>