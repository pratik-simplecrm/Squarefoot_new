<?php
// created: 2014-07-01 08:24:36
$dictionary["quote_quote_accounts_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'quote_quote_accounts_1' => 
    array (
      'lhs_module' => 'quote_Quote',
      'lhs_table' => 'quote_quote',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'quote_quote_accounts_1_c',
      'join_key_lhs' => 'quote_quote_accounts_1quote_quote_ida',
      'join_key_rhs' => 'quote_quote_accounts_1accounts_idb',
    ),
  ),
  'table' => 'quote_quote_accounts_1_c',
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
      'name' => 'quote_quote_accounts_1quote_quote_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'quote_quote_accounts_1accounts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'quote_quote_accounts_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'quote_quote_accounts_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'quote_quote_accounts_1quote_quote_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'quote_quote_accounts_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'quote_quote_accounts_1accounts_idb',
      ),
    ),
  ),
);