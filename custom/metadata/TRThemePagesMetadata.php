<?php

$dictionary['trthemepages_users'] = array(
    'table' => 'trthemepages_users',
    'fields' => array(
        array('name' => 'id', 'type' => 'varchar', 'len' => '36'),
        array('name' => 'trthemepage_id', 'type' => 'varchar', 'len' => '36'),
        array('name' => 'user_id', 'type' => 'varchar', 'len' => '36'),
        array('name' => 'date_modified', 'type' => 'datetime'),
        array('name' => 'deleted', 'type' => 'bool', 'len' => '1', 'required' => false, 'default' => '0')
    ),
    'indices' => array(
        array('name' => 'trthemepages_userspk', 'type' => 'primary', 'fields' => array('id'))
    ),
    'relationships' => array(
        'ausers_trthemepages' => array(
            'lhs_module' => 'TRThemePages',
            'lhs_table' => 'trthemepages',
            'lhs_key' => 'id',
            'rhs_module' => 'Users',
            'rhs_table' => 'users',
            'rhs_key' => 'id',
            'relationship_type' => 'many-to-many',
            'join_table' => 'trthemepages_users',
            'join_key_lhs' => 'trthemepage_id',
            'join_key_rhs' => 'user_id')
    )
);

$dictionary['trthemepages_aclroles'] = array(
    'table' => 'trthemepages_aclroles',
    'fields' => array(
        array('name' => 'id', 'type' => 'varchar', 'len' => '36'),
        array('name' => 'trthemepage_id', 'type' => 'varchar', 'len' => '36'),
        array('name' => 'aclrole_id', 'type' => 'varchar', 'len' => '36'),
        array('name' => 'date_modified', 'type' => 'datetime'),
        array('name' => 'deleted', 'type' => 'bool', 'len' => '1', 'required' => false, 'default' => '0')
    ),
    'indices' => array(
        array('name' => 'trthemepages_aclrolespk', 'type' => 'primary', 'fields' => array('id'))
    ),
    'relationships' => array(
        'aclroles_trthemepages' => array(
            'lhs_module' => 'TRThemePages',
            'lhs_table' => 'trthemepages',
            'lhs_key' => 'id',
            'rhs_module' => 'ACLRoles',
            'rhs_table' => 'acl_roles',
            'rhs_key' => 'id',
            'relationship_type' => 'many-to-many',
            'join_table' => 'trthemepages_aclroles',
            'join_key_lhs' => 'trthemepage_id',
            'join_key_rhs' => 'aclrole_id')
    )
);
?>
