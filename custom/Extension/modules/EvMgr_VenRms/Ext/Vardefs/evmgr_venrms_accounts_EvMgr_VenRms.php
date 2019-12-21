<?php
// created: 2014-04-01 15:34:49
$dictionary["EvMgr_VenRms"]["fields"]["evmgr_venrms_accounts"] = array (
  'name' => 'evmgr_venrms_accounts',
  'type' => 'link',
  'relationship' => 'evmgr_venrms_accounts',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_EVMGR_VENRMS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'evmgr_venrms_accountsaccounts_ida',
);
$dictionary["EvMgr_VenRms"]["fields"]["evmgr_venrms_accounts_name"] = array (
  'name' => 'evmgr_venrms_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_EVMGR_VENRMS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'evmgr_venrms_accountsaccounts_ida',
  'link' => 'evmgr_venrms_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
  'required' => true,
);
$dictionary["EvMgr_VenRms"]["fields"]["evmgr_venrms_accountsaccounts_ida"] = array (
  'name' => 'evmgr_venrms_accountsaccounts_ida',
  'type' => 'link',
  'relationship' => 'evmgr_venrms_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_EVMGR_VENRMS_ACCOUNTS_FROM_EVMGR_VENRMS_TITLE',
);
