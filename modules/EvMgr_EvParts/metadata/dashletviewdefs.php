<?php
$dashletData['EvMgr_EvPartsDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'attendee_status' => 
  array (
    'default' => '',
  ),
  'event_ce_hours' => 
  array (
    'default' => '',
  ),
  'assigned_user_name' => 
  array (
    'default' => '',
  ),
);
$dashletData['EvMgr_EvPartsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '25%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'attendee_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ATTENDEE_STATUS',
    'width' => '10%',
    'name' => 'attendee_status',
  ),
  'event_ce_hours' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_CE_HOURS',
    'width' => '10%',
    'name' => 'event_ce_hours',
  ),
  'event_start_date_imported' => 
  array (
    'type' => 'datetime',
    'studio' => 'visible',
    'label' => 'LBL_EVENT_START_DATE_IMPORTED',
    'width' => '15%',
    'default' => true,
    'name' => 'event_start_date_imported',
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
