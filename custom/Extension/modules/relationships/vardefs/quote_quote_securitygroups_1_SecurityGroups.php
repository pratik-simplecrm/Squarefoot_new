<?php
// created: 2016-08-10 02:42:04
$dictionary["SecurityGroup"]["fields"]["quote_quote_securitygroups_1"] = array (
  'name' => 'quote_quote_securitygroups_1',
  'type' => 'link',
  'relationship' => 'quote_quote_securitygroups_1',
  'source' => 'non-db',
  'module' => 'quote_Quote',
  'bean_name' => 'quote_Quote',
  'vname' => 'LBL_QUOTE_QUOTE_SECURITYGROUPS_1_FROM_QUOTE_QUOTE_TITLE',
  'id_name' => 'quote_quote_securitygroups_1quote_quote_ida',
);
$dictionary["SecurityGroup"]["fields"]["quote_quote_securitygroups_1_name"] = array (
  'name' => 'quote_quote_securitygroups_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTE_QUOTE_SECURITYGROUPS_1_FROM_QUOTE_QUOTE_TITLE',
  'save' => true,
  'id_name' => 'quote_quote_securitygroups_1quote_quote_ida',
  'link' => 'quote_quote_securitygroups_1',
  'table' => 'quote_quote',
  'module' => 'quote_Quote',
  'rname' => 'name',
);
$dictionary["SecurityGroup"]["fields"]["quote_quote_securitygroups_1quote_quote_ida"] = array (
  'name' => 'quote_quote_securitygroups_1quote_quote_ida',
  'type' => 'link',
  'relationship' => 'quote_quote_securitygroups_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QUOTE_QUOTE_SECURITYGROUPS_1_FROM_SECURITYGROUPS_TITLE',
);
