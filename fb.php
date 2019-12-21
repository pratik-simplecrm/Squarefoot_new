<?php

/**
 *  @copyright SimpleCRM http://www.simplecrm.com.sg
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SimpleCRM <info@simplecrm.com.sg>
 */

/*
* Main cron file of facebook integration(Lead management + Case management)
* Date        : Mar-08-2018
* Author      : Vivek Gaidhane <vivek@simplecrm.com.sg>
* PHP version : 5.6
* facebook api version : 2.12
*/

if(!defined('sugarEntry')) define('sugarEntry', true);
require_once('include/entryPoint.php');


global $sugar_config, $current_user, $db;

$user_id = '1';
$currentModule = 'SimpleCRM_Facebook_Connector';
require_once('modules/'.$currentModule.'/license/OutfittersLicense.php');

// get license status
/*$validate_license = OutfittersLicense::isValid($currentModule,$user_id,true);

if($validate_license !== true) {
    // License did NOT validate, Reason: $validate_license;

    $facebook_sent_concerned_person_email     = $sugar_config['facebook_sent_concerned_person_email'];
    if ($facebook_sent_concerned_person_email == 'no') {
        sendEmailNotification();
    }
    if (empty($facebook_sent_concerned_person_email)) {
        sendEmailNotification();
    }

} else {  */
    // License validated

    $facebook_sent_concerned_person_email     = $sugar_config['facebook_sent_concerned_person_email'];
    if (!empty($facebook_sent_concerned_person_email)) {
        if ($facebook_sent_concerned_person_email == 'yes') {
            resetSugarConfig("no");
        } 
    }

    doFacebookListening();
//}

function sendEmailNotification(){

    global $sugar_config;

    $facebook_concerned_person_email  = $sugar_config['facebook_concerned_person_email'];

    require_once('include/SugarPHPMailer.php');
    $emailObj = new Email();
    $defaults = $emailObj->getSystemDefaultEmail();
    $mail = new SugarPHPMailer();
    $mail->setMailerForSystem();
    $mail->From = $defaults['email'];
    $mail->From .= 'Content-type: text/html\r\n';
    $mail->FromName = $defaults['name'];
    $subject = 'License Expired : SimpleCRM Facebook Listener Add-on';
    $mail->Subject = $subject;
    $mail->IsHTML(true);

$body = <<<EOF
<p style = "margin-bottom: 0in;"><span style = "font-size: medium; font-family: verdana,geneva;">Dear Customer,<br /></span></p>
<p style = "margin-bottom: 0in;"><span style = "font-size: medium; font-family: verdana,geneva;"> Your License for SimpleCRM Facebook Listener Add-on has been expired, please renew/ purchase license from https://www.sugaroutfitters.com/addons/sugarcrm-facebook-listener If you have any further queries, please contact at <span style = "color: #0000ff;"><span lang = "en-US"><span style = "text-decoration: underline;"><a href = "mailto:support@sugaroutfitters.com">support@sugaroutfitters.com</a></span></span></span></span>.</span></p>
<p style = "margin-bottom: 0in;"><span style = "font-size: medium; font-family: verdana,geneva;">We're glad you chose SimpleCRM Facebook Listener Add-on.  If you have any feedback or questions, please let us know—we're always happy to help, please feel free to contact us at <span style = "color: #0000ff;"><span lang = "en-US"><span style = "text-decoration: underline;"><a href = "mailto:support@simplecrm.com.sg">support@simplecrm.com.sg</a></span></span></span></span>.</span></p>
<p style = "margin-bottom: 0in;">&nbsp;</p>
<p style = "margin-bottom: 0in;"><span style = "font-size: medium; font-family: verdana,geneva;">Regards,</span></p>
<p style = "margin-bottom: 0in;"><span style = "font-size: medium; font-family: verdana,geneva;">SimpleCRM Team</span></p>
EOF;

    $mail->Body = $body;
    $mail->prepForOutbound();

    if (empty($facebook_concerned_person_email)) {
        $GLOBALS['log']->fatal("Email Not Send : No concerned person's email");
    }
    if (!empty($facebook_concerned_person_email)) {

        $mail->AddAddress($facebook_concerned_person_email);
        //$mail->AddBCC('support@simplecrm.com.sg');
        $mail->AddCC('support@simplecrm.com.sg');

        //@$mail->Send();

        if (!$mail->Send()){
            $GLOBALS['log']->fatal('Email Send : Error Info:'.$mail->ErrorInfo);
        }else{
            resetSugarConfig("yes");
        }
    }
}

