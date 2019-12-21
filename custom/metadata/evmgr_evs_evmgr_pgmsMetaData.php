<?php
// created: 2014-04-01 15:34:48
$dictionary["evmgr_evs_evmgr_pgms"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'evmgr_evs_evmgr_pgms' => 
    array (
      'lhs_module' => 'EvMgr_Evs',
      'lhs_table' => 'evmgr_evs',
      'lhs_key' => 'id',
      'rhs_module' => 'EvMgr_Pgms',
      'rhs_table' => 'evmgr_pgms',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'evmgr_evs_evmgr_pgms_c',
      'join_key_lhs' => 'evmgr_evs_evmgr_pgmsevmgr_evs_ida',
      'join_key_rhs' => 'evmgr_evs_evmgr_pgmsevmgr_pgms_idb',
    ),
  ),
  'table' => 'evmgr_evs_evmgr_pgms_c',
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
      'name' => 'evmgr_evs_evmgr_pgmsevmgr_evs_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'evmgr_evs_evmgr_pgmsevmgr_pgms_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'evmgr_evs_evmgr_pgmsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'evmgr_evs_evmgr_pgms_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'evmgr_evs_evmgr_pgmsevmgr_evs_ida',
        1 => 'evmgr_evs_evmgr_pgmsevmgr_pgms_idb',
      ),
    ),
  ),
);