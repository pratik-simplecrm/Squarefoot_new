<?php
$module_name = 'quote_Quotes';
$_object_name = 'quote_quotes';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'quote_type' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_QUOTE_TYPE',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'quote_type',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'sales_quote_no' => 
      array (
        'type' => 'int',
        'label' => 'LBL_SALES_QUOTE_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'sales_quote_no',
      ),
      'service_quotes_no' => 
      array (
        'type' => 'int',
        'label' => 'LBL_SERVICE_QUOTES_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'service_quotes_no',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'quote_type' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_QUOTE_TYPE',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'quote_type',
      ),
      'resolution' => 
      array (
        'name' => 'resolution',
        'default' => true,
        'width' => '10%',
      ),
      'status' => 
      array (
        'name' => 'status',
        'default' => true,
        'width' => '10%',
      ),
      'priority' => 
      array (
        'name' => 'priority',
        'default' => true,
        'width' => '10%',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'type' => 'enum',
        'label' => 'LBL_ASSIGNED_TO',
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
