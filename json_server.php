<?php if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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


require_once('soap/SoapHelperFunctions.php');
$GLOBALS['log']->debug("JSON_SERVER:");
$global_registry_var_name = 'GLOBAL_REGISTRY';

///////////////////////////////////////////////////////////////////////////////
////	SUPPORTED METHODS
/*
 * ADD NEW METHODS TO THIS ARRAY:
 * then create a function called "function json_$method($request_id, &$params)"
 * where $method is the method name
 */
$SUPPORTED_METHODS = array(
	'retrieve',
	'query',
);

/**
 * Generic retrieve for getting data from a sugarbean
 */
function json_retrieve($request_id, $params) {
	global $current_user;
	global $beanFiles,$beanList;
    $json = getJSONobj();

	$record = $params[0]['record'];

	require_once($beanFiles[$beanList[$params[0]['module']]]);
	$focus = new $beanList[$params[0]['module']];
	$focus->retrieve($record);

	// to get a simplified version of the sugarbean
	$module_arr = populateBean($focus);

	$response = array();
	$response['id'] = $request_id;
	$response['result'] = array("status"=>"success","record"=>$module_arr);
	$json_response = $json->encode($response, true);
	print $json_response;
}

function json_query($request_id, $params) {
	
	//print_r($_REQUEST);
	global $db,$response, $sugar_config,$current_user;
	global $beanFiles, $beanList;
	$json = getJSONobj();
    //print_r($params);
	//exit;
	if($sugar_config['list_max_entries_per_page'] < 31)	// override query limits
		$sugar_config['list_max_entries_per_page'] = 31;

	$args = $params[0];
	
	//code written by pratik to fetch supervisors list based on login user branch on 11122019 start:
	if(!empty($args))
	{
		$modules = $args['modules'];
		$search_key = $args['conditions'][0]['name'];
		$search_value= $args['conditions'][0]['value'];
		if($modules[0]=='Users' && $modules[1] == 'Contacts' && $modules[2]=='Leads')
		{
			if(isset($search_key) && strtolower($search_value) == 'supervisors')
			{
				 $i=0;$email_Add='';$list_arr = array();
				 $login_user_id = $current_user->id;
				 $get_loginuserbranch = "SELECT `branch_c` FROM `users_cstm` as A inner join `users` as B on A.id_c = B.id WHERE `id_c` = 
				 '$login_user_id'";
				 $branchname = $db->query($get_loginuserbranch);
				 $row11 = $db->fetchByAssoc($branchname);
				 $branch_name = trim($row11['branch_c']);
				 $get_role_id = "SELECT * FROM `acl_roles` WHERE LOWER(`name`)='supervisor' and `deleted`=0";
				 $roleid = $db->query($get_role_id);
				 while($role = $db->fetchByAssoc($roleid))
				 {
					 
						 $role_id = trim($role['id']);
						 $supervisor_name ='';
						 $get_user_id = "SELECT `user_id` FROM `acl_roles_users` as A inner join `users` as B on A.user_id=B.id inner join `users_cstm` as C on B.id=C.id_C  WHERE `role_id`='$role_id' and A.`deleted`=0 and C.branch_c='$branch_name' and B.deleted=0 and B.status='Active'";
						 
						 //****************LOG Creation*********************
								$APILogFile = 'get_supervisors_list_inMeetings.txt';
								$handle = fopen($APILogFile, 'a');
								$timestamp = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes', strtotime('now')));
								//date('Y-m-d H:i:s');
								$logArray = array('branch_name'=>$branch_name,'request_id'=>$request_id,'query'=>$get_user_id,'query1'=>$get_loginuserbranch,'login_user_id'=>$login_user_id);
								$logArray2 = print_r($logArray, true);
								$logMessage1 = "\nget_supervisors_list_inMeetings Result at $timestamp :-\n$logArray2";		
								fwrite($handle, $logMessage1);										
								
					//****************ENd OF Code*****************
						 
						 $userid = $db->query($get_user_id);
						 while($user = $db->fetchByAssoc($userid))
						 {
							$user_id = trim($user['user_id']);  // user under supervisors role
						 
							 if($user_id!='' && $branch_name!='')
							 {
								 $get_userfullname = "SELECT `first_name`,`last_name`,`phone_work`,`user_name` FROM `users` as A inner join `users_cstm` as B on A.id = B.id_c WHERE `id` ='$user_id' and `deleted` = 0 and `branch_c` = 
								 '$branch_name'";
								 $usernm = $db->query($get_userfullname);
								 $username = $db->fetchByAssoc($usernm);
								 if($username['first_name']=='')
								 {
									 $supervisor_name = $username['last_name'];
								 }else if($username['last_name']==''){
									 $supervisor_name = $username['first_name'];
								 }else{
									  $supervisor_name = $username['first_name']." ".$username['last_name'];
								 }
								 $supervisor_name .=" - ".$username['user_name'];
								 $get_user_email_address = "SELECT `email_address_id` FROM `email_addr_bean_rel` WHERE `bean_id`='$user_id' and `deleted`=0";
								 $res = $db->query($get_user_email_address);
								 $row = $db->fetchByAssoc($res);
								 $emailaddress_id = $row['email_address_id'];
								 if($emailaddress_id!='')
								 {
									 $get_user_email_addressid = "SELECT `email_address` FROM `email_addresses` WHERE `id`='$emailaddress_id' and `deleted`=0";
									 $res1 = $db->query($get_user_email_addressid);
									 $row1 = $db->fetchByAssoc($res1);
									 $email_Add = $row1['email_address'];
								 }
								
								 $list_arr[$i]['module'] = 'User';
								 $list_arr[$i]['fields']['id'] = $user_id;
								 $list_arr[$i]['fields']['full_name'] = (is_null($supervisor_name)?'Not Available':$supervisor_name);
								 $list_arr[$i]['fields']['email1'] = (is_null($email_Add)?'Not Available':$email_Add);
								 $list_arr[$i]['fields']['phone_work'] = (is_null($username['phone_work'])?'Not Available':$username['phone_work']);
			
								$i++;	 
							 }
						 }
						 
						 
						 
				 }
				 
				 $response['id'] = $request_id;
				 $response['result'] = array("list"=>$list_arr);
				 $json_response = $json->encode($response, true);
				 echo $json_response;
				 exit;
			}
		}
		
	}
	//code written by pratik to fetch supervisors list based on login user branch on 11122019 End:

	//decode condition parameter values..
	if(is_array($args['conditions'])) {
		foreach($args['conditions'] as $key=>$condition)	{
			if(!empty($condition['value'])) {
				$where = $json->decode(utf8_encode($condition['value']));
				// cn: bug 12693 - API change due to CSRF security changes.
				$where = empty($where) ? $condition['value'] : $where;
				$args['conditions'][$key]['value'] = $where;
			}
		}
	}

	$list_return = array();

	if(! empty($args['module'])) {
		$args['modules'] = array($args['module']);
	}

	foreach($args['modules'] as $module) {
		require_once($beanFiles[$beanList[$module]]);
		$focus = new $beanList[$module];

		$query_orderby = '';
		if(!empty($args['order'])) {
			$query_orderby = preg_replace('/[^\w_.-]+/i', '', $args['order']['by']);
			if(!empty($args['order']['desc'])) {
			    $query_orderby .= " DESC";
			} else {
			    $query_orderby .= " ASC";
			}
		}

		$query_limit = '';
		if(!empty($args['limit'])) {
			$query_limit = (int)$args['limit'];
		}
		$query_where = construct_where($args, $focus->table_name,$module);
		$list_arr = array();
		if($focus->ACLAccess('ListView', true)) {
			$focus->ungreedy_count=false;
			$curlist = $focus->get_list($query_orderby, $query_where, 0, $query_limit, -1, 0);
			$list_return = array_merge($list_return,$curlist['list']);
		}
	}

	$app_list_strings = null;

	for($i = 0;$i < count($list_return);$i++) {
		if(isset($list_return[$i]->emailAddress) && is_object($list_return[$i]->emailAddress)) {
			$list_return[$i]->emailAddress->handleLegacyRetrieve($list_return[$i]);
		}

		$list_arr[$i]= array();
		$list_arr[$i]['fields']= array();
		$list_arr[$i]['module']= $list_return[$i]->object_name;

		foreach($args['field_list'] as $field) {
		    if(!empty($list_return[$i]->field_name_map[$field]['sensitive'])) {
		        continue;
		    }
			// handle enums
			if(	(isset($list_return[$i]->field_name_map[$field]['type']) && $list_return[$i]->field_name_map[$field]['type'] == 'enum') ||
				(isset($list_return[$i]->field_name_map[$field]['custom_type']) && $list_return[$i]->field_name_map[$field]['custom_type'] == 'enum')) {

				// get fields to match enum vals
				if(empty($app_list_strings)) {
					if(isset($_SESSION['authenticated_user_language']) && $_SESSION['authenticated_user_language'] != '') $current_language = $_SESSION['authenticated_user_language'];
					else $current_language = $sugar_config['default_language'];
					$app_list_strings = return_app_list_strings_language($current_language);
				}

				// match enum vals to text vals in language pack for return
				if(!empty($app_list_strings[$list_return[$i]->field_name_map[$field]['options']])) {
					$list_return[$i]->$field = $app_list_strings[$list_return[$i]->field_name_map[$field]['options']][$list_return[$i]->$field];
				}
			}

			$list_arr[$i]['fields'][$field] = $list_return[$i]->$field;
		}
	}


	$response['id'] = $request_id;
	$response['result'] = array("list"=>$list_arr);
    $json_response = $json->encode($response, true);
	echo $json_response;
}

////	END SUPPORTED METHODS
///////////////////////////////////////////////////////////////////////////////

// ONLY USED FOR MEETINGS
// HAS MEETING SPECIFIC CODE:
function populateBean(&$focus) {
	$all_fields = $focus->column_fields;
	// MEETING SPECIFIC
	$all_fields = array_merge($all_fields,array('required','accept_status','name')); // need name field for contacts and users
	//$all_fields = array_merge($focus->column_fields,$focus->additional_column_fields);

	$module_arr = array();

	$module_arr['module'] = $focus->object_name;

	$module_arr['fields'] = array();

	foreach($all_fields as $field)
	{
		if(isset($focus->$field) && !is_object($focus->$field))
		{
			$focus->$field =	from_html($focus->$field);
			$focus->$field =	preg_replace("/\r\n/","<BR>",$focus->$field);
			$focus->$field =	preg_replace("/\n/","<BR>",$focus->$field);
			$module_arr['fields'][$field] = $focus->$field;
		}
	}
	$GLOBALS['log']->debug("JSON_SERVER:populate bean:");
	return $module_arr;
}

///////////////////////////////////////////////////////////////////////////////
////	UTILS
function authenticate() {
	global $sugar_config;

	$user_unique_key =(isset($_SESSION['unique_key'])) ? $_SESSION['unique_key'] : "";
	$server_unique_key =(isset($sugar_config['unique_key'])) ? $sugar_config['unique_key'] : "";

	if($user_unique_key != $server_unique_key) {
		$GLOBALS['log']->debug("JSON_SERVER: user_unique_key:".$user_unique_key."!=".$server_unique_key);
		session_destroy();
		return null;
	}

	if(!isset($_SESSION['authenticated_user_id'])) {
		$GLOBALS['log']->debug("JSON_SERVER: authenticated_user_id NOT SET. DESTROY");
		session_destroy();
		return null;
	}

	$current_user = new User();

	$result = $current_user->retrieve($_SESSION['authenticated_user_id']);
	$GLOBALS['log']->debug("JSON_SERVER: retrieved user from SESSION");


	if($result == null) {
		$GLOBALS['log']->debug("JSON_SERVER: could get a user from SESSION. DESTROY");
		session_destroy();
		return null;
	}

	return $result;
}

