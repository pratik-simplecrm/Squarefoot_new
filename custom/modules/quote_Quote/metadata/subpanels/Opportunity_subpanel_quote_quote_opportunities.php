<?php
// created: 2014-07-17 15:00:41
$subpanel_layout['list_fields'] = array (
  'quote_quote_number' => 
  array (
    'vname' => 'LBL_NUMBER',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '5%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_SUBJECT',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'quote_quote_accounts_name' => 
  array (
    'vname' => 'LBL_QUOTE_QUOTE_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'width' => '15%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_record_key' => 'quote_quote_accountsaccounts_ida',
    'target_module' => 'Accounts',
    'default' => true,
  ),
  'quotation_status' => 
  array (
    'vname' => 'LBL_QUOTATION_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'grand_total' => 
  array (
    'vname' => 'LBL_GRAND_TOTAL',
    'width' => '10%',
    'default' => true,
  ),
  'valid_until_c' => 
  array (
    'vname' => 'LBL_VALID_UNTIL',
    'width' => '10%',
    'default' => true,
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