<?php
// created: 2014-04-09 07:47:53
$dictionary["bhea_architectural_firms_opportunities_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'bhea_architectural_firms_opportunities_1' => 
    array (
      'lhs_module' => 'bhea_Architectural_Firms',
      'lhs_table' => 'bhea_architectural_firms',
      'lhs_key' => 'id',
      'rhs_module' => 'Opportunities',
      'rhs_table' => 'opportunities',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'bhea_architectural_firms_opportunities_1_c',
      'join_key_lhs' => 'bhea_archi1ed6l_firms_ida',
      'join_key_rhs' => 'bhea_architectural_firms_opportunities_1opportunities_idb',
    ),
  ),
  'table' => 'bhea_architectural_firms_opportunities_1_c',
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
      'name' => 'bhea_archi1ed6l_firms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'bhea_architectural_firms_opportunities_1opportunities_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'bhea_architectural_firms_opportunities_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'bhea_architectural_firms_opportunities_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'bhea_archi1ed6l_firms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'bhea_architectural_firms_opportunities_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'bhea_architectural_firms_opportunities_1opportunities_idb',
      ),
    ),
  ),
);