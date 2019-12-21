<?php
// created: 2014-07-02 11:35:11
$dictionary["arch_architectural_firm_arch_architects_contacts_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'arch_architectural_firm_arch_architects_contacts_1' => 
    array (
      'lhs_module' => 'Arch_Architectural_Firm',
      'lhs_table' => 'arch_architectural_firm',
      'lhs_key' => 'id',
      'rhs_module' => 'Arch_Architects_Contacts',
      'rhs_table' => 'arch_architects_contacts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'arch_architectural_firm_arch_architects_contacts_1_c',
      'join_key_lhs' => 'arch_archieaacal_firm_ida',
      'join_key_rhs' => 'arch_archi5320ontacts_idb',
    ),
  ),
  'table' => 'arch_architectural_firm_arch_architects_contacts_1_c',
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
      'name' => 'arch_archieaacal_firm_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'arch_archi5320ontacts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'arch_architectural_firm_arch_architects_contacts_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'arch_architectural_firm_arch_architects_contacts_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'arch_archieaacal_firm_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'arch_architectural_firm_arch_architects_contacts_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'arch_archi5320ontacts_idb',
      ),
    ),
  ),
);