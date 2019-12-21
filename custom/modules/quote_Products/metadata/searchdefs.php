<?php
$module_name = 'quote_Products';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'type_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'name' => 'type_c',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
      'quote_product_category_quote_products_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTS_FROM_QUOTE_PRODUCT_CATEGORY_TITLE',
        'id' => 'QUOTE_PRODUCT_CATEGORY_QUOTE_PRODUCTSQUOTE_PRODUCT_CATEGORY_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'quote_product_category_quote_products_name',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'is_dutyfree_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_IS_DUTYFREE',
        'width' => '10%',
        'name' => 'is_dutyfree_c',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
