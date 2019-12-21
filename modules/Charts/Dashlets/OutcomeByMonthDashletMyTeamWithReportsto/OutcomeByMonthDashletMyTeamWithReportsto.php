<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
/* * *******************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 * ****************************************************************************** */





require_once('include/Dashlets/DashletGenericChart.php');

class OutcomeByMonthDashletMyTeamWithReportsto extends DashletGenericChart {

    public $obmdmtwrt_ids = array();
    public $obmdmtwrt_date_start;
    public $obmdmtwrt_date_end;

    /**
     * @see DashletGenericChart::$_seedName
     */
    protected $_seedName = 'Opportunities';

    /**
     * @see DashletGenericChart::__construct()
     */
    public function __construct(
    $id, array $options = null
    ) {
        global $timedate;

        if (empty($options['obmdmtwrt_date_start']))
            $options['obmdmtwrt_date_start'] = $timedate->asDbDate($timedate->getNow()->modify("-6 months"));

        if (empty($options['obmdmtwrt_date_end']))
            $options['obmdmtwrt_date_end'] = $timedate->nowDbDate();

        parent::__construct($id, $options);
    }

    /**
     * @see DashletGenericChart::displayOptions()
     */
    public function displayOptions() {
//        if (!isset($this->obmdmtwrt_ids) || count($this->obmdmtwrt_ids) == 0)
//            $this->_searchFields['obmdmtwrt_ids']['input_name0'] = array_keys(get_user_array(false));

        return parent::displayOptions();
    }

