<?php

if(!defined('sugarEntry')) define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('config.php');

require_once 'custom/modules/Administration/ls_lead_scoring/lead-scoring-functions.php';
include('include/language/en_us.lang.php');
include('custom/include/language/en_us.lang.php');

     $myfunction = new Leadscoring();
     $result = $myfunction->$_POST['call_function']($_POST['id'],$_POST['no']);
  	 echo $result;

?>
