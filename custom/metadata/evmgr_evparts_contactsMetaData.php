<?php
// created: 2014-04-01 15:34:48
$dictionary["evmgr_evparts_contacts"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'evmgr_evparts_contacts' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'EvMgr_EvParts',
      'rhs_table' => 'evmgr_evparts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'evmgr_evparts_contacts_c',
      'join_key_lhs' => 'evmgr_evparts_contactscontacts_ida',
      'join_key_rhs' => 'evmgr_evparts_contactsevmgr_evparts_idb',
    ),
  ),
  'table' => 'evmgr_evparts_contacts_c',
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
      'name' => 'evmgr_evparts_contactscontacts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'evmgr_evparts_contactsevmgr_evparts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'evmgr_evparts_contactsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'evmgr_evparts_contacts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'evmgr_evparts_contactscontacts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'evmgr_evparts_contacts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'evmgr_evparts_contactsevmgr_evparts_idb',
      ),
    ),
  ),
);