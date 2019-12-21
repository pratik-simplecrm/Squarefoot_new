<?php /* Smarty version 2.6.29, created on 2019-11-20 10:50:21
         compiled from cache/themes/SuiteR/modules/Accounts/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 205, false),array('function', 'counter', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 215, false),array('function', 'sugar_translate', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 236, false),array('function', 'sugar_phone', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 245, false),array('function', 'sugar_ajax_url', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 1095, false),array('function', 'sugar_getjspath', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 2930, false),array('modifier', 'strip_semicolon', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 237, false),array('modifier', 'substr', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 273, false),array('modifier', 'to_url', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 275, false),array('modifier', 'escape', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 941, false),array('modifier', 'url2html', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 941, false),array('modifier', 'nl2br', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 941, false),array('modifier', 'strip_tags', 'cache/themes/SuiteR/modules/Accounts/DetailView.tpl', 947, false),)), $this); ?>

<style>
<?php echo '
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
'; ?>

</style>
<script >
    <?php echo '

    $(document).ready(function () {
        $(".dataField").css("display", "none");
        $(\'#Activities_createtask_button\').attr(\'data-toggle\', \'modal\');
        $(\'#Activities_createtask_button\').attr(\'data-target\', \'#myModalcustom_popup\');
        $(\'#activities_createtask_button\').attr(\'data-toggle\', \'modal\');
        $(\'#activities_createtask_button\').attr(\'data-target\', \'#myModalcustom_popup\');


        $(\'#Activities_schedulemeeting_button\').attr(\'data-toggle\', \'modal\');
        $(\'#Activities_schedulemeeting_button\').attr(\'data-target\', \'#myModalcustom_popup\');
        $(\'#activities_schedulemeeting_button\').attr(\'data-toggle\', \'modal\');
        $(\'#activities_schedulemeeting_button\').attr(\'data-target\', \'#myModalcustom_popup\');

        $(\'#Activities_logcall_button\').attr(\'data-toggle\', \'modal\');
        $(\'#Activities_logcall_button\').attr(\'data-target\', \'#myModalcustom_popup\');
        $(\'#activities_logcall_button\').attr(\'data-toggle\', \'modal\');
        $(\'#activities_logcall_button\').attr(\'data-target\', \'#myModalcustom_popup\');

        $(\'#History_createnoteorattachment_button\').attr(\'data-toggle\', \'modal\');
        $(\'#History_createnoteorattachment_button\').attr(\'data-target\', \'#myModalcustom_popup_history\');
        $(\'#history_createnoteorattachment_button\').attr(\'data-toggle\', \'modal\');
        $(\'#history_createnoteorattachment_button\').attr(\'data-target\', \'#myModalcustom_popup_history\');


        /*
         $( ".custom-noBullet" ).click(function() {
         $("#"+this.id+" .change_color_dashlets span[id*=\'show_link_\'] .utilsLink").trigger("click");
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


        if ($(\'.custom-right-panel\').length == "0")
        {
            $(\'.custom-left-panel\').removeClass(\'col-sm-7\');
            $(\'.custom-left-panel\').addClass(\'col-sm-12\');
        }


    });





    '; ?>

</script>
<script>
<?php echo '
$(document).ready(function () {
// Get the modal
/*var modal = document.getElementById(\'myModal_sla_pop\');*/
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
'; ?>

</script>

<script language="javascript">
<?php echo '
SUGAR.util.doWhen(function(){
    return $("#contentTable").length == 0;
}, SUGAR.themes.actionMenu);
'; ?>

