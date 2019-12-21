<?php

if(!defined('sugarEntry')) define('sugarEntry', true);
//ini_set('display_errors','On');
require_once('include/SugarCharts/SugarChartFactory.php');
require_once('include/MVC/View/SugarView.php');

class bhea_ReportsViewgenerateContactReport extends SugarView{

    
    private $chartV;

    function __construct(){    
        parent::SugarView();
    }

    
     function getChartData($post)
    {
        global $db;

        $from_date = $_REQUEST['from_date'];
        if(!empty($from_date))
        {
            $tmp = explode("/",$from_date);
            if( count($tmp) == 3)
            {
                $from_date = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
            } else 
            $from_date = '';
        }
        if(!empty($from_date))
        {
             $from_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($from_date)));
             $from_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($from_date)));
			 $from_date = " and C.date_entered >= '$from_date' ";
        }
        $to_date = $_REQUEST['to_date'];
        if(!empty($to_date))
        {
            $tmp = explode("/",$to_date);
            if( count($tmp) == 3)
            {
				$to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]);
				$to_date = date('Y-m-d', strtotime($to_date. ' + 1 days'));
                //$to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]+1);
            } else 
            $to_date = '';
        }
        if(!empty($to_date))
        {
             $to_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($to_date)));
             $to_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($to_date)));
             $to_date = " and C.date_entered <= '$to_date' ";
        }
        
		// Team Filter
        $assigned_users_team = $_REQUEST['teams'];
        if(!empty($assigned_users_team))
        {
            if(is_array($assigned_users_team))
            {
                $tmp = '';
                foreach($assigned_users_team as $b_id)
                {
                    if(!empty($b_id)) { 
                        if(empty($tmp))
                            $tmp  = "'".$b_id."'";
                        else    
                            $tmp .= ",'".$b_id."'";
                    }
                }
                if(!empty($tmp))
                    $assigned_users_team = " and T.team_id in ($tmp) ";
                else
                    $assigned_users_team = '';
            } 
        }
       
        //assigned_users filter
        $assigned_users = $_REQUEST['assigned_users'];
        if(!empty($assigned_users))
        {
            if(is_array($assigned_users))
            {
                $tmp = '';
                foreach($assigned_users as $b_id)
                {
                    if(!empty($b_id)) { 
                        if(empty($tmp))
                            $tmp  = "'".$b_id."'";
                        else    
                            $tmp .= ",'".$b_id."'";
                    }
                }
                if(!empty($tmp))
                    $assigned_users = " and C.assigned_user_id in ($tmp) ";
                else
                    $assigned_users = '';
            } 
        }       
        
            $group_by_query = '';
            $group_by_where = '';
            
            $group_by = $_REQUEST['group_by'][0];
            
            if ($group_by == 'Assigned User'){
                $group_by_query = "  CONCAT(IFNULL(U.first_name,''),' ',IFNULL(U.last_name,'')) as name  ";
                $group_by_where = " and (U.id is not null or U.id != ''  )";
            
            } else if ($group_by == 'Team'){
                $group_by_query = ' T.name  as name ';
                $group_by_where = " and (T.name is not null or T.name != ''  )";
            }
            
          $queryChart = " SELECT
                $group_by_query , count(C.id) as total
				FROM contacts C
				LEFT JOIN  users U ON C.assigned_user_id=U.id AND U.deleted=0 AND U.status ='Active' 
				LEFT JOIN  accounts_contacts AC ON C.id=AC.contact_id AND AC.deleted=0
				LEFT JOIN  accounts A ON A.id=AC.account_id AND A.deleted=0
				LEFT JOIN  team as T ON T.id=C.team_id and T.deleted=0
				WHERE
				where C.deleted=0 
                $from_date
                $to_date                
                $assigned_users  
				$assigned_users_team				
                $group_by_where  
				
                Group By name      "; 
            
            
            
            $result = $db->query($queryChart);
        $data = array();
        $pro_arr = array();
        $product_name_arr = array();
        while($row = $db->fetchByAssoc($result))
        {
                    
            $tmp = array();
            if(!empty($row['name'])) {
                $tmp['name'] = $row['name'];
                $tmp['zone'] = $row['name'];
                $tmp['total'] = $row['total'];
                $tmp['name']= ucwords(strtolower($tmp['name']));
                $tmp['zone']= ucwords(strtolower($tmp['zone']));
                $tmp['name'] = trim($tmp['name']);
            }
            
            if(!empty($tmp)) {
                $data[] = $tmp;
            }            
              
        }
        
        if(!empty($_REQUEST['products']) && $_REQUEST['group_by'][0] =='Product')
        {
            foreach($pro_arr as $key => $pro)
            {
                $q = " SELECT name from quote_products as P join quote_products_cstm as PC ON P.id=PC.id_c where P.deleted=0 and PC.status_c='Active' and P.id = '$key' ";
                $res = $db->query($q);
                if($rr = $db->fetchByAssoc($res))
                {
                    $p_name = $rr['name']; 
                    
                    $tmp = array();
                    if(!empty($p_name)) {
                        $tmp['name'] = $p_name;
                        $tmp['zone'] = $p_name;
                        $tmp['total'] =$pro;
                        $tmp['name']= ucwords(strtolower($tmp['name']));
                        $tmp['zone']= ucwords(strtolower($tmp['zone']));
                    }
                    
                    if(!empty($tmp)) {
                        $data[] = $tmp;
                    }       
                }
            }
            
        }  else if(empty($_REQUEST['products']) && $_REQUEST['group_by'][0] =='Product'){
            
            foreach($pro_arr as $key => $pro)
            {
                
                $p_name = $product_name_arr[$key]; 
                
                $tmp = array();
                if(!empty($p_name)) {
                    
                    $tmp['name'] = $p_name;
                    $tmp['zone'] = $p_name;
                    $tmp['total'] =$pro;
                    $tmp['name']= ucwords(strtolower($tmp['name']));
                    $tmp['zone']= ucwords(strtolower($tmp['zone']));
                }
                
                if(!empty($tmp)) {
                    $data[] = $tmp;
                }       
                
            }
        }
        
        return $data    ;
        
    }
    function getMatrixData($post)
    {
        global $db;
        
        //From Date & To Date filter Condition
        $from_date = $_REQUEST['from_date'];
        if(!empty($from_date))
        {
            $tmp = explode("/",$from_date);
            if( count($tmp) == 3)
            {
                $from_date = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
            } else 
            $from_date = '';
        }
        if(!empty($from_date))
        {
             $from_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($from_date)));
             $from_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($from_date)));
            $from_date = " and C.date_entered >= '$from_date' ";
        }
        $to_date = $_REQUEST['to_date'];
        if(!empty($to_date))
        {
            $tmp = explode("/",$to_date);
            if( count($tmp) == 3)
            {
                $to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]);
				$to_date = date('Y-m-d', strtotime($to_date. ' + 1 days'));
				//$to_date = $tmp[2].'-'.$tmp[1].'-'.($tmp[0]+1);
            } else 
            $to_date = '';
        }
        if(!empty($to_date))
        {
             $to_date = date('Y-m-d H:i:s', strtotime('-5 hours', strtotime($to_date)));
             $to_date = date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime($to_date)));
            $to_date = " and C.date_entered <= '$to_date' ";
        }     
		
		// Team Filter
        $assigned_users_team = $_REQUEST['teams'];
        if(!empty($assigned_users_team))
        {
            if(is_array($assigned_users_team))
            {
                $tmp = '';
                foreach($assigned_users_team as $b_id)
                {
                    if(!empty($b_id)) { 
                        if(empty($tmp))
                            $tmp  = "'".$b_id."'";
                        else    
                            $tmp .= ",'".$b_id."'";
                    }
                }
                if(!empty($tmp))
                    $assigned_users_team = " and C.team_id in ($tmp) ";
                else
                    $assigned_users_team = '';
            } 
        }
		
	    //assigned_users filter
        $assigned_users = $_REQUEST['assigned_users'];
        if(!empty($assigned_users))
        {
            if(is_array($assigned_users))
            {
                $tmp = '';
                foreach($assigned_users as $b_id)
                {
                    if(!empty($b_id)) { 
                        if(empty($tmp))
                            $tmp  = "'".$b_id."'";
                        else    
                            $tmp .= ",'".$b_id."'";
                    }
                }
                if(!empty($tmp))
                    $assigned_users = " and C.assigned_user_id in ($tmp) ";
                else
                    $assigned_users = '';
            } 
        }       
        
         
        $limit = '';
        if(empty($_REQUEST['Export'])) 
            $limit = ' limit 0, 50 ';
        
        //Main Query
       $query = " SELECT 
             C.id as id,
             CONCAT(IFNULL(C.first_name,''),' ',IFNULL(C.last_name,'')) contacts_full_name,
			 IFNULL(C.phone_work,'') contacts_phone_work,
			 IFNULL(C.department,'') contacts_department,
			 IFNULL(A.id,'') acc_id,
			 IFNULL(A.name,'') acc_name,
			 CONCAT(IFNULL(U.first_name,''),' ',IFNULL(U.last_name,'')) user_name,
			 T.name team_name
			 
			 FROM contacts C
				LEFT JOIN  users U ON C.assigned_user_id=U.id AND U.deleted=0 AND U.status ='Active' 
				LEFT JOIN  accounts_contacts AC ON C.id=AC.contact_id AND AC.deleted=0
				LEFT JOIN  accounts A ON A.id=AC.account_id AND A.deleted=0
				LEFT JOIN  team as T ON T.id=C.team_id and T.deleted=0
			WHERE
				C.deleted=0                 
				$from_date
				$to_date
				$assigned_users
				$assigned_users_team
				
				ORDER BY user_name      $limit
				";
       
        $result = $db->query($query);
        $data = array();
        $r = 1;
        while($row = $db->fetchByAssoc($result))
        {            
            $data[$r]['id']            			  = $row['id'];           
            $data[$r]['contacts_full_name']       = ucwords(strtolower($row['contacts_full_name']));
			$data[$r]['contacts_phone_work']      = $row['contacts_phone_work'];
			$data[$r]['contacts_department']      = $row['contacts_department'];
			$data[$r]['acc_id']                   = $row['acc_id'];
			$data[$r]['acc_name']                 = ucwords(strtolower($row['acc_name']));
            $data[$r]['user_name']                = ucwords(strtolower($row['user_name']));
            $data[$r]['team_name']                = ucwords(strtolower($row['team_name']));                
            $r++;
        }
       
        //Set Chart
        if(!empty($_REQUEST['group_by']))
        {
            $group_by_query = '';
            $group_by_where = '';
            
            $group_by = $_REQUEST['group_by'][0];
            
            if ($group_by == 'Assigned User'){
                $group_by_query = "  CONCAT(IFNULL(U.first_name,''),' ',IFNULL(U.last_name,'')) as name  ";
                $group_by_where = " and (U.id is not null or U.id != ''  )";            
            }else if ($group_by == 'Team'){
                $group_by_query = ' T.name  as name ';
                $group_by_where = " and (T.name is not null or T.name != ''  )";
            }
            
          $queryChart = " SELECT
                $group_by_query , count(C.id) as total	
				
            FROM contacts C
                LEFT JOIN  users U ON C.assigned_user_id=U.id AND U.deleted=0 AND U.status ='Active' 
				LEFT JOIN  accounts_contacts AC ON C.id=AC.contact_id AND AC.deleted=0
				LEFT JOIN  accounts A ON A.id=AC.account_id AND A.deleted=0
				LEFT JOIN  team as T ON T.id=C.team_id and T.deleted=0
            WHERE
				C.deleted=0 
                $from_date
                $to_date
                $assigned_users
                $assigned_users_team
                              
                $group_by_where
                
                Group By name
            
            ";
            $this->setChart($queryChart);
        }
        
        return $data;
    }
    
    function setChart($query)
    {
        global $db;
        
        $result = $db->query($query);
        $data = array();
        $pro_arr = array();
        $product_name_arr = array();
        while($row = $db->fetchByAssoc($result))
        {
                    
            $tmp = array();
            if(!empty($row['name'])) {
                $tmp['name'] = $row['name'];
                $tmp['zone'] = $row['name'];
                $tmp['total'] = $row['total'];
                $tmp['name']= ucwords(strtolower($tmp['name']));
                $tmp['zone']= ucwords(strtolower($tmp['zone']));
                $tmp['name'] = trim($tmp['name']);
            }
            
            if(!empty($tmp)) {
                $data[] = $tmp;
            }            
              
        }
        
        if(!empty($_REQUEST['products']) && $_REQUEST['group_by'][0] =='Product')
        {
            foreach($pro_arr as $key => $pro)
            {
                $q = " SELECT name from quote_products as P join quote_products_cstm as PC ON P.id=PC.id_c where P.deleted=0 and PC.status_c='Active' and P.id = '$key' ";
                $res = $db->query($q);
                if($rr = $db->fetchByAssoc($res))
                {
                    $p_name = $rr['name']; 
                    
                    $tmp = array();
                    if(!empty($p_name)) {
                        $tmp['name'] = $p_name;
                        $tmp['zone'] = $p_name;
                        $tmp['total'] =$pro;
                        $tmp['name']= ucwords(strtolower($tmp['name']));
                        $tmp['zone']= ucwords(strtolower($tmp['zone']));
                         $tmp['name'] = trim($tmp['name']);
                    }
                    
                    if(!empty($tmp)) {
                        $data[] = $tmp;
                    }       
                }
            }
            
        }  else if(empty($_REQUEST['products']) && $_REQUEST['group_by'][0] =='Product'){
            
            foreach($pro_arr as $key => $pro)
            {
                
                $p_name = $product_name_arr[$key]; 
                
                $tmp = array();
                if(!empty($p_name)) {
                    
                    $tmp['name'] = $p_name;
                    $tmp['zone'] = $p_name;
                    $tmp['total'] =$pro;
                    $tmp['name']= ucwords(strtolower($tmp['name']));
                    $tmp['zone']= ucwords(strtolower($tmp['zone']));
                     $tmp['name'] = trim($tmp['name']);
                }
                
                if(!empty($tmp)) {
                    $data[] = $tmp;
                }       
                
            }
        }
         // echo "<pre>";print_r($data);
        $chartDefs = array(
            'chartType'=>'stacked group by chart',
             'base_url'=> 
              array(  'module' => 'Cases',
               'action' => 'index',
               'query' => 'true',
               'searchFormTab' => 'advanced_search',
               )   
          );
         
         //echo "<pre>";print_r($data);
        
        //$this->array_sort_by_column($data, 'name');
        $obSugarChart = SugarChartFactory::getInstance();
        
        $obSugarChart->group_by = array('name','zone');

        $obSugarChart->setData($data);
       
        $chart_title = '';
        $obSugarChart->setProperties($chart_title, '', $chartDefs['chartType']);
        $obSugarChart->base_url=$chartDefs['base_url'];
        $obSugarChart->url_params = array();

        $xmlFile = $obSugarChart->getXMLFileName('chart_xml');
        $chart   = $obSugarChart->generateXML();
       
       
        $obSugarChart->saveXMLFile($xmlFile, $chart);
        $stReturnString=$obSugarChart->display('chart_xml', $xmlFile, "100%", '480');
        
        $this->chartV = $stReturnString;
        
        $rsResources = $obSugarChart->getChartResources ();
        $this->ss->assign ( 'GRAPH_RESOURCES', $rsResources );
        $this->ss->assign('CHART',$this->chartV);
    }
    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
        $sort_col = array();
        foreach ($arr as $key=> $row) {
            $sort_col[$key] = trim($row[$col]);
        }

        array_multisort($sort_col, $dir, $arr);
    }

    function display()
    {
         global $db,$current_user;
        
           // if(!$current_user->is_admin)  {
            // echo  "You don't have access to see Reports"   ;
            
			// } else {
         
             if($_REQUEST['Export_Chart'])
        {
            
            $chart_data = $this->getChartData($_REQUEST);
            
            $this->array_sort_by_column($chart_data, 'name');
            
             
            
            require_once "include/libchart/classes/libchart.php";

              if(count($chart_data) < 3){
               $verti = count($chart_data) * 60; 
            } else 
            if(count($chart_data) < 5)
                $verti = count($chart_data) * 40;
            if(count($chart_data) < 15)
                $verti = count($chart_data) * 35;
            else
                 $verti = 650;
            
            $chart = new HorizontalBarChart(450, $verti);
            
          // 

            $dataSet = new XYDataSet();
            
            foreach($chart_data as $k_chart => $v_chart)
            {
                 $dataSet->addPoint(new Point($v_chart['name'], $v_chart['total']));
            }
           
           
           
            
            $chart->setDataSet($dataSet);
            $chart->setTitle("");
           
           $chart->getPlot()->getPalette()->setBarColor(array(
             new Color(51, 102, 255),
                new Color(102, 0, 255),
                new Color(160, 240, 153),
               new Color(243, 198, 118),
                    new Color(128, 63, 35),
                    new Color(195, 45, 28),
                    new Color(224, 198, 165),
                    new Color(239, 238, 218),
                    new Color(40, 72, 59),
                    new Color(71, 112, 132),
                    new Color(167, 192, 199),
                    new Color(218, 233, 202)
            )); 
            //unset($chart->getPlot()->getPalette()->barColorSet->shadowColorList);
            //echo "<pre>";print_r($chart->getPlot()->getPalette()->barColorSet->shadowColorList[0);exit;
             
            $chart->render("upload/CHART_IMAGE/report_chart.png");
            
            
           
            // Include the main TCPDF library (search for installation path).
            require_once('include/tcpdf/tcpdf.php');

            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('BHEA');
            $report_name =  "Contact Report by ".$_REQUEST['group_by'][0];
            $pdf->SetTitle($report_name);
            $pdf->SetSubject($report_name);
         //   $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
              // echo PDF_HEADER_LOGO;exit;
            // set default header data        
            $pdf->SetHeaderData('20reasons_md.jpg', PDF_HEADER_LOGO_WIDTH, '', '');

            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            // ---------------------------------------------------------

            // set font
            $pdf->SetFont('helvetica', 'B', 10);

            // add a page
            $pdf->AddPage();

            $pdf->Write(0, $report_name);

           
            // Image example with resizing
            $pdf->Image('upload/CHART_IMAGE/report_chart.png', 15, 40, 450, $verti, 'PNG', '', '', true, 500, '', false, false, 0, false, false, false);
           
            // ---------------------------------------------------------
              ob_end_clean();
            ob_start();
            //Close and output PDF document
            $report_name = str_replace(" ","_",$report_name).'.pdf';
            
            $pdf->Output($report_name, 'D');

            exit;  
        }
        //echo "<pre>";print_r($_REQUEST);exit;
        $MData = $this->getMatrixData($_REQUEST);
        //echo "<pre>";print_r($MData);
        $data = '';
        $index = 1;
        if(!empty($MData))
        {
            foreach($MData as $d) 
            {
               
                $data .= '<tr height="25">';
                $data .= '<td><label><b><a href="index.php?module=Contacts&action=DetailView&record='.$d['id'].'">'.$d['contacts_full_name'].'</a></b></lable></td>';
                $data .= '<td><label>'.$d['contacts_phone_work'].'</lable></td>';
                $data .= '<td><label>'.$d['contacts_department'].'</lable></td>';
				$data .= '<td><label><b><a href="index.php?module=Accounts&action=DetailView&record='.$d['acc_id'].'">'.$d['acc_name'].'</a></b></lable></td>';
				$data .= '<td><label>'.$d['user_name'].'</lable></td>';
				$data .= '<td><label>'.$d['team_name'].'</lable></td>';				
                $data .= '</tr>';
                if($index >= 50)    
                    break;
                $index++;
            }
            
            $c   = count($MData);
             
                $pageNumbers = " 1 - <span id='curr_index'>$c</span> of ".$c."+";
            
        } else {
        $data=<<<D
        <tr height="25">
            <td><label><i>no data</i></lable></td>
            <td><label></lable></td>
            <td><label></lable></td>
            <td><label></lable></td>           
            <td><label></lable></td>           
            <td><label></lable></td>           
            </tr>
            
D;
            $pageNumbers = '0 - 0';
            $total_row = 0;
            $jsMData = 'empty';
            $c=0;
            $total_row=0;
            
        }
        echo '<link rel="stylesheet" href="custom/modules/bhea_Reports/Report.css" type="text/css">';
        
        
    
 
        //Fetch Assinged Users
        $assinged_users_option = '<option></option>';
        $query = " SELECT CONCAT(IFNULL(first_name,''),' ',IFNULL(last_name,'')) as name,id from users  where deleted=0 and status='Active' order by name" ; 
        $result = $db->query($query);
        
        while($row = $db->fetchByAssoc($result))
        {
            $flag = true;
            
            if(!empty($_REQUEST['assigned_users']))
            {
                
                foreach($_REQUEST['assigned_users'] as $b_id )
                {
                    if($b_id == $row['id'] ) {
                        $row['name']= ucwords(strtolower($row['name']));
                        $assinged_users_option .= '<option label="'.$row['name'].'" value="'.$row['id'].'" selected >' ;
                        $assinged_users_option .= $row['name'];
                        $assinged_users_option .= '</option>';
                        $flag  = false;
                        break;
                    } 
                }
            }
            if($flag) {
                $row['name'] = trim($row['name']);
                $row['name']= ucwords(strtolower($row['name']));
                $assinged_users_option .= '<option label="'.$row['name'].'" value="'.$row['id'].'" >' ;
                $assinged_users_option .= $row['name'];
                $assinged_users_option .= '</option>';
            }
        }
        

        
		//Fetch Users Team
        $users_teams_option = '<option></option>';
        $query2 = " SELECT name,id from team  where deleted=0 order by name" ; 
        $result2 = $db->query($query2);
        
        while($row2 = $db->fetchByAssoc($result2))
        {
            $flag = true;
            
            if(!empty($_REQUEST['teams']))
            {
               
                foreach($_REQUEST['teams'] as $b_id )
                {
                    if($b_id == $row2['id'] ) {
					
                        $row2['name']= ucwords(strtolower($row2['name']));
                        $users_teams_option .= '<option label="'.$row2['name'].'" value="'.$row2['id'].'" selected >' ;
                        $users_teams_option .= $row2['name'];
                        $users_teams_option .= '</option>';
                        $flag  = false;
                        break;
                    } 
                }
            }
            if($flag) { 
                $row2['name'] = trim($row2['name']);
                $row2['name']= ucwords(strtolower($row2['name']));
                $users_teams_option .= '<option label="'.$row2['name'].'" value="'.$row2['id'].'" >' ;
                $users_teams_option .= $row2['name'];
                $users_teams_option .= '</option>';
            }
        }
		
        //Group By
        $t = array('Assigned User','Team');
        $group_by_option = '<option></option>';
        
        foreach($t as $tt)
        {
            
            $flag = true;
            if(!empty($_REQUEST['group_by']))
            {
                
                foreach($_REQUEST['group_by'] as $b_id )
                {
                    if($b_id == $tt ) {
                        $group_by_option .= '<option label="'.$tt.'" value="'.$tt.'" selected> '.$tt.' </option>';
                        $flag  = false;
                        break;
                    } 
                }
            }
            if($flag)
                $group_by_option .= '<option label="'.$ttt.'" value="'.$tt.'"> '.$tt.' </option>';
          }
        
        $report_name = "Contact Report";
        if(!empty($_REQUEST['group_by'][0]))
         $report_name =  "Contact Report by ".$_REQUEST['group_by'][0];
        
        echo $html =<<<HTML_Search
        <div id="mainBody">
            <div  id="imageLoading">

</div
            <div id="TitleReport"> <h3>$report_name</h3> </div>
            
            
            <div id="SearchPanel">
            <form id="ReportRequest" name="ReportRequest" method="POST">
            <table cellpadding="0" cellspacing="10">
            <tr>
            <td><label>From Date:</label></td><td> <input type="text" id="from_date" name="from_date" size="10" value='$_REQUEST[from_date]' /> 
                    <img border="0" src="themes/20reasons/images/jscalendar.gif" id="fromb" align="absmiddle" />
                    <script type="text/javascript">
                        Calendar.setup({inputField   : "from_date",
                        ifFormat      :    "%d/%m/%Y", 
                        button       : "fromb",
                        align        : "right"});
                    </script></td>
            <td><label>To Date:</label></td><td> <input type="text" id="to_date" name="to_date" size="10" value='$_REQUEST[to_date]' /> 
                    <img border="0" src="themes/20reasons/images/jscalendar.gif" id="tob" align="absmiddle" />
                    <script type="text/javascript">
                        Calendar.setup({inputField   : "to_date",
                        ifFormat      :    "%d/%m/%Y", 
                        button       : "tob",
                        align        : "right"});
                    </script></td>
             
			 <td><label>Assigned Users:</label></td><td> <select size="7" id="assigned_users[]" name="assigned_users[]" multiple> $assinged_users_option</select></td>
			 <td><label>Teams:</label></td><td> <select size="7" id="teams[]" name="teams[]" multiple> $users_teams_option</select></td>
             <td><label>Across:</label></td><td><select id="group_by[]" name="group_by[]" >$group_by_option</select></td>
            </tr>

            </table>
            </br>
            <table cellspacing="10">
            <tr>
            <td><input type="submit" id="Run_Report" name="Run_Report" value="Run Report" />&nbsp;&nbsp;&nbsp;<button id="clear" > Clear</button>&nbsp;&nbsp;<input type="submit" id="Export" name="Export" value="Export" /> <!-- &nbsp;&nbsp;<input type="submit" id="Export_Chart" name="Export_Chart" value="Export Chart" /> --></td>
            </tr>
            </table>
            </form>
            </div>
        </div>
        
HTML_Search;

        if(!empty($_REQUEST['group_by'][0])) {
             
            
            $this->ss->display('custom/modules/bhea_Reports/chart.tpl');    
        }

 
        echo $HTML_Data_header = <<<HTML_Data_header
        <div id="mainData">
            <div class="Pagination">
                <button type="button"  class="listViewStartButton_top" id="listViewStartButton_top" name="listViewStartButton" title="Start" class="button" >
                <img src="themes/20reasons/images/start_off.gif" align="absmiddle" border="0" alt="Start">
                </button>
                <button type="button" class="listViewPrevButton_top" id="listViewPrevButton_top" name="listViewPrevButton" class="button" title="Previous">
                <img src="themes/20reasons/images/previous_off.gif" align="absmiddle" border="0" alt="Previous">
                </button>
                <span class="pageNumbers">( $pageNumbers )</span>
                <button type="button" class="listViewNextButton_top" id="listViewNextButton_top" name="listViewNextButton" title="Next" class="button" onclick="return sListView.save_checks(20, 'Leads2_LEAD_offset')">
                <img src="themes/20reasons/images/next.gif" align="absmiddle" border="0" alt="Next">
                </button>
                <button type="button" class="listViewEndButton_top" id="listViewEndButton_top" name="listViewEndButton" title="End" class="button" onclick="return sListView.save_checks('end', 'Leads2_LEAD_offset')">
                <img src="themes/20reasons/images/end.gif" align="absmiddle" border="0" alt="End">
                </button>
            </div>
            <div id="DataHeader">
            <table cellpadding="0" cellspacing="0" width="100%" id="table_data">
            <tr  height="25">
            <th><label>Contact Name ID&nbsp;&nbsp;<img border="0" align="absmiddle" src="themes/default/images/arrow_down.gif"></lable></th>
            <th><label>Office Phone</lable></th>
            <th><label>Department</lable></th>
            <th ><label>Customer Name</lable></th>
            <th><label>Assigned to</lable></th>
            <th><label>Team</lable></th>
            </tr>
            $data
            </table>
            </div>
            <div class="Pagination">
                <button type="button"  class="listViewStartButton_top" id="listViewStartButton_top" name="listViewStartButton" title="Start" class="button" >
                <img src="themes/20reasons/images/start_off.gif" align="absmiddle" border="0" alt="Start">
                </button>
                <button type="button" class="listViewPrevButton_top" id="listViewPrevButton_top" name="listViewPrevButton" class="button" title="Previous">
                <img src="themes/20reasons/images/previous_off.gif" align="absmiddle" border="0" alt="Previous">
                </button>
                <span class="pageNumbers">( $pageNumbers )</span>
                <button type="button" class="listViewNextButton_top" id="listViewNextButton_top" name="listViewNextButton" title="Next" class="button" >
                <img src="themes/20reasons/images/next.gif" align="absmiddle" border="0" alt="Next">
                </button>
                <button type="button" class="listViewEndButton_top" id="listViewEndButton_top" name="listViewEndButton" title="End" class="button" >
                <img src="themes/20reasons/images/end.gif" align="absmiddle" border="0" alt="End">
                </button>
            </div>
        </div>
HTML_Data_header;

        echo $js=<<<JS
        <script>
        
         $('#Export_Chart').click(function(){
              a = document.getElementById("group_by[]");
              if(a.options[a.selectedIndex].value!='')
                return true;
              else {
                alert("Please select Across option ");
                return false;
              }
        });
        
        function showLoadingMesg()
        {
          $('#imageLoading').css('display','block');
          return true;
        }
        $('#Run_Report').attr('onclick','showLoadingMesg()');
        
        
        function setPageBack(index)
        {
            datastring = $("#ReportRequest").serialize();
        
            if(index == 'start') 
            {
                $('#imageLoading').css('display','block');
                url =  "index.php?module=bhea_Reports&action=AjaxDataContact&to_pdf=1&curr_index="+index; 
               
                $.ajax({
                    type: "POST",
                    url: url,
                    data: datastring,
                    success: function(data) {
                        
                        $('#table_data tr:not(:first)').remove();
                        $('#table_data').append(data);
                      
                        
                        html_next_page  = '( 1 - <span id="curr_index">50</span> of 50+ )';
                        $('.pageNumbers').html(html_next_page);
                         
                        $('.listViewNextButton_top').attr('disabled',false);
                        $('.listViewEndButton_top').attr('disabled',false);
                        $('.listViewNextButton_top').html('<img src="themes/20reasons/images/next.gif" align="absmiddle" border="0" alt="Next">');
                        $('.listViewEndButton_top').html('<img src="themes/20reasons/images/end.gif" align="absmiddle" border="0" alt="Next">');
                        
                        $('.listViewPrevButton_top').attr('disabled',true);
                        $('.listViewStartButton_top').attr('disabled',true);
                        $('.listViewPrevButton_top').html('<img src="themes/20reasons/images/previous_off.gif" align="absmiddle" border="0" alt="Next">');
                        $('.listViewStartButton_top').html('<img src="themes/20reasons/images/start_off.gif" align="absmiddle" border="0" alt="Next">');
                    
                        $('#imageLoading').css('display','none');  
                    }
                     
                });
            } 
            else
            {
                $('#imageLoading').css('display','block');
                curr_index = $('#curr_index').text();
                curr_index = parseInt(curr_index);
                if(curr_index > 50) {
                    curr_index  = curr_index - 50;
                    prev_index = parseInt(curr_index) - 50;
                    url =  "index.php?module=bhea_Reports&action=AjaxDataContact&to_pdf=1&curr_index="+(parseInt(prev_index)+1);
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: datastring,
                        success: function(data) {
                           
                            $('#table_data tr:not(:first)').remove();
                            $('#table_data').append(data);
                          
                             html_prev_page  = '(  ' + (parseInt(prev_index) +1) + '- <span id="curr_index">'+curr_index+'</span> of '+curr_index+'+ )';
                             $('.pageNumbers').html(html_prev_page);
                             
                            $('.listViewNextButton_top').attr('disabled',false);
                            $('.listViewEndButton_top').attr('disabled',false);
                            $('.listViewNextButton_top').html('<img src="themes/20reasons/images/next.gif" align="absmiddle" border="0" alt="Next">');
                            $('.listViewEndButton_top').html('<img src="themes/20reasons/images/end.gif" align="absmiddle" border="0" alt="Next">');
                            
                            $('#imageLoading').css('display','none');  
                          }
                     
                     });
                    
                    
                       
                    if(prev_index < 50)
                    {
                        $('.listViewPrevButton_top').attr('disabled',true);
                        $('.listViewStartButton_top').attr('disabled',true);
                        $('.listViewPrevButton_top').html('<img src="themes/20reasons/images/previous_off.gif" align="absmiddle" border="0" alt="Next">');
                        $('.listViewStartButton_top').html('<img src="themes/20reasons/images/start_off.gif" align="absmiddle" border="0" alt="Next">');
                    }
                    
                    
                } else {
                    $('.listViewPrevButton_top').attr('disabled',true);
                    $('.listViewStartButton_top').attr('disabled',true);
                    $('.listViewPrevButton_top').html('<img src="themes/20reasons/images/previous_off.gif" align="absmiddle" border="0" alt="Next">');
                    $('.listViewStartButton_top').html('<img src="themes/20reasons/images/start_off.gif" align="absmiddle" border="0" alt="Next">');
                }
            }
        }
        function setPage(index)
        {
            datastring = $("#ReportRequest").serialize();
        
            $('.listViewPrevButton_top').attr('disabled',false);
            $('.listViewStartButton_top').attr('disabled',false);
            $('.listViewPrevButton_top').html('<img src="themes/20reasons/images/previous.gif" align="absmiddle" border="0" alt="Next">');
            $('.listViewStartButton_top').html('<img src="themes/20reasons/images/start.gif" align="absmiddle" border="0" alt="Next">');
            $('.listViewPrevButton_top').attr('onclick','setPageBack()');           
            $('.listViewStartButton_top').attr('onclick','setPageBack("start")'); 
        
            if(index == 'end') 
            {
                $('#imageLoading').css('display','block');
                url =  "index.php?module=bhea_Reports&action=AjaxDataContact&to_pdf=1&curr_index="+index; 
               
                $.ajax({
                    type: "POST",
                    url: url,
                    data: datastring,
                    success: function(data) {
                        $('.rem_rows_start').remove();
                        $('.total_last_rows').remove();
                        $('#table_data tr:not(:first)').remove();
                        $('#table_data').append(data);
                      
                        curr_index = $('#rem_rows_start').val();
                        next_index = $('#total_last_rows').val();
                        
                        html_next_page  = '(  ' + (parseInt(curr_index)) + '- <span id="curr_index">'+next_index+'</span> of '+next_index+' )';
                        $('.pageNumbers').html(html_next_page);
                         
                        $('.listViewNextButton_top').attr('disabled',true);
                        $('.listViewEndButton_top').attr('disabled',true);
                        $('.listViewNextButton_top').html('<img src="themes/20reasons/images/next_off.gif" align="absmiddle" border="0" alt="Next">');
                        $('.listViewEndButton_top').html('<img src="themes/20reasons/images/end_off.gif" align="absmiddle" border="0" alt="Next">');
                        
                        $('#imageLoading').css('display','none');  
                    }
                     
                });
            
            } else {
                
                $('#imageLoading').css('display','block');
                
                curr_index = $('#curr_index').text();  
                next_index = parseInt(curr_index) + 50;
                html_next_page  = '(  ' + (parseInt(curr_index) +1) + '- <span id="curr_index">'+next_index+'</span> of '+next_index+'+ )';
                         
                url =  "index.php?module=bhea_Reports&action=AjaxDataContact&to_pdf=1&curr_index="+curr_index; 
                
                $.ajax({
                    type: "POST",
                    url: url,
                    data: datastring,
                    success: function(data) {
                    
                       count = occurrences(data,'<tr height='); 
                       count = parseInt(count);
                    
                       if(count >= 50)
                       {
                            $('#table_data tr:not(:first)').remove();
                            $('#table_data').append(data);
                            $('.pageNumbers').html(html_next_page);
                       } else  {
                            curr_index = $('#curr_index').text();
                            curr_index = parseInt(curr_index);
                            $('#table_data tr:not(:first)').remove();
                            $('#table_data').append(data);
                            
                            next_index =  curr_index + count;
                            html_next_page  = '(  ' + (parseInt(curr_index) +1) + '- <span id="curr_index">'+next_index+'</span> of '+next_index+' )';
                            $('.pageNumbers').html(html_next_page);
                            
                            $('.listViewNextButton_top').attr('disabled',true);
                            $('.listViewEndButton_top').attr('disabled',true);
                            $('.listViewNextButton_top').html('<img src="themes/20reasons/images/next_off.gif" align="absmiddle" border="0" alt="Next">');
                            $('.listViewEndButton_top').html('<img src="themes/20reasons/images/end_off.gif" align="absmiddle" border="0" alt="Next">');
                       }
                       
                        $('#imageLoading').css('display','none');  
                    }
                });
            }
      
        } //fn end (setPage)
        
