<?php
// Written By: Anjali Ledade
// Date: 22 Aug 2019

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

ini_set('display_errors','on');

class AOS_ContractsViewoverall_fee_collection_status extends SugarView {
	
    function __construct(){    
        parent::SugarView();
    }
    //echo "fdsfd";exit();
    function display()
	{
		global $sugar_config, $db, $app_list_strings;

		$url = $sugar_config['site_url'];

		# querty to fetch data
		$sql = "SELECT a.opportunity_count_c,a.quote_count_c,a.meeting_count_c,a.calls_count_c,a.contact_count_c,a.customers_count_c,a.architectural_firm_count_c,a.userid_c, u.first_name, u.last_name FROM cstm_activity_count_cstm as a inner join users as u ON u.id = a.userid_c inner join acl_roles_users as aclr on aclr.user_id = a.userid_c where aclr.role_id = '68ff0a83-d361-f468-e202-53a979ab3ce1'";
		// echo $sql;exit;
		$result=$db->query($sql);
	 
		# concat all values
		while ($row=$db->fetchByAssoc($result)) {

			 $data .='<tr>';

			 $data .= '<td>'.$row['first_name'].' '.$row['last_name'].'</td>';
			 $data .= '<td>'.$row['opportunity_count_c'].'</td>';
			 $data .= '<td>'.$row['quote_count_c'].'</td>';
			 $data .= '<td>'.$row['meeting_count_c'].'</td>';
			 $data .= '<td>'.$row['calls_count_c'].'</td>';
			 $data .= '<td>'.$row['contact_count_c'].'</td>';
			 $data .= '<td>'.$row['customers_count_c'].'</td>';
			 $data .= '<td>'.$row['architectural_firm_count_c'].'</td>';

			 $data .='</tr>';
		
		}	



		// while($row=$query->fetch()){
		// 	$data .='<tr>';
		// 	$data .='</tr>';
		// }
  // echo $data;exit();
			//echo "sDE";exit();
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
								<td>Users</td>
								<td>Opportunities</td>
								<td>Quote</td>
								<td>Meetings</td>													
								<td>Calls</td>
								<td>Contacts</td>
								<td>Customers</td>
								<td>Architectural Firms</td>
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
