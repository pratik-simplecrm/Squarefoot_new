<?php 
 //WARNING: The contents of this file are auto-generated



function count_status_types($record_id)
{

	require_once('modules/EvMgr_Evs/EvMgr_Evs.php');

	// Use the getRelationshipByModules($m1, $m2) function developed by Francesca Shiekh, explained at
	// http://developer.sugarcrm.com/2013/05/29/programmatically-find-the-name-of-the-relationship-between-two-modules
	// and located in this SugarCRM instance at <Sugar_Directory>/custom/Extension/application/Ext/Utils/find_relationship_name.php
	// to find the name of the relationship connecting this module to the related module: EvMgr_EvParts
	$originating_module = 'EvMgr_Evs';
	$destination_module = 'EvMgr_EvParts';
	$relationship_name_result = getRelationshipByModules($originating_module, $destination_module);
	$relationship_name = $relationship_name_result[0];

	// Retrieve the list of EvMgr_EvParts records related to this EvMgr_Evs record
	$event_object_id = $record_id;
	$events_object = new EvMgr_Evs();
	$events_object->retrieve($event_object_id);
	$events_object->load_relationship($relationship_name);
	$list_returned = $events_object->$relationship_name->getBeans();
	if ( !empty($list_returned) )
	{
		// $num_records = count($list_returned);
		// echo "There were $num_records records retrieved <br />";

		$invited_count = 0;
		$confirmed_count = 0;
		$never_showed_count = 0;
		$participated_count = 0;
		$graduated_count = 0;

		reset($list_returned);
		foreach ($list_returned as $record)
		{
			// Count the number for each attendee status for the records related to this module

			$attendee_status_retrieved = $record->attendee_status;

			// $event_participant_record_name = $record->name;
			// echo "The attendee_status of $event_participant_record_name is $attendee_status_retrieved <br />";
			
			switch ($attendee_status_retrieved)
			{
				case 'Invited';
					$invited_count = $invited_count + 1;
					break;
				case 'Confirmed';
					$confirmed_count = $confirmed_count + 1;
					break;
				case 'NeverShowed';
					$never_showed_count = $never_showed_count + 1;
					break;
				case 'Participated';
					$participated_count = $participated_count + 1;
					break;
				case 'Graduated';
					$graduated_count = $graduated_count + 1;
					break;
				default;
					echo "Error - The attendee status is not valid <br />";
			}

		}

		$need_save = false;

		if ( $events_object->num_invited != $invited_count )
		{
			// echo "The number invited was $invited_count <br />";
			$events_object->num_invited = $invited_count;
			$need_save = true;
		}
		if ( $events_object->num_confirmed != $confirmed_count )
		{
			// echo "The number confirmed was $confirmed_count <br />";
			$events_object->num_confirmed = $confirmed_count;
			$need_save = true;
		}
		if ( $events_object->num_nevershowed != $never_showed_count )
		{
			// echo "The number never_showed was $never_showed_count <br />";
			$events_object->num_nevershowed = $never_showed_count;
			$need_save = true;
		}
		if ( $events_object->num_participated != $participated_count )
		{
			// echo "The number participated was $participated_count <br />";
			$events_object->num_participated = $participated_count;
			$need_save = true;
		}
		if ( $events_object->num_graduated != $graduated_count )
		{
			// echo "The number graduated was $graduated_count <br />";
			$events_object->num_graduated = $graduated_count;
			$need_save = true;
		}

		if ( $need_save )
		{
			$events_object->save();
		}
	}

	return(true);
}



// A function to calculate (instead of hard-coding) the relationship name between two modules
// Thanks to Francesca Shiekh whose information is at http://forums.sugarcrm.com/members/francescas/ 
// This function is at
// http://developer.sugarcrm.com/2013/05/29/programmatically-find-the-name-of-the-relationship-between-two-modules/
function getRelationshipByModules ($m1, $m2)
{
	global $db,$dictionary,$beanList;
	$rel = new Relationship;
	if($rel_info = $rel->retrieve_by_sides($m1, $m2, $db))
	{
		$class = $beanList[$m1];
		$bean = new $class();
		$rel_name = $rel_info['relationship_name'];
		foreach($bean->field_defs as $field=>$def)
		{
			if(isset($def['relationship']) && $def['relationship']==$rel_name) return(array($def['name'], $m1));
		}
	}
	elseif($rel_info = $rel->retrieve_by_sides($m2, $m1, $db))
	{
		 $class = $beanList[$m2];
		 $bean = new $class();
		 $rel_name = $rel_info['relationship_name'];
		 foreach($bean->field_defs as $field=>$def)
		{
			if(isset($def['relationship']) && $def['relationship']==$rel_name) return(array($def['name'], $m2));
		}
	}
	return(FALSE);
}


?>