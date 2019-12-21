<?php
// created: 2014-04-09 09:33:05
$dictionary["quote_product_category_quote_product_category_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'quote_product_category_quote_product_category_1' => 
    array (
      'lhs_module' => 'quote_Product_Category',
      'lhs_table' => 'quote_product_category',
      'lhs_key' => 'id',
      'rhs_module' => 'quote_Product_Category',
      'rhs_table' => 'quote_product_category',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'quote_product_category_quote_product_category_1_c',
      'join_key_lhs' => 'quote_proddff0ategory_ida',
      'join_key_rhs' => 'quote_prod7914ategory_idb',
    ),
  ),
  'table' => 'quote_product_category_quote_product_category_1_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'quote_proddff0ategory_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'quote_prod7914ategory_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'quote_product_category_quote_product_category_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'quote_product_category_quote_product_category_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'quote_proddff0ategory_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'quote_product_category_quote_product_category_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'quote_prod7914ategory_idb',
      ),
    ),
  ),
);