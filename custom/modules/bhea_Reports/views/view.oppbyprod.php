<?php
ini_set('display_errors','Off');
require_once('include/SugarCharts/SugarChartFactory.php');
require_once('include/MVC/View/SugarView.php');

class bhea_ReportsViewoppbyprod extends SugarView{

	private $chartDefs = array(
	 'chartType' => 'bar chart',
	 'base_url'=> 
	  array(  'module' => 'Opportunities',
	   'action' => 'index',
	   'query' => 'true',
	   'searchFormTab' => 'advanced_search',
	   )   
	);

    function __construct(){    
        parent::SugarView();
    }

    function display(){
		global $db, $app_list_strings;
	      //#Set Product
      	$query  = "SELECT name,id FROM quote_products WHERE deleted=0";
	      $result = $db->query($query);
      	$GLOBALS['app_list_strings']['products_list']=array();

	      while($row = $db->fetchByAssoc($result))
      	{
	        $GLOBALS['app_list_strings']['products_list'][$row['id']]=$row['name'];
            }
            //#END

		//Lead Source - Search Value
		$leadSource = $_REQUEST['lead_source'];		

		$lead_source = $app_list_strings['lead_source_dom'];
		//echo "<pre>";print_r($lead_source);
		
		foreach($lead_source as $key=>$value) {		
			if(in_array($value,$leadSource)) {
				$lead_source_options .= "<option label='$value' value='$key' selected='selected'>$value</option>";
			} else {
				$lead_source_options .= "<option label='$value' value='$key'>$value</option>";
			}
		}

		//Sales Stage - Search Value
		$salesStage = $_REQUEST['sales_stage'];	
		
		$sales_stage = $app_list_strings['sales_stage_dom'];
		foreach($sales_stage as $key=>$value) {			
			if(in_array($value,$salesStage)) {
				$sales_stage_options .= "<option label='$value' value='$key' selected='selected'>$value</option>";
			} else {
				$sales_stage_options .= "<option label='$value' value='$key'>$value</option>";
			}
		}
		
		//Product Type - Search Value
		$productType = $_REQUEST['product_type'];	
		
		//select all the products in the system
		$query = "SELECT p.id, p.name
		          FROM quote_products p 
		          JOIN quote_products_cstm pc on p.id=pc.id_c 
		          WHERE p.deleted=0";
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
		$query = "SELECT name, unit from bhea_demographics WHERE deleted=0";
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
		<form name="frmsales" id="frmsales" action="index.php?module=bhea_Reports&action=opportunityBySource" method="post">
		<p style="font-size:12px;padding:10px 0px;10px;0px;font-weight:bold">
		<a href="$site_url/staging/index.php?module=bhea_Reports&action=opportunityBySource">Opportunity by Source </a>&nbsp;&nbsp;
		<a href="$site_url/staging/index.php?module=bhea_Reports&action=opportunityByProduct">Opportunity by Product </a>&nbsp;&nbsp;
		<a href="$site_url/staging/index.php?module=bhea_Reports&action=opportunityByBranch">Opportunity by Branch </a>
		</p>
		<body>
		<table width="100%" border="0" align="center" id="oppReportTable">
			<tr>
				<td  width="20%" align="left" valign="middle" class="" >
					<b>Expected Close Date From:</b>
				</td>
				
				<td  width="20%" align="left" valign="middle" class="" >
					<b>Expected Close Date To:</b>
				</td>
				
				<td  width="15%" align="left" valign="middle" class="" >
					<b>Source:</b>
				</td>
				
				<td  width="15%" align="left" valign="middle" class="" >
					<b>Sales Stage:</b>
				</td>
				
				<td  width="25%" align="left" valign="middle" class="" >
					<b>Products:</b>
				</td>	
				
				<td  width="20%" align="left" valign="middle" class="" >
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
					<select id="lead_source" name="lead_source[]" multiple=true>
						$lead_source_options
					</select>
					<!-- 
					<span style="text-decoration:underline;cursor:pointer;color:#0B578F" onclick="select_all('lead_source')">Select</span>&nbsp;/
					<span style="text-decoration:underline;cursor:pointer;color:#0B578F" onclick="unselect_all('lead_source')">Unselect All</span>
					-->
				</td>				
				
				<td>
					<select id="sales_stage" name="sales_stage[]" multiple=true>
						$sales_stage_options
					</select>					
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
       
       
       
       
       //Lead Source - Search value
		$leadSource = $_REQUEST['lead_source'];
		//DD values
		$lead_source = $app_list_strings['lead_source_dom'];
		
		//Check Lead source is empty or not in search
		$lead_condition = "";
		if(!empty($leadSource)) {			
			$end_value = end($leadSource);		
			$lead_condition = "AND (";	
			foreach($leadSource as $key=>$value) {			
				if(array_key_exists($value,$lead_source)) {				
					if($value != $end_value) {					
						$lead_condition.= "o.lead_source='$value' OR ";
					} else {
						$lead_condition.= "o.lead_source='$value' ) ";
					}
				}
				else {
					$lead_condition.="";
				}
			}		
		}
		
		//Sales Stage - Search value
		$salesStage = $_REQUEST['sales_stage'];
		//DD values
		$sales_stage = $app_list_strings['sales_stage_dom'];
		
		//Check sales stage is empty or not in search
		$stage_condition = "";
		if(!empty($salesStage)) {			
			$end_value = end($salesStage);		
			$stage_condition = "AND (";	
			foreach($salesStage as $key=>$value) {			
				if(array_key_exists($value,$sales_stage)) {				
					if($value != $end_value) {					
						$stage_condition.= "o.sales_stage='$value' OR ";
					} else {
						$stage_condition.= "o.sales_stage='$value' ) ";
					}
				}
				else {
					$stage_condition.="";
				}
			}		
		}
		//END
		
		
		//Product Type - Search Value
		$productType       = $_REQUEST['product_type'];	
			
		$product_condition = "";
		//select all the products in the system
		$my_query = "SELECT oc.products_c
					FROM opportunities_cstm oc					
					
					JOIN opportunities o ON o.id=oc.id_c
					WHERE o.deleted =0					
					";
		$query_res = $db->query($my_query);
		if($query_res->num_rows > 0) {				
			while($row = $db->fetchByAssoc($query_res)) {				
				$opp_product[] = $row[products_c];		
			}		
			
			$opp_arr = implode(',',$opp_product);
			
			//Search criteria
			if(!empty($productType)) 
			{		
				$product_condition = "AND (";
					
				foreach($productType as $key=>$value) {		
					$str = '^'.$value.'^';	
					if(strpos($opp_arr,$str) !== false) {				
						$final_arr[] = $str;				
					}		
				}				
			}		
			
			if(!empty($final_arr))
			{				
				$end_value = end($final_arr);	
				
				foreach($final_arr as $k=>$v) 
				{
					if($final_arr[$k] != $end_value) {
						$product_condition .= "oc.products_c LIKE '%$final_arr[$k]%' OR ";
					} else {
						$product_condition .= "oc.products_c LIKE '%$final_arr[$k]%' ) ";
					}
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
					$branch_condition.= "oc.bhea_demographics_id_c='$value' OR ";
				} else {
					$branch_condition.= "oc.bhea_demographics_id_c='$value' ) ";
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
		
        
        $query_res = $this->sqlResult($present_month_st, $present_month_end, $lead_condition, $stage_condition, $product_condition, $branch_condition);
		if($query_res->num_rows > 0) {
			
			//Chart Display - Start
			$stChartData = $this->oppByProduct($present_month_st, $present_month_end, $lead_condition, $stage_condition, $branch_condition);
      
			$obSugarChart = SugarChartFactory::getInstance ();
			$rsResources = $obSugarChart->getChartResources ();
			$this->ss->assign ( 'GRAPH_RESOURCES', $rsResources );
			$this->ss->assign('OPP_CHART_DATA',$stChartData);
			$this->ss->display('custom/modules/bhea_Reports/tpls/opp_reports.tpl');
			//Chart Display - End
			
			
			$html_rep = '<br/><br/><table width="100%" border="2" cellspacing="2" cellpadding="2" id="oppReportListView" >
				<tr height="20" style="display: table-row;">
					<td style="background:#C0C0C0;"><b>Opportunity Name</b></td>
				    <td style="background:#C0C0C0;"><b>Customer Name</b></td>		
				    <td style="background:#C0C0C0;"><b>Products</b></td>				
					<td style="background:#C0C0C0;"><b>Loans</b></td>
					<td style="background:#C0C0C0;"><b>Opportunity Amount</b></td>
					<td style="background:#C0C0C0;"><b>Branch</b></td>
					<td style="background:#C0C0C0;"><b>Lead Source</b></td>
					<td style="background:#C0C0C0;"><b>Expected Close Date</b></td>
					<td style="background:#C0C0C0;"><b>Sales Stage</b></td>
					<td style="background:#C0C0C0;"><b>Campaign</b></td>
					<td style="background:#C0C0C0;"><b>Asset Model</b></td>
					<td style="background:#C0C0C0;"><b>Year of Manufacturing</b></td>
					<td style="background:#C0C0C0;"><b>Description</b></td>					
					<td style="background:#C0C0C0;"><b>Created By</b></td>
				</tr>';
			while($row = $db->fetchByAssoc($query_res)) {
				$close_date   = date('d/m/Y',strtotime($row[date_closed]));
				$date_created = date('d/m/Y',strtotime($row[date_entered]));
	    	            $opp_products_arr = unencodeMultienum($row['products_c']);
				foreach($opp_products_arr as $prod) {
				    $opp_prods .= $GLOBALS['app_list_strings']['products_list'][$prod]."\n";
				}
				$html_rep .= '<tr height="20" style="display: table-row;">
							<td><a href="index.php?module=Opportunities&action=DetailView&record='.$row[opp_id].'">'.$row[opp_name].'</a></td>
							<td><a href="index.php?module=Accounts&action=DetailView&record='.$row[cust_id].'">'.$row[cust_name].'</a></td>
							<td>'.$opp_prods.'</td>
							<td><a href="index.php?module=bhea_Loans&action=DetailView&record='.$row[loanid].'">'.$row[loan_name].'</a></td>
							<td>'.$row[amount].'</td>
							<td><a href="index.php?module=bhea_Demographics&action=DetailView&record='.$row[branch_id].'">'.$row[branch_name].'</a></td>
							<td>'.$row[lead_source].'</td>
							<td>'.$close_date.'</td>
							<td>'.$row[sales_stage].'</td>
							<td><a href="index.php?module=Campagins&action=DetailView&record='.$row[camp_id].'">'.$row[camp_name].'</a></td>
							<td><a href="index.php?module=bhea_Asset_Model&action=DetailView&record='.$row[am_id].'">'.$row[am_name].'</a></td>
							<td>'.$row[year_of_manufacturing_c].'</td>
							<td>'.$row[description].'</td>
							<td>'.$row[username].'</td>
						</tr>';
			}
			echo $html_rep .= '</table>';
		}
      
    }

    function oppByProduct($present_month_st, $present_month_end, $lead_condition, $stage_condition, $branch_condition)
    {
		
		global $db;
		$stReturnString = '';	
		
		
		//Product Type - Search Value
		$productType = $_REQUEST['product_type'];	
		
		//select all the products in the system
		$my_query = "SELECT oc.products_c
					FROM opportunities_cstm oc					
					
					JOIN opportunities o ON o.id=oc.id_c
					WHERE o.deleted =0					
					";
		$query_res = $db->query($my_query);
		if($query_res->num_rows > 0) {				
			while($row = $db->fetchByAssoc($query_res)) {				
				$opp_product[] = $row[products_c];		
				
				$op_pro_without_cap[] = str_replace("^","",$row[products_c]);
			}		
			
			$opp_arr = implode(',',$op_pro_without_cap);
			
			//Search criteria
			if(!empty($productType)) 
			{					
				foreach($productType as $key=>$value) {		
					$str = $value;	
					if(strpos($opp_arr,$str) !== false) {				
						$final_arr[] = $str;				
					}		
				}			
				
				if(!empty($final_arr))
				{	
					foreach($final_arr as $k=>$v) 
					{					
					    $my_query = "SELECT qp.name prod_name, count( * ) total_count
									FROM opportunities o
									
									JOIN opportunities_cstm oc ON o.id = oc.id_c
									JOIN quote_products qp ON qp.id='$final_arr[$k]'
									
									JOIN bhea_demographics bd on bd.id=oc.bhea_demographics_id_c
									
									WHERE (oc.products_c LIKE '%$final_arr[$k]%')
									AND o.date_closed between '$present_month_st%' 
									AND '$present_month_end%' 
									AND o.deleted =0		
									AND qp.deleted=0			
									$lead_condition $stage_condition $branch_condition		
									";
						$query_res = $db->query($my_query);	
						
						if($query_res->num_rows > 0) {
							while($row = $db->fetchByAssoc($query_res)) {							
								$arLeadChartDat[$row['prod_name']] = $row['total_count'];
							}
						}
						
					}
				}				
			}	
			//IF Search is empty - default chart will be displayed
			else 
			{
				foreach($op_pro_without_cap as $k=>$v) 
				{		
					if($op_pro_without_cap[$k] != '') {
							
						$my_query = "SELECT qp.name prod_name, count( * ) total_count
									FROM opportunities o
									
									JOIN opportunities_cstm oc ON o.id = oc.id_c
									JOIN quote_products qp ON qp.id LIKE '%$op_pro_without_cap[$k]%'
									
									WHERE (oc.products_c LIKE '%$op_pro_without_cap[$k]%')
									AND o.date_closed between '$present_month_st%' 
									AND '$present_month_end%' 
									AND o.deleted =0		
									AND qp.deleted=0	
									$lead_condition $stage_condition $branch_condition												
									";												
						$query_res = $db->query($my_query);	
						
						if($query_res->num_rows > 0) {
							while($row = $db->fetchByAssoc($query_res)) {
								if($row['total_count'] !=0)	{					
									$arLeadChartDat[$row['prod_name']] = $row['total_count'];
								}
							}
						}
						
					}
						
				}
				
			}							
			
		}			

		$obSugarChart = SugarChartFactory::getInstance();
		$obSugarChart->setData($arLeadChartDat);
		$obSugarChart->setProperties('Opportunity By Product', '', $this->chartDefs['chartType']);
		$obSugarChart->base_url=$this->chartDefs['base_url'];
		$obSugarChart->url_params = array();

		$xmlFile = $obSugarChart->getXMLFileName('opp_by_product');
		$obSugarChart->saveXMLFile($xmlFile, $obSugarChart->generateXML());
		$stReturnString=$obSugarChart->display('opp_by_product', $xmlFile, "100%", '480');

		return $stReturnString;
		 
	}
	
	function sqlResult($present_month_st, $present_month_end, $lead_condition, $stage_condition, $product_condition, $branch_condition, $groupBy=NULL, $count=NULL) 
	{
		global $db,$app_list_strings;		
		
		//Main Query
		$my_query = "SELECT o.name opp_name, o.id opp_id, o.sales_stage, o.date_entered, o.date_closed, o.lead_source, oc.products_c, o.amount, c.name camp_name,
					c.id camp_id, oc.ageing_c ageing, a.name cust_name, a.id cust_id, ac.code_c custcode, bd.id branch_id,bd.name branch_name, bam.id am_id, 
					bam.name am_name, oc.year_of_manufacturing_c, o.description, u.first_name ufname, u.last_name ulname, u.id userid, o.next_step, bl.name loan_name,bl.id loanid
					$count 
					FROM opportunities o 
					
					JOIN opportunities_cstm oc on o.id=oc.id_c
					
					JOIN accounts_opportunities ao on ao.opportunity_id=o.id 
					JOIN accounts a on ao.account_id=a.id 
					JOIN accounts_cstm ac on ac.id_c=a.id								
										 
					JOIN bhea_demographics bd on bd.id=oc.bhea_demographics_id_c
					LEFT JOIN opportunities_bhea_loans_1_c ol on o.id=ol.opportunities_bhea_loans_1opportunities_ida
					LEFT JOIN bhea_loans bl on bl.id=ol.opportunities_bhea_loans_1bhea_loans_idb
					LEFT JOIN campaigns c on c.id=o.campaign_id
					LEFT JOIN bhea_asset_model bam on bam.id=oc.bhea_asset_model_id_c
					
					JOIN users u ON u.id=o.created_by
					
					WHERE o.deleted=0 
					AND a.deleted=0 
					AND bd.deleted=0 
					AND o.date_closed between '$present_month_st%' 
					AND '$present_month_end%' 
					$lead_condition $stage_condition $product_condition $branch_condition $groupBy";
		
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
		document.frmsales.action='index.php?module=bhea_Reports&action=opportunityByProduct';
		document.frmsales.submit();
	}
}

//Clear the values
function resetValues() {				
	 $("#from").val("");
	 $("#to").val("");	  	  	
	 
	 $('#lead_source option').attr('selected', false);	
	 $('#sales_stage option').attr('selected', false);	
	 $('#product_type option').attr('selected', false);	
	 $('#branch_type option').attr('selected', false);	  
}	

function exportExcel() {
								   
	var data='<table>'+$("#oppReportListView").html().replace(/<a\/?[^>]+>/gi, '')+'</table>';		
	$('body').prepend("<form method='post' action='custom_export.php' style='display:none' id='ReportTableData'><input type='hidden' name='report_name' value='Opportunity' /><input type='text' name='tableData' value='"+data+"' ></form>");
	$('#ReportTableData').submit().remove();
	return false;

}
</script>
