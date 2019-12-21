<?php

if (!defined('sugarEntry')) define('sugarEntry', true);

class AddInvities
{
  function add_invities_meeting($bean, $event, $arguments)
  {
    global $db;
    $supervisor = $bean->supervisor_c;
    $assigneduser = $bean->assigned_user_name;
    $branch = $bean->branch_c;
    if($supervisor!='')
    {
      $query = "SELECT users.id, acl_roles.name, users_cstm.branch_c FROM users LEFT JOIN acl_roles_users ON users.id=acl_roles_users.user_id LEFT JOIN acl_roles ON acl_roles_users.role_id=acl_roles.id JOIN users_cstm ON acl_roles_users.user_id=users_cstm.id_c WHERE acl_roles.name='Supervisor' AND users.deleted=0 AND acl_roles_users.deleted=0 AND acl_roles.deleted=0";
      
      $result = $db->query($query);
      if($row_query = $db->fetchByAssoc($result)) {
        $userid= row_query['id'];

      }
    }
  }
}
?>