<?php
// created: 2016-08-09 22:55:42
$dictionary["simpl_Feed_Back_Form"]["fields"]["opportunities_simpl_feed_back_form_1"] = array (
  'name' => 'opportunities_simpl_feed_back_form_1',
  'type' => 'link',
  'relationship' => 'opportunities_simpl_feed_back_form_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_OPPORTUNITIES_SIMPL_FEED_BACK_FORM_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'opportunities_simpl_feed_back_form_1opportunities_ida',
);
$dictionary["simpl_Feed_Back_Form"]["fields"]["opportunities_simpl_feed_back_form_1_name"] = array (
  'name' => 'opportunities_simpl_feed_back_form_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_SIMPL_FEED_BACK_FORM_1_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'opportunities_simpl_feed_back_form_1opportunities_ida',
  'link' => 'opportunities_simpl_feed_back_form_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["simpl_Feed_Back_Form"]["fields"]["opportunities_simpl_feed_back_form_1opportunities_ida"] = array (
  'name' => 'opportunities_simpl_feed_back_form_1opportunities_ida',
  'type' => 'link',
  'relationship' => 'opportunities_simpl_feed_back_form_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_SIMPL_FEED_BACK_FORM_1_FROM_SIMPL_FEED_BACK_FORM_TITLE',
);
