<?php
// created: 2017-01-09 09:49:56
$dictionary["scrm_Login_Audit"]["fields"]["users_scrm_login_audit_1"] = array (
  'name' => 'users_scrm_login_audit_1',
  'type' => 'link',
  'relationship' => 'users_scrm_login_audit_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_SCRM_LOGIN_AUDIT_1_FROM_USERS_TITLE',
  'id_name' => 'users_scrm_login_audit_1users_ida',
);
$dictionary["scrm_Login_Audit"]["fields"]["users_scrm_login_audit_1_name"] = array (
  'name' => 'users_scrm_login_audit_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_USERS_SCRM_LOGIN_AUDIT_1_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'users_scrm_login_audit_1users_ida',
  'link' => 'users_scrm_login_audit_1',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["scrm_Login_Audit"]["fields"]["users_scrm_login_audit_1users_ida"] = array (
  'name' => 'users_scrm_login_audit_1users_ida',
  'type' => 'link',
  'relationship' => 'users_scrm_login_audit_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_USERS_SCRM_LOGIN_AUDIT_1_FROM_SCRM_LOGIN_AUDIT_TITLE',
);
