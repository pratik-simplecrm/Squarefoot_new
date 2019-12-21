<?php
$popupMeta = array (
    'moduleMain' => 'EvMgr_Evs',
    'varName' => 'EvMgr_Evs',
    'orderBy' => 'evmgr_evs.name',
    'whereClauses' => array (
  'name' => 'evmgr_evs.name',
  'event_type' => 'evmgr_evs.event_type',
  'event_status' => 'evmgr_evs.event_status',
  'assigned_user_name' => 'evmgr_evs.assigned_user_name',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'event_type',
  7 => 'event_status',
  8 => 'assigned_user_name',
),
    'searchdefs' => array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'event_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_EVENT_TYPE',
    'width' => '10%',
    'name' => 'event_type',
  ),
  'event_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_EVENT_STATUS',
    'width' => '10%',
    'name' => 'event_status',
  ),
  'assigned_user_name' => 
  array (
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'name' => 'assigned_user_name',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '25%',
    'default' => true,
    'name' => 'name',
  ),
  'EVENT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_TYPE',
    'width' => '10%',
    'name' => 'event_type',
  ),
  'START_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_START_DATE',
    'width' => '15%',
    'default' => true,
    'name' => 'start_date',
  ),
  'END_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_END_DATE',
    'width' => '15%',
    'default' => true,
    'name' => 'end_date',
  ),
  'EVENT_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_STATUS',
    'width' => '10%',
    'name' => 'event_status',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '25%',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
),
);

?>

