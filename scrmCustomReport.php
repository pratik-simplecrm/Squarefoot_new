<?php

ini_set('display_errors', 'Off');
if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}
require_once 'include/entryPoint.php';
require_once 'include/database/DBManager.php';
require_once 'config.php';
global $sugar_config, $current_user, $db;

function getWeeklyPerformanceReport() {

    global $sugar_config, $current_user, $db;

    $date_start = $_REQUEST['from'];
    $from = str_replace('-', '/', $date_start);
    $date_start = date("Y-m-d", strtotime($from));
    $date_start .= " 00:00:00";
    // $date_start = date('Y-m-d H:i:s', strtotime($date_start." -5 hours 30 minutes"));

    $date_end = $_REQUEST['to'];
    $to = str_replace('-', '/', $date_end);
    $date_end = date("Y-m-d", strtotime($to));
    $date_end .= " 23:59:59";
    //$date_end = date('Y-m-d H:i:s', strtotime($date_end." -5 hours 30 minutes"));


    

    $total_leads = array();
    $total_oppt = array();
    $total_amount = array();
    $total_own_oppt = array();
    $oppt_own_amount = array();
    $total_lost_oppt = array();
    $oppt_lost_amount = array();
    $calls_count_id = array();
    $salesTarget1 = array();
    $opportunities_won1 = array();
    $meetings_count_id = array();
    $Architect_count_id = array();
    $architect_meetings_count_id = array();
    $architect_calls_count_id = array();

    $name = $_REQUEST['name'];
    $sub_id = array();
    $sub_id = getUsersList($date_start, $date_end);
    $i = 0;


    for ($k = 0; $k < count($name); $k++) {

        //print_r($name);
        $name[$k] = str_replace("_", " ", $name[$k]);
        $query8 = "SELECT id FROM  securitygroups WHERE name ='$name[$k]' and deleted=0";
        $result = $db->query($query8, true);
        $query = $db->fetchByAssoc($result);
        $team_id = $query['id'];

        $admin = $current_user->is_admin;

        if ($admin == 0) {

            for ($j = 0; $j < count($sub_id); $j++) {
                $query = "SELECT * FROM  users WHERE deleted=0 AND id='$sub_id[$j]'";
                $result = $db->query($query, true);
                $getuser = $db->fetchByAssoc($result);
                $user_id = $getuser['id'];
                echo $user_name[] = $getuser['first_name'] . " " . $getuser['last_name'];
                $user_id_arr[] = $getuser['id'];
                $user_status[] = $getuser['status'];


                //For total leads
                $total_leads[] = getLeads($date_start, $date_end, $team_id, $user_id);

                //Total sales target
                $saletarget_oppoamt = totalSalesTarget($user_id,$date_start, $date_end);



                $salesTargets[] = $saletarget_oppoamt[0] . "L";
                $salesTarget1[] = $saletarget_oppoamt[0];

                //opportunities_won amount To date
                $opportunities_wons[] = $saletarget_oppoamt[1] . "L";
                $opportunities_won1[] = $saletarget_oppoamt[1];

                //Oppo total amount
                $getOppoTotalAmount = getOpportunitiesDetails($date_start, $date_end, $team_id, $user_id, "", "date_entered");
                $total_amount[] = $getOppoTotalAmount[0] . "L";
                $total_oppt[] = $getOppoTotalAmount[1];

                //Closed won
                $getClosedWon = getOpportunitiesDetails($date_start, $date_end, $team_id, $user_id, " AND o.sales_stage ='Closed Won'", "date_closed");
                $oppt_own_amount[] = $getClosedWon[0] . "L";
                $total_own_oppt[] = $getClosedWon[1];

                //Closed Lost
                $getOppLost = getOpportunitiesDetails($date_start, $date_end, $team_id, $user_id, " AND o.sales_stage ='Closed Lost'", "date_closed");
                $oppt_lost_amount[] = $getOppLost[0] . "L";
                $total_lost_oppt[] = $getOppLost[1];

                //Get Calls and Meetings Count
                $calls_count_id[] = getActivitiesDetails($date_start, $date_end, $team_id, $user_id, 'Calls');
                $meetings_count_id[] = getActivitiesDetails($date_start, $date_end, $team_id, $user_id, 'Meetings');

                //Get Architects and there activities
                $Architect_count_id[] = getArchitect_contanct_values($date_start, $date_end, $team_id, $user_id);
                $architect_calls_count_id[] = getArchitectActivities($date_start, $date_end, $team_id, $user_id, 'calls');
                $architect_meetings_count_id[] = getArchitectActivities($date_start, $date_end, $team_id, $user_id, 'meetings');

                $team_name[] = str_replace("_", " ", $name[$k]);
                $team_id_array[] = $team_id;
               // exit;
                $i++;
            }
        } else {

            //echo "dddddddd";

            $get_teamusers = "SELECT user_id FROM securitygroups_users WHERE securitygroup_id  ='$team_id' AND deleted=0";
            $get_teamusers_res = $db->query($get_teamusers);
            while ($getteams_user = $db->fetchByAssoc($get_teamusers_res)) {
                $user_list[] = $getteams_user['user_id'];
            }

            $user_id = array();
            $get_users_list = array();

            for ($l = 0; $l < count($user_list); $l++) {
                $flag = false;
                //~ $query ="SELECT * FROM  users WHERE deleted=0 AND status='Active' AND id='$user_list[$l]'";
                $query = "SELECT * FROM  users WHERE deleted=0 AND id='$user_list[$l]'";
                $result = $db->query($query, true);
                while ($user = $db->fetchByAssoc($result)) {
                    $flag = true;
                    $get_users_list[] = $user;
                }
            }

            for ($l = 0; $l < count($get_users_list); $l++) {
                $getuser = $get_users_list[$l];
                $user_id = $getuser['id'];
                $user_fname = $getuser['first_name'];
                $user_lname = $getuser['last_name'];
                $user_name[] = $user_fname . " " . $user_lname;
                $user_id_arr[] = $getuser['id'];
                $user_status[] = $getuser['status'];


                //For total leads
                $total_leads[] = getLeads($date_start, $date_end, $team_id, $user_id);

                //Total sales target
                $saletarget_oppoamt = totalSalesTarget($user_id, $date_start, $date_end);

                $salesTargets[] = $saletarget_oppoamt[0] . "L";
                $salesTarget1[] = $saletarget_oppoamt[0];


                //opportunities_won amount To date
                $opportunities_wons[] = $saletarget_oppoamt[1] . "L";
                $opportunities_won1[] = $saletarget_oppoamt[1];

                //Oppo total amount
                $getOppoTotalAmount = getOpportunitiesDetails($date_start, $date_end, $team_id, $user_id, "", "date_entered");
                $total_amount[] = $getOppoTotalAmount[0] . "L";
                $total_oppt[] = $getOppoTotalAmount[1];

                //Closed won
                $getClosedWon = getOpportunitiesDetails($date_start, $date_end, $team_id, $user_id, " AND o.sales_stage ='Closed Won'", "date_closed");
                $oppt_own_amount[] = $getClosedWon[0] . "L";
                $total_own_oppt[] = $getClosedWon[1];

                //Closed Lost
                $getOppLost = getOpportunitiesDetails($date_start, $date_end, $team_id, $user_id, " AND o.sales_stage ='Closed Lost'", "date_closed");
                $oppt_lost_amount[] = $getOppLost[0] . "L";
                $total_lost_oppt[] = $getOppLost[1];

                //Get Calls and Meetings Count
                $calls_count_id[] = getActivitiesDetails($date_start, $date_end, $team_id, $user_id, 'Calls');
                $meetings_count_id[] = getActivitiesDetails($date_start, $date_end, $team_id, $user_id, 'Meetings');

                //Get Architects and there activities
                $Architect_count_id[] = getArchitect_contanct_values($date_start, $date_end, $team_id, $user_id);
                $architect_calls_count_id[] = getArchitectActivities($date_start, $date_end, $team_id, $user_id, 'calls');
                $architect_meetings_count_id[] = getArchitectActivities($date_start, $date_end, $team_id, $user_id, 'meetings');

                $team_name[] = str_replace("_", " ", $name[$k]);
                $team_id_array[] = $team_id;
                $i++;
            }
        }
        unset($user_list);
    }
    $total_leads[] = array_sum($total_leads);
    //print_r($total_leads_count); exit;
    $total_oppt[] = array_sum($total_oppt);
    $total_amount[] = array_sum($total_amount);
    $total_own_oppt[] = array_sum($total_own_oppt);
    $oppt_own_amount[] = array_sum($oppt_own_amount);
    $total_lost_oppt[] = array_sum($total_lost_oppt);
    $oppt_lost_amount[] = array_sum($oppt_lost_amount);
    $calls_count_id[] = array_sum($calls_count_id);

    //sales Target
    $total_sales = $salesTargets;
    $total_salesTarget = array_sum($salesTarget1);
    $opp_won_todate = $opportunities_wons;
    $opp_won_todate_total = array_sum($opportunities_won1);

    $meetings_count_id[] = array_sum($meetings_count_id);

    $Architect_count_id[] = array_sum($Architect_count_id);
    $architect_meetings_count_id[] = array_sum($architect_meetings_count_id);
    $architect_calls_count_id[] = array_sum($architect_calls_count_id);
    //$user_status[] = $user_status;
    // $user_name[] = count($user_name);
    $team_name[] = "Total";

    foreach ($user_name as $key => $value) {
        $string = str_replace(' ', '-', $value); // Replaces all spaces with hyphens.

        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

        $user_name[$key] = str_replace('-', ' ', $string); // Replaces all spaces with hyphens.
    }

    $content = array($user_name, $total_leads, $total_oppt, $total_amount, $total_own_oppt,
        $oppt_own_amount, $total_lost_oppt, $oppt_lost_amount, $calls_count_id, $meetings_count_id, $user_id_arr, $team_name,
        $team_id_array, $Architect_count_id, $architect_meetings_count_id, $architect_calls_count_id, $total_sales, $total_salesTarget, $opp_won_todate, $opp_won_todate_total, $user_status);


    $inactive_users_key = array();
    foreach ($content[20] as $key => $value) {
        if ($value == 'Inactive') {
            $inactive_users_key[] = $key;
        }
    }

    $remove_user_from_list = array();

    foreach ($inactive_users_key as $key => $value) {
        $value_exist = false;
        foreach ($content as $k => $v) {
            if ($k == 16 || $k == 17 || $k == 18 || $k == 19 || $k == 20 || $k == 12 || $k == 11 || $k == 10 || $k == 0) {
                continue;
            } else {
                $tmp_val = str_replace("L", "", $v[$value]);
                if ((float) $tmp_val > 0) {
                    $value_exist = true;
                }
            }
        }
        // echo " final " . $value_exist;
        if (!$value_exist) {
            $remove_user_from_list[] = $value;
        }
    }
    // // // print_r($remove_user_from_list);

    foreach ($remove_user_from_list as $key => $value) {
        foreach ($content as $k => $v) {
            unset($v[$value]);
            $content[$k] = $v;
            // $content[$k] = array_values($v);
        }
    }

    $new_content = array();
    foreach ($content as $key => $value) {
        $i = 0;
        $tmp_array = array();

        if ($key == 17 || $key == 19) {
            $new_content[$key] = $value;
            continue;
        } else {
            foreach ($value as $k => $v) {
                $tmp_array[$i++] = $v;
            }
        }

        $new_content[$key] = $tmp_array;
    }

    // $content = $new_content;
    // $new_content1 = array();
    foreach ($new_content as $key => $value) {
        if (!($key == 0 || $key == 10 || $key == 11 || $key == 12 || $key == 17 || $key == 19 || $key == 20)) {
            $sum = 0;
            foreach ($value as $k => $v) {
                if (!($k == $loop_total)) {
                    // $tmp_val = (int) str_replace("L", "", $v);
                    $sum += (float) str_replace("L", "", $v);
                }
            }
            if ($key == 16 || $key == 18) {
                $new_content[$key + 1][] = $sum;
            } else {
                $new_content[$key][$loop_total] = $sum;
            }
        }
    }

    $recalulated_target = 0;
    $recalculated_Opp_Closed_to_date = 0;
    foreach ($new_content as $key => $value) {
        if ($key == 16) {
            foreach ($value as $k => $v) {
                $tmp_val = (float) str_replace("L", "", $v);
                $recalulated_target += $tmp_val;
            }
        }
        if ($key == 18) {
            foreach ($value as $k => $v) {
                $tmp_val = (float) str_replace("L", "", $v);
                $recalculated_Opp_Closed_to_date += $tmp_val;
            }
        }
    }
    // // $new_content[17] = $recalulated_target;

    $new_content[17] = $recalulated_target;
    $new_content[19] = $recalculated_Opp_Closed_to_date;

    $new_content[0][count($new_content[20])] = count($new_content[20]);
    
    //echo "i core file--**".count($new_content);
    
    return $new_content;
}

