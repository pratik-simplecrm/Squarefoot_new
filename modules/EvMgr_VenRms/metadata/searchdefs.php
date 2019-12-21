<?php
$module_name = 'EvMgr_VenRms';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'room_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ROOM_TYPE',
        'width' => '10%',
        'name' => 'room_type',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'room_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ROOM_TYPE',
        'width' => '10%',
        'name' => 'room_type',
      ),
      'room_rating' => 
      array (
        'type' => 'enum',
        'default' => true,
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
        'default' => true,
        'name' => 'square_feet',
      ),
      'private' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_PRIVATE',
        'width' => '10%',
        'name' => 'private',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
