<?php
/**
 * File : before_save.php
 * Trigger Type : before_save logic hook
 * Functionality : Update related firm name to custom field.
 * Written by: Hatim Alam on 8th April 2015
*/
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class CopyFirmName {
    
    
        function copy_firm_name($bean, $event, $arguments) {

            //save architectural firm name in custom field
            if($bean->arch_archieaacal_firm_ida !='')
            $bean->architectural_firm_name_c = $bean->arch_architectural_firm_arch_architects_contacts_1_name;

       }
} 
  
?>
