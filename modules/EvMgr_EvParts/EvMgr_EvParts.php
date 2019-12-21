<?PHP
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

/*
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */

require_once('modules/EvMgr_EvParts/EvMgr_EvParts_sugar.php');

class EvMgr_EvParts extends EvMgr_EvParts_sugar {
	
	function EvMgr_EvParts(){	
		parent::EvMgr_EvParts_sugar();
	}

	function save($check_notify = FALSE) {
		// Custom logic here to emulate the logic hook of "before_save"

		// Concatenate the Event Name and the Attendee Name to create a Name for the new entry
		$event_name = $this->evmgr_evparts_evmgr_evs_name;
		$attendee_name = $this->evmgr_evparts_contacts_name;
		$calc_name = $event_name . " - " . $attendee_name;
		$this->name = $calc_name;
		
		// Update the count for the attendee_status types
		// Do it here in the before_save scenario for records that already exist 
		// so the values shown in the detailview will be immediately updated on screen refresh
		// Check value of id to see if it existed when the record was fetched 
		// (if id existed, this would be an existing record so can use the before_save with existing id and fetch related records)
		if ( isset($this->fetched_row['id']) )
		{		
			$originating_module = 'EvMgr_EvParts';
			$destination_module = 'EvMgr_Evs';
			// Find the relationshp name between the two modules using the custom function developed by Francesca Shiekh
			// located in this SugarCRM instance at <Sugar_Directory>/custom/Extension/application/Ext/Utils/find_relationship_name.php
			$relationship_returned = getRelationshipByModules($originating_module,$destination_module);
			$relationship_name = $relationship_returned[0];
			// Fetch the related EvMgr_Evs object
			$event_part_object_id = $this->id;
			$event_part_object = new EvMgr_EvParts();
			$event_part_object->retrieve($event_part_object_id);
			$event_part_object->load_relationship($relationship_name);
			$list_returned = $event_part_object->$relationship_name->getBeans();
			// Update the attendee_status counts in the related Event record using the custom function developed by Richard Cantin
			// located in this SugarCRM instance at <Sugar_Directory>/custom/Extension/application/Ext/Utils/count_attendee_status_types.php
			if ( !empty($list_returned) )
			{
				reset($list_returned);
				foreach ($list_returned as $record);
				{
					$event_object_id = $record->id;
					$count_totals = count_status_types($event_object_id);
				}
			}
		}
		

		parent::save($check_notify);

		// Custom logic here to emulate the logic hook of "after_save"

		// Update the count for the attendee_status types
		// Do it here in the after_save scenario for records that are newly created
		// so the record id is created before the function to fetch related records is attempted
		// Check value of id to see if it existed when the record was fetched 
		// (if no id existed, this would be a new record creation so must wait until after_save to get id created and fetch related records)
		if ( !isset($this->fetched_row['id']) )
		{
			$originating_module = 'EvMgr_EvParts';
			$destination_module = 'EvMgr_Evs';
			// Find the relationshp name between the two modules using the custom function developed by Francesca Shiekh
			// located in this SugarCRM instance at <Sugar_Directory>/custom/Extension/application/Ext/Utils/find_relationship_name.php
			$relationship_returned = getRelationshipByModules($originating_module,$destination_module);
			$relationship_name = $relationship_returned[0];
			// Fetch the related EvMgr_Evs object
			$event_part_object_id = $this->id;
			$event_part_object = new EvMgr_EvParts();
			$event_part_object->retrieve($event_part_object_id);
			$event_part_object->load_relationship($relationship_name);
			$list_returned = $event_part_object->$relationship_name->getBeans();
			// Update the attendee_status counts in the related Event record using the custom function developed by Richard Cantin
			// located in this SugarCRM instance at <Sugar_Directory>/custom/Extension/application/Ext/Utils/count_attendee_status_types.php
			if ( !empty($list_returned) )
			{
				reset($list_returned);
				foreach ($list_returned as $record);
				{
					$event_object_id = $record->id;
					$count_totals = count_status_types($event_object_id);
				}
			}
		}

	}

}
?>
