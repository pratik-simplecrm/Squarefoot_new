<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
$db = DBManagerFactory::getInstance();
$updateQuoteCount = 0; 
//Fetch All product records which are deleted
$fetchQuoteID = "SELECT id FROM quote_quote WHERE deleted = 0 AND date_modified > '2014-09-01 00:00:00' ORDER BY id";
//~ $fetchQuoteID = "SELECT id FROM quote_quote WHERE deleted = 0 AND date_modified > '2013-08-01 00:00:00' AND date_modified < '2013-12-31 00:00:00' ORDER BY id";
$fetchQuoteIDResult = $db->query($fetchQuoteID);

while( $fetchQuoteIDRow = $db->fetchByAssoc($fetchQuoteIDResult) ){
	
	$quoteID = $fetchQuoteIDRow['id'];

	//Count total number of records for each quote fetched from previous query
	$countAllQuoteProduct = "SELECT count(*) as TotalRow FROM quote_quoteproducts WHERE quote_id = '".$quoteID."'";
	$countAllQuoteProductResult = $db->query($countAllQuoteProduct);
	$countAllQuoteProductRow = $db->fetchByAssoc($countAllQuoteProductResult);
	$TotalRowCount = $countAllQuoteProductRow['TotalRow'];


	//Count number of deleted records for each quote
	$countDeletedQuoteProduct = "SELECT count(*) as DeletedRow FROM quote_quoteproducts WHERE quote_id = '".$quoteID."' AND deleted = 1 ORDER BY quote_id";
	$countDeletedQuoteProductResult = $db->query($countDeletedQuoteProduct);
	$countDeletedQuoteProductRow = $db->fetchByAssoc($countDeletedQuoteProductResult);
	$DeletedRowCount = $countDeletedQuoteProductRow['DeletedRow'];


	//If total number and deleted records are same, it implies there will no line item display in Quote as all Line Items having deleted = 1
	if( $TotalRowCount == $DeletedRowCount && $TotalRowCount != 0 && $TotalRowCount != ''&& $TotalRowCount != NULL ){
		
		//fetch latest date_modified record
		$getLatestDateModified = "SELECT date_modified FROM quote_quoteproducts WHERE quote_id = '".$quoteID."' AND deleted = 1 GROUP BY date_modified ORDER BY date_modified desc LIMIT 0,1";
		$getLatestDateModifiedResult = $db->query($getLatestDateModified);
		$getLatestDateModifiedRow = $db->fetchByAssoc($getLatestDateModifiedResult);		
		$latestDateModified = $getLatestDateModifiedRow['date_modified'];
		
		//update latest date_modified record
		$updateProduct = "UPDATE quote_quoteproducts SET deleted = 0 WHERE date_modified ='".$latestDateModified."' AND quote_id = '".$quoteID."'";
		$updateProductResult = $db->query($updateProduct);
		$updateQuoteCount++;
		echo "<pre>";
		print_r("\n Quote ID: ".$quoteID);
		echo "</pre>";
	}
}

echo "Number of Quotes updated: ".$updateQuoteCount;
