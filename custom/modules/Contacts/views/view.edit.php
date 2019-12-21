<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

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


class ContactsViewEdit extends ViewEdit
{
 	public function __construct()
 	{
 		parent::ViewEdit();
 		$this->useForSubpanel = true;
 		$this->useModuleQuickCreateTemplate = true;
 	}

 	/**
 	 * @see SugarView::display()
	 *
 	 * We are overridding the display method to manipulate the sectionPanels.
 	 * If portal is not enabled then don't show the Portal Information panel.
 	 */
 	public function display()
 	{
		global $current_user, $app_list_strings;
        $this->ev->process();

		//get the user under Sales Director role
		$sales_dir_users = $this->getSalesDirUsers();
		//Roles to be able to see the mobile number
		$role_array = $app_list_strings['role_arr_list'];
		//check the logged in user
		$logged_in_user = $current_user;

		require_once("modules/ACLRoles/ACLRole.php");
		$acl_role_obj = new ACLRole();
		$user_roles = $acl_role_obj->getUserRoles($logged_in_user->id); // grab a list of the current user's roles

		if($_REQUEST['record'] != '') {
			if(!empty($user_roles)) {
				foreach($user_roles as $role) {
					if(!in_array($role, $role_array)) {
						$this->hideMobileField();
						break;
					}
				}
			} else {
				$this->hideMobileField();
			}
		}

		//hide the mobile field if created by Sales Director
		if((in_array($this->bean->created_by, $sales_dir_users)) && (! in_array($current_user->id, $sales_dir_users))) {
			$this->hideMobileField();
		}

		echo $this->ev->display($this->showTitle);
 	}

	public function hideMobileField() {
		$js = <<<BOC
		<script type="text/javascript">
		$(document).ready(function() {
			//hide field's parent td and its label
			$("#phone_mobile").parent().hide();
			$("#phone_mobile").parent().prev().hide();
		});
		</script>
BOC;
		echo $js;
	}

	public function getSalesDirUsers() {
		global $db;
		$user_ids = array();

		//get all the users related to Sales Director Role
		$query_res = $db->query("SELECT user_id
		FROM `acl_roles_users` ru
		RIGHT JOIN acl_roles r ON ru.role_id = r.id
		WHERE r.name = 'Sales Director'
		AND r.deleted=0
		AND ru.deleted=0");
		//fetch the user ids
		while($row = $db->fetchByAssoc($query_res)) {
			$user_ids[] = $row['user_id'];
		}
		return $user_ids;
	}
}
