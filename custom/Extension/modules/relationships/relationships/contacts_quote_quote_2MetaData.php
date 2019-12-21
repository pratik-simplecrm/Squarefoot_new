<?php
// created: 2014-04-10 10:56:42
$dictionary["contacts_quote_quote_2"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'contacts_quote_quote_2' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'quote_Quote',
      'rhs_table' => 'quote_quote',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'contacts_quote_quote_2_c',
      'join_key_lhs' => 'contacts_quote_quote_2contacts_ida',
      'join_key_rhs' => 'contacts_quote_quote_2quote_quote_idb',
    ),
  ),
  'table' => 'contacts_quote_quote_2_c',
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
      'name' => 'contacts_quote_quote_2contacts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'contacts_quote_quote_2quote_quote_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'contacts_quote_quote_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'contacts_quote_quote_2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'contacts_quote_quote_2contacts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'contacts_quote_quote_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'contacts_quote_quote_2quote_quote_idb',
      ),
    ),
  ),
);