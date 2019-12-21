<?php
// created: 2014-04-09 07:47:53
$dictionary["Opportunity"]["fields"]["bhea_architectural_firms_opportunities_1"] = array (
  'name' => 'bhea_architectural_firms_opportunities_1',
  'type' => 'link',
  'relationship' => 'bhea_architectural_firms_opportunities_1',
  'source' => 'non-db',
  'module' => 'bhea_Architectural_Firms',
  'bean_name' => 'bhea_Architectural_Firms',
  'vname' => 'LBL_BHEA_ARCHITECTURAL_FIRMS_OPPORTUNITIES_1_FROM_BHEA_ARCHITECTURAL_FIRMS_TITLE',
  'id_name' => 'bhea_archi1ed6l_firms_ida',
);
$dictionary["Opportunity"]["fields"]["bhea_architectural_firms_opportunities_1_name"] = array (
  'name' => 'bhea_architectural_firms_opportunities_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_BHEA_ARCHITECTURAL_FIRMS_OPPORTUNITIES_1_FROM_BHEA_ARCHITECTURAL_FIRMS_TITLE',
  'save' => true,
  'id_name' => 'bhea_archi1ed6l_firms_ida',
  'link' => 'bhea_architectural_firms_opportunities_1',
  'table' => 'bhea_architectural_firms',
  'module' => 'bhea_Architectural_Firms',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Opportunity"]["fields"]["bhea_archi1ed6l_firms_ida"] = array (
  'name' => 'bhea_archi1ed6l_firms_ida',
  'type' => 'link',
  'relationship' => 'bhea_architectural_firms_opportunities_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_BHEA_ARCHITECTURAL_FIRMS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
);
