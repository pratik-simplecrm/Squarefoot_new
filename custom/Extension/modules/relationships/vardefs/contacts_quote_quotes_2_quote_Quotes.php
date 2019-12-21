<?php
// created: 2014-04-09 09:20:01
$dictionary["quote_Quotes"]["fields"]["contacts_quote_quotes_2"] = array (
  'name' => 'contacts_quote_quotes_2',
  'type' => 'link',
  'relationship' => 'contacts_quote_quotes_2',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_QUOTE_QUOTES_2_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_quote_quotes_2contacts_ida',
);
$dictionary["quote_Quotes"]["fields"]["contacts_quote_quotes_2_name"] = array (
  'name' => 'contacts_quote_quotes_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_QUOTE_QUOTES_2_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_quote_quotes_2contacts_ida',
  'link' => 'contacts_quote_quotes_2',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["quote_Quotes"]["fields"]["contacts_quote_quotes_2contacts_ida"] = array (
  'name' => 'contacts_quote_quotes_2contacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_quote_quotes_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_QUOTE_QUOTES_2_FROM_QUOTE_QUOTES_TITLE',
);
