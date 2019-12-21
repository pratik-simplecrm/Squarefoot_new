<?php
// created: 2014-04-01 15:34:48
$dictionary["EvMgr_EvParts"]["fields"]["evmgr_evparts_evmgr_evs"] = array (
  'name' => 'evmgr_evparts_evmgr_evs',
  'type' => 'link',
  'relationship' => 'evmgr_evparts_evmgr_evs',
  'source' => 'non-db',
  'module' => 'EvMgr_Evs',
  'bean_name' => 'EvMgr_Evs',
  'vname' => 'LBL_EVMGR_EVPARTS_EVMGR_EVS_FROM_EVMGR_EVS_TITLE',
  'id_name' => 'evmgr_evparts_evmgr_evsevmgr_evs_ida',
);
$dictionary["EvMgr_EvParts"]["fields"]["evmgr_evparts_evmgr_evs_name"] = array (
  'name' => 'evmgr_evparts_evmgr_evs_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_EVMGR_EVPARTS_EVMGR_EVS_FROM_EVMGR_EVS_TITLE',
  'save' => true,
  'id_name' => 'evmgr_evparts_evmgr_evsevmgr_evs_ida',
  'link' => 'evmgr_evparts_evmgr_evs',
  'table' => 'evmgr_evs',
  'module' => 'EvMgr_Evs',
  'rname' => 'name',
  'required' => true,
  'massupdate' => false,
);
$dictionary["EvMgr_EvParts"]["fields"]["evmgr_evparts_evmgr_evsevmgr_evs_ida"] = array (
  'name' => 'evmgr_evparts_evmgr_evsevmgr_evs_ida',
  'type' => 'link',
  'relationship' => 'evmgr_evparts_evmgr_evs',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_EVMGR_EVPARTS_EVMGR_EVS_FROM_EVMGR_EVPARTS_TITLE',
);
