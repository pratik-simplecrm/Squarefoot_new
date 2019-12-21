<?php
 // created: 2014-04-10 10:48:46
$layout_defs["Contacts"]["subpanel_setup"]['contacts_quote_quote_1'] = array (
  'order' => 100,
  'module' => 'quote_Quote',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_QUOTE_QUOTE_1_FROM_QUOTE_QUOTE_TITLE',
  'get_subpanel_data' => 'contacts_quote_quote_1',
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
