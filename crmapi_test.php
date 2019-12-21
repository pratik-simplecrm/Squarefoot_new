<?php
/*
Author : Akash D.
email  : akash@simplecrm.com.sg
date   : 18th April 2018

*/


/*  NOTE : Pleae send the below list of parameters based on the form. Do not send all the form fields at the same time. Below is just a sample parameters for all forms */

$postData = array(

/* ====== contact us form parameters start ======= */	
'name'=>'contact us form',
'email'=>'test@gmail.com',
'contact_no'=>'9876543210',
'city' => 'Nagpur',
'lead_source' => 'Web Site',
'designation' => 'Architech',
'product' => 'Solid wood floors',
'color' => 'Light',
'species' => 'Jatoba',
'message' => 'I would like to have this product for my new construction work.',

/* ====== contact us form parameters end ======= */	

/* ====== view catalouge form parameters start ======= */
'name'=>'view catalouge form',
'email'=>'test1@gmail.com',
'contact_no'=>'1478523690',
'brochure' => 'Outdoor Surface',
/* ====== view catalouge form parameters end ======= */	


/* ====== view catalouge form parameters start ======= */	
'name'=>'chat form 1',
'email'=>'test2@gmail.com',
'contact_no'=>'9638527420',
/* ====== view catalouge form parameters end ======= */	


);


$postData = json_encode($postData);
$url = 'https://squarefoot.simplecrmondemand.com/index.php?entryPoint=crmapi';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_HTTPHEADER, array('AuthorizedApplication:Squ@reFoot','RequestedMethod:Create',
                   'Content-Type: application/json',
               'Content-Length: ' . strlen($postData))
 );
$result = curl_exec($ch);
curl_close($ch);

echo $result;    // Here you will get result as Success:true and a message if data is saved OR if data not saved then Success:false and an error message

//EG. {"Success":true,"Message":"<some message>"}
 ?>
