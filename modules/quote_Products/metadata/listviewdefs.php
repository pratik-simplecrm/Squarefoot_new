<?php
$module_name = 'quote_Products';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'quote_product_category_quote_products',
    'label' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_FROM_QUOTE_PRODUCT_CATEGORY_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'PROD_MANUFACTURER_C' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'Manufacturer',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
);
?>
