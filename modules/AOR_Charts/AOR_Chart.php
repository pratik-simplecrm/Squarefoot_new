<?php

/**
 * Advanced OpenReports, SugarCRM Reporting.
 * @package Advanced OpenReports for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
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
 * @author SalesAgility <info@salesagility.com>
 */
class AOR_Chart extends Basic {

    var $colours = "['#1f78b4','#a6cee3','#b2df8a','#33a02c','#fb9a99','#e31a1c','#fdbf6f','#ff7f00','#cab2d6','#6a3d9a','#ffff99','#b15928','#144c73','#6caed1','#8acf4e','#20641c','#f8514f','#9e1214','#fc9d24','#b35900','#a880bb','#442763','#ffff4d','#733a1a']";
    var $new_schema = true;
    var $module_dir = 'AOR_Charts';
    var $object_name = 'AOR_Chart';
    var $table_name = 'aor_charts';
    var $importable = true;
    var $disable_row_level_security = true;
    var $id;
    var $name;
    var $date_entered;
    var $date_modified;
    var $modified_user_id;
    var $modified_by_name;
    var $created_by;
    var $created_by_name;
    var $description;
    var $deleted;
    var $created_by_link;
    var $modified_user_link;
    var $type;
    var $x_field;
    var $y_field;
    var $noDataMessage = "No Results";

