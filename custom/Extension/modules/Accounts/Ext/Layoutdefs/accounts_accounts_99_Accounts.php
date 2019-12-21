<?php
$layout_defs["Accounts"]["subpanel_setup"]['accounts_accounts_99'] = array (
  'order' => 50,
  'module' => 'Accounts',
  'subpanel_name' => 'ForVenues',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_ACCOUNTS_99_FROM_ACCOUNTS_R_TITLE',
  'get_subpanel_data' => 'accounts_accounts_99',
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
