<?php
$viewdefs ['Opportunities'] = 
array (
  'EditView' => 
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
      'syncDetailEditViews' => false,
      'form' => 
      array (
        'enctype' => 'multipart/form-data',
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
            'name' => 'name',
          ),
          1 => 'account_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
            'label' => 'LBL_CURRENCY',
          ),
          1 => 
          array (
            'name' => 'date_closed',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'amount',
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
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
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
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'arch_architects_contacts_opportunities_1_name',
            'displayParams' => 
            array (
              'required' => true,
              'initial_filter' => '&arch_architectural_firm_arch_architects_contacts_1_name_advanced="+encodeURIComponent(document.getElementById("arch_architectural_firm_opportunities_1_name").value)+"',
            ),
          ),
          1 => 'description',
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
          0 => 'assigned_user_name',
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
