<?php
// created: 2019-12-13 09:32:22
$dictionary["simpl_Feed_Back_Form"]["fields"]["cases_simpl_feed_back_form_1"] = array (
  'name' => 'cases_simpl_feed_back_form_1',
  'type' => 'link',
  'relationship' => 'cases_simpl_feed_back_form_1',
  'source' => 'non-db',
  'module' => 'Cases',
  'bean_name' => 'Case',
  'vname' => 'LBL_CASES_SIMPL_FEED_BACK_FORM_1_FROM_CASES_TITLE',
  'id_name' => 'cases_simpl_feed_back_form_1cases_ida',
);
$dictionary["simpl_Feed_Back_Form"]["fields"]["cases_simpl_feed_back_form_1_name"] = array (
  'name' => 'cases_simpl_feed_back_form_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CASES_SIMPL_FEED_BACK_FORM_1_FROM_CASES_TITLE',
  'save' => true,
  'id_name' => 'cases_simpl_feed_back_form_1cases_ida',
  'link' => 'cases_simpl_feed_back_form_1',
  'table' => 'cases',
  'module' => 'Cases',
  'rname' => 'name',
);
$dictionary["simpl_Feed_Back_Form"]["fields"]["cases_simpl_feed_back_form_1cases_ida"] = array (
  'name' => 'cases_simpl_feed_back_form_1cases_ida',
  'type' => 'link',
  'relationship' => 'cases_simpl_feed_back_form_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CASES_SIMPL_FEED_BACK_FORM_1_FROM_SIMPL_FEED_BACK_FORM_TITLE',
);
