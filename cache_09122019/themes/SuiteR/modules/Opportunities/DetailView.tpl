
<style>
{literal}
ul.clickMenu > li
{
background: #2767A8 !important;
border-radius: 0px !important; 
}
ul.clickMenu > li:first-child a
{
color:white !important;
background: #2767A8 !important;
}
ul.history_acitvities_button > li
{
background: #fff !important;
border-radius: 3px !important; 	
}
ul.clickMenu li ul.subnav li a
{
color: #000000 !important;
}
#dialog
{
display:none;
}
i
{
display:none;
}
b
{
font-weight:normal;
}
.show_primary_email span table tbody tr:not(:first-child) {
display:none;
}
ul.round-button li
{
background-color: #fff !important;
}
input[value="Copy..."] { display: none !important; }​
.yui-navset .yui-content, .yui-navset .yui-navset-top .yui-content {
padding: 0px !important;
}
ul.clickMenu li ul.subnav, ul.clickMenu ul.subnav-sub, ul.SugarActionMenuIESub, ul.clickMenu li ul.subnav li a, ul.clickMenu li ul.subnav li input, ul.subnav-sub li a, ul.SugarActionMenuIESub li a, ul.clickMenu li ul.subnav li a, ul.clickMenu li ul.subnav li input, ul.subnav-sub li a, ul.SugarActionMenuIESub li a, ul.clickMenu li ul.subnav, ul.clickMenu ul.subnav-sub, ul.SugarActionMenuIESub, ul.clickMenu li ul.subnav li a, ul.clickMenu li ul.subnav li input, ul.subnav-sub li a, ul.SugarActionMenuIESub li a{
color:#000000 !important;
}
{/literal}
</style>
<script >
    {literal}

    $(document).ready(function () {
        $(".dataField").css("display", "none");
        $('#Activities_createtask_button').attr('data-toggle', 'modal');
        $('#Activities_createtask_button').attr('data-target', '#myModalcustom_popup');
        $('#activities_createtask_button').attr('data-toggle', 'modal');
        $('#activities_createtask_button').attr('data-target', '#myModalcustom_popup');


        $('#Activities_schedulemeeting_button').attr('data-toggle', 'modal');
        $('#Activities_schedulemeeting_button').attr('data-target', '#myModalcustom_popup');
        $('#activities_schedulemeeting_button').attr('data-toggle', 'modal');
        $('#activities_schedulemeeting_button').attr('data-target', '#myModalcustom_popup');

        $('#Activities_logcall_button').attr('data-toggle', 'modal');
        $('#Activities_logcall_button').attr('data-target', '#myModalcustom_popup');
        $('#activities_logcall_button').attr('data-toggle', 'modal');
        $('#activities_logcall_button').attr('data-target', '#myModalcustom_popup');

        $('#History_createnoteorattachment_button').attr('data-toggle', 'modal');
        $('#History_createnoteorattachment_button').attr('data-target', '#myModalcustom_popup_history');
        $('#history_createnoteorattachment_button').attr('data-toggle', 'modal');
        $('#history_createnoteorattachment_button').attr('data-target', '#myModalcustom_popup_history');


        /*
         $( ".custom-noBullet" ).click(function() {
         $("#"+this.id+" .change_color_dashlets span[id*='show_link_'] .utilsLink").trigger("click");
         });
         */


        var right = $(".custom-right-panel").height();
        var left = $(".custom-left-panel").height();
        if (left >= right)
        {
            $(".custom-left-panel").css("border-right", "1px solid #d9dada");
        } else
        {
            $(".custom-right-panel").css("border-left", "1px solid #d9dada");
        }

        $(".custom-yui-nav li, .righttab").click(function () {
            var right = $(".custom-right-panel").height();
            var left = $(".custom-left-panel").height();
            if (left >= right)
            {
                $(".custom-left-panel").css("border-right", "1px solid #d9dada");
            } else
            {
                $(".custom-right-panel").css("border-left", "1px solid #d9dada");
            }

        })


        if ($('.custom-right-panel').length == "0")
        {
            $('.custom-left-panel').removeClass('col-sm-7');
            $('.custom-left-panel').addClass('col-sm-12');
        }


    });





    {/literal}
