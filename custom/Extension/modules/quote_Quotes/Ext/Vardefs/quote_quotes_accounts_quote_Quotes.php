<?php
// created: 2014-06-27 10:03:50
$dictionary["quote_Quotes"]["fields"]["quote_quotes_accounts"] = array (
  'name' => 'quote_quotes_accounts',
  'type' => 'link',
  'relationship' => 'quote_quotes_accounts',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_QUOTE_QUOTES_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'quote_quotes_accountsaccounts_ida',
);
$dictionary["quote_Quotes"]["fields"]["quote_quotes_accounts_name"] = array (
  'name' => 'quote_quotes_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTE_QUOTES_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'quote_quotes_accountsaccounts_ida',
  'link' => 'quote_quotes_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["quote_Quotes"]["fields"]["quote_quotes_accountsaccounts_ida"] = array (
  'name' => 'quote_quotes_accountsaccounts_ida',
  'type' => 'link',
  'relationship' => 'quote_quotes_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QUOTE_QUOTES_ACCOUNTS_FROM_QUOTE_QUOTES_TITLE',
);
