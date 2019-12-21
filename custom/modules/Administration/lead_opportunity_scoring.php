<?php
if (!defined('sugarEntry'))
    define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('config.php');



global $db, $sugar_config, $mod_strings;

//$module_list = array_intersect($GLOBALS['moduleList'],array_keys($GLOBALS['beanList']));


$querycheck = 'SELECT 1 FROM lead_and_opportunities_scoring';
$query_result = $db->query($querycheck);
if ($query_result === FALSE) {
    $create_table = $db->query("create table lead_and_opportunities_scoring(id INT(11) NOT NULL ,lead longtext,
		opportunities longtext, max_points_leads longtext, max_points_opportunities longtext,lead_mark VARCHAR(255),opportunities_mark VARCHAR(255), date_modified VARCHAR(100), created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,PRIMARY KEY (id))");
}

$condition_array = array('equal' => '=', 'not_equal' => '!=', 'like' => 'Like', 'empty' => 'Empty', 'non_empty' => 'Non Empty',);

if ($_POST['save']) {
    //~ echo "<pre>";	
    //~ print_r($_POST['Leads']);	
    $post_Leads = base64_encode(serialize($_POST['Leads']));
    $post_Opportunities = base64_encode(serialize($_POST['Opportunities']));
    $post_max_value_input_Leads = base64_encode(serialize($_POST['max_value_input_Leads']));
    $post_max_value_input_Opportunities = base64_encode(serialize($_POST['max_value_input_Opportunities']));
    $post_show_total_input_Leads = base64_encode($_POST['show_total_input_Leads']);
    $post_show_total_input_Opportunities = base64_encode($_POST['show_total_input_Opportunities']);
    $date_modified = date('d-m-Y h:i:s');

    $content_query = $db->query("INSERT INTO lead_and_opportunities_scoring (id, lead, opportunities, max_points_leads, max_points_opportunities, lead_mark,opportunities_mark,date_modified) 
		VALUES ('1','" . $post_Leads . "', '" . $post_Opportunities . "','" . $post_max_value_input_Leads . "', '" . $post_max_value_input_Opportunities . "', '" . $post_show_total_input_Leads . "','" . $post_show_total_input_Opportunities . "','" . $date_modified . "')ON DUPLICATE KEY UPDATE lead='" . $post_Leads . "', opportunities='" . $post_Opportunities . "', max_points_leads='" . $post_max_value_input_Leads . "',max_points_opportunities='" . $post_max_value_input_Opportunities . "', lead_mark='" . $post_show_total_input_Leads . "', opportunities_mark='" . $post_show_total_input_Opportunities . "', date_modified='" . $date_modified . "'");

    if ($content_query) {
        $record_query = $db->query("SELECT * FROM lead_and_opportunities_scoring where id='1'");

        if ($record_query->num_rows > 0) {
            $save_msg = "Lead and Opportunities score saved successfully...!!";
        } else {
            $save_msg = "Lead and Opportunities score cleared successfully...!!";
        }
        $_SESSION['save_msg_time'] = time() + 2;
    }
}





$module_list = array('Leads' => "Leads", 'Opportunities' => "Opportunities");
foreach ($module_list as $module_name) {
    $bean = BeanFactory::getBean($module_name);
    $field_defs[$module_name] = $bean->getFieldDefinitions();
}
if (empty($selected_module)) {
    $selected_module = "Leads";
}
//~ echo "<pre>";
//~ print_r($field_defs[$module_name]);
//~ echo "<pre>";
//~ echo count($field_defs['Leads']);
//~ print_r($field_defs['Leads']);
?>
<style>
    .custom-panel
    {
        margin:10px 0px;	
        background-color:#f9f9f9;
    }
    .condition_key
    {
        display:none;	
    }
</style>


<script>
    $(document).ready(function () {


        $("#input_fields_wrap_Leads,#input_fields_wrap_Opportunities").on("change", ".condition_value", function () {
            var pid = $(this).closest(".inner_wrapper").prop("id");
            var sel = $(this).find(":selected").index();
            $("#" + pid + " .condition_key").prop('selectedIndex', sel);

        })





        var max_fields = 150; //maximum input boxes allowed
        var add_button = $(".add_field_button"); //Add button ID
        var x = 1; //initlal text box count
        $("#show_total_Opportunities").hide();
        $(add_button).click(function (e) { //on add input button click
            var numItems = $('.custom-panel').length;
            var module = $("#module_select").val();
            var field_name = $("#all_fields").val();
            if (module == "Leads")
            {
                var wrapper = $(".input_fields_wrap_Leads"); //Fields wrapper
            } else
            {
                var wrapper = $(".input_fields_wrap_Opportunities"); //Fields wrapper	
            }
            if ($("#field_box_" + module + "_" + field_name).length == 0) {
                var inner_div = 0;
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    var all_posted = {numItems: numItems, module: module, inner_div: inner_div};
                    $.ajax({
                        url: "index.php?entryPoint=lead_scoring_response",
                        type: "post",
                        data: {call_function: "outerwrapper", id: field_name, no: all_posted},
                        success: function (result) {
                            $(wrapper).append(result);
                        }});

//add input box
                }
            } else
            {
                alert(field_name + " field aleredy selected...!!");
            }
        });



        $(".input_fields_wrap_Leads, .input_fields_wrap_Opportunities").on("click", ".add_field_box_button", function (e) { //on add input button click
            var id = (this.id);
            pid = $("#" + id).closest("div").parent("div").prop("id");
            main_div = $("#" + id).closest("div").parent("div").parent("div").parent("div").prop("id");
            val = $("#" + main_div + "field_name").val();
            //alert(pid)
            var inner_module = $("#module_select").val();
            in_div = $("#" + id).closest("div").parent("div").prop("id");
            var inner_div = $("#" + in_div + "> .inner_wrapper").length;
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                var inner_all_posted = {module: inner_module, inner_div: inner_div};
                $.ajax({
                    url: "index.php?entryPoint=lead_scoring_response",
                    type: "post",
                    data: {call_function: "innerwrapper", id: val, no: inner_all_posted},
                    success: function (result) {
                        $("#" + pid).append(result);
                    }});
            }
        });

        $(".input_fields_wrap_Leads, .input_fields_wrap_Opportunities").on("click", ".remove_field", function (e) {
            //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
            var module = $("#module_select").val();
            var sum = 0;
            $('#input_fields_wrap_' + module + ' .max_value_input').each(function () {
                sum += parseFloat(this.value);
            });
            //alert(sum)  
            $("#show_total_" + module).html(sum);
            $("#show_total_input_" + module).val(sum);
        })


        $(".input_fields_wrap_Leads, .input_fields_wrap_Opportunities").on("click", ".remove_field_inner", function (e) { //user click on remove text
            par_div = $("#" + this.id).closest("div").parent('div').parent('div').parent('div').prop('id');
            main_par_div = $("#" + this.id).closest("div").parent('div').parent('div').parent('div').parent('div').prop('id');
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
            var nums = [];
            $('#' + par_div + ' .scoring_value').each(function () {
                nums.push($(this).val());
            });
            var max = Math.max.apply(Math, nums);
            $("#" + par_div + " .max_value").html(max);
            $("#" + par_div + " .max_value_input").val(max);
            var sum = 0;
            $('#' + main_par_div + ' .max_value_input').each(function () {
                sum += parseFloat(this.value);
            });
            var module = $("#module_select").val();
            $("#show_total_" + module).html(sum);
            $("#show_total_input_" + module).val(sum);
        })


        $("#module_select").change(function () {
            var module = $("#module_select").val();

            if (module == "Leads")
            {
                $("#show_total_Leads").show();
                $("#show_total_Opportunities").hide();
                $(".input_fields_wrap_Leads").show();
                $(".input_fields_wrap_Opportunities").hide();
            } else
            {
                $("#show_total_Opportunities").show();
                $("#show_total_Leads").hide();
                $(".input_fields_wrap_Leads").hide();
                $(".input_fields_wrap_Opportunities").show();
            }

            $.ajax({
                url: "index.php?entryPoint=lead_scoring_response",
                type: "post",
                data: {call_function: "getfieldlist", id: module},
                success: function (result) {
                    //alert(result);
                    $("#all_fields").html(result);
                }});
        })


        /*
         $(".input_fields_wrap_Leads,.input_fields_wrap_Opportunities").on("keyup ",".scoring_value", function(e) {
         
         par_div=$("#"+this.id).closest("div").parent("div").parent("div").parent("div").prop("id");
         
         main_par_div=$("#"+this.id).closest("div").parent("div").parent("div").parent("div").parent("div").prop("id");
         
         var nums = [];
         $('#'+par_div+' .scoring_value').each( function() { nums.push( $(this).val() ); });
         var max = Math.max.apply(Math, nums);    
         
         $("#"+par_div+" .max_value").html(max);
         $("#"+par_div+" .max_value_input").val(max);
         
         var sum = 0;
         $('#'+main_par_div+' .max_value_input').each(function(){
         sum += parseFloat(this.value);
         });
         // alert(sum)  
         var module=$("#module_select").val();
         $("#show_total_"+module).html(sum);
         $("#show_total_input_"+module).val(sum);
         });
         */


        $(".input_fields_wrap_Leads,.input_fields_wrap_Opportunities").on("change", ".select_condition", function () {

            var val = $(this).val();
            var par_div = $("#" + this.id).closest("div").prop("id");

            if ($("#" + par_div + ">.condition_value").is('input')) {
                $("#" + par_div + ">.condition_value").val("");
            } else
            {
                $("#" + par_div + ">.condition_value").prop('selectedIndex', 0);
            }
            if (val == "empty" || val == "non_empty")
            {
                $("#" + par_div + ">.condition_value").css("visibility", "hidden");

            } else
            {
                $("#" + par_div + ">.condition_value").css("visibility", "visible");
            }
        })

        $("#cancel_button").click(function () {
            $(".input_fields_wrap_Leads,.input_fields_wrap_Opportunities").html("");
            $("#show_total_Leads").html("0");
            $("#show_total_input_Leads").val("0");
            $("#show_total_Opportunities").html("0");
            $("#show_total_input_Opportunities").val("0");
            $("#save").trigger("click");
        })

    });

    $(document).on('keyup', '[data-min_max]', function (e) {
        var min = parseInt($(this).data('min'));
        var max = parseInt($(this).data('max'));
        var val = parseInt($(this).val());
        par_div = $("#" + this.id).closest("div").parent("div").parent("div").parent("div").prop("id");
        main_par_div = $("#" + this.id).closest("div").parent("div").parent("div").parent("div").parent("div").prop("id");
        if (val > max)
        {
            $(this).val(max);
            $("#" + par_div + " .max_value").html(max);
            $("#" + par_div + " .max_value_input").val(max);
            return false;
        } else if (val < min)
        {
            $(this).val(min);
            return false;
        }
        var nums = [];
        $('#' + par_div + ' .scoring_value').each(function () {
            nums.push($(this).val());
        });
        var max = Math.max.apply(Math, nums);
        $("#" + par_div + " .max_value").html(max);
        $("#" + par_div + " .max_value_input").val(max);
        var sum = 0;
        $('#' + main_par_div + ' .max_value_input').each(function () {
            sum += parseFloat(this.value);
        });
        // alert(sum)  
        var module = $("#module_select").val();
        $("#show_total_" + module).html(sum);
        $("#show_total_input_" + module).val(sum);
    });

    $(document).on('keydown', '[data-toggle=just_number]', function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        // Allow: Ctrl+C
                                (e.keyCode == 67 && e.ctrlKey === true) ||
                                // Allow: Ctrl+X
                                        (e.keyCode == 88 && e.ctrlKey === true) ||
                                        // Allow: home, end, left, right
                                                (e.keyCode >= 35 && e.keyCode <= 39)) {
                                    // let it happen, don't do anything
                                    return;
                                }
                                // Ensure that it is a number and stop the keypress
                                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                    e.preventDefault();
                                }
                            });

