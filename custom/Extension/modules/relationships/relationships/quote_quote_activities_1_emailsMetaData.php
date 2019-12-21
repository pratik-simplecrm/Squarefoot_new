<?php
// created: 2017-05-19 11:25:11
$dictionary["quote_quote_activities_1_emails"] = array (
  'relationships' => 
  array (
    'quote_quote_activities_1_emails' => 
    array (
      'lhs_module' => 'quote_Quote',
      'lhs_table' => 'quote_quote',
      'lhs_key' => 'id',
      'rhs_module' => 'Emails',
      'rhs_table' => 'emails',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'quote_Quote',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);