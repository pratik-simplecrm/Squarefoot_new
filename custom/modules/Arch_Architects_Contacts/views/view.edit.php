<?php
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
 * Created on Apr 13, 2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

require_once('include/EditView/EditView2.php');
 class Arch_Architects_ContactsViewEdit extends SugarView{
 	var $ev;
 	var $type ='edit';
 	var $useForSubpanel = true;  //boolean variable to determine whether view can be used for subpanel creates
 	var $useModuleQuickCreateTemplate = false; //boolean variable to determine whether or not SubpanelQuickCreate has a separate display function
 	var $showTitle = true;

 	function Arch_Architects_ContactsViewEdit(){
 		parent::SugarView();
 	}

    /**
     * @see SugarView::preDisplay()
     */
    public function preDisplay()
    {
        $metadataFile = $this->getMetaDataFile();
        $this->ev = $this->getEditView();
        $this->ev->ss =& $this->ss;
        $this->ev->setup($this->module, $this->bean, $metadataFile, get_custom_file_if_exists('include/EditView/EditView.tpl'));
    }

 	function display(){
	
	//Code Written for if Any Architect will create the Subpanel of Arch_Architectural_Firm Module then Architect field will autopopulate based on parent ID
	
		$return_module = $_REQUEST['return_module'];//Arch_Architectural_Firm
	    $architect_firm_id = $_REQUEST['return_id'];
		//echo $architect_firm_id = $_REQUEST['parent_id'];

		 if (!empty($_REQUEST['return_id']) && $return_module=='Arch_Architectural_Firm') {
		require_once('modules/Arch_Architectural_Firm/Arch_Architectural_Firm.php');
		$Ar_firmObj = new Arch_Architectural_Firm();
		$Ar_value   = $Ar_firmObj->retrieve($architect_firm_id);

		$phone_no            = $Ar_value->phone_office;
		//~ $billing_street      = $Ar_value->billing_address_street;
		//~ $billing_street      = str_replace("\n","",$Ar_value->billing_address_street);
		//~ $billing_street      = str_replace("\r"," ",$billing_street);
		$billing_street      = preg_replace( "/\r|\n/", "",$Ar_value->billing_address_street);
		$billing_city        = $Ar_value->billing_address_city;
		$billing_state       = $Ar_value->billing_address_state;
		$billing_postalcode  = $Ar_value->billing_address_postalcode;
		$billing_country     = $Ar_value->billing_address_country;
		
		//~ $shipping_street     = $Ar_value->shipping_address_street;
		//~ $shipping_street     = str_replace("\n","",$Ar_value->shipping_address_street);
		//~ $shipping_street     = str_replace("\r"," ",$shipping_street);
		$shipping_street     = preg_replace( "/\r|\n/", "", $Ar_value->shipping_address_street );
		$shipping_city       = $Ar_value->shipping_address_city;
		$shipping_state      = $Ar_value->shipping_address_state;
		$shipping_postalcode = $Ar_value->shipping_address_postalcode;
		$shipping_country    = $Ar_value->shipping_address_country;

		$auto_populate=<<<EOF
<script>

  var street = '$billing_street';
  var phone = '$phone_no';
  var city  = '$billing_city';
  var state = '$billing_state';
  var pincode = '$billing_postalcode';
  var country = '$billing_country';
  var alt_street = '$shipping_street';
  var alt_city   = '$shipping_city';
  var alt_state  = '$shipping_state';
  var alt_pincode = '$shipping_postalcode';
  var alt_country = '$shipping_country';

  $('#primary_address_street').val(street);
  $('#phone_work').val(phone);
  $('#primary_address_city').val(city);
  $('#primary_address_state').val(state);
  $('#primary_address_postalcode').val(pincode);
  $('#primary_address_country').val(country);
  
  $('#alt_address_street').val(alt_street);
	$('#alt_address_city').val(alt_city);
	$('#alt_address_state').val(alt_state);
	$('#alt_address_postalcode').val(alt_pincode);
	$('#alt_address_country').val(alt_country);
  
</script>
EOF;
   }
		
		
 
 	//END	
		$this->ev->process();
		echo $this->ev->display($this->showTitle);
		echo $auto_populate;
 	}

    /**
     * Get EditView object
     * @return EditView
     */
    protected function getEditView()
    {
        return new EditView();
    }
}

