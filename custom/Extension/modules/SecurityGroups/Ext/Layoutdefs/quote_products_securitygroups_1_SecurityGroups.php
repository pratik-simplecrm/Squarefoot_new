<?php
 // created: 2016-08-10 02:40:39
$layout_defs["SecurityGroups"]["subpanel_setup"]['quote_products_securitygroups_1'] = array (
  'order' => 100,
  'module' => 'quote_Products',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_QUOTE_PRODUCTS_SECURITYGROUPS_1_FROM_QUOTE_PRODUCTS_TITLE',
  'get_subpanel_data' => 'quote_products_securitygroups_1',
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
