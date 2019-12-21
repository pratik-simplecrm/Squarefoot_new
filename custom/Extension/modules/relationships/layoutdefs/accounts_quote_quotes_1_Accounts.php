<?php
 // created: 2014-04-09 09:18:36
$layout_defs["Accounts"]["subpanel_setup"]['accounts_quote_quotes_1'] = array (
  'order' => 100,
  'module' => 'quote_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_QUOTE_QUOTES_1_FROM_QUOTE_QUOTES_TITLE',
  'get_subpanel_data' => 'accounts_quote_quotes_1',
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
