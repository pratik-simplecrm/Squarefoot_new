<?php
// created: 2014-04-01 15:34:48
$dictionary["evmgr_evs_documents"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'evmgr_evs_documents' => 
    array (
      'lhs_module' => 'EvMgr_Evs',
      'lhs_table' => 'evmgr_evs',
      'lhs_key' => 'id',
      'rhs_module' => 'Documents',
      'rhs_table' => 'documents',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'evmgr_evs_documents_c',
      'join_key_lhs' => 'evmgr_evs_documentsevmgr_evs_ida',
      'join_key_rhs' => 'evmgr_evs_documentsdocuments_idb',
    ),
  ),
  'table' => 'evmgr_evs_documents_c',
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
      'name' => 'evmgr_evs_documentsevmgr_evs_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'evmgr_evs_documentsdocuments_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
    5 => 
    array (
      'name' => 'document_revision_id',
      'type' => 'varchar',
      'len' => '36',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'evmgr_evs_documentsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'evmgr_evs_documents_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'evmgr_evs_documentsevmgr_evs_ida',
        1 => 'evmgr_evs_documentsdocuments_idb',
      ),
    ),
  ),
);