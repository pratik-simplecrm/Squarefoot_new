<?php
// created: 2014-04-01 15:34:48
$dictionary["EvMgr_EvParts"]["fields"]["evmgr_evparts_contacts"] = array (
  'name' => 'evmgr_evparts_contacts',
  'type' => 'link',
  'relationship' => 'evmgr_evparts_contacts',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_EVMGR_EVPARTS_CONTACTS_FROM_CONTACTS_TITLE',
  'id_name' => 'evmgr_evparts_contactscontacts_ida',
);
$dictionary["EvMgr_EvParts"]["fields"]["evmgr_evparts_contacts_name"] = array (
  'name' => 'evmgr_evparts_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_EVMGR_EVPARTS_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'evmgr_evparts_contactscontacts_ida',
  'link' => 'evmgr_evparts_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  'required' => true,
  'massupdate' => false,
  ),
);
$dictionary["EvMgr_EvParts"]["fields"]["evmgr_evparts_contactscontacts_ida"] = array (
  'name' => 'evmgr_evparts_contactscontacts_ida',
  'type' => 'link',
  'relationship' => 'evmgr_evparts_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_EVMGR_EVPARTS_CONTACTS_FROM_EVMGR_EVPARTS_TITLE',
);
