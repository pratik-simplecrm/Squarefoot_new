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

class AOS_ContractsViewbatch_wise_placement_status extends SugarView {
	
    function __construct(){    
        parent::SugarView();
    }
    
    function display()
	{
		global $sugar_config,$db,$app_list_strings;
		// ob_clean();
		// print_r($app_list_strings);exit();
		$where = '';
		$url = $sugar_config['site_url'];	
		$sql = "
			SELECT 
				scrm_batches_cstm.batch_no_c,
				scrm_batches.id,
				SUM(CASE WHEN scrm_placement_certification_cstm.placement_status_c = 'Placed_by_Emertxe' THEN 1 ELSE 0 END) as Placed_by_Emertxe,
				SUM(CASE WHEN scrm_placement_certification_cstm.placement_status_c = 'Placed_by_Self' THEN 1 ELSE 0 END) as Placed_by_Self,
				SUM(CASE WHEN scrm_placement_certification_cstm.placement_status_c = 'Not_Placed' THEN 1 ELSE 0 END) as Not_Placed,
				SUM(CASE WHEN scrm_placement_certification_cstm.placement_status_c = 'Discontinued' THEN 1 ELSE 0 END) as Discontinued,
				SUM(CASE WHEN scrm_placement_certification_cstm.placement_status_c = 'Placement_Chances_Exhausted' THEN 1 ELSE 0 END) as Placement_Chances_Exhausted,
				SUM(CASE WHEN scrm_placement_certification_cstm.placement_status_c = 'Blacklisted' THEN 1 ELSE 0 END) as Blacklisted,count(*) AS count
			FROM scrm_batches
			INNER JOIN scrm_batches_cstm ON scrm_batches.id = scrm_batches_cstm.id_c
			INNER JOIN scrm_batches_scrm_students_1_c ON scrm_batches_scrm_students_1_c.scrm_batches_scrm_students_1scrm_batches_ida = scrm_batches.id
			INNER JOIN scrm_students ON scrm_students.id = scrm_batches_scrm_students_1_c.scrm_batches_scrm_students_1scrm_students_idb
			INNER JOIN scrm_students_cstm ON scrm_students_cstm.id_c = scrm_students.id
			LEFT JOIN scrm_students_scrm_placement_certification_1_c ON scrm_students_scrm_placement_certification_1_c.scrm_students_scrm_placement_certification_1scrm_students_ida = scrm_students.id
			LEFT JOIN scrm_placement_certification ON scrm_placement_certification.id = scrm_students_scrm_placement_certification_1_c.scrm_studefae7ication_idb
			LEFT JOIN scrm_placement_certification_cstm ON scrm_placement_certification.id = scrm_placement_certification_cstm.id_c
			WHERE scrm_batches.deleted = '0'
			AND scrm_students.deleted = '0'
			GROUP BY scrm_batches_cstm.batch_no_c	
		";

		require_once('custom/modules/AOS_Contracts/database.php');
		$query=$connection->prepare($sql);

		$query->execute();

		while($row_enquiry=$query->fetch()){
			$data .='<tr>';

			$data .= '<td><a href="'.$sugar_config['site_url'].'/index.php?module=scrm_Batches&action=DetailView&record='.$row_enquiry['id'].'&return_module=scrm_Batches" >'.$row_enquiry['batch_no_c'].'</a></td>';

			$data .= '<td>'.$row_enquiry['count'].'</td>';

			if (isset($row_enquiry['Placed_by_Emertxe'])) {
				$data .= '<td>'.$row_enquiry['Placed_by_Emertxe'].'</td>';
			}

			if (isset($row_enquiry['Placed_by_Self'])) {
				$data .= '<td>'.$row_enquiry['Placed_by_Self'].'</td>';
			}

			if (isset($row_enquiry['Not_Placed'])) {
				$data .= '<td>'.$row_enquiry['Not_Placed'].'</td>';
			}

			if (isset($row_enquiry['Discontinued'])) {
				$data .= '<td>'.$row_enquiry['Discontinued'].'</td>';
			}

			if (isset($row_enquiry['Placement_Chances_Exhausted'])) {
				$data .= '<td>'.$row_enquiry['Placement_Chances_Exhausted'].'</td>';
			}

			if (isset($row_enquiry['Blacklisted'])) {
				$data .= '<td>'.$row_enquiry['Blacklisted'].'</td>';
			}

			$data .='</tr>';
		}


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
					<h1>Batch Wise Placement Status Report</h1>
					<br>

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
								<td>Batch ID</td>
								<td>Total Students</td>
								<td>Placed by us</td>
								<td>Placed by themselves</td>													
								<td>Not applicable </td>
								<td>Discontinued</td>
								<td>Placement chances exhausted</td>
								<td>Blacklisted</td>
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
		                title: 'Batch_Wise_Placement_Status_Report'
		            },
            		{
		                extend: 'excelHtml5',
		                title: 'Batch_Wise_Placement_Status_Report'
		            },
		            {
		                extend: 'pdfHtml5',
		                title: 'Batch Wise Placement Status Report'
		            },
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
