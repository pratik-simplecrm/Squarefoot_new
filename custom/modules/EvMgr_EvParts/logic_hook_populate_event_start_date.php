<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class evmgr_evparts_hook
{
	function populate_event_start_date($bean, $event, $arguments)
	{
		$originating_module = 'EvMgr_EvParts';
		$destination_module = 'EvMgr_Evs';
		// Find the relationshp name between the two modules using the custom function developed by Francesca Shiekh
		// located in this SugarCRM instance at <Sugar_Directory>/custom/Extension/application/Ext/Utils/find_relationship_name.php
		$relationship_returned = getRelationshipByModules($originating_module,$destination_module);
		$relationship_name = $relationship_returned[0];
		// Fetch the related EvMgr_Evs object
		$event_part_object_id = $bean->id;
		$event_part_object = new EvMgr_EvParts();
		$event_part_object->retrieve($event_part_object_id);
		$event_part_object->load_relationship($relationship_name);
		$list_returned = $event_part_object->$relationship_name->getBeans();
		// Update the event_start_date vardef
		if ( !empty($list_returned) )
		{
			reset($list_returned);
			foreach ($list_returned as $record);
			{
				$bean->event_start_date_imported = $record->start_date;
			}
		}
	}
}
?>
