<?php
// created: 2014-06-27 10:03:50
$dictionary["quote_Quote"]["fields"]["quote_quote_opportunities"] = array (
  'name' => 'quote_quote_opportunities',
  'type' => 'link',
  'relationship' => 'quote_quote_opportunities',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_QUOTE_QUOTE_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'quote_quote_opportunitiesopportunities_ida',
);
$dictionary["quote_Quote"]["fields"]["quote_quote_opportunities_name"] = array (
  'name' => 'quote_quote_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QUOTE_QUOTE_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'quote_quote_opportunitiesopportunities_ida',
  'link' => 'quote_quote_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["quote_Quote"]["fields"]["quote_quote_opportunitiesopportunities_ida"] = array (
  'name' => 'quote_quote_opportunitiesopportunities_ida',
  'type' => 'link',
  'relationship' => 'quote_quote_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QUOTE_QUOTE_OPPORTUNITIES_FROM_QUOTE_QUOTE_TITLE',
);
