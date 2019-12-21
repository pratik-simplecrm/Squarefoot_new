<?php
 // created: 2014-04-01 15:34:49
$layout_defs["Documents"]["subpanel_setup"]['evmgr_pgms_documents'] = array (
  'order' => 100,
  'module' => 'EvMgr_Pgms',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_EVMGR_PGMS_DOCUMENTS_FROM_EVMGR_PGMS_TITLE',
  'get_subpanel_data' => 'evmgr_pgms_documents',
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
