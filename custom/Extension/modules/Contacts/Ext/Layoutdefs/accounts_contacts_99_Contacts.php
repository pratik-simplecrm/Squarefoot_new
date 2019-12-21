<?php
$layout_defs["Contacts"]["subpanel_setup"]['accounts_contacts_99'] = array (
  'order' => 50,
  'module' => 'Accounts',
  'subpanel_name' => 'ForEventStaffContacts',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_CONTACTS_99_FROM_ACCOUNTS_TITLE',
  'get_subpanel_data' => 'accounts_contacts_99',
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
?>
