<?php
// created: 2014-07-11 12:11:46
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_SUBJECT',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'quote_quote_number' => 
  array (
    'type' => 'int',
    'studio' => 
    array (
      'quickcreate' => false,
    ),
    'vname' => 'LBL_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'quotation_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_QUOTATION_STATUS',
    'width' => '10%',
  ),
  'assigned_user_name' => 
  array (
    'name' => 'assigned_user_name',
    'vname' => 'LBL_ASSIGNED_TO_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_record_key' => 'assigned_user_id',
    'target_module' => 'Employees',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'quote_Quote',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'quote_Quote',
    'width' => '5%',
    'default' => true,
  ),
);