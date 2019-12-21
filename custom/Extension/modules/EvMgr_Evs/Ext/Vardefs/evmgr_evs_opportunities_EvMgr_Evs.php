<?php
// created: 2014-04-01 15:34:48
$dictionary["EvMgr_Evs"]["fields"]["evmgr_evs_opportunities"] = array (
  'name' => 'evmgr_evs_opportunities',
  'type' => 'link',
  'relationship' => 'evmgr_evs_opportunities',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_EVMGR_EVS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'evmgr_evs_opportunitiesopportunities_ida',
);
$dictionary["EvMgr_Evs"]["fields"]["evmgr_evs_opportunities_name"] = array (
  'name' => 'evmgr_evs_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_EVMGR_EVS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'evmgr_evs_opportunitiesopportunities_ida',
  'link' => 'evmgr_evs_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
  'required' => true,
);
$dictionary["EvMgr_Evs"]["fields"]["evmgr_evs_opportunitiesopportunities_ida"] = array (
  'name' => 'evmgr_evs_opportunitiesopportunities_ida',
  'type' => 'link',
  'relationship' => 'evmgr_evs_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_EVMGR_EVS_OPPORTUNITIES_FROM_EVMGR_EVS_TITLE',
);
