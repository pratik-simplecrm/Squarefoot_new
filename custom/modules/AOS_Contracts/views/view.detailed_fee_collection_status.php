<?php
// Written By: Aditya Harshey
// Date: 21 Aug 2017

if(!defined('sugarEntry')) define('sugarEntry', true);
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

ini_set('display_errors','off');

class AOS_ContractsViewdetailed_fee_collection_status extends SugarView {
	
    function __construct(){    
        parent::SugarView();
    }
    
    function display()
	{
		global $sugar_config,$db,$app_list_strings;
		// ob_clean();
		// print_r($app_list_strings);exit();
		// print_r($_REQUEST['batches']);exit;
		if (isset($_REQUEST['batches']) && $_REQUEST['batches']) {
			$where_bacthes = ' AND scrm_batches_cstm.batch_no_c IN ('.implode(',', $_REQUEST['batches']).') ';	
		}

		$where = '';
		$url = $sugar_config['site_url'];	
		$sql = "
 			SELECT 
				scrm_batches_cstm.batch_no_c,
				scrm_students_cstm.registration_number_c,
				scrm_students_cstm.id_c,
				CONCAT(scrm_students.first_name,' ',scrm_students.last_name) as name,
				scrm_students_cstm.registration_number_c,
				SUM(CASE WHEN scrm_payment_cstm.payment_type_c = 'Token_Advance' THEN scrm_payment_cstm.effective_fee_c ELSE 0 END) as Token_Advance,
				SUM(CASE WHEN scrm_payment_cstm.payment_type_c = 'Installment_1' THEN scrm_payment_cstm.effective_fee_c ELSE 0 END) as Installment_1,
				SUM(CASE WHEN scrm_payment_cstm.payment_type_c = 'Installment_2' THEN scrm_payment_cstm.effective_fee_c ELSE 0 END) as Installment_2,
				SUM(CASE WHEN scrm_payment_cstm.payment_type_c = 'Installment_3' THEN scrm_payment_cstm.effective_fee_c ELSE 0 END) as Installment_3,
				SUM(CASE WHEN scrm_payment_cstm.payment_type_c = 'Complete_Fee' THEN scrm_payment_cstm.effective_fee_c ELSE 0 END) as Complete_Fee, 
				SUM(scrm_payment_cstm.discount_provided_c) as discounts,
				aos_products.name as course_name,
				aos_products.id as course_id,
				aos_products.price
			FROM scrm_batches
			INNER JOIN scrm_batches_cstm ON scrm_batches.id = scrm_batches_cstm.id_c
			INNER JOIN scrm_batches_scrm_students_1_c ON scrm_batches_scrm_students_1_c.scrm_batches_scrm_students_1scrm_batches_ida = scrm_batches.id
			INNER JOIN scrm_students ON scrm_students.id = scrm_batches_scrm_students_1_c.scrm_batches_scrm_students_1scrm_students_idb
			INNER JOIN scrm_students_cstm ON scrm_students_cstm.id_c = scrm_students.id
			LEFT JOIN aos_products_scrm_batches_1_c ON aos_products_scrm_batches_1_c.aos_products_scrm_batches_1scrm_batches_idb = scrm_batches.id
			LEFT JOIN aos_products ON aos_products.id = aos_products_scrm_batches_1_c.aos_products_scrm_batches_1aos_products_ida
			LEFT JOIN scrm_students_scrm_payment_1_c ON scrm_students_scrm_payment_1_c.scrm_students_scrm_payment_1scrm_students_ida = scrm_students.id
			LEFT JOIN scrm_payment ON scrm_payment.id = scrm_students_scrm_payment_1_c.scrm_students_scrm_payment_1scrm_payment_idb
			LEFT JOIN scrm_payment_cstm ON scrm_payment.id = scrm_payment_cstm.id_c
			WHERE scrm_batches.deleted = '0'
			AND scrm_students.deleted = '0'
			AND scrm_students_scrm_payment_1_c.deleted = '0'
			AND scrm_payment.deleted = '0'
			AND scrm_batches_scrm_students_1_c.deleted = '0'
			$where_bacthes
			GROUP BY scrm_batches_cstm.batch_no_c, scrm_students_cstm.registration_number_c				
		";

		require_once('custom/modules/AOS_Contracts/database.php');
		$query=$connection->prepare($sql);

		$query->execute();
		
		while($row_enquiry=$query->fetch()){
			$data .='<tr>';

			$data .= '<td>'.$row_enquiry['registration_number_c'].'</td>';
			$data .= '<td><a href="'.$sugar_config['site_url'].'/index.php?module=scrm_Students&action=DetailView&record='.$row_enquiry['id_c'].'&return_module=scrm_Students" >'.$row_enquiry['name'].'</a></td>';
			// echo html_entity_decode(htmlentities(mb_convert_encoding($row_enquiry['course_name'], 'UTF-8', 'ASCII'), ENT_SUBSTITUTE, "UTF-8"));exit;
			$data .= '<td><a href="'.$sugar_config['site_url'].'/index.php?module=AOS_Products&action=DetailView&record='.$row_enquiry['course_id'].'&return_module=AOS_Products" >'.preg_replace('/[\x00-\x1F\x7F-\xFF]/', ' - ', $row_enquiry['course_name']).'</a></td>';
			$data .= '<td>'.number_format($row_enquiry['price'], 2).'</td>';
			$data .= '<td>'.number_format($row_enquiry['discounts'], 2).'</td>';
			$data .= '<td>'.number_format(($row_enquiry['price'] - $row_enquiry['discounts']), 2).'</td>';
			$data .= '<td>'.number_format($row_enquiry['Token_Advance'], 2).'</td>';
			$data .= '<td>'.number_format($row_enquiry['Installment_1'], 2).'</td>';
			$data .= '<td>'.number_format($row_enquiry['Installment_2'], 2).'</td>';
			$data .= '<td>'.number_format($row_enquiry['Installment_3'], 2).'</td>';
			$data .= '<td>'.number_format(($row_enquiry['Token_Advance'] + $row_enquiry['Installment_1'] + $row_enquiry['Installment_2'] + $row_enquiry['Installment_3']), 2).'</td>';
			$data .= '<td>'.number_format((($row_enquiry['price'] - $row_enquiry['discounts']) -($row_enquiry['Token_Advance'] + $row_enquiry['Installment_1'] + $row_enquiry['Installment_2'] + $row_enquiry['Installment_3'])), 2).'</td>';
			$data .='</tr>';

			
		}

		$batches_sql = "SELECT 
							scrm_batches_cstm.batch_no_c
						FROM scrm_batches
						INNER JOIN scrm_batches_cstm ON scrm_batches.id = scrm_batches_cstm.id_c
						WHERE 
							scrm_batches.deleted = '0'
		";

		
		$query2=$connection->prepare($batches_sql);

		$query2->execute();
		$batch_dropdown = array();
		while($row_enquiry=$query2->fetch()){
			$batch_dropdown[] = $row_enquiry['batch_no_c'];
		}
		$batch_dropdown = array_unique($batch_dropdown);

		$batch_dropdown_string = '<select name="batches[]" multiple>';
		foreach ($batch_dropdown as $key => $value) {
			if (in_array($value, $_REQUEST['batches'])) {
				$batch_dropdown_string .= '<option value='.$value.' selected>'.$value.'</option>';
			}else{
				$batch_dropdown_string .= '<option value='.$value.'>'.$value.'</option>';
			}
			
		}		

		$batch_dropdown_string .= '</select>';

// header('Content-Type: text/html; charset=utf-8'); 

		echo '<!DOCTYPE html>
<html lang="en">

	<body>
	<style>
		.select2-container{
			width: 200px!important;
		}
		#dropdowns_table tr td{
			padding: 0!important;
		}
		a{
			cursor: pointer;	
		}
	</style>
		<form name = "run" method = "post" action = "" style="margin-top:50px">
			<div style = "background-color:#EEE">
				<br>
				<center>
					<h1>Detailed Fee Collection Status</h1>
					<br>
					<table width="10%" style="border-collapse: separate;border-spacing: 1em;" cellspacing="0" cellpadding="0" class="cell-border" id="dropdowns_table"> 
																									
