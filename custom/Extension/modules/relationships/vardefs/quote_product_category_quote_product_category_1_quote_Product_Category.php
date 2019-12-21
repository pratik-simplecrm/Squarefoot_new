<?php
// created: 2014-04-09 09:33:05
$dictionary["quote_Product_Category"]["fields"]["quote_product_category_quote_product_category_1"] = array (
  'name' => 'quote_product_category_quote_product_category_1',
  'type' => 'link',
  'relationship' => 'quote_product_category_quote_product_category_1',
  'source' => 'non-db',
  'module' => 'quote_Product_Category',
  'bean_name' => 'quote_Product_Category',
  'vname' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCT_CATEGORY_1_FROM_QUOTE_PRODUCT_CATEGORY_L_TITLE',
  'id_name' => 'quote_proddff0ategory_ida',
);
$dictionary["quote_Product_Category"]["fields"]["quote_product_category_quote_product_category_1_name"] = array (
  'name' => 'quote_product_category_quote_product_category_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCT_CATEGORY_1_FROM_QUOTE_PRODUCT_CATEGORY_L_TITLE',
  'save' => true,
  'id_name' => 'quote_proddff0ategory_ida',
  'link' => 'quote_product_category_quote_product_category_1',
  'table' => 'quote_product_category',
  'module' => 'quote_Product_Category',
  'rname' => 'name',
);
$dictionary["quote_Product_Category"]["fields"]["quote_proddff0ategory_ida"] = array (
  'name' => 'quote_proddff0ategory_ida',
  'type' => 'link',
  'relationship' => 'quote_product_category_quote_product_category_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCT_CATEGORY_1_FROM_QUOTE_PRODUCT_CATEGORY_R_TITLE',
);
