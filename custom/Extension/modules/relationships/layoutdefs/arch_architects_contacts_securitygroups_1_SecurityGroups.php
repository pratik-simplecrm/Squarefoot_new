<?php
 // created: 2016-08-10 04:09:48
$layout_defs["SecurityGroups"]["subpanel_setup"]['arch_architects_contacts_securitygroups_1'] = array (
  'order' => 100,
  'module' => 'Arch_Architects_Contacts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ARCH_ARCHITECTS_CONTACTS_SECURITYGROUPS_1_FROM_ARCH_ARCHITECTS_CONTACTS_TITLE',
  'get_subpanel_data' => 'arch_architects_contacts_securitygroups_1',
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
