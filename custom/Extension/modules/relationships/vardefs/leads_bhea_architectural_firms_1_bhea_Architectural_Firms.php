<?php
// created: 2014-06-23 13:06:17
$dictionary["bhea_Architectural_Firms"]["fields"]["leads_bhea_architectural_firms_1"] = array (
  'name' => 'leads_bhea_architectural_firms_1',
  'type' => 'link',
  'relationship' => 'leads_bhea_architectural_firms_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_LEADS_BHEA_ARCHITECTURAL_FIRMS_1_FROM_LEADS_TITLE',
  'id_name' => 'leads_bhea_architectural_firms_1leads_ida',
);
$dictionary["bhea_Architectural_Firms"]["fields"]["leads_bhea_architectural_firms_1_name"] = array (
  'name' => 'leads_bhea_architectural_firms_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_BHEA_ARCHITECTURAL_FIRMS_1_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_bhea_architectural_firms_1leads_ida',
  'link' => 'leads_bhea_architectural_firms_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["bhea_Architectural_Firms"]["fields"]["leads_bhea_architectural_firms_1leads_ida"] = array (
  'name' => 'leads_bhea_architectural_firms_1leads_ida',
  'type' => 'link',
  'relationship' => 'leads_bhea_architectural_firms_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LEADS_BHEA_ARCHITECTURAL_FIRMS_1_FROM_BHEA_ARCHITECTURAL_FIRMS_TITLE',
);
