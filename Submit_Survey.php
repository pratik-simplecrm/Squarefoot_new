<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
global $db;
//~ $id = null;
//~ exit;
//Handle Cases Feedback

$id = $_REQUEST['opp_id'];
//~ $case_id = $_REQUEST['case_id'];
//~ $date_modified = $_REQUEST['date_modified'];
$q1_c = $_REQUEST['q1_c'];
$q2_c = $_REQUEST['q2_c'];
$q3_c = $_REQUEST['q3_c'];
$q4_c= $_REQUEST['q4_c'];
$q5_c = $_REQUEST['q5_c'];
$q6_c = $_REQUEST['q6_c'];
$q7_c = $_REQUEST['q7_c'];
$description = $_REQUEST['description'];
$assigned_user_id = $_REQUEST['assigned_user_id'];
$date_modified = $_REQUEST['date_modified'];
       $objfeedback = BeanFactory::getBean('simpl_Feed_Back_Form');
       $objfeedback->opportunities_simpl_feed_back_form_1opportunities_ida = $id;
        $objfeedback->q1_c = $q1_c; 
        $objfeedback->q2_c = $q2_c; 
        $objfeedback->q3_c = $q3_c; 
        $objfeedback->q4_c = $q4_c; 
        $objfeedback->q5_c = $q5_c; 
        $objfeedback->q6_c = $q6_c; 
        $objfeedback->q7_c = $q7_c; 
        $objfeedback->description = $description; 
        //~ $objfeedback->feeback_service_rating_c = $service_rating;
        $objfeedback->assigned_user_id = $assigned_user_id; 
        $objfeedback->date_entered_c = $date_modified; 
    
       //HERE ONLY NAME IS CONSIDERED BUT BETTER TO PUT MORE FILTERING
//$qry1="select name from cases where name = '$installationCaseName' and deleted= 0 ";

		//$value1=$db->query($qry1);
                //$check1  =   $get_values_row1=$db->fetchByAssoc($value1);
		//if(!$check1)
		//{
		$objfeedback->save();	
		//}
       

#	feeback_case_id                         - case_id             - textfield - feeback_case_id_c
#	feedback_date_entered                   - 2016/03/11 11:37:40 - textfield - feedback_date_entered_c 
#	feedback_resolution_time                - Yes                 - textfield - feedback_resolution_time_c
#	feedback_explaination_time              - Yes                 - textfield - feedback_explaination_time_c 
#	feedback_resolution_result              - Yes                 - textfield - feedback_resolution_result_c
#	feedback_recommendation_time            - Yes                 - textfield - feedback_recommendation_time_c
#	feedback_recommendation_friend_likely_c - 10                  - textfield - feedback_recommend_friend_c
#	feedback_description                    - Good service.       - textarea  - feedback_description_c
#	feedback_on_website                     - Yes                 - textfield - feedback_on_website_c
#	feedback_submitted                      - no                  - textfield - feedback_submitted_c
#	feeback_email_sent                      - no                  - textfield - feeback_email_sent_c
#	feeback_service_rating                  - Excellent           - textfield - feeback_service_rating_c



#resolution time - Was your issue resolved the first time you reported it?
#explanation time - Was the engineer able to clearly articulate the troubleshooting steps on the call?
#resolution result - Were you able to understand the tech support engineer clearly?
#recommendation time - Will you recommend our service to your contacts?
#recommendation friend likely - How likely is it that you would recommend our company to friends or colleagues? - 10
#service rating - How would you rate your overall satisfaction with SimpleCRM Support? - Excellent
#description - Remarks/Comments:
#on website -Will you allow us to use these remarks as testimonial on our website and in print?
#edit_button, duplicate_button



//UPDATE cases_cstm  SET feedback_resolution_result_c = 'Yes' WHERE feedback_resolution_result_c IS NULL AND id_c='100b2987-d7d5-e20d-79b0-563a2782f72c';

//UPDATE cases_cstm  SET feedback_resolution_result_c = 'Yes' WHERE feedback_resolution_result_c IS NULL;

//SELECT feedback_resolution_result_c FROM `cases_cstm` WHERE id_c='100b2987-d7d5-e20d-79b0-563a2782f72c'


?>
<html>
	<head>
		<link rel="icon" href="favicon.ico" type="image/ico">
		<title>Squarefoot</title>
	</head>
	<body>
<center>
	<font size='4' face='verdana'>
        <p>Thank you for your feedback.</p><p>Team Square Foot</p>
	</font>	
<center>
<br />
<br />
<br />
<br /><br />
	</body>
</html>
