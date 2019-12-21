<?php

/**
 * Purpose: Display Quotes related modules on admin page
 * Author: Hatim Alam
 * Dated: 07-07-2014
 */
    
$admin_option_defs=array();
$admin_option_defs['Administration']['quotes_mgmt1']= array('Products','Products','Enter items in the product catalog','./index.php?action=ListView&module=quote_Products');
$admin_option_defs['Administration']['quotes_mgmt2']= array('ProductCategories','Product Categories','Update the list of product categories','./index.php?action=ListView&module=quote_Product_Category');
$admin_option_defs['Administration']['quotes_mgmt3']= array('icon_AdminPDF','Quotes PDF','Manage quote PDFs','./index.php?action=ListView&module=pdf_Quote_PDF');
$admin_option_defs['Administration']['quotes_mgmt4']= array('TaxRates','Tax','Configure the list of available tax rates for quotes','./index.php?action=ListView&module=quote_QuoteTax');

$admin_group_header[]= array('LBL_PROD_AND_QUOTES','',false,$admin_option_defs, 'LBL_PRODQUOTE_ADMIN_PANEL_DESC');

?>

