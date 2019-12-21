<?php
// created: 2019-12-04 10:12:48
$dictionary["Case"]["fields"]["meetings_cases_1"] = array (
  'name' => 'meetings_cases_1',
  'type' => 'link',
  'relationship' => 'meetings_cases_1',
  'source' => 'non-db',
  'module' => 'Meetings',
  'bean_name' => 'Meeting',
  'vname' => 'LBL_MEETINGS_CASES_1_FROM_MEETINGS_TITLE',
  'id_name' => 'meetings_cases_1meetings_ida',
);
$dictionary["Case"]["fields"]["meetings_cases_1_name"] = array (
  'name' => 'meetings_cases_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_MEETINGS_CASES_1_FROM_MEETINGS_TITLE',
  'save' => true,
  'id_name' => 'meetings_cases_1meetings_ida',
  'link' => 'meetings_cases_1',
  'table' => 'meetings',
  'module' => 'Meetings',
  'rname' => 'name',
);
$dictionary["Case"]["fields"]["meetings_cases_1meetings_ida"] = array (
  'name' => 'meetings_cases_1meetings_ida',
  'type' => 'link',
  'relationship' => 'meetings_cases_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_MEETINGS_CASES_1_FROM_CASES_TITLE',
);
