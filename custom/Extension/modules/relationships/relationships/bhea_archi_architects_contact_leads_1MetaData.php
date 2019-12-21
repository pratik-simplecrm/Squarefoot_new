<?php
// created: 2014-04-09 07:49:21
$dictionary["bhea_archi_architects_contact_leads_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'bhea_archi_architects_contact_leads_1' => 
    array (
      'lhs_module' => 'bhea_Archi_Architects_Contact',
      'lhs_table' => 'bhea_archi_architects_contact',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'bhea_archi_architects_contact_leads_1_c',
      'join_key_lhs' => 'bhea_archi849econtact_ida',
      'join_key_rhs' => 'bhea_archi_architects_contact_leads_1leads_idb',
    ),
  ),
  'table' => 'bhea_archi_architects_contact_leads_1_c',
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
      'name' => 'bhea_archi849econtact_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'bhea_archi_architects_contact_leads_1leads_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'bhea_archi_architects_contact_leads_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'bhea_archi_architects_contact_leads_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'bhea_archi849econtact_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'bhea_archi_architects_contact_leads_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'bhea_archi_architects_contact_leads_1leads_idb',
      ),
    ),
  ),
);