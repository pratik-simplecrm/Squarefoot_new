<?php
// created: 2019-12-14 14:35:39
$subpanel_layout['list_fields'] = array (
  'casenumber_c' => 
  array (
    'type' => 'int',
    'default' => true,
    'vname' => 'LBL_CASENUMBER',
    'width' => '10%',
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'reasonofreschedule_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_REASONOFRESCHEDULE',
    'width' => '10%',
  ),
  'reasonforreschedule_c' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_REASONFORRESCHEDULE',
    'sortable' => false,
    'width' => '10%',
  ),
  'supervisor_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_SUPERVISOR',
    'id' => 'USER_ID1_C',
    'link' => true,
    'width' => '10%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Users',
    'target_record_key' => 'user_id1_c',
  ),
  'startdate_c' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'vname' => 'LBL_STARTDATE',
    'width' => '10%',
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'scrm_ScheduleHistory',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'scrm_ScheduleHistory',
    'width' => '5%',
    'default' => true,
  ),
);