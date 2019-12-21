
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
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" >{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Accounts'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if} <ul id class="subnav" ><li>{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Accounts'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if} </li><li>{if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Accounts'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form); return false;" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if} </li><li>{if $bean->aclAccess("edit") && $bean->aclAccess("delete")}<input title="{$APP.LBL_DUP_MERGE}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Accounts'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='Step1'; _form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Merge" value="{$APP.LBL_DUP_MERGE}" id="merge_duplicate_button">{/if} </li><li><input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_GENERATE_LETTER}"/></li><li>{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Accounts", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}</li></ul></li></ul>
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
<div id="Accounts_detailview1_tabs"
class="yui-navset detailview_tabs" style="padding:0px;"
>
<div class="yui-content" >
<div id='tabcontent0'>
<div id='detailpanel1_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='LBL_ACCOUNT_INFORMATION' class="panelContainer"  style="background-color:white;" >
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
{if !$fields.phone_office.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PHONE_OFFICE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
<div class=" " type="phone" field="phone_office"  class="phone" style="font-size:14px;word-wrap: break-word;">
{if !$fields.phone_office.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_office.value)}
{assign var="phone_value" value=$fields.phone_office.value }
{sugar_phone value=$phone_value usa_format="0"}
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

{counter name="fieldsUsed"}
<div class="col-sm-2" scope="col" style="text-align:left;min-height:36px" >
{if !$fields.website.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_WEBSITE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
<div class=" " type="url" field="website" colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.website.hidden}
{counter name="panelFieldCount"}

{capture name=getLink assign=link}{$fields.website.value}{/capture}
{if !empty($link)}
{capture name=getStart assign=linkStart}{$link|substr:0:7}{/capture}
<span class="sugar_field" id="{$fields.website.name}">
<a href='{$link|to_url}' target='_blank' >{$link}</a>
</span>
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

