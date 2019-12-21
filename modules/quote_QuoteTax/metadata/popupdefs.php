<?php
$popupMeta = array (
    'moduleMain' => 'quote_QuoteTax',
    'varName' => 'quote_QuoteTax',
    'orderBy' => 'quote_quotetax.name',
    'whereClauses' => array (
  'name' => 'quote_quotetax.name',
  'tax_value' => 'quote_quotetax.tax_value',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'tax_value',
),
    'searchdefs' => array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'tax_value' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TAX_VALUE',
    'width' => '10%',
    'name' => 'tax_value',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'TAX_VALUE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TAX_VALUE',
    'width' => '10%',
    'default' => true,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => true,
  ),
),
);
