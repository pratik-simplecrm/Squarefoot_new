<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 
 * SimpleCRM standard edition is an extension to SuiteCRM 7.8.5 and SugarCRM Community Edition 6.5.24. 
 * It is developed by SimpleCRM (https://www.simplecrm.com.sg)
 * Copyright (C) 2016 - 2017 SimpleCRM
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

 /**
 * 
 * 
 * @package 
 * @copyright SalesAgility Ltd http://www.salesagility.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Salesagility Ltd <support@salesagility.com>
 */
require_once('include/MVC/View/views/view.edit.php');
require_once('include/SugarTinyMCE.php');

class CasesViewEdit extends ViewEdit {

    function CasesViewEdit(){
        parent::ViewEdit();
    }

    function display(){
        parent::display();
        global $sugar_config;
        $new = empty($this->bean->id);
        if($new){
            ?>
            <script>
                $(document).ready(function(){
                    $('#update_text').closest('td').html('');
                    $('#update_text_label').closest('td').html('');
                    $('#internal').closest('td').html('');
                    $('#internal_label').closest('td').html('');
                    $('#addFileButton').closest('td').html('');
                    $('#case_update_form_label').closest('td').html('');
                });
            </script>
        <?php
        }
        $tiny = new SugarTinyMCE();
        echo $tiny->getInstance('update_text,description', 'email_compose_light');

echo $javscript =<<<EOD
		<script>
		$(document).ready(function(){
		var state = $('#state').val();
		if(state =='Closed')
		{
					addToValidate('EditView','resolution','resolution',true,'resolution');
					 $('#resolution_label').html('Resolution: <font color="red">*</font>');
		}
		else
			{
					removeFromValidate('EditView','resolution'); // else remove the validtion applied
						 $('#resolution_label').html('Resolution: ');
			}
		$('#state').change(function(){
		var state = $('#state').val();
		if(state =='Closed')
		{
					addToValidate('EditView','resolution','resolution',true,'resolution');
					 $('#resolution_label').html('Resolution: <font color="red">*</font>');
		}
		else
			{
					removeFromValidate('EditView','resolution'); // else remove the validtion applied
						 $('#resolution_label').html('Resolution: ');
			}
		
		});
		
		});
		</script>
EOD;

    }

}
