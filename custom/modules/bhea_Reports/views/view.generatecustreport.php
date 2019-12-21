<?php

if(!defined('sugarEntry')) define('sugarEntry', true);
ini_set('display_errors','Off');
require_once('include/SugarCharts/SugarChartFactory.php');
require_once('include/MVC/View/SugarView.php');

class bhea_ReportsViewgeneratecustreport extends SugarView{

	private $chartDefs = array(
	 'chartType' => 'bar chart',
	 'base_url'=> 
	  array(  'module' => 'Accounts',
	   'action' => 'index',
	   'query' => 'true',
	   'searchFormTab' => 'advanced_search',
	   )   
	);

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
		
		$related_loan = $_REQUEST['related_loan'];
		if($related_loan == 'related_loan')
		{
			$check_value='checked';
		}else {
			$check_value='';
		}
			

		echo $html = <<<BOC
		<form name="frmcust" id="frmcust" action="index.php?module=bhea_Reports&action=generateCustReport" method="post">
		<p style="font-size:15px;padding:10px 0px;10px;0px;font-weight:bold">Customer Report</p>
		<body >
		<table width="100%" border="0" align="center" id="oppReportTable">
			<tr>	
				<td  width="15%" align="left" valign="middle" class="" >
					<b>From Date:</b>
				</td>
				
				<td  width="15%" align="left" valign="middle" class="" >
					<b>To Date:</b>
				</td>
								
				<td  width="25%" align="left" valign="middle" class="" >
					<b>Product:</b>
				</td>	
				
				<td  width="25%" align="left" valign="middle" class="" >
					<b>Branch:</b>
				</td>	
				<td  width="25%" align="left" valign="middle" class="" >
					<b> </b>
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
					<b>Loan: </b> <input type="checkbox" id="related_loan" name="related_loan" value="related_loan" $check_value>
					
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

        /*$stChartData = $this->ticketByStatus();

        $obSugarChart = SugarChartFactory::getInstance ();
        $rsResources = $obSugarChart->getChartResources ();
        $this->ss->assign ('GRAPH_RESOURCES', $rsResources );
        $this->ss->assign('OPP_CHART_DATA',$stChartData);
        $this->ss->display('custom/modules/bhea_Reports/tpls/opp_reports.tpl');*/

