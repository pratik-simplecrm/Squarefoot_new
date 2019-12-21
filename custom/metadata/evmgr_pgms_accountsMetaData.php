<?php
// created: 2014-04-01 15:34:49
$dictionary["evmgr_pgms_accounts"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'evmgr_pgms_accounts' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'EvMgr_Pgms',
      'rhs_table' => 'evmgr_pgms',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'evmgr_pgms_accounts_c',
      'join_key_lhs' => 'evmgr_pgms_accountsaccounts_ida',
      'join_key_rhs' => 'evmgr_pgms_accountsevmgr_pgms_idb',
    ),
  ),
  'table' => 'evmgr_pgms_accounts_c',
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
      'name' => 'evmgr_pgms_accountsaccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'evmgr_pgms_accountsevmgr_pgms_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'evmgr_pgms_accountsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'evmgr_pgms_accounts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'evmgr_pgms_accountsaccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'evmgr_pgms_accounts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'evmgr_pgms_accountsevmgr_pgms_idb',
      ),
    ),
  ),
);