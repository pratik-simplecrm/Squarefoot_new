<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(77, 'updateMeetingGeocodeInfo', 'modules/Meetings/MeetingsJjwg_MapsLogicHook.php','MeetingsJjwg_MapsLogicHook', 'updateMeetingGeocodeInfo'); 

//created by pratik for updating service co-ordinator after creating meeting on 06122019 
$hook_array['after_save'][] = Array(10, 'Update Meeting Service-Cordinator', 'custom/modules/Meetings/assignedServiceCordinator.php','updateServiceCordinator', 'update_Service_Coordinator');

//created by pratik for creating new case 10122019 
$hook_array['after_save'][] = Array(11, 'Create new case', 'custom/modules/Meetings/createnew_case.php','CreateCase', 'create_case');

//created by pratik forsend mail to supervisor 18122019
$hook_array['after_save'][] = Array(11, 'Send Mail to Supervisor', 'custom/modules/Meetings/send_mail_to_supervisor.php','SendNotification', 'send_mail_to_supervisor');
 
$hook_array['before_save'] = Array(); 
$hook_array['before_delete'] = Array(); 



?>