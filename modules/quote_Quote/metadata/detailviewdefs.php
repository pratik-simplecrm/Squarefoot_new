<?php
$module_name = 'quote_Quote';
$_object_name = 'quote_quote';
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
          3 => 'FIND_DUPLICATES',
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
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'quote_quote_number',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 'name',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'quotation_date',
            'label' => 'LBL_QUOTATION_DATE',
          ),
          1 => 'status',
        ),
        3 => 
        array (
          0 => 'priority',
          1 => 
          array (
            'name' => 'quotation_category',
            'studio' => 'visible',
            'label' => 'LBL_QUOTATION_CATEGORY',
          ),
        ),
        4 => 
        array (
          0 => 'description',
        ),
        5 => 
        array (
          0 => 'work_log',
          1 => 
          array (
            'name' => 'quote_quote_accounts_name',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'quote_quote_leads_name',
          ),
          1 => 
          array (
            'name' => 'quote_quote_opportunities_name',
          ),
        ),
      ),
    ),
  ),
);
?>