function getLeads($date_start, $date_end, $team_id, $user_id) {
    global $db;
    $getLeads = "SELECT count(l.id) as count FROM leads l LEFT JOIN securitygroups_records sg ON l.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Leads' AND l.date_entered between '$date_start' and '$date_end' AND l.deleted=0 and l.assigned_user_id='$user_id' and sg.deleted=0";

    $getLeads_result = $db->query($getLeads);
    $getLeads_row = $db->fetchByAssoc($getLeads_result);
    return $getLeads_row['count'];
}

function getUsersList($date_start, $date_end) {
    global $db, $current_user;
    $logedin_user_id = $current_user->id;
    $admin = $current_user->is_admin;

    $query12 = "SELECT id FROM  users WHERE reports_to_id='$logedin_user_id' and deleted=0";
    $result = $db->query($query12, true);
    while ($getuserids = $db->fetchByAssoc($result)) {
        $sub_id[] = $getuserids['id'];
    }
    if ($logedin_user_id == '8ddc4e2b-b7d6-2fc8-95e8-558b90353953') {
        $sub_id[] = '38db8f0c-82e6-98c4-af06-5997e0ccc431';
    }

    $user_audit_query = "SELECT parent_id FROM  users_audit WHERE reports_to_id='" . $logedin_user_id . "' and before_value_string='Active' and date_created between '$date_start' and '$date_end' order by date_created desc limit 0,1";

    $user_audit_result = $db->query($user_audit_query);
    while ($user_audit_row = $db->fetchByAssoc($user_audit_result)) {
        $sub_id[] = $user_audit_row['parent_id'];
    }

    $count = 0;
    count($sub_id);

    while (count($sub_id) > $count) {
        $flag = true;
        $query11 = "SELECT id FROM  users WHERE reports_to_id='" . $sub_id[$count] . "' and deleted=0 and status='Active'";
        $result = $db->query($query11, true);
        while ($getuser = $db->fetchByAssoc($result)) {
            $flag = false;
            $sub_id[] = $getuser['id'];
        }
        //Added by Shakeer to get users list who become inactive during that peroid. 10Sep2015
        if ($flag) {
            $user_audit_query = "SELECT parent_id FROM  users_audit WHERE reports_to_id='" . $sub_id[$count] . "' and before_value_string='Active' and date_created between '$date_start' and '$date_end' order by date_created desc limit 0,1";

            $user_audit_result = $db->query($user_audit_query);
            while ($user_audit_row = $db->fetchByAssoc($user_audit_result)) {
                $sub_id[] = $user_audit_row['parent_id'];
            }
        }
        //Ended
        $count++;
    }

    $sub_id[] = $logedin_user_id;

    return $sub_id;
}

