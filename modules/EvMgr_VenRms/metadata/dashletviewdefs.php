<?php
$dashletData['EvMgr_VenRmsDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'room_type' => 
  array (
    'default' => '',
  ),
  'room_rating' => 
  array (
    'default' => '',
  ),
  'square_feet' => 
  array (
    'default' => '',
  ),
  'private' => 
  array (
    'default' => '',
  ),
);
$dashletData['EvMgr_VenRmsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '25%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'room_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ROOM_TYPE',
    'width' => '15%',
  ),
  'room_rating' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ROOM_RATING',
    'width' => '15%',
  ),
  'square_feet' => 
  array (
    'type' => 'int',
    'label' => 'LBL_SQUARE_FEET',
    'width' => '10%',
    'default' => true,
  ),
  'private' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_PRIVATE',
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
