<?php
$module_name='quote_Quotes';
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
      'popup_module' => 'quote_Quotes',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'quote_quotes_number' => 
    array (
      'vname' => 'LBL_NUMBER',
      'width' => '5%',
      'default' => true,
    ),
    'name' => 
    array (
      'vname' => 'LBL_SUBJECT',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '45%',
      'default' => true,
    ),
    'status' => 
    array (
      'vname' => 'LBL_STATUS',
      'width' => '15%',
      'default' => true,
    ),
    'resolution' => 
    array (
      'vname' => 'LBL_RESOLUTION',
      'width' => '15%',
      'default' => true,
    ),
    'priority' => 
    array (
      'vname' => 'LBL_PRIORITY',
      'width' => '11%',
      'default' => true,
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'width' => '10%',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'quote_Quotes',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'quote_Quotes',
      'width' => '5%',
      'default' => true,
    ),
  ),
);