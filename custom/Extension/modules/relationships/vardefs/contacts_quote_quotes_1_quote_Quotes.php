<?php
// created: 2014-04-09 09:19:22
$dictionary["quote_Quotes"]["fields"]["contacts_quote_quotes_1"] = array (
  'name' => 'contacts_quote_quotes_1',
  'type' => 'link',
  'relationship' => 'contacts_quote_quotes_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_QUOTE_QUOTES_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_quote_quotes_1contacts_ida',
);
$dictionary["quote_Quotes"]["fields"]["contacts_quote_quotes_1_name"] = array (
  'name' => 'contacts_quote_quotes_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_QUOTE_QUOTES_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_quote_quotes_1contacts_ida',
  'link' => 'contacts_quote_quotes_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["quote_Quotes"]["fields"]["contacts_quote_quotes_1contacts_ida"] = array (
  'name' => 'contacts_quote_quotes_1contacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_quote_quotes_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_QUOTE_QUOTES_1_FROM_QUOTE_QUOTES_TITLE',
);