    /**
     * @see DashletGenericChart::display()
     */
    public function display() {

        $currency_symbol = $GLOBALS['sugar_config']['default_currency_symbol'];

        if ($GLOBALS['current_user']->getPreference('currency')) {

            $currency = new Currency();
            $currency->retrieve($GLOBALS['current_user']->getPreference('currency'));
            $currency_symbol = $currency->symbol;
        }
        $thousands_symbol = translate('LBL_OPP_THOUSANDS', 'Charts');
        $module = 'Opportunities';
        $action = 'index';
        $query = 'true';
        $searchFormTab = 'advanced_search';
        $groupBy = array('m', 'sales_stage',);

        if (is_array($this->constructQuery())) {
            $data = $this->constructQuery();
        } else {
            $data = $this->getChartData($this->constructQuery());
        }

        //I have taken out the sort as this will throw off the labels we have calculated
        $data = $this->sortData($data, 'm', false, 'sales_stage', true, true);
        /*-----Sorting Issue fixed By Swapnil M Date: 25-Jul-2018 start-------*
        usort($data, function($a, $b) {
            $ad = new DateTime($a['m']);
            $bd = new DateTime($b['m']);

            if ($ad == $bd) {
                return 0;
            }

            return $ad < $bd ? -1 : 1;
        });
        /*-----Sorting Issue fixed By Swapnil M Date: 25-Jul-2018 End-------*/
        

        //If Sales stage is empty so automaically generating empty sales stage array element by roshan sarode 22-5-18
        foreach ($data as $k => $v) {
            //   $smys =  $GLOBALS['app_list_strings']['sales_stage_dom'];
            $dataunique[] = $v['sales_stage'];
        }
        foreach ($GLOBALS['app_list_strings']['sales_stage_dom'] as $k => $v) {
            //   $smys =  $GLOBALS['app_list_strings']['sales_stage_dom'];
            $allsalesstages[] = $v;
        }
        $unique_sales_stages = array_unique($dataunique);
        $count_sales_stages = count($unique_sales_stages);
        $result_unique = array_diff($GLOBALS['app_list_strings']['sales_stage_dom'], $unique_sales_stages);
        $total_months = round(count($data) / count($unique_sales_stages));

        foreach ($data as $k => $v) {

            $all_mont[] = $v['m'];
            $all_months[$v['m']][] = $v['sales_stage'];
        }
        $tmp = array_count_values($all_mont);

        $unique_months = (array_unique($all_mont));

        $r = 0;
        foreach ($unique_months as $m) {

            $count_stages = $tmp[$m];
            $nb = 0;
            $gtcount = $r * 4;
            for ($i = $count_stages; $i < 4; $i++) {
                $result_unique = array_diff($GLOBALS['app_list_strings']['sales_stage_dom'], $all_months[$m]);

//                   echo "<pre>";
//                   print_r($result_unique);
//                   

                foreach ($result_unique as $add) {

                    if (in_array('Closed Won', $result_unique)) {
                        unset($result_unique['Closed Won']);
                        $add = 'Closed Won';
                        $nb = $gtcount + 0;
                    } else if (in_array('Closed Lost', $result_unique)) {
                        unset($result_unique['Closed Lost']);
                        $add = 'Closed Lost';
                        $nb = $gtcount + 1;
                    } else if (in_array('Draft', $result_unique)) {
                        unset($result_unique['Draft']);
                        $add = 'Draft';
                        $nb = $gtcount + 2;
                    } else if (in_array('Negotiation', $result_unique)) {
                        unset($result_unique['Negotiation']);
                        $add = 'Negotiation';
                        $nb = $gtcount + 3;
                    }

                    array_splice($data, $nb, 0, array(array('total' => 0, 'opp_count' => 0, 'm' => $m, 'sales_stage' => $add, 'sales_stage_dom_option' => $add)));
                    unset($nb);
                }


                $count_stages++;
                unset($missing_stage);
                break;
            }
            $r++;
            unset($i);
        }

        /* -----Sorting Issue fixed By Swapnil M Date: 25-Jul-2018 start------- */
//          echo "<pre>";
//       print_r($data);
        usort($data, function($a, $b) {


            $ad = new DateTime($a['m']);
            $bd = new DateTime($b['m']);

            if ($ad == $bd) {
                return 0;
            }

            return $ad < $bd ? -1 : 1;
        });

        //echo "<pre>";
        //print_r($data);
        $chunck_of_data = array_chunk($data, 4);
        $data1 = array();
        foreach ($chunck_of_data as $month) {
            usort($month, function($a, $b) {
                return strcmp($a['sales_stage'], $b['sales_stage']);
            });
            foreach ($month as $sort) {
                $data1[] = $sort;
            }
        }

        //print_r($data1);

        //print_r($this->array_flatten($data1));
        //exit;


        /* -----Sorting Issue fixed By Swapnil M Date: 25-Jul-2018 End------- */



//        if (count($result_unique) > 0) {
//        
//
//            foreach ($result_unique as $k => $v) {
//
//                $get_missing[] = array_search($GLOBALS['app_list_strings']['sales_stage_dom'][$k], $allsalesstages);
//            }
//         
//            
//          foreach ($get_missing as $k=>$v) {
//                $dom_value = array_search($allsalesstages[$v], $result_unique);
//              
//          
//                if(empty($data[$v]['m'])){$mymonth=$data[$v]['m'];}else{$mymonth=$data[$v]['m'];}
//                array_splice($data, $v, 0, array(array('total' => 0, 'count' => 0, 'm' => $mymonth, 'sales_stage' => $allsalesstages[$v], 'sales_stage_dom_option' => $dom_value)));
//             
//                $plus = 1;
//            
//                for ($i = 0; $i < $total_months - 1; $i++) {
//                    $plus = $plus + $count_sales_stages + $v;
//              
//                    // $data[$plus]=array('total'=>0,'count'=>0,'m'=>$data[$plus]['m'],'sales_stage'=>$allsalesstages[$v],'sales_stage_dom_option'=>$dom_value);
//                    array_splice($data, $plus, 0, array(array('total' => 0, 'count' => 0, 'm' => $data[$plus]['m'], 'sales_stage' => $allsalesstages[$v], 'sales_stage_dom_option' => $dom_value)));
//                }
//                unset($plus);
//            }
//        
//        }
//         echo "<pre>";
//         print_r($data);
        //If Sales stage is empty so automaically generating empty sales stage array element by roshan sarode 22-5-18


        //$chartReadyData = $this->prepareChartData($data, $currency_symbol, $thousands_symbol);    //For adding month wise sorted array by Roshan Sarode dt: 27-7-18
        $chartReadyData = $this->prepareChartData($data1, $currency_symbol, $thousands_symbol);
  
        $canvasId = 'rGraphOutcomeByMonth' . uniqid();
        $chartWidth = 500;
        $chartHeight = 400;
        $autoRefresh = $this->processAutoRefresh();

        //    $chartReadyData['data'] = [[1.1,2.2],[3.3,4.4]];
        // $jsonData = json_encode($chartReadyData['data']);
        // $jsonLabels = json_encode($chartReadyData['labels']);
        // $jsonLabelsAndValues = json_encode($chartReadyData['labelsAndValues']);
        //echo $jsonTooltips;
//
//
        $jsonKey = json_encode($chartReadyData['key']);
        //print_r($chartReadyData['key']);
        //print_r($jsonKey);
        //$jsonTooltips = json_encode($chartReadyData['tooltips']);
//
//        $colours = "['#a6cee3','#1f78b4','#b2df8a','#33a02c','#fb9a99','#e31a1c','#fdbf6f','#ff7f00','#cab2d6','#6a3d9a','#ffff99','#b15928']";


        if (!is_array($chartReadyData['data']) || count($chartReadyData['data']) < 1) {
            return "<h3 class='noGraphDataPoints'>$this->noDataMessage</h3>";
        }


        $chartHeight = $chartHeight . "px";
        $chartWidth = $chartWidth . "px";
        $bar_lv = $chartReadyData['labels'];
        $bar_dv = $chartReadyData['data'];
        // print_r($bar_dv);

        $barcomb_arr = array_combine(array_values($bar_lv), array_values($bar_dv));

        $colours = array('#3366CC', '#DC3912', '#FF9900', '#109618', '#990099', '#3B3EAC', '#0099C6', '#DD4477', '#66AA00', '#B82E2E', '#316395', '#994499', '#22AA99', '#AAAA11', '#6633CC', '#E67300', '#8B0707', '#329262', '#5574A6', '#3B3EAC');

        $colur_count = 1;

        foreach ($barcomb_arr as $k => $v) {
// if(!empty($k)){

            $col_color = $colours[$colur_count++];
            if (empty($col_color)) {
                $col_color = "blue";
            }
            $bar_cht .= "['" . $k . "'," . implode(',', $v) . "],";
            //}
        }
        //$bar_cht=rtrim($bar_cht,",");
//           print_r($bar_cht);
//        echo "<pre>";
//       print_r($bar_lv);
        //print_r($GLOBALS['sugar_config']['site_url']);
        //print_r($bar_cht);

        $url = $GLOBALS['sugar_config']['site_url'];
        $smys = $GLOBALS['app_list_strings']['sales_stage_dom'];
        $obmdmtwrt_date_start = $this->obmdmtwrt_date_start;
        $obmdmtwrt_date_end = $this->obmdmtwrt_date_end;
        $obmdmtwrt_team_name = $this->obmdmtwrt_team_name;

        $chart = <<<EOD
                
                 <script type="text/javascript">
              
      $(document).ready(function(){
               
			$(window).resize(function(){
			obmdmtwrt_drawChart();
			});
function highlightBar(chart, options, view) {
    var selection = chart.getSelection();
    if (selection.length) {
        var row = selection[0].row;
        var column = selection[0].column;


        //1.insert style role column to highlight selected column 
        var styleRole = {
            type: 'string',
            role: 'style',
            calc: function (dt, i) {
                return (i == row) ? 'stroke-color: #000000; stroke-width: 2' : null;
            }
        };
        var indexes = [0, 1, 2, 3, 4, 5, 6];
        var styleColumn = obmdmtwrt_findStyleRoleColumn(view)
        if (styleColumn != -1 && column > styleColumn)
            indexes.splice(column, 0, styleRole);
        else
            indexes.splice(column + 1, 0, styleRole);
        view.setColumns(indexes);
        //2.redraw the chart
        chart.draw(view, options);
    }
}

function obmdmtwrt_findStyleRoleColumn(view) {
    for (var i = 0; i < view.getNumberOfColumns() ; i++) {
        if (view.getColumnRole(i) == "style") {
            return i;
        }
    }
    return -1;
}
function obmdmtwrt_drawChart() {
var h = $jsonKey;
h.unshift('Year');
var data = google.visualization.arrayToDataTable([h,$bar_cht]);

    var options = {
        width: 600,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true,
    };

     var formatter = new google.visualization.NumberFormat({prefix: 'Rs ',suffix:'K'});
        formatter.format(data, 1);             
        formatter.format(data, 2);             
        formatter.format(data, 3);             
        formatter.format(data, 4);             
    var chart = new google.visualization.ColumnChart(document.querySelector('#chart_div_myteamwithreportsto$canvasId'));
        
   google.visualization.events.addListener(chart, 'select', selectHandler);
 function selectHandler() {
    var selection = chart.getSelection();
   var str = '';
   var ddd = '';
   var type = '';
   var type1 = '';
   var uuu = '$url';
    for (var i = 0; i < selection.length; i++) {
        var item = selection[i];
        str = data.getFormattedValue(item.row, item.column);
        ddd = data.getValue(chart.getSelection()[0].row, 0);
        type = item.column;
    }
                
    if(type == 1){
        type1 = 'Closed Lost';
   }else if(type == 2){
       type1 = 'Closed Won';
   }else if(type == 3){
       type1 = 'Draft';
   }else{
       type1 = 'Negotiation/Review';
   }
        var st_range = coverttoDateFormat(ddd,1);
        var end_range = coverttoDateFormat(ddd,0);
        var url = uuu+'/index.php?module=Opportunities&action=index&query=true&searchFormTab=advanced_search&date_closed_advanced_range_choice=between&end_range_date_closed_advanced='+end_range+'&sales_stage_advanced[]='+type1+'&start_range_date_closed_advanced='+st_range;    
     location.href= url;         
}

    google.visualization.events.addListener(chart, 'onmouseover', obmdmtwrt_uselessHandler2);
    google.visualization.events.addListener(chart, 'onmouseout', obmdmtwrt_uselessHandler3);            
        
     // use the 'ready' event to modify the chart once it has been drawn
  google.visualization.events.addListener(chart, 'ready', function () {
    var axisLabels = document.querySelector('#chart_div_myteamwithreportsto$canvasId').getElementsByTagName('text');
    for (var i = 0; i < axisLabels.length; i++) {
      if (axisLabels[i].getAttribute('text-anchor') === 'end') {
        axisLabels[i].innerHTML = 'Rs ' + axisLabels[i].innerHTML;
      }
    }
  });  
      chart.draw(data, {
        vAxis: { format: 'short', gridlines: {count: 6}, textStyle: {fontSize: 12}, },         
        legend: { position: 'top', maxLines: 3 },
        isStacked: true,
        });
}
google.load('visualization', '1', {packages:['corechart'], callback: obmdmtwrt_drawChart});

  });
    function obmdmtwrt_uselessHandler2() {
        $('#chart_div_myteamwithreportsto$canvasId').css('cursor','pointer')
    }  
    function obmdmtwrt_uselessHandler3() {
        $('#chart_div_myteamwithreportsto$canvasId').css('cursor','default')
    }  
      
   
    function coverttoDateFormat(d1,x) {                    
        var yy,mm,dd,zz,st_m,st_d,en_m,en_d;
        var z =cal_date_format;
        var obmdmtwrt_st = '$obmdmtwrt_date_start';
        var obmdmtwrt_end = '$obmdmtwrt_date_end';
        st_d =   getFistLastDateMonth(obmdmtwrt_st,1);  
        st_m =   getFistLastDateMonth(obmdmtwrt_st,0);  
        en_d =   getFistLastDateMonth(obmdmtwrt_end,1);  
        en_m =   getFistLastDateMonth(obmdmtwrt_end,0);  
         zz = d1.split('-');
         yy = zz[0];
         mm = zz[1];
         var lastday = function(y,m){
            return  new Date(y, m, 0).getDate();
         }
         
         if(mm == st_m && x == 1){
            dd = st_d;
         }else if( mm == en_m && x == 0){
            dd = en_d; 
         }else if (mm != st_m && x == 1){
            dd = '01'; 
         }else if(mm != en_m && x == 0){
            dd = lastday(yy,parseInt(mm)); 
         }else{       
            dd = (x==1)?'01':lastday(yy,parseInt(mm));
         }
        z = z.replace('%Y',yy);
        z = z.replace('%m',mm);
        z = z.replace('%d',dd);
       return z;
    }
    
     function getFistLastDateMonth(d1,x) {                    
                    var yy,mm,dd,zz;
                    var z =cal_date_format; 
                    zz = d1.split('-');
                    yy = zz[0];
                    mm = zz[1];
                    dd = zz[2];
                   return (x==1)?dd:mm;
                }
                 
        </script>


    <div id="chart_div_myteamwithreportsto$canvasId" class="google_chart"></div><br>
                            $autoRefresh

EOD;

        //        <canvas id='$canvasId' class='resizableCanvas'  width='$chartWidth' height='$chartHeight'>[No canvas support]</canvas>
//            $autoRefresh
        $chart1 = <<<EOD
                
                

        <script>
//           var bar = new RGraph.Bar({
//            id: '$canvasId',
//            data:$jsonData,
//            options: {
//                grouping: 'stacked',
//                labels: $jsonLabels,
//                xlabels:true,
//                textSize:10,
//                labelsAbove: true,
//                //labelsAboveSize:10,
//                labelsAboveUnitsPre:'$currency_symbol',
//                labelsAboveUnitsPost:'$thousands_symbol',
//                labelsAbovedecimals: 2,
//                //linewidth: 2,
//                eventsClick:outcomeByMonthClick,
//                //textSize:10,
//                strokestyle: 'white',
//                //colors: ['Gradient(#4572A7:#66f)','Gradient(#AA4643:white)','Gradient(#89A54E:white)'],
//                //shadowOffsetx: 1,
//                //shadowOffsety: 1,
//                //shadowBlur: 10,
//                //hmargin: 25,
//               // colors:$colours,
//                gutterLeft: 60,
//                gutterTop:50,
//                //gutterRight:160,
//                //gutterBottom: 155,
//                //textAngle: 45,
//                backgroundGridVlines: false,
//                backgroundGridBorder: false,
//                tooltips:$jsonTooltips,
//                tooltipsEvent:'mousemove',
//                colors:$colours,
//                key: $jsonKey,
//                keyColors: $colours,
//                keyBackground:'rgba(255,255,255,0.7)',
//                //keyPosition: 'gutter',
//                //keyPositionX: $canvasId.width - 150,
//                //keyPositionY: 18,
//                //keyPositionGutterBoxed: true,
//                axisColor: '#ccc',
//                unitsPre:'$currency_symbol',
//                unitsPost:'$thousands_symbol',
//                keyHalign:'right',
//                tooltipsCssClass: 'rgraph_chart_tooltips_css',
//                noyaxis: true
//            }
//        }).draw();
        /*.on('draw', function (obj)
        {
            for (var i=0; i<obj.coords.length; ++i) {
                obj.context.fillStyle = 'black';
                if(obj.data_arr[i] > 0)
                {
                RGraph.Text2(obj.context, {
                    font:'Arial',
                    'size':10,
                    'x':obj.coords[i][0] + (obj.coords[i][2] / 2),
                    'y':obj.coords[i][1] + (obj.coords[i][3] / 2),
                    'text':obj.data_arr[i].toString(),
                    'valign':'center',
                    'halign':'center'
                });
                }
            }
        }).draw();
        */

        bar.canvas.onmouseout = function (e)
        {
            // Hide the tooltip
            RGraph.hideTooltip();

            // Redraw the canvas so that any highlighting is gone
            RGraph.redraw();
        }
/*
         var sizeIncrement = new RGraph.Drawing.Text({
            id: '$canvasId',
            x: 10,
            y: 20,
            text: 'Opportunity size in ${currency_symbol}1$thousands_symbol',
            options: {
                font: 'Arial',
                bold: true,
                //halign: 'left',
                //valign: 'bottom',
                colors: ['black'],
                size: 10
            }
        }).draw();
*/
</script>
EOD;
        return $chart;
    }

