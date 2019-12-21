<?php /* Smarty version 2.6.29, created on 2019-11-20 11:02:06
         compiled from cache/themes/SuiteR/modules/Cases/SearchForm_basic.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'cache/themes/SuiteR/modules/Cases/SearchForm_basic.tpl', 34, false),array('function', 'math', 'cache/themes/SuiteR/modules/Cases/SearchForm_basic.tpl', 35, false),array('function', 'sugar_translate', 'cache/themes/SuiteR/modules/Cases/SearchForm_basic.tpl', 44, false),array('function', 'sugar_getimagepath', 'cache/themes/SuiteR/modules/Cases/SearchForm_basic.tpl', 176, false),array('modifier', 'count', 'cache/themes/SuiteR/modules/Cases/SearchForm_basic.tpl', 147, false),)), $this); ?>

<input type='hidden' id="orderByInput" name='orderBy' value=''/>
<input type='hidden' id="sortOrder" name='sortOrder' value=''/>
<?php if (! isset ( $this->_tpl_vars['templateMeta']['maxColumnsBasic'] )): ?>
    <?php $this->assign('basicMaxColumns', $this->_tpl_vars['templateMeta']['maxColumns']);  else: ?>
    <?php $this->assign('basicMaxColumns', $this->_tpl_vars['templateMeta']['maxColumnsBasic']);  endif; ?>
<script>
    <?php echo '
    $(function () {
        var $dialog = $(\'<div></div>\')
                .html(SUGAR.language.get(\'app_strings\', \'LBL_SEARCH_HELP_TEXT\'))
                .dialog({
                    autoOpen: false,
                    title: SUGAR.language.get(\'app_strings\', \'LBL_HELP\'),
                    width: 700
                });

        $(\'#filterHelp\').click(function () {
            $dialog.dialog(\'open\');
            // prevent the default action, e.g., following a link
        });

    });
    '; ?>

</script>


<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
                          
          
        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        </tr><tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='1%' >
                        <label for='name_basic'> <?php echo smarty_function_sugar_translate(array('label' => 'LBL_SUBJECT','module' => 'Cases'), $this);?>

                        </td>


        <td  nowrap="nowrap" width='1%'>
                        
<?php if (strlen ( $this->_tpl_vars['fields']['name_basic']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['name_basic']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['name_basic']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name_basic']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['name_basic']['name']; ?>
' size='30' 
    maxlength='255' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='9'  >
                    </td>
                
          
        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        </tr><tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='1%' >
            	
            <label for='current_user_only_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CURRENT_USER_FILTER','module' => 'Cases'), $this);?>
</label>
                    </td>


        <td  nowrap="nowrap" width='1%'>
                        
<?php if (strval ( $this->_tpl_vars['fields']['current_user_only_basic']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['current_user_only_basic']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['current_user_only_basic']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['current_user_only_basic']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['current_user_only_basic']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['current_user_only_basic']['name']; ?>
" 
value="1" title='' tabindex="" <?php echo $this->_tpl_vars['checked']; ?>
 >
                    </td>
                
          
        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        </tr><tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='1%' >
            	
            <label for='open_only_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_OPEN_ITEMS','module' => 'Cases'), $this);?>
</label>
                    </td>


        <td  nowrap="nowrap" width='1%'>
                        
<?php if (strval ( $this->_tpl_vars['fields']['open_only_basic']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['open_only_basic']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['open_only_basic']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['open_only_basic']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['open_only_basic']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['open_only_basic']['name']; ?>
" 
value="1" title='' tabindex="" <?php echo $this->_tpl_vars['checked']; ?>
 >
                    </td>
                
          
        <?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

        <?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

        <?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
        </tr><tr>
        <?php endif; ?>

        <td scope="row" nowrap="nowrap" width='1%' >
            	
            <label for='favorites_only_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_FAVORITES_FILTER','module' => 'Cases'), $this);?>
</label>
                    </td>


        <td  nowrap="nowrap" width='1%'>
                        
<?php if (strval ( $this->_tpl_vars['fields']['favorites_only_basic']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['favorites_only_basic']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['favorites_only_basic']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"');  else:  $this->assign('checked', "");  endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['favorites_only_basic']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['favorites_only_basic']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['favorites_only_basic']['name']; ?>
" 
value="1" title='' tabindex="" <?php echo $this->_tpl_vars['checked']; ?>
 >
                    </td>
                <?php if (count($this->_tpl_vars['formData']) >= $this->_tpl_vars['basicMaxColumns']+1): ?>
        </tr>
        <tr>
            <td colspan="<?php echo $this->_tpl_vars['searchTableColumnCount']; ?>
">
            <?php else: ?>
            <td class="sumbitButtons">
            <?php endif; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button tabindex="2" title="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_TITLE']; ?>
" onclick="SUGAR.savedViews.setChooser();" class="btn btn-outline-primary" type="submit" name="button" id="search_form_submit"/><i class="fa fa-search btn-color-new" aria-hidden="true" ></i></button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" tabindex='2'  title='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
' onclick='SUGAR.searchForm.clear_form(this.form);
                    return false;' class='btn button btn-outline-primary' type='button' name='clear' id='search_form_clear' value='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
'/><i class="fa fa-times btn-color-new" aria-hidden="true" ></i>

            </button> 
            <?php if ($this->_tpl_vars['HAS_ADVANCED_SEARCH']): ?>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" id="advanced_search_link" class="btn button btn-outline-primary"  onclick="SUGAR.searchForm.searchFormSelect('<?php echo $this->_tpl_vars['module']; ?>
|advanced_search', '<?php echo $this->_tpl_vars['module']; ?>
|basic_search')" accesskey="<?php echo $this->_tpl_vars['APP']['LBL_ADV_SEARCH_LNK_KEY']; ?>
" title="<?php echo $this->_tpl_vars['APP']['LNK_ADVANCED_SEARCH']; ?>
" ><i class="fa fa-filter  btn-color-new" aria-hidden="true" ></i>
                </button>
            <?php endif; ?>

            
        </td>
        <td class="helpIcon" width="*"><img alt="Help" border='0' id="filterHelp" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
'></td>
    </tr>
</table>
<script>
    <?php echo '
            $(document).ready(function () {
                $(\'#advanced_search_link\').one("click", function () {
                    //alert( "This will be displayed only once." );
                    SUGAR.searchForm.searchFormSelect(\'';  echo $this->_tpl_vars['module'];  echo '|advanced_search\', \'';  echo $this->_tpl_vars['module'];  echo '|basic_search\');
                });
            });
    '; ?>

</script><?php echo '<script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'search_form_modified_by_name_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_basic","modified_user_id_basic"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_created_by_name_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_basic","created_by_basic"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_assigned_user_name_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_basic","assigned_user_id_basic"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_account_name_basic\']={"form":"search_form","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["search_form_account_name_basic","account_id_basic"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["account_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_contact_created_by_name_basic\']={"form":"search_form","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","first_name","last_name","id"],"populate_list":["contact_created_by_name_basic","contact_created_by_id_basic","contact_created_by_id_basic","contact_created_by_id_basic"],"required_list":["contact_created_by_id"],"group":"or","conditions":[{"name":"first_name","op":"like_custom","end":"%","value":""},{"name":"last_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_contractor_c_basic\']={"form":"search_form","method":"query","modules":["scrm_Vendors"],"group":"or","field_list":["name","id"],"populate_list":["contractor_c_basic","scrm_vendors_id_c_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_supervisor_c_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["supervisor_c_basic","user_id_c_basic"],"required_list":["user_id_c"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_opportunities_cases_1_name_basic\']={"form":"search_form","method":"query","modules":["Opportunities"],"group":"or","field_list":["name","id"],"populate_list":["opportunities_cases_1_name_basic","opportunities_cases_1opportunities_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_warehouse_person_c_basic\']={"form":"search_form","method":"query","modules":["scrm_Warehouse_Person"],"group":"or","field_list":["name","id"],"populate_list":["warehouse_person_c_basic","scrm_warehouse_person_id_c_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_salesperson_c_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["salesperson_c_basic","user_id1_c_basic"],"required_list":["user_id1_c"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_salescoordinator_c_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["salescoordinator_c_basic","user_id2_c_basic"],"required_list":["user_id2_c"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};</script>'; ?>