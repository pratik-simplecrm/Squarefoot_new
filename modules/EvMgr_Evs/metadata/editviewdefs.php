<?php
$module_name = 'EvMgr_Evs';
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
        'LBL_EDITVIEW_PANEL2' => 
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
          1 => 
          array (
            'name' => 'evmgr_evs_opportunities_name',
            'label' => 'LBL_EVMGR_EVS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'event_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'start_date',
            'label' => 'LBL_START_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'event_status',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_STATUS',
          ),
          1 => 
          array (
            'name' => 'end_date',
            'label' => 'LBL_END_DATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'pre_material_required',
            'label' => 'LBL_PRE_MATERIAL_REQUIRED',
          ),
          1 => 
          array (
            'name' => 'num_invited',
            'label' => 'LBL_NUM_INVITED',
            'type' => 'readonly',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'accomodations_required',
            'label' => 'LBL_ACCOMODATIONS_REQUIRED',
          ),
          1 => 
          array (
            'name' => 'num_confirmed',
            'label' => 'LBL_NUM_CONFIRMED',
            'type' => 'readonly',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'fire_alarm_schedule_checked',
            'label' => 'LBL_FIRE_ALARM_SCHEDULE_CHECKED',
          ),
          1 => 
          array (
            'name' => 'num_nevershowed',
            'label' => 'LBL_NUM_NEVERSHOWED',
            'type' => 'readonly',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'ce_hours_credit',
            'label' => 'LBL_CE_HOURS_CREDIT',
          ),
          1 => 
          array (
            'name' => 'num_participated',
            'label' => 'LBL_NUM_PARTICIPATED',
            'type' => 'readonly',
          ),
        ),
        7 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'num_graduated',
            'label' => 'LBL_NUM_GRADUATED',
            'type' => 'readonly',
          ),
        ),
        8 => 
        array (
          0 => 'description',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'post_event_commentary',
            'studio' => 'visible',
            'label' => 'LBL_POST_EVENT_COMMENTARY',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'customer_contract',
            'studio' => 'visible',
            'label' => 'LBL_CUSTOMER_CONTRACT',
          ),
          1 => 
          array (
            'name' => 'material_produced',
            'studio' => 'visible',
            'label' => 'LBL_MATERIAL_PRODUCED',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'facilitator_contract',
            'studio' => 'visible',
            'label' => 'LBL_FACILITATOR_CONTRACT',
          ),
          1 => 
          array (
            'name' => 'marketing_started',
            'studio' => 'visible',
            'label' => 'LBL_MARKETING_STARTED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'venue_contract',
            'studio' => 'visible',
            'label' => 'LBL_VENUE_CONTRACT',
          ),
          1 => 
          array (
            'name' => 'travel_and_accom',
            'studio' => 'visible',
            'label' => 'LBL_TRAVEL_AND_ACCOM',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'caterer_contract',
            'studio' => 'visible',
            'label' => 'LBL_CATERER_CONTRACT',
          ),
          1 => 
          array (
            'name' => 'pre_event_mailing_sent',
            'studio' => 'visible',
            'label' => 'LBL_PRE_EVENT_MAILING_SENT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'accommodations_contract',
            'studio' => 'visible',
            'label' => 'LBL_ACCOMMODATIONS_CONTRACT',
          ),
          1 => 
          array (
            'name' => 'attendee_status_updated',
            'studio' => 'visible',
            'label' => 'LBL_ATTENDEE_STATUS_UPDATED',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'program_designed',
            'studio' => 'visible',
            'label' => 'LBL_PROGRAM_DESIGNED',
          ),
          1 => 
          array (
            'name' => 'eval_scores_reported',
            'studio' => 'visible',
            'label' => 'LBL_EVAL_SCORES_REPORTED',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'insurance_certificate_obtained',
            'studio' => 'visible',
            'label' => 'LBL_INSURANCE_CERTIFICATE_OBTAINED',
          ),
          1 => 
          array (
            'name' => 'post_event_mailing_sent',
            'studio' => 'visible',
            'label' => 'LBL_POST_EVENT_MAILING_SENT',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'budget_total',
            'label' => 'LBL_BUDGET_TOTAL',
            'type' => 'readonly',
          ),
          1 => 
          array (
            'name' => 'actual_cost_total',
            'label' => 'LBL_ACTUAL_COST_TOTAL',
            'type' => 'readonly',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'budget_facilitator',
            'label' => 'LBL_BUDGET_FACILITATOR',
          ),
          1 => 
          array (
            'name' => 'actual_cost_facilitator',
            'label' => 'LBL_ACTUAL_COST_FACILITATOR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'budget_venue',
            'label' => 'LBL_BUDGET_VENUE',
          ),
          1 => 
          array (
            'name' => 'actual_cost_venue',
            'label' => 'LBL_ACTUAL_COST_VENUE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'budget_caterer',
            'label' => 'LBL_BUDGET_CATERER',
          ),
          1 => 
          array (
            'name' => 'actual_cost_caterer',
            'label' => 'LBL_ACTUAL_COST_CATERER',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'budget_material',
            'label' => 'LBL_BUDGET_MATERIAL',
          ),
          1 => 
          array (
            'name' => 'actual_cost_material',
            'label' => 'LBL_ACTUAL_COST_MATERIAL',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'budget_other',
            'label' => 'LBL_BUDGET_OTHER',
          ),
          1 => 
          array (
            'name' => 'actual_cost_other',
            'label' => 'LBL_ACTUAL_COST_OTHER',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'facilitator_fees',
            'studio' => 'visible',
            'label' => 'LBL_FACILITATOR_FEES',
          ),
        ),
      ),
    ),
  ),
);
?>