						<tr>
							<td width="1%" style="text-align: left !important;"><b>Batches</b></td>
							<td width="1%" style="text-align: left !important;">'.$batch_dropdown_string.'</td>
						</tr>																		
					</table>
				</center>
				<br>
				<button type="submit" name="state" class="btn btn-primary">Run</button>
				&nbsp&nbsp&nbsp&nbsp
				<button id="clear"  class="btn btn-primary">Clear</button> 
				&nbsp&nbsp&nbsp&nbsp
				<button id="showquery" data-toggle="collapse" data-target="#demo" class="btn btn-primary btn-sm">Show Query</button>
			</div>
			<div id="showq" class="collapse">
				'.$sql.'
			</div>
		</form>
	</body>
</html>';			
		// $query=$connection->prepare($query);

		// $query->execute();

		// while($row_enquiry=$query->fetch()){
		// 	$data .='<tr>';
		// 	$data .='</tr>';
		// }
// // echo $data;exit();
	echo $html =<<<HTML
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="iso-8859-1">

			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

			<style>
			td,th
			{ text-align:center !important;}
			</style>
			<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
			<link rel="stylesheet" href="custom/modules/AOS_Contracts/Report.css" type="text/css">
			<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" type="text/css">
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0"/>

			<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
			<script type="text/javascript" language="javascript" class="init">
			</script>
		</head>

		<body class="dt-example">
			<div class="container" style="padding-top:40px">
				<section>
					
					<table id="example" class="table table-bordered" cellspacing="0" width="100%">
						<thead>	
							<tr>
								<td>Reg ID</td>
								<td>Name</td>
								<td>Course</td>
								<td>Course Fee</td>													
								<td>Discount  </td>
								<td>Total Fee Payable</td>
								<td>Registration</td>
								<td>1st Installment</td>
								<td>2nd Installment</td>
								<td>3rd Installment</td>
								<td>Paid Fees</td>
								<td>Balance Fees</td>
							</tr>
						</thead>


						<tbody>
							$data
						</tbody>
					</table>

					
						</div>

					</div>
				</section>
			</div>

		</body>
		 <script>
		  $(document).ready(function(){
			var table = $('#example').DataTable( {
				dom: 'Bfrtip',
		        buttons: [
            		{
		                extend: 'csvHtml5',
		                title: 'Detailed_Fee_Collection_Status_Report'
		            },
            		{
		                extend: 'excelHtml5',
		                title: 'Detailed_Fee_Collection_Status_Report'
		            },
            		{ extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'A4', title: 'Detailed Fee Collection Status Report' }
            		
        		]			
			} );
		    $('a.toggle-vis').on( 'click', function (e) {
		        e.preventDefault();
		 
		        // Get the column API object
		        var column = table.column( $(this).attr('data-column') );
		 
		        // Toggle the visibility
		        column.visible( ! column.visible() );
		    } );

		  	$('.select2').select2();
		  	$("#clear").click(function(){
					$("select option").removeAttr("selected");
					$('.select2').val("").trigger("change");
					return false;
				});	
			$("#showquery").click(function(){
				$('#showq').toggle();
					return false;
				});
			});
		  </script>
		</html>
			
HTML;


       
	} 

} //end of class
