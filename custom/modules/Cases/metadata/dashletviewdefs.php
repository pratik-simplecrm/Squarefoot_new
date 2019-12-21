<?php
$dashletData['CasesDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'priority' => 
  array (
    'default' => '',
  ),
  'status' => 
  array (
    'default' => '',
  ),
  'casetype_c' => 
  array (
    'default' => '',
  ),
  'name' => 
  array (
    'default' => '',
  ),
  'type' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'default' => '',
  ),
);
$dashletData['CasesDashlet']['columns'] = array (
  'case_number' => 
  array (
    'width' => '6%',
    'label' => 'LBL_NUMBER',
    'default' => true,
    'name' => 'case_number',
  ),
  'name' => 
  array (
    'width' => '30%',
    'label' => 'LBL_LIST_SUBJECT',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'priority' => 
  array (
    'width' => '15%',
    'label' => 'LBL_PRIORITY',
    'default' => true,
    'name' => 'priority',
  ),
  'state' => 
  array (
    'type' => 'enum',
    'default' => true,
    'label' => 'LBL_STATE',
    'width' => '10%',
  ),
  'status' => 
  array (
    'width' => '8%',
    'label' => 'LBL_STATUS',
    'default' => true,
    'name' => 'status',
  ),
  'casetype_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CASETYPE',
    'width' => '20%',
    'name' => 'casetype_c',
  ),
  'account_name' => 
  array (
    'width' => '29%',
    'link' => true,
    'module' => 'Accounts',
    'id' => 'ACCOUNT_ID',
    'ACLTag' => 'ACCOUNT',
    'label' => 'LBL_ACCOUNT_NAME',
    'related_fields' => 
    array (
      0 => 'account_id',
    ),
    'name' => 'account_name',
    'default' => false,
  ),
  'resolution' => 
  array (
    'width' => '8%',
    'label' => 'LBL_RESOLUTION',
    'name' => 'resolution',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'name' => 'date_entered',
    'default' => false,
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
