<?php
// created: 2014-07-02 11:35:11
$dictionary["Arch_Architects_Contacts"]["fields"]["arch_architectural_firm_arch_architects_contacts_1"] = array (
  'name' => 'arch_architectural_firm_arch_architects_contacts_1',
  'type' => 'link',
  'relationship' => 'arch_architectural_firm_arch_architects_contacts_1',
  'source' => 'non-db',
  'module' => 'Arch_Architectural_Firm',
  'bean_name' => 'Arch_Architectural_Firm',
  'vname' => 'LBL_ARCH_ARCHITECTURAL_FIRM_ARCH_ARCHITECTS_CONTACTS_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE',
  'id_name' => 'arch_archieaacal_firm_ida',
);
$dictionary["Arch_Architects_Contacts"]["fields"]["arch_architectural_firm_arch_architects_contacts_1_name"] = array (
  'name' => 'arch_architectural_firm_arch_architects_contacts_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ARCH_ARCHITECTURAL_FIRM_ARCH_ARCHITECTS_CONTACTS_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE',
  'save' => true,
  'id_name' => 'arch_archieaacal_firm_ida',
  'link' => 'arch_architectural_firm_arch_architects_contacts_1',
  'table' => 'arch_architectural_firm',
  'module' => 'Arch_Architectural_Firm',
  'rname' => 'name',
);
$dictionary["Arch_Architects_Contacts"]["fields"]["arch_archieaacal_firm_ida"] = array (
  'name' => 'arch_archieaacal_firm_ida',
  'type' => 'link',
  'relationship' => 'arch_architectural_firm_arch_architects_contacts_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ARCH_ARCHITECTURAL_FIRM_ARCH_ARCHITECTS_CONTACTS_1_FROM_ARCH_ARCHITECTS_CONTACTS_TITLE',
);