function construct_where(&$query_obj, $table='',$module=null)
{
	if(! empty($table)) {
		$table .= ".";
	}
	$cond_arr = array();

	if(! is_array($query_obj['conditions'])) {
		$query_obj['conditions'] = array();
	}

	foreach($query_obj['conditions'] as $condition) {
        if($condition['name'] == 'user_hash') {
            continue;
        }
		if ($condition['name']=='email1' or $condition['name']=='email2') {

			$email1_value=strtoupper($condition['value']);
			$email1_condition = " {$table}id in ( SELECT  er.bean_id AS id FROM email_addr_bean_rel er, " .
		         "email_addresses ea WHERE ea.id = er.email_address_id " .
		         "AND ea.deleted = 0 AND er.deleted = 0 AND er.bean_module = '{$module}' AND email_address_caps LIKE '%{$email1_value}%' )";

	         array_push($cond_arr,$email1_condition);
		}
		else {
			if($condition['op'] == 'contains') {
				$cond_arr[] = $table.$GLOBALS['db']->getValidDBName($condition['name'])." like '%".$GLOBALS['db']->quote($condition['value'])."%'";
			}
			if($condition['op'] == 'like_custom') {
				$like = '';
				if(!empty($condition['begin'])) $like .= $GLOBALS['db']->quote($condition['begin']);
				$like .= $GLOBALS['db']->quote($condition['value']);
				if(!empty($condition['end'])) $like .= $GLOBALS['db']->quote($condition['end']);
				$cond_arr[] = $table.$GLOBALS['db']->getValidDBName($condition['name'])." like '$like'";
			} else { // starts_with
				$cond_arr[] = $table.$GLOBALS['db']->getValidDBName($condition['name'])." like '".$GLOBALS['db']->quote($condition['value'])."%'";
			}
		}
	}

	if($table == 'users.') {
		$cond_arr[] = $table."status='Active'";
	}
	$group = strtolower(trim($query_obj['group']));
	if($group != "and" && $group != "or") {
	    $group = "and";
	}

	return implode(" $group ",$cond_arr);
}

