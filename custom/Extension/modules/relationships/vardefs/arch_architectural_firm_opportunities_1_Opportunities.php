<?php
// created: 2014-07-02 11:34:09
$dictionary["Opportunity"]["fields"]["arch_architectural_firm_opportunities_1"] = array (
  'name' => 'arch_architectural_firm_opportunities_1',
  'type' => 'link',
  'relationship' => 'arch_architectural_firm_opportunities_1',
  'source' => 'non-db',
  'module' => 'Arch_Architectural_Firm',
  'bean_name' => 'Arch_Architectural_Firm',
  'vname' => 'LBL_ARCH_ARCHITECTURAL_FIRM_OPPORTUNITIES_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE',
  'id_name' => 'arch_archi003bal_firm_ida',
);
$dictionary["Opportunity"]["fields"]["arch_architectural_firm_opportunities_1_name"] = array (
  'name' => 'arch_architectural_firm_opportunities_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ARCH_ARCHITECTURAL_FIRM_OPPORTUNITIES_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE',
  'save' => true,
  'id_name' => 'arch_archi003bal_firm_ida',
  'link' => 'arch_architectural_firm_opportunities_1',
  'table' => 'arch_architectural_firm',
  'module' => 'Arch_Architectural_Firm',
  'rname' => 'name',
);
$dictionary["Opportunity"]["fields"]["arch_archi003bal_firm_ida"] = array (
  'name' => 'arch_archi003bal_firm_ida',
  'type' => 'link',
  'relationship' => 'arch_architectural_firm_opportunities_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ARCH_ARCHITECTURAL_FIRM_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
);