</script>
<td class="buttons"  style="min-width:50%;padding-right: 60px !important;" NOWRAP >
<div class="pull-right">
<?php 
echo  $theTitle .= "<div class='favorite' record_id='" . $_REQUEST['record'] . "' module='" . $_REQUEST['module'] . "' style='color: #FFD700;margin:2.5px 10px;'><div class='favorite_icon_outline'><i class='fa fa-2x fa-star-o' aria-hidden='true' title='".translate('LBL_ADD_TO_FAVORITES', 'Home')."'></i>
</div>
<div class='favorite_icon_fill'><i class='fa fa-2x fa-star' aria-hidden='true' title='".translate('LBL_ADD_TO_FAVORITES', 'Home')."'></i>
</div></div>";
 ?>
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" ><?php if ($this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Accounts'; _form.return_action.value='DetailView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="<?php echo $this->_tpl_vars['APP']['LBL_EDIT_BUTTON_LABEL']; ?>
"><?php endif; ?> <ul id class="subnav" ><li><?php if ($this->_tpl_vars['bean']->aclAccess('edit')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Accounts'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="<?php echo $this->_tpl_vars['APP']['LBL_DUPLICATE_BUTTON_LABEL']; ?>
" id="duplicate_button"><?php endif; ?> </li><li><?php if ($this->_tpl_vars['bean']->aclAccess('delete')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_KEY']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Accounts'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('<?php echo $this->_tpl_vars['APP']['NTC_DELETE_CONFIRMATION']; ?>
')) SUGAR.ajaxUI.submitForm(_form); return false;" type="submit" name="Delete" value="<?php echo $this->_tpl_vars['APP']['LBL_DELETE_BUTTON_LABEL']; ?>
" id="delete_button"><?php endif; ?> </li><li><?php if ($this->_tpl_vars['bean']->aclAccess('edit') && $this->_tpl_vars['bean']->aclAccess('delete')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_DUP_MERGE']; ?>
" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Accounts'; _form.return_action.value='DetailView'; _form.return_id.value='<?php echo $this->_tpl_vars['id']; ?>
'; _form.action.value='Step1'; _form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Merge" value="<?php echo $this->_tpl_vars['APP']['LBL_DUP_MERGE']; ?>
" id="merge_duplicate_button"><?php endif; ?> </li><li><input type="button" class="button" onClick="showPopup();" value="<?php echo $this->_tpl_vars['APP']['LBL_GENERATE_LETTER']; ?>
"/></li><li><?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Accounts", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?></li></ul></li></ul>
<?php echo $this->_tpl_vars['ADMIN_EDIT']; ?>

<?php echo $this->_tpl_vars['PAGINATION']; ?>

</div>
</div>
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="<?php echo $this->_tpl_vars['offset']; ?>
">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
</form>
</div>
</td>
</tr>
</table>
</div>
<?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div class="row">
<div class="col-sm-12 new_row_detailview"  >
<div style="margin-left:12px;">
<div id="Accounts_detailview1_tabs"
class="yui-navset detailview_tabs" style="padding:0px;"
>
<div class="yui-content" >
<div id='tabcontent0'>
<div id='detailpanel1_1' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<div id='LBL_ACCOUNT_INFORMATION' class="panelContainer"  style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>

<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-2" scope="col" style="text-align:left;min-height:36px" >
<?php if (! $this->_tpl_vars['fields']['phone_office']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE_OFFICE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
<div class=" " type="phone" field="phone_office"  class="phone" style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['phone_office']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['phone_office']['value'] )):  $this->assign('phone_value', $this->_tpl_vars['fields']['phone_office']['value']);  echo smarty_function_sugar_phone(array('value' => $this->_tpl_vars['phone_value'],'usa_format' => '0'), $this);?>

<?php endif;  endif; ?>
</div>
</div>

</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>

<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-2" scope="col" style="text-align:left;min-height:36px" >
<?php if (! $this->_tpl_vars['fields']['website']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_WEBSITE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
<div class=" " type="url" field="website" colspan='3'  style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['website']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php ob_start();  echo $this->_tpl_vars['fields']['website']['value'];  $this->_smarty_vars['capture']['getLink'] = ob_get_contents();  $this->assign('link', ob_get_contents());ob_end_clean();  if (! empty ( $this->_tpl_vars['link'] )):  ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 7) : substr($_tmp, 0, 7));  $this->_smarty_vars['capture']['getStart'] = ob_get_contents();  $this->assign('linkStart', ob_get_contents());ob_end_clean(); ?>
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
">
<a href='<?php echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('to_url', true, $_tmp) : smarty_modifier_to_url($_tmp)); ?>
' target='_blank' ><?php echo $this->_tpl_vars['link']; ?>
</a>
</span>
<?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>

