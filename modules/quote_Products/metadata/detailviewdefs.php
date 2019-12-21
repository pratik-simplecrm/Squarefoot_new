<?php
$module_name = 'quote_Products';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'prod_manufacturer_c',
            'studio' => 'visible',
            'label' => 'Manufacturer',
          ),
          1 => 
          array (
            'name' => 'quote_product_category_quote_products_name',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'prod_spec_c',
            'studio' => 'visible',
            'label' => 'Product Specifications',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'product_price_c',
            'label' => 'LBL_PRODUCT_PRICE_C',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        5 => 
        array (
          0 => '',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
