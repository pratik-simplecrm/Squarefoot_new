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

/*********************************************************************************

 * Description: This file is used to override the default Meta-data DetailView behavior
 * to provide customization specific to the Campaigns module.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/


require_once('include/MVC/View/views/view.detail.php');

class OpportunitiesViewDetail extends ViewDetail {

 	function OpportunitiesViewDetail(){
 		parent::ViewDetail();
 	}
 	
 	function display() {
	    
	    $currency = new Currency();
	    if(isset($this->bean->currency_id) && !empty($this->bean->currency_id))
	    {
	    	$currency->retrieve($this->bean->currency_id);
	    	if( $currency->deleted != 1){
	    		$this->ss->assign('CURRENCY', $currency->iso4217 .' '.$currency->symbol);
	    	}else {
	    	    $this->ss->assign('CURRENCY', $currency->getDefaultISO4217() .' '.$currency->getDefaultCurrencySymbol());	
	    	}
	    }else{
	    	$this->ss->assign('CURRENCY', $currency->getDefaultISO4217() .' '.$currency->getDefaultCurrencySymbol());
	    }
	   	

		global $db;		
		global $current_user;
		
		$assigned_user = $this->bean->assigned_user_id;
		
		$logged_user_id = $current_user->id; 
		$is_admin = $current_user->is_admin;		
		require_once('modules/Users/User.php');
		
		$User_role = array();
		$query = "SELECT * 
				FROM acl_roles t1
				
				INNER JOIN acl_roles_users t2
				ON(t1.id = t2.role_id)
				
				WHERE t2.user_id = '$logged_user_id'
				AND t1.deleted =0
				And t2.deleted =0";
		
		$res = $db->query($query);			
		while($row = $db->fetchByAssoc($res)){
		
			$User_role[] = $row['name'];
		}
		
		$sales_stage=$this->bean->sales_stage;
		
		if(in_array('Sales Administrator',$User_role) && ($sales_stage =='Closed Lost')){
		$User_role ='Sales Administrator';
		$CheckUser = <<<RES
				<script>
					var user_role = '$User_role';
					$(document).ready(function() {		
						if (user_role != 'Sales Administrator'){						
							$('#edit_button').hide();						
						}
						else{
							$('#edit_button').show();					
						}
						
					});
				</script>
RES;

		}
		//For hiding show button for other than admin according to Sales stages :Anurag Tiwari
		echo $hide = <<<RES
				<script>
					$(document).ready(function() {	
						var sales_stage ='$sales_stage';
						var isadmin = '$is_admin';
						if(((sales_stage =='Closed Won') || (sales_stage =='Closed Lost')) && (isadmin != '1'))	{						
							$('#edit_button').hide();						
						}
						else{
							$('#edit_button').show();					
						}
						
					});
				</script>
RES;
		echo $hide = <<<hide
		<script>
		$(document).ready(function(){
			
			//Hidding the quote subpanel
			$('#whole_subpanel_opportunity_aos_quotes').hide();
			var sales_stage = '$sales_stage';
			if(sales_stage=='Closed Won')
			{
				$('#installation_btn').hide();  //code commented as per chaintanya suggestion on 19122019
			}
			else
			{
				//$('#installation_btn').hide();  //code commented as per chaintanya suggestion on 19122019
			}
			
			
		});
		</script>
hide;
//written by pratik on 16072019
echo $replace_link = <<<AKL
<script>
$(document).ready(function(){
	 $('a[href^="index.php?entryPoint=download"]').each(function(){ 
	
	var oldUrl = $(this).attr("href"); // Get current url
	var newUrl = oldUrl.replace("download", "download1"); // Create new url
    $(this).attr("href", newUrl); // Set herf value
	//$(".tabDetailViewDFLink").attr("href",link);
	//var link = 'index.php?entryPoint=download1&id='+opp_id1+'&type=Opportunities';
	//console.log(oldUrl);
	//var opp_id1 = '$opp_id';
	 });
});
</script>
AKL;
 		parent::display();
		echo $CheckUser;
	
		
 	}
	 

}
?>
