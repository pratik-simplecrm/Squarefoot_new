<?php 

// Add to existing dropdown lists without replacing existing entries
// Note that this will generate a php notice (NOT an error)
// For having accessed an "undefined index"
// The Notice can be ignored; all works as expected

$temp_dom_list = array();
$temp_dom_list = $GLOBALS['app_list_strings'];

$temp_account_type_list = array();
$temp_account_type_list = $temp_dom_list['account_type_dom'];
$temp_account_type_list['FacilitatorCo'] = 'Facilitator Co';
$temp_account_type_list['Venue'] = 'Venue';
$temp_account_type_list['Caterer'] = 'Caterer';
$app_list_strings['account_type_dom'] = $temp_account_type_list;

$temp_document_category_list = array();
$temp_document_category_list = $temp_dom_list['document_category_dom'];
$temp_document_category_list['CatererMenu'] = 'Menu';
$app_list_strings['document_category_dom'] = $temp_document_category_list;

// End of entry to add to existing dropdown lists

?>