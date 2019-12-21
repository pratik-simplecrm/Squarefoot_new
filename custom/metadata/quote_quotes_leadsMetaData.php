<?php
// created: 2014-06-27 10:03:50
$dictionary["quote_quotes_leads"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'quote_quotes_leads' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'quote_Quotes',
      'rhs_table' => 'quote_quotes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'quote_quotes_leads_c',
      'join_key_lhs' => 'quote_quotes_leadsleads_ida',
      'join_key_rhs' => 'quote_quotes_leadsquote_quotes_idb',
    ),
  ),
  'table' => 'quote_quotes_leads_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'quote_quotes_leadsleads_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'quote_quotes_leadsquote_quotes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'quote_quotes_leadsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'quote_quotes_leads_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'quote_quotes_leadsleads_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'quote_quotes_leads_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'quote_quotes_leadsquote_quotes_idb',
      ),
    ),
  ),
);