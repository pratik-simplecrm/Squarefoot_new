<?php
$viewdefs ['Cases'] = 
array (
  'QuickCreate' => 
  array (
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
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'casetype_c',
            'studio' => 'visible',
            'label' => 'LBL_CASETYPE',
          ),
          1 => 
          array (
            'name' => 'servicetype_c',
            'studio' => 'visible',
            'label' => 'LBL_SERVICETYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'issuecategory_c',
            'studio' => 'visible',
            'label' => 'LBL_ISSUECATEGORY',
          ),
          1 => 
          array (
            'name' => 'issuesubcategory_c',
            'studio' => 'visible',
            'label' => 'LBL_ISSUESUBCATEGORY',
          ),
        ),
      ),
    ),
  ),
);
?>
