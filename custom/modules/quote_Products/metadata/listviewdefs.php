<?php
$module_name = 'quote_Products';
$listViewDefs [$module_name] = 
array (
  'ITEM_CODE_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_ITEM_CODE',
    'width' => '10%',
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'HSN_CODE_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_HSN_CODE_C',
    'width' => '10%',
  ),
  'SAC_CODE_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_SAC_CODE',
    'width' => '15%',
  ),
  'GST_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_GST',
    'width' => '10%',
  ),
  'PROD_SPEC_C' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'Product Specifications',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'TYPE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '5%',
  ),
  'QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'quote_product_category_quote_products',
    'label' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_FROM_QUOTE_PRODUCT_CATEGORY_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'AVAILABILITY_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_AVAILABILITY',
    'width' => '5%',
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'UNIT_PRICE_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_UNIT_PRICE',
    'currency_format' => true,
    'width' => '5%',
  ),
  'SQM_VALUE_C' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'label' => 'LBL_SQM_VALUE',
    'width' => '10%',
  ),
);
?>