function resetSugarConfig($value){

    global $sugar_config;
    require_once 'modules/Configurator/Configurator.php';
    $configurator = new Configurator();
    $configurator->loadConfig(); // it will load existing configuration in config variable of object
    $configurator->config['facebook_sent_concerned_person_email'] = $value;
    $configurator->saveConfig(); // save changes
}


function doFacebookListening(){

global $sugar_config, $current_user, $db, $sugar_version;

$suitecrm_version  = $sugar_config['suitecrm_version'];

$access_token   = $sugar_config['facebook_page_access_token'];
$page_id        = $sugar_config['facebook_page_id'];
$page_name      = $sugar_config['facebook_page_name'];
$keywords_leads = $sugar_config['facebook_keywords_lead'];
$keywords_cases = $sugar_config['facebook_keywords_case'];

/*
$facebook_api_version  = $sugar_config['facebook_api_version'];
$lead_assigned_user_id = $sugar_config['facebook_lead_assigned_user_id'];
$case_assigned_user_id = $sugar_config['facebook_case_assigned_user_id'];
$prefered_days         = $sugar_config['facebook_page_data_prefered_days'];
$current_user_id       = $sugar_config['facebook_record_current_user_id'];
*/

// get this value from config file/other ways
$facebook_api_version    = "v2.12";
$lead_assigned_user_id   = "1";
$case_assigned_user_id   = "1";
$prefered_days           = "10";
$current_user->id        = "1"; // To avoid empty created_by and edited_by field
// $current_user->id = $assigned_user_id;

$keyword_array_leads  = explode(',', $keywords_leads);
$keyword_array_cases  = explode(',', $keywords_cases);

$prefered_days_before_timestamp   = strtotime("-".$prefered_days." day");
$current_timestamp                = strtotime("now");

// Get page data
try {
    //$page_details       = "https://graph.facebook.com/".$page_id."/feed?&method=GET&access_token=" .$access_token;

     $page_details       = "https://graph.facebook.com/".$page_id."/feed?since=".$prefered_days_before_timestamp."&until=".$current_timestamp."&method=GET&access_token=" .$access_token;

    //~ $response           = @file_get_contents($page_details);
    $response           = curl_get_file_contents($page_details);
    $response           = json_decode($response);
    $data               = $response->data;
   //print_r($data);
} catch (Exception $e) {
   // echo 'Caught Exception: ',  $e->getMessage(), "\n";
   $GLOBALS['log']->fatal('Caught Exception while retrieving page data :'.$e->getMessage());
}


foreach($data as $data_comment){

    $comment_id             = $data_comment->id;
    $message                = $data_comment->message;
    $message_created_time   = $data_comment->created_time;
    $message                = strtolower($message);
    $message_for_crm        = $data_comment->message;

    //LEAD MANAGEMENT - Start
    foreach ($keyword_array_leads as $lead_keyword) {
			
			if (in_array("*All*", $keyword_array_leads)){
			  $lead_keyword=$message;
			  }elseif(in_array("*None*", $keyword_array_leads)){
				  $lead_keyword=false;
			  }else{ 
			   $lead_keyword  = strtolower($lead_keyword);
			   }

        if ( strpos( trim($message), trim($lead_keyword) ) !== false){

            $user_details= "https://graph.facebook.com/".$comment_id."?fields=from,created_time,updated_time&method=GET&access_token=" .$access_token;
            //~ $user_response = @file_get_contents($user_details);
            $user_response = curl_get_file_contents($user_details);
            $user_response = json_decode($user_response);

            $message_from      = $user_response->from;
            $message_from_name = $message_from->name;
            $message_from_id   = $message_from->id;
        
            // Create Leads - start
            $message_from_first_name = "";
            $message_from_last_name  = $message_from_name;
           
            $fb_link_to_user ="https://www.facebook.com/".$message_from_id;
            $fb_link_to_post ="https://www.facebook.com/".$comment_id;

            $lead_full_name                = $message_from_name;
            $lead_first_name               = $message_from_first_name;
            $lead_last_name                = $message_from_last_name;
            $lead_facebook_id              = $message_from_id;
            $time_and_date_of_post         = $message_created_time; // $Published_date
            $time_and_date_of_post_split   = split("T", $time_and_date_of_post);
            $date                          = $time_and_date_of_post_split['0'];
            $time                          = str_replace("+0000","",$time_and_date_of_post_split['1']);
            $time                          = rtrim($time_and_date_of_post_split['1'], "+0000");
            $time_corrected                = date('H:i:s', strtotime('+330 minutes', strtotime($time))); // for time_zone : +5:30
            $time_and_date_of_post_correct = $date." ".$time_corrected;

            $lead_description         = "Post : ".$message_for_crm." \n Posted On : ".$time_and_date_of_post_correct." \n Link to Facebook Profile : ".$fb_link_to_user." \n Link to Post : ".$fb_link_to_post;

                $lead = new Lead();
                $lead->first_name              = $lead_first_name;
                $lead->last_name               = $lead_last_name;
                $lead->lead_source             = "Facebook";
                $lead->description             = $lead_description;
                $lead->assigned_user_id        = $lead_assigned_user_id;
                $lead->posted_message_id_c     = $comment_id;
                $lead->post_from_id_c          = $message_from_id;
                $lead->status                  = "New";


            // consider deleted = 0 also if needed.
            $query1  =   "SELECT id_c FROM leads_cstm, leads WHERE id = id_c AND posted_message_id_c = '$comment_id'";
            $value1  =   $db->query($query1);
            $check1  =   $get_values_row1  = $db->fetchByAssoc($value1);

            if(!$check1){
                $lead->save();
            }
            // Create Leads - end

            // create notes based on user reply/comment to comment in fb - start
            $page_details2      = "https://graph.facebook.com/".$comment_id."/comments?&method=GET&access_token=" .$access_token;
            //~ $response2          = @file_get_contents($page_details2);
            $response2          = curl_get_file_contents($page_details2);
            $response2          = json_decode($response2);
            $data_out40         = $response2->data;

            foreach($data_out40 as $data_out50_comment){

                $comment_id_out50             = $data_out50_comment->id;
                $message_out50                = $data_out50_comment->message;
                $message_from_name_out50      = $data_out50_comment->from->name;
                $message_from_id_out50        = $data_out50_comment->from->id;
                $message_created_time_out50   = $data_out50_comment->created_time;

                $query9  =   "SELECT id_c FROM leads_cstm,leads WHERE id_c = id AND deleted = 0  AND posted_message_id_c = '$comment_id' ";
                $result9 =   $db->query($query9);
                $check9  =   $get_values_row9  = $db->fetchByAssoc($result9);

                $lead_id_c = $get_values_row9['id_c'];

                $time_and_date_of_post         = $message_created_time_out50; // $Published_date
                $time_and_date_of_post_split   = split("T", $time_and_date_of_post);
                $date                          = $time_and_date_of_post_split['0'];
                $time                          = str_replace("+0000","",$time_and_date_of_post_split['1']);
                $time                          = rtrim($time_and_date_of_post_split['1'], "+0000");
                $time_corrected                = date('H:i:s', strtotime('+330 minutes', strtotime($time))); // for time_zone : +5:30
                $time_and_date_of_post_correct = $date." ".$time_corrected;
                $fb_link_to_user               = "https://www.facebook.com/".$message_from_id_out50;
                $fb_link_to_post               = "https://www.facebook.com/".$comment_id_out50;

                $note_description         = "Post : ".$message_out50." \n Posted On : ".$time_and_date_of_post_correct." \n Link to Facebook Profile : ".$fb_link_to_user." \n Link to Post : ".$fb_link_to_post;

                $parent_type        = "Leads";
                $parent_id          = $lead_id_c;
                $name               = "Facebook : ".$message_out50;
                $note_description   = $note_description;
                $post_data_in_fb    = "posted";

                $note = new Note();
                $note->name                  = $name;
                $note->description           = $note_description;
                $note->parent_type           = $parent_type;
                $note->parent_id             = $parent_id;
                $note->assigned_user_id      = $lead_assigned_user_id;
                $note->post_id_c             = $comment_id;
                $note->comment_id_c          = $comment_id_out50;
                $note->post_data_in_fb_c     = $post_data_in_fb;

                //consider deleted = 0 also if needed.
                $query8  = "SELECT id_c FROM notes_cstm, notes WHERE id = id_c AND post_id_c = '$comment_id' and comment_id_c = '$comment_id_out50' ";
                $value8  =   $db->query($query8);
                $check8  =   $get_values_row8  = $db->fetchByAssoc($value8);

                if(!$check8){
                    if($message_from_name_out50 != $page_name  ){
                        $note->save();
                    }
                }

                 $page_details3= "https://graph.facebook.com/".$comment_id_out50."/comments?&method=GET&access_token=" .$access_token;
                //~ $response3 = @file_get_contents($page_details3);
                $response3 = curl_get_file_contents($page_details3);
                $response3= json_decode($response3);

                $data_out60  = $response3->data;
                foreach($data_out60 as $data_out70_comment){

                    $comment_id_out70             = $data_out70_comment->id;
                    $message_out70                = $data_out70_comment->message;
                    $message_from_name_out70      = $data_out70_comment->from->name;
                    $message_from_id_out70        = $data_out70_comment->from->id;
                    $message_created_time_out70   = $data_out70_comment->created_time;

                    $query90  =   "SELECT id_c FROM leads_cstm,leads WHERE id_c = id AND deleted = 0  AND posted_message_id_c = '$comment_id' ";
                    $result90 =   $db->query($query90);
                    $check90  =   $get_values_row90  = $db->fetchByAssoc($result90);

                    $lead_id_c = $get_values_row90['id_c'];

                    $time_and_date_of_post         = $message_created_time_out70; // $Published_date
                    $time_and_date_of_post_split   = split("T", $time_and_date_of_post);
                    $date                          = $time_and_date_of_post_split['0'];
                    $time                          = str_replace("+0000","",$time_and_date_of_post_split['1']);
                    $time                          = rtrim($time_and_date_of_post_split['1'], "+0000");
                    $time_corrected                = date('H:i:s', strtotime('+330 minutes', strtotime($time))); // for time_zone : +5:30
                    $time_and_date_of_post_correct = $date." ".$time_corrected;


                    $fb_link_to_user ="https://www.facebook.com/".$message_from_id_out70;
                    $fb_link_to_post ="https://www.facebook.com/".$comment_id_out70;

                    $note_description         = "Post : ".$message_out70." \n Posted On : ".$time_and_date_of_post_correct." \n Link to Facebook Profile : ".$fb_link_to_user." \n Link to Post : ".$fb_link_to_post;

                    $parent_type        = "Leads";
                    $parent_id          = $lead_id_c;
                    $name               = "Facebook : ".$message_out70;
                    $note_description   = $note_description;
                    $post_data_in_fb    = "posted";

                        $note2 = new Note();
                        $note2->name                  = $name;
                        $note2->description           = $note_description;
                        $note2->parent_type           = $parent_type;
                        $note2->parent_id             = $parent_id;
                        $note2->assigned_user_id      = $lead_assigned_user_id;
                        $note2->post_id_c             = $comment_id;
                        $note2->comment_id_c          = $comment_id_out50;
                        $note2->comment_reply_id_c    = $comment_id_out70;
                        $note2->post_data_in_fb_c     = $post_data_in_fb;

                    // consider deleted = 0 also if needed.
                    $query80  = "SELECT id_c FROM notes_cstm, notes WHERE id = id_c AND post_id_c = '$comment_id' and comment_reply_id_c = '$comment_id_out70' and comment_id_c = '$comment_id_out50' ";
                    $value80  =   $db->query($query80);
                    $check80  =   $get_values_row80  = $db->fetchByAssoc($value80);

                    if(!$check80){
                        if($message_from_name_out70 != $page_name ){
                            $note2->save();
                        }
                    }

                }

            }
            // create notes based on user reply/comment to comment in fb - end

            // comment note content in fb post - start
            $query2  = "SELECT id_c FROM leads_cstm,leads WHERE id_c = id AND deleted = 0 AND posted_message_id_c = '$comment_id' ";
            $result2 = $db->query($query2);
            $check2  =   $get_values_row2  = $db->fetchByAssoc($result2);
            if($check2){

                $lead_record_id  = $get_values_row2['id_c'];
                $parent_type     = 'Leads';
                $query8          = "SELECT id, name, description FROM notes, notes_cstm WHERE id=id_c AND parent_type ='$parent_type' AND parent_id ='$lead_record_id' AND post_data_in_fb_c !='posted' AND deleted = 0 ";
                $result8         = $db->query($query8);

                $comments = new stdClass;
                $comments->data = array();

                while($row8 = $db->fetchByAssoc($result8)){
                    $comment = new stdClass;
                    $comment->description = $row8['description'];
                    $comment->id = $row8['id'];
                    $comment->name = $row8['name'];
                    $comments->data[] = $comment;
                }

                $comments_data = $comments->data;
                foreach($comments_data as $comt_data){

                    $note_description = $comt_data->description;
                    $note_id          = $comt_data->id;
                    $note_description = urlencode($note_description);

                    if($note_description != ''){
                        $page_details5 = "https://graph.facebook.com/".$comment_id."/comments?method=POST&message=".$note_description."&access_token=" .$access_token;
                        $response5     = curl_get_file_contents($page_details5);
                        //$response5   = json_decode($response5);
                        $query800      = "update notes, notes_cstm set post_data_in_fb_c ='posted' WHERE id=id_c AND  id_c ='$note_id'  AND deleted = 0 ";
                        $result800     = $db->query($query800);
                    }
                }
            }
            // comment note content in fb post - end

            break; // found lead keyword in the comment.
        }
    }

    //LEAD MANAGEMENT - End

    //CASE MANAGEMENT - Start

    foreach ($keyword_array_cases as $case_keyword) {
		
		if (in_array("*All*", $keyword_array_cases)){
			  $case_keyword=$message;
			  }elseif(in_array("*None*", $keyword_array_cases)){
				  $case_keyword=false;
			  }else{ 
			   $case_keyword  = strtolower($case_keyword);
			   }

        if ( strpos( trim($message), trim($case_keyword) ) !== false){

            $user_details= "https://graph.facebook.com/".$comment_id."?fields=from,created_time,updated_time&method=GET&access_token=" .$access_token;
            //~ $user_response = @file_get_contents($user_details);
            $user_response = curl_get_file_contents($user_details);
            $user_response = json_decode($user_response);

            $message_from      = $user_response->from;
            $message_from_name = $message_from->name;
            $message_from_id   = $message_from->id;
        
            // Create Cases - start

            $message_from_first_name = "";
            $message_from_last_name  = $message_from_name;

            $fb_link_to_user ="https://www.facebook.com/".$message_from_id;
            $fb_link_to_post ="https://www.facebook.com/".$comment_id;

            $time_and_date_of_post         = $message_created_time; // $Published_date  
            $time_and_date_of_post_split   = split("T", $time_and_date_of_post);
            $date                          = $time_and_date_of_post_split['0'];
            $time                          =  str_replace("+0000","",$time_and_date_of_post_split['1']);
            $time                          = rtrim($time_and_date_of_post_split['1'], "+0000");
            $time_corrected                = date('H:i:s', strtotime('+330 minutes', strtotime($time))); // for time_zone : +5:30
            $time_and_date_of_post_correct = $date." ".$time_corrected;

            /*
            $case_description         = "<p>Post:".$message_for_crm." </p><p> Posted On : ".$time_and_date_of_post_correct
                                       ." </p><p> Link to Facebook Profile : "."<a href='$fb_link_to_user' target='_blank'>$fb_link_to_user</a>"." </p><p> Link to Post : "."<a href='$fb_link_to_post' target='_blank'>$fb_link_to_post</a>"."</p>";

            */

            /*                                       
            $case_description         = "<p>Post:".$message_for_crm." </p><p> Posted On : ".$time_and_date_of_post_correct
                                       ." </p><p> Link to Facebook Profile : ".$fb_link_to_user." </p><p> Link to Post : ".$fb_link_to_post."</p>";

            */

            if(preg_match( "/^6.*/", $sugar_version)) {

                    //$case_description         = "<p>Post:".$message_for_crm." </p><p> Posted On : ".$time_and_date_of_post_correct." </p><p> Link to Facebook Profile : ".$fb_link_to_user." </p><p> Link to Post : ".$fb_link_to_post."</p>";

                if (!empty($suitecrm_version)) {
                    $case_description         = "<p>Post:".$message_for_crm." </p><p> Posted On : ".$time_and_date_of_post_correct." </p><p> Link to Facebook Profile : ".$fb_link_to_user." </p><p> Link to Post : ".$fb_link_to_post."</p>";
                }
                if (empty($suitecrm_version)) {
                    $case_description         = "Post : ".$message_for_crm." \n Posted On : ".$time_and_date_of_post_correct." \n Link to Facebook Profile : ".$fb_link_to_user." \n Link to Post : ".$fb_link_to_post;    
                }

            } 
            else {
                    $case_description         = "Post : ".$message_for_crm." \n Posted On : ".$time_and_date_of_post_correct." \n Link to Facebook Profile : ".$fb_link_to_user." \n Link to Post : ".$fb_link_to_post;

            }

            $account_name       = "SimpleWorks";
            $account_id         = "31a03ef8-38aa-4eb8-b538-55d6acffda3f";
            $case_priority      = "P2";
            $case_status        = "Open_New";

            if (empty($suitecrm_version)) {
                $case_status    = "New";   
            }

            $subject            = "Facebook : ".$message_for_crm;
            $description        = $message_for_crm.' - '.$message_from_name;
            $team_id            = "1";
            $case_source        = "Facebook";
            $state              = "Open";

            $case = new aCase();

            $case->name                    = $subject;
            $case->status                  = $case_status;
            $case->priority                = $case_priority;
            $case->source_c                = $case_source;
            //$case->account_name            = $account_name;
            //$case->account_id              = $account_id;
            $case->description             = $case_description;
            $case->assigned_user_id        = $case_assigned_user_id;
            $case->posted_message_id_c     = $comment_id;
            $case->post_from_id_c          = $message_from_id;
            $case->post_from_first_name_c  = $message_from_first_name;
            $case->post_from_last_name_c   = $message_from_last_name;
            $case->state                   = $state;
            $case->type                    = "Other";

            global $db;

            //consider deleted = 0 also if needed
            $query1  = "SELECT id_c FROM cases_cstm, cases WHERE id = id_c AND posted_message_id_c = '$comment_id'";
            $value1  =   $db->query($query1);
            $check1  =   $get_values_row1  = $db->fetchByAssoc($value1);

            if(!$check1){
            $case->save();
            }

            // Create Cases - end

        // create notes based on user reply/comment to comment in fb - start
        $user_details2 = "https://graph.facebook.com/".$comment_id."/comments?&method=GET&access_token=" .$access_token;
            //~ $response2 = @file_get_contents($user_details2);
            $response2 = curl_get_file_contents($user_details2);
            $response2 = json_decode($response2);
            $data_outu = $response2->data;

            foreach($data_outu as $data_outu_comment) {

                $comment_id_outu             = $data_outu_comment->id;
                $message_outu                = $data_outu_comment->message;
                $message_from_name_outu      = $data_outu_comment->from->name;
                $message_from_id_outu        = $data_outu_comment->from->id;
                $message_created_time_outu   = $data_outu_comment->created_time;

                $query9  = "SELECT id_c FROM cases_cstm,cases WHERE id_c = id AND deleted = 0  AND posted_message_id_c = '$comment_id' ";
                $result9   = $db->query($query9);
                $check9    = $get_values_row9  = $db->fetchByAssoc($result9);
                $case_id_c = $get_values_row9['id_c'];

                $parent_type        = "Cases";
                $parent_id          = $case_id_c;
                $name               = "Facebook : ".$message_outu;
                $team_id            = "1";
                $post_data_in_fb    ="posted";

                $time_and_date_of_post         = $message_created_time_outu; // $Published_date
                $time_and_date_of_post_split   = split("T", $time_and_date_of_post);
                $date                          = $time_and_date_of_post_split['0'];
                $time                          = str_replace("+0000","",$time_and_date_of_post_split['1']);
                $time                          = rtrim($time_and_date_of_post_split['1'], "+0000");
                $time_corrected                = date('H:i:s', strtotime('+330 minutes', strtotime($time))); // for time_zone : +5:30
                $time_and_date_of_post_correct = $date." ".$time_corrected;

                $fb_link_to_user ="https://www.facebook.com/".$message_from_id_outu;
                $fb_link_to_post ="https://www.facebook.com/".$comment_id_outu;

                $note_description         = "Post : ".$message_outu." \n Posted On : ".$time_and_date_of_post_correct." \n Link to Facebook Profile : ".$fb_link_to_user." \n Link to Post : ".$fb_link_to_post;


                    // Save Note
                    $note = new Note();
                    $note->name                  = $name;
                    $note->description           = $note_description;
                    $note->parent_type           = $parent_type;
                    $note->parent_id             = $parent_id;
                    $note->assigned_user_id      = $case_assigned_user_id;
                    $note->post_id_c             = $comment_id;
                    $note->comment_id_c          = $comment_id_outu;
                    $note->post_data_in_fb_c     = $post_data_in_fb;

                global $db;

                // consider deleted = 0 condition also.
                $query8  = "SELECT id_c FROM notes_cstm, notes WHERE id = id_c AND post_id_c = '$comment_id' and comment_id_c = '$comment_id_outu' ";
                $value8  =   $db->query($query8);
                $check8  =   $get_values_row8  = $db->fetchByAssoc($value8);

                if(!$check8){
                    if($message_from_name_outu != $page_name ){
                        $note->save();
                    }
                }

                $user_details3 = "https://graph.facebook.com/".$comment_id_outu."/comments?&method=GET&access_token=" .$access_token;
                //~ $response3     = @file_get_contents($user_details3);
                $response3     = curl_get_file_contents($user_details3);
                $response3     = json_decode($response3);
                $data_outuu    = $response3->data;

                foreach($data_outuu as $data_outuu_comment) {

                     $comment_id_outuu             = $data_outuu_comment->id;
                     $message_outuu                = $data_outuu_comment->message;
                     $message_from_name_outuu      = $data_outuu_comment->from->name;
                     $message_from_id_outuu        = $data_outuu_comment->from->id;
                     $message_created_time_outuu   = $data_outuu_comment->created_time;

                    $query90   = "SELECT id_c FROM cases_cstm,cases WHERE id_c = id AND deleted = 0  AND posted_message_id_c = '$comment_id' ";
                    $result90  = $db->query($query90);
                    $check90   = $get_values_row90  = $db->fetchByAssoc($result90);
                    $case_id_c = $get_values_row90['id_c'];

                    $parent_type        = "Cases";
                    $parent_id          = $case_id_c;
                    $name               = "Facebook : ".$message_outuu;
                    $team_id            = "1";
                    $post_data_in_fb    = "posted";

                    $time_and_date_of_post         = $message_created_time_outuu; // $Published_date
                    $time_and_date_of_post_split   = split("T", $time_and_date_of_post);
                    $date                          = $time_and_date_of_post_split['0'];
                    $time                          = str_replace("+0000","",$time_and_date_of_post_split['1']);
                    $time                          = rtrim($time_and_date_of_post_split['1'], "+0000");
                    $time_corrected                = date('H:i:s', strtotime('+330 minutes', strtotime($time))); // for time_zone : +5:30
                    $time_and_date_of_post_correct = $date." ".$time_corrected;

                    $fb_link_to_user ="https://www.facebook.com/".$message_from_id_outuu;
                    $fb_link_to_post ="https://www.facebook.com/".$comment_id_outuu;

                    $note_description         = "Post : ".$message_outuu." \n Posted On : ".$time_and_date_of_post_correct." \n Link to Facebook Profile : ".$fb_link_to_user." \n Link to Post : ".$fb_link_to_post;

                        // Save Note
                        $note2 = new Note();
                        $note2->name                  = $name;
                        $note2->description           = $note_description;
                        $note2->parent_type           = $parent_type;
                        $note2->parent_id             = $parent_id;
                        $note2->assigned_user_id      = $case_assigned_user_id;
                        $note2->post_id_c             = $comment_id;
                        $note2->comment_id_c          = $comment_id_outu;
                        $note2->comment_reply_id_c    = $comment_id_outuu;
                        $note2->post_data_in_fb_c     = $post_data_in_fb;
                       
                    global $db;

                    // consider deleted = 0 also.
                    $query80  = "SELECT id_c FROM notes_cstm, notes WHERE id = id_c AND post_id_c = '$comment_id' and comment_reply_id_c = '$comment_id_outuu' and comment_id_c = '$comment_id_outu' ";
                    $value80  =   $db->query($query80);
                    $check80  =   $get_values_row80  = $db->fetchByAssoc($value80);

                    if(!$check80){
                        if($message_from_name_outuu != $page_name ){
                            $note2->save();
                        }
                    }

                }

            }
            // create notes based on user reply/comment to comment in fb - end

            // comment note content in fb post - start
            $query2  = "SELECT id_c FROM cases_cstm,cases WHERE id_c = id AND deleted = 0 AND posted_message_id_c = '$comment_id'";
            $result2 = $db->query($query2);
            $check2  =   $get_values_row2  = $db->fetchByAssoc($result2);
            if($check2){

                $case_record_id  = $get_values_row2['id_c'];
                $parent_type = 'Cases';
                $query8      = "SELECT id, name, description FROM notes, notes_cstm WHERE id=id_c AND parent_type ='$parent_type' AND parent_id ='$case_record_id' AND post_data_in_fb_c !='posted' AND deleted = 0 ";
                $result8     = $db->query($query8);

                $comments = new stdClass;
                $comments->data = array();

                while($row8 = $db->fetchByAssoc($result8)){
                    $comment = new stdClass;
                    $comment->description = $row8['description'];
                    $comment->id = $row8['id'];
                    $comment->name = $row8['name'];
                    $comments->data[] = $comment;
                }

                $comments_data = $comments->data;

                foreach($comments_data as $comt_data){

                    $note_description = $comt_data->description;
                    $note_id          = $comt_data->id;
                    $note_description = urlencode($note_description);

                    if($note_description != ''){
                        $page_details5 = "https://graph.facebook.com/".$comment_id."/comments?method=POST&message=".$note_description."&access_token=" .$access_token;
                        //~ $response5     = @file_get_contents($page_details5);
                        $response5     = curl_get_file_contents($page_details5);
                        //$response5   = json_decode($response5);
                        $query800      = "update notes, notes_cstm set post_data_in_fb_c ='posted' WHERE id=id_c AND  id_c ='$note_id'  AND deleted = 0 ";
                        $result800     = $db->query($query800);
                    }
                }

            }
            // comment note content in fb post - end

         break; // found case keyword in the comment.
        }
    }
    //CASE MANAGEMENT - End

} // main foreach

}



function curl_get_file_contents($URL) {
		$c = curl_init();
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_URL, $URL);
		curl_setopt($c,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($c,CURLOPT_SSL_VERIFYHOST,false);
		$contents = curl_exec($c);
		$err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
		curl_close($c);
		if ($contents) return $contents;
		else return FALSE;
	}
?>