    /**
     * @see DashletGenericChart::constructQuery()
     */
    protected function constructQuery() {

        global $current_user, $db;
        $mysecurity_group = array();



        if ($current_user->is_admin) {

            $i = 0;
            foreach ($this->obmdmtwrt_team_name as $tid) {
                global $db;
                $logedin_user_id = $current_user->id;

                $team_id = $tid;
                // echo "<pre>";
                // print_r($team_id);
                //~ $get_teamusers = "SELECT user_id FROM team_memberships WHERE team_id  ='$team_id' AND deleted=0";
                $get_teamusers = "SELECT user_id FROM securitygroups_users WHERE securitygroup_id  ='$team_id' AND deleted=0";
                $get_teamusers_res = $db->query($get_teamusers);
                while ($getteams_user = $db->fetchByAssoc($get_teamusers_res)) {
                    $user_list[] = $getteams_user['user_id'];
                }
                // echo '<pre>';
                //$select_report=$_REQUEST['report_select'];

                $flag = false;


                $date_start = date("Y-m-d", strtotime($this->obmdmtwrt_date_start));
                $date_start .= " 00:00:00";


                $date_end = date("Y-m-d", strtotime($this->obmdmtwrt_date_end));
                $date_end .= " 23:59:59";


                $user_id = array();
                $get_users_list = array();
                //print_r($user_list);
                //exit;
                for ($l = 0; $l < count($user_list); $l++) {
                    $flag = false;
                    //~ $query ="SELECT * FROM  users WHERE deleted=0 AND status='Active' AND id='$user_list[$l]'"; 
                    $query = "SELECT * FROM  users WHERE deleted=0 AND id='$user_list[$l]'";
                    $result = $db->query($query, true);
                    while ($user = $db->fetchByAssoc($result)) {
                        $flag = true;
                        $get_users_list[] = $user;
                    }
                }

                for ($l = 0; $l < count($get_users_list); $l++) {
                    $getuser = $get_users_list[$l];
                    $user_id = $getuser['id'];
                    $alluser_id = $getuser['id'];
                    //=================================

                    $getClosedWon = "SELECT count(o.id) as id,sales_stage," . db_convert('o.date_closed', 'date_format', array("'%Y-%m'"), array("'YYYY-MM'")) . " as m, " . " sum(o.amount_usdollar/1000) as amount FROM opportunities o LEFT JOIN securitygroups_records sg ON o.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = o.assigned_user_id WHERE sg.securitygroup_id = '$team_id' and su.securitygroup_id =  '$team_id' and su.primary_group=1 AND sg.module = 'Opportunities' AND o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id='$user_id'  and sg.deleted=0 and su.deleted=0 and sales_stage IN ('Closed Won') GROUP BY " . db_convert('o.date_closed', 'date_format', array("'%Y-%m'"), array("'YYYY-MM'")) . " ORDER BY m";

                    //$GLOBALS['log']->fatal($getClosedWon,"Closed Won Opportunities");
                    $getClosedWon_res = $db->query($getClosedWon);
                    while ($getClosedWon_res_row = $db->fetchByAssoc($getClosedWon_res)) {
//                          echo "<pre>"; 
//                          print_r($getClosedWon_res_row);
//                          
                        $getwonsales_stage = $getClosedWon_res_row['sales_stage'];
                        $getwonmonth = $getClosedWon_res_row['m'];
                        $total_own_oppt[] = $getClosedWon_res_row['id'];
                        $oppt_own_amounts = $getClosedWon_res_row['amount'];
//                        $oppt_own_amounts = $oppt_own_amounts / 100000;
                        $oppt_own_amounts = round($oppt_own_amounts, 2);
                        $oppt_own_amount[] = $oppt_own_amounts . "L";
                        if (!empty($getwonsales_stage)) {
//                        $total_opp_own_count[$getClosedWon_res_row['m']] = $total_opp_own_count[$getClosedWon_res_row['m']] + $total_own_oppt[$i];
                            $total_opp_own_amount['sales_stage'][$getwonsales_stage][$getwonmonth]['amount'] = $total_opp_own_amount['sales_stage'][$getwonsales_stage][$getwonmonth]['amount'] + $oppt_own_amounts;
                            $total_opp_own_amount['sales_stage'][$getwonsales_stage][$getwonmonth]['count'] = $total_opp_own_amount['sales_stage'][$getwonsales_stage][$getwonmonth]['count'] + $total_own_oppt[$i];
                        }
                    }
                    $getOppLost = "SELECT count(o.id) as id,sales_stage," . db_convert('o.date_closed', 'date_format', array("'%Y-%m'"), array("'YYYY-MM'")) . " as m, " . " sum(o.amount_usdollar/1000) as sum FROM opportunities o 
		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = o.assigned_user_id WHERE sg.securitygroup_id = '$team_id' and su.securitygroup_id =  '$team_id' and su.primary_group=1 AND sg.module = 'Opportunities' AND o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id ='$user_id' AND o.sales_stage ='Closed Lost' and sg.deleted=0 and su.deleted=0 GROUP BY " . db_convert('o.date_closed', 'date_format', array("'%Y-%m'"), array("'YYYY-MM'")) . " ORDER BY m";
                    $getOppLost_res = $db->query($getOppLost);
                    while ($getOppLost_res_row = $db->fetchByAssoc($getOppLost_res)) {
                        $getlostsales_stage = $getOppLost_res_row['sales_stage'];
                        $getlostmonth = $getOppLost_res_row['m'];
                        $oppt_lost_amounts = $getOppLost_res_row['sum'];
                        $total_lost_oppt[] = $getOppLost_res_row['id'];
//                        $oppt_lost_amounts = $oppt_lost_amounts / 100000;
                        $oppt_lost_amounts = round($oppt_lost_amounts, 2);
                        $oppt_lost_amount[] = $oppt_lost_amounts . "L";
                        if (!empty($getlostsales_stage)) {
//                        $total_opp_own_count[$getClosedWon_res_row['m']] = $total_opp_own_count[$getClosedWon_res_row['m']] + $total_own_oppt[$i];
                            $total_opp_own_amount['sales_stage'][$getlostsales_stage][$getlostmonth]['amount'] = $total_opp_own_amount['sales_stage'][$getlostsales_stage][$getlostmonth]['amount'] + $oppt_lost_amounts;
                            $total_opp_own_amount['sales_stage'][$getlostsales_stage][$getlostmonth]['count'] = $total_opp_own_amount['sales_stage'][$getlostsales_stage][$getlostmonth]['count'] + $total_lost_oppt[$i];
                        }
                    }
                    $getOppDraft = "SELECT count(o.id) as id,sales_stage," . db_convert('o.date_closed', 'date_format', array("'%Y-%m'"), array("'YYYY-MM'")) . " as m, " . " sum(o.amount_usdollar/1000) as sum FROM opportunities o 
		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = o.assigned_user_id WHERE sg.securitygroup_id = '$team_id' and su.securitygroup_id =  '$team_id' and su.primary_group=1 AND sg.module = 'Opportunities' AND o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id ='$user_id' AND o.sales_stage ='Draft' and sg.deleted=0 and su.deleted=0 GROUP BY " . db_convert('o.date_closed', 'date_format', array("'%Y-%m'"), array("'YYYY-MM'")) . " ORDER BY m";
                    $getOppDraft_res = $db->query($getOppDraft);
                    while ($getOppDraft_res_row = $db->fetchByAssoc($getOppDraft_res)) {
                        $getdraftsales_stage = $getOppDraft_res_row['sales_stage'];
                        $getdraftmonth = $getOppDraft_res_row['m'];

                        $oppt_Draft_amounts = $getOppDraft_res_row['sum'];
                        $total_Draft_oppt[] = $getOppDraft_res_row['id'];
//                        $oppt_Draft_amounts = $oppt_Draft_amounts / 100000;
                        $oppt_Draft_amounts = round($oppt_Draft_amounts, 2);
                        $oppt_Draft_amount[] = $oppt_Draft_amounts . "L";


                        if (!empty($getdraftsales_stage)) {
//                        $total_opp_own_count[$getClosedWon_res_row['m']] = $total_opp_own_count[$getClosedWon_res_row['m']] + $total_own_oppt[$i];
                            $total_opp_own_amount['sales_stage'][$getdraftsales_stage][$getdraftmonth]['amount'] = $total_opp_own_amount['sales_stage'][$getdraftsales_stage][$getdraftmonth]['amount'] + $oppt_Draft_amounts;
                            $total_opp_own_amount['sales_stage'][$getdraftsales_stage][$getdraftmonth]['count'] = $total_opp_own_amount['sales_stage'][$getdraftsales_stage][$getdraftmonth]['count'] + $total_Draft_oppt[$i];
                        }
                    }
                    $getOppNegotation = "SELECT count(o.id) as id,sales_stage," . db_convert('o.date_closed', 'date_format', array("'%Y-%m'"), array("'YYYY-MM'")) . " as m, " . " sum(o.amount_usdollar/1000) as sum FROM opportunities o 
		LEFT JOIN securitygroups_records sg ON o.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = o.assigned_user_id WHERE sg.securitygroup_id = '$team_id' and su.securitygroup_id =  '$team_id' and su.primary_group=1 AND sg.module = 'Opportunities' AND o.date_closed between '$date_start' and '$date_end' AND o.deleted=0 and o.assigned_user_id ='$user_id' AND o.sales_stage ='Negotiation/Review' and sg.deleted=0 and su.deleted=0 GROUP BY " . db_convert('o.date_closed', 'date_format', array("'%Y-%m'"), array("'YYYY-MM'")) . " ORDER BY m";
                    $getOppNegotation_res = $db->query($getOppNegotation);
                    while ($getOppNegotation_res_row = $db->fetchByAssoc($getOppNegotation_res)) {
                        $getnegotationsales_stage = $getOppNegotation_res_row['sales_stage'];
                        $getnegotationmonth = $getOppNegotation_res_row['m'];

                        $oppt_Negotation_amounts = $getOppNegotation_res_row['sum'];
                        $total_Negotation_oppt[] = $getOppNegotation_res_row['id'];
//                        $oppt_Negotation_amounts = $oppt_Negotation_amounts / 100000;
                        $oppt_Negotation_amounts = round($oppt_Negotation_amounts, 2);
                        $oppt_Negotation_amount[] = $oppt_Negotation_amounts . "L";


                        if (!empty($getnegotationsales_stage)) {
//                        $total_opp_own_count[$getClosedWon_res_row['m']] = $total_opp_own_count[$getClosedWon_res_row['m']] + $total_own_oppt[$i];
                            $total_opp_own_amount['sales_stage'][$getnegotationsales_stage][$getnegotationmonth]['amount'] = $total_opp_own_amount['sales_stage'][$getnegotationsales_stage][$getnegotationmonth]['amount'] + $oppt_Negotation_amounts;
                            $total_opp_own_amount['sales_stage'][$getnegotationsales_stage][$getnegotationmonth]['count'] = $total_opp_own_amount['sales_stage'][$getnegotationsales_stage][$getnegotationmonth]['count'] + $total_Negotation_oppt[$i];
                        }
                    }
                    //sales Target
                    //      $total_opportunities_won = $total_opportunities_won + $opportunities_won1[$i];
                    //echo $name[$k];
                    $i++;
                }
                //~ }

                unset($user_list);
            }

            foreach ($total_opp_own_amount['sales_stage'] as $k => $v) {
                foreach ($v as $ik => $iv) {
                    $data[] = array('sales_stage' => $k, 'm' => $ik, 'total' => $iv['amount'], 'opp_count' => $iv['count']);
                }
            }
            return $data;
        } else {

            $query_securitygroup = "SELECT securitygroup_id FROM securitygroups_users WHERE user_id  ='$current_user->id' AND deleted=0 AND primary_group = 1";
            $result = $db->query($query_securitygroup);
            while ($getteams = $db->fetchByAssoc($result)) {
                $mysecurity_group[] = $getteams['securitygroup_id'];
            }

            $inntersect_teams = array_intersect($this->obmdmtwrt_team_name, $mysecurity_group);

            $teamids = array();
            foreach ($inntersect_teams as $v) {
                $teamids[] = "'" . $v . "'";
            }
            $team_id = implode(",", $teamids);
            $query = "SELECT sales_stage," .
                    db_convert('opportunities.date_closed', 'date_format', array("'%Y-%m'"), array("'YYYY-MM'")) . " as m, " .
                    "sum(amount_usdollar/1000) as total, count(*) as opp_count FROM opportunities ";

            $query .= " LEFT JOIN securitygroups_records sg ON opportunities.id = sg.record_id LEFT JOIN securitygroups_users su ON su.user_id = opportunities.assigned_user_id ";

            $query .= " WHERE opportunities.date_closed >= " . db_convert("'" . $this->obmdmtwrt_date_start . " 00:00:00'", 'date') .
                    " AND opportunities.date_closed <= " . db_convert("'" . $this->obmdmtwrt_date_end . " 23:59:59'", 'date') .
                    " AND opportunities.deleted=0 ";
            if ($current_user->is_admin) {
                $query .= " AND  sg.securitygroup_id IN (" . $team_id . ") and su.securitygroup_id IN (" . $team_id . ") and su.primary_group=1 AND sg.module = 'Opportunities' and sg.deleted=0 and su.deleted=0 ";
            } else {

                $query .= " AND  sg.securitygroup_id IN (" . $team_id . ") and su.securitygroup_id IN (" . $team_id . ") and su.primary_group=1 AND sg.module = 'Opportunities' ";
            }

            $query .= $this->getReportingSubId();
            $query .= " GROUP BY sales_stage," .
                    db_convert('opportunities.date_closed', 'date_format', array("'%Y-%m'"), array("'YYYY-MM'")) .
                    " ORDER BY m";

            //  echo $query;
            return $query;
        }
    }