<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-2" scope="col" style="text-align:left;min-height:36px" >
<?php if (! $this->_tpl_vars['fields']['email1']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
<div class="  show_primary_email " type="varchar" field="email1" colspan='3'  style="word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['email1']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id='email1_span'>
<?php echo $this->_tpl_vars['fields']['email1']['value']; ?>

</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>

</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_ACCOUNT_INFORMATION").style.display='none';</script>
<?php endif; ?>
</div>				<div id='tabcontent1'>
<div id='detailpanel1_2' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<div id='LBL_PANEL_ADVANCED' class="panelContainer"  style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>

</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>

</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_PANEL_ADVANCED").style.display='none';</script>
<?php endif; ?>
<div id='detailpanel1_3' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<div id='LBL_EVENT_FACILITATOR_CO' class="panelContainer"  style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(3, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EVENT_FACILITATOR_CO").style.display='none';</script>
<?php endif; ?>
<div id='detailpanel1_4' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<div id='LBL_EVENT_VENUE' class="panelContainer"  style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(4, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EVENT_VENUE").style.display='none';</script>
<?php endif; ?>
<div id='detailpanel1_5' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<div id='LBL_EVENT_CATERER' class="panelContainer"  style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div>


</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(5, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EVENT_CATERER").style.display='none';</script>
<?php endif; ?>
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

<li><a id="tab0" href="javascript:void(0)"><em ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCOUNT_INFORMATION','module' => 'Accounts'), $this);?>
</em></a></li>

<li><a id="tab1" href="javascript:void(0)"><em ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PANEL_ADVANCED','module' => 'Accounts'), $this);?>
</em></a></li>



</ul>
<div class="yui-content" style="min-height:350px">
<div id='tabcontent0'>
<div id='detailpanel_1' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<div id='LBL_ACCOUNT_INFORMATION' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
' style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="name" field="name"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['name']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['name']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['customer_id_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CUSTOMER_ID','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="customer_id_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['customer_id_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['customer_id_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['customer_id_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['customer_id_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['customer_id_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['customer_id_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['phone_office']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE_OFFICE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="phone" field="phone_office"   class="phone" style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['phone_office']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['phone_office']['value'] )):  $this->assign('phone_value', $this->_tpl_vars['fields']['phone_office']['value']);  echo smarty_function_sugar_phone(array('value' => $this->_tpl_vars['phone_value'],'usa_format' => '0'), $this);?>

<?php endif;  endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['phone_fax']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FAX','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="phone" field="phone_fax"   class="phone" style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['phone_fax']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['phone_fax']['value'] )):  $this->assign('phone_value', $this->_tpl_vars['fields']['phone_fax']['value']);  echo smarty_function_sugar_phone(array('value' => $this->_tpl_vars['phone_value'],'usa_format' => '0'), $this);?>

<?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['website']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_WEBSITE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="url" field="website"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['website']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php ob_start();  echo $this->_tpl_vars['fields']['website']['value'];  $this->_smarty_vars['capture']['getLink'] = ob_get_contents();  $this->assign('link', ob_get_contents());ob_end_clean();  if (! empty ( $this->_tpl_vars['link'] )):  ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 7) : substr($_tmp, 0, 7));  $this->_smarty_vars['capture']['getStart'] = ob_get_contents();  $this->assign('linkStart', ob_get_contents());ob_end_clean(); ?>
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
">
<a href='<?php echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('to_url', true, $_tmp) : smarty_modifier_to_url($_tmp)); ?>
' target='_blank' ><?php echo $this->_tpl_vars['link']; ?>
</a>
</span>
<?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['billing_address_street']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="billing_address_street"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['billing_address_street']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%'>
<input type="hidden" class="sugar_field" id="billing_address_street" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['billing_address_street']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="billing_address_city" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['billing_address_city']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="billing_address_state" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['billing_address_state']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="billing_address_country" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['billing_address_country']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="billing_address_postalcode" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['billing_address_postalcode']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['billing_address_street']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['billing_address_city']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['billing_address_state']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
&nbsp;&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['billing_address_postalcode']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['billing_address_country']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

</td>
<td class='dataField' width='1%'>
<?php echo $this->_tpl_vars['custom_code_billing']; ?>

</td>
</tr>
</table>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['shipping_address_street']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="shipping_address_street"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['shipping_address_street']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%'>
<input type="hidden" class="sugar_field" id="shipping_address_street" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['shipping_address_street']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="shipping_address_city" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['shipping_address_city']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="shipping_address_state" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['shipping_address_state']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="shipping_address_country" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['shipping_address_country']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<input type="hidden" class="sugar_field" id="shipping_address_postalcode" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['shipping_address_postalcode']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
">
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['shipping_address_street']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['shipping_address_city']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['shipping_address_state']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
&nbsp;&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['shipping_address_postalcode']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['shipping_address_country']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

