<?php
// created: 2014-04-01 15:34:49
$dictionary["evmgr_pgms_contacts"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'evmgr_pgms_contacts' => 
    array (
      'lhs_module' => 'EvMgr_Pgms',
      'lhs_table' => 'evmgr_pgms',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'evmgr_pgms_contacts_c',
      'join_key_lhs' => 'evmgr_pgms_contactsevmgr_pgms_ida',
      'join_key_rhs' => 'evmgr_pgms_contactscontacts_idb',
    ),
  ),
  'table' => 'evmgr_pgms_contacts_c',
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
      'name' => 'evmgr_pgms_contactsevmgr_pgms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'evmgr_pgms_contactscontacts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'evmgr_pgms_contactsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'evmgr_pgms_contacts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'evmgr_pgms_contactsevmgr_pgms_ida',
        1 => 'evmgr_pgms_contactscontacts_idb',
      ),
    ),
  ),
);