</script>

<?php
$content_query = $db->query("SELECT * FROM lead_and_opportunities_scoring where id='1'");
$content_row = $db->fetchByAssoc($content_query);

$get_lead = unserialize(base64_decode($content_row['lead']));
$get_opportunities = unserialize(base64_decode($content_row['opportunities']));
$get_max_points_leads = unserialize(base64_decode($content_row['max_points_leads']));
$get_max_points_opportunities = unserialize(base64_decode($content_row['max_points_opportunities']));
$get_lead_mark = base64_decode($content_row['lead_mark']);
$get_opportunities_mark = base64_decode($content_row['opportunities_mark']);
?>

<form method="POST" action="" name="ls_scoring_form">

    <div class="row" >
        <h1>Lead & Opportunities Scoring</h1>
        <hr>
        <div class="col-sm-4">
            <label>Configure leads scoring points for</label>
            <select name="module_select" id="module_select">
                <option value="Leads">Leads</option>
                <option value="Opportunities">Opportunities</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label>Total</label>
            <strong><span id="show_total_Leads"><?php if (!empty($get_lead_mark)) {
    echo $get_lead_mark;
} else {
    echo '0';
} ?></span><span id="show_total_Opportunities"><?php if (!empty($get_opportunities_mark)) {
    echo $get_opportunities_mark;
} else {
    echo '0';
} ?></span>/100</strong>
            <input type="hidden" id="show_total_input_Leads" name="show_total_input_Leads" value="<?php if (!empty($get_lead_mark)) {
    echo $get_lead_mark;
} else {
    echo '0';
} ?>">
            <input type="hidden" id="show_total_input_Opportunities" name="show_total_input_Opportunities" value="<?php if (!empty($get_opportunities_mark)) {
    echo $get_opportunities_mark;
} else {
    echo '0';
} ?>"></span>
        </div>
        <div class="col-sm-6">
            <input class="btn" type="button" name="cancel" id="cancel" data-toggle="modal" data-target="#cancelModal" style="background-color:#C01114 !important;color:white !important;" value="Cancel" />
            <input class="btn" type="submit" name="save" id="save" style="background-color:#125ABC !important;color:white !important;" value="Save"/>
        </div>
    </div>

    <div class="row" style="min-height:400px">
        <div class="col-sm-12">

            <select name="all_fields" id="all_fields">
                <?php
                foreach ($field_defs[$selected_module] as $fn) {
                    //~ if(!empty($mod_strings[$fn['vname']]))
                    //~ {
                    //~ $get_lable=$mod_strings[$fn['vname']];	
                    //~ }else{
                    if ($selected_module == "Leads") {
                        include('modules/Leads/language/en_us.lang.php');
                    } else {
                        include('modules/Opportunities/language/en_us.lang.php');
                    }
                    $get_lable = $mod_strings[$fn['vname']];
                    if (empty($get_lable)) {
                        if ($selected_module == "Leads") {
                            include('custom/modules/Leads/language/en_us.lang.php');
                        } else {
                            include('custom/modules/Opportunities/language/en_us.lang.php');
                        } $get_lable = $mod_strings[$fn['vname']];
                    }
                    //~ }
                    if (!empty($get_lable)) {
                        echo "<option value=" . $fn['name'] . ">" . str_replace(":", "", $get_lable) . "</option>";
                    }
                }
                ?>
            </select>	
                <?php
