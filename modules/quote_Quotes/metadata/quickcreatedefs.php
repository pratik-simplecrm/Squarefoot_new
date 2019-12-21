<?php
// created: 2016-08-09 21:52:13
$viewdefs['quote_Quotes']['QuickCreate'] = array (
  'templateMeta' => 
  array (
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
        0 => 
        array (
          'name' => 'quote_quotes_number',
          'type' => 'readonly',
        ),
        1 => 'assigned_user_name',
      ),
      1 => 
      array (
        0 => 'priority',
      ),
      2 => 
      array (
        0 => 'status',
        1 => 'resolution',
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'name',
          'displayParams' => 
          array (
            'size' => 60,
          ),
        ),
      ),
      4 => 
      array (
        0 => 'description',
      ),
    ),
  ),
);