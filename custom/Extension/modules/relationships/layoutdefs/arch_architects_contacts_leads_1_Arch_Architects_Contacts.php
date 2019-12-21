<?php
 // created: 2014-07-02 11:32:53
$layout_defs["Arch_Architects_Contacts"]["subpanel_setup"]['arch_architects_contacts_leads_1'] = array (
  'order' => 100,
  'module' => 'Leads',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ARCH_ARCHITECTS_CONTACTS_LEADS_1_FROM_LEADS_TITLE',
  'get_subpanel_data' => 'arch_architects_contacts_leads_1',
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
