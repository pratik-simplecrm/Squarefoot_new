<?php
 // created: 2014-06-27 10:03:50
$layout_defs["Accounts"]["subpanel_setup"]['quote_quote_accounts'] = array (
  'order' => 100,
  'module' => 'quote_Quote',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_QUOTE_QUOTE_ACCOUNTS_FROM_QUOTE_QUOTE_TITLE',
  'get_subpanel_data' => 'quote_quote_accounts',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
