<?php
// created: 2014-07-02 11:34:38
$dictionary["arch_architectural_firm_activities_1_emails"] = array (
  'relationships' => 
  array (
    'arch_architectural_firm_activities_1_emails' => 
    array (
      'lhs_module' => 'Arch_Architectural_Firm',
      'lhs_table' => 'arch_architectural_firm',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'Arch_Architectural_Firm',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);