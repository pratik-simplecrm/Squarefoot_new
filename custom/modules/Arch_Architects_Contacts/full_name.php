<?php
/**
 * File : full_name.php
 * Trigger Type : before_save logic hook
 * Functionality : update field  full_name_c  as name.
 * 
*/
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class FullName {
    
    
        function fullName($bean, $event, $arguments) {

			global $db;
			//~ $GLOBALS['log']->fatal("Arc Firm Name ".$bean->arch_architectural_firm_arch_architects_contacts_1_name);
			$record_id         = $bean->id;
            $first_name        = $bean->first_name;
            $last_name         = $bean->last_name;
            $name              = $first_name.' '.$last_name;
            $bean->full_name_c = $name;

            //save architectural firm name in custom field
            if($bean->arch_archieaacal_firm_ida !='')
            $bean->architectural_firm_name_c = $bean->arch_architectural_firm_arch_architects_contacts_1_name;
       }
} 
  
?>



