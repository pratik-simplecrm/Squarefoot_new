<?php
$module_name = 'EvMgr_VenRms';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ROOM_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ROOM_TYPE',
    'width' => '15%',
  ),
  'ROOM_RATING' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ROOM_RATING',
    'width' => '15%',
  ),
  'SQUARE_FEET' => 
  array (
    'type' => 'int',
    'label' => 'LBL_SQUARE_FEET',
    'width' => '10%',
    'default' => true,
  ),
  'PRIVATE' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_PRIVATE',
    'width' => '10%',
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
