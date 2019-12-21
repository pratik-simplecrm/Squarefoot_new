<?php

if(!defined('sugarEntry')) define('sugarEntry', true);
//ini_set('display_errors','On');
require_once('include/SugarCharts/SugarChartFactory.php');
require_once('include/MVC/View/SugarView.php');

class bhea_ReportsViewgenerateleadreport extends SugarView {
	
    function __construct(){    
        parent::SugarView();
    }

    function display(){

		global $sugar_config,$db,$app_list_strings;
		$site_url = $sugar_config['site_url'];	
		
		//From and To Date - Search value
		$from_date  = $_REQUEST['from'];
		$to_date    = $_REQUEST['to'];		
		
		//Product Type - Search Value
		$productType = $_REQUEST['product_type'];	
		
		//select all the products in the system
		 $query  = "SELECT P.name,P.id FROM quote_products AS P JOIN quote_products_cstm AS PC ON P.id=PC.id_c WHERE  P.deleted=0 AND PC.status_c='Active' ORDER BY P.name ASC";
		$query_res = $db->query($query);
		$product_options = '<option value=""></option>';
		if($query_res->num_rows > 0) {
			while($row = $db->fetchByAssoc($query_res)) {
				if(in_array($row[id],$productType)) {
					$product_options .= "<option value='$row[id]' selected='selected'>$row[name]</option>";
				} else {
					$product_options .= "<option value='$row[id]'>$row[name]</option>";
				}			
			}
		}

		//Branch Type - Search Value
		$branchType = $_REQUEST['branch_type'];	
		
		//select all the branches in the system
		$query = "SELECT name, unit from bhea_demographics AS B JOIN bhea_demographics_cstm AS BC ON B.id=BC.id_c WHERE B.deleted=0 AND  BC.status_c='Active'";
		$query_res = $db->query($query);
		$branch_options = '<option value=""></option>';
		if($query_res->num_rows > 0) {
			while($row = $db->fetchByAssoc($query_res)) {
				if(in_array($row[unit],$branchType)) {
					$branch_options .= "<option value='$row[unit]' selected='selected'>$row[name]</option>";
				} else {
					$branch_options .= "<option value='$row[unit]'>$row[name]</option>";
				}
			}
		}

		//set the lead source
		$lead_source_arr = $app_list_strings['lead_source_dom'];
		foreach($lead_source_arr as $key=>$value) {
			$lead_source .= "<option value=$key>$value</option>";
		}

		//set the lead status
		$lead_status_arr = $app_list_strings['lead_status_dom'];
		foreach($lead_status_arr as $key=>$value) {
			$lead_status .= "<option value=$key>$value</option>";
		}

		echo $html = <<<BOC
		<form name="frmloan" id="frmloan" action="index.php?module=bhea_Reports&action=generateLeadReport" method="post">
		<p style="font-size:15px;padding:10px 0px;10px;0px;font-weight:bold">Lead Report</p>
		<body >
		<table width="100%" border="0" align="center" id="leadReportTable">
			<tr>	
				<td  width="15%" align="left" valign="middle" class="" >
					<b>From Date:</b>
				</td>
				
				<td  width="15%" align="left" valign="middle" class="" >
					<b>To Date:</b>
				</td>
								
				<td  width="20%" align="left" valign="middle" class="" >
					<b>Product:</b>
				</td>	
				
				<td  width="20%" align="left" valign="middle" class="" >
					<b>Branch:</b>
				</td>		
				
				<td  width="15%" align="left" valign="middle" class="" >
					<b>Lead Source:</b>
				</td>

				<td  width="10%" align="left" valign="middle" class="" >
					<b>Status:</b>
				</td>					

			</tr>
			
			<tr>	
				<td>				
					<input type="text" id="from" name="from" size="10" value='$from_date'/> 
					<img border="0" src="themes/default/images/jscalendar.gif" id="fromb" align="absmiddle" />
					<script type="text/javascript">
						Calendar.setup({inputField    : "from",
						button        : "fromb",
						align         : "right"});
					</script>
				</td>
				
				<td>
					<input type="text" id="to" name="to" size="10" value='$to_date'/> 
				    <img border="0" src="themes/default/images/jscalendar.gif" id="tob" align="absmiddle" />	
				    <script type="text/javascript">
						Calendar.setup({inputField    : "to",
						button        : "tob",
						align         : "right"});
					</script>				
				</td>	
				
				<td>
					<select id="product_type" name="product_type[]" multiple>
						$product_options
					</select>					
				</td>				
				
				<td>
					<select id="branch_type" name="branch_type[]" multiple>
						$branch_options
					</select>			
				</td>	
				
				<td>
					<select id="branch_type" name="lead_source[]" multiple>
						$lead_source
					</select>
				</td>

				<td>
					<select id="branch_type" name="lead_status[]" multiple>
						$lead_status
					</select>
				</td>
				
			</tr>
			
			<tr>
				<td colspan="2" align="left" valign="middle">					
					<input type="submit" onClick="runReport()" id="run_report" name="run_report" value="Run Report" />
					<input type="button" onClick="exportExcel()" name="exportToExcel" id="exportToExcel" value="Export"">
					<input type="button" onClick="resetValues()" id="clear" name="clear" value="Clear" />
				</td>
			</tr>
		</table><br/><br/>
		</body>		
		</form>
BOC;
 
		$query_res = $this->sqlResult();
		if($query_res->num_rows > 0) {
			$html_rep = '<br/><br/><table width="100%" border="2" cellspacing="2" cellpadding="2" id="oppReportListView" >
				<tr height="20" style="display: table-row;">	
					<td style="background:#C0C0C0;"><b>Loan No</b></td>	
					<td style="background:#C0C0C0;"><b>Customer Name</b></td>
					<td style="background:#C0C0C0;"><b>Cust ID</b></td>		
					<td style="background:#C0C0C0;"><b>Product</b></td>					
					<td style="background:#C0C0C0;"><b>Branch Name</b></td>		
					<td style="background:#C0C0C0;"><b>Vehicle No</b></td>	
					<td style="background:#C0C0C0;"><b>Loan Amount</b></td>						
					<td style="background:#C0C0C0;"><b>Loan Maintained By</b></td>
					<td style="background:#C0C0C0;"><b>Date Created</b></td>	
					<td style="background:#C0C0C0; display:none;"><b>Loan Status</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Agreement Value</b></td>	
					<td style="background:#C0C0C0; display:none;"><b>Agreement Date</b></td>	
					<td style="background:#C0C0C0; display:none;"><b>First Due Date</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Last Due Date</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Proposal No.</b></td>		
					<td style="background:#C0C0C0; display:none;"><b>Vehicle</b></td>	
					<td style="background:#C0C0C0; display:none;"><b>Vehicle Model</b></td>	
					<td style="background:#C0C0C0; display:none;"><b>Vehicle Description</b></td>						
					<td style="background:#C0C0C0; display:none;"><b>Tenure</b></td>	
					<td style="background:#C0C0C0; display:none;"><b>Team Name</b></td>			
				</tr>';
			while($row = $db->fetchByAssoc($query_res)) {		
				$frst_date      = date('d/m/Y',strtotime($row[frst_due]));
				$last_date      = date('d/m/Y',strtotime($row[last_due]));		
				$date_created   = date('d/m/Y',strtotime($row[date_entered]));
				$agreement_date = date('d/m/Y',strtotime($row[agreement_date]));	
				
				$loan_amt       = number_format($row3['loan_amount'],2,'.',',');
				
				$loan_maintained = $row[ufname]." ".$row[ulname];			
				
				$html_rep .= '<tr height="20" style="display: table-row;">	
							<td><a href="index.php?module=bhea_Loans&action=DetailView&record='.$row[loan_id].'">'.$row[loan_name].'</a></td>	
							<td><a href="index.php?module=Accounts&action=DetailView&record='.$row[cust_id].'">'.$row[cust_name].'</a></td>								
							<td>'.$row[custcode].'</td>	
							<td>'.$row[product].'</td>					
							<td>'.$row[branch_name].'</td>	
							<td>'.$row[vehicle_no].'</td>	
							<td>'.$loan_amt.'</td>								
							<td>'.$loan_maintained.'</td>	
							<td>'.$date_created.'</td>	
							<td style="display:none;">'.$row[status].'</td>	
							<td style="display:none;">'.$row[agreement_value].'</td>	
							<td style="display:none;">'.$agreement_date.'</td>
							<td style="display:none;">'.$frst_date.'</td>							
							<td style="display:none;">'.$last_date.'</td>	
							<td style="display:none;">'.$row[proposal_no].'</td>	
							<td style="display:none;">'.$row[vehicle].'</td>
							<td style="display:none;">'.$row[vehicle_model].'</td>
							<td style="display:none;">'.$row[vehicle_description].'</td>
							<td style="display:none;">'.$row[tenure].'</td>	
							<td style="display:none;">'.$row[team_name].'</td>				
						</tr>';
			}
			echo $html_rep .= '</table>';
		}

    }

