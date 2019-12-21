<?php
if(!defined('sugarEntry')) define('sugarEntry', true);
global $db;
$branch  = $_REQUEST['branch'];
require_once('include/entryPoint.php');

$query = $db->query( "SELECT * FROM pdf_quote_pdf as pdf
                                JOIN pdf_quote_pdf_cstm AS pdf_c ON
                                (pdf.id=pdf_c.id_c)
                                WHERE pdf.branch='$branch'
                                AND pdf.deleted=0 LIMIT 0,1" );
$query_result=$db->fetchByAssoc($query);
$taxPercentage  = "GST No:".$query_result['vat_no']."\n";
$taxPercentage .= "Company CIN No:".$query_result['cst_no']."\n";
//$taxPercentage .= "Service Tax No:".$query_result['stn']."\n";
$taxPercentage .= "W.e.f.:".$query_result['w']."\n";
$taxPercentage .= "Branch:".$query_result['branch']."\n";
$taxPercentage .= "State:".$query_result['state']."\n";
$taxPercentage .= "Address:".$query_result['address_1_c'];
echo $taxPercentage;
