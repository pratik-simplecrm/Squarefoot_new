<?php

   if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

   class opportunities_scoring_process_record_class
   {
      function opportunities_scoring_process_record_method($bean, $event, $arguments)
      {
		    global $db, $sugar_config;
		
//echo "<pre>";		    
//print_r($bean->id);

$content_query = $db->query("SELECT * FROM lead_and_opportunities_scoring where id='1'");
$content_row = $db->fetchByAssoc($content_query);
            

$bean=$bean->retrieve($bean->id);

            $all_fields=unserialize(base64_decode($content_row['opportunities']));
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
						if (stripos($bean->$field,$marking['condition_value'][$no]) !== false) 
						{
						$tot_mark=$tot_mark+$marking['scoring_value'][$no];
						}
					}
				$no++;	
				}
				if($tot_mark<70)
				{
				$label="label-danger";	
				}else if($tot_mark<90)
				{
				$label="label-warning";	
				}else if($tot_mark<100)
				{
				$label="label-success";	
				}
				$bean->opportunities_scoring_c = "<span class='label ".$label."' style='display: inline-block;min-width: 30px;padding: 8px 8px;font-size: 12px;font-weight: 700;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: middle;border-radius: 50px;'>".$tot_mark."</span>"; 
			}
        if($tot_mark<1)            
        {
                $bean->opportunities_scoring_c ="<span class='label label-danger' style='display: inline-block;min-width: 30px;padding: 8px 8px;font-size: 12px;font-weight: 700;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: middle;border-radius: 50px;'>0</span>";	
        }
         //logic
         
      }
   }

?>
