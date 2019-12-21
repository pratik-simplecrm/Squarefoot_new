<?php
 // created: 2014-04-01 15:34:49
$layout_defs["Contacts"]["subpanel_setup"]['evmgr_venrms_contacts'] = array (
  'order' => 100,
  'module' => 'EvMgr_VenRms',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_EVMGR_VENRMS_CONTACTS_FROM_EVMGR_VENRMS_TITLE',
  'get_subpanel_data' => 'evmgr_venrms_contacts',
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
