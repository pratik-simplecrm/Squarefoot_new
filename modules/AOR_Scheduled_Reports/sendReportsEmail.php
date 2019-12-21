<?php
if (!defined('sugarEntry'))
    define('sugarEntry', true);
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

require_once('include/entryPoint.php');
require_once('config.php');
require_once ('modules/AOR_Reports/AOR_Report.php');
include('custom/include/language/en_us.lang.php');
include('include/language/en_us.lang.php');
global $db, $sugar_config;
$response = array();
$id = $_REQUEST['record'];
$aor_scheduled_reportid = $_REQUEST['aor_scheduled_reportid'];
$unique_timestamp = $_REQUEST['unique_timestamp'];

$report_bean = new AOR_Report();
$report_bean->retrieve($id);

?>
<!doctype html>
<html>
    <head>
        <title>Custom Report</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script type="text/javascript" src="include/javascript/jquery/jquery.js"></script>
        <script type="text/javascript" src="custom/include/loader.js"></script>
        <script type="text/javascript" src="custom/include/jsapi.js"></script>
        <style>
            .google_chart{
                width:1297px;
                height:600px;
            }
            
            
        </style>
        <script>
            var googleImages = [];

            function uploadImage() {
                var z = new FormData();
                z.append('module','AOR_Reports');
                z.append('record','<?php echo $id; ?>');
                z.append('unique_timestamp','<?php echo $unique_timestamp; ?>');
                z.append('aor_scheduled_reportid','<?php echo $aor_scheduled_reportid; ?>');
                for (var i = 0; i < googleImages.length; i++) {
                    z.append('graphsForPDF['+i+']',googleImages[i]);
                }

                
               var xhr = new XMLHttpRequest();
                xhr.open('post', '<?php echo $sugar_config['site_url']; ?>/index.php?entryPoint=SendReportsinEmailUploadImage', true); //Post to php Script to save to server
                xhr.send(z);
            }
            
            $(document).ready(function(){
             setTimeout(function(){
                 uploadImage();
             },10000);   
            });
            
        </script>
    </head>
    

    <body>
        <?php echo $response['graphs'] = $report_bean->build_report_chart(null, AOR_Report::CHART_TYPE_RGRAPH);?>
    </body>
</html>
