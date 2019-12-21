<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class UpdateSchedulerReportTable {

    public function inactive_user_to_deleted($bean, $event, $arguments) {
        global $db;

        if ($bean->fetched_row['status'] != $bean->status) {
            $rowcount = "SELECT count(id) as RowCount FROM bhea_report_scheduler WHERE assigned_user_id = '$bean->id'";
            $rowcount_res = $db->query($rowcount);
            $rowcount_row = $db->fetchByAssoc($rowcount_res);

            if ($rowcount_row['RowCount'] > 0) {
                if ($bean->status == 'Active') {
                    $query = "UPDATE bhea_report_scheduler SET deleted = 0 WHERE assigned_user_id = '$bean->id'";
                    $result = $db->query($query);
                } else {
                    $query = "UPDATE bhea_report_scheduler SET deleted = 1 WHERE assigned_user_id = '$bean->id'";
                    $result = $db->query($query);
                }
            }
        }
    }

    public function insert_users_audit_table($bean, $event, $arguments) {
        global $db, $current_user;

        $new_status = $bean->status;
        $old_status = $bean->fetched_row['status'];

        if (strcmp($old_status, $new_status) != 0) {

            $current_user_id = $current_user->id;
            $id = create_guid();
            $parent_id = $bean->id;
            $reports_to = $bean->reports_to_id;

            $insert_audit = "INSERT INTO users_audit (id,parent_id,date_created,field_name,data_type,before_value_string,after_value_string,created_by, reports_to_id) VALUES ('$id','$parent_id',now(),'status','enum','$old_status','$new_status','$current_user_id','$reports_to')";
            $db->query($insert_audit);
        }
    }

    public function updategroup($bean, $event, $arguments) {
        global $db, $current_user;

        $user_id = $bean->id;
        $new_group_id = $bean->team_c;
        $old_group_id = $bean->fetched_row['team_c'];
        if (strcmp($old_group_id, $new_group_id) != 0) {

            $rowid = "SELECT id as Rowid FROM securitygroups_users WHERE user_id = '$bean->id' AND securitygroup_id='$bean->team_c' AND deleted=0";
            $rowid_res = $db->query($rowid);
            $rowid_row = $db->fetchByAssoc($rowid_res);
            if (empty($rowid_row)) {
                //New relationship
                $id = create_guid();
                $insert_audit = "INSERT INTO securitygroups_users (id,date_modified,securitygroup_id,user_id,primary_group) VALUES ('$id',now(),'$new_group_id','$user_id','1')";
                $db->query($insert_audit);
            } else {
                //Update new securitygroup user  relationship  
                $query = "UPDATE securitygroups_users SET primary_group = 1 WHERE securitygroup_id = '$bean->team_c'";
                $result = $db->query($query);
            }

            //Update old securitygroup user  relationship 
            $query = "UPDATE securitygroups_users SET primary_group = 0 WHERE securitygroup_id = '$old_group_id'";
            $result = $db->query($query);
        }
    }

}

?>
