<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class update_evmgr_evparts
{

	function new_contact_name_in_evmgr_evparts($bean, $event, $arguments)
	{
		// If the Event record is NOT a new creation and the Event Name has changed in this edit
		// find all the Event Participants records (module EvMgr_EvParts) related to this Event
		// and update the EventParticipantsName of each related record with the current name from this Event record
		// (the EventParticipantsName is a concatenation of the Event Name and Contact Name, so we want it accurate)
		if ( isset($bean->fetched_row['id']) )
		{
			$pre_save_contact_name = $bean->fetched_row['first_name'] . " " . $bean->fetched_row['last_name'];
			$current_contact_name = $bean->first_name . " " . $bean->last_name;

			if ( $pre_save_contact_name != $current_contact_name )
			{
				// Find all the Event Participants records that are related to this Event
				$originating_module = 'Contacts';
				$destination_module = 'EvMgr_EvParts';
				// Find the relationshp name between the two modules using the custom function developed by Francesca Shiekh
				// located in this SugarCRM instance at <Sugar_Directory>/custom/Extension/application/Ext/Utils/find_relationship_name.php
				$relationship_returned = getRelationshipByModules($originating_module,$destination_module);
				$relationship_name = $relationship_returned[0];
				// Fetch the related EvMgr_EvParts object(s)
				$originating_contact_object_id = $bean->id;
				$originating_contact_object = BeanFactory::getBean($originating_module,$originating_contact_object_id);
				$originating_contact_object->load_relationship($relationship_name);
				$evparts_list_returned = $originating_contact_object->$relationship_name->getBeans();
				// Update the name of the Event Participants record
				if ( !empty($evparts_list_returned) )
				{
					// If you just try to cycle through the $evparts_list_returned via a foreach loop
					// the loop just jumps to the last entry, since we tested the loop contents above and it advanced the array pointer
					// So I reset the array back to the first entry and then ran the foreach loop
					// and it works
					reset($evparts_list_returned);
					foreach ($evparts_list_returned as $current_evparts_record)
					{
						$current_event_name = $current_evparts_record->evmgr_evparts_evmgr_evs_name;
						$current_evparts_record->name = $current_event_name . ' - ' . $current_contact_name;
						$current_evparts_record->save();
					}
				}

			// Custom logic here to emulate the logic hook of "after_save"
			
			}
		}

		return(true);
	}

}

?>
