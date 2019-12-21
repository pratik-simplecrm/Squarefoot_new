<?php
// created: 2014-04-01 15:34:48
$dictionary["evmgr_evparts_evmgr_evs"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'evmgr_evparts_evmgr_evs' => 
    array (
      'lhs_module' => 'EvMgr_Evs',
      'lhs_table' => 'evmgr_evs',
      'lhs_key' => 'id',
      'rhs_module' => 'EvMgr_EvParts',
      'rhs_table' => 'evmgr_evparts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'evmgr_evparts_evmgr_evs_c',
      'join_key_lhs' => 'evmgr_evparts_evmgr_evsevmgr_evs_ida',
      'join_key_rhs' => 'evmgr_evparts_evmgr_evsevmgr_evparts_idb',
    ),
  ),
  'table' => 'evmgr_evparts_evmgr_evs_c',
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
      'name' => 'evmgr_evparts_evmgr_evsevmgr_evs_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'evmgr_evparts_evmgr_evsevmgr_evparts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'evmgr_evparts_evmgr_evsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'evmgr_evparts_evmgr_evs_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'evmgr_evparts_evmgr_evsevmgr_evs_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'evmgr_evparts_evmgr_evs_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'evmgr_evparts_evmgr_evsevmgr_evparts_idb',
      ),
    ),
  ),
);