<?php

    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
   
    class BeforeSave
    {
        function before_save_method($bean, $event, $arguments)
        {
			//~ echo "<pre>";
			//~ print_r($bean);
			//~ exit;
			global $app_list_strings;
            //logic
            $team=$GLOBALS['app_list_strings']['teams_list'][$bean->teams_c];
            $bean->name=$team;
        }
    }

?>
