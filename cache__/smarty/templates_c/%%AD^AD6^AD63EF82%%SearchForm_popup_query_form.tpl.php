<?php /* Smarty version 2.6.29, created on 2019-11-20 15:30:39
         compiled from cache/themes/SuiteR/modules/Arch_Architectural_Firm/SearchForm_popup_query_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'cache/themes/SuiteR/modules/Arch_Architectural_Firm/SearchForm_popup_query_form.tpl', 26, false),array('function', 'math', 'cache/themes/SuiteR/modules/Arch_Architectural_Firm/SearchForm_popup_query_form.tpl', 27, false),array('function', 'sugar_getimagepath', 'cache/themes/SuiteR/modules/Arch_Architectural_Firm/SearchForm_popup_query_form.tpl', 36, false),array('function', 'sugar_translate', 'cache/themes/SuiteR/modules/Arch_Architectural_Firm/SearchForm_popup_query_form.tpl', 46, false),array('function', 'sugar_getimage', 'cache/themes/SuiteR/modules/Arch_Architectural_Firm/SearchForm_popup_query_form.tpl', 128, false),array('function', 'html_options', 'cache/themes/SuiteR/modules/Arch_Architectural_Firm/SearchForm_popup_query_form.tpl', 261, false),array('modifier', 'default', 'cache/themes/SuiteR/modules/Arch_Architectural_Firm/SearchForm_popup_query_form.tpl', 139, false),)), $this); ?>

<script>
    <?php echo '
    $(function () {
        var $dialog = $(\'<div></div>\')
                .html(SUGAR.language.get(\'app_strings\', \'LBL_SEARCH_HELP_TEXT\'))
                .dialog({
                    autoOpen: false,
                    title: SUGAR.language.get(\'app_strings\', \'LBL_SEARCH_HELP_TITLE\'),
                    width: 700
                });

        $(\'.help-search\').click(function () {
            $dialog.dialog(\'open\');
            // prevent the default action, e.g., following a link
        });

    });
    '; ?>

</script>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
                          
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='name_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php if (strlen ( $this->_tpl_vars['fields']['name_advanced']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['name_advanced']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['name_advanced']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name_advanced']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['name_advanced']['name']; ?>
' size='30' 
    maxlength='150' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='9'  >
                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='website_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_WEBSITE','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
	<?php if (! empty ( $this->_tpl_vars['fields']['website_advanced']['value'] )): ?>
	<input type='text' name='<?php echo $this->_tpl_vars['fields']['website_advanced']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['website_advanced']['name']; ?>
' size='30' 
	   maxlength='255' value='<?php echo $this->_tpl_vars['fields']['website_advanced']['value']; ?>
' title='' tabindex=''  >
	<?php else: ?>
	<input type='text' name='<?php echo $this->_tpl_vars['fields']['website_advanced']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['website_advanced']['name']; ?>
' size='30' 
	   maxlength='255'	   	   <?php if ($this->_tpl_vars['displayView'] == 'advanced_search' || $this->_tpl_vars['displayView'] == 'basic_search'): ?>value=''<?php else: ?>value='http://'<?php endif; ?> 
	    title='' tabindex=''  >
	<?php endif; ?>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='date_modified_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_MODIFIED','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<span class="dateTime">
<?php $this->assign('date_value', $this->_tpl_vars['fields']['date_modified_advanced']['value']); ?>
<input class="date_input" autocomplete="off" type="text" name="<?php echo $this->_tpl_vars['fields']['date_modified_advanced']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['date_modified_advanced']['name']; ?>
" value="<?php echo $this->_tpl_vars['date_value']; ?>
" title=''  tabindex=''    size="11" maxlength="10" >
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['fields']['date_modified_advanced']['name']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean();  echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>

</span>
<script type="text/javascript">
Calendar.setup ({
inputField : "<?php echo $this->_tpl_vars['fields']['date_modified_advanced']['name']; ?>
",
form : "popup_query_form",
ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "<?php echo $this->_tpl_vars['fields']['date_modified_advanced']['name']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
startWeekday: <?php echo ((is_array($_tmp=@$this->_tpl_vars['CALENDAR_FDOW'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
,
step : 1,
weekNumbers:false
}
);
</script>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='email_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ANY_EMAIL','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php if (strlen ( $this->_tpl_vars['fields']['email_advanced']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['email_advanced']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['email_advanced']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['email_advanced']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['email_advanced']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      >
                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='date_entered_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_ENTERED','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<span class="dateTime">
<?php $this->assign('date_value', $this->_tpl_vars['fields']['date_entered_advanced']['value']); ?>
<input class="date_input" autocomplete="off" type="text" name="<?php echo $this->_tpl_vars['fields']['date_entered_advanced']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['date_entered_advanced']['name']; ?>
" value="<?php echo $this->_tpl_vars['date_value']; ?>
" title=''  tabindex=''    size="11" maxlength="10" >
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['fields']['date_entered_advanced']['name']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean();  echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>

</span>
<script type="text/javascript">
Calendar.setup ({
inputField : "<?php echo $this->_tpl_vars['fields']['date_entered_advanced']['name']; ?>
",
form : "popup_query_form",
ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "<?php echo $this->_tpl_vars['fields']['date_entered_advanced']['name']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
startWeekday: <?php echo ((is_array($_tmp=@$this->_tpl_vars['CALENDAR_FDOW'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
,
step : 1,
weekNumbers:false
}
);
</script>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='archi_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ARCHI','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php echo smarty_function_html_options(array('id' => 'archi_advanced','name' => 'archi_advanced[]','options' => $this->_tpl_vars['fields']['archi_advanced']['options'],'size' => '6','class' => 'templateGroupChooser','multiple' => '1','selected' => $this->_tpl_vars['fields']['archi_advanced']['value']), $this);?>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='address_city_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CITY','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php if (strlen ( $this->_tpl_vars['fields']['address_city_advanced']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['address_city_advanced']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['address_city_advanced']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['address_city_advanced']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['address_city_advanced']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      >
                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='address_state_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_STATE','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php if (strlen ( $this->_tpl_vars['fields']['address_state_advanced']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['address_state_advanced']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['address_state_advanced']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['address_state_advanced']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['address_state_advanced']['name']; ?>
' size='30' 
     
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      >
                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='assigned_user_id_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php echo smarty_function_html_options(array('id' => 'assigned_user_id_advanced','name' => 'assigned_user_id_advanced[]','options' => $this->_tpl_vars['fields']['assigned_user_id_advanced']['options'],'size' => '6','class' => 'templateGroupChooser','multiple' => '1','selected' => $this->_tpl_vars['fields']['assigned_user_id_advanced']['value']), $this);?>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='pharmaceutical_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PHARMACEUTICAL','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php $this->assign('yes', "");  $this->assign('no', "");  $this->assign('default', ""); ?>

<?php if (strval ( $this->_tpl_vars['fields']['pharmaceutical_advanced']['value'] ) == '1'): ?>
	<?php $this->assign('yes', 'SELECTED');  elseif (strval ( $this->_tpl_vars['fields']['pharmaceutical_advanced']['value'] ) == '0'): ?>
	<?php $this->assign('no', 'SELECTED');  else: ?>
	<?php $this->assign('default', 'SELECTED');  endif; ?>

<select id="<?php echo $this->_tpl_vars['fields']['pharmaceutical_advanced']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['pharmaceutical_advanced']['name']; ?>
"   >
 <option value="" <?php echo $this->_tpl_vars['default']; ?>
></option>
 <option value = "0" <?php echo $this->_tpl_vars['no']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_NO']; ?>
</option>
 <option value = "1" <?php echo $this->_tpl_vars['yes']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_YES']; ?>
</option>
</select>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='educational_institution_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_EDUCATIONAL_INSTITUTION','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php $this->assign('yes', "");  $this->assign('no', "");  $this->assign('default', ""); ?>

<?php if (strval ( $this->_tpl_vars['fields']['educational_institution_advanced']['value'] ) == '1'): ?>
	<?php $this->assign('yes', 'SELECTED');  elseif (strval ( $this->_tpl_vars['fields']['educational_institution_advanced']['value'] ) == '0'): ?>
	<?php $this->assign('no', 'SELECTED');  else: ?>
	<?php $this->assign('default', 'SELECTED');  endif; ?>

<select id="<?php echo $this->_tpl_vars['fields']['educational_institution_advanced']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['educational_institution_advanced']['name']; ?>
"   >
 <option value="" <?php echo $this->_tpl_vars['default']; ?>
></option>
 <option value = "0" <?php echo $this->_tpl_vars['no']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_NO']; ?>
</option>
 <option value = "1" <?php echo $this->_tpl_vars['yes']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_YES']; ?>
</option>
</select>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='hospital_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_HOSPITAL','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php $this->assign('yes', "");  $this->assign('no', "");  $this->assign('default', ""); ?>

<?php if (strval ( $this->_tpl_vars['fields']['hospital_advanced']['value'] ) == '1'): ?>
	<?php $this->assign('yes', 'SELECTED');  elseif (strval ( $this->_tpl_vars['fields']['hospital_advanced']['value'] ) == '0'): ?>
	<?php $this->assign('no', 'SELECTED');  else: ?>
	<?php $this->assign('default', 'SELECTED');  endif; ?>

<select id="<?php echo $this->_tpl_vars['fields']['hospital_advanced']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['hospital_advanced']['name']; ?>
"   >
 <option value="" <?php echo $this->_tpl_vars['default']; ?>
></option>
 <option value = "0" <?php echo $this->_tpl_vars['no']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_NO']; ?>
</option>
 <option value = "1" <?php echo $this->_tpl_vars['yes']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_YES']; ?>
</option>
</select>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='hotels_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_HOTELS','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php $this->assign('yes', "");  $this->assign('no', "");  $this->assign('default', ""); ?>

<?php if (strval ( $this->_tpl_vars['fields']['hotels_advanced']['value'] ) == '1'): ?>
	<?php $this->assign('yes', 'SELECTED');  elseif (strval ( $this->_tpl_vars['fields']['hotels_advanced']['value'] ) == '0'): ?>
	<?php $this->assign('no', 'SELECTED');  else: ?>
	<?php $this->assign('default', 'SELECTED');  endif; ?>

<select id="<?php echo $this->_tpl_vars['fields']['hotels_advanced']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['hotels_advanced']['name']; ?>
"   >
 <option value="" <?php echo $this->_tpl_vars['default']; ?>
></option>
 <option value = "0" <?php echo $this->_tpl_vars['no']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_NO']; ?>
</option>
 <option value = "1" <?php echo $this->_tpl_vars['yes']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_YES']; ?>
</option>
</select>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='residential_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_RESIDENTIAL','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php $this->assign('yes', "");  $this->assign('no', "");  $this->assign('default', ""); ?>

<?php if (strval ( $this->_tpl_vars['fields']['residential_advanced']['value'] ) == '1'): ?>
	<?php $this->assign('yes', 'SELECTED');  elseif (strval ( $this->_tpl_vars['fields']['residential_advanced']['value'] ) == '0'): ?>
	<?php $this->assign('no', 'SELECTED');  else: ?>
	<?php $this->assign('default', 'SELECTED');  endif; ?>

<select id="<?php echo $this->_tpl_vars['fields']['residential_advanced']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['residential_advanced']['name']; ?>
"   >
 <option value="" <?php echo $this->_tpl_vars['default']; ?>
></option>
 <option value = "0" <?php echo $this->_tpl_vars['no']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_NO']; ?>
</option>
 <option value = "1" <?php echo $this->_tpl_vars['yes']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_YES']; ?>
</option>
</select>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='retail_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_RETAIL','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php $this->assign('yes', "");  $this->assign('no', "");  $this->assign('default', ""); ?>

<?php if (strval ( $this->_tpl_vars['fields']['retail_advanced']['value'] ) == '1'): ?>
	<?php $this->assign('yes', 'SELECTED');  elseif (strval ( $this->_tpl_vars['fields']['retail_advanced']['value'] ) == '0'): ?>
	<?php $this->assign('no', 'SELECTED');  else: ?>
	<?php $this->assign('default', 'SELECTED');  endif; ?>

<select id="<?php echo $this->_tpl_vars['fields']['retail_advanced']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['retail_advanced']['name']; ?>
"   >
 <option value="" <?php echo $this->_tpl_vars['default']; ?>
></option>
 <option value = "0" <?php echo $this->_tpl_vars['no']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_NO']; ?>
</option>
 <option value = "1" <?php echo $this->_tpl_vars['yes']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_YES']; ?>
</option>
</select>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='sports_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_SPORTS','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php $this->assign('yes', "");  $this->assign('no', "");  $this->assign('default', ""); ?>

<?php if (strval ( $this->_tpl_vars['fields']['sports_advanced']['value'] ) == '1'): ?>
	<?php $this->assign('yes', 'SELECTED');  elseif (strval ( $this->_tpl_vars['fields']['sports_advanced']['value'] ) == '0'): ?>
	<?php $this->assign('no', 'SELECTED');  else: ?>
	<?php $this->assign('default', 'SELECTED');  endif; ?>

<select id="<?php echo $this->_tpl_vars['fields']['sports_advanced']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['sports_advanced']['name']; ?>
"   >
 <option value="" <?php echo $this->_tpl_vars['default']; ?>
></option>
 <option value = "0" <?php echo $this->_tpl_vars['no']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_NO']; ?>
</option>
 <option value = "1" <?php echo $this->_tpl_vars['yes']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_YES']; ?>
</option>
</select>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='others_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_OTHERS','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php $this->assign('yes', "");  $this->assign('no', "");  $this->assign('default', ""); ?>

<?php if (strval ( $this->_tpl_vars['fields']['others_advanced']['value'] ) == '1'): ?>
	<?php $this->assign('yes', 'SELECTED');  elseif (strval ( $this->_tpl_vars['fields']['others_advanced']['value'] ) == '0'): ?>
	<?php $this->assign('no', 'SELECTED');  else: ?>
	<?php $this->assign('default', 'SELECTED');  endif; ?>

<select id="<?php echo $this->_tpl_vars['fields']['others_advanced']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['others_advanced']['name']; ?>
"   >
 <option value="" <?php echo $this->_tpl_vars['default']; ?>
></option>
 <option value = "0" <?php echo $this->_tpl_vars['no']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_NO']; ?>
</option>
 <option value = "1" <?php echo $this->_tpl_vars['yes']; ?>
> <?php echo $this->_tpl_vars['APP']['LBL_SEARCH_DROPDOWN_YES']; ?>
</option>
</select>

                    </td>
                
          

        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['templateMeta']['maxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['templateMeta']['maxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        <?php if ($this->_tpl_vars['isHelperShown'] == 0): ?>
            <?php $this->assign('isHelperShown', '1'); ?>
            <td class="helpIcon" width="*">
                <img alt="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_HELP_TITLE']; ?>
" id="helper_popup_image" border="0"
                     src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
            </td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='10%'>
                        <label for='current_user_only_advanced'><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CURRENT_USER_FILTER','module' => 'Arch_Architectural_Firm'), $this);?>
</label>
                    </td>
        <td nowrap="nowrap" width='30%'>
                        
<?php if (strval ( $this->_tpl_vars['fields']['current_user_only_advanced']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['current_user_only_advanced']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['current_user_only_advanced']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['current_user_only_advanced']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['current_user_only_advanced']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['current_user_only_advanced']['name']; ?>
" 
value="1" title='' tabindex="" <?php echo $this->_tpl_vars['checked']; ?>
 >
                    </td>
            </tr>
    <tr>
        <td colspan='20'>
            &nbsp;
        </td>
    </tr>
    <?php if ($this->_tpl_vars['DISPLAY_SAVED_SEARCH']): ?>
        <tr>
            <td colspan='2'>
                <a class='tabFormAdvLink' onhover href='javascript:toggleInlineSearch()'>
                    <?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ALT_SHOW_OPTIONS'), $this); $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('alt_show_hide', ob_get_contents());ob_end_clean(); ?>
                    <?php echo smarty_function_sugar_getimage(array('alt' => $this->_tpl_vars['alt_show_hide'],'name' => 'advanced_search','ext' => ".gif",'other_attributes' => 'border="0" id="up_down_img" '), $this);?>

                    &nbsp;<?php echo $this->_tpl_vars['APP']['LNK_SAVED_VIEWS']; ?>

                </a><br>
                <input type='hidden' id='showSSDIV' name='showSSDIV' value='<?php echo $this->_tpl_vars['SHOWSSDIV']; ?>
'>
                <p>
            </td>
            <td scope='row' width='10%' nowrap="nowrap">
		            </td>
            <td width='30%' nowrap>
				            </td>
            <td scope='row' width='10%' nowrap="nowrap">
	                </td>
            <td width='30%' nowrap>
        		
		
				
                <br><span id='curr_search_name'></span>
            </td>
        </tr>
        <tr>
            <td colspan='6'>
                <div style='<?php echo $this->_tpl_vars['DISPLAYSS']; ?>
' id='inlineSavedSearch'>
                    <?php echo $this->_tpl_vars['SAVED_SEARCH']; ?>

                </div>
            </td>
        </tr>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['displayType'] != 'popupView'): ?>
        <tr>
            <td colspan='5'>
        <button tabindex='2' title='<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_TITLE']; ?>
' onclick='SUGAR.savedViews.setChooser()' class='button btn btn-outline-primary' type='submit' name='button'  id='search_form_submit_advanced'><i class="fa fa-search  btn-color-new" aria-hidden="true" ></i></button>&nbsp;
        <button tabindex='2' title='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
'  onclick='SUGAR.searchForm.clear_form(this.form); document.getElementById("saved_search_select").options[0].selected=true; return false;' class='button btn btn-outline-primary' type='button' name='clear' id='search_form_clear
        _advanced' ><i class="fa fa-times  btn-color-new" aria-hidden="true" ></i></button>
        
                
                <?php if ($this->_tpl_vars['DOCUMENTS_MODULE']): ?>
        &nbsp;<input title="<?php echo $this->_tpl_vars['APP']['LBL_BROWSE_DOCUMENTS_BUTTON_TITLE']; ?>
" type="button" class="button" value="<?php echo $this->_tpl_vars['APP']['LBL_BROWSE_DOCUMENTS_BUTTON_LABEL']; ?>
" onclick='open_popup("Documents", 600, 400, "&caller=Documents", true, false, "");' />
                <?php endif; ?>
        <button id="basic_search_link" type="button" class='button btn btn-outline-primary' onclick="SUGAR.searchForm.searchFormSelect('<?php echo $this->_tpl_vars['module']; ?>
|basic_search','<?php echo $this->_tpl_vars['module']; ?>
|advanced_search')"  accesskey="<?php echo $this->_tpl_vars['APP']['LBL_ADV_SEARCH_LNK_KEY']; ?>
" title="<?php echo $this->_tpl_vars['APP']['LNK_BASIC_SEARCH']; ?>
"><i class="fa fa-filter  btn-color-new" aria-hidden="true" ></i>
</button>

		
        <span class='white-space'>
            &nbsp;&nbsp;&nbsp;<?php if ($this->_tpl_vars['SAVED_SEARCHES_OPTIONS']): ?>|&nbsp;&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['APP']['LBL_SAVED_FILTER_SHORTCUT']; ?>
</b>&nbsp;
            <?php echo $this->_tpl_vars['SAVED_SEARCHES_OPTIONS']; ?>
 <?php endif; ?>
            <span id='go_btn_span' style='display:none'><input tabindex='2' title='go_select' id='go_select'  onclick='SUGAR.searchForm.clear_form(this.form);' class='button' type='button' name='go_select' value=' <?php echo $this->_tpl_vars['APP']['LBL_GO_BUTTON_LABEL']; ?>
 '/></span>	
        </span>
        
        
       	<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SAVE_SEARCH_AS','module' => 'SavedSearch'), $this);?>
:
		<input type='text' name='saved_search_name'>
		<input type='hidden' name='search_module' value=''>
		<input type='hidden' name='saved_search_action' value=''>
		<button title='<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
'  class='button btn btn-outline-primary' type='button' name='saved_search_submit' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("save");'><i class="fa fa-floppy-o  btn-color-new" aria-hidden="true" ></i></button>
		
			    
	                <label>Modify current search: </label>

        <button class='button btn btn-outline-primary' onclick='SUGAR.savedViews.setChooser(); return SUGAR.savedViews.saved_search_action("update")'  title='<?php echo $this->_tpl_vars['APP']['LBL_UPDATE']; ?>
' name='ss_update' id='ss_update' type='button' ><i class="fa fa-refresh  btn-color-new" aria-hidden="true" ></i></button>
		<button class='button btn btn-outline-primary' onclick='return SUGAR.savedViews.saved_search_action("delete", "<?php echo smarty_function_sugar_translate(array('label' => 'LBL_DELETE_CONFIRM','module' => 'SavedSearch'), $this);?>
")'  title='<?php echo $this->_tpl_vars['APP']['LBL_DELETE']; ?>
' name='ss_delete' id='ss_delete' type='button'><i class="fa fa-trash  btn-color-new" aria-hidden="true" ></i>
</button>
		
		
				
		<br><span id='curr_search_name'></span>
        
        
        
        
            </td>
            <td class="help">
                <?php if ($this->_tpl_vars['DISPLAY_SEARCH_HELP']): ?>
                    <img border='0' src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
' class="help-search">
                <?php endif; ?>
            </td>
        </tr>
    <?php endif; ?>
</table>

<script>
    <?php echo '
    if (typeof(loadSSL_Scripts) == \'function\') {
        loadSSL_Scripts();
    }
    '; ?>

</script>
<script>
    <?php echo '
    $(document).ready(function () {
        $(\'#basic_search_link\').one("click", function () {
            //alert( "This will be displayed only once." );
            SUGAR.searchForm.searchFormSelect(\'';  echo $this->_tpl_vars['module'];  echo '|basic_search\', \'';  echo $this->_tpl_vars['module'];  echo '|advanced_search\');
        });
    });
    '; ?>

</script><?php echo '<script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'popup_query_form_modified_by_name_advanced\']={"form":"popup_query_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_advanced","modified_user_id_advanced"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'popup_query_form_created_by_name_advanced\']={"form":"popup_query_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_advanced","created_by_advanced"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'popup_query_form_assigned_user_name_advanced\']={"form":"popup_query_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_advanced","assigned_user_id_advanced"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};</script>'; ?>