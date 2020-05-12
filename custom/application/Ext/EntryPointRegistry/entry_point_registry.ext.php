<?php 
 //WARNING: The contents of this file are auto-generated


$entry_point_registry['QuickCRMgetConfig'] = array(
	'file' => 'custom/QuickCRM/getConfig.php',
	'auth' => false
);


$entry_point_registry['lead_scoring_response'] = array('file' => 'custom/modules/Administration/ls_lead_scoring/lead-scoring-response.php', 'auth' => true);
$entry_point_registry['lead_scoring_function'] = array('file' => 'custom/modules/Administration/ls_lead_scoring/lead-scoring-functions.php', 'auth' => true);






    $entry_point_registry['crmaudit'] = array(
        'file' => 'crmaudit.php',
        'auth' => false,
        'entryPoint' => true
    );
  $entry_point_registry['testreport'] = array(
        'file' => 'test_report.php',
        'auth' => false,
        'entryPoint' => true
    );
  $entry_point_registry['testEmail'] = array(
        'file' => 'test_email.php',
        'auth' => false,
        'entryPoint' => true
    );


$entry_point_registry['server_teams_users_processing'] = array('file' => 'custom/modules/Administration/dashboard-manager/server_teams_users_processing.php', 'auth' => true);
$entry_point_registry['server_roles_users_processing'] = array('file' => 'custom/modules/Administration/dashboard-manager/server_roles_users_processing.php', 'auth' => true);
$entry_point_registry['dashboard-manager-responce'] = array('file' => 'custom/modules/Administration/dashboard-manager/dashboard-manager-responce.php', 'auth' => true);
$entry_point_registry['server_processing'] = array('file' => 'custom/modules/Administration/dashboard-manager/server_processing.php', 'auth' => true);
$entry_point_registry['dashboard-manager-functions'] = array('file' => 'custom/modules/Administration/dashboard-manager/dashboard-manager-functions.php', 'auth' => true);
$entry_point_registry['server_users_processing'] = array('file' => 'custom/modules/Administration/dashboard-manager/server_users_processing.php', 'auth' => true);


?>