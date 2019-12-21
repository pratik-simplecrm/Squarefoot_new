<?php
// created: 2014-06-27 10:03:50
$dictionary["quote_product_category_quote_products"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'quote_product_category_quote_products' => 
    array (
      'lhs_module' => 'quote_Product_Category',
      'lhs_table' => 'quote_product_category',
      'lhs_key' => 'id',
      'rhs_module' => 'quote_Products',
      'rhs_table' => 'quote_products',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'quote_product_category_quote_products_c',
      'join_key_lhs' => 'quote_product_category_quote_productsquote_product_category_ida',
      'join_key_rhs' => 'quote_product_category_quote_productsquote_products_idb',
    ),
  ),
  'table' => 'quote_product_category_quote_products_c',
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
      'name' => 'quote_product_category_quote_productsquote_product_category_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'quote_product_category_quote_productsquote_products_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'quote_product_category_quote_productsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'quote_product_category_quote_products_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'quote_product_category_quote_productsquote_product_category_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'quote_product_category_quote_products_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'quote_product_category_quote_productsquote_products_idb',
      ),
    ),
  ),
);