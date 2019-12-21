
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
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" >{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Cases'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if} <ul id class="subnav" ><li>{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Cases'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if} </li><li>{if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Cases'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form); return false;" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if} </li><li>{if $bean->aclAccess("edit") && $bean->aclAccess("delete")}<input title="{$APP.LBL_DUP_MERGE}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Cases'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='Step1'; _form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Merge" value="{$APP.LBL_DUP_MERGE}" id="merge_duplicate_button">{/if} </li><li>{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Cases", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}</li></ul></li></ul>
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
<div id="Cases_detailview1_tabs"
>
<div  >
<div id='detailpanel1_1' class='detail view  detail508 expanded'>
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
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>

{counter name="fieldsUsed"}
<div class="col-sm-2" scope="col" style="text-align:left;min-height:36px" >
{if !$fields.state.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STATE' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
<div class=" " type="enum" field="state"   style="font-size:14px;word-wrap: break-word;">
{if !$fields.state.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.state.options)}
<input type="hidden" class="sugar_field" id="{$fields.state.name}" value="{ $fields.state.options }">
{ $fields.state.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.state.name}" value="{ $fields.state.value }">
{ $fields.state.options[$fields.state.value]}
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
</div>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(1, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL2").style.display='none';</script>
{/if}
<div id='detailpanel1_2' class='detail view  detail508 expanded'>
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
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
<div id='detailpanel1_3' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='LBL_CASE_INFORMATION' class="panelContainer"  style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div>

{counter name="fieldsUsed"}
<div class="col-sm-2" scope="col" style="text-align:left;min-height:36px" >
{if !$fields.type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TYPE' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
<div class=" " type="enum" field="type"   style="font-size:14px;word-wrap: break-word;">
{if !$fields.type.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.type.options)}
<input type="hidden" class="sugar_field" id="{$fields.type.name}" value="{ $fields.type.options }">
{ $fields.type.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.type.name}" value="{ $fields.type.value }">
{ $fields.type.options[$fields.type.value]}
{/if}
{/if}
</div>
</div>

{counter name="fieldsUsed"}
<div class="col-sm-2" scope="col" style="text-align:left;min-height:36px" >
{if !$fields.priority.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIORITY' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
<div class=" " type="enum" field="priority"   style="font-size:14px;word-wrap: break-word;">
{if !$fields.priority.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.priority.options)}
<input type="hidden" class="sugar_field" id="{$fields.priority.name}" value="{ $fields.priority.options }">
{ $fields.priority.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.priority.name}" value="{ $fields.priority.value }">
{ $fields.priority.options[$fields.priority.value]}
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
</div>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(3, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_CASE_INFORMATION").style.display='none';</script>
{/if}
<div class="col-sm-2 pull-right">
<a  href="javascript:void(0)" id="sla_myBtn" data-toggle="modal" data-target="#sla_popup">Current Workflow Stage</a>
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
<div id="Cases_detailview_tabs"
>
<div  style="min-height:350px">
<div id='detailpanel_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(1);">
{*<img border="0" id="detailpanel_1_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(1);">
{*<img border="0" id="detailpanel_1_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_EDITVIEW_PANEL2' module='Cases'}
<script>
document.getElementById('detailpanel_1').className += ' expanded';
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
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SUBJECT' module='Cases'}{/capture}
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
{if !$fields.case_number.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CASE_NUMBER' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="int" field="case_number"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.case_number.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.case_number.name}">
{assign var="value" value=$fields.case_number.value }
{$value}
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
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.startdate_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STARTDATE' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="datetimecombo" field="startdate_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.startdate_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.startdate_c.value) <= 0}
{assign var="value" value=$fields.startdate_c.default_value }
{else}
{assign var="value" value=$fields.startdate_c.value }
{/if} 
<span class="sugar_field" id="{$fields.startdate_c.name}">{$fields.startdate_c.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.region_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REGION' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="region_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.region_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.region_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.region_c.name}" value="{ $fields.region_c.options }">
{ $fields.region_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.region_c.name}" value="{ $fields.region_c.value }">
{ $fields.region_c.options[$fields.region_c.value]}
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
<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.casetype_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CASETYPE' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="casetype_c"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.casetype_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.casetype_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.casetype_c.name}" value="{ $fields.casetype_c.options }">
{ $fields.casetype_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.casetype_c.name}" value="{ $fields.casetype_c.value }">
{ $fields.casetype_c.options[$fields.casetype_c.value]}
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
{if !$fields.doc_uploaded_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DOC_UPLOADED' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="doc_uploaded_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.doc_uploaded_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.doc_uploaded_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.doc_uploaded_c.name}" value="{ $fields.doc_uploaded_c.options }">
{ $fields.doc_uploaded_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.doc_uploaded_c.name}" value="{ $fields.doc_uploaded_c.value }">
{ $fields.doc_uploaded_c.options[$fields.doc_uploaded_c.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.reasonofreschedule_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REASONOFRESCHEDULE' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="reasonofreschedule_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.reasonofreschedule_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.reasonofreschedule_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.reasonofreschedule_c.name}" value="{ $fields.reasonofreschedule_c.options }">
{ $fields.reasonofreschedule_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.reasonofreschedule_c.name}" value="{ $fields.reasonofreschedule_c.value }">
{ $fields.reasonofreschedule_c.options[$fields.reasonofreschedule_c.value]}
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
{if !$fields.state.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STATE' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="state"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.state.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.state.options)}
<input type="hidden" class="sugar_field" id="{$fields.state.name}" value="{ $fields.state.options }">
{ $fields.state.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.state.name}" value="{ $fields.state.value }">
{ $fields.state.options[$fields.state.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.servicetype_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICETYPE' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="servicetype_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.servicetype_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.servicetype_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.servicetype_c.name}" value="{ $fields.servicetype_c.options }">
{ $fields.servicetype_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.servicetype_c.name}" value="{ $fields.servicetype_c.value }">
{ $fields.servicetype_c.options[$fields.servicetype_c.value]}
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
{if !$fields.status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STATUS' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="dynamicenum" field="status"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.status.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.status.options)}
<input type="hidden" class="sugar_field" id="{$fields.status.name}" value="{ $fields.status.options }">
{ $fields.status.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.status.name}" value="{ $fields.status.value }">
{ $fields.status.options[$fields.status.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.devsummary_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DEVSUMMARY' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="devsummary_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.devsummary_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.devsummary_c.name|escape:'html'|url2html|nl2br}">{$fields.devsummary_c.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
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
{if !$fields.issuecategory_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ISSUECATEGORY' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="issuecategory_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.issuecategory_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.issuecategory_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.issuecategory_c.name}" value="{ $fields.issuecategory_c.options }">
{ $fields.issuecategory_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.issuecategory_c.name}" value="{ $fields.issuecategory_c.value }">
{ $fields.issuecategory_c.options[$fields.issuecategory_c.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.issuesubcategory_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ISSUESUBCATEGORY' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="dynamicenum" field="issuesubcategory_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.issuesubcategory_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.issuesubcategory_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.issuesubcategory_c.name}" value="{ $fields.issuesubcategory_c.options }">
{ $fields.issuesubcategory_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.issuesubcategory_c.name}" value="{ $fields.issuesubcategory_c.value }">
{ $fields.issuesubcategory_c.options[$fields.issuesubcategory_c.value]}
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
{if !$fields.exmatrtn_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXMATRTN' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="exmatrtn_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.exmatrtn_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.exmatrtn_c.value) == "1" || strval($fields.exmatrtn_c.value) == "yes" || strval($fields.exmatrtn_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.exmatrtn_c.name}" id="{$fields.exmatrtn_c.name}" value="$fields.exmatrtn_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.cnr_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CNR' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="cnr_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.cnr_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.cnr_c.value) == "1" || strval($fields.cnr_c.value) == "yes" || strval($fields.cnr_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.cnr_c.name}" id="{$fields.cnr_c.name}" value="$fields.cnr_c.value" disabled="true" {$checked}>
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(1, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL2").style.display='none';</script>
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
{sugar_translate label='LBL_EDITVIEW_PANEL1' module='Cases'}
<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<div id='LBL_EDITVIEW_PANEL1' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.account_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNT_NAME' module='Cases'}{/capture}
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
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.opportunities_cases_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OPPORTUNITIES_CASES_1_FROM_OPPORTUNITIES_TITLE' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="opportunities_cases_1_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.opportunities_cases_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.opportunities_cases_1opportunities_ida.value)}
{capture assign="detail_url"}index.php?module=Opportunities&action=DetailView&record={$fields.opportunities_cases_1opportunities_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="opportunities_cases_1opportunities_ida" class="sugar_field" data-id-value="{$fields.opportunities_cases_1opportunities_ida.value}">{$fields.opportunities_cases_1_name.value}</span>
{if !empty($fields.opportunities_cases_1opportunities_ida.value)}</a>{/if}
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
{if !$fields.salesperson_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SALESPERSON' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="salesperson_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.salesperson_c.hidden}
{counter name="panelFieldCount"}

<span id="user_id1_c" class="sugar_field" data-id-value="{$fields.user_id1_c.value}">{$fields.salesperson_c.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.supervisor_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SUPERVISOR' module='Cases'}{/capture}
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
{if !$fields.contractor_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTRACTOR' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="contractor_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.contractor_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.scrm_vendors_id_c.value)}
{capture assign="detail_url"}index.php?module=scrm_Vendors&action=DetailView&record={$fields.scrm_vendors_id_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="scrm_vendors_id_c" class="sugar_field" data-id-value="{$fields.scrm_vendors_id_c.value}">{$fields.contractor_c.value}</span>
{if !empty($fields.scrm_vendors_id_c.value)}</a>{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.installers_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_INSTALLERS' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="installers_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.installers_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.installers_c.name|escape:'html'|url2html|nl2br}">{$fields.installers_c.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
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
{if !$fields.assigned_user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO' module='Cases'}{/capture}
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
{if !$fields.salescoordinator_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SALESCOORDINATOR' module='Cases'}{/capture}
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
<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.warehouse_person_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_WAREHOUSE_PERSON' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="warehouse_person_c"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.warehouse_person_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.scrm_warehouse_person_id_c.value)}
{capture assign="detail_url"}index.php?module=scrm_Warehouse_Person&action=DetailView&record={$fields.scrm_warehouse_person_id_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="scrm_warehouse_person_id_c" class="sugar_field" data-id-value="{$fields.scrm_warehouse_person_id_c.value}">{$fields.warehouse_person_c.value}</span>
{if !empty($fields.scrm_warehouse_person_id_c.value)}</a>{/if}
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(2, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
<div id='detailpanel_3' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
{*<img border="0" id="detailpanel_3_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
{*<img border="0" id="detailpanel_3_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_CASE_INFORMATION' module='Cases'}
<script>
document.getElementById('detailpanel_3').className += ' expanded';
</script>
</h4>
<div id='LBL_CASE_INFORMATION' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TYPE' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="type"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.type.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.type.options)}
<input type="hidden" class="sugar_field" id="{$fields.type.name}" value="{ $fields.type.options }">
{ $fields.type.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.type.name}" value="{ $fields.type.value }">
{ $fields.type.options[$fields.type.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.priority.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIORITY' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="priority"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.priority.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.priority.options)}
<input type="hidden" class="sugar_field" id="{$fields.priority.name}" value="{ $fields.priority.options }">
{ $fields.priority.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.priority.name}" value="{ $fields.priority.value }">
{ $fields.priority.options[$fields.priority.value]}
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
<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="description"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|url2html|nl2br}">{$fields.description.value|escape:'html_entity_decode'|url2html|nl2br}</span>
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
{if !$fields.resolution.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_RESOLUTION' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="resolution"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.resolution.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.resolution.name|escape:'html'|url2html|nl2br}">{$fields.resolution.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
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
{if !$fields.suggestion_box.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SUGGESTION_BOX' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="readonly" field="suggestion_box"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.suggestion_box.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.suggestion_box.value) <= 0}
{assign var="value" value=$fields.suggestion_box.default_value }
{else}
{assign var="value" value=$fields.suggestion_box.value }
{/if} 
<span class="sugar_field" id="{$fields.suggestion_box.name}">{$fields.suggestion_box.value}</span>
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
{if !$fields.update_text.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_UPDATE_TEXT' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="update_text"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.update_text.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.update_text.name|url2html|nl2br}">{$fields.update_text.value|escape:'html_entity_decode'|url2html|nl2br}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.internal.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_INTERNAL' module='Cases'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="internal"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.internal.hidden}
{counter name="panelFieldCount"}

{if strval($fields.internal.value) == "1" || strval($fields.internal.value) == "yes" || strval($fields.internal.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.internal.name}" id="{$fields.internal.name}" value="$fields.internal.value" disabled="true" {$checked}>
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(3, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_CASE_INFORMATION").style.display='none';</script>
{/if}
</div>
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script>                                                                                                                                                                                                    <script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
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
<li class="active" id="remove_color_current_level_c"><span>{sugar_translate label='LBL_CASE_INFORMATION' module='Cases'} </span><br><span 		class="small_font">
</span>
</li>
</ul>
</form>
</div>
</div>
</div>
</div>