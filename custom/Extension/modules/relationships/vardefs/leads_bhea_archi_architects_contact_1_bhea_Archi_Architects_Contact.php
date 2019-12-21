<?php
// created: 2014-06-23 13:05:53
$dictionary["bhea_Archi_Architects_Contact"]["fields"]["leads_bhea_archi_architects_contact_1"] = array (
  'name' => 'leads_bhea_archi_architects_contact_1',
  'type' => 'link',
  'relationship' => 'leads_bhea_archi_architects_contact_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_LEADS_BHEA_ARCHI_ARCHITECTS_CONTACT_1_FROM_LEADS_TITLE',
  'id_name' => 'leads_bhea_archi_architects_contact_1leads_ida',
);
$dictionary["bhea_Archi_Architects_Contact"]["fields"]["leads_bhea_archi_architects_contact_1_name"] = array (
  'name' => 'leads_bhea_archi_architects_contact_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_BHEA_ARCHI_ARCHITECTS_CONTACT_1_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_bhea_archi_architects_contact_1leads_ida',
  'link' => 'leads_bhea_archi_architects_contact_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["bhea_Archi_Architects_Contact"]["fields"]["leads_bhea_archi_architects_contact_1leads_ida"] = array (
  'name' => 'leads_bhea_archi_architects_contact_1leads_ida',
  'type' => 'link',
  'relationship' => 'leads_bhea_archi_architects_contact_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LEADS_BHEA_ARCHI_ARCHITECTS_CONTACT_1_FROM_BHEA_ARCHI_ARCHITECTS_CONTACT_TITLE',
);
