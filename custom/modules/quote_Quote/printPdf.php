<?php
ini_set("display_errors", 'On');

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/quote_Quote/quote_pdfs/quote_pdf.php');

$pdf = new QuotePdf();
$pdf->printPdf($_REQUEST['record']);

?>
