<?php
/*
 * Author  : Amit Sabal
 * Date    : 11 Aug 2014
 * Purpose : Changing List View query for displaying based on the Outcome by month chart filter while clicking on the chart
 */

if(!defined('sugarEntry')) define('sugarEntry', true);
class Opportunities_InListView extends Opportunity{

	function create_new_list_query($order_by,$where,$filter=array(),$params,$show_deleted = 0, $join_type='', $return_array=false,$parentbean,$singleSelect = false){
		
		$ret_array = parent::create_new_list_query($order_by,$where,$filter,$params,$show_deleted,$join_type,$return_array,$parentbean,$singleSelect);	
		
		/*
		*Taking Where condition from main_query (/include/ListView/ListViewData.php) in $custom_where 
		*/
		
		// Fetching the team list based on the logged in user id
		global $db,$current_user,$sugar_config;
		
		require_once('include/TimeDate.php');
		$dateFormat = $current_user->getPreference('datef');
				
		$logged_user = $current_user->id;
		
		$team_user_list = array();
		
		// To get the team list of the logged in user
		$user_team  = "SELECT team_id FROM team_memberships WHERE user_id = '$logged_user' AND deleted =0 ";
		$user_res 	= $db->query($user_team);
		while($user_row = $db->fetchByAssoc($user_res)){
		
			$team_user_list[] = $user_row['team_id'];					
		}
		
		$date_closed = $_REQUEST['date_closed_advanced'];
		$date_closed = date('Y-m', strtotime($date_closed));
		//$date_closed = date($dateFormat, strtotime($date_closed));	// converting the date formate to YYYY-MM-DD
		$stage       = $_REQUEST['sales_stage'];
		
		
		$custom_where = $ret_array['where'];
		
		/**
		* Adding custom query to where clause based on the chart filter and replacing
		*/
					
		if (!empty($_REQUEST['date_closed_advanced'] )&& !empty($_REQUEST['sales_stage'])) {
		
			//~ $custom_where = str_replace("Opportunities"," where ((opportunities.sales_stage = '$stage' ) AND ( DATE_FORMAT(opportunities.date_closed,'%Y-%m') = '$date_closed')) AND opportunities.team_id IN ('" . implode("','",$team_user_list) . "')  AND opportunities.deleted=0 " , "Opportunities", $custom_where);
			$custom_where = str_replace("Opportunities"," where ((opportunities.sales_stage = '$stage' ) AND ( DATE_FORMAT(opportunities.date_closed,'%Y-%m') = '$date_closed')) AND opportunities.deleted=0 " , "Opportunities", $custom_where);

			$ret_array['where'] = $custom_where; 	 
		}		
	
		return $ret_array; 
	}
}