////	END UTILS
///////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////
////	JSON SERVER HANDLER LOGIC
//ignore notices
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
ob_start();
insert_charset_header();
global $sugar_config;
if(!empty($sugar_config['session_dir'])) {
	session_save_path($sugar_config['session_dir']);
	$GLOBALS['log']->debug("JSON_SERVER:session_save_path:".$sugar_config['session_dir']);
}

session_start();
$GLOBALS['log']->debug("JSON_SERVER:session started");

$current_language = 'en_us'; // defaulting - will be set by user, then sys prefs

// create json parser
$json = getJSONobj();

// if the language is not set yet, then set it to the default language.
if(isset($_SESSION['authenticated_user_language']) && $_SESSION['authenticated_user_language'] != '') {
	$current_language = $_SESSION['authenticated_user_language'];
} else {
	$current_language = $sugar_config['default_language'];
}

$locale = new Localization();

$GLOBALS['log']->debug("JSON_SERVER: current_language:".$current_language);

// if this is a get, than this is spitting out static javascript as if it was a file
// wp: DO NOT USE THIS. Include the javascript inline using include/json_config.php
// using <script src=json_server.php></script> does not cache properly on some browsers
// resulting in 2 or more server hits per page load. Very bad for SSL.
if(strtolower($_SERVER['REQUEST_METHOD'])== 'get') {
	echo "alert('DEPRECATED API\nPlease report as a bug.');";
} else {
	// else act as a JSON-RPC server for SugarCRM
	// create result array
	$response = array();
	$response['result'] = null;
	$response['id'] = "-1";

	// authenticate user
	$current_user = authenticate();

	if(empty($current_user)) {
		$response['error'] = array("error_msg"=>"not logged in");
		print $json->encode($response, true);
		print "not logged in";
	}

	// extract request
	if(isset($GLOBALS['HTTP_RAW_POST_DATA']))
		$request = $json->decode($GLOBALS['HTTP_RAW_POST_DATA'], true);
	else
		$request = $json->decode(file_get_contents("php://input"), true);


	if(!is_array($request)) {
		$response['error'] = array("error_msg"=>"malformed request");
		print $json->encode($response, true);
	}

	// make sure required RPC fields are set
	if(empty($request['method']) || empty($request['id'])) {
		$response['error'] = array("error_msg"=>"missing parameters");
		print $json->encode($response, true);
	}

	$response['id'] = $request['id'];

	if(in_array($request['method'], $SUPPORTED_METHODS)) {
		call_user_func('json_'.$request['method'],$request['id'],$request['params']);
	} else {
		$response['error'] = array("error_msg"=>"method:".$request["method"]." not supported");
		print $json->encode($response, true);
	}
}

ob_end_flush();
sugar_cleanup();
exit();
