<?php
require_once 'scrmCustomReport.php';
$url = $sugar_config['site_url'];
$user = $_REQUEST['id'];
$user_id = $current_user->id;
$user_name = $current_user->user_name;
$options = "";
$query1 = "SELECT id FROM securitygroups WHERE deleted=0";
$result = $db->query($query1);
while ($getteams1 = $db->fetchByAssoc($result)) {
    $team_id = $getteams1['id'];
    $sql = "SELECT name FROM securitygroups where id='$team_id'";
    $result1 = $db->query($sql);
    $row = $db->fetchByAssoc($result1);
    //  $id=$row["id"];
    $key = str_replace(" ", "_", $row["name"]);
    $thing[$key] = $key;
    $values .= $row["name"];
}
?>
<style type="text/css">
    #weekly_perf_report{
        margin: 20px;
    }
    #weekly_perf_report table td,#weekly_perf_report table th, #weekly_perf_report table{        
        margin: 0;
        padding: 0;
    }
    #tbl_perf_body thead{
        width: calc( 100% - 1em ) !important;
        background-color: #ccc;

    }
    #tbl_perf_body{
        width: 100%;
        border-collapse: collapse;

    }
    #tbl_perf_body thead, #tbl_perf_body tbody tr {
        display:table;
        width:100%;
        table-layout:fixed;
    }
    #tbl_perf_body thead {
        width:100% !important;
    }
    #tbl_perf_body tbody tr{
        width:100% !important;
    }
    #tbl_perf_body tbody{
        display:block;

        max-height:400px;
        overflow-x:hidden;
        overflow-y: auto;
    }

    #tbl_perf_body thead tr td,#tbl_perf_body tbody tr td{
        width: 72px !important;

    }
    #tbl_perf_body thead tr td{
        border-color: #fff;
    }

    #weekly_perf_report .tbl-content{
        margin-top: 0px;
        border: 1px solid rgba(255,255,255,0.3);
    }

    .tbl-content td{
        padding: 2px !important;
        text-align: left;
        vertical-align:middle;
        font-weight: 300;
        font-size: 12px;
        border:  solid  1px rgba(212, 198, 198, 0.50);
        border-bottom: none;
    }

    .tbl-content tr:last-child{
        border-bottom:  solid  1px rgba(212, 198, 198, 0.50);
    }


</style>
<script type="text/javascript" >

    function showexcel()
    {
        var id = '<?php echo $user_id; ?>';
        var name1 = $('#name').val();
        var from = $('#from').val();
        var to = $('#to').val();
        $('#frmsales').attr('action', encodeURI("scrm_excelReport.php"));
        $('#frmsales').submit();
    }
    function showReport()
    {
        var id = '<?php echo $user_id; ?>';
        var values = $('#name').val();
        $('#frmsales').attr('action', encodeURI("index.php?module=Bhea_Custom_Reports&action=scrm_Report&id=" + id + "&name=" + values));
        $('#frmsales').submit();
    }
    
