<?php /* Smarty version 2.6.29, created on 2019-11-20 10:11:53
         compiled from cache/themes/SuiteR/modules/Users/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/themes/SuiteR/modules/Users/DetailView.tpl', 39, false),array('function', 'sugar_translate', 'cache/themes/SuiteR/modules/Users/DetailView.tpl', 46, false),array('function', 'counter', 'cache/themes/SuiteR/modules/Users/DetailView.tpl', 61, false),array('function', 'sugar_getimagepath', 'cache/themes/SuiteR/modules/Users/DetailView.tpl', 204, false),array('function', 'sugar_phone', 'cache/themes/SuiteR/modules/Users/DetailView.tpl', 341, false),array('function', 'sugar_help', 'cache/themes/SuiteR/modules/Users/DetailView.tpl', 955, false),array('function', 'sugar_getjspath', 'cache/themes/SuiteR/modules/Users/DetailView.tpl', 1018, false),array('modifier', 'strip_semicolon', 'cache/themes/SuiteR/modules/Users/DetailView.tpl', 72, false),array('modifier', 'escape', 'cache/themes/SuiteR/modules/Users/DetailView.tpl', 679, false),array('modifier', 'url2html', 'cache/themes/SuiteR/modules/Users/DetailView.tpl', 679, false),array('modifier', 'nl2br', 'cache/themes/SuiteR/modules/Users/DetailView.tpl', 679, false),)), $this); ?>


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
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" ><input title="Edit" accessKey="i" name="Edit" id="edit_button" value="Edit" onclick="var _form = document.getElementById('formDetailView');_form.return_module.value='Users'; _form.return_action.value='DetailView'; _form.return_id.value='579a7062-5831-3c2b-3381-5dd4c43acb8c'; _form.action.value='EditView';_form.submit();" type="button"/><ul id class="subnav" ><li><input id="duplicate_button" title="Duplicate" accessKey="u" class="button" onclick="var _form = document.getElementById('formDetailView');_form.return_module.value='Users'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView';_form.submit();" type="button" name="Duplicate" value="Duplicate"/></li><li><input id="delete_button" type="button" class="button" onclick="confirmDelete();" value="Delete" //></li><li><input title="Reset User Preferences" class="button" LANGUAGE="javascript" onclick="if(confirm('Are you sure you want reset all of the preferences for this user?')) window.location='index.php?module=Users&action=resetPreferences&reset_preferences=true&record=1';" type="button" name="password" value="Reset User Preferences"/></li><li><input title="Reset Homepage" class="button" LANGUAGE="javascript" onclick="if(confirm('Are you sure you want reset your Homepage?')) window.location='index.php?module=Users&action=DetailView&reset_homepage=true&record=1';" type="button" name="password" value="Reset Homepage"/></li><li><?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Users", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
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
<?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div id="Users_detailview_tabs"
class="yui-navset detailview_tabs"
>

<ul class="yui-nav">

<li><a id="tab0" href="javascript:void(0)"><em><?php echo smarty_function_sugar_translate(array('label' => 'LBL_USER_INFORMATION','module' => 'Users'), $this);?>
</em></a></li>


<li <?php if ($this->_tpl_vars['IS_GROUP_OR_PORTAL']): ?>style="display: none;"<?php endif; ?>>
<a id="tab1" href="javascript:void(0)"><em><?php echo $this->_tpl_vars['MOD']['LBL_ADVANCED']; ?>
</em></a>
</li>
<?php if ($this->_tpl_vars['SHOW_ROLES']): ?>
<li>
<a id="tab2" href="javascript:void(0)"><em><?php echo $this->_tpl_vars['MOD']['LBL_USER_ACCESS']; ?>
</em></a>
</li>
<?php endif; ?>
</ul>
<div class="yui-content">
<div id='tabcontent0' >
<div id='detailpanel_1' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<!-- PANEL CONTAINER HERE.. -->
<table id='LBL_USER_INFORMATION' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
'>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['full_name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="name" field="full_name" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['full_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['full_name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['full_name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['full_name']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['full_name']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['full_name']['value']; ?>
</span>
<?php endif; ?>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['user_name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_USER_NAME','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="user_name" field="user_name" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['user_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['user_name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['user_name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['user_name']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['user_name']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['user_name']['value']; ?>
</span>
<?php endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['status']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_STATUS','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="enum" field="status" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['status']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['status']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['status']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['status']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['status']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['status']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['status']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['status']['options'][$this->_tpl_vars['fields']['status']['value']]; ?>

<?php endif;  endif; ?>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['UserType']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_USER_TYPE','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="enum" field="UserType" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['UserType']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id="UserType" class="sugar_field"><?php echo $this->_tpl_vars['USER_TYPE_READONLY']; ?>
</span>
<?php endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['team_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TEAM','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="" field="" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['team_c']['hidden']):  endif; ?>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['branch_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_BRANCH','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="enum" field="branch_c" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['branch_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['branch_c']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['branch_c']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['branch_c']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['branch_c']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['branch_c']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['branch_c']['options'][$this->_tpl_vars['fields']['branch_c']['value']]; ?>

<?php endif;  endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_USER_INFORMATION").style.display='none';</script>
<?php endif; ?>
<div id='detailpanel_2' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(2);">
<img border="0" id="detailpanel_2_img_hide" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "basic_search.gif"), $this);?>
"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(2);">
<img border="0" id="detailpanel_2_img_show" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "advanced_search.gif"), $this);?>
"></a>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_DETAILVIEW_PANEL1','module' => 'Users'), $this);?>

<script>
document.getElementById('detailpanel_2').className += ' expanded';
</script>
</h4>
<!-- PANEL CONTAINER HERE.. -->
<table id='LBL_DETAILVIEW_PANEL1' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
'>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['download_source_code_c']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DOWNLOAD_SOURCE_CODE','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="varchar" field="download_source_code_c" width='37.5%' colspan='3' >
<?php if (! $this->_tpl_vars['fields']['download_source_code_c']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['download_source_code_c']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['download_source_code_c']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['download_source_code_c']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['download_source_code_c']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['download_source_code_c']['value']; ?>
</span>
<?php endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(2, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_DETAILVIEW_PANEL1").style.display='none';</script>
<?php endif; ?>
<div id='detailpanel_3' class='detail view  detail508 expanded'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<h4>
<a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(3);">
<img border="0" id="detailpanel_3_img_hide" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "basic_search.gif"), $this);?>
"></a>
<a href="javascript:void(0)" class="expandLink" onclick="expandPanel(3);">
<img border="0" id="detailpanel_3_img_show" src="<?php echo smarty_function_sugar_getimagepath(array('file' => "advanced_search.gif"), $this);?>
"></a>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EMPLOYEE_INFORMATION','module' => 'Users'), $this);?>

<script>
document.getElementById('detailpanel_3').className += ' expanded';
</script>
</h4>
<!-- PANEL CONTAINER HERE.. -->
<table id='LBL_EMPLOYEE_INFORMATION' class="panelContainer" cellspacing='<?php echo $this->_tpl_vars['gridline']; ?>
'>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['employee_status']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_EMPLOYEE_STATUS','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="varchar" field="employee_status" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['employee_status']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<span id='employee_status_span'>
<?php echo $this->_tpl_vars['fields']['employee_status']['value']; ?>

</span>
<?php endif; ?>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['show_on_employees']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SHOW_ON_EMPLOYEES','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="bool" field="show_on_employees" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['show_on_employees']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strval ( $this->_tpl_vars['fields']['show_on_employees']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['show_on_employees']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['show_on_employees']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="checkbox" class="checkbox" name="<?php echo $this->_tpl_vars['fields']['show_on_employees']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['show_on_employees']['name']; ?>
" value="$fields.show_on_employees.value" disabled="true" <?php echo $this->_tpl_vars['checked']; ?>
>
<?php endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['title']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TITLE','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="varchar" field="title" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['title']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['title']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['title']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['title']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['title']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['title']['value']; ?>
</span>
<?php endif; ?>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['phone_work']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_WORK_PHONE','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="phone" field="phone_work" width='37.5%'  class="phone">
<?php if (! $this->_tpl_vars['fields']['phone_work']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['phone_work']['value'] )):  $this->assign('phone_value', $this->_tpl_vars['fields']['phone_work']['value']);  echo smarty_function_sugar_phone(array('value' => $this->_tpl_vars['phone_value'],'usa_format' => '0'), $this);?>

<?php endif;  endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['department']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DEPARTMENT','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="varchar" field="department" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['department']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['department']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['department']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['department']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['department']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['department']['value']; ?>
</span>
<?php endif; ?>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['phone_mobile']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_MOBILE_PHONE','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="phone" field="phone_mobile" width='37.5%'  class="phone">
<?php if (! $this->_tpl_vars['fields']['phone_mobile']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['phone_mobile']['value'] )):  $this->assign('phone_value', $this->_tpl_vars['fields']['phone_mobile']['value']);  echo smarty_function_sugar_phone(array('value' => $this->_tpl_vars['phone_value'],'usa_format' => '0'), $this);?>

<?php endif;  endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['reports_to_name']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_REPORTS_TO_NAME','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="relate" field="reports_to_name" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['reports_to_name']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span id="reports_to_id" class="sugar_field" data-id-value="<?php echo $this->_tpl_vars['fields']['reports_to_id']['value']; ?>
"><?php echo $this->_tpl_vars['fields']['reports_to_name']['value']; ?>
</span>
<?php endif; ?>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['phone_other']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_OTHER_PHONE','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="phone" field="phone_other" width='37.5%'  class="phone">
<?php if (! $this->_tpl_vars['fields']['phone_other']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['phone_other']['value'] )):  $this->assign('phone_value', $this->_tpl_vars['fields']['phone_other']['value']);  echo smarty_function_sugar_phone(array('value' => $this->_tpl_vars['phone_value'],'usa_format' => '0'), $this);?>

<?php endif;  endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
&nbsp;
</td>
<td class="" type="" field="" width='37.5%'  >
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['phone_fax']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_FAX_PHONE','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="phone" field="phone_fax" width='37.5%'  class="phone">
<?php if (! $this->_tpl_vars['fields']['phone_fax']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['phone_fax']['value'] )):  $this->assign('phone_value', $this->_tpl_vars['fields']['phone_fax']['value']);  echo smarty_function_sugar_phone(array('value' => $this->_tpl_vars['phone_value'],'usa_format' => '0'), $this);?>

<?php endif;  endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['phone_home']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_HOME_PHONE','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="phone" field="phone_home" width='37.5%' colspan='3' class="phone">
<?php if (! $this->_tpl_vars['fields']['phone_home']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['phone_home']['value'] )):  $this->assign('phone_value', $this->_tpl_vars['fields']['phone_home']['value']);  echo smarty_function_sugar_phone(array('value' => $this->_tpl_vars['phone_value'],'usa_format' => '0'), $this);?>

<?php endif;  endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['messenger_type']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_MESSENGER_TYPE','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="enum" field="messenger_type" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['messenger_type']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>



<?php if (is_string ( $this->_tpl_vars['fields']['messenger_type']['options'] )): ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['messenger_type']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['messenger_type']['options']; ?>
">
<?php echo $this->_tpl_vars['fields']['messenger_type']['options']; ?>

<?php else: ?>
<input type="hidden" class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['messenger_type']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['messenger_type']['value']; ?>
">
<?php echo $this->_tpl_vars['fields']['messenger_type']['options'][$this->_tpl_vars['fields']['messenger_type']['value']]; ?>

<?php endif;  endif; ?>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['messenger_id']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_MESSENGER_ID','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="varchar" field="messenger_id" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['messenger_id']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['messenger_id']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['messenger_id']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['messenger_id']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['messenger_id']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['messenger_id']['value']; ?>
</span>
<?php endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['address_street']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ADDRESS_STREET','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="varchar" field="address_street" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['address_street']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['address_street']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['address_street']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['address_street']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['address_street']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['address_street']['value']; ?>
</span>
<?php endif; ?>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['address_city']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ADDRESS_CITY','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="varchar" field="address_city" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['address_city']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['address_city']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['address_city']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['address_city']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['address_city']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['address_city']['value']; ?>
</span>
<?php endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['address_state']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ADDRESS_STATE','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="varchar" field="address_state" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['address_state']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['address_state']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['address_state']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['address_state']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['address_state']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['address_state']['value']; ?>
</span>
<?php endif; ?>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['address_postalcode']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ADDRESS_POSTALCODE','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="varchar" field="address_postalcode" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['address_postalcode']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['address_postalcode']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['address_postalcode']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['address_postalcode']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['address_postalcode']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['address_postalcode']['value']; ?>
</span>
<?php endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['address_country']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ADDRESS_COUNTRY','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="varchar" field="address_country" width='37.5%' colspan='3' >
<?php if (! $this->_tpl_vars['fields']['address_country']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['address_country']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['address_country']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['address_country']['value']);  endif; ?> 
<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['address_country']['name']; ?>
"><?php echo $this->_tpl_vars['fields']['address_country']['value']; ?>
</span>
<?php endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php echo smarty_function_counter(array('name' => 'fieldsHidden','start' => 0,'print' => false,'assign' => 'fieldsHidden'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['description']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="text" field="description" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['description']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fields']['description']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html_entity_decode') : smarty_modifier_escape($_tmp, 'html_entity_decode')))) ? $this->_run_mod_handler('url2html', true, $_tmp) : url2html($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</span>
<?php endif; ?>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td width='12.5%' scope="col">
<?php if (! $this->_tpl_vars['fields']['photo']['hidden']):  ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_PHOTO','module' => 'Users'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<?php endif; ?>
</td>
<td class="" type="image" field="photo" width='37.5%'  >
<?php if (! $this->_tpl_vars['fields']['photo']['hidden']):  echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['photo']['name']; ?>
">
<img src="index.php?entryPoint=download&id=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
_<?php echo $this->_tpl_vars['fields']['photo']['name'];  echo $this->_tpl_vars['fields']['width']['value']; ?>
&type=<?php echo $this->_tpl_vars['module']; ?>
" style="max-width: <?php if (! $this->_tpl_vars['vardef']['width']): ?>160<?php else: ?>200<?php endif; ?>px;" height="<?php if (! $this->_tpl_vars['vardef']['height']): ?>160<?php else: ?>50<?php endif; ?>">
</span>
<?php endif; ?>
</td>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0 && $this->_tpl_vars['fieldsUsed'] != $this->_tpl_vars['fieldsHidden']):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
<script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() { initPanel(3, 'expanded'); }); </script>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EMPLOYEE_INFORMATION").style.display='none';</script>
<?php endif; ?>
</div>
<div id='tabcontent1'  class='yui-hidden'>
<div id="detailpanel_2" class="detail view  detail508 expanded">
<div id="settings">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
<tr>
<th colspan='4' align="left" width="100%" valign="top">
<h4>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_USER_SETTINGS']; ?>
</slot>
</h4>
</th>
</tr>
<tr>
<td scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_RECEIVE_NOTIFICATIONS'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><input class="checkbox" type="checkbox" disabled <?php echo $this->_tpl_vars['RECEIVE_NOTIFICATIONS']; ?>
></slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_RECEIVE_NOTIFICATIONS_TEXT']; ?>
&nbsp;</slot>
</td>
</tr>
<tr>
<td scope="row" valign="top">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_REMINDER'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<!--
<td valign="top" nowrap><slot><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Meetings/tpls/reminders.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></slot></td>
-->
<td valign="top" nowrap>
<slot><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules/Reminders/tpls/remindersDefaults.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_REMINDER_TEXT']; ?>
&nbsp;</slot>
</td>
</tr>
<tr>
<td valign="top" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_MAILMERGE'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td valign="top" nowrap>
<slot><input tabindex='3' name='mailmerge_on' disabled class="checkbox"
type="checkbox" <?php echo $this->_tpl_vars['MAILMERGE_ON']; ?>
></slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_MAILMERGE_TEXT']; ?>
&nbsp;</slot>
</td>
</tr>
<tr>
<td valign="top" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_SETTINGS_URL'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td valign="top" nowrap>
<slot><?php echo $this->_tpl_vars['SETTINGS_URL']; ?>
</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_SETTINGS_URL_DESC']; ?>
&nbsp;</slot>
</td>
</tr>
<tr>
<td scope="row" valign="top">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_EXPORT_DELIMITER'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['EXPORT_DELIMITER']; ?>
</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_DELIMITER_DESC']; ?>
</slot>
</td>
</tr>
<tr>
<td scope="row" valign="top">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_EXPORT_CHARSET'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['EXPORT_CHARSET_DISPLAY']; ?>
</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_EXPORT_CHARSET_DESC']; ?>
</slot>
</td>
</tr>
<tr>
<td scope="row" valign="top">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_USE_REAL_NAMES'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><input tabindex='3' name='use_real_names' disabled class="checkbox"
type="checkbox" <?php echo $this->_tpl_vars['USE_REAL_NAMES']; ?>
></slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_USE_REAL_NAMES_DESC']; ?>
</slot>
</td>
</tr>
<?php if ($this->_tpl_vars['DISPLAY_EXTERNAL_AUTH']): ?>
<tr>
<td scope="row" valign="top">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['EXTERNAL_AUTH_CLASS'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td valign="top" nowrap>
<slot><input id="external_auth_only" name="external_auth_only" type="checkbox"
class="checkbox" <?php echo $this->_tpl_vars['EXTERNAL_AUTH_ONLY_CHECKED']; ?>
></slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_EXTERNAL_AUTH_ONLY']; ?>
 <?php echo $this->_tpl_vars['EXTERNAL_AUTH_CLASS']; ?>
</slot>
</td>
</tr>
<?php endif; ?>
</table>
</div>
<div id='locale'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
<tr>
<th colspan='4' align="left" width="100%" valign="top">
<h4>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_USER_LOCALE']; ?>
</slot>
</h4>
</th>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_DATE_FORMAT'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['DATEFORMAT']; ?>
&nbsp;</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_DATE_FORMAT_TEXT']; ?>
&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_TIME_FORMAT'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['TIMEFORMAT']; ?>
&nbsp;</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_TIME_FORMAT_TEXT']; ?>
&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_TIMEZONE'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td nowrap>
<slot><?php echo $this->_tpl_vars['TIMEZONE']; ?>
&nbsp;</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_ZONE_TEXT']; ?>
&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_CURRENCY'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['CURRENCY_DISPLAY']; ?>
&nbsp;</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_CURRENCY_TEXT']; ?>
&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_CURRENCY_SIG_DIGITS'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['CURRENCY_SIG_DIGITS']; ?>
&nbsp;</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_CURRENCY_SIG_DIGITS_DESC']; ?>
&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_NUMBER_GROUPING_SEP'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['NUM_GRP_SEP']; ?>
&nbsp;</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_NUMBER_GROUPING_SEP_TEXT']; ?>
&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_DECIMAL_SEP'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['DEC_SEP']; ?>
&nbsp;</slot>
</td>
<td>
<slot></slot><?php echo $this->_tpl_vars['MOD']['LBL_DECIMAL_SEP_TEXT']; ?>
&nbsp;</td>
</tr>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_LOCALE_DEFAULT_NAME_FORMAT'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['NAME_FORMAT']; ?>
&nbsp;</slot>
</td>
<td>
<slot></slot><?php echo $this->_tpl_vars['MOD']['LBL_LOCALE_NAME_FORMAT_DESC']; ?>
&nbsp;</td>
</tr>
</table>
</div>
<div id='calendar_options'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
<tr>
<th colspan='4' align="left" width="100%" valign="top">
<h4>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_CALENDAR_OPTIONS']; ?>
</slot>
</h4>
</th>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_PUBLISH_KEY'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td width="20%">
<slot><?php echo $this->_tpl_vars['CALENDAR_PUBLISH_KEY']; ?>
&nbsp;</slot>
</td>
<td width="65%">
<slot><?php echo $this->_tpl_vars['MOD']['LBL_CHOOSE_A_KEY']; ?>
&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot>
<nobr><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_YOUR_PUBLISH_URL'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</nobr>
</slot>
</td>
<td colspan=2><?php if ($this->_tpl_vars['CALENDAR_PUBLISH_KEY']):  echo $this->_tpl_vars['CALENDAR_PUBLISH_URL'];  else:  echo $this->_tpl_vars['MOD']['LBL_NO_KEY'];  endif; ?></td>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_SEARCH_URL'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td colspan=2>
<slot><?php if ($this->_tpl_vars['CALENDAR_PUBLISH_KEY']):  echo $this->_tpl_vars['CALENDAR_SEARCH_URL'];  else:  echo $this->_tpl_vars['MOD']['LBL_NO_KEY'];  endif; ?></slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_ICAL_PUB_URL'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
: <?php echo smarty_function_sugar_help(array('text' => $this->_tpl_vars['MOD']['LBL_ICAL_PUB_URL_HELP']), $this);?>
</slot>
</td>
<td colspan=2>
<slot><?php if ($this->_tpl_vars['CALENDAR_PUBLISH_KEY']):  echo $this->_tpl_vars['CALENDAR_ICAL_URL'];  else:  echo $this->_tpl_vars['MOD']['LBL_NO_KEY'];  endif; ?></slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_FDOW'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['FDOWDISPLAY']; ?>
&nbsp;</slot>
</td>
<td>
<slot></slot><?php echo $this->_tpl_vars['MOD']['LBL_FDOW_TEXT']; ?>
&nbsp;</td>
</tr>
</table>
</div>
<div id='edit_tabs'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
<tr>
<th colspan='4' align="left" width="100%" valign="top">
<h4>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_LAYOUT_OPTIONS']; ?>
</slot>
</h4>
</th>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_USE_GROUP_TABS'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><input class="checkbox" type="checkbox" disabled <?php echo $this->_tpl_vars['USE_GROUP_TABS']; ?>
></slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_NAVIGATION_PARADIGM_DESCRIPTION']; ?>
&nbsp;</slot>
</td>
</tr>
<tr>
<td width="15%" scope="row">
<slot><?php echo ((is_array($_tmp=$this->_tpl_vars['MOD']['LBL_SUBPANEL_TABS'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:</slot>
</td>
<td>
<slot><input class="checkbox" type="checkbox" disabled <?php echo $this->_tpl_vars['SUBPANEL_TABS']; ?>
></slot>
</td>
<td>
<slot><?php echo $this->_tpl_vars['MOD']['LBL_SUBPANEL_TABS_DESCRIPTION']; ?>
&nbsp;</slot>
</td>
</tr>
</table>
</div>
</div>
</div>
<div id='tabcontent2'  class='yui-hidden'>
<div id="detailpanel_3" class="detail view  detail508 expanded">
<div id="advanced">
<TABLE width='100%' class='detail view' border='0' cellpadding=0 cellspacing = 1  ><TR><td style="background: transparent;"></td><td style="text-align: center;" scope="row"><b>Access</b></td><td style="text-align: center;" scope="row"><b>Delete</b></td><td style="text-align: center;" scope="row"><b>Edit</b></td><td style="text-align: center;" scope="row"><b>Export</b></td><td style="text-align: center;" scope="row"><b>Import</b></td><td style="text-align: center;" scope="row"><b>List</b></td><td style="text-align: center;" scope="row"><b>Mass Update</b></td><td style="text-align: center;" scope="row"><b>View</b></td></TR><TR><td nowrap width='1%' scope="row"><b>Activity Count</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Alerts</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Architects</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Architectural Firms</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Bugs</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Calls</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Calls Reschedule</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Campaigns</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Case Events</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Case Updates</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Cases</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Contacts</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Contracts</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Custom Reports</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Customers</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Discount Approval Matrix</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Documents</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>EAPM</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Email Marketing</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Email Templates</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Emails</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Event Participants</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Events</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Events</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b></b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Feed Back Form</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Index</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Index Event</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Invoices</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>KB Categories</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Knowledge Base</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Locations</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Login History</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Login/Logout Audit</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Map Address Cache</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Map Areas</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Map Markers</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Maps</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Meetings</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Notes</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Opportunities</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Outbound Email Accounts</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>PDF Templates</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Process Audit</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Product Categories</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Product Categories Standard</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Products</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Products Standard</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Programs</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Project Holidays</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Project Task Templates</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Project Tasks</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Project Templates</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Projects</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Quote</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Quote Line Items</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Quote PDF</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Quotes Old</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Quotes Standard</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b></b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b></b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Report Builder</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Report Scheduler</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Reports</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Reports Asol</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Reports Log</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Sales Targets</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Schedule History</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Scheduled Reports</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Scheduling Reports</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Security Groups Management</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Showroom Walk in</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Spots</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Target Lists</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Targets</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Tasks</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Tax</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Template Section Line</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Vendor</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Vendors</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>Venue Rooms</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR><TR><td nowrap width='1%' scope="row"><b>WorkFlow</b></td><td  width='12.5%' align='center'><div align='center' class="aclEnabled"><b>Enabled</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td><td  width='12.5%' align='center'><div align='center' class="aclAll"><b>All</b></div></td></TR></TABLE>
</div>
</div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
function(){SUGAR.util.buildAccessKeyLabels();});
</script><script type='text/javascript' src='<?php echo smarty_function_sugar_getjspath(array('file' => 'modules/javascript/popup_helper.js'), $this);?>
'></script>
<script type="text/javascript" src="<?php echo smarty_function_sugar_getjspath(array('file' => 'cache/include/javascript/sugar_grp_yui_widgets.js'), $this);?>
"></script>
<script type="text/javascript">
var Users_detailview_tabs = new YAHOO.widget.TabView("Users_detailview_tabs");
Users_detailview_tabs.selectTab(0);
</script>
<script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
<script type="text/javascript" src="modules/Favorites/favorites.js"></script>
<script type='text/javascript' src='<?php echo smarty_function_sugar_getjspath(array('file' => 'modules/Users/DetailView.js'), $this);?>
'></script>