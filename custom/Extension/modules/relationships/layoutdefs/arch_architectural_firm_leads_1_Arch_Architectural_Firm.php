<?php
 // created: 2014-07-03 09:08:15
$layout_defs["Arch_Architectural_Firm"]["subpanel_setup"]['arch_architectural_firm_leads_1'] = array (
  'order' => 100,
  'module' => 'Leads',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ARCH_ARCHITECTURAL_FIRM_LEADS_1_FROM_LEADS_TITLE',
  'get_subpanel_data' => 'arch_architectural_firm_leads_1',
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
