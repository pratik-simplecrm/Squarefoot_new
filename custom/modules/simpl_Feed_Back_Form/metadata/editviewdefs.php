<?php
$module_name = 'simpl_Feed_Back_Form';
$viewdefs [$module_name] = 
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
          0 => 
          array (
            'name' => 'q1_c',
            'studio' => 'visible',
            'label' => 'LBL_Q1',
          ),
          1 => 
          array (
            'name' => 'q2_c',
            'studio' => 'visible',
            'label' => 'LBL_Q2',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'q3_c',
            'label' => 'LBL_Q3',
          ),
          1 => 
          array (
            'name' => 'q4_c',
            'label' => 'LBL_Q4',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'q5_c',
            'label' => 'LBL_Q5',
          ),
          1 => 
          array (
            'name' => 'q6_c',
            'label' => 'LBL_Q6',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'q7_c',
            'label' => 'LBL_Q7',
          ),
        ),
        4 => 
        array (
          0 => 'description',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'date_entered_c',
            'label' => 'LBL_DATE_ENTERED_C',
          ),
          1 => 
          array (
            'name' => 'opportunities_simpl_feed_back_form_1_name',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'cases_simpl_feed_back_form_1_name',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
        ),
      ),
    ),
  ),
);
?>
