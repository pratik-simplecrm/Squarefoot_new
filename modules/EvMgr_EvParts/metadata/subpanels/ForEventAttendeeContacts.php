<?php
$module_name='EvMgr_EvParts';
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
      'popup_module' => 'EvMgr_EvParts',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'evmgr_evparts_evmgr_evs_name' => 
    array (
      'vname' => 'LBL_EVMGR_EVPARTS_EVMGR_EVS_FROM_EVMGR_EVS_TITLE',
      'type' => 'link',
      'relationship' => 'evmgr_evparts_evmgr_evs_c',
      'source' => 'non-db',
      'module' => 'EvMgr_Evs',
      'bean_name' => false,
      'side' => 'right',
      'id_name' => 'evmgr_evparts_evmgr_evsevmgr_evs_ida',
      'link-type' => 'one',
      'widget_class' => 'SubPanelDetailViewLink',
      'target_record_key' => 'evmgr_evparts_evmgr_evsevmgr_evs_ida',
      'target_module' => 'EvMgr_Evs',
      'width' => '25%',
      'default' => true,
    ),
    'name' => 
    array (
      'vname' => 'LBL_EVPARTS_NAME',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '25%',
      'default' => true,
    ),
    'event_start_date_imported' => 
    array (
      'vname' => 'LBL_EVENT_START_DATE_IMPORTED',
      'width' => '15%',
      'default' => true,
    ),
    'attendee_status' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_ATTENDEE_STATUS',
      'width' => '10%',
    ),
    'event_ce_hours' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_EVENT_CE_HOURS',
      'width' => '10%',
    ),
    'edit_button' => 
    array (
      'width' => '5%',
      'vname' => 'LBL_EDIT_BUTTON',
      'default' => true,
      'widget_class' => 'SubPanelEditButton',
    ),
    'remove_button' => 
    array (
      'width' => '5%',
      'vname' => 'LBL_REMOVE',
      'default' => true,
      'widget_class' => 'SubPanelRemoveButton',
    ),
  ),
);