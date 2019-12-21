<?php
 // created: 2014-04-01 15:34:49
$layout_defs["Accounts"]["subpanel_setup"]['evmgr_venrms_accounts'] = array (
  'order' => 100,
  'module' => 'EvMgr_VenRms',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_EVMGR_VENRMS_ACCOUNTS_FROM_EVMGR_VENRMS_TITLE',
  'get_subpanel_data' => 'evmgr_venrms_accounts',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
