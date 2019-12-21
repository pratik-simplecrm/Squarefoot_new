<?php
$popupMeta = array (
    'moduleMain' => 'quote_Products',
    'varName' => 'quote_Products',
    'orderBy' => 'quote_products.name',
    'whereClauses' => array (
  'name' => 'quote_products.name',
  'type_c' => 'quote_products_cstm.type_c',
  'tax_class_c' => 'quote_products_cstm.tax_class_c',
  'uom_c' => 'quote_products_cstm.uom_c',
  'vendor_part_number_c' => 'quote_products_cstm.vendor_part_number_c',
  'quote_product_category_quote_products_name' => 'quote_products.quote_product_category_quote_products_name',
  'is_dutyfree_c' => 'quote_products_cstm.is_dutyfree_c',
  'item_code_c' => 'quote_products_cstm.item_code_c',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'type_c',
  5 => 'tax_class_c',
  6 => 'uom_c',
  8 => 'vendor_part_number_c',
  9 => 'quote_product_category_quote_products_name',
  12 => 'is_dutyfree_c',
  13 => 'item_code_c',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'quote_product_category_quote_products_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_FROM_QUOTE_PRODUCT_CATEGORY_TITLE',
    'id' => 'QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTSQUOTE_PRODUCT_CATEGORY_IDA',
    'width' => '10%',
    'name' => 'quote_product_category_quote_products_name',
  ),
  'type_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'name' => 'type_c',
  ),
  'tax_class_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TAX_CLASS',
    'width' => '10%',
    'name' => 'tax_class_c',
  ),
  'uom_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_UOM',
    'width' => '10%',
    'name' => 'uom_c',
  ),
  'is_dutyfree_c' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_IS_DUTYFREE',
    'width' => '10%',
    'name' => 'is_dutyfree_c',
  ),
  'vendor_part_number_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VENDOR_PART_NUMBER',
    'width' => '10%',
    'name' => 'vendor_part_number_c',
  ),
  'item_code_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ITEM_CODE',
    'width' => '10%',
    'name' => 'item_code_c',
  ),
),
    'listviewdefs' => array (
  'ITEM_CODE_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_ITEM_CODE',
    'width' => '10%',
    'name' => 'item_code_c',
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'PROD_SPEC_C' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'Product Specifications',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'prod_spec_c',
  ),
  'TYPE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'name' => 'type_c',
  ),
  'QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'quote_product_category_quote_products',
    'label' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_FROM_QUOTE_PRODUCT_CATEGORY_TITLE',
    'width' => '10%',
    'default' => true,
    'name' => 'quote_product_category_quote_products_name',
  ),
  'AVAILABILITY_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_AVAILABILITY',
    'width' => '5%',
    'name' => 'availability_c',
  ),
  'UNIT_PRICE_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_UNIT_PRICE',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'unit_price_c',
  ),
  'HSN_CODE_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_HSN_CODE_C',
    'width' => '10%',
    'name' => 'hsn_code_c',
  ),
  'SAC_CODE_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_SAC_CODE',
    'width' => '10%',
    'name' => 'sac_code_c',
  ),
  'IS_DUTYFREE_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_IS_DUTYFREE',
    'width' => '10%',
  ),
  'GST_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_GST',
    'width' => '10%',
    'name' => 'gst_c',
  ),
),
);
