<?php
// created: 2014-07-02 11:32:53
$dictionary["Lead"]["fields"]["arch_architects_contacts_leads_1"] = array (
  'name' => 'arch_architects_contacts_leads_1',
  'type' => 'link',
  'relationship' => 'arch_architects_contacts_leads_1',
  'source' => 'non-db',
  'module' => 'Arch_Architects_Contacts',
  'bean_name' => 'Arch_Architects_Contacts',
  'vname' => 'LBL_ARCH_ARCHITECTS_CONTACTS_LEADS_1_FROM_ARCH_ARCHITECTS_CONTACTS_TITLE',
  'id_name' => 'arch_architects_contacts_leads_1arch_architects_contacts_ida',
);
$dictionary["Lead"]["fields"]["arch_architects_contacts_leads_1_name"] = array (
  'name' => 'arch_architects_contacts_leads_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ARCH_ARCHITECTS_CONTACTS_LEADS_1_FROM_ARCH_ARCHITECTS_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'arch_architects_contacts_leads_1arch_architects_contacts_ida',
  'link' => 'arch_architects_contacts_leads_1',
  'table' => 'arch_architects_contacts',
  'module' => 'Arch_Architects_Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Lead"]["fields"]["arch_architects_contacts_leads_1arch_architects_contacts_ida"] = array (
  'name' => 'arch_architects_contacts_leads_1arch_architects_contacts_ida',
  'type' => 'link',
  'relationship' => 'arch_architects_contacts_leads_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ARCH_ARCHITECTS_CONTACTS_LEADS_1_FROM_LEADS_TITLE',
);
