<?php
$module_name = 'EvMgr_EvParts';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ATTENDEE_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ATTENDEE_STATUS',
    'width' => '10%',
  ),
  'EVENT_CE_HOURS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_CE_HOURS',
    'width' => '10%',
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
    'width' => '25%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
