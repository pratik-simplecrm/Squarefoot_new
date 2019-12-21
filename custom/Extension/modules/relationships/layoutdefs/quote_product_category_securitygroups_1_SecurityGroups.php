<?php
 // created: 2016-08-10 02:41:20
$layout_defs["SecurityGroups"]["subpanel_setup"]['quote_product_category_securitygroups_1'] = array (
  'order' => 100,
  'module' => 'quote_Product_Category',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_QUOTE_PRODUCT_CATEGORY_SECURITYGROUPS_1_FROM_QUOTE_PRODUCT_CATEGORY_TITLE',
  'get_subpanel_data' => 'quote_product_category_securitygroups_1',
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