		$query_res = $this->sqlResult();
		if($query_res->num_rows > 0) {
			$html_rep = '<br/><br/><table width="100%" border="2" cellspacing="2" cellpadding="2" id="oppReportListView" >
				<tr height="20" style="display: table-row;">					
					<td style="background:#C0C0C0;"><b>Customer Name</b></td>
					<td style="background:#C0C0C0;"><b>Cust ID</b></td>
					<td style="background:#C0C0C0;"><b>Loan No.</b></td>
					<td style="background:#C0C0C0;"><b>Father First Name</b></td>
					<td style="background:#C0C0C0;"><b>Father Last Name</b></td>	
					<td style="background:#C0C0C0;"><b>Corr. Mobile</b></td>	
					<td style="background:#C0C0C0;"><b>PAN</b></td>							
					<td style="background:#C0C0C0;"><b>Product</b></td>					
					<td style="background:#C0C0C0;"><b>Branch Name</b></td>				
					<td style="background:#C0C0C0;"><b>Date Created</b></td>					
					<td style="background:#C0C0C0; display:none;"><b>Corr. Phone</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Correspondence Address Street</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Correspondence Address City</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Correspondence Address State</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Correspondence Address Postal Code</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Correspondence Address Country</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Permanent Address Street</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Permanent Address City</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Permanent Address State</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Permanent Address Postal Code</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Permanent Address Country</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Corr. Landmark1</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Corr. Landmark2</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Permanent Landmark1</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Permanent Landmark2</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Corr. Taluk</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Permanent Taluk</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Corr. Fax</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Permanent Phone</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Permanent Fax</b></td>
					<td style="background:#C0C0C0; display:none;"><b>DOB</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Business Key</b></td>
					<td style="background:#C0C0C0; display:none;"><b>PAN Ref. No.</b></td>
					<td style="background:#C0C0C0; display:none;"><b>PAN Ref. Dt.</b></td>
					<td style="background:#C0C0C0; display:none;"><b>GIR Ref. No.</b></td>
					<td style="background:#C0C0C0; display:none;"><b>GIR Ref. Dt.</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Tax State Description</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Categ Type Descr</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Bank Address</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Bank City</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Bank State</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Bank Pin Code</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Bank Country</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Account No</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Acc Type Shrt Descr</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Bank Shrt Descr</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Bank Branch</b></td>
					<td style="background:#C0C0C0; display:none;"><b>Assigned User Id</b></td>
				</tr>';
				$i=0;
			while($row = $db->fetchByAssoc($query_res)) {				
				$date_created = date('d/m/Y',strtotime($row[date_entered]));
				$i++;
				$html_rep .= '<tr height="20" style="display: table-row;">	
							<td><a href="index.php?module=Accounts&action=DetailView&record='.$row[cust_id].'">'.$row[cust_name].'</a></td>								
							<td>'.$row[custcode].'</td>
							<td>'.$row[loan_name].'</td>
							<td>'.$row[father_fname].'</td>
							<td>'.$row[father_lname].'</td>
							<td>'.$row[mobile].'</td>	
							<td>'.$row[pan].'</td>												
							<td>'.$row[product].'</td>					
							<td>'.$row[branch_name].'</td>													
							<td>'.$date_created.'</td>							
							<td style="display:none;">'.$row[corr_phone].'</td>
							<td style="display:none;">'.$row[billing_address_street].'</td>
							<td style="display:none;">'.$row[billing_address_city].'</td>
							<td style="display:none;">'.$row[billing_address_state].'</td>
							<td style="display:none;">'.$row[billing_address_postalcode].'</td>
							<td style="display:none;">'.$row[billing_address_country].'</td>
							<td style="display:none;">'.$row[shipping_address_street].'</td>
							<td style="display:none;">'.$row[shipping_address_city].'</td>
							<td style="display:none;">'.$row[shipping_address_state].'</td>
							<td style="display:none;">'.$row[shipping_address_postalcode].'</td>
							<td style="display:none;">'.$row[shipping_address_country].'</td>
							<td style="display:none;">'.$row[corr_landmark1_c].'</td>
							<td style="display:none;">'.$row[corr_landmark2_c].'</td>
							<td style="display:none;">'.$row[permanent_landmark1_c].'</td>
							<td style="display:none;">'.$row[permanent_landmark2_c].'</td>
							<td style="display:none;">'.$row[corr_taluk_c].'</td>
							<td style="display:none;">'.$row[permanent_taluk_c].'</td>
							<td style="display:none;">'.$row[corr_fax].'</td>
							<td style="display:none;">'.$row[permanent_phone_c].'</td>
							<td style="display:none;">'.$row[permanent_fax_c].'</td>
							<td style="display:none;">'.$row[dob_c].'</td>
							<td style="display:none;">'.$row[business_key_c].'</td>
							<td style="display:none;">'.$row[pan_refno_c].'</td>
							<td style="display:none;">'.$row[pan_refdt_c].'</td>
							<td style="display:none;">'.$row[gir_refno_c].'</td>
							<td style="display:none;">'.$row[gir_refdt_c].'</td>
							<td style="display:none;">'.$row[tax_state_description_c].'</td>
							<td style="display:none;">'.$row[categ_type_descr_c].'</td>
							<td style="display:none;">'.$row[bank_address_c].'</td>
							<td style="display:none;">'.$row[bank_city_c].'</td>
							<td style="display:none;">'.$row[bank_state_c].'</td>
							<td style="display:none;">'.$row[bank_postalcode_c].'</td>
							<td style="display:none;">'.$row[bank_country_c].'</td>
							<td style="display:none;">'.$row[account_no_c].'</td>
							<td style="display:none;">'.$row[acc_type_shrt_descr_c].'</td>
							<td style="display:none;">'.$row[bank_shrt_descr_c].'</td>
							<td style="display:none;">'.$row[bank_branch_c].'</td>
						</tr>';
			}
			//echo $html_rep .= '<tr> Total Record Count : '.$i.' </tr></table>';
			echo $html_rep .= '</table>';
		}

    }

    function ticketByStatus(){
		global $db;

		$stReturnString = '';
		$groupBy = "GROUP BY c.status ORDER BY c.status";
		$count = ", count(*) total_count";

		$query_res = $this->sqlResult($groupBy, $count);
		if($query_res->num_rows > 0) {
			while($row = $db->fetchByAssoc($query_res)) {
				if($row['status'] == '') $row['status']='-None-';
				$arLeadChartDat[$row['status']] = $row['total_count'];
			}
		}

		$obSugarChart = SugarChartFactory::getInstance();
		$sugarChart->group_by = array('ss','status');

		$obSugarChart->setData($arLeadChartDat);
		$obSugarChart->setProperties('Ticket By Status', '', $this->chartDefs['chartType']);
		$obSugarChart->base_url=$this->chartDefs['base_url'];
		$obSugarChart->url_params = array();

		$xmlFile = $obSugarChart->getXMLFileName('ticket_by_status');
		$obSugarChart->saveXMLFile($xmlFile, $obSugarChart->generateXML());
		$stReturnString=$obSugarChart->display('ticket_by_status', $xmlFile, "100%", '480');

		return $stReturnString;
         
    }

	function sqlResult($groupBy=NULL, $count=NULL) {	
		global $db,$app_list_strings;
			
		//Product Type - Search Value
		$productType       = $_REQUEST['product_type'];		
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
		
		//$related_loan_condition = "";
		
		$check = $_REQUEST['related_loan'];
		
		if($check == 'related_loan') {
			$related_loan_condition = "	JOIN bhea_loans_accounts_c la 
										ON (la.bhea_loans_accountsaccounts_ida=a.id)
										
										JOIN bhea_loans l 
										ON (l.id=la.bhea_loans_accountsbhea_loans_idb)
																							
										JOIN bhea_loans_bhea_demographics_c ld 
										ON (ld.bhea_loans_bhea_demographicsbhea_loans_idb=l.id)	
										
										JOIN bhea_demographics bd 
										ON (bd.id=ld.bhea_loans_bhea_demographicsbhea_demographics_ida)
										
										JOIN quote_products_bhea_loans_1_c pl 
										ON (pl.quote_products_bhea_loans_1bhea_loans_idb=l.id)
										
										JOIN quote_products p 
										ON (p.id=pl.quote_products_bhea_loans_1quote_products_ida)
										";
										
			$related_loan_condition_and ="
										AND l.deleted=0
										AND la.deleted=0 
										AND ld.deleted=0
										AND pl.deleted=0
										AND p.deleted=0	
									";
			$additional_column = ",l.name loan_name,p.name product, bd.name branch_name";		
			$sub_query =" ";
		}
		else{
			$related_loan_condition = " ";
			$related_loan_condition_and =" ";
			$additional_column = " ";	
			
			$sub_query ="AND a.id NOT IN (SELECT a.id FROM accounts a JOIN accounts_cstm ac ON ac.id_c=a.id JOIN bhea_loans_accounts_c la ON (la.bhea_loans_accountsaccounts_ida=a.id) JOIN bhea_loans l ON (l.id=la.bhea_loans_accountsbhea_loans_idb) WHERE a.deleted=0 AND l.deleted=0 AND la.deleted=0 )";
		}
		
		//Main Query
		$my_query = "SELECT a.id cust_id, a.name cust_name,ac.pan_c pan, ac.code_c custcode, a.phone_alternate mobile, a.date_entered,
					ac.fathers_first_name_c father_fname, ac.father_last_name_c father_lname, a.phone_office corr_phone, a.billing_address_street, a.billing_address_city, a.billing_address_state, a.billing_address_postalcode, a.billing_address_country, a.shipping_address_street, a.shipping_address_city, a.shipping_address_state, a.shipping_address_postalcode, a.shipping_address_country, ac.corr_landmark1_c, ac.corr_landmark2_c, ac.permanent_landmark1_c, ac.permanent_landmark2_c, ac.corr_taluk_c, ac.permanent_taluk_c, a.phone_fax corr_fax, ac.permanent_phone_c, ac.permanent_fax_c, ac.dob_c, ac.business_key_c, ac.pan_refno_c, ac.pan_refdt_c, ac.gir_refno_c, ac.gir_refdt_c, ac.tax_state_description_c, ac.categ_type_descr_c, ac.bank_address_c, ac.bank_city_c, ac.bank_state_c, ac.bank_postalcode_c, ac.bank_country_c, ac.account_no_c, ac.acc_type_shrt_descr_c, ac.bank_shrt_descr_c, ac.bank_branch_c $additional_column
					
					FROM accounts a
					
					JOIN accounts_cstm ac ON ac.id_c=a.id
					
					$related_loan_condition
					
					WHERE a.deleted=0 
					$related_loan_condition_and	
					AND a.date_entered between '$present_month_st%' 
					AND '$present_month_end%' 			
					$product_condition 
					$branch_condition
					$sub_query";
					
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
		document.frmcust.action='index.php?module=bhea_Reports&action=generateCustReport';
		document.frmcust.submit();
	}
}


//Clear the values
function resetValues() {
	 $("#from").val("");
	 $("#to").val("");	  	
	
	 $('#product_type option').attr('selected', false);	
	 $('#branch_type option').attr('selected', false);	  
}	

function exportExcel() {
								   
	var data='<table>'+$("#oppReportListView").html().replace(/<a\/?[^>]+>/gi, '')+'</table>';		
	$('body').prepend("<form method='post' action='custom_export.php' style='display:none' id='ReportTableData'><input type='hidden' name='report_name' value='Customer_Details' /><input type='text' name='tableData' value='"+data+"' ></form>");
	$('#ReportTableData').submit().remove();
	return false;

}


</script>
