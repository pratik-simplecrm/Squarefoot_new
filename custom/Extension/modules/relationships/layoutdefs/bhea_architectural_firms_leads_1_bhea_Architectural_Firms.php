<?php
 // created: 2014-06-23 13:33:33
$layout_defs["bhea_Architectural_Firms"]["subpanel_setup"]['bhea_architectural_firms_leads_1'] = array (
  'order' => 100,
  'module' => 'Leads',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_BHEA_ARCHITECTURAL_FIRMS_LEADS_1_FROM_LEADS_TITLE',
  'get_subpanel_data' => 'bhea_architectural_firms_leads_1',
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
