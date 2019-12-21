<?php
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once('include/entryPoint.php');
global $db;
global $timedate;
global $current_user;
$assigned_user_id = $_GET['assigned_user_id'];
$year = $_GET['year'];
//~ $quarter = $_GET['quarter'];
$query_sales = "SELECT count(SF.id) as sf_id
FROM sf_sales_forecast SF
JOIN users_sf_sales_forecast_1_c SFC ON SFC.users_sf_sales_forecast_1users_ida =  '$assigned_user_id'
AND SF.year =  '$year'
AND SF.deleted =0
AND SFC.users_sf_sales_forecast_1sf_sales_forecast_idb = SF.id";
$result = $db->query($query_sales);
$row = $db->fetchByAssoc($result);
echo $sales_forecast_id = $row['sf_id'];
