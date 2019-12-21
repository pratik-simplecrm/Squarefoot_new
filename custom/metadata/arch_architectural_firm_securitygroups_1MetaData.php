<?php
// created: 2016-08-10 04:08:58
$dictionary["arch_architectural_firm_securitygroups_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'arch_architectural_firm_securitygroups_1' => 
    array (
      'lhs_module' => 'Arch_Architectural_Firm',
      'lhs_table' => 'arch_architectural_firm',
      'lhs_key' => 'id',
      'rhs_module' => 'SecurityGroups',
      'rhs_table' => 'securitygroups',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'arch_architectural_firm_securitygroups_1_c',
      'join_key_lhs' => 'arch_archi5700al_firm_ida',
      'join_key_rhs' => 'arch_architectural_firm_securitygroups_1securitygroups_idb',
    ),
  ),
  'table' => 'arch_architectural_firm_securitygroups_1_c',
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
      'name' => 'arch_archi5700al_firm_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'arch_architectural_firm_securitygroups_1securitygroups_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'arch_architectural_firm_securitygroups_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'arch_architectural_firm_securitygroups_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'arch_archi5700al_firm_ida',
        1 => 'arch_architectural_firm_securitygroups_1securitygroups_idb',
      ),
    ),
  ),
);