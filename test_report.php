<?php
  echo "Hare KRishna";
ini_set("display_errors", 1);
    global $db, $body, $body_main, $app_list_strings;
   echo'<pre>';
    global $sugar_config;
        $user_name = $db->query("Select id from users where deleted = 0 and reports_to_id = 'b4357f32-4d34-fda8-047f-4e1ef90d7d83'");
	$result_user_name = $db->fetchByAssoc($user_name);
	//echo $reports_to_id = $result_user_name['id'];
$users= get_reportsTo_id('b4357f32-4d34-fda8-047f-4e1ef90d7d83');
print_r($users);
$active_users=getactive_users($users);
print_r($active_users);

echo$user_team_list = " AND id IN ('" . implode("','",$active_users) . "')";
//$user_name = $db->query("Select id from users where deleted = 0 and status = 'ACTIVE'");
//	$result_user_name = $db->fetchByAssoc($user_name);

 function get_reportsTo_id($user_id){
    global $db;
    $array_id=[];
    $array_id[]=$user_id; // 
    $user_name = $db->query("Select id from users where deleted = 0 and reports_to_id = '$user_id'");
	while($result_user_name = $db->fetchByAssoc($user_name)){
         $reports_to_id = $result_user_name['id'];
         $array_id[]=$reports_to_id;
         $child_users = get_reportsTo_id($reports_to_id);
         $array_id = array_merge($array_id,$child_users);
         //print_r($child_users);
        }
	return $array_id;
}
function getactive_users($users){
    global $db;
    $active_array_id=[];
    //$i=0;
    foreach($users as $user_id){
        $user_result = $db->query("Select id ,user_name from users where deleted = 0 AND status = 'Active' and id = '$user_id'");
	 $row_active_user = $db->fetchByAssoc($user_result);
         $active_user_id = $row_active_user['id'];
         $active_user_name = $row_active_user['user_name'];
         if(!empty($active_user_id)){
             $active_array_id[]=$active_user_id;
             //$active_array_id[$i][0]=$active_user_id;
             //$active_array_id[$i][1]=$active_user_name;
             //$i++;
         }
    }
    
    return $active_array_id;
}
 
///echo "Hare krishna";
  
 
?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ``