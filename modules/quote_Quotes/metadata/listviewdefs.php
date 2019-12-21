<?php
$module_name = 'quote_Quotes';
$OBJECT_NAME = 'QUOTE_QUOTES';
$listViewDefs [$module_name] = 
array (
  'SALES_QUOTE_NO' => 
  array (
    'type' => 'int',
    'label' => 'LBL_SALES_QUOTE_NO',
    'width' => '10%',
    'default' => true,
  ),
  'SERVICE_QUOTES_NO' => 
  array (
    'type' => 'int',
    'label' => 'LBL_SERVICE_QUOTES_NO',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_SUBJECT',
    'default' => true,
    'link' => true,
  ),
  'QUOTATION_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_QUOTATION_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'QUOTE_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_QUOTE_TYPE',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'QUOTATION_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_QUOTATION_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'QUOTE_QUOTES_ACCOUNTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'quote_quotes_accounts',
    'label' => 'LBL_QUOTE_QUOTES_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'QUOTE_QUOTES_LEADS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'quote_quotes_leads',
    'label' => 'LBL_QUOTE_QUOTES_LEADS_FROM_LEADS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_USER',
    'default' => true,
  ),
);
?>
