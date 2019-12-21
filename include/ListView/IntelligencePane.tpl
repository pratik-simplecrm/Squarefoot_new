{*
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

*}
{php}
global $db, $sugar_config,$current_user;
//require_once ('modules/AOR_Reports/controller.php');
 /*For dropdown values of intelligence pane*/
$module_name = $_REQUEST['module'];

$charts = "SELECT DISTINCT (aor_reports.id),aor_charts.id as chart_id, aor_reports.name
FROM `aor_reports` JOIN aor_charts ON aor_reports.id = aor_charts.aor_report_id WHERE aor_reports.report_module ='".$module_name."' AND  aor_reports.deleted =0 AND  aor_charts.deleted =0 GROUP BY aor_reports.id ORDER BY aor_reports.name";
$result_charts = $db->query($charts);


$get_last_report = "SELECT report_id FROM scrm_intelligence_pane WHERE um_id = '".$module_name.":".$current_user->id."' LIMIT 1";
$result_last_report = $db->query($get_last_report);
$row_last_report = $db->fetchByAssoc($result_last_report);

$this->assign("last_report_id", $row_last_report['report_id']);
/*For dropdown values of intelligence pane end*/
$this->assign("user_id", $current_user->id);
{/php}

<!--Generic Intelligence Panel-->
<div class="open_intel_pane" onclick="$('.gen_intel_pane').addClass('show_side_pane');">
    <a href="javascript:void(0);" ><i class="fa fa-angle-double-left"></i></a>
</div>
<div class="gen_intel_pane">
    <div class="intel_pane_container">
        <div class="preview_link">
            <a href="javascript:void(0);" onclick="$('.gen_intel_pane').removeClass('show_side_pane');"><i class="fa fa-angle-double-right"></i> Intelligence Pane</a>
        </div>
        <div id="intel_pane_container_data">
            <div class="row ptop5 col-md-12 intel_pane_dd">
                <select class="form-control" onchange="getIntelReports();" id="intel_pane_select">

                    {php}
                        
                        if($result_charts->num_rows > 0){
                                echo '<option value="">Select Report</option>';
                            while($rows_charts = $db->fetchByAssoc($result_charts)){
                                echo '<option value="'.$rows_charts['id'].'">'.$rows_charts['name'].'</option>';
                            }
                        }else{
                            echo '<option value="">No Data</option>';
                        }
                        
                    {/php}
                </select>
            </div>
            <div id="chart_values" class="row ptop5 col-md-12"></div>

        </div>
    </div>
</div>
<!--Generic Intelligence Panel-->
{literal}
    <script src="modules/AOR_Reports/AOR_Report.js"></script>
    <script type="text/javascript">
                    var last = '{/literal}{$last_report_id}{literal}';

                    function getIntelReports() {
                        var id = $('#intel_pane_select').val();
                        var u_id = '{/literal}{$user_id}{literal}';
                        var module_name = '{/literal}{$smarty.request.module}{literal}';

                        var str = '<div class="loader_pane"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>';
                        $('#chart_values').html(str);
                        $.ajax({
                            url: 'intelligence_pane.php',
                            data: {id: id, module: module_name, user_id: u_id},
                            type: 'post',
                            success: function (data) {
                                var obj = data;
                                $('#chart_values').html(obj);

                            }
                        });
                    }


                    $(document).ready(function () {
                        $('#intel_pane_select').val(last);
                        getIntelReports();
                    });
    </script>
{/literal}
