<?php
// created: 2014-06-27 10:03:50
$dictionary["quote_Products"]["fields"]["quote_product_category_quote_products"] = array (
  'name' => 'quote_product_category_quote_products',
  'type' => 'link',
  'relationship' => 'quote_product_category_quote_products',
  'source' => 'non-db',
  'module' => 'quote_Product_Category',
  'bean_name' => false,
  'vname' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_FROM_QUOTE_PRODUCT_CATEGORY_TITLE',
  'id_name' => 'quote_product_category_quote_productsquote_product_category_ida',
);
$dictionary["quote_Products"]["fields"]["quote_product_category_quote_products_name"] = array (
  'name' => 'quote_product_category_quote_products_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_FROM_QUOTE_PRODUCT_CATEGORY_TITLE',
  'save' => true,
  'id_name' => 'quote_product_category_quote_productsquote_product_category_ida',
  'link' => 'quote_product_category_quote_products',
  'table' => 'quote_product_category',
  'module' => 'quote_Product_Category',
  'rname' => 'name',
);
$dictionary["quote_Products"]["fields"]["quote_product_category_quote_productsquote_product_category_ida"] = array (
  'name' => 'quote_product_category_quote_productsquote_product_category_ida',
  'type' => 'link',
  'relationship' => 'quote_product_category_quote_products',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_FROM_QUOTE_PRODUCTS_TITLE',
);
