<?php
// created: 2014-04-01 15:34:48
$dictionary["evmgr_evs_opportunities"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'evmgr_evs_opportunities' => 
    array (
      'lhs_module' => 'Opportunities',
      'lhs_table' => 'opportunities',
      'lhs_key' => 'id',
      'rhs_module' => 'EvMgr_Evs',
      'rhs_table' => 'evmgr_evs',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'evmgr_evs_opportunities_c',
      'join_key_lhs' => 'evmgr_evs_opportunitiesopportunities_ida',
      'join_key_rhs' => 'evmgr_evs_opportunitiesevmgr_evs_idb',
    ),
  ),
  'table' => 'evmgr_evs_opportunities_c',
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
      'name' => 'evmgr_evs_opportunitiesopportunities_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'evmgr_evs_opportunitiesevmgr_evs_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'evmgr_evs_opportunitiesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'evmgr_evs_opportunities_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'evmgr_evs_opportunitiesopportunities_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'evmgr_evs_opportunities_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'evmgr_evs_opportunitiesevmgr_evs_idb',
      ),
    ),
  ),
);