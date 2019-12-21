<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Master Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/en/msa/master_subscription_agreement_11_April_2011.pdf
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2011 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/

/*********************************************************************************

 * Description: This file is used to override the default Meta-data DetailView behavior
 * to provide customization specific to the Campaigns module.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

class CallsViewEdit extends ViewEdit {

 	function CallsViewEdit(){
 		parent::ViewEdit();
 		$this->useForSubpanel = true;
 	}
 	
 	function display() {
		
	global $db,$current_user,$sugar_config;
	require_once('include/TimeDate.php');

	//To autopopulate Teams in QuickCreate On Subpanels 
	//START - 29-09-2014  
	//~ $parent_module = $_REQUEST['return_module'];
	//~ $current_user->user_name; 
	//~ $user = $current_user->id; 
	
	//~ $query = "SELECT default_team FROM users 
				//~ WHERE id ='$user' 
				//~ AND deleted =0";
	//~ $res   = $db->query($query);
	//~ $row   = $db->fetchByAssoc($res);
	//~ $default_team = $row['default_team'];
	
	//~ $get_team = " SELECT id,name FROM team where id ='$default_team' AND deleted =0 ";
	//~ $team_res = $db->query($get_team);
	//~ $team_row = $db->fetchByAssoc($team_res);
				
	//~ $id = $team_row['id'];  
	//~ $name = $team_row['name']; 
	//~ $team_id   = trim($id);
	//~ $team_name = trim($name);

	//~ $team =<<<EOD
				//~ <script>
					//~ var team_name = '$team_name';
					//~ var team_id = '$team_id';
					
					//~ $('#form_SubpanelQuickCreate_Calls_tabs #team_name').val(team_name);
					//~ $('#form_SubpanelQuickCreate_Calls_tabs #team_id').val(team_id);

				//~ </script>
				
//~ EOD;
		//END 29-09-2014 
		//# Auto Populate Teams in QuickCreate SubPanels
		
		  
 		parent::display();
 		echo $js; 
 		echo $js1;
 		echo $team; 
 	}
}
?>
