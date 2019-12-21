<?php
 // created: 2014-04-01 15:34:48
$layout_defs["EvMgr_Evs"]["subpanel_setup"]['evmgr_evparts_evmgr_evs'] = array (
  'order' => 100,
  'module' => 'EvMgr_EvParts',
  'subpanel_name' => 'ForEventListings',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_EVMGR_EVPARTS_EVMGR_EVS_FROM_EVMGR_EVPARTS_TITLE',
  'get_subpanel_data' => 'evmgr_evparts_evmgr_evs',
  'top_buttons' => 
  array (
/*
	0 => '',
	1 => '',
*/
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
/*
    1 => array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
*/
  ),
);