</td>
<td class='dataField' width='1%'>
<?php echo $this->_tpl_vars['custom_code_shipping']; ?>

</td>
</tr>
</table>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['email1']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="email1"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['email1']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id='email1_span'>
<?php echo $this->_tpl_vars['fields']['email1']['value']; ?>

</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['description']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="text" field="description"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['description']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<span >&nbsp;</span>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_ACCOUNT_INFORMATION").style.display='none';</script>
<?php endif; ?>
</div>    <div id='tabcontent1'>
<div id='detailpanel_2' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<div id='LBL_PANEL_ADVANCED' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
' style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['annual_revenue']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ANNUAL_REVENUE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="annual_revenue"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['annual_revenue']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['annual_revenue']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['annual_revenue']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['annual_revenue']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['annual_revenue']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['annual_revenue']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['parent_name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBER_OF','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="relate" field="parent_name"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['parent_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['parent_id']['value'] )):  ob_start(); ?>index.php?module=Accounts&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['parent_id']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="parent_id" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['parent_id']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['parent_name']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['parent_id']['value'] )): ?></a><?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['account_type']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TYPE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="enum" field="account_type"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['account_type']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['account_type']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['account_type']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['account_type']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['account_type']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['account_type']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['account_type']['options'][$this->_tpl_vars['fields']['account_type']['value']]; ?>

<?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['educational_institution_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_EDUCATIONAL_INSTITUTION','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="educational_institution_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['educational_institution_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['educational_institution_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['educational_institution_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['educational_institution_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['educational_institution_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['educational_institution_c']['name']; ?>
" value="$fields.educational_institution_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['pharmaceutical_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PHARMACEUTICAL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="pharmaceutical_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['pharmaceutical_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['pharmaceutical_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['pharmaceutical_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['pharmaceutical_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['pharmaceutical_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['pharmaceutical_c']['name']; ?>
" value="$fields.pharmaceutical_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['hospital_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_HOSPITAL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="hospital_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['hospital_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['hospital_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['hospital_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['hospital_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['hospital_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['hospital_c']['name']; ?>
" value="$fields.hospital_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['builder_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_BUILDER','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="builder_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['builder_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['builder_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['builder_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['builder_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['builder_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['builder_c']['name']; ?>
" value="$fields.builder_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['contractor_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CONTRACTOR','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="contractor_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['contractor_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['contractor_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['contractor_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['contractor_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['contractor_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['contractor_c']['name']; ?>
" value="$fields.contractor_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['hotel_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_HOTEL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="hotel_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['hotel_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['hotel_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['hotel_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['hotel_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['hotel_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['hotel_c']['name']; ?>
" value="$fields.hotel_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['retail_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_RETAIL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="retail_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['retail_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['retail_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['retail_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['retail_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['retail_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['retail_c']['name']; ?>
" value="$fields.retail_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['sports_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SPORTS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="sports_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['sports_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['sports_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['sports_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['sports_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['sports_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['sports_c']['name']; ?>
" value="$fields.sports_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['others_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_OTHERS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="others_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['others_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['others_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['others_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['others_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['others_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['others_c']['name']; ?>
" value="$fields.others_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['is_existing_customer_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_IS_EXISTING_CUSTOMER','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="is_existing_customer_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['is_existing_customer_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['is_existing_customer_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['is_existing_customer_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['is_existing_customer_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['is_existing_customer_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['is_existing_customer_c']['name']; ?>
" value="$fields.is_existing_customer_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-12" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['assigned_user_name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="relate" field="assigned_user_name"  colspan='3'  style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['assigned_user_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id="assigned_user_id" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['assigned_user_id']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['assigned_user_name']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['date_entered']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_ENTERED','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="datetime" field="date_entered"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['date_entered']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="date_entered" class="sugar_field"><?php echo $this->_tpl_vars['fields']['date_entered']['value']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_BY']; ?>
 <?php echo $this->_tpl_vars['fields']['created_by_name']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['date_modified']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_MODIFIED','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="datetime" field="date_modified"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['date_modified']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="date_modified" class="sugar_field"><?php echo $this->_tpl_vars['fields']['date_modified']['value']; ?>
 <?php echo $this->_tpl_vars['APP']['LBL_BY']; ?>
 <?php echo $this->_tpl_vars['fields']['modified_by_name']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<span >&nbsp;</span>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_PANEL_ADVANCED").style.display='none';</script>
<?php endif; ?>
<div id='detailpanel_3' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EVENT_FACILITATOR_CO','module' => 'Accounts'), $this);?>

<script>
document.getElementById('detailpanel_3').className += ' expanded';
</script>
</h4>
<div id='LBL_EVENT_FACILITATOR_CO' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
' style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['fac_rating_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FAC_RATING','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="enum" field="fac_rating_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['fac_rating_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['fac_rating_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['fac_rating_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['fac_rating_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['fac_rating_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['fac_rating_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['fac_rating_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['fac_rating_c']['options'][$this->_tpl_vars['fields']['fac_rating_c']['value']]; ?>

<?php endif;  endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['fac_contract_status_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FAC_CONTRACT_STATUS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="enum" field="fac_contract_status_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['fac_contract_status_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['fac_contract_status_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['fac_contract_status_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['fac_contract_status_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['fac_contract_status_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['fac_contract_status_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['fac_contract_status_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['fac_contract_status_c']['options'][$this->_tpl_vars['fields']['fac_contract_status_c']['value']]; ?>

<?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['facilitate_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FACILITATE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="facilitate_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['facilitate_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['facilitate_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['facilitate_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['facilitate_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['facilitate_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['facilitate_c']['name']; ?>
" value="$fields.facilitate_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['facilitate_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FACILITATE_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="facilitate_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['facilitate_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['facilitate_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['facilitate_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['facilitate_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['facilitate_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['facilitate_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['consult_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CONSULT','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="consult_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['consult_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['consult_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['consult_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['consult_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['consult_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['consult_c']['name']; ?>
" value="$fields.consult_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['consult_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CONSULT_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="consult_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['consult_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['consult_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['consult_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['consult_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['consult_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['consult_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['implement_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_IMPLEMENT','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="implement_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['implement_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['implement_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['implement_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['implement_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['implement_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['implement_c']['name']; ?>
" value="$fields.implement_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['implement_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_IMPLEMENT_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="implement_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['implement_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['implement_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['implement_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['implement_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['implement_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['implement_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['own_facil_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_OWN_FACIL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="own_facil_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['own_facil_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['own_facil_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['own_facil_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['own_facil_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['own_facil_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['own_facil_c']['name']; ?>
" value="$fields.own_facil_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['fac_rent_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FAC_RENT_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="fac_rent_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['fac_rent_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['fac_rent_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['fac_rent_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['fac_rent_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['fac_rent_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['fac_rent_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['travel_reimb_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TRAVEL_REIMB','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="travel_reimb_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['travel_reimb_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['travel_reimb_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['travel_reimb_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['travel_reimb_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['travel_reimb_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['travel_reimb_c']['name']; ?>
" value="$fields.travel_reimb_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['travel_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TRAVEL_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="travel_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['travel_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['travel_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['travel_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['travel_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['travel_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['travel_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['reference1_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REFERENCE1','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="relate" field="reference1_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['reference1_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['contact_id1_c']['value'] )):  ob_start(); ?>index.php?module=Contacts&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['contact_id1_c']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="contact_id1_c" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['contact_id1_c']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['reference1_c']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['contact_id1_c']['value'] )): ?></a><?php endif;  endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['reference1_comments_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REFERENCE1_COMMENTS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="reference1_comments_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['reference1_comments_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['reference1_comments_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['reference1_comments_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['reference1_comments_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['reference1_comments_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['reference1_comments_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['reference2_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REFERENCE2','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="relate" field="reference2_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['reference2_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['contact_id2_c']['value'] )):  ob_start(); ?>index.php?module=Contacts&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['contact_id2_c']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="contact_id2_c" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['contact_id2_c']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['reference2_c']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['contact_id2_c']['value'] )): ?></a><?php endif;  endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['reference2_comments_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REFERENCE2_COMMENTS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="reference2_comments_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['reference2_comments_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['reference2_comments_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['reference2_comments_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['reference2_comments_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['reference2_comments_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['reference2_comments_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['reference3_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REFERENCE3','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="relate" field="reference3_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['reference3_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['contact_id3_c']['value'] )):  ob_start(); ?>index.php?module=Contacts&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['contact_id3_c']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="contact_id3_c" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['contact_id3_c']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['reference3_c']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['contact_id3_c']['value'] )): ?></a><?php endif;  endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['reference3_comments_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REFERENCE3_COMMENTS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="reference3_comments_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['reference3_comments_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['reference3_comments_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['reference3_comments_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['reference3_comments_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['reference3_comments_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['reference3_comments_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<span >&nbsp;</span>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(3, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EVENT_FACILITATOR_CO").style.display='none';</script>
<?php endif; ?>
<div id='detailpanel_4' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(4);">
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(4);">
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EVENT_VENUE','module' => 'Accounts'), $this);?>

<script>
document.getElementById('detailpanel_4').className += ' expanded';
</script>
</h4>
<div id='LBL_EVENT_VENUE' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
' style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['venue_rating_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_VENUE_RATING','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="enum" field="venue_rating_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['venue_rating_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['venue_rating_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['venue_rating_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['venue_rating_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['venue_rating_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['venue_rating_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['venue_rating_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['venue_rating_c']['options'][$this->_tpl_vars['fields']['venue_rating_c']['value']]; ?>

<?php endif;  endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['ven_contract_status_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_VEN_CONTRACT_STATUS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="enum" field="ven_contract_status_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['ven_contract_status_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['ven_contract_status_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['ven_contract_status_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['ven_contract_status_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['ven_contract_status_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['ven_contract_status_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['ven_contract_status_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['ven_contract_status_c']['options'][$this->_tpl_vars['fields']['ven_contract_status_c']['value']]; ?>

<?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['venue_type_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_VENUE_TYPE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="enum" field="venue_type_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['venue_type_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['venue_type_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['venue_type_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['venue_type_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['venue_type_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['venue_type_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['venue_type_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['venue_type_c']['options'][$this->_tpl_vars['fields']['venue_type_c']['value']]; ?>

<?php endif;  endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['venue_restrictions_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_VENUE_RESTRICTIONS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="venue_restrictions_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['venue_restrictions_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['venue_restrictions_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['venue_restrictions_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['venue_restrictions_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['venue_restrictions_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['venue_restrictions_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['will_book_block_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_WILL_BOOK_BLOCK','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="will_book_block_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['will_book_block_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['will_book_block_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['will_book_block_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['will_book_block_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['will_book_block_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['will_book_block_c']['name']; ?>
" value="$fields.will_book_block_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['num_guest_rooms_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NUM_GUEST_ROOMS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="num_guest_rooms_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['num_guest_rooms_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['num_guest_rooms_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['num_guest_rooms_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['num_guest_rooms_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['num_guest_rooms_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['num_guest_rooms_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['corporate_rate_avail_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CORPORATE_RATE_AVAIL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="corporate_rate_avail_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['corporate_rate_avail_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['corporate_rate_avail_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['corporate_rate_avail_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['corporate_rate_avail_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['corporate_rate_avail_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['corporate_rate_avail_c']['name']; ?>
" value="$fields.corporate_rate_avail_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['corporate_rate_value_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CORPORATE_RATE_VALUE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="corporate_rate_value_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['corporate_rate_value_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['corporate_rate_value_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['corporate_rate_value_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['corporate_rate_value_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['corporate_rate_value_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['corporate_rate_value_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['reqd_deposit_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REQD_DEPOSIT','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="reqd_deposit_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['reqd_deposit_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['reqd_deposit_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['reqd_deposit_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['reqd_deposit_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['reqd_deposit_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['reqd_deposit_c']['name']; ?>
" value="$fields.reqd_deposit_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['deposit_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DEPOSIT_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="deposit_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['deposit_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['deposit_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['deposit_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['deposit_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['deposit_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['deposit_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['parking_avail_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PARKING_AVAIL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="parking_avail_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['parking_avail_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['parking_avail_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['parking_avail_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['parking_avail_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['parking_avail_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['parking_avail_c']['name']; ?>
" value="$fields.parking_avail_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['parking_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PARKING_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="parking_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['parking_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['parking_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['parking_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['parking_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['parking_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['parking_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['av_avail_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_AV_AVAIL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="av_avail_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['av_avail_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['av_avail_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['av_avail_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['av_avail_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['av_avail_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['av_avail_c']['name']; ?>
" value="$fields.av_avail_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['av_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_AV_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="av_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['av_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['av_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['av_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['av_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['av_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['av_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['exclusive_av_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_EXCLUSIVE_AV','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="exclusive_av_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['exclusive_av_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['exclusive_av_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['exclusive_av_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['exclusive_av_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['exclusive_av_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['exclusive_av_c']['name']; ?>
" value="$fields.exclusive_av_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['av_contact_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_AV_CONTACT','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="relate" field="av_contact_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['av_contact_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['contact_id4_c']['value'] )):  ob_start(); ?>index.php?module=Contacts&action=DetailView&record=<?php echo $this->_tpl_vars['fields']['contact_id4_c']['value'];  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('detail_url', ob_get_contents());ob_end_clean(); ?>
<a href="<?php echo smarty_function_sugar_ajax_url(array('url' => $this->_tpl_vars['detail_url']), $this);?>
"><?php endif; ?>
<span id="contact_id4_c" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['contact_id4_c']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['av_contact_c']['value']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['fields']['contact_id4_c']['value'] )): ?></a><?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['flip_charts_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FLIP_CHARTS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="flip_charts_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['flip_charts_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['flip_charts_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['flip_charts_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['flip_charts_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['flip_charts_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['flip_charts_c']['name']; ?>
" value="$fields.flip_charts_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['flip_chart_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FLIP_CHART_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="flip_chart_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['flip_chart_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['flip_chart_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['flip_chart_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['flip_chart_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['flip_chart_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['flip_chart_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['internet_avail_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_INTERNET_AVAIL','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="internet_avail_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['internet_avail_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['internet_avail_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['internet_avail_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['internet_avail_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['internet_avail_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['internet_avail_c']['name']; ?>
" value="$fields.internet_avail_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['internet_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_INTERNET_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="internet_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['internet_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['internet_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['internet_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['internet_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['internet_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['internet_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['receiving_dock_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_RECEIVING_DOCK','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="receiving_dock_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['receiving_dock_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['receiving_dock_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['receiving_dock_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['receiving_dock_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['receiving_dock_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['receiving_dock_c']['name']; ?>
" value="$fields.receiving_dock_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['receiving_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_RECEIVING_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="receiving_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['receiving_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['receiving_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['receiving_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['receiving_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['receiving_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['receiving_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['refund_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REFUND_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="refund_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['refund_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['refund_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['refund_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['refund_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['refund_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['refund_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['other_fees_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_OTHER_FEES','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="other_fees_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['other_fees_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['other_fees_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['other_fees_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['other_fees_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['other_fees_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['other_fees_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['reception_area_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_RECEPTION_AREA','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="reception_area_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['reception_area_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['reception_area_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['reception_area_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['reception_area_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['reception_area_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['reception_area_c']['name']; ?>
" value="$fields.reception_area_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['regn_area_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REGN_AREA','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="regn_area_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['regn_area_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['regn_area_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['regn_area_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['regn_area_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['regn_area_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['regn_area_c']['name']; ?>
" value="$fields.regn_area_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['dining_room_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DINING_ROOM','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="dining_room_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['dining_room_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['dining_room_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['dining_room_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['dining_room_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['dining_room_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['dining_room_c']['name']; ?>
" value="$fields.dining_room_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['exclusive_caterer_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_EXCLUSIVE_CATERER','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="exclusive_caterer_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['exclusive_caterer_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['exclusive_caterer_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['exclusive_caterer_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['exclusive_caterer_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['exclusive_caterer_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['exclusive_caterer_c']['name']; ?>
" value="$fields.exclusive_caterer_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['meeting_rooms_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_MEETING_ROOMS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="meeting_rooms_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['meeting_rooms_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['meeting_rooms_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['meeting_rooms_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['meeting_rooms_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['meeting_rooms_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['meeting_rooms_c']['name']; ?>
" value="$fields.meeting_rooms_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['theatre_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_THEATRE','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="theatre_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['theatre_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['theatre_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['theatre_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['theatre_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['theatre_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['theatre_c']['name']; ?>
" value="$fields.theatre_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['stages_allowed_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_STAGES_ALLOWED','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="bool" field="stages_allowed_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['stages_allowed_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['stages_allowed_c']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['stages_allowed_c']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['stages_allowed_c']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['stages_allowed_c']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['stages_allowed_c']['name']; ?>
" value="$fields.stages_allowed_c.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['venue_comments_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_VENUE_COMMENTS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="venue_comments_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['venue_comments_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['venue_comments_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['venue_comments_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['venue_comments_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['venue_comments_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['venue_comments_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<span >&nbsp;</span>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(4, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EVENT_VENUE").style.display='none';</script>
<?php endif; ?>
<div id='detailpanel_5' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(5);">
<i class="fa fa-minus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(5);">
<i class="fa fa-plus-square-o" aria-hidden="true" style="color:black"></i>
</a>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EVENT_CATERER','module' => 'Accounts'), $this);?>

<script>
document.getElementById('detailpanel_5').className += ' expanded';
</script>
</h4>
<div id='LBL_EVENT_CATERER' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
' style="background-color:white;" >
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['caterer_rating_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CATERER_RATING','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="enum" field="caterer_rating_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['caterer_rating_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['caterer_rating_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['caterer_rating_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['caterer_rating_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['caterer_rating_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['caterer_rating_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['caterer_rating_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['caterer_rating_c']['options'][$this->_tpl_vars['fields']['caterer_rating_c']['value']]; ?>

<?php endif;  endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['cat_contract_status_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CAT_CONTRACT_STATUS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="enum" field="cat_contract_status_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['cat_contract_status_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['cat_contract_status_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['cat_contract_status_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['cat_contract_status_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['cat_contract_status_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['cat_contract_status_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['cat_contract_status_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['cat_contract_status_c']['options'][$this->_tpl_vars['fields']['cat_contract_status_c']['value']]; ?>

<?php endif;  endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<div class="col-sm-12">
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['food_specialty_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FOOD_SPECIALTY','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="food_specialty_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['food_specialty_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['food_specialty_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['food_specialty_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['food_specialty_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['food_specialty_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['food_specialty_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<div class="col-sm-6" width='50%' scope="col" style="text-align:left;word-wrap: break-word; padding-top:10px;padding-left:5px;padding-bottom:5px;" >
<span style="font-weight:600">
<?php if (! $this->_tpl_vars['fields']['caterer_restrictions_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_CATERER_RESTRICTIONS','module' => 'Accounts'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</span>
<div class="" type="varchar" field="caterer_restrictions_c"    style="font-size:14px;word-wrap: break-word;">
<?php if (! $this->_tpl_vars['fields']['caterer_restrictions_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['caterer_restrictions_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['caterer_restrictions_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['caterer_restrictions_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['caterer_restrictions_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['caterer_restrictions_c']['value']; ?>
</span>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</div>
<span >&nbsp;</span>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(5, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EVENT_CATERER").style.display='none';</script>
<?php endif; ?>
</div>
</div>
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){SUGAR.util.buildAccessKeyLabels();});
</script>                                                                                                                                                                                <script type='text/javascript' src='<?php echo smarty_function_sugar_getjspath(array('file' => 'include/javascript/popup_helper.js'), $this);?>
'></script>
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'cache/include/javascript/sugar_grp_yui_widgets.js'), $this);?>
"></script>
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
<li class="active" id="remove_color_current_level_c"><span><?php echo smarty_function_sugar_translate(array('label' => 'LBL_EVENT_FACILITATOR_CO','module' => 'Accounts'), $this);?>
 </span><br><span 		class="small_font">
</span>
</li>
<li class="active" id="remove_color_current_level2_c"><span><?php echo smarty_function_sugar_translate(array('label' => 'LBL_EVENT_VENUE','module' => 'Accounts'), $this);?>
 </span><br><span 		class="small_font">
</span>
</li>
<li class="active" id="remove_color_current_level3_c"><span><?php echo smarty_function_sugar_translate(array('label' => 'LBL_EVENT_CATERER','module' => 'Accounts'), $this);?>
 </span><br><span 		class="small_font">
</span>
</li>
</ul>
</form>
</div>
</div>
</div>
</div>