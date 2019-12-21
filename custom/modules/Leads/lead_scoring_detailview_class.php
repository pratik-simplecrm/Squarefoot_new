<?php

   if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

   class lead_scoring_after_retrieve_class
   {
      function lead_scoring_after_retrieve_method($bean, $event, $arguments)
      {
		    global $db, $sugar_config;
		
//echo "<pre>";		    
//print_r($bean->id);

$content_query = $db->query("SELECT * FROM lead_and_opportunities_scoring where id='1'");
$content_row = $db->fetchByAssoc($content_query);
            
	  $bean=$bean->retrieve($bean->id);
	        
            $all_fields=unserialize(base64_decode($content_row['lead']));
            foreach($all_fields as $field=>$marking)
            {
				$no=0;
				foreach($marking['select_condition'] as $select_condition)
				{
					//~ echo $bean->$field."==".$marking['condition_value'][$no];
					//~ echo "<br>";
						if($select_condition=="equal" )
					{
						if($bean->$field==$marking['condition_value'][$no] || $bean->$field==$marking['condition_key'][$no])
						{
							$tot_mark=$tot_mark+$marking['scoring_value'][$no];
						}
						
					}else if($select_condition=="not_equal")
					{
						if($bean->$field!=$marking['condition_value'][$no])
						{
							$tot_mark=$tot_mark+$marking['scoring_value'][$no];
						}
						
					}else if($select_condition=="empty")
					{
						if(empty($bean->$field))
						{
							$tot_mark=$tot_mark+$marking['scoring_value'][$no];
						}
					}else if($select_condition=="non_empty")
					{
						if(!empty($bean->$field))
						{
						$tot_mark=$tot_mark+$marking['scoring_value'][$no];
						}
					}else if($select_condition=="like")
					{
						if (stripos($bean->$field,$marking['condition_value'][$no]) !== false) {
						$tot_mark=$tot_mark+$marking['scoring_value'][$no];
						}
					}
				$no++;	
				}
				
				$bean->lead_scoring_c = $tot_mark; 
			}
        if($tot_mark<1)            
        {
                $bean->lead_scoring_c=0;	
        }
         //logic
      }
   }

?>
