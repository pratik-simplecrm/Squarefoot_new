<?php
// created: 2016-07-08 17:32:17
$viewdefs = array (
  'Opportunities' => 
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
          'LBL_EDITVIEW_PANEL1' => 
          array (
            'newTab' => false,
            'panelDefault' => 'expanded',
          ),
        ),
        'syncDetailEditViews' => true,
      ),
      'panels' => 
      array (
        'default' => 
        array (
          0 => 
          array (
            0 => 'name',
            1 => 'account_name',
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'currency_id',
              'comment' => 'Currency used for display purposes',
              'label' => 'LBL_CURRENCY',
            ),
            1 => 'date_closed',
          ),
          2 => 
          array (
            0 => 
            array (
              'name' => 'amount',
              'label' => '{$MOD.LBL_AMOUNT} ({$CURRENCY})',
            ),
            1 => 'opportunity_type',
          ),
          3 => 
          array (
            0 => 'sales_stage',
            1 => 
            array (
              'name' => 'flooring_type_c',
              'studio' => 'visible',
              'label' => 'LBL_FLOORING_TYPE',
            ),
          ),
          4 => 
          array (
            0 => 'lead_source',
            1 => 'campaign_name',
          ),
          5 => 
          array (
            0 => 'probability',
            1 => 'next_step',
          ),
          6 => 
          array (
            0 => 
            array (
              'name' => 'arch_architectural_firm_opportunities_1_name',
            ),
            1 => 
            array (
              'name' => 'arch_architects_contacts_opportunities_1_name',
              'label' => 'LBL_ARCH_ARCHITECTS_CONTACTS_OPPORTUNITIES_1_FROM_ARCH_ARCHITECTS_CONTACTS_TITLE',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'name' => 'description',
              'nl2br' => true,
            ),
            1 => 
            array (
              'name' => 'last_contacted_date_c',
              'label' => 'LBL_LAST_CONTACTED_DATE',
            ),
          ),
        ),
        'lbl_editview_panel1' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'assigned_user_name',
              'label' => 'LBL_ASSIGNED_TO',
            ),
            1 => 
            array (
              'name' => 'team_name',
              'studio' => 'visible',
              'label' => 'LBL_TEAM_NAME',
            ),
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'date_entered',
              'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            ),
            1 => 
            array (
              'name' => 'date_modified',
              'label' => 'LBL_DATE_MODIFIED',
              'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            ),
          ),
        ),
      ),
    ),
  ),
);