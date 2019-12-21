<?php

if(!defined('sugarEntry')) define('sugarEntry', true);
//ini_set('display_errors','On');
require_once('include/SugarCharts/SugarChartFactory.php');
require_once('include/MVC/View/SugarView.php');

class bhea_ReportsViewgenerateticketreport extends SugarView{

	private $chartDefs = array(
	 'chartType' => 'bar chart',
	 'base_url'=> 
	  array(  'module' => 'Cases',
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
		
		//Ticket Status - Search Value
		$Status = $_REQUEST['status'];	
			
		//$status_options = '<option value=""></option>';
		$status_list = $app_list_strings['case_status_dom'];
		foreach($status_list as $key=>$value) {		
			if(in_array($value,$Status)) {
				$status_options .= "<option label='$value' value='$key' selected='selected'>$value</option>";
			} else {
				$status_options .= "<option label='$value' value='$key'>$value</option>";
			}
		}
		
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
		

		echo $html = <<<BOC
		<form name="frmticket" id="frmticket" action="index.php?module=bhea_Reports&action=generateTicketReport" method="post">
		<p style="font-size:15px;padding:10px 0px;10px;0px;font-weight:bold">Ticket Report</p>
		<body >
		<table width="100%" border="0" align="center" id="oppReportTable">
			<tr>
				<td  width="15%" align="left" valign="middle" class="" >
					<b>From Date:</b>
				</td>
				
				<td  width="15%" align="left" valign="middle" class="" >
					<b>To Date:</b>
				</td>
				
				<td  width="15%" align="left" valign="middle" class="" >
					<b>Status:</b>
				</td>				
				
				<td  width="25%" align="left" valign="middle" class="" >
					<b>Product:</b>
				</td>	
				
				<td  width="25%" align="left" valign="middle" class="" >
					<b>Branch:</b>
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
					<select id="status" name="status[]" multiple=true>
						$status_options
					</select>
					<!-- 
					<span style="text-decoration:underline;cursor:pointer;color:#0B578F" onclick="select_all('lead_source')">Select</span>&nbsp;/
					<span style="text-decoration:underline;cursor:pointer;color:#0B578F" onclick="unselect_all('lead_source')">Unselect All</span>
					-->
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
				
			</tr>
			
			<tr>
				<td colspan="2" align="left" valign="middle">					
					<input type="submit" onClick="runReport()" id="run_report" name="run_report" value="Run Report" />
					<input type="button" onClick="exportExcel()" name="exportToExcel" id="exportToExcel" value="Export"">
					<input type="button" id="clear" name="clear" value="Clear" onClick="resetValues()"/>
				</td>
			</tr>
		</table><br/><br/>
		</body>		
		</form>
BOC;

        $stChartData = $this->ticketByStatus();

        $obSugarChart = SugarChartFactory::getInstance ();
        $rsResources = $obSugarChart->getChartResources ();
        $this->ss->assign ('GRAPH_RESOURCES', $rsResources );
        $this->ss->assign('OPP_CHART_DATA',$stChartData);
        $this->ss->display('custom/modules/bhea_Reports/tpls/opp_reports.tpl');

		$query_res = $this->sqlResult();
		if($query_res->num_rows > 0) {
			$html_rep = '<br/><br/><table width="100%" border="2" cellspacing="2" cellpadding="2" id="oppReportListView" >
				<tr height="20" style="display: table-row;">
					<td style="background:#C0C0C0;"><b>Ticket Subject</b></td>
					<td style="background:#C0C0C0;"><b>Asset Model</b></td>
					<td style="background:#C0C0C0;"><b>Customer Name</b></td>
					<td style="background:#C0C0C0;"><b>Loans</b></td>
					<td style="background:#C0C0C0;"><b>Branch</b></td>
					<td style="background:#C0C0C0;"><b>Products</b></td>
					<td style="background:#C0C0C0;"><b>Activity</b></td>
					<td style="background:#C0C0C0;"><b>Disposition</b></td>
					<td style="background:#C0C0C0;"><b>Sub Disposition</b></td>
					<td style="background:#C0C0C0;"><b>Status</b></td>
					<td style="background:#C0C0C0;"><b>Priority</b></td>
					<td style="background:#C0C0C0;"><b>Ticket Description</b></td>
					<td style="background:#C0C0C0;"><b>Assigned To</b></td>
				</tr>';
			while($row = $db->fetchByAssoc($query_res)) {				
				$date_created = date('d/m/Y',strtotime($row[date_entered]));
				
				$html_rep .= '<tr height="20" style="display: table-row;">
							<td><a href="index.php?module=Cases&action=DetailView&record='.$row[case_id].'">'.$row[case_name].'</a></td>
							<td><a href="index.php?module=bhea_Asset_Model&action=DetailView&record='.$row[asset_id].'">'.$row[asset_name].'</a></td>
							<td><a href="index.php?module=Accounts&action=DetailView&record='.$row[cust_id].'">'.$row[cust_name].'</a></td>
							<td><a href="index.php?module=bhea_Loans&action=DetailView&record='.$row[loan_id].'">'.$row[loan_name].'</a></td>
							<td><a href="index.php?module=bhea_Demographics&action=DetailView&record='.$row[branch_id].'">'.$row[branch_name].'</a></td>
							<td><a href="index.php?module=quote_Products&action=DetailView&record='.$row[product_id].'">'.$row[product].'</a></td>
							<td>'.$row[activity_c].'</td>
							<td>'.$row[disposition_c].'</td>
							<td>'.$row[sub_disposition_c].'</td>
							<td>'.$row[status].'</td>
							<td>'.$row[priority].'</td>
							<td>'.$row[description].'</td>
							<td>'.$row[username].'</td>
						</tr>';
			}
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
		
		//Status - Search value
		$Status = $_REQUEST['status'];
		//DD values
		$status_list = $app_list_strings['case_status_dom'];
		
		//Check Status is empty or not in search
		$status_condition = "";
		if(!empty($Status)) {			
			$end_value = end($Status);		
			$status_condition = "AND (";	
			foreach($Status as $key=>$value) {			
				if(array_key_exists($value,$status_list)) {				
					if($value != $end_value) {					
						$status_condition.= "c.status='$value' OR ";
					} else {
						$status_condition.= "c.status='$value' ) ";
					}
				}
				else {
					$status_condition.="";
				}
			}		
		}
		//echo "<pre>";print_r($status_list);
		
		
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
					$branch_condition.= "cc.bhea_demographics_id_c='$value' OR ";
				} else {
					$branch_condition.= "cc.bhea_demographics_id_c='$value' ) ";
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
		
		//Main Query
		$my_query = "SELECT c.name case_name, c.id case_id, c.status, cc.ageing_c ageing, c.date_entered, 
							bd.name branch_name, bd.id branch_id, a.id cust_id, a.name cust_name, ac.code_c custcode, p.name product, p.id product_id,
							bam.name asset_name, bam.id asset_id, bl.name loan_name, bl.id loan_id, u.user_name username,
							cc.activity_c, cc.disposition_c, cc.sub_disposition_c, c.priority, c.assigned_user_id, c.description, c.resolution  $count 
							FROM cases c
							
							JOIN cases_cstm cc ON cc.id_c=c.id					
							JOIN accounts a ON a.id=c.account_id 
							JOIN accounts_cstm ac on ac.id_c=a.id														 
							JOIN bhea_demographics bd ON bd.id=cc.bhea_demographics_id_c
							JOIN quote_products_cases_1_c pc ON pc.quote_products_cases_1cases_idb=c.id
							JOIN quote_products p ON p.id=pc.quote_products_cases_1quote_products_ida
							LEFT JOIN bhea_asset_model bam on bam.id=cc.bhea_asset_model_id_c
							LEFT JOIN bhea_loans_cases_c blc on blc.bhea_loans_casescases_idb=c.id
							LEFT JOIN bhea_loans bl on bl.id=blc.bhea_loans_casesbhea_loans_ida
							LEFT JOIN users u on u.id=c.assigned_user_id

							WHERE c.deleted=0 
							AND a.deleted=0 
							AND bd.deleted=0 
							AND pc.deleted=0
							AND p.deleted=0
							AND c.date_entered between '$present_month_st%' 
							AND '$present_month_end%' 
							$status_condition $product_condition $branch_condition $groupBy";
		
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
		document.frmticket.action='index.php?module=bhea_Reports&action=generateTicketReport';
		document.frmticket.submit();
	}
}

//Clear the values
function resetValues() {				
	 $("#from").val("");
	 $("#to").val("");	  	  	
	 
	 $('#status option').attr('selected', false);	 
	 $('#product_type option').attr('selected', false);	
	 $('#branch_type option').attr('selected', false);	  
}	

function exportExcel() {
								   
	var data='<table>'+$("#oppReportListView").html().replace(/<a\/?[^>]+>/gi, '')+'</table>';		
	$('body').prepend("<form method='post' action='custom_export.php' style='display:none' id='ReportTableData'><input type='hidden' name='report_name' value='QRC' /><input type='text' name='tableData' value='"+data+"' ></form>");
	$('#ReportTableData').submit().remove();
	return false;

}

</script>
