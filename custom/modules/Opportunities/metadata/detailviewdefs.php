<?php
$viewdefs ['Opportunities'] = 
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
          4 => 
          array (
            'customCode' => '<input id="installation_btn" title="Installation Completed" class="button" onclick="this.form.return_module.value=\'Opportunities\';this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\';this.form.action.value=\'send_closed_email\'; this.form.module.value=\'Opportunities\';" name="button" value="Installation Completed" type="submit" />',
          ),
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => true,
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
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'upload_documents_c',
            'studio' => 'visible',
            'label' => 'LBL_UPLOAD_DOCUMENTS',
          ),
          1 => 
          array (
            'name' => 'filename',
            'comment' => 'File name associated with the note (attachment)',
            'label' => 'LBL_FILENAME',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
          ),
        ),
        6 => 
        array (
          0 => 'probability',
          1 => 
          array (
            'name' => 'closure_date_c',
            'label' => 'LBL_CLOSURE_DATE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'flooring_type_c',
            'studio' => 'visible',
            'label' => 'LBL_FLOORING_TYPE',
          ),
          1 => 
          array (
            'name' => 'arch_architectural_firm_opportunities_1_name',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'arch_architects_contacts_opportunities_1_name',
            'label' => 'LBL_ARCH_ARCHITECTS_CONTACTS_OPPORTUNITIES_1_FROM_ARCH_ARCHITECTS_CONTACTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'description',
            'nl2br' => true,
          ),
        ),
        9 => 
        array (
          0 => 'campaign_name',
          1 => 
          array (
            'name' => 'actual_date_closed_c',
            'label' => 'LBL_ACTUAL_DATE_CLOSED',
          ),
        ),
        10 => 
        array (
          0 => 'lead_source',
          1 => 
          array (
            'name' => 'jjwg_maps_lat_c',
            'label' => 'LBL_JJWG_MAPS_LAT',
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
            'name' => 'acyualcloseddate_c',
            'label' => 'LBL_ACYUALCLOSEDDATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'jjwg_maps_geocode_status_c',
            'label' => 'LBL_JJWG_MAPS_GEOCODE_STATUS',
          ),
        ),
      ),
    ),
  ),
);
?>