</script>
<script>
{literal}
$(document).ready(function () {
// Get the modal
/*var modal = document.getElementById('myModal_sla_pop');*/
// Get the button that opens the modal
/*var btn = document.getElementById("myBtn");*/
// Get the <span> element that closes the modal
/*var span = document.getElementsByClassName("close_sla_pop")[0];
*/
// When the user clicks the button, open the modal
/*btn.onclick = function() {
modal.style.display = "block";
}*/
// When the user clicks on <span> (x), close the modal
/*span.onclick = function() {
modal.style.display = "none";
}
*/
// When the user clicks anywhere outside of the modal, close it
/*window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
}*/
//var title=$("#name").html();
var date_entered = $("#date_entered").html();
//$("#ticket_popup_title").html(title);
$("#ticket_date_entered").html(date_entered);
var max_complete = [];
for (i = 1; i < 10; i++) {
if ($("#current_level" + i + "_c").prop("checked") == false) {
//	alert("Checkbox is unchecked. "+i);
$("#remove_color_current_level" + i + "_c").removeClass("active");
}
if ($("#current_level_c").prop("checked") == false) {
//alert("Checkbox is unchecked. "+i);
$("#remove_color_current_level_c").removeClass("active");
}
}
})
{/literal}
</script>

<script language="javascript">
{literal}
SUGAR.util.doWhen(function(){
    return $("#contentTable").length == 0;
}, SUGAR.themes.actionMenu);
{/literal}
</script>
<td class="buttons"  style="min-width:50%;padding-right: 60px !important;" NOWRAP >
<div class="pull-right">
{php}
echo  $theTitle .= "<div class='favorite' record_id='" . $_REQUEST['record'] . "' module='" . $_REQUEST['module'] . "' style='color: #FFD700;margin:2.5px 10px;'><div class='favorite_icon_outline'><i class='fa fa-2x fa-star-o' aria-hidden='true' title='".translate('LBL_ADD_TO_FAVORITES', 'Home')."'></i>
</div>
<div class='favorite_icon_fill'><i class='fa fa-2x fa-star' aria-hidden='true' title='".translate('LBL_ADD_TO_FAVORITES', 'Home')."'></i>
</div></div>";
{/php}
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" >{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Opportunities'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if} <ul id class="subnav" ><li>{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Opportunities'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if} </li><li>{if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Opportunities'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form); return false;" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if} </li><li>{if $bean->aclAccess("edit") && $bean->aclAccess("delete")}<input title="{$APP.LBL_DUP_MERGE}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Opportunities'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='Step1'; _form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Merge" value="{$APP.LBL_DUP_MERGE}" id="merge_duplicate_button">{/if} </li><li><input id="installation_btn" title="Installation Completed" class="button" onclick="var _form = document.getElementById('formDetailView');_form.return_module.value='Opportunities';_form.return_action.value='DetailView';_form.return_id.value='{$fields.id.value}';_form.action.value='send_closed_email'; _form.module.value='Opportunities';_form.submit();" name="button" value="Installation Completed" type="button" //></li><li>{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Opportunities", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}</li></ul></li></ul>
{$ADMIN_EDIT}
{$PAGINATION}
</div>
</div>
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="{$module}">
<input type="hidden" name="record" value="{$fields.id.value}">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="{$offset}">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
</form>
</div>
</td>
</tr>
</table>
</div>
{sugar_include include=$includes}
<div class="row">
<div class="col-sm-12 new_row_detailview"  >
<div style="margin-left:12px;">
<div id="Opportunities_detailview1_tabs"
class="yui-navset detailview_tabs" style="padding:0px;"
>
<div class="yui-content" >
<div id='tabcontent0'>
<div id='detailpanel1_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='DEFAULT' class="panelContainer"  style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>

