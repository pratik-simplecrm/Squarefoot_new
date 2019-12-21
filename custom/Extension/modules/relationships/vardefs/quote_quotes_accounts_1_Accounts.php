<?php
// created: 2014-04-09 09:15:39
$dictionary["Account"]["fields"]["quote_quotes_accounts_1"] = array (
  'name' => 'quote_quotes_accounts_1',
  'type' => 'link',
  'relationship' => 'quote_quotes_accounts_1',
  'source' => 'non-db',
  'module' => 'quote_Quotes',
  'bean_name' => 'quote_Quotes',
  'vname' => 'LBL_QUOTE_QUOTES_ACCOUNTS_1_FROM_QUOTE_QUOTES_TITLE',
  'id_name' => 'quote_quotes_accounts_1quote_quotes_ida',
);
$dictionary["Account"]["fields"]["quote_quotes_accounts_1_name"] = array (
  'name' => 'quote_quotes_accounts_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTE_QUOTES_ACCOUNTS_1_FROM_QUOTE_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'quote_quotes_accounts_1quote_quotes_ida',
  'link' => 'quote_quotes_accounts_1',
  'table' => 'quote_quotes',
  'module' => 'quote_Quotes',
  'rname' => 'name',
);
$dictionary["Account"]["fields"]["quote_quotes_accounts_1quote_quotes_ida"] = array (
  'name' => 'quote_quotes_accounts_1quote_quotes_ida',
  'type' => 'link',
  'relationship' => 'quote_quotes_accounts_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QUOTE_QUOTES_ACCOUNTS_1_FROM_ACCOUNTS_TITLE',
);
