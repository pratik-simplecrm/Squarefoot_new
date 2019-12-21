<?php
ini_set("display_errors",'On');

if(!defined('sugarEntry'))define('sugarEntry',true);

require_once('include/entryPoint.php');
require_once('include/SugarPHPMailer.php');
require_once('modules/Administration/Administration.php');
require_once('custom/modules/quote_Quote/quote_pdfs/quote_pdf.php');

$mail = new SugarPHPMailer();
$admin = new Administration();
$admin->retrieveSettings();

$emailpdf = new QuotePdf();
$emailpdf->printPdf($_REQUEST['record'], 'email');

$filename = $emailpdf->retFileName();
echo $email_id = $emailpdf->retEmailId();

if(!isset($email_id)) {
	echo $js = <<<EOF
		<script>
			alert("Quote doesn't have any email id !!");
			history.go(-1);
		</script>
EOF;
	die('No email sent..');
}	
echo "HELOO";
/*$mail->From = 'hatim@bhea.co.in';
$mail->AddAddress('hatim@bhea.co.in', 'Hatim Alam');
$mail->Subject = $filename;
$mail->Body = "Hello, This is test email.";
$mail->AddAttachment($filename.'_.pdf');
//$mail->Send();
/**/

?>