function occurrences(string, substring){
    var n = 0;
    var pos=0;
    while(true){
    pos=string.indexOf(substring,pos);
    if(pos!=-1){ n++; pos+=substring.length;}
    else{
        break;
    }
    }
    return n;
}
      
        $('.listViewPrevButton_top').attr('disabled',true);
        $('.listViewStartButton_top').attr('disabled',true);
        
        if($c < 50)
        {
            $('.listViewNextButton_top').attr('disabled',true);
            $('.listViewEndButton_top').attr('disabled',true);
            $('.listViewNextButton_top').html('<img src="themes/20reasons/images/next_off.gif" align="absmiddle" border="0" alt="Next">');
            $('.listViewEndButton_top').html('<img src="themes/20reasons/images/end_off.gif" align="absmiddle" border="0" alt="Next">');
        }
        
        $('.listViewNextButton_top').attr('onclick',"setPage()");
        $('.listViewEndButton_top').attr('onclick',"setPage('end')");
        
        
        $('#clear').click(function(){
            $('#from_date').val('');
            $('#to_date').val('');
             $('select option').removeAttr("selected");
            return false;
        });
        
        
         
        </script>
JS;

        
        if(!empty($_REQUEST['Export']))
        {
            
            ob_end_clean();
            ob_start();    
            // output headers so that the file is downloaded rather than displayed
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=Contact.csv');

            // create a file pointer connected to the output stream
            $output = fopen('php://output', 'w');

            // output the column headings
            fputcsv($output, array('Name', 'Office Phone', 'Department','Customer Name','Assigned To','Team'));
             
            foreach ($MData as $v) {
                unset($v['id']);
                unset($v['acc_id']);
                fputcsv($output,$v);
            }
           
            exit;
            
        }
        //} //end of if (is admin)
    } //end of display
} //end of class