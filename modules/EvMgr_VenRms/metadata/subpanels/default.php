<?php
$module_name='EvMgr_VenRms';
$subpanel_layout = array (
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'EvMgr_VenRms',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'name' => 
    array (
      'vname' => 'LBL_NAME',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '25%',
      'default' => true,
    ),
    'room_type' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_ROOM_TYPE',
      'width' => '15%',
    ),
    'room_rating' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_ROOM_RATING',
      'width' => '15%',
    ),
    'square_feet' => 
    array (
      'type' => 'int',
      'vname' => 'LBL_SQUARE_FEET',
      'width' => '10%',
      'default' => true,
    ),
    'private' => 
    array (
      'type' => 'bool',
      'default' => true,
      'vname' => 'LBL_PRIVATE',
      'width' => '10%',
    ),
    'edit_button' => 
    array (
      'vname' => 'LBL_EDIT_BUTTON',
      'widget_class' => 'SubPanelEditButton',
      'module' => 'EvMgr_VenRms',
      'width' => '5%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'vname' => 'LBL_REMOVE',
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'EvMgr_VenRms',
      'width' => '5%',
      'default' => true,
    ),
  ),
);