{counter name="fieldsUsed"}
<div class="col-sm-2" scope="col" style="text-align:left;min-height:36px" >
{if !$fields.sales_stage.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SALES_STAGE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
<div class=" " type="enum" field="sales_stage"   style="font-size:14px;word-wrap: break-word;">
{if !$fields.sales_stage.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.sales_stage.options)}
<input type="hidden" class="sugar_field" id="{$fields.sales_stage.name}" value="{ $fields.sales_stage.options }">
{ $fields.sales_stage.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.sales_stage.name}" value="{ $fields.sales_stage.value }">
{ $fields.sales_stage.options[$fields.sales_stage.value]}
{/if}
{/if}
</div>
</div>

</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>

</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</div>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
<div id='detailpanel1_2' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='LBL_EDITVIEW_PANEL2' class="panelContainer"  style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</div>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL2").style.display='none';</script>
{/if}
</div>				<div id='tabcontent1'>
<div id='detailpanel1_3' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='LBL_EDITVIEW_PANEL1' class="panelContainer"  style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>


</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>

</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</div>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
</div>
</div>
</div>
</div>
</div>
</div>

{php}
if($_REQUEST['module']=="Opportunities")
{
$field="sales_stage";
}else if($_REQUEST['module']=="Leads")
{
$field="status";
$del_element=array('Recycled');
}else if($_REQUEST['module']=="Cases")
{
$field="status";
$del_element=array('Pending Input','Duplicate');
}
$bean = BeanFactory::getBean($_REQUEST['module']);
$field_defs[$_REQUEST['module']] = $bean->getFieldDefinitions();
$bean=$bean->retrieve($_REQUEST['record']);
if(!empty($field_defs[$_REQUEST['module']][$field]['options']))
{
if(count($app_list_strings[$field_defs[$_REQUEST['module']][$field]['options']])>=1)
{
$dp_element=$app_list_strings[$field_defs[$_REQUEST['module']][$field]['options']];	
}else
{
$dp_element=$GLOBALS['app_list_strings'][$field_defs[$_REQUEST['module']][$field]['options']];
}
foreach($del_element as $val)
{
if (($key = array_search($val, $dp_element)) !== false) {
unset($dp_element[$key]);
}
}
}
{/php}
<div class="row">	
<div class="arrows_wrapper col-sm-12">	
<div class="arrow-steps clearfix">
{php}
foreach($dp_element as $drp_opt1=>$drp_opt_val1)
{
$arrow_key[]=$drp_opt1;
$arrow_value[]=$drp_opt_val1;
}
$key = array_search($bean->$field, $arrow_key);
$value = array_search($bean->field, $arrow_value);
$i=0;
foreach($dp_element as $drp_opt=>$drp_opt_val)
{
if(!empty(trim($drp_opt)))
{
if($_REQUEST['module']=="Opportunities")
{
if($bean->$field !="Closed Lost")
{
if($i<=$key || $i<=$value )
{
//	echo $drp_opt."==".$drp_opt_val;
if($drp_opt!="Closed Lost")
{
if($drp_opt_val==$bean->$field || $drp_opt==$bean->$field)
{
if($bean->$field=="Closed Won" )
{
$current_arrows="current_arrows";
}else
{
$current_arrows="current_arrows_blue";
}
}else
{
$current_arrows="current_arrows";
}
}
echo '<div class="step '.$current_arrows.'"> <span >'.$drp_opt_val.'</span></div>';
unset($current_arrows);
}else   if($drp_opt!="Closed Lost")
{
echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
}
}else
{
if($drp_opt_val=="Closed Lost" || $drp_opt=="Closed Lost")
{
if($i==$key || $i==$value)
{
echo '<div class="step current_arrows_rejected"> <span >'.$drp_opt_val.'</span></div>';
}
}else if($drp_opt_val!="Closed Won")
{
echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
}
}
}
else if($_REQUEST['module']=="Leads")
{
if($bean->$field !="Dead")
{
if($i<=$key || $i<=$value )
{
if($drp_opt!="Dead")
{
if($drp_opt_val==$bean->$field || $drp_opt==$bean->$field)
{
if($bean->$field=="Converted" || $bean->$field=="Cavassed")
{
$current_arrows="current_arrows";
}else
{
$current_arrows="current_arrows_blue";
}
}else
{
$current_arrows="current_arrows";
}
}
if($drp_opt!="Dead"){
echo '<div class="step '.$current_arrows.'"> <span >'.$drp_opt_val.'</span></div>';
unset($current_arrows);
}
}else
{
echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
}
}else
{
if($drp_opt_val=="Dead" || $drp_opt=="Dead")
{
if($i==$key || $i==$value)
{
echo '<div class="step current_arrows_rejected"> <span >'.$drp_opt_val.'</span></div>';
}
}else if($drp_opt!="Converted")
{
echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
}
}
}else if($_REQUEST['module']=="Cases")
{
$arr_no=array('Closed_Rejected');
if(!in_array($bean->$field,$arr_no))
{
if($i<=$key || $i<=$value )
{
if(!in_array($drp_opt,$arr_no))
{
if($drp_opt_val==$bean->$field || $drp_opt==$bean->$field)
{
if($bean->$field=="Closed_Closed")
{
$current_arrows="current_arrows";
}else
{
$current_arrows="current_arrows_blue";
}
}else
{
$current_arrows="current_arrows";
}
}
echo '<div class="step '.$current_arrows.'"> <span >'.$drp_opt_val.'</span></div>';
unset($current_arrows);
}else
{
echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
}
}else
{
if(in_array($drp_opt,$arr_no))
{
if($i==$key || $i==$value)
{
echo '<div class="step current_arrows_rejected"> <span >'.$drp_opt_val.'</span></div>';
}
else
{
echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
}
}else
{
echo '<div class="step "> <span >'.$drp_opt_val.'</span></div>';
}
}
}
}
$i++;
}
{/php}
</div>
</div>
</div>
<div class="row" style="border:1px solid #d9dada; margin-top:5px;background-color:white;" >
<div class="col-sm-7 custom-left-panel" style="padding:0px 0px 10px 0px">
<div id="Opportunities_detailview_tabs"
class="yui-navset detailview_tabs" style="padding:0px;"
>

