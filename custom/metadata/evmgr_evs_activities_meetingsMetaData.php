<?php
// created: 2014-04-01 15:34:48
$dictionary["evmgr_evs_activities_meetings"] = array (
  'relationships' => 
  array (
    'evmgr_evs_activities_meetings' => 
    array (
      'lhs_module' => 'EvMgr_Evs',
      'lhs_table' => 'evmgr_evs',
      'lhs_key' => 'id',
      'rhs_module' => 'Meetings',
      'rhs_table' => 'meetings',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'EvMgr_Evs',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);