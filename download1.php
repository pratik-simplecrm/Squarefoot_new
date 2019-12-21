<?php

if (!defined('sugarEntry') || !sugarEntry) {

    die('Not A Valid Entry Point');
}
error_reporting(0);
global $db;
$id = $_REQUEST['id'];  // record id
$type = $_REQUEST['type'];  //module name
if($id!='' && $type=='Opportunities')
{
	$get_filename = "SELECT `filename` FROM `opportunities` WHERE `id`='$id'";	
	$result = $db->query($get_filename);
	$row_records_result = $db->fetchByAssoc($result);
	$file = $row_records_result['filename'];
	$file_exploded = explode(".",$file);
	//print_r($file_exploded);exit;
	$filename = "upload/".$id;
	$new_filename = $file_exploded[0].".".$file_exploded[1];
	//echo $new_filename;exit;
	if(file_exists($filename)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=\"$file\"");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        ob_clean();
        flush();
        readfile($filename);
        exit;
    }
}else{
	die('Invalid ID');
}
?>