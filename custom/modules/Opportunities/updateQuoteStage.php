<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not a valid entry point');

class UpdateQuoteStage {

	/**
	 * Purpose: To update the quote stage on change of Opp sales stage
	 * Author: Hatim Alam
	 * Dated: 14th July 2014
	 */
	function updateQuoteFromOpp (&$bean, $event, $arguments) {
		//get the current sales stage of an opp
		$sales_stage = $bean->sales_stage;
		//If relationship is loaded
		if ($bean->load_relationship('quote_quote_opportunities')) {
			//Fetch related quotes 
			$relatedQuotes = $bean->quote_quote_opportunities->getBeans();
			if(!empty($relatedQuotes))
			foreach($relatedQuotes as $key=>$value) {
				$value->quotation_status = $bean->sales_stage;
				$value->save();
			}
		}
	}
}

?>
