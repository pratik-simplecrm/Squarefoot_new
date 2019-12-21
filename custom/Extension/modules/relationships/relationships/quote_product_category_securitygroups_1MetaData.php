<?php
// created: 2016-08-10 02:41:20
$dictionary["quote_product_category_securitygroups_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'quote_product_category_securitygroups_1' => 
    array (
      'lhs_module' => 'quote_Product_Category',
      'lhs_table' => 'quote_product_category',
      'lhs_key' => 'id',
      'rhs_module' => 'SecurityGroups',
      'rhs_table' => 'securitygroups',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'quote_product_category_securitygroups_1_c',
      'join_key_lhs' => 'quote_prodfe4eategory_ida',
      'join_key_rhs' => 'quote_product_category_securitygroups_1securitygroups_idb',
    ),
  ),
  'table' => 'quote_product_category_securitygroups_1_c',
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
      'name' => 'quote_prodfe4eategory_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'quote_product_category_securitygroups_1securitygroups_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'quote_product_category_securitygroups_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'quote_product_category_securitygroups_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'quote_prodfe4eategory_ida',
        1 => 'quote_product_category_securitygroups_1securitygroups_idb',
      ),
    ),
  ),
);