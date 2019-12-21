<?php
 // created: 2014-04-01 15:34:48
$layout_defs["Documents"]["subpanel_setup"]['evmgr_evs_documents'] = array (
  'order' => 100,
  'module' => 'EvMgr_Evs',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_EVMGR_EVS_DOCUMENTS_FROM_EVMGR_EVS_TITLE',
  'get_subpanel_data' => 'evmgr_evs_documents',
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
