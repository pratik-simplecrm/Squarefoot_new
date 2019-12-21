<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/* * *******************************************************************************
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
 * ****************************************************************************** */
class SF_Sales_ForecastViewEdit extends ViewEdit
{
 	public function __construct()
 	{
 		parent::ViewEdit();
 		$this->useForSubpanel = true;
 		$this->useModuleQuickCreateTemplate = true;
 		
 	}
 	function display()
 	{
		      $recordID = $this->bean->id;
		echo $javacript = <<<EOD
		<script>
		function checkStatus(){
				var assigned_user_id = $('#users_sf_sales_forecast_1users_ida').val();
				var year = $('#year').val();
				//var quarter = $('#quarter').val();
				var id = '$recordID';
				if(id == '')
				{
				$.ajax({
							url:'CheckUser.php', // root file 
										type: 'GET',
										async: false,
										data:
										{
											assigned_user_id:assigned_user_id, 
											year:year,
											//quarter:quarter,
										},
							success:function(result) {
							if(result > 0)
							{
								alert('You can\'t create more than one Sales Target record for the selected Sales User, Fiscal Year & Quarter');
								retTrue = 'False';
							}
							else
							{
								retTrue = 'True';
							}
					}
				});
				if(retTrue == 'True')
						{
							return true;
						}
						else if(retTrue == 'False')
						{
							return false;
						}
						else
						{
							return true;
						}
				}
			else
				{
					return true;
			}
		}
		$(document).ready(function(){
		$('#opportunities_won').attr('readonly',true);
		});
		</script>
EOD;
		parent::display();
	}
}
?>