function totalSalesTarget($user_id, $date_start, $date_end) {
    global $db;

    $date1 = date_create($date_start);
    $date2 = date_create($date_end);
    $diff = date_diff($date1, $date2);
    $day_diff = $diff->format("%a");
    $start_m = intval(date("m", strtotime($date_start)));
    $start_y = intval(date("Y", strtotime($date_start)));
    $end_m = intval(date("m", strtotime($date_end)));
    $end_y = intval(date("Y", strtotime($date_end)));

    if ($start_m >= 4 && $end_m < 4 && $start_y < $end_y) {
        $year_cond = " AND ( st.year between '" . $start_y . "' AND '" . ($end_y-1) . "')";
    } elseif ($start_m >= 4 && $end_m < 4 ) {
        $year_cond = " AND ( st.year between '" . $start_y . "' AND '" . $end_y . "')";
    }elseif ($start_m < 4 && $end_m >= 4) {
        $year_cond = " AND ( st.year between '" . ($start_y - 1) . "' AND '" . $end_y . "')";
    } elseif ($start_m >= 4 && $end_m >= 4) {
        $year_cond = " AND ( st.year between '" . $start_y . "' AND '" . $end_y . "')";
    } elseif ($start_m < 4 && $end_m < 4) {
        $year_cond = " AND ( st.year between '" . ($start_y - 1) . "' AND '" . ($end_y - 1) . "')";
    } elseif ($start_m == 4 && $end_m == 4) {
        $year_cond = " AND ( st.year between '" . $start_y . "' AND '" . $end_y . "')";
    } else {
        $year_cond = " AND ( st.year between '" . $start_y . "' AND '" . $end_y . "')";
    }
    
    $getSalesTarget = "SELECT SUM(sales_target) as total_sales,SUM(opportunities_won) as total_op FROM sf_sales_forecast st JOIN users_sf_sales_forecast_1_c u ON st.id= u.users_sf_sales_forecast_1sf_sales_forecast_idb WHERE u.users_sf_sales_forecast_1users_ida ='$user_id' " . $year_cond . " AND st.deleted=0";

    $getSalesTarget_result = $db->query($getSalesTarget);
    $getSalesTarget_row = $db->fetchByAssoc($getSalesTarget_result);

    //sales target amount
    $salesTarget = intval($getSalesTarget_row['total_sales']);
    $salesTarget = intval(($salesTarget / 365) * $day_diff);
    $salesTarget = $salesTarget / 100000;

    $opportunities_won = intval($getSalesTarget_row['total_op']);
    $opportunities_won = intval(($opportunities_won / 365) * $day_diff);
    $opportunities_won = $opportunities_won / 100000;

    // $salesTarget = round($salesTarget, 2);
    return array($salesTarget, $opportunities_won);
}