//~ echo "<pre>";
//~ print_r($mod_strings);
                ?>

            <a class="add_field_button"><i class="fa fa-plus-square-o fa-2x"></i></a>
            <br>
        </div>

            <?php
            if ($_SESSION['save_msg_time'] > time()) {
                ?>
            <div class="col-sm-12">
                <br>
                <br>
                <div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?php echo $save_msg; ?>
                </div>
            </div> 
            <?php
        } else {
            unset($_SESSION['save_msg_time']);
        }
        ?>


        <div class="input_fields_wrap_Leads col-sm-6" id="input_fields_wrap_Leads" >

        <?php
        $lead_count = count($get_lead);
        $wrapper_no = 0;
        foreach ($get_lead as $field => $n_arr) {

            if (!empty($get_max_points_leads[$wrapper_no])) {
                $find_max_point_leads = $get_max_points_leads[$wrapper_no];
            } else {
                $find_max_point_leads = '0';
            }

            if (!empty($field_defs['Leads'][$field]['options'])) {
                if (count($app_list_strings[$field_defs['Leads'][$field]['options']]) >= 1) {
                    $dp_element = $app_list_strings[$field_defs['Leads'][$field]['options']];
                } else {
                    $dp_element = $GLOBALS['app_list_strings'][$field_defs['Leads'][$field]['options']];
                }
                //echo $dp_element."<pre>";
                //print_r($dp_element);
                echo '<div class="panel panel-default custom-panel" id="field_box_Leads_' . $field . '"><div class="panel-body"><div class="col-sm-5"><strong>Field:</strong>&nbsp;<span class="field_name">' . $field . '</span><input type="hidden" id="field_box_Leads_' . $field . 'field_name" value=' . $field . '></div><div class="col-sm-5"><strong >Max Points:</strong>&nbsp;<span class="max_value">' . $find_max_point_leads . '</span><input type="hidden" name="max_value_input_Leads[]" class="max_value_input" value="' . $find_max_point_leads . '"></div><a href="#" class="remove_field pull-right"><i class="fa fa-minus-square-o fa-2x"></i></a><hr><div class="field_box_wrapper" id="field_box_wrapper_Leads_' . $wrapper_no . '">';

                $inner_div = 0;

                foreach ($n_arr['select_condition'] as $inner_val) {
                    echo '<div class="inner_wrapper" id="inner_wrapper_Leads_' . $field . '_' . $inner_div . '"> <select name="Leads[' . $field . '][select_condition][]" class="select_condition" id="select_condition_Leads_' . $field . '_' . $inner_div . '">';
                    foreach ($condition_array as $key => $cn) {
                        echo "<option value='" . $key . "'";
                        if ($key == $n_arr['select_condition'][$inner_div]) {
                            echo " selected";
                        }
                        echo ">" . $cn . "</option>";
                    }

                    echo '</select> <select name="Leads[' . $field . '][condition_value][]" class="condition_value" id="condition_value_Leads_' . $field . '_' . $inner_div . '"';
                    if ($n_arr['select_condition'][$inner_div] == "empty" or $n_arr['select_condition'][$inner_div] == "non_empty") {
                        echo " style='visibility: hidden'";
                    }
                    echo '>';
                    foreach ($dp_element as $drp_opt => $drp_opt_val) {
                        echo '<option value="' . $drp_opt . '"';
                        if ($n_arr['condition_value'][$inner_div] == $drp_opt) {
                            echo ' selected="selected" ';
                        }
                        echo'>' . $drp_opt_val . '</option>';
                    }
                    echo '</select>
			<select name="Leads[' . $field . '][condition_key][]" class="condition_key" id="condition_key_Leads_' . $field . '_' . $inner_div . '"';
                    if ($n_arr['select_condition'][$inner_div] == "empty" or $n_arr['select_condition'][$inner_div] == "non_empty") {
                        echo " style='visibility: hidden'";
                    }
                    echo '>';
                    foreach ($dp_element as $drp_opt => $drp_opt_val) {
                        echo '<option value="' . $drp_opt_val . '"';
                        if ($n_arr['condition_value'][$inner_div] == $drp_opt) {
                            echo ' selected="selected" ';
                        }
                        echo'>' . $drp_opt_val . '</option>';
                    }
                    echo '</select>
			
			 &nbsp;&nbsp;<input type="text" name="Leads[' . $field . '][scoring_value][]" class="scoring_value" id="scoring_value_Leads_' . $field . '_' . $inner_div . '" value="' . $n_arr['scoring_value'][$inner_div] . '" data-min_max data-min="0" data-max="30" data-toggle="just_number"/>';

                    if ($inner_div == '0') {
                        echo '<a id="add_field_box_button_Leads_' . $wrapper_no . '" class="add_field_box_button"><i class="fa fa-plus-square-o fa-2x"></i></a></div>';
                    } else {
                        echo '<a href="#" class="remove_field_inner" id="remove_field_inner_Leads_' . $field . '_' . $inner_div . '"  style="margin:2px"><i class="fa fa-minus-square-o fa-2x"></i></a></div>';
                    }
                    $inner_div++;
                }



                echo '</div></div></div>';
            } else {
                echo '<div class="panel panel-default custom-panel" id="field_box_Leads_' . $field . '"><div class="panel-body"><div class="col-sm-5"><strong>Field:</strong>&nbsp;<span class="field_name">' . $field . '</span><input type="hidden" id="field_box_Leads_' . $field . 'field_name" value=' . $field . '></div><div class="col-sm-5"><strong >Max Points:</strong>&nbsp;<span class="max_value">' . $find_max_point_leads . '</span><input type="hidden" name="max_value_input_Leads[]" class="max_value_input" value="' . $find_max_point_leads . '"></div><a href="#" class="remove_field pull-right"><i class="fa fa-minus-square-o fa-2x"></i></a><hr><div class="field_box_wrapper" id="field_box_wrapper_Leads_' . $wrapper_no . '">';


                $inner_div = 0;
                foreach ($n_arr['select_condition'] as $inner_val) {
                    echo '<div class="inner_wrapper" id="inner_wrapper_Leads_' . $field . '_' . $inner_div . '"> <select name="Leads[' . $field . '][select_condition][]" class="select_condition" id="select_condition_Leads_' . $field . '_' . $inner_div . '">';
                    foreach ($condition_array as $key => $cn) {
                        echo "<option value='" . $key . "'";
                        if ($key == $n_arr['select_condition'][$inner_div]) {
                            echo " selected";
                        }
                        echo ">" . $cn . "</option>";
                    }

                    echo '</select><input type="text" name="Leads[' . $field . '][condition_value][]" class="condition_value" id="condition_value_Leads_' . $field . '_' . $inner_div . '" value="' . $n_arr['condition_value'][$inner_div] . '"
			';
                    if ($n_arr['select_condition'][$inner_div] == "empty" or $n_arr['select_condition'][$inner_div] == "non_empty") {
                        echo "style='visibility: hidden' ";
                    }
                    echo '/>&nbsp;&nbsp;<input type="text" name="Leads[' . $field . '][scoring_value][]" class="scoring_value" id="scoring_value_Leads_' . $field . '_' . $inner_div . '" value="' . $n_arr['scoring_value'][$inner_div] . '" data-min_max data-min="0" data-max="30" data-toggle="just_number"/>';

                    if ($inner_div == '0') {
                        echo '<a id="add_field_box_button_Leads_' . $wrapper_no . '" class="add_field_box_button"><i class="fa fa-plus-square-o fa-2x"></i></a><input id="unique_id_Leads_' . $field . '" class="unique_id" type="hidden" value="Leads_' . $field . '"></div>';
                    } else {
                        echo '<a href="#" class="remove_field_inner" id="remove_field_inner_Leads_' . $field . '_' . $inner_div . '"  style="margin:2px"><i class="fa fa-minus-square-o fa-2x"></i></a></div>';
                    }
                    $inner_div++;
                }


                echo '</div></div></div>';
            }

            $wrapper_no++;
        }
        ?>	

        </div>

        <div class="input_fields_wrap_Opportunities col-sm-6" id="input_fields_wrap_Opportunities" style="display:none">

            <?php
            unset($wrapper_no);
            $wrapper_no = 0;
            foreach ($get_opportunities as $field => $n_arr) {

                if (!empty($get_max_points_opportunities[$wrapper_no])) {
                    $find_max_point_opportunities = $get_max_points_opportunities[$wrapper_no];
                } else {
                    $find_max_point_opportunities = '0';
                }

                if (!empty($field_defs['Opportunities'][$field]['options'])) {
                    if (count($app_list_strings[$field_defs['Opportunities'][$field]['options']]) >= 1) {
                        $dp_element = $app_list_strings[$field_defs['Opportunities'][$field]['options']];
                    } else {
                        $dp_element = $GLOBALS['app_list_strings'][$field_defs['Opportunities'][$field]['options']];
                    }
                    //echo $dp_element."<pre>";
                    //print_r($dp_element);
                    echo '<div class="panel panel-default custom-panel" id="field_box_Opportunities_' . $field . '"><div class="panel-body"><div class="col-sm-5"><strong>Field:</strong>&nbsp;<span class="field_name">' . $field . '</span><input type="hidden" id="field_box_Opportunities_' . $field . 'field_name" value=' . $field . '></div><div class="col-sm-5"><strong >Max Points:</strong>&nbsp;<span class="max_value">' . $find_max_point_opportunities . '</span><input type="hidden" name="max_value_input_Opportunities[]" class="max_value_input" value="' . $find_max_point_opportunities . '"></div><a href="#" class="remove_field pull-right"><i class="fa fa-minus-square-o fa-2x"></i></a><hr><div class="field_box_wrapper" id="field_box_wrapper_Opportunities_' . $wrapper_no . '">';

                    $inner_div = 0;

                    foreach ($n_arr['select_condition'] as $inner_val) {
                        echo '<div class="inner_wrapper" id="inner_wrapper_Opportunities_' . $field . '_' . $inner_div . '"> <select name="Opportunities[' . $field . '][select_condition][]" class="select_condition" id="select_condition_Opportunities_' . $field . '_' . $inner_div . '">';
                        foreach ($condition_array as $key => $cn) {
                            echo "<option value='" . $key . "'";
                            if ($key == $n_arr['select_condition'][$inner_div]) {
                                echo " selected";
                            }
                            echo ">" . $cn . "</option>";
                        }

                        echo '</select> <select name="Opportunities[' . $field . '][condition_value][]" class="condition_value" id="condition_value_Opportunities_' . $field . '_' . $inner_div . '"';
                        if ($n_arr['select_condition'][$inner_div] == "empty" or $n_arr['select_condition'][$inner_div] == "non_empty") {
                            echo " style='visibility: hidden'";
                        }
                        echo '>';
                        foreach ($dp_element as $drp_opt => $drp_opt_val) {
                            echo '<option value="' . $drp_opt . '"';
                            if ($n_arr['condition_value'][$inner_div] == $drp_opt) {
                                echo ' selected';
                            }
                            echo'>' . $drp_opt_val . '</option>';
                        }
                        echo '</select>
			
			<select name="Opportunities[' . $field . '][condition_key][]" class="condition_key" id="condition_key_Opportunities_' . $field . '_' . $inner_div . '"';
                        if ($n_arr['select_condition'][$inner_div] == "empty" or $n_arr['select_condition'][$inner_div] == "non_empty") {
                            echo " style='visibility: hidden'";
                        }
                        echo '>';
                        foreach ($dp_element as $drp_opt => $drp_opt_val) {
                            echo '<option value="' . $drp_opt_val . '"';
                            if ($n_arr['condition_value'][$inner_div] == $drp_opt) {
                                echo ' selected';
                            }
                            echo'>' . $drp_opt_val . '</option>';
                        }
                        echo '</select>
			
			
			 &nbsp;&nbsp;<input type="text" name="Opportunities[' . $field . '][scoring_value][]" class="scoring_value" id="scoring_value_Opportunities_' . $field . '_' . $inner_div . '" value="' . $n_arr['scoring_value'][$inner_div] . '" data-min_max data-min="0" data-max="30" data-toggle="just_number"/>';

                        if ($inner_div == '0') {
                            echo '<a id="add_field_box_button_Opportunities_' . $wrapper_no . '" class="add_field_box_button"><i class="fa fa-plus-square-o fa-2x"></i></a></div>';
                        } else {
                            echo '<a href="#" class="remove_field_inner" id="remove_field_inner_Opportunities_' . $field . '_' . $inner_div . '"  style="margin:2px"><i class="fa fa-minus-square-o fa-2x"></i></a></div>';
                        }
                        $inner_div++;
                    }



                    echo '</div></div></div>';
                } else {
                    echo '<div class="panel panel-default custom-panel" id="field_box_Opportunities_' . $field . '"><div class="panel-body"><div class="col-sm-5"><strong>Field:</strong>&nbsp;<span class="field_name">' . $field . '</span><input type="hidden" id="field_box_Opportunities_' . $field . 'field_name" value=' . $field . '></div><div class="col-sm-5"><strong >Max Points:</strong>&nbsp;<span class="max_value">' . $find_max_point_opportunities . '</span><input type="hidden" name="max_value_input_Opportunities[]" class="max_value_input" value="' . $find_max_point_opportunities . '"></div><a href="#" class="remove_field pull-right"><i class="fa fa-minus-square-o fa-2x"></i></a><hr><div class="field_box_wrapper" id="field_box_wrapper_Opportunities_' . $wrapper_no . '">';


                    $inner_div = 0;
                    foreach ($n_arr['select_condition'] as $inner_val) {
                        echo '<div class="inner_wrapper" id="inner_wrapper_Opportunities_' . $field . '_' . $inner_div . '"> <select name="Opportunities[' . $field . '][select_condition][]" class="select_condition" id="select_condition_Opportunities_' . $field . '_' . $inner_div . '">';
                        foreach ($condition_array as $key => $cn) {
                            echo "<option value='" . $key . "'";
                            if ($key == $n_arr['select_condition'][$inner_div]) {
                                echo " selected";
                            }
                            echo ">" . $cn . "</option>";
                        }

                        echo '</select> <input type="text" name="Opportunities[' . $field . '][condition_value][]" class="condition_value" id="condition_value_Opportunities_' . $field . '_' . $inner_div . '" value="' . $n_arr['condition_value'][$inner_div] . '"
			';
                        if ($n_arr['select_condition'][$inner_div] == "empty" or $n_arr['select_condition'][$inner_div] == "non_empty") {
                            echo "style='visibility: hidden' ";
                        }
                        echo '/>&nbsp;&nbsp;<input type="text" name="Opportunities[' . $field . '][scoring_value][]" class="scoring_value" id="scoring_value_Opportunities_' . $field . '_' . $inner_div . '" value="' . $n_arr['scoring_value'][$inner_div] . '" data-min_max data-min="0" data-max="30" data-toggle="just_number"/>';

                        if ($inner_div == '0') {
                            echo '<a id="add_field_box_button_Opportunities_' . $wrapper_no . '" class="add_field_box_button"><i class="fa fa-plus-square-o fa-2x"></i></a><input id="unique_id_Opportunities_' . $field . '" class="unique_id" type="hidden" value="Leads_' . $field . '"></div>';
                        } else {
                            echo '<a href="#" class="remove_field_inner" id="remove_field_inner_Opportunities_' . $field . '_' . $inner_div . '"  style="margin:2px"><i class="fa fa-minus-square-o fa-2x"></i></a></div>';
                        }
                        $inner_div++;
                    }


                    echo '</div></div></div>';
                }

                $wrapper_no++;
            }
            ?>		


            <!-- Modal -->


        </div>
    </div>
</form>

<div class="modal fade" id="cancelModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cancel Here</h4>
            </div>
            <div class="modal-body">
                <p>If you want to blank form, then click on cancel button.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" name="cancel_button" id="cancel_button" style="background-color:#125ABC !important;color:white !important;" >Cancel</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#C01114 !important;color:white !important;">Close</button>
            </div>
        </div>
    </div>
</div>   