<ul class="yui-nav custom-yui-nav">

<li><a id="tab0" href="javascript:void(0)"><em >{sugar_translate label='DEFAULT' module='Opportunities'}</em></a></li>


<li><a id="tab1" href="javascript:void(0)"><em >{sugar_translate label='LBL_EDITVIEW_PANEL1' module='Opportunities'}</em></a></li>
</ul>
<div class="yui-content" style="min-height:350px">
<div id='tabcontent0'>
<div id='detailpanel_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='DEFAULT' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OPPORTUNITY_NAME' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="name" field="name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if} 
<span class="sugar_field" id="{$fields.name.name}">{$fields.name.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.account_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNT_NAME' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="account_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.account_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.account_id.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.account_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="account_id" class="sugar_field" data-id-value="{$fields.account_id.value}">{$fields.account_name.value}</span>
{if !empty($fields.account_id.value)}</a>{/if}
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.currency_id.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CURRENCY' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="id" field="currency_id"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.currency_id.hidden}
{counter name="panelFieldCount"}
<span id='currency_id_span'>
{$fields.currency_id.value}
</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.date_closed.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_CLOSED' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="date" field="date_closed"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.date_closed.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.date_closed.value) <= 0}
{assign var="value" value=$fields.date_closed.default_value }
{else}
{assign var="value" value=$fields.date_closed.value }
{/if}
<span class="sugar_field" id="{$fields.date_closed.name}">{$value}</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.amount.hidden}
{capture name="label" assign="label"}{$MOD.LBL_AMOUNT} ({$CURRENCY}){/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="currency" field="amount"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.amount.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.amount.name}'>
{sugar_number_format var=$fields.amount.value }
</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.opportunity_type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TYPE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="opportunity_type"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.opportunity_type.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.opportunity_type.options)}
<input type="hidden" class="sugar_field" id="{$fields.opportunity_type.name}" value="{ $fields.opportunity_type.options }">
{ $fields.opportunity_type.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.opportunity_type.name}" value="{ $fields.opportunity_type.value }">
{ $fields.opportunity_type.options[$fields.opportunity_type.value]}
{/if}
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.sales_stage.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SALES_STAGE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="sales_stage"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.sales_stage.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.sales_stage.options)}
<input type="hidden" class="sugar_field" id="{$fields.sales_stage.name}" value="{ $fields.sales_stage.options }">
{ $fields.sales_stage.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.sales_stage.name}" value="{ $fields.sales_stage.value }">
{ $fields.sales_stage.options[$fields.sales_stage.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.created_by_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CREATED' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="created_by_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.created_by_name.hidden}
{counter name="panelFieldCount"}

<span id="created_by" class="sugar_field" data-id-value="{$fields.created_by.value}">{$fields.created_by_name.value}</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.upload_documents_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_UPLOAD_DOCUMENTS' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="upload_documents_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.upload_documents_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.upload_documents_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.upload_documents_c.name}" value="{ $fields.upload_documents_c.options }">
{ $fields.upload_documents_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.upload_documents_c.name}" value="{ $fields.upload_documents_c.value }">
{ $fields.upload_documents_c.options[$fields.upload_documents_c.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.filename.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FILENAME' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="file" field="filename"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.filename.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.filename.name}">
<a href="index.php?entryPoint=download&id={$fields.id.value}&type={$module}" class="tabDetailViewDFLink" target='_blank'>{$fields.filename.value}</a>
</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.date_entered.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_ENTERED' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="datetime" field="date_entered"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.date_entered.hidden}
{counter name="panelFieldCount"}
<span id="date_entered" class="sugar_field">{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.probability.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PROBABILITY' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="int" field="probability"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.probability.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.probability.name}">
{sugar_number_format precision=0 var=$fields.probability.value}
</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.closure_date_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CLOSURE_DATE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="date" field="closure_date_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.closure_date_c.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.closure_date_c.value) <= 0}
{assign var="value" value=$fields.closure_date_c.default_value }
{else}
{assign var="value" value=$fields.closure_date_c.value }
{/if}
<span class="sugar_field" id="{$fields.closure_date_c.name}">{$value}</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.flooring_type_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FLOORING_TYPE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="flooring_type_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.flooring_type_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.flooring_type_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.flooring_type_c.name}" value="{ $fields.flooring_type_c.options }">
{ $fields.flooring_type_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.flooring_type_c.name}" value="{ $fields.flooring_type_c.value }">
{ $fields.flooring_type_c.options[$fields.flooring_type_c.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.arch_architectural_firm_opportunities_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ARCH_ARCHITECTURAL_FIRM_OPPORTUNITIES_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="arch_architectural_firm_opportunities_1_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.arch_architectural_firm_opportunities_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.arch_archi003bal_firm_ida.value)}
{capture assign="detail_url"}index.php?module=Arch_Architectural_Firm&action=DetailView&record={$fields.arch_archi003bal_firm_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="arch_archi003bal_firm_ida" class="sugar_field" data-id-value="{$fields.arch_archi003bal_firm_ida.value}">{$fields.arch_architectural_firm_opportunities_1_name.value}</span>
{if !empty($fields.arch_archi003bal_firm_ida.value)}</a>{/if}
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.arch_architects_contacts_opportunities_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ARCH_ARCHITECTS_CONTACTS_OPPORTUNITIES_1_FROM_ARCH_ARCHITECTS_CONTACTS_TITLE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="arch_architects_contacts_opportunities_1_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.arch_architects_contacts_opportunities_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.arch_archi342contacts_ida.value)}
{capture assign="detail_url"}index.php?module=Arch_Architects_Contacts&action=DetailView&record={$fields.arch_archi342contacts_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="arch_archi342contacts_ida" class="sugar_field" data-id-value="{$fields.arch_archi342contacts_ida.value}">{$fields.arch_architects_contacts_opportunities_1_name.value}</span>
{if !empty($fields.arch_archi342contacts_ida.value)}</a>{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="description"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|escape:'html'|url2html|nl2br}">{$fields.description.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.campaign_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CAMPAIGN' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="campaign_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.campaign_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.campaign_id.value)}
{capture assign="detail_url"}index.php?module=Campaigns&action=DetailView&record={$fields.campaign_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="campaign_id" class="sugar_field" data-id-value="{$fields.campaign_id.value}">{$fields.campaign_name.value}</span>
{if !empty($fields.campaign_id.value)}</a>{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.actual_date_closed_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACTUAL_DATE_CLOSED' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="date" field="actual_date_closed_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.actual_date_closed_c.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.actual_date_closed_c.value) <= 0}
{assign var="value" value=$fields.actual_date_closed_c.default_value }
{else}
{assign var="value" value=$fields.actual_date_closed_c.value }
{/if}
<span class="sugar_field" id="{$fields.actual_date_closed_c.name}">{$value}</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.lead_source.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LEAD_SOURCE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="lead_source"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.lead_source.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.lead_source.options)}
<input type="hidden" class="sugar_field" id="{$fields.lead_source.name}" value="{ $fields.lead_source.options }">
{ $fields.lead_source.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.lead_source.name}" value="{ $fields.lead_source.value }">
{ $fields.lead_source.options[$fields.lead_source.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.jjwg_maps_lat_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_JJWG_MAPS_LAT' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="float" field="jjwg_maps_lat_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.jjwg_maps_lat_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.jjwg_maps_lat_c.name}">
{sugar_number_format var=$fields.jjwg_maps_lat_c.value precision=8 }
</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</div>
<span >&nbsp;</span>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
<div id='detailpanel_2' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
{*<img border="0" id="detailpanel_2_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
{*<img border="0" id="detailpanel_2_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_EDITVIEW_PANEL2' module='Opportunities'}
<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<div id='LBL_EDITVIEW_PANEL2' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.meetingtype_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MEETINGTYPE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="meetingtype_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.meetingtype_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.meetingtype_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.meetingtype_c.name}" value="{ $fields.meetingtype_c.options }">
{ $fields.meetingtype_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.meetingtype_c.name}" value="{ $fields.meetingtype_c.value }">
{ $fields.meetingtype_c.options[$fields.meetingtype_c.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.reasonforrschedule_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REASONFORRSCHEDULE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="reasonforrschedule_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.reasonforrschedule_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.reasonforrschedule_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.reasonforrschedule_c.name}" value="{ $fields.reasonforrschedule_c.options }">
{ $fields.reasonforrschedule_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.reasonforrschedule_c.name}" value="{ $fields.reasonforrschedule_c.value }">
{ $fields.reasonforrschedule_c.options[$fields.reasonforrschedule_c.value]}
{/if}
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.supervisor_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SUPERVISOR' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="supervisor_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.supervisor_c.hidden}
{counter name="panelFieldCount"}

<span id="user_id_c" class="sugar_field" data-id-value="{$fields.user_id_c.value}">{$fields.supervisor_c.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.triggerfield_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TRIGGERFIELD' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="triggerfield_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.triggerfield_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.triggerfield_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.triggerfield_c.name}" value="{ $fields.triggerfield_c.options }">
{ $fields.triggerfield_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.triggerfield_c.name}" value="{ $fields.triggerfield_c.value }">
{ $fields.triggerfield_c.options[$fields.triggerfield_c.value]}
{/if}
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.servicecoordinator_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICECOORDINATOR' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="servicecoordinator_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.servicecoordinator_c.hidden}
{counter name="panelFieldCount"}

<span id="user_id1_c" class="sugar_field" data-id-value="{$fields.user_id1_c.value}">{$fields.servicecoordinator_c.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.salescoordinator_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SALESCOORDINATOR' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="salescoordinator_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.salescoordinator_c.hidden}
{counter name="panelFieldCount"}

<span id="user_id2_c" class="sugar_field" data-id-value="{$fields.user_id2_c.value}">{$fields.salescoordinator_c.value}</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
&nbsp;
</span>
<div class="" type="" field=""    style="font-size:14px;word-wrap: break-word;">
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
&nbsp;
</span>
<div class="" type="" field=""    style="font-size:14px;word-wrap: break-word;">
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</div>
<span >&nbsp;</span>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL2").style.display='none';</script>
{/if}
</div>    <div id='tabcontent1'>
<div id='detailpanel_3' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='LBL_EDITVIEW_PANEL1' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.assigned_user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="assigned_user_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.assigned_user_name.hidden}
{counter name="panelFieldCount"}

<span id="assigned_user_id" class="sugar_field" data-id-value="{$fields.assigned_user_id.value}">{$fields.assigned_user_name.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
&nbsp;
</span>
<div class="" type="" field=""    style="font-size:14px;word-wrap: break-word;">
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.jjwg_maps_geocode_status_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_JJWG_MAPS_GEOCODE_STATUS' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="jjwg_maps_geocode_status_c"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.jjwg_maps_geocode_status_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.jjwg_maps_geocode_status_c.value) <= 0}
{assign var="value" value=$fields.jjwg_maps_geocode_status_c.default_value }
{else}
{assign var="value" value=$fields.jjwg_maps_geocode_status_c.value }
{/if} 
<span class="sugar_field" id="{$fields.jjwg_maps_geocode_status_c.name}">{$fields.jjwg_maps_geocode_status_c.value}</span>
{/if}
</div>
</div>
</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</div>
<span >&nbsp;</span>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
</div>
</div>
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script>                                                                                                                                                                                <script type='text/javascript' src='{sugar_getjspath file='include/javascript/popup_helper.js'}'></script>
<script type="text/javascript" src="{sugar_getjspath file='cache/include/javascript/sugar_grp_yui_widgets.js'}"></script>
<script type="text/javascript">
var Opportunities_detailview_tabs = new YAHOO.widget.TabView("Opportunities_detailview_tabs");
Opportunities_detailview_tabs.selectTab(0);
                                                                                                                </script>
<script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
<script type="text/javascript" src="modules/Favorites/favorites.js"></script>
<!--
<button type="button" id="history_activities_modal_button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalcustom_popup">Open Large Modal</button>
-->
<div class="modal fade custom_dialog" id="myModalcustom_popup" role="dialog" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body table-responsive">
<div id="subpanel_activities"></div>
<!--                     <input title="Cancel" class="subpanel_cancel_button_custom" class="button" onclick="return SUGAR.subpanelUtils.cancelCreate($(this).attr(\'id\'));return false;" type="submit" name="' . $params['module'] . '_subpanel_cancel_button" id="' . $params['module'] . '_subpanel_cancel_button" value="Cancel" data-dismiss="modal">
-->
</div>
</div>
</div>
</div>
<div class="modal fade custom_dialog" id="myModalcustom_popup_history" role="dialog" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body table-responsive">
<div id="subpanel_history"></div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="sla_popup" role="dialog">
<div class="modal-dialog modal-md">
<div class="modal-content cutomer-360-bg" style="background-image:url('themes/SuiteR/images/texture_5.png');background-repeat: repeat;">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" style="margin-top:-11px!important;">&times;</button>
<!--<h4 class="modal-title"><div class="div_h1" >Ticket : <span id="ticket_popup_title"></span></div></h4>-->
</div>
<div class="modal-body">
<form id="msform">
<ul id="progressbar">
<li class="active"><span>Created </span><br><span class="small_font" id="ticket_date_entered"></span></li>
<li class="active" id="remove_color_current_level_c"><span>{sugar_translate label='LBL_EDITVIEW_PANEL1' module='Opportunities'} </span><br><span 		class="small_font">
</span>
</li>
</ul>
</form>
</div>
</div>
</div>
</div>