    public function __construct() {
        parent::__construct();
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    public function AOR_Chart() {
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if (isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        } else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct();
    }

    function save_lines(array $post, AOR_Report $bean, $postKey) {
        $seenIds = array();
        if (isset($post[$postKey . 'id'])) {
            foreach ($post[$postKey . 'id'] as $key => $id) {
                if ($id && $post['record'] != '') {
                    $aorChart = BeanFactory::getBean('AOR_Charts', $id);
                } else {
                    $aorChart = BeanFactory::newBean('AOR_Charts');
                }
                $aorChart->name = $post[$postKey . 'title'][$key];
                $aorChart->type = $post[$postKey . 'type'][$key];
                $aorChart->x_field = $post[$postKey . 'x_field'][$key];
                $aorChart->y_field = $post[$postKey . 'y_field'][$key];
                $aorChart->aor_report_id = $bean->id;
                $aorChart->save();
                $seenIds[] = $aorChart->id;
            }
        }
        //Any beans that exist but aren't in $seenIds must have been removed.
        foreach ($bean->get_linked_beans('aor_charts', 'AOR_Charts') as $chart) {
            if (!in_array($chart->id, $seenIds)) {
                $chart->mark_deleted($chart->id);
            }
        }
    }

    private function getValidChartTypes() {
        return array('bar', 'line', 'pie', 'radar', 'rose', 'grouped_bar', 'stacked_bar');
    }

    private function getColour($seed, $rgbArray = false) {
        $hash = md5($seed);
        $r = hexdec(substr($hash, 0, 2));
        $g = hexdec(substr($hash, 2, 2));
        $b = hexdec(substr($hash, 4, 2));
        if ($rgbArray) {
            return array('R' => $r, 'G' => $g, 'B' => $b);
        }
        $highR = $r + 10;
        $highG = $g + 10;
        $highB = $b + 10;
        $main = '#' . str_pad(dechex($r), 2, '0', STR_PAD_LEFT)
                . str_pad(dechex($g), 2, '0', STR_PAD_LEFT)
                . str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
        $highlight = '#' . dechex($highR) . dechex($highG) . dechex($highB);
        return array('main' => $main, 'highlight' => $highlight);
    }

    function buildChartImageBar($chartPicture, $recordImageMap = false) {
        $scaleSettings = array("DrawSubTicks" => false, "LabelRotation" => 30, 'MinDivHeight' => 50);
        $chartPicture->drawScale($scaleSettings);
        $chartPicture->drawBarChart(array("RecordImageMap" => $recordImageMap));
    }

    function buildChartImagePie($chartPicture, $chartData, $reportData, $imageHeight, $imageWidth, $xName, $recordImageMap) {
        $PieChart = new pPie($chartPicture, $chartData);
        $x = 0;
        foreach ($reportData as $row) {
            $PieChart->setSliceColor($x, $this->getColour($row[$xName], true));
            $x++;
        }
        $PieChart->draw2DPie($imageWidth / 3, $imageHeight / 2, array("Border" => TRUE, 'Radius' => 200, '' => true, "RecordImageMap" => $recordImageMap));
        $PieChart->drawPieLegend($imageWidth * 0.7, $imageHeight / 3, array('FontSize' => 10, "FontName" => "modules/AOR_Charts/lib/pChart/fonts/verdana.ttf", 'BoxSize' => 14));
    }

    function buildChartImageLine($chartPicture, $recordImageMap = false) {
        $scaleSettings = array("XMargin" => 10, "YMargin" => 10, "GridR" => 200, "GridG" => 200, "GridB" => 200, 'MinDivHeight' => 50, "LabelRotation" => 30);
        $chartPicture->drawScale($scaleSettings);
        $chartPicture->drawLineChart(array("RecordImageMap" => $recordImageMap));
    }

    function buildChartImageRadar($chartPicture, $chartData, $recordImageMap) {
        $SplitChart = new pRadar();
        $Options = array("LabelPos" => RADAR_LABELS_HORIZONTAL, "RecordImageMap" => $recordImageMap);
        $SplitChart->drawRadar($chartPicture, $chartData, $Options);
    }

    public function buildChartImage(array $reportData, array $fields, $asDataURI = true, $generateImageMapId = false) {
        global $current_user;
        require_once 'modules/AOR_Charts/lib/pChart/pChart.php';

        if ($generateImageMapId !== false) {
            $generateImageMapId = $current_user->id . "-" . $generateImageMapId;
        }

        $html = '';
        if (!in_array($this->type, $this->getValidChartTypes())) {
            return $html;
        }
        $x = $fields[$this->x_field];
        $y = $fields[$this->y_field];
        if (!$x || !$y) {
            //Malformed chart object - missing an axis field
            return '';
        }
        $xName = str_replace(' ', '_', $x->label) . $this->x_field;
        $yName = str_replace(' ', '_', $y->label) . $this->y_field;

        $chartData = new pData();
        $chartData->loadPalette("modules/AOR_Charts/lib/pChart/palettes/navy.color", TRUE);
        $labels = array();
        foreach ($reportData as $row) {
            $chartData->addPoints($row[$yName], 'data');
            $chartData->addPoints($row[$xName], 'Labels');
            $labels[] = $row[$xName];
        }

        $chartData->setSerieDescription("Months", "Month");
        $chartData->setAbscissa("Labels");

        $imageHeight = 700;
        $imageWidth = 700;

        $chartPicture = new pImage($imageWidth, $imageHeight, $chartData);
        if ($generateImageMapId) {
            $imageMapDir = create_cache_directory('modules/AOR_Charts/ImageMap/' . $current_user->id . '/');
            $chartPicture->initialiseImageMap($generateImageMapId, IMAGE_MAP_STORAGE_FILE, $generateImageMapId, $imageMapDir);
        }

        $chartPicture->Antialias = True;

        $chartPicture->drawFilledRectangle(0, 0, $imageWidth - 1, $imageHeight - 1, array("R" => 240, "G" => 240, "B" => 240, "BorderR" => 0, "BorderG" => 0, "BorderB" => 0,));

        $chartPicture->setFontProperties(array("FontName" => "modules/AOR_Charts/lib/pChart/fonts/verdana.ttf", "FontSize" => 14));

        $chartPicture->drawText($imageWidth / 2, 20, $this->name, array("R" => 0, "G" => 0, "B" => 0, 'Align' => TEXT_ALIGN_TOPMIDDLE));
        $chartPicture->setFontProperties(array("FontName" => "modules/AOR_Charts/lib/pChart/fonts/verdana.ttf", "FontSize" => 6));

        $chartPicture->setGraphArea(60, 60, $imageWidth - 60, $imageHeight - 100);

        switch ($this->type) {
            case 'radar':
                $this->buildChartImageRadar($chartPicture, $chartData, !empty($generateImageMapId));
                break;
            case 'pie':
                $this->buildChartImagePie($chartPicture, $chartData, $reportData, $imageHeight, $imageWidth, $xName, !empty($generateImageMapId));
                break;
            case 'line':
                $this->buildChartImageLine($chartPicture, !empty($generateImageMapId));
                break;
            case 'bar':
            default:
                $this->buildChartImageBar($chartPicture, !empty($generateImageMapId));
                break;
        }
        if ($generateImageMapId) {
            $chartPicture->replaceImageMapTitle("data", $labels);
        }
        ob_start();
        $chartPicture->render('');
        $img = ob_get_clean();
        if ($asDataURI) {
            return 'data:image/png;base64,' . base64_encode($img);
        } else {
            return $img;
        }
    }

    public function buildChartHTML(array $reportData, array $fields, $index = 0, $chartType = AOR_Report::CHART_TYPE_PCHART, AOR_Field $mainGroupField = null) {
        switch ($chartType) {
            case AOR_Report::CHART_TYPE_PCHART:
                return $this->buildChartHTMLPChart($reportData, $fields, $index);
            case AOR_Report::CHART_TYPE_CHARTJS:
                return $this->buildChartHTMLChartJS($reportData, $fields);
            case AOR_Report::CHART_TYPE_RGRAPH:
                return $this->buildChartHTMLRGraph($reportData, $fields, $mainGroupField);
        }
        return '';
    }

    private function buildChartHTMLRGraph(array $reportData, array $fields, AOR_Field $mainGroupField = null) {
        $html = '';
        if (!in_array($this->type, $this->getValidChartTypes())) {
            return $html;
        }
        $x = $fields[$this->x_field];
        $y = $fields[$this->y_field];
        if (!$x || !$y) {
            //Malformed chart object - missing an axis field
            return '';
        }
        $xName = str_replace(' ', '_', $x->label) . $this->x_field;
        $yName = str_replace(' ', '_', $y->label) . $this->y_field;

        $defaultHeight = 400;
        $defaultWidth = 500;

        switch ($this->type) {
            /*
              //Polar was not implemented for the previous library (it is not in the getValidChartTypes method)
              case 'polar':
              $chartFunction = 'PolarArea';
              $data = $this->getPolarChartData($reportData, $xName,$yName);
              $config = $this->getPolarChartConfig();
              break;
             */
            case 'radar':
                $chartFunction = 'Radar';
                $data = $this->getRGraphBarChartData($reportData, $xName, $yName);
                $config = $this->getRadarChartConfig();
                $chart = $this->getRGraphRadarChart(json_encode($data['data']), json_encode($data['labels']), json_encode($data['tooltips']), $this->name, $this->id, $defaultHeight, $defaultWidth);
                break;
            case 'pie':
                $chartFunction = 'Pie';
                $data = $this->getRGraphBarChartData($reportData, $xName, $yName);
                $config = $this->getPieChartConfig();
                $chart = $this->getRGraphPieChart(json_encode($data['data']), json_encode($data['labels']), json_encode($data['tooltips']), $this->name, $this->id, $defaultHeight, $defaultWidth);
                break;
            case 'line':
                $chartFunction = 'Line';
                $data = $this->getRGraphBarChartData($reportData, $xName, $yName);
                $config = $this->getLineChartConfig();
                $chart = $this->getRGraphLineChart(json_encode($data['data']), json_encode($data['labels']), json_encode($data['tooltips']), $this->name, $this->id, $defaultHeight, $defaultWidth,$xName, $yName);
                break;
            case 'rose':
                $chartFunction = 'Rose';
                $data = $this->getRGraphBarChartData($reportData, $xName, $yName);
                $config = $this->getRoseChartConfig();
                $chart = $this->getRGraphRoseChart(json_encode($data['data']), json_encode($data['labels']), json_encode($data['tooltips']), $this->name, $this->id, $defaultHeight, $defaultWidth);
                break;
            case 'grouped_bar':
                $chartFunction = 'Grouped bar';
                $data = $this->getRGraphGroupedBarChartData($reportData, $xName, $yName, $mainGroupField);
                $config = $this->getGroupedBarChartConfig();
                $chart = $this->getRGraphGroupedBarChart(json_encode($data['data']), json_encode($data['labels']), json_encode($data['tooltips']), $this->name, $this->id, $defaultHeight, $defaultWidth, true);
                break;
            case 'stacked_bar':
                $chartFunction = 'Stacked bar';
                $data = $this->getRGraphGroupedBarChartData($reportData, $xName, $yName, $mainGroupField);
                $config = $this->getStackedBarChartConfig();
                $chart = $this->getRGraphGroupedBarChart(json_encode($data['data']), json_encode($data['labels']), json_encode($data['tooltips']), $this->name, $this->id, $defaultHeight, $defaultWidth, false);
                break;
            case 'bar':
            default:
                $chartFunction = 'Bar';
                $data = $this->getRGraphBarChartData($reportData, $xName, $yName);
                $config = $this->getBarChartConfig();
                $chart = $this->getRGraphBarChart(json_encode($data['data']), json_encode($data['labels']), json_encode($data['tooltips']), $this->name, $this->id, $defaultHeight, $defaultWidth, $xName, $yName);
                break;
        }

        return $chart;
    }

    private function getRGraphRoseChart($chartDataValues, $chartLabelValues, $chartTooltips, $chartName, $chartId, $chartHeight = 400, $chartWidth = 400) {
        $dataArray = json_decode($chartDataValues);
        if (!is_array($dataArray) || count($dataArray) < 1) {
            return "<h3>$this->noDataMessage</h3>";
        }
        $html = '';
        $html .= "<canvas id='$chartId' width='$chartWidth' height='$chartHeight' class='resizableCanvas'></canvas>";
        $html .= <<<EOF
        <script>
            new RGraph.Rose({
            id: '$chartId',
            options:{
                //title: '$chartName',
                //labels: $chartLabelValues,
                //textSize:8,
                textSize:10,
                //titleSize:10,
                 tooltips:$chartTooltips,
                tooltipsEvent:'onmousemove',
                tooltipsCssClass: 'rgraph_chart_tooltips_css',
                colors: $this->colours,
                colorsSequential:true
            },
            data: $chartDataValues
        }).draw();
        </script>
EOF;
        return $html;
    }

    //I have not used a parameter for getRGraphBarChart to say whether to group etc, as the future development could be quite different
    //for both, hence the separate methods.  However, the $grouped parameter allows us to specify whether the chart is grouped (true)
    //or stacked (false)
    private function getRGraphGroupedBarChart($chartDataValues, $chartLabelValues, $chartTooltips, $chartName, $chartId, $chartHeight = 400, $chartWidth = 400, $grouped = false) {
        $dataArray = json_decode($chartDataValues);
        //   $grouping = 'grouped'; //$mainGroupField->label; //'grouped';
        $isStackedChart = "False";
        if (!$grouped)
            $isStackedChart = "True";
        // $grouping='stacked';
        if (!is_array($dataArray) || count($dataArray) < 1) {
            return "<h3>$this->noDataMessage</h3>";
        }
//        $html = '';
//        $html .= "<canvas id='$chartId' width='$chartWidth' height='$chartHeight' class='resizableCanvas'></canvas>";
//        $html .= <<<EOF
//        <script>
//            new RGraph.Bar({
//            id: '$chartId',
//            data: $chartDataValues,
//            options: {
//                grouping:'$grouping',
//                backgroundGrid:false,
//                backgroundGrid:false,
//                gutterBottom: 150,
//                //gutterTop:40,
//                //gutterLeft:30,
//                title: '$chartName',
//
//                tooltips:$chartTooltips,
//                tooltipsEvent:'onmousemove',
//                tooltipsCssClass: 'rgraph_chart_tooltips_css',
//
//                gutterLeft:50,
//                shadow:false,
//                titleSize:10,
//                labels: $chartLabelValues,
//                textSize:10,
//                textAngle: 90,
//                colors: $this->colours,
//                ymax:calculateMaxYForSmallNumbers($chartDataValues)
//            }
//        }).draw();
//        </script>
//EOF;
//        


        $chartHeight = $chartHeight . "px";
        $chartWidth = $chartWidth . "px";
        $bar_lv = json_decode($chartLabelValues);
        $bar_dv = json_decode($chartDataValues);
        $barcomb_arr = array_combine(array_values($bar_lv), array_values($bar_dv));
        $colours = array('#3366CC', '#DC3912', '#FF9900', '#109618', '#990099', '#3B3EAC', '#0099C6', '#DD4477', '#66AA00', '#B82E2E', '#316395', '#994499', '#22AA99', '#AAAA11', '#6633CC', '#E67300', '#8B0707', '#329262', '#5574A6', '#3B3EAC');

        $colur_count = 1;

        foreach ($barcomb_arr as $k => $v) {

            $max_count[] = count($v);
        }
        $get_tooltips = explode(",", str_replace('"', "", trim(str_replace('[', "", trim($chartTooltips)))));
        $tooltips[] = 'Name';
        foreach ($get_tooltips as $t) {
            $tooltips[] = trim(strstr($t, '(', true));
        }
        $tooltips = array_diff($tooltips,  array(''));
        $unique_tooltips = "'" . implode("','", array_unique($tooltips)) . "'";

        $max_grouped = max($max_count);
        foreach ($barcomb_arr as $k => $v) {

            $col_color = $colours[$colur_count++];
            if (empty($col_color)) {
                $col_color = "blue";
            }

            $bar_cht.="['" . $k . "'," . implode(",", array_pad($v, $max_grouped, 0)) . "],";
        }

        $html .= <<<EOT

    <script type="text/javascript">
    
$(document).ready(function(){
$(window).resize(function(){
drawStuffBarGroupedStacked();
});

        google.load('visualization', '1', {packages:['corechart'], callback: drawStuffBarGroupedStacked});
        });
                
                function drawStuffBarGroupedStacked() {
        var data = new google.visualization.arrayToDataTable([
        [$unique_tooltips],
        $bar_cht
        ]);

        var options = {
        
        title: '$chartName',
        
        bars: 'horizontal', // Required for Material Bar Charts.
        isStacked:'$isStackedChart',
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div$chartId'));
        chart.draw(data, options);
        
        google.visualization.events.addListener(chart, 'ready', function () {
                        googleImages.push(chart.getImageURI());
        });   
            }
        </script>
        <div id="chart_div$chartId" class="google_chart"></div><br>


EOT;



        return $html;
    }

    private function getRGraphBarChart($chartDataValues, $chartLabelValues, $chartTooltips, $chartName, $chartId, $chartHeight = 400, $chartWidth = 400, $xName, $yName) {
        $dataArray = json_decode($chartDataValues);
        if (!is_array($dataArray) || count($dataArray) < 1) {
            return "<h3>$this->noDataMessage</h3>";
        }
        // print_r($chartDataValues);
        //~ $col_arr="['#3366CC','#DC3912','#FF9900','#109618','#990099','#3B3EAC','#0099C6','#DD4477','#66AA00','#B82E2E','#316395','#994499','#22AA99','#AAAA11','#6633CC','#E67300','#8B0707','#329262','#5574A6','#3B3EAC']";
//~
        //~ $html = '';
        //~ $html .= "<canvas id='$chartId' width='$chartWidth' height='$chartHeight' class='resizableCanvas'></canvas>";
        //~
        //~ $html .= <<<EOF
        //~ <script>
        //~ new RGraph.Bar({
        //~ id: '$chartId',
        //~ data: $chartDataValues,
        //~ options: {
        //~ title: '$chartName',
        //~ gutterBottom: 150,
        //~ gutterLeft:100,
        //~ gutterTop:50,
        //~ title: '$chartName',
        //~ labels: $chartLabelValues,
        //~ colorsSequential:true,
        //~ textAngle: 90,
        //~ textSize:10,
        //~ titleSize:10,
        //~
        //~ tooltips:$chartTooltips,
        //~ tooltipsCssClass: 'rgraph_chart_tooltips_css',
        //~ tooltipsEvent:'onmousemove',
        //~
        //~ yaxis: false,
        //~ backgroundGrid:false,
        //~ backgroundGridBorder: false,
//~
        //~ //colors: $this->colours,
        //~ colors:$col_arr
        //~ }
        //~ }).grow();
        //~ </script>
//~ EOF;
        //   tooltips:$chartTooltips,
        // tooltipsCssClass: 'rgraph_chart_tooltips_css',
        // tooltipsEvent:'onmousemove',

        $chartHeight = $chartHeight . "px";
        $chartWidth = $chartWidth . "px";
        $bar_lv = json_decode($chartLabelValues);
        $bar_dv = json_decode($chartDataValues);
        $barcomb_arr = array_combine(array_values($bar_lv), array_values($bar_dv));
        $colours = array('#3366CC', '#DC3912', '#FF9900', '#109618', '#990099', '#3B3EAC', '#0099C6', '#DD4477', '#66AA00', '#B82E2E', '#316395', '#994499', '#22AA99', '#AAAA11', '#6633CC', '#E67300', '#8B0707', '#329262', '#5574A6', '#3B3EAC');

        $colur_count = 1;
        
        //Replace underscore and digits with empty space
        $xName = preg_replace("/\d/" , "" , $xName);
        $yName = preg_replace("/\d/" , "" , $yName);
        $xName = str_replace("_", " ", $xName);
        $yName = str_replace("_", " ", $yName);
        //End

        foreach ($barcomb_arr as $k => $v) {

            $col_color = $colours[$colur_count++];
            if (empty($col_color)) {
                $col_color = "blue";
            }
            if ($chartId == "2dc4d042-6b7c-4896-2a9a-594a4c7b770c") {
                $vnew = $GLOBALS['app_list_strings']['customer_grade_0'][$k];

                $bar_cht.="['" . $vnew . "'," . $v . ",'color:" . $col_color . "'],";
            } else {
                $bar_cht.="['" . $k . "'," . $v . ",'color:" . $col_color . "'],";
            }
        }
//print_r($bar_cht);

        $html .= <<<EOT

    <script type="text/javascript">
      $(document).ready(function(){

			$(window).resize(function(){
			drawChart();
			});
    //  google.charts.load('current', {'packages':['bar']});
    //  google.charts.setOnLoadCallback(drawStuff);


function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Name');
    data.addColumn('number', 'Value');
    data.addColumn({type: 'string', role: 'style'});
    data.addRows([
       $bar_cht
    ]);


    var chart = new google.visualization.ColumnChart(document.querySelector('#chart_div$chartId'));
   google.visualization.events.addListener(chart, 'ready', function () {
                        googleImages.push(chart.getImageURI());
                });                 
    chart.draw(data, {
	//	title: '$chartName',
//        height: "$chartHeight",
 //       width: "$chartWidth",
        legend: {
            position: 'none'
        },
          hAxis: {
			title: '$xName'
          },
          vAxis: { 
			  title: '$yName',
		  },
    });
}
google.load('visualization', '1', {packages:['corechart'], callback: drawChart});

  });

        </script>


    <div id="chart_div$chartId" class="google_chart"></div><br>


EOT;
        $GLOBALS['log']->fatal($html . "Chart html");

        return $html;
    }

    private function getRGraphRadarChart($chartDataValues, $chartLabelValues, $chartTooltips, $chartName, $chartId, $chartHeight = 400, $chartWidth = 400) {
        $dataArray = json_decode($chartDataValues);
        if (!is_array($dataArray) || count($dataArray) < 1) {
            return "<h3>$this->noDataMessage</h3>";
        }
        $html = '';
        $html .= "<canvas id='$chartId' width='$chartWidth' height='$chartHeight' class='resizableCanvas'></canvas>";
        $html .= <<<EOF
        <script>
            new RGraph.Radar({
            id: '$chartId',
            data: $chartDataValues,
            options: {
                title: '$chartName',
                labels: $chartLabelValues,
                textSize:10,


                tooltips:$chartTooltips,
                tooltipsEvent:'onmousemove',
                tooltipsCssClass: 'rgraph_chart_tooltips_css',

                colors: $this->colours,
                ymax:calculateMaxYForSmallNumbers($chartDataValues)
            }
        }).draw();
        </script>
EOF;
        return $html;
    }

    private function getRGraphPieChart($chartDataValues, $chartLabelValues, $chartTooltips, $chartName, $chartId, $chartHeight = 400, $chartWidth = 400) {
        $dataArray = json_decode($chartDataValues);

        if (!is_array($dataArray) || count($dataArray) < 1) {
            return "<h3>$this->noDataMessage</h3>";
        }
        /*
          if($chartHeight > 400)
          $chartHeight = 400;
          if($chartWidth > 600)
          $chartWidth = 400;
         */
//~ $col_arr="['#3366CC','#DC3912','#FF9900','#109618','#990099','#3B3EAC','#0099C6','#DD4477','#66AA00','#B82E2E','#316395','#994499','#22AA99','#AAAA11','#6633CC','#E67300','#8B0707','#329262','#5574A6','#3B3EAC']";
//~
        //~ $html .= '';
        //~ $html .= "<canvas id='$chartId' width='$chartWidth' height='$chartHeight' class='resizableCanvas' ></canvas>";
        // class='resizableCanvas'
        //~ $html .= <<<EOF
        //~ <script>
        //~ new RGraph.Pie({
        //~ id: '$chartId',
        //~ data: $chartDataValues,
        //~ options: {
        //~ title: '$chartName',
        //~
        //~ textSize:10,
        //~ titleSize:10,
        //~ gutterTop:60,
        //~ shadow: false,
        //~ tooltips:$chartTooltips,
        //~ tooltipsEvent:'onmousemove',
        //~ tooltipsCssClass: 'rgraph_chart_tooltips_css',
        //~ labels: $chartLabelValues,
        //~ //colors: $this->colours
        //~ colors : $col_arr,
        //~ labelsSticks:true,
        //~ linewidth: 1,
        //~ variant: 'donut',
        //~ gutterLeft:110,
        //~ shadowBlur:0,
        //			strokestyle: 'rgba(0,0,0,0)',
        //			exploded: 0,
        //~
//~
        //~
        //~ }
        //~ }).roundRobin();
        //~ </script>
//~ EOF;


        $chartHeight = $chartHeight . "px";
        $chartWidth = $chartWidth . "px";
        $clv = json_decode($chartLabelValues);
        $cdv = json_decode($chartDataValues);
        $comb_arr = array_combine(array_values($clv), array_values($cdv));

        foreach ($comb_arr as $k => $v) {

            $pie_cht.="['" . $k . "'," . $v . "],";
        }
        $html .= <<<EOT
		<style>
		 path[d^="M587,346L600,353L587,359Z"] {fill: #2767AB;}
		 path[d^="M559,359L559,346L546,353Z"] {fill: #2767AB;}
		 path[d^="M439,369L451,375L439,381Z"] {fill: #2767AB}
		 text[fill^="#0011cc"] {fill: #2767AB;}

		</style>
		<script type="text/javascript">

          $(document).ready(function(){

			$(window).resize(function(){
			drawChart();
			});

     // google.charts.load("current", {packages:["corechart"]});
     // google.charts.setOnLoadCallback(drawChart);

        if(google) {
		google.load('visualization', '1', {
			packages: ['corechart'],
			callback: function() {
				drawChart();
			}
		} )
	}

      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Type', 'Value'],
          $pie_cht

        ]);

        var options = {
      //  title: "$chartName",
		legend: {position: 'right',alignment:'center',},
		chartArea:{width:600,height:300},
		//pieSliceText:'label',
		pieHole: 0.4,
	    };
       var chart = new google.visualization.PieChart(document.getElementById('$chartId'));
       google.visualization.events.addListener(chart, 'ready', function () {
                        googleImages.push(chart.getImageURI());
                });                 
        chart.draw(data, options);
      }
  })
        </script>
      <div id="$chartId" class="google_chart"></div><br>
EOT;

        return $html;
    }

    private function getRGraphLineChart($chartDataValues, $chartLabelValues, $chartTooltips, $chartName, $chartId, $chartHeight = 400, $chartWidth = 400, $xName, $yName) {
        $dataArray = json_decode($chartDataValues);
        if (!is_array($dataArray) || count($dataArray) < 1) {
            return "<h3>$this->noDataMessage</h3>";
        }
        //~ $html = '';
        //~ $html .= "<canvas id='$chartId' width='$chartWidth' height='$chartHeight' class='resizableCanvas'></canvas>";
        //~ $html .= <<<EOF
        //~ <script>
        //~ new RGraph.Line({
        //~ id: '$chartId',
        //~ data: $chartDataValues,
        //~ options: {
        //~ title: '$chartName',
        //~ gutterBottom: 50,
        //~ gutterLeft:100,
        //~ gutterTop:50,
        //~ // tickmarks:'encircle',
        //~ textSize:10,
        //~ titleSize:10,
        //~ //title: '$chartName',
        //~ labels: $chartLabelValues,
        //~ tooltips:$chartTooltips,
        //~ tooltipsEvent:'onmousemove',
        //~ tooltipsCssClass: 'rgraph_chart_tooltips_css',
//~
        //~ tickmarks:'circle',
//~
        //~ textAngle: 90,
        //~ //titleSize:10,
        //~ backgroundGrid:false,
        //~ colors: $this->colours
        //~ linewidth: 2,
        //~ colors: [['red','black']],
        //~ colorsAlternate: true,
        //~ textAccessible: true
        //~ }
        //~ }).draw();
        //~ </script>
//~ EOF;


        $chartHeight = $chartHeight . "px";
        $chartWidth = $chartWidth . "px";
        $linelv = json_decode($chartLabelValues);
        $linedv = json_decode($chartDataValues);
        $line_comb_arr = array_combine(array_values($linelv), array_values($linedv));
        
        //Replace underscore and digits with empty space
        $xName = preg_replace("/\d/" , "" , $xName);
        $yName = preg_replace("/\d/" , "" , $yName);
        $xName = str_replace("_", " ", $xName);
        $yName = str_replace("_", " ", $yName);
        //End

        foreach ($line_comb_arr as $k => $v) {

            $line_cht.="['" . $k . "'," . $v . "],";
        }
//print_r($line_cht);
        $html .= <<<EOF

        <script>
$(document).ready(function(){
		$(window).resize(function(){
		drawLineChart();
		});

	 if(google) {
		google.load('visualization', '1', {
			packages: ['corechart'],
			callback: function() {
				drawLineChart();
			}
		} )
	}
	 function drawLineChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'Values'],
          $line_cht
        ]);

        var options = {
        //  title: '$chartName',
          curveType: 'function',
          legend: 'none',
          pointSize: 8,

          hAxis: {
			title: '$xName',
          },
          vAxis: {
			title: '$yName',
		},	
        };

        var chart = new google.visualization.LineChart(document.getElementById('$chartId'));
        google.visualization.events.addListener(chart, 'ready', function () {
                        googleImages.push(chart.getImageURI());
                });                   
        chart.draw(data, options);




            }


	})



        </script>
   <div id="$chartId"  class="google_chart"></div><br>


