<?php
$viewdefs ['Cases'] = 
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
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_CASE_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'displayParams' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'case_number',
            'type' => 'readonly',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'startdate_c',
            'label' => 'LBL_STARTDATE',
          ),
          1 => 
          array (
            'name' => 'region_c',
            'studio' => 'visible',
            'label' => 'LBL_REGION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'casetype_c',
            'studio' => 'visible',
            'label' => 'LBL_CASETYPE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'doc_uploaded_c',
            'studio' => 'visible',
            'label' => 'LBL_DOC_UPLOADED',
          ),
          1 => 
          array (
            'name' => 'reasonofreschedule_c',
            'studio' => 'visible',
            'label' => 'LBL_REASONOFRESCHEDULE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'state',
            'comment' => 'The state of the case (i.e. open/closed)',
            'label' => 'LBL_STATE',
          ),
          1 => 
          array (
            'name' => 'reasonforreschedule_c',
            'studio' => 'visible',
            'label' => 'LBL_REASONFORRESCHEDULE',
          ),
        ),
        5 => 
        array (
          0 => 'status',
          1 => 
          array (
            'name' => 'devsummary_c',
            'studio' => 'visible',
            'label' => 'LBL_DEVSUMMARY',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'exmatrtn_c',
            'label' => 'LBL_EXMATRTN',
          ),
          1 => 
          array (
            'name' => 'cnr_c',
            'label' => 'LBL_CNR',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'materialreturndescription_c',
            'studio' => 'visible',
            'label' => 'LBL_MATERIALRETURNDESCRIPTION',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'servicetype_c',
            'studio' => 'visible',
            'label' => 'LBL_SERVICETYPE',
          ),
        ),
        9 => 
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
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 'account_name',
          1 => 
          array (
            'name' => 'opportunities_cases_1_name',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'salesperson_c',
            'studio' => 'visible',
            'label' => 'LBL_SALESPERSON',
            'displayParams' => 
            array (
              'initial_filter' => '&title_advanced=%sales&branch_c_advanced[]="+document.getElementById("region_c").value+"',
            ),
          ),
          1 => 
          array (
            'name' => 'supervisor_c',
            'studio' => 'visible',
            'label' => 'LBL_SUPERVISOR',
            'displayParams' => 
            array (
              'initial_filter' => '&branch_c_advanced[]="+document.getElementById("region_c").value+"',
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'contractor_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTRACTOR',
            'displayParams' => 
            array (
              'initial_filter' => '&branch_c_advanced[]="+document.getElementById("region_c").value+"',
            ),
          ),
          1 => 
          array (
            'name' => 'installers_c',
            'studio' => 'visible',
            'label' => 'LBL_INSTALLERS',
          ),
        ),
        3 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'salescoordinator_c',
            'studio' => 'visible',
            'label' => 'LBL_SALESCOORDINATOR',
            'displayParams' => 
            array (
              'initial_filter' => '&title_advanced=Sales – Coordinator&branch_c_advanced[]="+document.getElementById("region_c").value+"',
            ),
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'warehouse_person_c',
            'studio' => 'visible',
            'label' => 'LBL_WAREHOUSE_PERSON',
            'displayParams' => 
            array (
              'initial_filter' => '&branch_c_advanced[]="+document.getElementById("region_c").value+"',
            ),
          ),
          1 => 
          array (
            'name' => 'accountperson_c',
            'studio' => 'visible',
            'label' => 'LBL_ACCOUNTPERSON',
            'displayParams' => 
            array (
              'initial_filter' => '&branch_advanced[]="+document.getElementById("region_c").value+"',
            ),
          ),
        ),
      ),
      'lbl_case_information' => 
      array (
        0 => 
        array (
          0 => 'priority',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'description',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'resolution',
            'nl2br' => true,
          ),
        ),
      ),
    ),
  ),
);
?>