function getOpportunitiesDetails($date_start, $date_end, $team_id, $user_id, $sales_stage, $date_type) {
    global $db;
    echo $sales_stage."----------".$getOpp_total = "SELECT count(o.id) as id, sum(o.amount_usdollar) as amount FROM opportunities o
		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = o.assigned_user_id WHERE sg.securitygroup_id = '$team_id' and su.securitygroup_id =  '$team_id' and su.primary_group=1 AND sg.module = 'Opportunities' AND o." . $date_type . " between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id' and sg.deleted=0 and su.deleted=0 " . $sales_stage;
    echo "<br>";
    $getOpp_total_res = $db->query($getOpp_total);
    $getOpp_total_res_row = $db->fetchByAssoc($getOpp_total_res);
    $id = $getOpp_total_res_row['id'];
    $amount = $getOpp_total_res_row['amount'];
    $amount = $amount / 100000;
    return array($amount, $id);
}

function getActivitiesDetails($date_start, $date_end, $team_id, $user_id, $module) {
    global $db;
    $getActivities = "SELECT count(a.id) as count FROM " . strtolower($module) . " a LEFT JOIN securitygroups_records sg ON a.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = '$module' AND a.date_start between '$date_start' and '$date_end' AND a.assigned_user_id='$user_id' and a.deleted=0 AND a.status='Held' and sg.deleted=0";

    $getActivities_res = $db->query($getActivities);
    $getActivities_res_row = $db->fetchByAssoc($getActivities_res);
    if (($user_id == '1a026b69-3745-4525-45c1-4edf2c2d9532') && ($team_id == '3306cb16-11f0-2c20-865b-4edf58cce893') && $module == 'Meetings') {
        return $getActivities_res_row['count'] + 1;
    } else {
        return $getActivities_res_row['count'];
    }
}

