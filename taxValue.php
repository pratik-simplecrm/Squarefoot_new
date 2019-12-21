<?php
if(!defined('sugarEntry')) define('sugarEntry', true);
global $db;
$branch  = $_REQUEST['branch'];
$taxName = $_REQUEST['taxName'];
require_once('include/entryPoint.php');

$query = $db->query( "SELECT tax_c.percentage_c FROM quote_quotetax as tax
                                JOIN quote_quotetax_cstm AS tax_c ON
                                (tax.id=tax_c.id_c) 
                                WHERE tax_c.branch_c='$branch'
                                AND tax.name='$taxName' AND tax.deleted=0 AND tax_c.status_c='Active' LIMIT 0,1" );
$query_result=$db->fetchByAssoc($query);
echo $taxPercentage = $query_result['percentage_c'];
