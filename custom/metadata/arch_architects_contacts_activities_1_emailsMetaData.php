<?php
// created: 2014-07-02 11:31:29
$dictionary["arch_architects_contacts_activities_1_emails"] = array (
  'relationships' => 
  array (
    'arch_architects_contacts_activities_1_emails' => 
    array (
      'lhs_module' => 'Arch_Architects_Contacts',
      'lhs_table' => 'arch_architects_contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Arch_Architects_Contacts',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);