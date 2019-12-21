<?php
// created: 2014-04-09 07:49:21
$dictionary["Lead"]["fields"]["bhea_archi_architects_contact_leads_1"] = array (
  'name' => 'bhea_archi_architects_contact_leads_1',
  'type' => 'link',
  'relationship' => 'bhea_archi_architects_contact_leads_1',
  'source' => 'non-db',
  'module' => 'bhea_Archi_Architects_Contact',
  'bean_name' => 'bhea_Archi_Architects_Contact',
  'vname' => 'LBL_BHEA_ARCHI_ARCHITECTS_CONTACT_LEADS_1_FROM_BHEA_ARCHI_ARCHITECTS_CONTACT_TITLE',
  'id_name' => 'bhea_archi849econtact_ida',
);
$dictionary["Lead"]["fields"]["bhea_archi_architects_contact_leads_1_name"] = array (
  'name' => 'bhea_archi_architects_contact_leads_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_BHEA_ARCHI_ARCHITECTS_CONTACT_LEADS_1_FROM_BHEA_ARCHI_ARCHITECTS_CONTACT_TITLE',
  'save' => true,
  'id_name' => 'bhea_archi849econtact_ida',
  'link' => 'bhea_archi_architects_contact_leads_1',
  'table' => 'bhea_archi_architects_contact',
  'module' => 'bhea_Archi_Architects_Contact',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Lead"]["fields"]["bhea_archi849econtact_ida"] = array (
  'name' => 'bhea_archi849econtact_ida',
  'type' => 'link',
  'relationship' => 'bhea_archi_architects_contact_leads_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_BHEA_ARCHI_ARCHITECTS_CONTACT_LEADS_1_FROM_LEADS_TITLE',
);