    public function getReportingSubId() {
        global $current_user, $db;
        $logedin_user_id = $current_user->id;
        $sub_id = array();
        $query12 = "SELECT id FROM  users WHERE reports_to_id='$logedin_user_id' and deleted=0";
        $result = $db->query($query12, true);
        while ($getuserids = $db->fetchByAssoc($result)) {
            $sub_id[] = $getuserids['id'];
        }
        if ($logedin_user_id == '8ddc4e2b-b7d6-2fc8-95e8-558b90353953') {
            $sub_id[] = '38db8f0c-82e6-98c4-af06-5997e0ccc431';
        }
        $user_audit_query = "SELECT parent_id FROM  users_audit WHERE reports_to_id='" . $logedin_user_id . "' and before_value_string='Active' and date_created between '$this->obmdmt_date_start' and '$this->obmdmt_date_end' order by date_created desc limit 0,1";

        $user_audit_result = $db->query($user_audit_query);
        while ($user_audit_row = $db->fetchByAssoc($user_audit_result)) {
            $sub_id[] = $user_audit_row['parent_id'];
        }
        $count = 0;
        count($sub_id);
        while (count($sub_id) > $count) {
            $flag = true;
            $query11 = "SELECT id FROM  users WHERE reports_to_id='" . $sub_id[$count] . "' and deleted=0 and status='Active'";
            $result = $db->query($query11, true);
            while ($getuser = $db->fetchByAssoc($result)) {
                $flag = false;
                $sub_id[] = $getuser['id'];
            }
            //Added by Shakeer to get users list who become inactive during that peroid. 10Sep2015
            if ($flag) {
                $user_audit_query = "SELECT parent_id FROM  users_audit WHERE reports_to_id='" . $sub_id[$count] . "' and before_value_string='Active' and date_created between '$this->obmdmt_date_start' and '$this->obmdmt_date_end' order by date_created desc limit 0,1";

                $user_audit_result = $db->query($user_audit_query);
                while ($user_audit_row = $db->fetchByAssoc($user_audit_result)) {
                    $sub_id[] = $user_audit_row['parent_id'];
                }
            }
            //Ended
            $count++;
        }


        $sub_id[] = $logedin_user_id;
        $subids = array();
        foreach ($sub_id as $v) {
            $subids[] = "'" . $v . "'";
        }




        $reporting_ids = implode(',', $subids);

        if ($current_user->is_admin) {
            return " ";
        } else {
            return " AND opportunities.assigned_user_id IN (" . $reporting_ids . ") ";
        }
    }

