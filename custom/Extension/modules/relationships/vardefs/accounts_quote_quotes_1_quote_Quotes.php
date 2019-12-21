<?php
// created: 2014-04-09 09:18:36
$dictionary["quote_Quotes"]["fields"]["accounts_quote_quotes_1"] = array (
  'name' => 'accounts_quote_quotes_1',
  'type' => 'link',
  'relationship' => 'accounts_quote_quotes_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ACCOUNTS_QUOTE_QUOTES_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_quote_quotes_1accounts_ida',
);
$dictionary["quote_Quotes"]["fields"]["accounts_quote_quotes_1_name"] = array (
  'name' => 'accounts_quote_quotes_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_QUOTE_QUOTES_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_quote_quotes_1accounts_ida',
  'link' => 'accounts_quote_quotes_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["quote_Quotes"]["fields"]["accounts_quote_quotes_1accounts_ida"] = array (
  'name' => 'accounts_quote_quotes_1accounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_quote_quotes_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_QUOTE_QUOTES_1_FROM_QUOTE_QUOTES_TITLE',
);