{counter name="fieldsUsed"}
<div class="col-sm-2" scope="col" style="text-align:left;min-height:36px" >
{if !$fields.email1.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EMAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
<div class="  show_primary_email " type="varchar" field="email1" colspan='3'  style="word-wrap: break-word;">
{if !$fields.email1.hidden}
{counter name="panelFieldCount"}
<span id='email1_span'>
{$fields.email1.value}
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
<div>

</div>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</div>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_ACCOUNT_INFORMATION").style.display='none';</script>
{/if}
</div>				<div id='tabcontent1'>
<div id='detailpanel1_2' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='LBL_PANEL_ADVANCED' class="panelContainer"  style="background-color:white;" >
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
<script>document.getElementById("LBL_PANEL_ADVANCED").style.display='none';</script>
{/if}
<div id='detailpanel1_3' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='LBL_EVENT_FACILITATOR_CO' class="panelContainer"  style="background-color:white;" >
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
<script>document.getElementById("LBL_EVENT_FACILITATOR_CO").style.display='none';</script>
{/if}
<div id='detailpanel1_4' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='LBL_EVENT_VENUE' class="panelContainer"  style="background-color:white;" >
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(4, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EVENT_VENUE").style.display='none';</script>
{/if}
<div id='detailpanel1_5' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='LBL_EVENT_CATERER' class="panelContainer"  style="background-color:white;" >
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(5, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EVENT_CATERER").style.display='none';</script>
{/if}
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row" style="border:1px solid #d9dada; margin-top:5px;background-color:white;" >
<div class="col-sm-7 custom-left-panel" style="padding:0px 0px 10px 0px">
<div id="Accounts_detailview_tabs"
class="yui-navset detailview_tabs" style="padding:0px;"
>

<ul class="yui-nav custom-yui-nav">

<li><a id="tab0" href="javascript:void(0)"><em >{sugar_translate label='LBL_ACCOUNT_INFORMATION' module='Accounts'}</em></a></li>

<li><a id="tab1" href="javascript:void(0)"><em >{sugar_translate label='LBL_PANEL_ADVANCED' module='Accounts'}</em></a></li>



</ul>
<div class="yui-content" style="min-height:350px">
<div id='tabcontent0'>
<div id='detailpanel_1' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='LBL_ACCOUNT_INFORMATION' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='Accounts'}{/capture}
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
{if !$fields.customer_id_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CUSTOMER_ID' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="customer_id_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.customer_id_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.customer_id_c.value) <= 0}
{assign var="value" value=$fields.customer_id_c.default_value }
{else}
{assign var="value" value=$fields.customer_id_c.value }
{/if} 
<span class="sugar_field" id="{$fields.customer_id_c.name}">{$fields.customer_id_c.value}</span>
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
{if !$fields.phone_office.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PHONE_OFFICE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="phone" field="phone_office"   class="phone" style="font-size:14px;word-wrap: break-word;">
{if !$fields.phone_office.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_office.value)}
{assign var="phone_value" value=$fields.phone_office.value }
{sugar_phone value=$phone_value usa_format="0"}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.phone_fax.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FAX' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="phone" field="phone_fax"   class="phone" style="font-size:14px;word-wrap: break-word;">
{if !$fields.phone_fax.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_fax.value)}
{assign var="phone_value" value=$fields.phone_fax.value }
{sugar_phone value=$phone_value usa_format="0"}
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
{if !$fields.website.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_WEBSITE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="url" field="website"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.website.hidden}
{counter name="panelFieldCount"}

{capture name=getLink assign=link}{$fields.website.value}{/capture}
{if !empty($link)}
{capture name=getStart assign=linkStart}{$link|substr:0:7}{/capture}
<span class="sugar_field" id="{$fields.website.name}">
<a href='{$link|to_url}' target='_blank' >{$link}</a>
</span>
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
{if !$fields.billing_address_street.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BILLING_ADDRESS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="billing_address_street"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.billing_address_street.hidden}
{counter name="panelFieldCount"}

<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%'>
<input type="hidden" class="sugar_field" id="billing_address_street" value="{$fields.billing_address_street.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="billing_address_city" value="{$fields.billing_address_city.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="billing_address_state" value="{$fields.billing_address_state.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="billing_address_country" value="{$fields.billing_address_country.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="billing_address_postalcode" value="{$fields.billing_address_postalcode.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}">
{$fields.billing_address_street.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}<br>
{$fields.billing_address_city.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br} {$fields.billing_address_state.value|escape:'html_entity_decode'|strip_tags|url2html|nl2br}&nbsp;&nbsp;{$fields.billing_address_postalcode.value|escape:'html_entity_decode'|strip_tags|url2html|nl2br}<br>
{$fields.billing_address_country.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}
</td>
<td class='dataField' width='1%'>
{$custom_code_billing}
</td>
</tr>
</table>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.shipping_address_street.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SHIPPING_ADDRESS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="shipping_address_street"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.shipping_address_street.hidden}
{counter name="panelFieldCount"}

<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%'>
<input type="hidden" class="sugar_field" id="shipping_address_street" value="{$fields.shipping_address_street.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="shipping_address_city" value="{$fields.shipping_address_city.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="shipping_address_state" value="{$fields.shipping_address_state.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="shipping_address_country" value="{$fields.shipping_address_country.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="shipping_address_postalcode" value="{$fields.shipping_address_postalcode.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}">
{$fields.shipping_address_street.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}<br>
{$fields.shipping_address_city.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br} {$fields.shipping_address_state.value|escape:'html_entity_decode'|strip_tags|url2html|nl2br}&nbsp;&nbsp;{$fields.shipping_address_postalcode.value|escape:'html_entity_decode'|strip_tags|url2html|nl2br}<br>
{$fields.shipping_address_country.value|escape:'html_entity_decode'|escape:'html'|url2html|nl2br}
</td>
<td class='dataField' width='1%'>
{$custom_code_shipping}
</td>
</tr>
</table>
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
{if !$fields.email1.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EMAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="email1"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.email1.hidden}
{counter name="panelFieldCount"}
<span id='email1_span'>
{$fields.email1.value}
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
{if !$fields.description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="text" field="description"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
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
</div>
<span >&nbsp;</span>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_ACCOUNT_INFORMATION").style.display='none';</script>
{/if}
</div>    <div id='tabcontent1'>
<div id='detailpanel_2' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<div id='LBL_PANEL_ADVANCED' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.annual_revenue.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ANNUAL_REVENUE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="annual_revenue"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.annual_revenue.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.annual_revenue.value) <= 0}
{assign var="value" value=$fields.annual_revenue.default_value }
{else}
{assign var="value" value=$fields.annual_revenue.value }
{/if} 
<span class="sugar_field" id="{$fields.annual_revenue.name}">{$fields.annual_revenue.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.parent_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MEMBER_OF' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="parent_name"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.parent_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.parent_id.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.parent_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="parent_id" class="sugar_field" data-id-value="{$fields.parent_id.value}">{$fields.parent_name.value}</span>
{if !empty($fields.parent_id.value)}</a>{/if}
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
{if !$fields.account_type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TYPE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="account_type"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.account_type.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.account_type.options)}
<input type="hidden" class="sugar_field" id="{$fields.account_type.name}" value="{ $fields.account_type.options }">
{ $fields.account_type.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.account_type.name}" value="{ $fields.account_type.value }">
{ $fields.account_type.options[$fields.account_type.value]}
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
{if !$fields.educational_institution_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EDUCATIONAL_INSTITUTION' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="educational_institution_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.educational_institution_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.educational_institution_c.value) == "1" || strval($fields.educational_institution_c.value) == "yes" || strval($fields.educational_institution_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.educational_institution_c.name}" id="{$fields.educational_institution_c.name}" value="$fields.educational_institution_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.pharmaceutical_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PHARMACEUTICAL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="pharmaceutical_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.pharmaceutical_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.pharmaceutical_c.value) == "1" || strval($fields.pharmaceutical_c.value) == "yes" || strval($fields.pharmaceutical_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.pharmaceutical_c.name}" id="{$fields.pharmaceutical_c.name}" value="$fields.pharmaceutical_c.value" disabled="true" {$checked}>
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
{if !$fields.hospital_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_HOSPITAL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="hospital_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.hospital_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.hospital_c.value) == "1" || strval($fields.hospital_c.value) == "yes" || strval($fields.hospital_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.hospital_c.name}" id="{$fields.hospital_c.name}" value="$fields.hospital_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.builder_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BUILDER' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="builder_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.builder_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.builder_c.value) == "1" || strval($fields.builder_c.value) == "yes" || strval($fields.builder_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.builder_c.name}" id="{$fields.builder_c.name}" value="$fields.builder_c.value" disabled="true" {$checked}>
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
{capture name="label" assign="label"}{sugar_translate label='LBL_CONTRACTOR' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="contractor_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.contractor_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.contractor_c.value) == "1" || strval($fields.contractor_c.value) == "yes" || strval($fields.contractor_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.contractor_c.name}" id="{$fields.contractor_c.name}" value="$fields.contractor_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.hotel_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_HOTEL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="hotel_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.hotel_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.hotel_c.value) == "1" || strval($fields.hotel_c.value) == "yes" || strval($fields.hotel_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.hotel_c.name}" id="{$fields.hotel_c.name}" value="$fields.hotel_c.value" disabled="true" {$checked}>
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
{if !$fields.retail_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_RETAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="retail_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.retail_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.retail_c.value) == "1" || strval($fields.retail_c.value) == "yes" || strval($fields.retail_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.retail_c.name}" id="{$fields.retail_c.name}" value="$fields.retail_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.sports_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SPORTS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="sports_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.sports_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.sports_c.value) == "1" || strval($fields.sports_c.value) == "yes" || strval($fields.sports_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.sports_c.name}" id="{$fields.sports_c.name}" value="$fields.sports_c.value" disabled="true" {$checked}>
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
{if !$fields.others_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHERS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="others_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.others_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.others_c.value) == "1" || strval($fields.others_c.value) == "yes" || strval($fields.others_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.others_c.name}" id="{$fields.others_c.name}" value="$fields.others_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.is_existing_customer_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_IS_EXISTING_CUSTOMER' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="is_existing_customer_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.is_existing_customer_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.is_existing_customer_c.value) == "1" || strval($fields.is_existing_customer_c.value) == "yes" || strval($fields.is_existing_customer_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.is_existing_customer_c.name}" id="{$fields.is_existing_customer_c.name}" value="$fields.is_existing_customer_c.value" disabled="true" {$checked}>
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
{if !$fields.assigned_user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="assigned_user_name"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
{if !$fields.assigned_user_name.hidden}
{counter name="panelFieldCount"}

<span id="assigned_user_id" class="sugar_field" data-id-value="{$fields.assigned_user_id.value}">{$fields.assigned_user_name.value}</span>
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
{if !$fields.date_entered.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_ENTERED' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="datetime" field="date_entered"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.date_entered.hidden}
{counter name="panelFieldCount"}
<span id="date_entered" class="sugar_field">{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.date_modified.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_MODIFIED' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="datetime" field="date_modified"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.date_modified.hidden}
{counter name="panelFieldCount"}
<span id="date_modified" class="sugar_field">{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}</span>
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
<script>document.getElementById("LBL_PANEL_ADVANCED").style.display='none';</script>
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
{sugar_translate label='LBL_EVENT_FACILITATOR_CO' module='Accounts'}
<script>
document.getElementById('detailpanel_3').className += ' expanded';
</script>
</h4>
<div id='LBL_EVENT_FACILITATOR_CO' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.fac_rating_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FAC_RATING' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="fac_rating_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.fac_rating_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.fac_rating_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.fac_rating_c.name}" value="{ $fields.fac_rating_c.options }">
{ $fields.fac_rating_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.fac_rating_c.name}" value="{ $fields.fac_rating_c.value }">
{ $fields.fac_rating_c.options[$fields.fac_rating_c.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.fac_contract_status_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FAC_CONTRACT_STATUS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="fac_contract_status_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.fac_contract_status_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.fac_contract_status_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.fac_contract_status_c.name}" value="{ $fields.fac_contract_status_c.options }">
{ $fields.fac_contract_status_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.fac_contract_status_c.name}" value="{ $fields.fac_contract_status_c.value }">
{ $fields.fac_contract_status_c.options[$fields.fac_contract_status_c.value]}
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
{if !$fields.facilitate_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FACILITATE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="facilitate_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.facilitate_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.facilitate_c.value) == "1" || strval($fields.facilitate_c.value) == "yes" || strval($fields.facilitate_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.facilitate_c.name}" id="{$fields.facilitate_c.name}" value="$fields.facilitate_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.facilitate_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FACILITATE_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="facilitate_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.facilitate_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.facilitate_fees_c.value) <= 0}
{assign var="value" value=$fields.facilitate_fees_c.default_value }
{else}
{assign var="value" value=$fields.facilitate_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.facilitate_fees_c.name}">{$fields.facilitate_fees_c.value}</span>
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
{if !$fields.consult_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CONSULT' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="consult_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.consult_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.consult_c.value) == "1" || strval($fields.consult_c.value) == "yes" || strval($fields.consult_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.consult_c.name}" id="{$fields.consult_c.name}" value="$fields.consult_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.consult_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CONSULT_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="consult_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.consult_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.consult_fees_c.value) <= 0}
{assign var="value" value=$fields.consult_fees_c.default_value }
{else}
{assign var="value" value=$fields.consult_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.consult_fees_c.name}">{$fields.consult_fees_c.value}</span>
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
{if !$fields.implement_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_IMPLEMENT' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="implement_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.implement_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.implement_c.value) == "1" || strval($fields.implement_c.value) == "yes" || strval($fields.implement_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.implement_c.name}" id="{$fields.implement_c.name}" value="$fields.implement_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.implement_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_IMPLEMENT_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="implement_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.implement_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.implement_fees_c.value) <= 0}
{assign var="value" value=$fields.implement_fees_c.default_value }
{else}
{assign var="value" value=$fields.implement_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.implement_fees_c.name}">{$fields.implement_fees_c.value}</span>
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
{if !$fields.own_facil_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OWN_FACIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="own_facil_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.own_facil_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.own_facil_c.value) == "1" || strval($fields.own_facil_c.value) == "yes" || strval($fields.own_facil_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.own_facil_c.name}" id="{$fields.own_facil_c.name}" value="$fields.own_facil_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.fac_rent_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FAC_RENT_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="fac_rent_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.fac_rent_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.fac_rent_fees_c.value) <= 0}
{assign var="value" value=$fields.fac_rent_fees_c.default_value }
{else}
{assign var="value" value=$fields.fac_rent_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.fac_rent_fees_c.name}">{$fields.fac_rent_fees_c.value}</span>
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
{if !$fields.travel_reimb_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TRAVEL_REIMB' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="travel_reimb_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.travel_reimb_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.travel_reimb_c.value) == "1" || strval($fields.travel_reimb_c.value) == "yes" || strval($fields.travel_reimb_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.travel_reimb_c.name}" id="{$fields.travel_reimb_c.name}" value="$fields.travel_reimb_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.travel_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TRAVEL_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="travel_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.travel_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.travel_fees_c.value) <= 0}
{assign var="value" value=$fields.travel_fees_c.default_value }
{else}
{assign var="value" value=$fields.travel_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.travel_fees_c.name}">{$fields.travel_fees_c.value}</span>
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
{if !$fields.reference1_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERENCE1' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="reference1_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.reference1_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.contact_id1_c.value)}
{capture assign="detail_url"}index.php?module=Contacts&action=DetailView&record={$fields.contact_id1_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="contact_id1_c" class="sugar_field" data-id-value="{$fields.contact_id1_c.value}">{$fields.reference1_c.value}</span>
{if !empty($fields.contact_id1_c.value)}</a>{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.reference1_comments_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERENCE1_COMMENTS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="reference1_comments_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.reference1_comments_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.reference1_comments_c.value) <= 0}
{assign var="value" value=$fields.reference1_comments_c.default_value }
{else}
{assign var="value" value=$fields.reference1_comments_c.value }
{/if} 
<span class="sugar_field" id="{$fields.reference1_comments_c.name}">{$fields.reference1_comments_c.value}</span>
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
{if !$fields.reference2_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERENCE2' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="reference2_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.reference2_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.contact_id2_c.value)}
{capture assign="detail_url"}index.php?module=Contacts&action=DetailView&record={$fields.contact_id2_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="contact_id2_c" class="sugar_field" data-id-value="{$fields.contact_id2_c.value}">{$fields.reference2_c.value}</span>
{if !empty($fields.contact_id2_c.value)}</a>{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.reference2_comments_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERENCE2_COMMENTS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="reference2_comments_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.reference2_comments_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.reference2_comments_c.value) <= 0}
{assign var="value" value=$fields.reference2_comments_c.default_value }
{else}
{assign var="value" value=$fields.reference2_comments_c.value }
{/if} 
<span class="sugar_field" id="{$fields.reference2_comments_c.name}">{$fields.reference2_comments_c.value}</span>
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
{if !$fields.reference3_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERENCE3' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="reference3_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.reference3_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.contact_id3_c.value)}
{capture assign="detail_url"}index.php?module=Contacts&action=DetailView&record={$fields.contact_id3_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="contact_id3_c" class="sugar_field" data-id-value="{$fields.contact_id3_c.value}">{$fields.reference3_c.value}</span>
{if !empty($fields.contact_id3_c.value)}</a>{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.reference3_comments_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERENCE3_COMMENTS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="reference3_comments_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.reference3_comments_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.reference3_comments_c.value) <= 0}
{assign var="value" value=$fields.reference3_comments_c.default_value }
{else}
{assign var="value" value=$fields.reference3_comments_c.value }
{/if} 
<span class="sugar_field" id="{$fields.reference3_comments_c.name}">{$fields.reference3_comments_c.value}</span>
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
<script>document.getElementById("LBL_EVENT_FACILITATOR_CO").style.display='none';</script>
{/if}
<div id='detailpanel_4' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(4);">
{*<img border="0" id="detailpanel_4_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(4);">
{*<img border="0" id="detailpanel_4_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_EVENT_VENUE' module='Accounts'}
<script>
document.getElementById('detailpanel_4').className += ' expanded';
</script>
</h4>
<div id='LBL_EVENT_VENUE' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.venue_rating_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_VENUE_RATING' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="venue_rating_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.venue_rating_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.venue_rating_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.venue_rating_c.name}" value="{ $fields.venue_rating_c.options }">
{ $fields.venue_rating_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.venue_rating_c.name}" value="{ $fields.venue_rating_c.value }">
{ $fields.venue_rating_c.options[$fields.venue_rating_c.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.ven_contract_status_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_VEN_CONTRACT_STATUS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="ven_contract_status_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.ven_contract_status_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.ven_contract_status_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.ven_contract_status_c.name}" value="{ $fields.ven_contract_status_c.options }">
{ $fields.ven_contract_status_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.ven_contract_status_c.name}" value="{ $fields.ven_contract_status_c.value }">
{ $fields.ven_contract_status_c.options[$fields.ven_contract_status_c.value]}
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
{if !$fields.venue_type_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_VENUE_TYPE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="venue_type_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.venue_type_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.venue_type_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.venue_type_c.name}" value="{ $fields.venue_type_c.options }">
{ $fields.venue_type_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.venue_type_c.name}" value="{ $fields.venue_type_c.value }">
{ $fields.venue_type_c.options[$fields.venue_type_c.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.venue_restrictions_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_VENUE_RESTRICTIONS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="venue_restrictions_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.venue_restrictions_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.venue_restrictions_c.value) <= 0}
{assign var="value" value=$fields.venue_restrictions_c.default_value }
{else}
{assign var="value" value=$fields.venue_restrictions_c.value }
{/if} 
<span class="sugar_field" id="{$fields.venue_restrictions_c.name}">{$fields.venue_restrictions_c.value}</span>
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
{if !$fields.will_book_block_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_WILL_BOOK_BLOCK' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="will_book_block_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.will_book_block_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.will_book_block_c.value) == "1" || strval($fields.will_book_block_c.value) == "yes" || strval($fields.will_book_block_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.will_book_block_c.name}" id="{$fields.will_book_block_c.name}" value="$fields.will_book_block_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.num_guest_rooms_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NUM_GUEST_ROOMS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="num_guest_rooms_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.num_guest_rooms_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.num_guest_rooms_c.value) <= 0}
{assign var="value" value=$fields.num_guest_rooms_c.default_value }
{else}
{assign var="value" value=$fields.num_guest_rooms_c.value }
{/if} 
<span class="sugar_field" id="{$fields.num_guest_rooms_c.name}">{$fields.num_guest_rooms_c.value}</span>
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
{if !$fields.corporate_rate_avail_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CORPORATE_RATE_AVAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="corporate_rate_avail_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.corporate_rate_avail_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.corporate_rate_avail_c.value) == "1" || strval($fields.corporate_rate_avail_c.value) == "yes" || strval($fields.corporate_rate_avail_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.corporate_rate_avail_c.name}" id="{$fields.corporate_rate_avail_c.name}" value="$fields.corporate_rate_avail_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.corporate_rate_value_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CORPORATE_RATE_VALUE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="corporate_rate_value_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.corporate_rate_value_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.corporate_rate_value_c.value) <= 0}
{assign var="value" value=$fields.corporate_rate_value_c.default_value }
{else}
{assign var="value" value=$fields.corporate_rate_value_c.value }
{/if} 
<span class="sugar_field" id="{$fields.corporate_rate_value_c.name}">{$fields.corporate_rate_value_c.value}</span>
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
{if !$fields.reqd_deposit_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REQD_DEPOSIT' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="reqd_deposit_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.reqd_deposit_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.reqd_deposit_c.value) == "1" || strval($fields.reqd_deposit_c.value) == "yes" || strval($fields.reqd_deposit_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.reqd_deposit_c.name}" id="{$fields.reqd_deposit_c.name}" value="$fields.reqd_deposit_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.deposit_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DEPOSIT_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="deposit_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.deposit_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.deposit_fees_c.value) <= 0}
{assign var="value" value=$fields.deposit_fees_c.default_value }
{else}
{assign var="value" value=$fields.deposit_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.deposit_fees_c.name}">{$fields.deposit_fees_c.value}</span>
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
{if !$fields.parking_avail_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PARKING_AVAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="parking_avail_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.parking_avail_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.parking_avail_c.value) == "1" || strval($fields.parking_avail_c.value) == "yes" || strval($fields.parking_avail_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.parking_avail_c.name}" id="{$fields.parking_avail_c.name}" value="$fields.parking_avail_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.parking_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PARKING_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="parking_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.parking_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.parking_fees_c.value) <= 0}
{assign var="value" value=$fields.parking_fees_c.default_value }
{else}
{assign var="value" value=$fields.parking_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.parking_fees_c.name}">{$fields.parking_fees_c.value}</span>
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
{if !$fields.av_avail_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_AV_AVAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="av_avail_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.av_avail_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.av_avail_c.value) == "1" || strval($fields.av_avail_c.value) == "yes" || strval($fields.av_avail_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.av_avail_c.name}" id="{$fields.av_avail_c.name}" value="$fields.av_avail_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.av_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_AV_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="av_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.av_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.av_fees_c.value) <= 0}
{assign var="value" value=$fields.av_fees_c.default_value }
{else}
{assign var="value" value=$fields.av_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.av_fees_c.name}">{$fields.av_fees_c.value}</span>
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
{if !$fields.exclusive_av_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXCLUSIVE_AV' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="exclusive_av_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.exclusive_av_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.exclusive_av_c.value) == "1" || strval($fields.exclusive_av_c.value) == "yes" || strval($fields.exclusive_av_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.exclusive_av_c.name}" id="{$fields.exclusive_av_c.name}" value="$fields.exclusive_av_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.av_contact_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_AV_CONTACT' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="relate" field="av_contact_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.av_contact_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.contact_id4_c.value)}
{capture assign="detail_url"}index.php?module=Contacts&action=DetailView&record={$fields.contact_id4_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="contact_id4_c" class="sugar_field" data-id-value="{$fields.contact_id4_c.value}">{$fields.av_contact_c.value}</span>
{if !empty($fields.contact_id4_c.value)}</a>{/if}
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
{if !$fields.flip_charts_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FLIP_CHARTS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="flip_charts_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.flip_charts_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.flip_charts_c.value) == "1" || strval($fields.flip_charts_c.value) == "yes" || strval($fields.flip_charts_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.flip_charts_c.name}" id="{$fields.flip_charts_c.name}" value="$fields.flip_charts_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.flip_chart_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FLIP_CHART_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="flip_chart_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.flip_chart_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.flip_chart_fees_c.value) <= 0}
{assign var="value" value=$fields.flip_chart_fees_c.default_value }
{else}
{assign var="value" value=$fields.flip_chart_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.flip_chart_fees_c.name}">{$fields.flip_chart_fees_c.value}</span>
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
{if !$fields.internet_avail_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_INTERNET_AVAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="internet_avail_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.internet_avail_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.internet_avail_c.value) == "1" || strval($fields.internet_avail_c.value) == "yes" || strval($fields.internet_avail_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.internet_avail_c.name}" id="{$fields.internet_avail_c.name}" value="$fields.internet_avail_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.internet_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_INTERNET_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="internet_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.internet_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.internet_fees_c.value) <= 0}
{assign var="value" value=$fields.internet_fees_c.default_value }
{else}
{assign var="value" value=$fields.internet_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.internet_fees_c.name}">{$fields.internet_fees_c.value}</span>
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
{if !$fields.receiving_dock_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_RECEIVING_DOCK' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="receiving_dock_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.receiving_dock_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.receiving_dock_c.value) == "1" || strval($fields.receiving_dock_c.value) == "yes" || strval($fields.receiving_dock_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.receiving_dock_c.name}" id="{$fields.receiving_dock_c.name}" value="$fields.receiving_dock_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.receiving_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_RECEIVING_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="receiving_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.receiving_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.receiving_fees_c.value) <= 0}
{assign var="value" value=$fields.receiving_fees_c.default_value }
{else}
{assign var="value" value=$fields.receiving_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.receiving_fees_c.name}">{$fields.receiving_fees_c.value}</span>
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
{if !$fields.refund_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REFUND_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="refund_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.refund_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.refund_fees_c.value) <= 0}
{assign var="value" value=$fields.refund_fees_c.default_value }
{else}
{assign var="value" value=$fields.refund_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.refund_fees_c.name}">{$fields.refund_fees_c.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.other_fees_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OTHER_FEES' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="other_fees_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.other_fees_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.other_fees_c.value) <= 0}
{assign var="value" value=$fields.other_fees_c.default_value }
{else}
{assign var="value" value=$fields.other_fees_c.value }
{/if} 
<span class="sugar_field" id="{$fields.other_fees_c.name}">{$fields.other_fees_c.value}</span>
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
{if !$fields.reception_area_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_RECEPTION_AREA' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="reception_area_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.reception_area_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.reception_area_c.value) == "1" || strval($fields.reception_area_c.value) == "yes" || strval($fields.reception_area_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.reception_area_c.name}" id="{$fields.reception_area_c.name}" value="$fields.reception_area_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.regn_area_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REGN_AREA' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="regn_area_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.regn_area_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.regn_area_c.value) == "1" || strval($fields.regn_area_c.value) == "yes" || strval($fields.regn_area_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.regn_area_c.name}" id="{$fields.regn_area_c.name}" value="$fields.regn_area_c.value" disabled="true" {$checked}>
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
{if !$fields.dining_room_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DINING_ROOM' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="dining_room_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.dining_room_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.dining_room_c.value) == "1" || strval($fields.dining_room_c.value) == "yes" || strval($fields.dining_room_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.dining_room_c.name}" id="{$fields.dining_room_c.name}" value="$fields.dining_room_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.exclusive_caterer_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXCLUSIVE_CATERER' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="exclusive_caterer_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.exclusive_caterer_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.exclusive_caterer_c.value) == "1" || strval($fields.exclusive_caterer_c.value) == "yes" || strval($fields.exclusive_caterer_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.exclusive_caterer_c.name}" id="{$fields.exclusive_caterer_c.name}" value="$fields.exclusive_caterer_c.value" disabled="true" {$checked}>
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
{if !$fields.meeting_rooms_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MEETING_ROOMS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="meeting_rooms_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.meeting_rooms_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.meeting_rooms_c.value) == "1" || strval($fields.meeting_rooms_c.value) == "yes" || strval($fields.meeting_rooms_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.meeting_rooms_c.name}" id="{$fields.meeting_rooms_c.name}" value="$fields.meeting_rooms_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.theatre_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_THEATRE' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="theatre_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.theatre_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.theatre_c.value) == "1" || strval($fields.theatre_c.value) == "yes" || strval($fields.theatre_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.theatre_c.name}" id="{$fields.theatre_c.name}" value="$fields.theatre_c.value" disabled="true" {$checked}>
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
{if !$fields.stages_allowed_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STAGES_ALLOWED' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="bool" field="stages_allowed_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.stages_allowed_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.stages_allowed_c.value) == "1" || strval($fields.stages_allowed_c.value) == "yes" || strval($fields.stages_allowed_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.stages_allowed_c.name}" id="{$fields.stages_allowed_c.name}" value="$fields.stages_allowed_c.value" disabled="true" {$checked}>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.venue_comments_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_VENUE_COMMENTS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="venue_comments_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.venue_comments_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.venue_comments_c.value) <= 0}
{assign var="value" value=$fields.venue_comments_c.default_value }
{else}
{assign var="value" value=$fields.venue_comments_c.value }
{/if} 
<span class="sugar_field" id="{$fields.venue_comments_c.name}">{$fields.venue_comments_c.value}</span>
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(4, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EVENT_VENUE").style.display='none';</script>
{/if}
<div id='detailpanel_5' class='detail view  detail508 expanded'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(5);">
{*<img border="0" id="detailpanel_5_img_hide" src="{sugar_getimagepath file="basic_search.gif"}">*}
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(5);">
{*<img border="0" id="detailpanel_5_img_show" src="{sugar_getimagepath file="advanced_search.gif"}">*}
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
{sugar_translate label='LBL_EVENT_CATERER' module='Accounts'}
<script>
document.getElementById('detailpanel_5').className += ' expanded';
</script>
</h4>
<div id='LBL_EVENT_CATERER' class="panelContainer" cellspacing='{$gridline}' style="background-color:white;" >
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<div class="col-sm-12">
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.caterer_rating_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CATERER_RATING' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="caterer_rating_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.caterer_rating_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.caterer_rating_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.caterer_rating_c.name}" value="{ $fields.caterer_rating_c.options }">
{ $fields.caterer_rating_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.caterer_rating_c.name}" value="{ $fields.caterer_rating_c.value }">
{ $fields.caterer_rating_c.options[$fields.caterer_rating_c.value]}
{/if}
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.cat_contract_status_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CAT_CONTRACT_STATUS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="enum" field="cat_contract_status_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.cat_contract_status_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.cat_contract_status_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.cat_contract_status_c.name}" value="{ $fields.cat_contract_status_c.options }">
{ $fields.cat_contract_status_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.cat_contract_status_c.name}" value="{ $fields.cat_contract_status_c.value }">
{ $fields.cat_contract_status_c.options[$fields.cat_contract_status_c.value]}
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
{if !$fields.food_specialty_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FOOD_SPECIALTY' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="food_specialty_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.food_specialty_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.food_specialty_c.value) <= 0}
{assign var="value" value=$fields.food_specialty_c.default_value }
{else}
{assign var="value" value=$fields.food_specialty_c.value }
{/if} 
<span class="sugar_field" id="{$fields.food_specialty_c.name}">{$fields.food_specialty_c.value}</span>
{/if}
</div>
</div>
{counter name="fieldsUsed"}
<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
{if !$fields.caterer_restrictions_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CATERER_RESTRICTIONS' module='Accounts'}{/capture}
{$label|strip_semicolon}:
{/if}
</span>
<div class="" type="varchar" field="caterer_restrictions_c"    style="font-size:14px;word-wrap: break-word;">
{if !$fields.caterer_restrictions_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.caterer_restrictions_c.value) <= 0}
{assign var="value" value=$fields.caterer_restrictions_c.default_value }
{else}
{assign var="value" value=$fields.caterer_restrictions_c.value }
{/if} 
<span class="sugar_field" id="{$fields.caterer_restrictions_c.name}">{$fields.caterer_restrictions_c.value}</span>
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
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(5, 'expanded'); {rdelim}); </script>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EVENT_CATERER").style.display='none';</script>
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
var Accounts_detailview_tabs = new YAHOO.widget.TabView("Accounts_detailview_tabs");
Accounts_detailview_tabs.selectTab(0);
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
<li class="active" id="remove_color_current_level_c"><span>{sugar_translate label='LBL_EVENT_FACILITATOR_CO' module='Accounts'} </span><br><span 		class="small_font">
</span>
</li>
<li class="active" id="remove_color_current_level2_c"><span>{sugar_translate label='LBL_EVENT_VENUE' module='Accounts'} </span><br><span 		class="small_font">
</span>
</li>
<li class="active" id="remove_color_current_level3_c"><span>{sugar_translate label='LBL_EVENT_CATERER' module='Accounts'} </span><br><span 		class="small_font">
</span>
</li>
</ul>
</form>
</div>
</div>
</div>
</div>