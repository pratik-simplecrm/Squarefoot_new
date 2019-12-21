<?php
// created: 2014-06-27 10:03:50
$dictionary["quote_Quote"]["fields"]["quote_quote_leads"] = array (
  'name' => 'quote_quote_leads',
  'type' => 'link',
  'relationship' => 'quote_quote_leads',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_QUOTE_QUOTE_LEADS_FROM_LEADS_TITLE',
  'id_name' => 'quote_quote_leadsleads_ida',
);
$dictionary["quote_Quote"]["fields"]["quote_quote_leads_name"] = array (
  'name' => 'quote_quote_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTE_QUOTE_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'quote_quote_leadsleads_ida',
  'link' => 'quote_quote_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["quote_Quote"]["fields"]["quote_quote_leadsleads_ida"] = array (
  'name' => 'quote_quote_leadsleads_ida',
  'type' => 'link',
  'relationship' => 'quote_quote_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QUOTE_QUOTE_LEADS_FROM_QUOTE_QUOTE_TITLE',
);
