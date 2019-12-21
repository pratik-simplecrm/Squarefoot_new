<?php
ini_set('display_errors','On');
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('config.php');
global $db; 
$quote_info = "select id from quote_quote where quotation_status='Closed Won' and deleted=0";
$result_info = $db->query($quote_info);
while($row_info = $db->fetchByAssoc($result_info))
{
	$quote_id = $row_info['id'];
	$update_quote = "UPDATE quote_quote_cstm SET approval_status_c='Approved' where id_c='$quote_id'";
	$result_quote = $db->query($update_quote);
}
?>
