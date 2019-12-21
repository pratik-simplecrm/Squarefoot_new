<?php
// created: 2014-07-02 11:34:37
$dictionary["arch_architectural_firm_activities_1_meetings"] = array (
  'relationships' => 
  array (
    'arch_architectural_firm_activities_1_meetings' => 
    array (
      'lhs_module' => 'Arch_Architectural_Firm',
      'lhs_table' => 'arch_architectural_firm',
      'lhs_key' => 'id',
      'rhs_module' => 'Meetings',
      'rhs_table' => 'meetings',
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