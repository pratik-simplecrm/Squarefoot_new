<?php
 // created: 2014-04-01 15:34:49
$layout_defs["Contacts"]["subpanel_setup"]['evmgr_pgms_contacts'] = array (
  'order' => 100,
  'module' => 'EvMgr_Pgms',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_EVMGR_PGMS_CONTACTS_FROM_EVMGR_PGMS_TITLE',
  'get_subpanel_data' => 'evmgr_pgms_contacts',
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