function getArchitect_contanct_values($date_start, $date_end, $team_id, $user_id) {
    global $db;
    $getArchitect_contanct_values = "SELECT count(ac.id) as count4 FROM `arch_architects_contacts` ac LEFT JOIN securitygroups_records sg ON ac.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = ac.assigned_user_id WHERE su.securitygroup_id =  '$team_id' and su.primary_group=1 AND su.user_id = ac.assigned_user_id and sg.securitygroup_id = '$team_id' AND sg.module = 'Arch_Architects_Contacts' AND ac.date_entered between '$date_start' AND '$date_end' AND ac.assigned_user_id='$user_id'  AND ac.deleted=0 and sg.deleted=0 and su.deleted=0";
    $getArchitect_res = $db->query($getArchitect_contanct_values);
    $getArchitect_res_row = $db->fetchByAssoc($getArchitect_res);
    return $getArchitect_res_row['count4'];
}

function getArchitectActivities($date_start, $date_end, $team_id, $user_id, $module) {
    global $db;
    $getActivities = "SELECT count(c.id) as countcalls FROM " . $module . " c  LEFT JOIN securitygroups_records sg ON c.id = sg.record_id WHERE sg.securitygroup_id = '$team_id' AND sg.module = 'Arch_Architects_Contacts' AND c.date_entered between '$date_start' and '$date_end'  AND c.parent_type ='Arch_Architects_Contacts'  AND c.assigned_user_id='$user_id' AND  c.status='Held' AND c.deleted=0 and sg.deleted=0 ";
    $get_count_res = $db->query($getActivities);
    $get_count_res_row = $db->fetchByAssoc($get_count_res);
    return $get_count_res_row['countcalls'];
}

?>