EOF;

        return $html;
    }

    private function buildChartHTMLChartJS(array $reportData, array $fields) {
        $html = '';
        if (!in_array($this->type, $this->getValidChartTypes())) {
            return $html;
        }
        $x = $fields[$this->x_field];
        $y = $fields[$this->y_field];
        if (!$x || !$y) {
            //Malformed chart object - missing an axis field
            return '';
        }
        $xName = str_replace(' ', '_', $x->label) . $this->x_field;
        $yName = str_replace(' ', '_', $y->label) . $this->y_field;

        switch ($this->type) {
            case 'polar':
                $chartFunction = 'PolarArea';
                $data = $this->getPolarChartData($reportData, $xName, $yName);
                $config = $this->getPolarChartConfig();
                break;
            case 'radar':
                $chartFunction = 'Radar';
                $data = $this->getRadarChartData($reportData, $xName, $yName);
                $config = $this->getRadarChartConfig();
                break;
            case 'pie':
                $chartFunction = 'Pie';
                $data = $this->getPieChartData($reportData, $xName, $yName);
                $config = $this->getPieChartConfig();
                break;
            case 'line':
                $chartFunction = 'Line';
                $data = $this->getLineChartData($reportData, $xName, $yName);
                $config = $this->getLineChartConfig();
                break;
            case 'bar':
            default:
                $chartFunction = 'Bar';
                $data = $this->getBarChartData($reportData, $xName, $yName);
                $config = $this->getBarChartConfig();
                break;
        }
        $data = json_encode($data);
        $config = json_encode($config);
        $chartId = 'chart' . $this->id;
        $html .= "<h3>{$this->name}</h3>";
        $html .= "<canvas id='{$chartId}' width='400' height='400'></canvas>";
        $html .= <<<EOF
        <script>
        $(document).ready(function(){
            SUGAR.util.doWhen("typeof Chart != 'undefined'", function(){
                var data = {$data};
                var ctx = document.getElementById("{$chartId}").getContext("2d");
                console.log('Creating new chart');
                var config = {$config};
                var chart = new Chart(ctx).{$chartFunction}(data, config);
                var legend = chart.generateLegend();
                $('#{$chartId}').after(legend);
            });
        });
        </script>
EOF;
        return $html;
    }

    private function buildChartHTMLPChart(array $reportData, array $fields, $index = 0) {
        $html = '';
        $imgUri = $this->buildChartImage($reportData, $fields, true, $index);
        $img = "<img id='{$this->id}_img' src='{$imgUri}'>";
        $html .= $img;
        $html .= <<<EOF
<script>
SUGAR.util.doWhen("typeof addImage != 'undefined'", function(){
    addImage('{$this->id}_img','{$this->id}_img_map','index.php?module=AOR_Charts&action=getImageMap&to_pdf=1&imageMapId={$index}');
});
</script>
EOF;
        return $html;
    }

    private function getShortenedLabel($label, $maxLabelSize = 20) {
        if (strlen($label) > $maxLabelSize) {
            return substr($label, 0, $maxLabelSize) . '...';
        } else
            return $label;
    }

    private function getRGraphGroupedBarChartData($reportData, $xName, $yName, AOR_Field $mainGroupField = null) {


        // get z-axis name

        $zName = null;
        foreach ($reportData[0] as $key => $value) {
            $field = str_replace(' ', '_', is_null($mainGroupField) ? 'no data' : $mainGroupField->label);
            if (preg_match('/^' . $field . '[0-9]+/', $key)) {
                $zName = $key;
                break;
            }
        }



        // get grouped values

        $data = array();
        $tooltips = array();

        $usedKeys = array();
        foreach ($reportData as $key => $row) {
            $filter = $row[$xName];
            foreach ($reportData as $key2 => $row2) {
                if ($row2[$xName] == $filter && !in_array($key, $usedKeys)) {
                    $data [$row[$xName]] [] = (float) $row[$yName];
                    $tooltips [$row[$xName]] [] = isset($row[$zName]) ? $row[$zName] : null;
                    $usedKeys[] = $key;
                }
            }
        }

        $_data = array();
        foreach ($data as $label => $values) {
            foreach ($values as $key => $value) {
                $_data[$label][$tooltips[$label][$key]] = $value;
            }
        }
        $data = $_data;


        // make data format for charts

        $_data = array();
        $_labels = array();
        $_tooltips = array();
        foreach ($data as $label => $values) {
            $_labels[] = $this->getShortenedLabel($label);
            $_values = array();
            foreach ($values as $tooltip => $value) {
                $_tooltips[] = $tooltip . " ($value)";
                $_values[] = $value;
            }
            $_data[] = $_values;
        }


        $chart = array(
            'data' => $_data,
            'labels' => $_labels,
            'tooltips' => $_tooltips,
        );

        return $chart;
    }

    private function getRGraphBarChartData($reportData, $xName, $yName) {
        $chart['labels'] = array();
        $chart['data'] = array();
        $chart['tooltips'] = array();
        foreach ($reportData as $row) {
            $chart['labels'][] = $this->getShortenedLabel($row[$xName]);
            $chart['tooltips'][] = $row[$xName] . ': ' . $row[$yName];
            $chart['data'][] = (float) $row[$yName];
        }
        return $chart;
    }

    private function getBarChartData($reportData, $xName, $yName) {
        $data = array();
        $data['labels'] = array();
        $datasetData = array();
        foreach ($reportData as $row) {
            $data['labels'][] = $row[$xName];
            $datasetData[] = $row[$yName];
        }

        $data['datasets'] = array();
        $data['datasets'][] = array(
            'fillColor' => "rgba(151,187,205,0.2)",
            'strokeColor' => "rgba(151,187,205,1)",
            'pointColor' => "rgba(151,187,205,1)",
            'pointStrokeColor' => "#fff",
            'pointHighlightFill' => "#fff",
            'pointHighlightStroke' => "rgba(151,187,205,1)4",
            'data' => $datasetData);
        return $data;
    }

    private function getLineChartData($reportData, $xName, $yName) {
        return $this->getBarChartData($reportData, $xName, $yName);
    }

    private function getBarChartConfig() {
        return array();
    }

    private function getLineChartConfig() {
        return $this->getBarChartConfig();
    }

    private function getGroupedBarChartConfig() {
        return $this->getBarChartConfig();
    }

    private function getStackedBarChartConfig() {
        return $this->getBarChartConfig();
    }

    private function getRoseChartConfig() {
        return $this->getBarChartConfig();
    }

    private function getRadarChartData($reportData, $xName, $yName) {
        return $this->getBarChartData($reportData, $xName, $yName);
    }

    private function getPolarChartData($reportData, $xName, $yName) {
        return $this->getPieChartData($reportData, $xName, $yName);
    }

    private function getRadarChartConfig() {
        return array();
    }

    private function getPolarChartConfig() {
        return $this->getPieChartConfig();
    }

    private function getPieChartConfig() {
        $config = array();
        $config['legendTemplate'] = "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;<%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>";
        return $config;
    }

    private function getPieChartData($reportData, $xName, $yName) {
        $data = array();

        foreach ($reportData as $row) {
            if (!$row[$yName]) {
                continue;
            }
            $colour = $this->getColour($row[$xName]);
            $data[] = array(
                'value' => (int) $row[$yName],
                'label' => $row[$xName],
                'color' => $colour['main'],
                'highlight' => $colour['highlight'],
            );
        }
        return $data;
    }

}
