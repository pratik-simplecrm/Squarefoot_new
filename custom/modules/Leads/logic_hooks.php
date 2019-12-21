<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(77, 'updateGeocodeInfo', 'modules/Leads/LeadsJjwg_MapsLogicHook.php','LeadsJjwg_MapsLogicHook', 'updateGeocodeInfo'); 
$hook_array['before_save'][] = Array(1, 'Leads push feed', 'modules/Leads/SugarFeeds/LeadFeed.php','LeadFeed', 'pushFeed'); 
$hook_array['after_ui_frame'] = Array(); 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(77, 'updateRelatedMeetingsGeocodeInfo', 'modules/Leads/LeadsJjwg_MapsLogicHook.php','LeadsJjwg_MapsLogicHook', 'updateRelatedMeetingsGeocodeInfo'); 
$hook_array['after_retrieve'] = Array(); 
$hook_array['after_retrieve'][] = Array(152, 'Lead scoring on detailview', 'custom/modules/Leads/lead_scoring_detailview_class.php','lead_scoring_after_retrieve_class', 'lead_scoring_after_retrieve_method'); 
$hook_array['process_record'] = Array(); 
$hook_array['process_record'][] = Array(150, 'Lead and Opportunities Scoring ', 'custom/modules/Leads/lead_scoring_record_class.php','lead_scoring_process_record_class', 'lead_scoring_process_record_method'); 



?>