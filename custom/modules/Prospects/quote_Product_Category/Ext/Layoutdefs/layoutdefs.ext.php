<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2014-06-27 10:03:50
$layout_defs["quote_Product_Category"]["subpanel_setup"]['quote_product_category_quote_products'] = array (
  'order' => 100,
  'module' => 'quote_Products',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_FROM_QUOTE_PRODUCTS_TITLE',
  'get_subpanel_data' => 'quote_product_category_quote_products',
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


 // created: 2016-08-10 02:41:20
$layout_defs["quote_Product_Category"]["subpanel_setup"]['quote_product_category_securitygroups_1'] = array (
  'order' => 100,
  'module' => 'SecurityGroups',
  'subpanel_name' => 'admin',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_QUOTE_PRODUCT_CATEGORY_SECURITYGROUPS_1_FROM_SECURITYGROUPS_TITLE',
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

?>