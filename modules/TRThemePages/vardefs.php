<?php

$dictionary['TRThemePage'] = array(
    'table' => 'trthemepages',
    'audited' => true,
    'fields' => array(
        'page_index' => array(
            'name' => 'page_index',
            'vname' => 'LBL_PAGE_INDEX',
            'type' => 'varchar',
            'len' => 3,
            'required' => false,
            'reportable' => true,
            'massupdate' => false,
        ),
        'page_priority' => array(
            'name' => 'page_priority',
            'vname' => 'LBL_PAGE_PRIORITY',
            'type' => 'varchar',
            'len' => 3,
            'required' => false,
            'reportable' => true,
            'massupdate' => false,
        ),
        'page_position_first' => array(
            'name' => 'page_position_first',
            'vname' => 'LBL_PAGE_POSITION_FIRST',
            'type' => 'bool',
            'required' => false,
            'reportable' => true,
            'massupdate' => false,
        ),
        //=> ACCOUNT
        'puser_id' => array(
            'name' => 'puser_id',
            'vname' => 'LBL_PUSER_ID',
            'type' => 'id',
            //'source'					=> 'non-db',
            'audited' => true,
        ),
        'puser_link' => array(
            'name' => 'puser_link',
            'type' => 'link',
            'relationship' => 'puser_trthemepages',
            'source' => 'non-db',
            'link_type' => 'one',
            'module' => 'Users',
            'bean_name' => 'User',
            'vname' => 'LBL_PUSERS',
        ),
        'puser_name' => array(
            'name' => 'puser_name',
            'rname' => 'user_name',
            'id_name' => 'puser_id',
            'vname' => 'LBL_PUSER_NAME',
            'type' => 'relate',
            'table' => 'users',
            'join_name' => 'pusers',
            'isnull' => 'true',
            'module' => 'Users',
            'dbType' => 'varchar',
            'link' => 'puser_link',
            'len' => '255',
            'source' => 'non-db',
            'unified_search' => true,
            'required' => true,
            'importable' => 'required',
        ),
        'ausers_link' => array(
            'name' => 'ausers_link',
            'type' => 'link',
            'relationship' => 'ausers_trthemepages',
            'source' => 'non-db',
            'link_type' => 'one',
            'module' => 'Users',
            'bean_name' => 'User',
            'vname' => 'LBL_AUSERS_LINK',
        ),
        'aclroles_link' => array(
            'name' => 'aclroles_link',
            'type' => 'link',
            'relationship' => 'aclroles_trthemepages',
            'source' => 'non-db',
            'link_type' => 'one',
            'module' => 'ACLRoles',
            'bean_name' => 'ACLRole',
            'vname' => 'LBL_ACLROLES_LINK',
        )
    ),
    'indices' => array(
        array('name' => 'idx_trthemepages_id_del', 'type' => 'index', 'fields' => array('id', 'deleted'),),
    ),
    'relationships' => array(
        'puser_trthemepages' => array(
            'rhs_module' => 'TRThemePages',
            'rhs_table' => 'trthemepages',
            'rhs_key' => 'puser_id',
            'lhs_module' => 'Users',
            'lhs_table' => 'users',
            'lhs_key' => 'id',
            'relationship_type' => 'one-to-many'
        )
    ),
    'optimistic_lock' => true,
);


require_once('include/SugarObjects/VardefManager.php');

if ($GLOBALS['sugar_flavor'] == 'PRO')
    VardefManager::createVardef('TRThemePages', 'TRThemePage', array('default', 'assignable', 'team_security'));
else
    VardefManager::createVardef('TRThemePages', 'TRThemePage', array('default', 'assignable'));

