<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(77, 'updateGeocodeInfo', 'modules/Opportunities/OpportunitiesJjwg_MapsLogicHook.php','OpportunitiesJjwg_MapsLogicHook', 'updateGeocodeInfo'); 
$hook_array['before_save'][] = Array(1, 'Opportunities push feed', 'modules/Opportunities/SugarFeeds/OppFeed.php','OppFeed', 'pushFeed'); 
$hook_array['before_save'][] = Array(2, 'Opportunities ', 'custom/modules/Opportunities/dateupdate.php','update', 'update'); 
$hook_array['before_save'][] = Array(1, 'Update the Opportunities won in sales forecast module', 'custom/modules/Opportunities/UpdateAmount.php','UpdateAmount', 'Update_Amount'); 
//written by: Anjali Ledade dated on: 11072019 start
#$hook_array['before_save'][] = Array(3, 'Upload the file in opportunities', 'custom/modules/Opportunities/uploadfile.php','UploadAttachment', 'Upload_Attachment'); 
//written by: Anjali Ledade dated on: 11072019 end

$hook_array['after_ui_frame'] = Array(); 
$hook_array['after_save'] = Array(); 
//$hook_array['after_save'][] = Array(2, 'Opportunities ', 'custom/modules/Opportunities/updateQuoteStage.php','UpdateQuoteStage', 'updateQuoteFromOpp'); 
// $hook_array['after_save'][] = Array(1, 'Opportunities ', 'custom/modules/Opportunities/notifyUser.php','NotificationEmailHook', 'notifyUserFor10LOpp'); 
//$hook_array['after_save'][] = Array(4, 'Opportunities ', 'custom/modules/Opportunities/updateExistingCustomer.php','UpdateExistingCustomer', 'update_existing_customer_field'); 
$hook_array['after_relationship_add'] = Array(); 
$hook_array['after_relationship_add'][] = Array(77, 'addRelationship', 'modules/Opportunities/OpportunitiesJjwg_MapsLogicHook.php','OpportunitiesJjwg_MapsLogicHook', 'addRelationship'); 
$hook_array['after_relationship_delete'] = Array(); 
$hook_array['after_relationship_delete'][] = Array(77, 'deleteRelationship', 'modules/Opportunities/OpportunitiesJjwg_MapsLogicHook.php','OpportunitiesJjwg_MapsLogicHook', 'deleteRelationship'); 
$hook_array['before_delete'] = Array(); 
$hook_array['process_record'] = Array(); 
$hook_array['process_record'][] = Array(1, 'Opportunities ', 'custom/modules/Opportunities/OpportunityNotTouched.php','OpportunityNotTouched', 'opportunity_not_touched_list'); 
$hook_array['process_record'][] = Array(151, 'Opportunities ', 'custom/modules/Opportunities/opportunities_scoring_record_class.php','opportunities_scoring_process_record_class', 'opportunities_scoring_process_record_method'); 
$hook_array['after_retrieve'] = Array(); 
$hook_array['after_retrieve'][] = Array(153, 'Opportunities scoring on detailview', 'custom/modules/Opportunities/opportunities_scoring_detailview_class.php','opportunities_scoring_after_retrieve_class', 'opportunities_scoring_after_retrieve_method'); 

//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field start (PO Column option - opportunity module)
 $hook_array['process_record'] = Array();
   $hook_array['process_record'][] = Array(154,'process_record opportunity','custom/modules/Opportunities/process_record_Opportunity.php',
   	'process_record_opportunity_class', 'process_record_opportunity_method' 
   );
//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field start (PO Column option - opportunity module)



?>