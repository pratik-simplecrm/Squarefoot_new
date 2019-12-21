<?php
$viewdefs ['Opportunities'] = 
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
      'javascript' => '{$PROBABILITY_SCRIPT}',
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
      'DEFAULT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'account_name',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
          ),
          1 => 
          array (
            'name' => 'flooring_type_c',
            'studio' => 'visible',
            'label' => 'LBL_FLOORING_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 'amount',
          1 => 'date_closed',
        ),
        3 => 
        array (
          0 => 'sales_stage',
          1 => 
          array (
            'name' => 'upload_documents_c',
            'studio' => 'visible',
            'label' => 'LBL_UPLOAD_DOCUMENTS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'filename',
            'comment' => 'File name associated with the note (attachment)',
            'label' => 'LBL_FILENAME',
          ),
          1 => 
          array (
            'name' => 'actual_date_closed_c',
            'label' => 'LBL_ACTUAL_DATE_CLOSED',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'campaign_name',
            'label' => 'LBL_CAMPAIGN',
          ),
          1 => 'probability',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
          ),
          1 => 'lead_source',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'arch_architectural_firm_opportunities_1_name',
            'label' => 'LBL_ARCH_ARCHITECTURAL_FIRM_OPPORTUNITIES_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE',
          ),
          1 => 
          array (
            'name' => 'arch_architects_contacts_opportunities_1_name',
            'label' => 'LBL_ARCH_ARCHITECTS_CONTACTS_OPPORTUNITIES_1_FROM_ARCH_ARCHITECTS_CONTACTS_TITLE',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
      ),
    ),
  ),
);
?>
