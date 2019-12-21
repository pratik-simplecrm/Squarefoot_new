<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array();
$hook_array['before_save'] = Array();  

// $hook_array['before_save'][] = Array(1, 'Copy related architectural firm name to custom field', 'custom/modules/Arch_Architects_Contacts/before_save.php','CopyFirmName', 'copy_firm_name'); 

// $hook_array['before_save'][] = Array(1, 'full_name', 'custom/modules/Arch_Architects_Contacts/full_name.php','FullName', 'fullName');

// $hook_array['process_record'] = Array();
// $hook_array['process_record'][] = Array(1, 'Arch Architects Contacts ', 'custom/modules/Arch_Architects_Contacts/ArchitectsNotTouched.php','ArchitectsNotTouched', 'architects_not_touched_list');
$hook_array['before_save'][] = Array(1,"Auto update Name field",'custom/modules/Arch_Architects_Contacts/Sending_Email.php','Sending_Email','sendingemail_method');  
?>

