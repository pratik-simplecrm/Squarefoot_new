<?php
if(!defined('sugarEntry')) define('sugarEntry', true);
/*
 * To find out Tax Values related to Branch Selected
 *
 */
global $db;
$tax_array = array();
$i = 0;
$branch = $_REQUEST['branch'];
require_once('include/entryPoint.php');
$dd = "";
//$dd = "new Option('', '')";
$dd.= "<option value=''></option>";
$query = $db->query( "SELECT tax.name,tax_c.percentage_c FROM quote_quotetax as tax
                                JOIN quote_quotetax_cstm AS tax_c ON
                                (tax.id=tax_c.id_c) 
                                WHERE tax_c.branch_c='$branch'
                                AND tax.deleted=0 AND tax_c.status_c='Active'" );

while($query_result=$db->fetchByAssoc($query)) {
	$dd.= "<option value='$query_result[name]'>$query_result[name]</option>";
	//$dd.= ",new Option('$query_result[name]', '$query_result[percentage_c]')";
}

echo $dd;
?>
 
