<?php
$dashletData['EvMgr_EvsDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'event_type' => 
  array (
    'default' => '',
  ),
  'event_status' => 
  array (
    'default' => '',
  ),
  'assigned_user_name' => 
  array (
    'default' => '',
  ),
);
$dashletData['EvMgr_EvsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '25%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'event_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_TYPE',
    'width' => '10%',
  ),
  'start_date' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_START_DATE',
    'width' => '15%',
    'default' => true,
  ),
  'end_date' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_END_DATE',
    'width' => '15%',
    'default' => true,
  ),
  'event_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_STATUS',
    'width' => '10%',
  ),
  'assigned_user_name' => 
  array (
    'width' => '25%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => true,
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
);
