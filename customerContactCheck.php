<?php
/*
 * created by Anurag Tiwari
 * Purpose : Checking contact related to customer is there or not
 */
if(!defined('sugarEntry'))define('sugarEntry', true);
 require_once('include/entryPoint.php');
 require_once('include/database/DBManager.php');
 require_once('config.php');
 global $db;
 
 $account_id= $_GET['account_id'];
 
 $checkContact= "SELECT id
			     FROM  accounts_contacts 
				 WHERE  account_id LIKE '$account_id' AND deleted=0
				 LIMIT 0 , 1";
				 
 $query_result= $db->query($checkContact);
 $row =$db->fetchByAssoc($query_result);
 $acc_contactRelation_id = $row['id'];
 
 
 echo $acc_contactRelation_id;
 
 ?>

