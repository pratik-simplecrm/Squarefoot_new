<?php
// created: 2014-04-01 15:34:49
$dictionary["EvMgr_Pgms"]["fields"]["evmgr_pgms_accounts"] = array (
  'name' => 'evmgr_pgms_accounts',
  'type' => 'link',
  'relationship' => 'evmgr_pgms_accounts',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_EVMGR_PGMS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'evmgr_pgms_accountsaccounts_ida',
);
$dictionary["EvMgr_Pgms"]["fields"]["evmgr_pgms_accounts_name"] = array (
  'name' => 'evmgr_pgms_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_EVMGR_PGMS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'evmgr_pgms_accountsaccounts_ida',
  'link' => 'evmgr_pgms_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["EvMgr_Pgms"]["fields"]["evmgr_pgms_accountsaccounts_ida"] = array (
  'name' => 'evmgr_pgms_accountsaccounts_ida',
  'type' => 'link',
  'relationship' => 'evmgr_pgms_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_EVMGR_PGMS_ACCOUNTS_FROM_EVMGR_PGMS_TITLE',
);
