<?php
$viewdefs ['Cases'] = 
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
      'syncDetailEditViews' => true,
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
            'label' => 'LBL_SUBJECT',
          ),
          1 => 
          array (
            'name' => 'case_number',
            'label' => 'LBL_CASE_NUMBER',
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
          0 => '',
          1 => 
          array (
            'name' => 'materialreturndescription_c',
            'studio' => 'visible',
            'label' => 'LBL_MATERIALRETURNDESCRIPTION',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'servicetype_c',
            'studio' => 'visible',
            'label' => 'LBL_SERVICETYPE',
          ),
          1 => '',
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
          ),
          1 => 
          array (
            'name' => 'supervisor_c',
            'studio' => 'visible',
            'label' => 'LBL_SUPERVISOR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'contractor_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTRACTOR',
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
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
          1 => 
          array (
            'name' => 'salescoordinator_c',
            'studio' => 'visible',
            'label' => 'LBL_SALESCOORDINATOR',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'warehouse_person_c',
            'studio' => 'visible',
            'label' => 'LBL_WAREHOUSE_PERSON',
          ),
          1 => 
          array (
            'name' => 'accountperson_c',
            'studio' => 'visible',
            'label' => 'LBL_ACCOUNTPERSON',
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
          0 => 'description',
        ),
        2 => 
        array (
          0 => 'resolution',
        ),
      ),
    ),
  ),
);
?>
