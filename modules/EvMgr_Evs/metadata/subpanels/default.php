<?php
$module_name='EvMgr_Evs';
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
      'popup_module' => 'EvMgr_Evs',
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
    'event_type' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_EVENT_TYPE',
      'width' => '10%',
    ),
    'start_date' => 
    array (
      'type' => 'datetimecombo',
      'vname' => 'LBL_START_DATE',
      'width' => '10%',
      'default' => true,
    ),
    'end_date' => 
    array (
      'type' => 'datetimecombo',
      'vname' => 'LBL_END_DATE',
      'width' => '10%',
      'default' => true,
    ),
    'ce_hours_credit' => 
    array (
      'type' => 'int',
      'default' => true,
      'vname' => 'LBL_CE_HOURS_CREDIT',
      'width' => '10%',
    ),
    'event_status' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_EVENT_STATUS',
      'width' => '10%',
    ),
    'edit_button' => 
    array (
      'vname' => 'LBL_EDIT_BUTTON',
      'widget_class' => 'SubPanelEditButton',
      'module' => 'EvMgr_Evs',
      'width' => '5%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'vname' => 'LBL_REMOVE',
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'EvMgr_Evs',
      'width' => '5%',
      'default' => true,
    ),
  ),
);