</script>
<section id="weekly_perf_report">
    <!--for demo wrap-->
    <h1>Weekly Performance Report</h1>

    <form name="frmsales" id="frmsales" action="" method="post" target="_parent">
        <table width="100%" border="0" align="center" class="list view">
            <tr>
                <td width="25%" align="left" valign="middle" class="">Excepted Close Date From
                    <input type="text" id="from" name="from" value="<?php
                    $from = $_REQUEST['from'];
                    if ($from != '1970-01-01') {
                        echo $from;
                    }
                    ?>"/>
                    <img border="0" src="themes/default/images/jscalendar.gif" id="fromb" align="absmiddle" />
                    <input type="hidden" id="id" name="id" value="<?php echo $user_id;?>" />
                    <script type="text/javascript">
                        Calendar.setup({inputField: "from",
                            button: "fromb",
                            align: "right"});
                    </script> </td>
                <td width="25%" align="left" valign="middle" class="">Excepted Close Date To
                    <input type="text" id="to" name="to" value="<?php
                    $to = $_REQUEST['to'];
                    if ($to != '1970-01-01') {
                        echo $to;
                    }
                    ?>"/>
                    <img border="0" src="themes/default/images/jscalendar.gif" id="tob" align="absmiddle" />
                    <script type="text/javascript">
                        Calendar.setup({inputField: "to",
                            button: "tob",
                            align: "right"});
                    </script>  </td>

                <td  width="20%" align="left" valign="middle" class="">Team Name

                    <select name="name[]" id="name" multiple="multiple">
                        <?php
                        global $app_list_strings;
                        foreach ($thing as $key => $value) {

                            $selected = in_array($key, $_POST['name']) ? "selected='selected' " : '';

                            echo "<option " . $selected . "value=" . $key . ">" . str_replace("_", " ", $key) . "</option>";
                        }
                        ?>
                    </select>
                </td>



            </tr>
            <tr>
                <td colspan="2" align="left" valign="middle" class=""><input type="submit" onClick="showReport()" name="generate_report" id="generate_report" value="Generate Report" >
                    <input type="submit" name="test" id="test" value="Generate Excel" onClick="showexcel()" /></td>
            </tr>
        </table> 
    </form>

    <!--    <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" id="tbl_perf_header">
               
            </table>
        </div>-->
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" id="tbl_perf_body" border="1px">
            <thead>
                <tr>
                    <td>Team Name</td>
                    <td>User Name</td>
                    <td>Target</td>
                    <td>Opp. Closed to date</td>
                    <td>Prospects Created Count</td>
                    <td>Opp. Created Count</td>
                    <td>Opp. Created Value</td>
                    <td>Opp. Won Count</td>
                    <td>Opp. Won Value</td>
                    <td>Opp. Lost Count</td>
                    <td>Opp. Lost Value</td>
                    <td>Calls Made</td>
                    <td>Meetings Held</td>
                    <td>Architects Count</td>
                    <td>Architects Calls Made</td>
                    <td>Architects Meetings Held</td>
                    <td>Active/ Inactive</td>
                </tr>
            </thead>
            <tbody>               
                <?php
                $strt_dt = $_REQUEST['from'];
                $end_dt = $_REQUEST['to'];
                $division = $_REQUEST['name'];
                $branch = $_REQUEST['name1'];
                $division_count = count($division);
                $branch_count = count($branch);

                global $current_user;
                $dateformat = $current_user->getPreference('datef');
                $strt_dt = date($dateformat, strtotime($strt_dt));
                $end_dt = date($dateformat, strtotime($end_dt));

                $user_id = array();
                $query = "SELECT id FROM  users WHERE deleted=0";
                $result = $db->query($query, true);
                while ($getuser = $db->fetchByAssoc($result)) {
                    $user_id[] = $getuser['id'];
                }
                $user_count = count($user_id);
                $row_count = $user_count * $division_count * $branch_count;
                $content = array();
                $content = getWeeklyPerformanceReport();

                $count = count($content[11]);
                $module_name = 'Arch_Architects_Contacts';
                $status = 'Held';
                for ($i = 0; $i < ($count - 1); $i++) {
                    if ($content[20][$i] == 'Inactive' || $content[20][$i] == '') {
                        if (($content[10][$i] != '0') && ($content[4][$i] != '0') && ($content[6][$i] != '0') || true) {
                            ?>
                            <tr>
                                <!--Team Name-->
                                <td ><?php echo $content[11][$i]; ?></td>
                                <!--User Name-->
                                <td ><a href='index.php?module=Users&return_module=Users&action=DetailView&record=<?php echo $content[10][$i]; ?>'><?php echo $content[0][$i]; ?></a></td>
                                <!--Total Target-->
                                <td><?php echo $content[16][$i]; ?></td>
                                <!--Opportunity Amount till date-->
                                <td><?php echo $content[18][$i]; ?></td>
                                <!--Propects or Leads-->
                                <td ><a href="index.php?module=Leads&start_range_date_entered_advanced=<?php echo $strt_dt; ?>&date_entered_advanced_range_choice=between&end_range_date_entered_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[1][$i]; ?></a></td>
                                <!--Number of Opportunity created-->
                                <td ><a href="index.php?module=Opportunities&start_range_date_entered_advanced=<?php echo $strt_dt; ?>&date_entered_advanced_range_choice=between&end_range_date_entered_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[2][$i]; ?></td>
                                <!--AMount of Opportunity created-->
                                <td ><?php echo $content[3][$i]; ?></td>
                                <!--Count of Oppo won-->
                                <td ><a href="index.php?module=Opportunities&start_range_date_closed_advanced=<?php echo $strt_dt; ?>&date_closed_advanced_range_choice=between&end_range_date_closed_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&sales_stage_advanced[]=Closed Won&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[4][$i]; ?></td>
                                <!--Amount of Oppo won-->
                                <td ><?php echo $content[5][$i]; ?></td>
                                <!--Count of Oppo Lost-->
                                <td ><a href="index.php?module=Opportunities&start_range_date_closed_advanced=<?php echo $strt_dt; ?>&date_closed_advanced_range_choice=between&end_range_date_closed_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&sales_stage_advanced[]=Closed Lost&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[6][$i]; ?></td>
                                <!--Amount of Oppo Lost-->
                                <td ><?php echo $content[7][$i]; ?></td>
                                <!--Count of Calls-->
                                <td ><a href="index.php?module=Calls&start_range_date_start_advanced=<?php echo $strt_dt; ?>&date_start_advanced_range_choice=between&end_range_date_start_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&status_advanced[]=<?php echo $status ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[8][$i]; ?></td>
                                <!--Count of Meetings-->
                                <td ><a href="index.php?module=Meetings&start_range_date_start_advanced=<?php echo $strt_dt; ?>&date_start_advanced_range_choice=between&end_range_date_start_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&status_advanced[]=<?php echo $status ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[9][$i]; ?></td>
                                <!--Count of Architects-->
                                <td ><a href="index.php?module=Arch_Architects_Contacts&start_range_date_entered_advanced=<?php echo $strt_dt; ?>&date_entered_advanced_range_choice=between&end_range_date_entered_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[13][$i]; ?></a></td>
                                <!--Count of Architects calls-->
                                <td ><a href="index.php?module=Calls&start_range_date_entered_advanced=<?php echo $strt_dt; ?>&date_entered_advanced_range_choice=between&end_range_date_entered_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&parent_type_advanced=<?php echo $module_name ?>&status_advanced[]=<?php echo $status ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[15][$i]; ?></td>
                                <!--Meetings of Architects-->
                                <td ><a href="index.php?module=Meetings&start_range_date_entered_advanced=<?php echo $strt_dt; ?>&date_entered_advanced_range_choice=between&end_range_date_entered_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&parent_type_advanced=<?php echo $module_name ?>&status_advanced[]=<?php echo $status ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[14][$i]; ?></td>
                                <td ><?php echo $content[20][$i]; ?></td>


                            </tr>
                            <?php
                        }
                    } else if ($content[20][$i] == 'Active') {
                        ?>

                        <tr>
                            <!--Team Name-->
                            <td ><?php echo $content[11][$i]; ?></td>
                            <!--User Name-->
                            <td ><a href='index.php?module=Users&return_module=Users&action=DetailView&record=<?php echo $content[10][$i]; ?>'><?php echo $content[0][$i]; ?></a></td>


                            <td><?php echo $content[16][$i]; ?>&nbsp;&nbsp;</td>
                            <!--Opportunity Amount till date-->
                            <td><?php echo $content[18][$i]; ?>&nbsp;&nbsp;</td>
                            <!--Propects or Leads-->
                            <td ><a href="index.php?module=Leads&start_range_date_entered_advanced=<?php echo $strt_dt; ?>&date_entered_advanced_range_choice=between&end_range_date_entered_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[1][$i]; ?></a></td>

                            <td ><a href="index.php?module=Opportunities&start_range_date_entered_advanced=<?php echo $strt_dt; ?>&date_entered_advanced_range_choice=between&end_range_date_entered_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[2][$i]; ?></td>

                            <td ><?php echo $content[3][$i]; ?></td>

                            <td ><a href="index.php?module=Opportunities&start_range_date_closed_advanced=<?php echo $strt_dt; ?>&date_closed_advanced_range_choice=between&end_range_date_closed_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&sales_stage_advanced[]=Closed Won&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[4][$i]; ?></td>

                            <td ><?php echo $content[5][$i]; ?></td>

                            <td ><a href="index.php?module=Opportunities&start_range_date_closed_advanced=<?php echo $strt_dt; ?>&date_closed_advanced_range_choice=between&end_range_date_closed_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&sales_stage_advanced[]=Closed Lost&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[6][$i]; ?></td>

                            <td ><?php echo $content[7][$i]; ?></td>

                            <td ><a href="index.php?module=Calls&start_range_date_start_advanced=<?php echo $strt_dt; ?>&date_start_advanced_range_choice=between&end_range_date_start_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&status_advanced[]=<?php echo $status ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[8][$i]; ?></td>

                            <td ><a href="index.php?module=Meetings&start_range_date_start_advanced=<?php echo $strt_dt; ?>&date_start_advanced_range_choice=between&end_range_date_start_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&status_advanced[]=<?php echo $status ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[9][$i]; ?></td>

                            <td ><a href="index.php?module=Arch_Architects_Contacts&start_range_date_entered_advanced=<?php echo $strt_dt; ?>&date_entered_advanced_range_choice=between&end_range_date_entered_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[13][$i]; ?></a></td>

                            <td ><a href="index.php?module=Calls&start_range_date_entered_advanced=<?php echo $strt_dt; ?>&date_entered_advanced_range_choice=between&end_range_date_entered_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&parent_type_advanced=<?php echo $module_name ?>&status_advanced[]=<?php echo $status ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[15][$i]; ?></td>
                            <td ><a href="index.php?module=Meetings&start_range_date_entered_advanced=<?php echo $strt_dt; ?>&date_entered_advanced_range_choice=between&end_range_date_entered_advanced=<?php echo $end_dt; ?>&assigned_user_id_advanced[]=<?php echo $content[10][$i]; ?>&id_search_form_team_name_advanced_collection_0=<?php echo $content[12][$i]; ?>&parent_type_advanced=<?php echo $module_name ?>&status_advanced[]=<?php echo $status ?>&query=true&offset=1&searchFormTab=advanced_search"><?php echo $content[14][$i]; ?></td>

                            <td ><?php echo $content[20][$i]; ?></td>


                        </tr>

                        <?php
                    }
                }
                ?>

                <tr>
                    <td ><?php echo $content[11][$count - 1]; ?></td>
                    <td ><?php echo $content[0][$count - 1]; ?></td>
                    <td ><?php echo $content[17]; ?></td>
                    <td ><?php echo $content[19]; ?></td>
                    <td ><?php echo $content[1][$count - 1]; ?></td>
                    <td ><?php echo $content[2][$count - 1]; ?></td>
                    <td ><?php echo $content[3][$count - 1]; ?></td>
                    <td ><?php echo $content[4][$count - 1]; ?></td>
                    <td ><?php echo $content[5][$count - 1]; ?></td>
                    <td ><?php echo $content[6][$count - 1]; ?></td>
                    <td ><?php echo $content[7][$count - 1]; ?></td>
                    <td ><?php echo $content[8][$count - 1]; ?></td>
                    <td ><?php echo $content[9][$count - 1]; ?></td>

                    <td ><?php echo $content[13][$count - 1]; ?></td>

                    <td ><?php echo $content[15][$count - 1]; ?></td>
                    <td ><?php echo $content[14][$count - 1]; ?></td>


                    <td ></td>


                </tr>
            </tbody>
        </table>
    </div>
</section>


