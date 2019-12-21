<?php
 // created: 2014-04-09 07:49:21
$layout_defs["bhea_Archi_Architects_Contact"]["subpanel_setup"]['bhea_archi_architects_contact_leads_1'] = array (
  'order' => 100,
  'module' => 'Leads',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_BHEA_ARCHI_ARCHITECTS_CONTACT_LEADS_1_FROM_LEADS_TITLE',
  'get_subpanel_data' => 'bhea_archi_architects_contact_leads_1',
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
