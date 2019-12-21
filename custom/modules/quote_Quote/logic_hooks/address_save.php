<?php
/**
 *  Author: Bhea Knowledge Technologies 
 *  Created By: Hatim Alam
 *  Dated: 16092013
 *  Description: to save the quote line items on new record generation or old record updation.
*/

if(!defined('sugarEntry')) die('Not a valid Entry Point');
require_once('include/utils.php');

class AddressSave {
	
	function address_after_save(&$bean=null, $event=null, $arguments=null) {
		
		//define global objects
		global $db;
		$quoteID = $bean->id;
		//echo 'add '. $add= $bean->billing_address_street;
		//echo 'add 2'. $add= $bean->billing_address_c;exit;
		require_once('modules/quote_Quote/quote_Quote.php');
		
		$objAddress = new quote_Quote();
		
		$objAddress->id_c = $bean->id;
		$objAddress->billing_address_c= $bean->billing_address_street;
		$objAddress->billing_address_city_c= $bean->billing_address_city;
		$objAddress->billing_address_state_c= $bean->billing_address_state;
		$objAddress->billing_address_country_c=$bean->billing_address_country;
		$objAddress->billing_address_postalcode_c=$bean->billing_address_postalcode;
		
		$objAddress->shipping_address_c= $bean->down_payment_c;
		$objAddress->shipping_address_city_c= $bean->down_payment_c;
		$objAddress->shipping_address_state_c= $bean->down_payment_c;
		$objAddress->shipping_address_country_c=$bean->instrument_amount_c;
		$objAddress->shipping_address_postalcode_c='Down Payment';
		
		//$objAddress->save(true);
		
	}		
}