    protected function prepareChartData($data, $currency_symbol, $thousands_symbol) {
        //Use the  lead_source to categorise the data for the charts
        $chart['labels'] = array();
        $chart['data'] = array();
        //Need to add all elements into the key, as they are stacked (even though the category is not present, the value could be)
        $chart['key'] = array();
        $chart['tooltips'] = array();

        foreach ($data as $i) {
            $key = $i["m"];
            $stage = $i["sales_stage"];
            $stage_dom_option = $i["sales_stage_dom_option"];
            if (!in_array($key, $chart['labels'])) {
                $chart['labels'][] = $key;
                $chart['data'][] = array();
            }
            if (!in_array($stage, $chart['key']))
                $chart['key'][] = $stage;

            $formattedFloat = (float) number_format((float) $i["total"], 2, '.', '');
            $chart['data'][count($chart['data']) - 1][] = $formattedFloat;
            $chart['tooltips'][] = "<div><input type='hidden' class='stage' value='$stage_dom_option'><input type='hidden' class='date' value='$key'></div>" . $stage . '(' . $currency_symbol . $formattedFloat . $thousands_symbol . ') ' . $key;
        }
        return $chart;
    }

    public function custom_build_report_access_query(SugarBean $module, $alias) {

        //echo "sssss";
        $module->table_name = $alias;
        $where = '';
        if ($module->bean_implements('ACL') && ACLController::requireOwner($module->module_dir, 'list')) {
            global $current_user;
            $owner_where = $module->getOwnerWhere($current_user->id);
            $where = ' AND ' . $owner_where;
        }

        if (file_exists('modules/SecurityGroups/SecurityGroup.php')) {
            /* BEGIN - SECURITY GROUPS */
            if ($module->bean_implements('ACL') && ACLController::requireSecurityGroup($module->module_dir, 'list')) {
                require_once('modules/SecurityGroups/SecurityGroup.php');
                global $current_user;
                $owner_where = $module->getOwnerWhere($current_user->id);
                $group_where = SecurityGroup::getGroupWhere($alias, $module->module_dir, $current_user->id);
                if (!empty($owner_where)) {
                    $where .= " AND (" . $owner_where . " or " . $group_where . ") ";
                } else {
                    $where .= ' AND ' . $group_where;
                }
            }
            /* END - SECURITY GROUPS */
        }
        //echo $where; 
        return $where;
    }

}
