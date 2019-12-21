<?php

if(!defined('sugarEntry')) define('sugarEntry', true);

require_once('include/entryPoint.php');

class quote_QuoteController extends SugarController {
	
	function quote_QuoteController(){
		parent::SugarController();
	}
	
	function pre_editview() {
		
		global $db;
		unset($_REQUEST['return_module']);
		unset($_REQUEST['return_action']);
		unset($_REQUEST['return_id']);
		//~ echo "<pre>";
		//~ print_r($_REQUEST);
		//~ exit;
		
		if(empty($this->bean->id) && ($_REQUEST['parent_type'] != 'Accounts')){ 
			$queryParams = array(
				'module' => 'quote_Quote',
				'action' => 'index'
			);
			//SugarApplication::appendErrorMessage('<span style="color: red; display: block; width: 100%; font-size: 15px; text-align: left; margin: 15px;"> Access denied, You can\'t create quote directly. Please create it under customer sub panel. </span>');
			//SugarApplication::redirect('index.php?' . http_build_query($queryParams));
		} else if(($_REQUEST['parent_type'] == 'Accounts') && (!empty($_REQUEST['parent_id']))) {
			
			//Opportunity query
			$opp_query = "SELECT o.name, o.id, o.sales_stage
						FROM opportunities o
						JOIN accounts_opportunities ao ON o.id = ao.opportunity_id
						AND ao.deleted = 0
						AND ao.account_id = '".$_REQUEST['parent_id']."'
						WHERE o.deleted = 0";
						
			$opp_result = $db->query($opp_query);
			
			if($opp_result->num_rows == 1) {
				
				$opp_row = $db->fetchByAssoc($opp_result);
				$this->bean->quote_quote_opportunities_name = $opp_row['name'];
				$this->bean->quote_quote_opportunitiesopportunities_ida = $opp_row['id'];
				$this->bean->quotation_status = $opp_row['sales_stage'];
				
			}
			//End Oppotunity
			
			//Contact query
			$con_query = "SELECT ltrim(rtrim(concat(ifnull(o.first_name,''),' ',ifnull(o.last_name,'')))) as name, o.id
						FROM contacts o
						JOIN accounts_contacts ao ON o.id = ao.contact_id
						AND ao.deleted = 0
						AND ao.account_id = '".$_REQUEST['parent_id']."'
						WHERE o.deleted = 0";
						
			$con_result = $db->query($con_query);
			
			if($con_result->num_rows == 1) {
				$con_row = $db->fetchByAssoc($con_result);
				
				$this->bean->contact_name_c = $con_row['name'];
				$this->bean->contact_id_c = $con_row['id']; 
			}
			//End Contact
		}
		
		$this->view = "edit";
		return true;
	}
	
}
