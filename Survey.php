<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
global $db;
$id = null;
//Handle Cases Feedback
if(isset($_REQUEST['id'])){
	$id            = $_REQUEST['id'];
	$customer_id   = $_REQUEST['ci'];
	$customer_name = $_REQUEST['cn'];
	//Get Case details
$query = "Select id, created_by, assigned_user_id,name from opportunities where  id = '$id' and deleted = 0";
	$result = $db->query($query);
	$ans = $db->fetchbyassoc($result);
	$assigned_user_id = $ans['assigned_user_id'];
	//Get Technician Name
	//$technician_name = $ans['created_by'];
	 $id = $ans['id'];
        $technician_name =  $ans['name'];
	//Set Contact Details
	$customer_name = $customer_name;	
}
?>
<html>
	<head>
		<link rel="icon" href="favicon.ico" type="image/ico">
		<title>Squarefoot</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .outer{
                width:88%;
                margin: 0 auto;
                font-family: sans-serif;
                border: solid 1px;
                font-size: 14px;
            }
            .big_table{
                width:90%;
                margin: 0 auto;
            }
            .big_table tr th{
                text-align: center;
                width:50%;
                padding: 3px 10px !important;
                background-color:  #ffc790;
            }
            .big_table tr td,.big_table tr th{
                border: solid 1px;
                border-collapse: collapse;
                padding: 10px;
            }
            .top_content,.bottom_content{
                padding: 10px;
                margin: 0 auto;
                width:90%;
            }
            .top_content{
                margin-top: 5px;
            }

            .bottom_content{
                margin-top:20px;
            }
            .bottom_content textArea{
                width: 100%;
            }
            .bottom_content .sq{
                margin-top: 10px;
            }
            .txt{
                width: 100%;
            }
            .logo{
                text-align: right;
                position: relative;

            }
            .logo img{
                width: 20%;
            }
            .small_table tr td{
                border: none;
            }
            .btn{
                text-align: center;
               
            }
            .submit{
                 
                font-size: bold;
                padding: 5px;
            }
        </style>
	</head>
	<body>
		
		<div class="logo">
                    <img src="custom/include/images/img.jpg" />
                </div>
		<hr />
<?php
if($id){
?>
		<form action="Submit_Survey.php" method="post">
		<table>
			<tr>
				<td align="left" valign="top">
					<font size="4" face="verdana">
						<?php echo $case_number;
						if(isset($_REQUEST['id'])){
						?>						
						<input type="hidden" name="opp_id" value="<?php echo $id; ?>" />
						<input type="hidden" name="assigned_user_id" value="<?php echo $assigned_user_id; ?>" />
						<?php
						}else{
						?>
						<input type="hidden" name="pb_id" value="<?php echo $id; ?>" />
						<?php
						}
						?>
					</font>
				</td>
			</tr>
			<tr>
						<?php  $dt = date("Y/m/d H:i:s"); ?>
						<input type="hidden" name="date_modified" value="<?php echo $dt; ?>" />
				<td align="left" valign="top">
					<font size="4" face="verdana">
						 Name
					</font>
				</td>
				<td align="left" valign="top">
					:
				</td>
				<td align="left" valign="top">
					<font size="4" face="verdana">
						<?php echo $technician_name?>
					</font>
				</td>
			</tr>
			<tr>
				<td align="left" valign="top">
					<font size="4" face="verdana">
						Customer name
					</font>
				</td>
				<td align="left" valign="top">
					:
				</td>
				<td align="left" valign="top">
					<font size="4" face="verdana">
						<?php echo $customer_name; ?>
					</font>
				</td>
			</tr>				
		</table>	
		<hr />
		<table cellspacing="0" cellpadding="0" class="big_table">
				<tr>
                            <th>Question</th>
                            <th>Response</th>
                        </tr>
                        <tr>
                            <td>How did you hear about us?</td>
                            <td>
                                <textarea class="txt" name="q1_c" id="q1_c" required></textarea>                               
                            </td>
                             
                        </tr>
                        <tr>
                            <td>What made you select Square Foot?</td>
                            <td>
                                <textarea class="txt" name="q2_c" id="q2_c" required></textarea>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Were the sales personnel helpful in choosing the right product for you?</td>
                            <td>
                                <table class="small_table">
                                    <tr>
                                        <td>
                                            <input type="radio" name="q3_c" id="q3_cy" value="Yes" checked />&nbsp; Yes
                                        </td>
                                        <td><input type="radio" name="q3_c" id="q3_cn" value="No"/>&nbsp; No</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>Were you satisfied with the range of products we had to offer?</td>
                            <td>
                                <table class="small_table">
                                    <tr>
                                        <td>
                                            <input type="radio" name="q4_c" id="q4_cy" value="Yes" checked />&nbsp; Yes
                                        </td>
                                        <td><input type="radio" name="q4_c" id="q4_cn" value="No"/>&nbsp; No</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>How would you rate the installation work done by us?</td>
                            <td>
                                <table class="small_table">
                                    <tr>
                                        <td>
                                            <input type="radio" name="q5_c" id="q5_ce" value="Excellent" checked />&nbsp;Excellent
                                        </td>
                                        <td>
                                            <input type="radio" name="q5_c" id="q5_cg" value="Good"/>&nbsp;Good
                                        </td>
                                        <td>
                                            <input type="radio" name="q5_c" id="q5_cs" value="Satisified"/>&nbsp;Satisfied
                                        </td>
                                        <td>
                                            <input type="radio" name="q5_c" id="q5_cn" value="Not Satisfied"/>&nbsp;Not Satisfied
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>Will you recommend us?</td>
                            <td>
                                <table class="small_table">
                                    <tr>
                                        <td>
                                            <input type="radio" name="q6_c" id="q6_cy" value="Yes" checked />&nbsp; Yes
                                        </td>
                                        <td><input type="radio" name="q6_c" id="q6_cn" value="No"/>&nbsp; No</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="bottom_content">
                    <div class="sq">We know that we have to walk many miles to still better our service levels to you. We will appreciate your valuable comments, feedback and any suggestions that can help us to serve you better.</div>
                    <div class="sq">
                        <textarea  rows="4" name="description" id="description" ></textarea>
                    </div>
                    <div class="sq">

                        <table>
                            <tr>
                                <td>May we publish your opinion?</td>
                                <td>
                                    <table class="small_table">
                                        <tr>
                                            <td>
                                                <input type="radio" name="q7_c" id="q7_cy" value="Yes" checked />&nbsp; Yes
                                            </td>
                                            <td><input type="radio" name="q7_c" id="q7_cn" value="No"/>&nbsp; No</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="btn">
                        <input type="submit" class="submit" name="submit" value="SUBMIT" />
                    </div>
                </div>
            </div>
		<br /><br />
<?php
}elseif(isset($_REQUEST['feedback_saved'])){
	echo "<font size='4' face='verdana'>";
        echo "<p>Thank you for your feedback.</p><p>Team Square Foot</p>";
	echo "</font>";	
}
?>
	</body>
</html>
