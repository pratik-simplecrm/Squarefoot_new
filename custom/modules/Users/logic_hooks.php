<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_login'] = Array(); 
$hook_array['after_login'][] = Array(1, 'SugarFeed old feed entry remover', 'modules/SugarFeed/SugarFeedFlush.php','SugarFeedFlush', 'flushStaleEntries'); 
$hook_array['after_login'][] = Array(2, 'after_login', 'custom/modules/Users/Login_Audit.php','login_audit_class', 'after_login_method');
$hook_array['after_logout'] = Array(); 
$hook_array['after_logout'][] = Array(1, 'after_logout', 'custom/modules/Users/Logout_Audit.php','logout_audit_class', 'after_logout_method'); 
//$hook_array['after_retrieve'] = Array(); 
// $hook_array['after_retrieve'][] = Array(1, 'Teams CE Users Extension', 'modules/team/teams_logic.php','teams_logic', 'get_user_teams'); 
// $hook_array['after_retrieve'][] = Array(2, 'Teams CE ListView Extension', 'modules/team/teams_logic.php','teams_logic', 'add_list_logic_hook'); 
// $hook_array['process_record'] = Array(); 
// $hook_array['process_record'][] = Array(1, 'Teams CE Subpanel Extension', 'modules/team/teams_logic.php','teams_logic', 'get_subpanel_user_type'); 

$hook_array['before_save'] = Array(); 
$hook_array['before_delete'] = Array(); 
$hook_array['before_logout'] = Array(); 
$hook_array['login_failed'] = Array(); 

$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(1, 'update bhea_report_scheduler table for inactive user', 'custom/modules/Users/UpdateSchedulerReportTable.php', 'UpdateSchedulerReportTable', 'inactive_user_to_deleted'); 
$hook_array['after_save'][] = Array(2, 'insert inactive users into users_audit table', 'custom/modules/Users/UpdateSchedulerReportTable.php', 'UpdateSchedulerReportTable', 'insert_users_audit_table'); 
$hook_array['after_save'][] = Array(3, 'update group', 'custom/modules/Users/UpdateSchedulerReportTable.php', 'UpdateSchedulerReportTable', 'updategroup'); 
/*$hook_array['after_relationship_add'] = Array(); 
$hook_array['after_relationship_add'][] = Array(1, 'after relatinship add', 'custom/modules/Users/UpdateSchedulerReportTable.php', 'UpdateSchedulerReportTable', 'after_relationship_add_fun'); 
$hook_array['after_relationship_delete'] = Array(); 

$hook_array['after_relationship_delete'][] = Array(1, 'after relatinship add', 'custom/modules/Users/UpdateSchedulerReportTable.php', 'UpdateSchedulerReportTable', 'after_relationship_delete_fun'); 
*/
?>
