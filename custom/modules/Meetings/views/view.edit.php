<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
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
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/


require_once('include/json_config.php');

class MeetingsViewEdit extends ViewEdit
{
 	/**
 	 * @see SugarView::preDisplay()
 	 *
 	 * Override preDisplay to check for presence of 'status' in $_REQUEST
 	 * This is to support the "Close And Create New" operation.
 	 */
 	public function preDisplay()
 	{
 		if(!empty($_REQUEST['status']) && ($_REQUEST['status'] == 'Held')) {
	       $this->bean->status = 'Held';
 		}

 		parent::preDisplay();
 	}

 	/**
 	 * @see SugarView::display()
 	 */
 	public function display()
 	{
 		global $json;
		global $db, $current_user; 
        $json = getJSONobj();
        $json_config = new json_config();
		if (isset($this->bean->json_id) && !empty ($this->bean->json_id)) {
			$javascript = $json_config->get_static_json_server(false, true, 'Meetings', $this->bean->json_id);
		} else {
			$this->bean->json_id = $this->bean->id;
			$javascript = $json_config->get_static_json_server(false, true, 'Meetings', $this->bean->id);
		}
 		$this->ss->assign('JSON_CONFIG_JAVASCRIPT', $javascript);
 		if($this->ev->isDuplicate){
	        $this->bean->status = $this->bean->getDefaultStatus();
 		} //if

		$this->ss->assign('remindersData', Reminder::loadRemindersData('Meetings', $this->bean->id, $this->ev->isDuplicate));
		$this->ss->assign('remindersDataJson', Reminder::loadRemindersDataJson('Meetings', $this->bean->id, $this->ev->isDuplicate));
		$this->ss->assign('remindersDefaultValuesDataJson', Reminder::loadRemindersDefaultValuesDataJson());
		$this->ss->assign('remindersDisabled', json_encode(false));
		
		//fetched login user branch name start (written by pratik on 10122019)
		/* $login_username = $current_user->user_name;
		$get_loginuserbranch = "SELECT `branch_c` FROM `users_cstm` as A inner join `users` as B on A.id_c = B.id WHERE user_name = '$login_username'";
		$branchname = $db->query($get_loginuserbranch);
		$row11 = $db->fetchByAssoc($branchname);
		$branch_name = trim($row11['branch_c'])."_meetings"; */
		//fetched login user branch name End (written by pratik on 10122019)
			
//code written by pratin on 11122019 start (on page load auto click search button and set first name as supervisors)				
		echo $customization = <<<CUS
            <script>
			$(document).ready(function()
			{
				
				/*$('#scheduler_search td:first').append('<input name="search_region" id="search_region" value="$branch_name" type="hidden" size="10">');
				*/
				
				setTimeout(function()
				{ 
				    $("#schedulerTable tbody tr:eq(1) th:eq(0)").text('8:00AM');
					 $("#schedulerTable tbody tr:eq(1) th:eq(4)").text('12:00PM');
					//$('#search_first_name').val('supervisors');
					$("#search_first_name").hide("fast", function() {
						
						$("#search_first_name").after('<input type="hidden" value="' + $("#search_first_name").val() + '" />').val("supervisors").prop("disabled", false);
					  $("#invitees_search").trigger('click'); 
						
					})
					$("#search_first_name").show("fast", function() {
						
						$("#search_first_name").after('<input type="hidden" value="' + $("#search_first_name").val() + '" />').val("").prop("disabled", false);
					  
						
					})
					

				}, 1500);
				
			}); 				
</script>
CUS;
//code written by pratin on 11122019 End (on page load auto click search button and set first name as supervisors)

//code written by pratin on 11122019 start (on page load auto click search button and set first name as supervisors)				
		echo $check_supervisor_availability = <<<CSA
            <script>
				function check_availabilty(username,row_id)
				{
					//var button_id = username;
					//alert(button_id);
					var hidden_start_date = $('#date_start').val();
					var hidden_end_date = $('#date_end').val();
					var start_date = $('#date_start_date').val();
					var hour = $('#date_start_hours').val();
					var minutes = $('#date_start_minutes').val();
					var meridiem = $('#date_start_meridiem').val();
					var finalstart_date = start_date+' '+hour+':'+minutes+':'+'00';
					
					var end_date = $('#date_end_date').val();
					var endhour = $('#date_end_hours').val();
					var endminutes = $('#date_end_minutes').val();
					var endmeridiem = $('#date_end_meridiem').val();
					var finalend_date = end_date+' '+endhour+':'+endminutes+':'+'00';
					
					console.log(finalstart_date);
					console.log(finalend_date);
					 $.ajax({

								url: 'customAjax.php',
								type: 'GET',
								asyn: false,
								data: {start_date:hidden_start_date,end_date:hidden_end_date,username:username},
									success: function (result) 
											{
												//alert(result);
												var resObj6 = jQuery.parseJSON(result);
												var check = resObj6.success;
												if(check=='1')
												{
													SugarWidgetSchedulerAttendees.form_add_attendee(row_id);
													alert('Supervisor is available');
													
													
												}else if(check=='0'){
													
													alert('Supervisor is not available');
													//SugarWidgetScheduleRow.deleteRow('579a7062-5831-3c2b-3381-5dd4c43acb8c');
													//preventDefault();
													//return false;
												}
												/* if(result.trim()!='')
												{
													var resObj6 = jQuery.parseJSON(result);
													var sqmboxid = resObj6.sqm_box_id;
													var quantity = resObj6.quantity;
													var ress = sqmboxid.split("_");
												} */
												//return true;
											}
						}); 
					
					return true;
				}
				
				$(document).ready(function()
				{
					var i=0;
					var j=1;
					setTimeout(function()
					{ 
						
					  
					  $("[id^='invitees_add']").each(function() {
						  var username = $('#invitees_add_'+j).parent().parent().children().eq(1).text();
						  var res = username.split("-");
						  var username1 = trim(res[1]);
						 // console.log(res[1]);
					     // console.log(username);
						 //var button_id = '#' + $(this).attr('id');
 $('#' + $(this).attr('id')).attr("onclick","this.disabled=true;check_availabilty('"+username1+"',"+i+");");
						i++;j++;
					 
					  });
					
				   }, 4000);		

				}); 	
						
</script>
CSA;
//code written by pratin on 11122019 End (on page load auto click search button and set first name as supervisors)

 		parent::display();
 	}
}
