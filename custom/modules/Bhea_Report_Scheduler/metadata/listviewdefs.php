<?php
$module_name = 'Bhea_Report_Scheduler';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'FREQUENCY' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_FREQUENCY',
    'width' => '10%',
    'default' => true,
  ),
  'START_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'NEXT_RUN' => 
  array (
    'type' => 'date',
    'label' => 'LBL_NEXT_RUN',
    'width' => '10%',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
