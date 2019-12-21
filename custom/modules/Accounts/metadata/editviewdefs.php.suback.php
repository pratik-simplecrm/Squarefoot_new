<?php
$viewdefs ['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 
          array (
            'customCode' => '<input type="submit" value="Save" name="button" onclick="this.form.action.value=\'Save\'; if(  check_form(\'EditView\') && check())return true;else return false;" class="button primary" accesskey="S" title="Save [Alt+S]">',
          ),
          1 => 'CANCEL',
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
        1 => 
        array (
          'file' => 'custom/modules/Accounts/check.js',
        ),
      ),
      'useTabs' => true,
      'tabDefs' => 
      array (
        'LBL_ACCOUNT_INFORMATION' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EVENT_FACILITATOR_CO' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EVENT_VENUE' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EVENT_CATERER' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'customer_id_c',
            'label' => 'LBL_CUSTOMER_ID',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'phone_office',
            'label' => 'LBL_PHONE_OFFICE',
          ),
          1 => 
          array (
            'name' => 'phone_fax',
            'label' => 'LBL_FAX',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'website',
            'type' => 'link',
            'label' => 'LBL_WEBSITE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          1 => 
          array (
            'name' => 'shipping_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
              'copy' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 'annual_revenue',
          1 => 'parent_name',
        ),
        1 => 
        array (
          0 => 'account_type',
          1 => 
          array (
            'name' => 'campaign_c',
            'studio' => 'visible',
            'label' => 'LBL_CAMPAIGN',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'educational_institution_c',
            'label' => 'LBL_EDUCATIONAL_INSTITUTION',
          ),
          1 => 
          array (
            'name' => 'pharmaceutical_c',
            'label' => 'LBL_PHARMACEUTICAL',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'hospital_c',
            'label' => 'LBL_HOSPITAL',
          ),
          1 => 
          array (
            'name' => 'builder_c',
            'label' => 'LBL_BUILDER',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'contractor_c',
            'label' => 'LBL_CONTRACTOR',
          ),
          1 => 
          array (
            'name' => 'hotel_c',
            'label' => 'LBL_HOTEL',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'retail_c',
            'label' => 'LBL_RETAIL',
          ),
          1 => 
          array (
            'name' => 'sports_c',
            'label' => 'LBL_SPORTS',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'others_c',
            'label' => 'LBL_OTHERS',
          ),
        ),
        7 => 
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
      ),
      'LBL_EVENT_FACILITATOR_CO' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'fac_rating_c',
            'studio' => 'visible',
            'label' => 'LBL_FAC_RATING',
          ),
          1 => 
          array (
            'name' => 'fac_contract_status_c',
            'label' => 'LBL_FAC_CONTRACT_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'facilitate_c',
            'label' => 'LBL_FACILITATE',
          ),
          1 => 
          array (
            'name' => 'facilitate_fees_c',
            'label' => 'LBL_FACILITATE_FEES',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'consult_c',
            'label' => 'LBL_CONSULT',
          ),
          1 => 
          array (
            'name' => 'consult_fees_c',
            'label' => 'LBL_CONSULT_FEES',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'implement_c',
            'label' => 'LBL_IMPLEMENT',
          ),
          1 => 
          array (
            'name' => 'implement_fees_c',
            'label' => 'LBL_IMPLEMENT_FEES',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'own_facil_c',
            'label' => 'LBL_OWN_FACIL',
          ),
          1 => 
          array (
            'name' => 'fac_rent_fees_c',
            'label' => 'LBL_FAC_RENT_FEES',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'travel_reimb_c',
            'label' => 'LBL_TRAVEL_REIMB',
          ),
          1 => 
          array (
            'name' => 'travel_fees_c',
            'label' => 'LBL_TRAVEL_FEES',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'reference1_c',
            'label' => 'LBL_REFERENCE1',
          ),
          1 => 
          array (
            'name' => 'reference1_comments_c',
            'label' => 'LBL_REFERENCE1_COMMENTS',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'reference2_c',
            'label' => 'LBL_REFERENCE2',
          ),
          1 => 
          array (
            'name' => 'reference2_comments_c',
            'label' => 'LBL_REFERENCE2_COMMENTS',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'reference3_c',
            'label' => 'LBL_REFERENCE3',
          ),
          1 => 
          array (
            'name' => 'reference3_comments_c',
            'label' => 'LBL_REFERENCE3_COMMENTS',
          ),
        ),
      ),
      'LBL_EVENT_VENUE' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'venue_rating_c',
            'label' => 'LBL_VENUE_RATING',
          ),
          1 => 
          array (
            'name' => 'ven_contract_status_c',
            'label' => 'LBL_VEN_CONTRACT_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'venue_type_c',
            'label' => 'LBL_VENUE_TYPE',
          ),
          1 => 
          array (
            'name' => 'venue_restrictions_c',
            'label' => 'LBL_VENUE_RESTRICTIONS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'will_book_block_c',
            'label' => 'LBL_WILL_BOOK_BLOCK',
          ),
          1 => 
          array (
            'name' => 'num_guest_rooms_c',
            'label' => 'LBL_NUM_GUEST_ROOMS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'corporate_rate_avail_c',
            'label' => 'LBL_CORPORATE_RATE_AVAIL',
          ),
          1 => 
          array (
            'name' => 'corporate_rate_value_c',
            'label' => 'LBL_CORPORATE_RATE_VALUE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'reqd_deposit_c',
            'label' => 'LBL_REQD_DEPOSIT',
          ),
          1 => 
          array (
            'name' => 'deposit_fees_c',
            'label' => 'LBL_DEPOSIT_FEES',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'parking_avail_c',
            'label' => 'LBL_PARKING_AVAIL',
          ),
          1 => 
          array (
            'name' => 'parking_fees_c',
            'label' => 'LBL_PARKING_FEES',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'av_avail_c',
            'label' => 'LBL_AV_AVAIL',
          ),
          1 => 
          array (
            'name' => 'av_fees_c',
            'label' => 'LBL_AV_FEES',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'exclusive_av_c',
            'label' => 'LBL_EXCLUSIVE_AV',
          ),
          1 => 
          array (
            'name' => 'av_contact_c',
            'label' => 'LBL_AV_CONTACT',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'flip_charts_c',
            'label' => 'LBL_FLIP_CHARTS',
          ),
          1 => 
          array (
            'name' => 'flip_chart_fees_c',
            'label' => 'LBL_FLIP_CHART_FEES',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'internet_avail_c',
            'label' => 'LBL_INTERNET_AVAIL',
          ),
          1 => 
          array (
            'name' => 'internet_fees_c',
            'label' => 'LBL_INTERNET_FEES',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'receiving_dock_c',
            'label' => 'LBL_RECEIVING_DOCK',
          ),
          1 => 
          array (
            'name' => 'receiving_fees_c',
            'label' => 'LBL_RECEIVING_FEES',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'refund_fees_c',
            'label' => 'LBL_REFUND_FEES',
          ),
          1 => 
          array (
            'name' => 'other_fees_c',
            'label' => 'LBL_OTHER_FEES',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'reception_area_c',
            'label' => 'LBL_RECEPTION_AREA',
          ),
          1 => 
          array (
            'name' => 'regn_area_c',
            'label' => 'LBL_REGN_AREA',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'dining_room_c',
            'label' => 'LBL_DINING_ROOM',
          ),
          1 => 
          array (
            'name' => 'exclusive_caterer_c',
            'label' => 'LBL_EXCLUSIVE_CATERER',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'meeting_rooms_c',
            'label' => 'LBL_MEETING_ROOMS',
          ),
          1 => 
          array (
            'name' => 'theatre_c',
            'label' => 'LBL_THEATRE',
          ),
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'stages_allowed_c',
            'label' => 'LBL_STAGES_ALLOWED',
          ),
          1 => 
          array (
            'name' => 'venue_comments_c',
            'label' => 'LBL_VENUE_COMMENTS',
          ),
        ),
      ),
      'LBL_EVENT_CATERER' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'caterer_rating_c',
            'label' => 'LBL_CATERER_RATING',
          ),
          1 => 
          array (
            'name' => 'cat_contract_status_c',
            'label' => 'LBL_CAT_CONTRACT_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'food_specialty_c',
            'label' => 'LBL_FOOD_SPECIALTY',
          ),
          1 => 
          array (
            'name' => 'caterer_restrictions_c',
            'label' => 'LBL_CATERER_RESTRICTIONS',
          ),
        ),
      ),
    ),
  ),
);
?>
