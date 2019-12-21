<?php
$popupMeta = array (
    'moduleMain' => 'EvMgr_EvParts',
    'varName' => 'EvMgr_EvParts',
    'orderBy' => 'evmgr_evparts.name',
    'whereClauses' => array (
  'name' => 'evmgr_evparts.name',
  'attendee_status' => 'evmgr_evparts.attendee_status',
  'event_ce_hours' => 'evmgr_evparts.event_ce_hours',
  'event_start_date_imported' => 'evmgr_evparts.event_start_date_imported',
  'assigned_user_name' => 'evmgr_evparts.assigned_user_name',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'attendee_status',
  5 => 'event_ce_hours',
  6 => 'event_start_date_imported',
  7 => 'assigned_user_name',
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
  'attendee_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ATTENDEE_STATUS',
    'width' => '10%',
    'name' => 'attendee_status',
  ),
  'event_ce_hours' => 
  array (
    'type' => 'enum',
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
    'width' => '10%',
    'name' => 'event_start_date_imported',
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
  'ATTENDEE_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ATTENDEE_STATUS',
    'width' => '10%',
    'name' => 'attendee_status',
  ),
  'EVENT_CE_HOURS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_CE_HOURS',
    'width' => '10%',
    'name' => 'event_ce_hours',
  ),
  'EVENT_START_DATE_IMPORTED' => 
  array (
    'type' => 'datetime',
    'studio' => 'visible',
    'label' => 'LBL_EVENT_START_DATE_IMPORTED',
    'width' => '15%',
    'default' => true,
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
