<?php
// created: 2014-04-09 09:20:01
$dictionary["contacts_quote_quotes_2"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'contacts_quote_quotes_2' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'quote_Quotes',
      'rhs_table' => 'quote_quotes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'contacts_quote_quotes_2_c',
      'join_key_lhs' => 'contacts_quote_quotes_2contacts_ida',
      'join_key_rhs' => 'contacts_quote_quotes_2quote_quotes_idb',
    ),
  ),
  'table' => 'contacts_quote_quotes_2_c',
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
      'name' => 'contacts_quote_quotes_2contacts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'contacts_quote_quotes_2quote_quotes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'contacts_quote_quotes_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'contacts_quote_quotes_2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'contacts_quote_quotes_2contacts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'contacts_quote_quotes_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'contacts_quote_quotes_2quote_quotes_idb',
      ),
    ),
  ),
);