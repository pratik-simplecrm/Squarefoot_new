<?php

/*
Author : Akash D.
email  : akash@simplecrm.com.sg
date   : 18th April 2018

*/


if (!define('sugarEntry'))
    define('sugarEntry', true);
require_once('include/entryPoint.php');
global $db, $sugar_config;
$url = "https://squarefoot.simplecrmondemand.com/service/v4_1/rest.php";
$username = $sugar_config['asterisk_soapuser'];
$password = $sugar_config['asterisk_soappass'];

/*$apiModule = array(
    'Leads',
);
*/
$apiAction = array(
    'Create',
    'Update',
    'Fetch'
);

$authorize_keyword = "Squ@reFoot";

if ($_SERVER['HTTP_AUTHORIZEDAPPLICATION'] == $authorize_keyword && in_array($_SERVER['HTTP_REQUESTEDMETHOD'], $apiAction)) {
    
    $action = $_SERVER['HTTP_REQUESTEDMETHOD'];
  
    $fp      = fopen('php://input', 'r');
    $rawData = json_decode(stream_get_contents($fp));
    $GLOBALS['log']->fatal("The CRM entry point parameter for Leads creation from squarefoot : " . print_r($rawData, true));

    $session_id = generateSession($username, $password, $url);
    
    if ($action == 'Create') {
        
        $last_name          = $rawData->name;
        $email1             = $rawData->email;
        $city               = $rawData->city; 
        $phone_mobile       = $rawData->contact_no;
        $lead_source        = $rawData->lead_source;
        $designation_c      = $rawData->designation;
        $product_c          = $rawData->product;
        $product_color_c    = $rawData->color;
        $product_species_c  = $rawData->species;
        $description        = $rawData->message;
        $brochure_c         = $rawData->brochure;

        $status             = 'New';     
        $assigned_user_name = 'Administrator';
        
        if($primary_address_country!="India" || empty($$primary_address_country))
            {
                $primary_address_street= "India";
            }
           

        //Check Mobile number 
        if(!empty($phone_mobile)){
			$mobile_qry="SELECT id FROM leads WHERE phone_mobile = '$phone_mobile' AND deleted =0";
			$mobile_result =$db->query($mobile_qry);
			$lead_count = $mobile_result->num_rows;
			if($lead_count>0){
				$msg = array(
					'Success' => false,
					'Message' => 'Oops! the lead is alredy present in CRM'
				);
							echo json_encode($msg);
				exit;
				}
			}
		
		        //Check Empty record 	
         if(empty($phone_mobile) && empty($last_name)){
			
				$msg = array(
					'Success' => false,
					'Message' => 'Oops! the lead details are empty'
				);
							echo json_encode($msg);
				exit;
			}
              

         $name_value_list = array(
                array('name' => 'last_name','value' => $last_name),
                array('name' => 'email1','value' => $email1),
                array('name' => 'phone_mobile','value' => $phone_mobile),
                array('name' => 'lead_source','value' => $lead_source),
                array('name' => 'designation_c','value' => $designation_c),
                array('name' => 'product_c','value' => $product_c),
                array('name' => 'product_color_c','value' => $product_color_c),
                array('name' => 'product_species_c','value' => $product_species_c),
				array('name' => 'description','value' => $description),
                array('name' => 'primary_address_city','value' => $city),
                array('name' => 'primary_address_country','value' => "India"),
                array('name' => 'status','value' => $status),
                array('name' => 'assigned_user_name','value' => $assigned_user_name),
                array('name' => 'assigned_user_id','value' => '1'),
                array('name' => 'brochure_c','value' => $brochure_c),
              
         );
         
         $id = createrecord($session_id, 'Leads', $name_value_list, $url);
            
            $msg = array(
                'Success' => true,
                'Message' => 'Lead Created Successfully',
                'Lead id' => $id
            );
}
    
} else {
    $msg = array(
        'Success' => false,
        'Message' => 'Oops! Something went wrong'
    );
}
echo json_encode($msg);
exit;


//function to make cURL request
function call($method, $parameters, $url) {
    
    ob_start();
    $curl_request = curl_init();
    
    curl_setopt($curl_request, CURLOPT_URL, $url);
    curl_setopt($curl_request, CURLOPT_POST, 1);
    curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
    curl_setopt($curl_request, CURLOPT_HEADER, 1);
    curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl_request, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);
    
    $jsonEncodedData = json_encode($parameters);
    
    $post = array(
        "method" => $method,
        "input_type" => "JSON",
        "response_type" => "JSON",
        "rest_data" => $jsonEncodedData
    );
    
    curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
    $result = curl_exec($curl_request);
    curl_close($curl_request);
    
    $result   = explode("\r\n\r\n", $result, 2);
    $response = json_decode($result[1]);
    ob_end_flush();
    
    return $response;
}


function createrecord($session_id, $module, $create_entry_parameters, $url) {
    
    $set_entry_parameters = array(
        //session id
        "session" => $session_id,
        
        "module_name" => $module,
        
        //Record attributes
        "name_value_list" => $create_entry_parameters
    );
    
    $set_entry_result = call("set_entry", $set_entry_parameters, $url);
    
    
    $record_id = $set_entry_result->id;
    return $record_id;
    
}


function generateSession($username, $password, $url) {
    
    $login_parameters = array(
        "user_auth" => array(
            "user_name" => $username,
            "password" => md5($password),
            "version" => "1"
        ),
        "application_name" => "Rest",
        "name_value_list" => array()
    );
    
    $login_result = call("login", $login_parameters, $url);
    
    //get session id
    $session_id = $login_result->id;
    return $session_id;
}

// Function to get url
function geturl(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}


?>
