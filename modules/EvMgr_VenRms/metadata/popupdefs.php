<?php
$popupMeta = array (
    'moduleMain' => 'EvMgr_VenRms',
    'varName' => 'EvMgr_VenRms',
    'orderBy' => 'evmgr_venrms.name',
    'whereClauses' => array (
  'name' => 'evmgr_venrms.name',
  'room_type' => 'evmgr_venrms.room_type',
  'room_rating' => 'evmgr_venrms.room_rating',
  'square_feet' => 'evmgr_venrms.square_feet',
  'private' => 'evmgr_venrms.private',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'room_type',
  5 => 'room_rating',
  6 => 'square_feet',
  7 => 'private',
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
  'room_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ROOM_TYPE',
    'width' => '10%',
    'name' => 'room_type',
  ),
  'room_rating' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ROOM_RATING',
    'width' => '10%',
    'name' => 'room_rating',
  ),
  'square_feet' => 
  array (
    'type' => 'int',
    'label' => 'LBL_SQUARE_FEET',
    'width' => '10%',
    'name' => 'square_feet',
  ),
  'private' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_PRIVATE',
    'width' => '10%',
    'name' => 'private',
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
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '25%',
    'default' => true,
  ),
),
);
