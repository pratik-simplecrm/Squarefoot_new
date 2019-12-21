<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
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

/**
* Author 		: Amit Sabal
* Created Date  : 25 Aug 2013
* Motive 		: To create Dependent DropDown  
* Organization  : Bhea Knowledge Technologies (P) Ltd.
*/

require_once('include/entryPoint.php');
require_once('include/nusoap/nusoap.php'); 
require_once('include/database/DBManager.php');
require_once('modules/Opportunities/Opportunity.php');


global $db;
global $app_list_strings;
global $sugar_config,$beanFiles,$beanList;


 $Opp_id  = $_REQUEST['Opp_id'];
 $Cust_id = $_REQUEST['Cust_id'];

$obj_opp = new Opportunity();
$as =$obj_opp->retrieve($Opp_id);

$qry ="SELECT * FROM accounts_opportunities WHERE opportunity_id ='".$Opp_id."'	AND deleted =0 ";
$res =$db->query($qry);

$rec = $db->fetchByAssoc($res);

$ac_id =$rec['account_id'];
if($ac_id ==  $Cust_id){

	echo 'Success';
}
else{
	echo 'No match';
}

 //echo $ac_id.'/'.$Cust_id;
?>