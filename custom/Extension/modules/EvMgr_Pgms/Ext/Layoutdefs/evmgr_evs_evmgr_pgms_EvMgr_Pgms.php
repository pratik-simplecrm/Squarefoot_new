<?php
 // created: 2014-04-01 15:34:48
$layout_defs["EvMgr_Pgms"]["subpanel_setup"]['evmgr_evs_evmgr_pgms'] = array (
  'order' => 100,
  'module' => 'EvMgr_Evs',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_EVMGR_EVS_EVMGR_PGMS_FROM_EVMGR_EVS_TITLE',
  'get_subpanel_data' => 'evmgr_evs_evmgr_pgms',
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