	function sqlResult($groupBy=NULL, $count=NULL) {	
		global $db,$app_list_strings;

		$where;
		//date entered from clause
		$present_month_st = (isset($_REQUEST['from'])) ? date("Y-m-d",strtotime($_REQUEST['from'])) : date("Y-m-01");
		$where.=" AND c.date_entered BETWEEN '".$query_builder['date_entered']['from']."' AND '".$def."'";

		//date entered to clause
		if(isset($query_builder['date_completed_c']['from'])) {
			$dcf = isset($query_builder['date_completed_c']['to']) ? $query_builder['date_completed_c']['to'] : date('Y-m-d H:i:s');
			$where.=" AND cs.date_completed_c BETWEEN '".$query_builder['date_completed_c']['from']."' AND '".$dcf."'";
		}
		//membership number clause
		if(isset($query_builder['legacy_number_c'])) {
			$where.=" AND ac.legacy_number_c ='".$query_builder['legacy_number_c']."'";
		}
		//member name clause
		if(isset($query_builder['accounts']['name']) && !in_array('all', $query_builder['accounts']['name'])) {
			//echo "inside";
			$member_names = implode("','", $query_builder['accounts']['name'])."'";
			$where.=" AND a.name in ('".$member_names.")";
		}
		//modus operandii clause
		if(isset($query_builder['modus_operandii_c'])) {
			$modus_op = implode("','", $query_builder['modus_operandii_c'])."'";
			$where.=" AND cs.modus_operandii_c in ('".$modus_op.")";
		}
		//case subject clause
		if(isset($query_builder['cases']['name'])) {
			$where.=" AND c.name LIKE '%".$query_builder['cases']['name']."%'";
		}
		//case type clause
		if(isset($query_builder['type_of_cases_c']) && !in_array('all', $query_builder['type_of_cases_c'])) {
			$case_types = implode("','", $query_builder['type_of_cases_c'])."'";
			$where.=" AND cs.type_of_cases_c in ('".$case_types.")";
		}
			
		//Product Type - Search Value
		$productType       = $_REQUEST['product_type'];
		//print_r($_REQUEST);
		$product_condition = "";
		if(!empty($productType)) {			
			$end_value = end($productType);		
			$product_condition = "AND (";	
			foreach($productType as $key=>$value) {					
				if($value != $end_value) {					
					$product_condition.= "p.id='$value' OR ";
				} else {
					$product_condition.= "p.id='$value' ) ";
				}						
			}		
		}			
			
		//Branch Type - Search Value
		$branchType = $_REQUEST['branch_type'];	
		//select all the branches in the system
		$branch_condition = "";
		if(!empty($branchType)) {			
			$end_value = end($branchType);		
			$branch_condition = "AND (";	
			foreach($branchType as $key=>$value) {					
				if($value != $end_value) {					
					$branch_condition.= "bd.id='$value' OR ";
				} else {
					$branch_condition.= "bd.id='$value' ) ";
				}						
			}		
		}
		
		//From and To Date - Search value
		$from_date  = $_REQUEST['from'];
		$to_date    = $_REQUEST['to'];
		
		if(!empty($from_date)) {
			$present_month_st = date("Y-m-d",strtotime($from_date));
		}
		else {
			$present_month_st = date("Y-m-01");
		}
		
		if(!empty($to_date)) {
			$present_month_end = date("Y-m-d",strtotime($to_date));
		}
		else {
			$present_month_end = date("Y-m-t");
		}		
				
		$date_condition = "AND l.date_entered between '$present_month_st%' AND '$present_month_end%' ";

		//Main Query
		$my_query = "SELECT l.id loan_id, l.name loan_name, l.vehicle_no vehicle_no, l.amount loan_amount,
					l.loan_status status, l.first_due_date frst_due, l.last_due_date last_due, a.id cust_id, a.name cust_name, ac.code_c custcode, l.date_entered, p.name product, bd.name branch_name, u.first_name ufname, u.last_name ulname, 
					t.name team_name, l.proposal_no, l.agreement_value, l.agreement_date, l.tenure, l.vehicle, l.vehicle_model, l.vehicle_description
					
					FROM bhea_loans l
					
					JOIN bhea_loans_cstm lc ON lc.id_c=l.id					
					JOIN bhea_loans_accounts_c la ON la.bhea_loans_accountsbhea_loans_idb=l.id
					JOIN accounts a ON a.id=la.bhea_loans_accountsaccounts_ida
					JOIN accounts_cstm ac ON ac.id_c=a.id
																						
					JOIN bhea_loans_bhea_demographics_c ld ON ld.bhea_loans_bhea_demographicsbhea_loans_idb=l.id																
					JOIN bhea_demographics bd ON bd.id=ld.bhea_loans_bhea_demographicsbhea_demographics_ida
					
					JOIN quote_products_bhea_loans_1_c pl ON pl.quote_products_bhea_loans_1bhea_loans_idb=l.id
					JOIN quote_products p ON p.id=pl.quote_products_bhea_loans_1quote_products_ida
					
					JOIN users u ON u.id=l.assigned_user_id
					JOIN team t ON t.id=l.team_id
					
					WHERE a.deleted=0 
					AND l.deleted=0
					AND la.deleted=0 
					AND ld.deleted=0
					AND pl.deleted=0
					AND p.deleted=0	
					AND u.deleted=0
					$child_loan_condition
					$date_condition		
					$product_condition $branch_condition";
		
		return $db->query($my_query);
	}

}

?>

<script type="text/javascript">
	
//select unselect functionality
function select_all(id) {
	$("#"+id+" option").prop("selected", 'selected');
}
function unselect_all(id) {
	$("#"+id+" option").prop("selected", false);
}

//Run the report
function runReport()
{
	var gt= document.getElementById("run_report").value;

	if(gt == 'Run Report')
	{
		document.frmloan.action='index.php?module=bhea_Reports&action=generateLeadReport';
		document.frmloan.submit();
	}
}


//Clear the values
function resetValues() {
	 $("#from").val("");
	 $("#to").val("");	  	
	
	 $('#product_type option').attr('selected', false);	
	 $('#branch_type option').attr('selected', false);	  
	 
	 //$('#child_loan').prop('checked', false);
	 document.getElementById("child_loan").checked = false;
}	

function exportExcel() {
								   
	var data='<table>'+$("#oppReportListView").html().replace(/<a\/?[^>]+>/gi, '')+'</table>';		
	$('body').prepend("<form method='post' action='custom_export.php' style='display:none' id='ReportTableData'><input type='hidden' name='report_name' value='Loans' /><input type='text' name='tableData' value='"+data+"' ></form>");
	$('#ReportTableData').submit().remove();
	return false;

}


</script>
