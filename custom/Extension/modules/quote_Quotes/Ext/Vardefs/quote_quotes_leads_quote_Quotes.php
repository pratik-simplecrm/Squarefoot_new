<?php
// created: 2014-06-27 10:03:50
$dictionary["quote_Quotes"]["fields"]["quote_quotes_leads"] = array (
  'name' => 'quote_quotes_leads',
  'type' => 'link',
  'relationship' => 'quote_quotes_leads',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_QUOTE_QUOTES_LEADS_FROM_LEADS_TITLE',
  'id_name' => 'quote_quotes_leadsleads_ida',
);
$dictionary["quote_Quotes"]["fields"]["quote_quotes_leads_name"] = array (
  'name' => 'quote_quotes_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTE_QUOTES_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'quote_quotes_leadsleads_ida',
  'link' => 'quote_quotes_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["quote_Quotes"]["fields"]["quote_quotes_leadsleads_ida"] = array (
  'name' => 'quote_quotes_leadsleads_ida',
  'type' => 'link',
  'relationship' => 'quote_quotes_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QUOTE_QUOTES_LEADS_FROM_QUOTE_QUOTES_TITLE',
);
