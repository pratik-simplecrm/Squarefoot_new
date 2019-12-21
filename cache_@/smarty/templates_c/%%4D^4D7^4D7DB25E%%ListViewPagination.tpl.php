<?php /* Smarty version 2.6.29, created on 2019-12-09 09:18:18
         compiled from include/ListView/ListViewPagination.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_action_menu', 'include/ListView/ListViewPagination.tpl', 58, false),array('function', 'sugar_getimage', 'include/ListView/ListViewPagination.tpl', 123, false),)), $this); ?>


<?php $this->assign('alt_start', $this->_tpl_vars['navStrings']['start']);  $this->assign('alt_next', $this->_tpl_vars['navStrings']['next']);  $this->assign('alt_prev', $this->_tpl_vars['navStrings']['previous']);  $this->assign('alt_end', $this->_tpl_vars['navStrings']['end']); ?>

	<tr id='pagination' class="pagination-unique"  role='presentation'>
		<td colspan='<?php if ($this->_tpl_vars['prerow']):  echo $this->_tpl_vars['colCount']+1;  else:  echo $this->_tpl_vars['colCount'];  endif; ?>'>
			<table border='0' cellpadding='0' cellspacing='0' width='100%' class='paginationTable'>
				<tr>
					<td nowrap="nowrap" class='paginationActionButtons'>
						<?php if ($this->_tpl_vars['prerow']): ?>

                        <?php echo smarty_function_sugar_action_menu(array('id' => $this->_tpl_vars['link_select_id'],'params' => $this->_tpl_vars['selectLink']), $this);?>

					
						<?php endif; ?>

						<?php echo smarty_function_sugar_action_menu(array('id' => $this->_tpl_vars['link_action_id'],'params' => $this->_tpl_vars['actionsLink']), $this);?>


                        <?php if ($this->_tpl_vars['actionDisabledLink'] != ""): ?><div class='selectActionsDisabled' id='select_actions_disabled_<?php echo $this->_tpl_vars['action_menu_location']; ?>
'><?php echo $this->_tpl_vars['actionDisabledLink']; ?>
<span class='ab'></span></div>
						
                        <!--To hide advanced search filter icon From : Roshan Sarode--->
												<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'include/ListView/ListViewColumnsFilterLink.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

						    <?php endif; ?>                                           
<!--For List View create,Import button-->                                                
 <!--For hiding Create and Import button to non admin user in employees module by Roshan Sarode 20-03-18 start-->  
<?php 
                                               
global $current_user;
if($current_user->isAdmin()==1 && $_REQUEST['module']=='Employees')
{
 ?>
                                                <button type="button" onclick="window.open('index.php?module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&action=EditView&return_module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&return_action=DetailView', '_blank');" id="create_link"class="btn btn-outline-primary btnbackcolor"  title="Create" >
                                                <i class="fa fa-plus " aria-hidden="true" ></i>
                                                </button>

                                                <button type="button" onclick="window.location='index.php?module=Import&action=Step1&import_module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&return_module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&return_action=index';" id="" class='btn btn-outline-primary btnbackcolor'  title="Import"> <i class="fa fa-download " aria-hidden="true" ></i>
                                                </button>
<?php 

}

else if($_REQUEST['module']!='Employees' && $_REQUEST['module']!='Contacts' && $_REQUEST['module']!='Accounts' && $_REQUEST['module']!='Opportunities' && $_REQUEST['module']!='quote_Quote' && $_REQUEST['module']!='Arch_Architects_Contacts' && $_REQUEST['module']!='Arch_Architectural_Firm'){

  ?>
    <button type="button" onclick="window.open('index.php?module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&action=EditView&return_module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&return_action=DetailView', '_blank');" id="create_link"class="btn btn-outline-primary btnbackcolor"  title="Create" >
                                                <i class="fa fa-plus" aria-hidden="true" ></i>
                                                </button>

   <!--For hiding Create button for contacts, accounts,opportunities and quotes by Anjali Ledade 22-06-2019-->
 
<?php 

}


 ?>
<button type="button" onclick="window.location='index.php?module=Import&action=Step1&import_module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&return_module=<?php echo $this->_tpl_vars['pageData']['bean']['moduleDir']; ?>
&return_action=index';" id="" class='btn btn-outline-primary btnbackcolor'  title="Import"> <i class="fa fa-download " aria-hidden="true" ></i>
                                                </button> 
 <!--For hiding Create and Import button to non admin user in employees module by Roshan Sarode 20-03-18 end-->  
<!--Put import button code outside elseif by Anjali Ledade 22-06-2019-->
                                               
                                                
                                                
					</td>
					    <!--Changes  for listview pagination align center by Roshan Sarode 19-3-18  start  -->
					<td  nowrap='nowrap' class='paginationChangeButtons custom_paginationActionsButtons' width="1%" >
                                                <!--Changes  for listview pagination align center by Roshan Sarode 19-3-18  end -->
						<?php if ($this->_tpl_vars['pageData']['urls']['startPage']): ?>
							<!-- <button type='button' id='listViewStartButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewStartButton' title='<?php echo $this->_tpl_vars['navStrings']['start']; ?>
' class='button' <?php if ($this->_tpl_vars['prerow']): ?>onclick='return sListView.save_checks(0, "<?php echo $this->_tpl_vars['moduleString']; ?>
");'<?php else: ?> onClick='location.href="<?php echo $this->_tpl_vars['pageData']['urls']['startPage']; ?>
"' <?php endif; ?>> -->
							<!-- <i class="fa fa-backward" aria-hidden="true"></i> -->
                               	&nbsp;&nbsp;
								<a id="listViewStartButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
"<?php if ($this->_tpl_vars['prerow']): ?> onclick='return sListView.save_checks(0, "<?php echo $this->_tpl_vars['moduleString']; ?>
");'<?php else: ?> onClick='location.href="<?php echo $this->_tpl_vars['pageData']['urls']['startPage']; ?>
"' <?php endif; ?>>
								<!--<?php echo smarty_function_sugar_getimage(array('name' => 'start','ext' => ".png",'alt' => $this->_tpl_vars['navStrings']['start'],'other_attributes' => 'align="absmiddle" border="0" '), $this);?>
-->

								<i class="fa fa-angle-double-left fa-2x pagination-icon-bottom" aria-hidden="true"></i>

								
								 </a>
								 &nbsp;&nbsp;
							<!-- </button> -->
						<?php else: ?>
							<!-- <button type='button' id='listViewStartButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewStartButton' title='<?php echo $this->_tpl_vars['navStrings']['start']; ?>
' class='button' disabled='disabled'>
							<i class="fa fa-backward" aria-hidden="true"></i> -->
 						    &nbsp;&nbsp;
							<a  id='listViewStartButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' disabled='disabled' style="color:#6d6d6d">
																<i class="fa fa-angle-double-left fa-2x pagination-icon-bottom-disabled" aria-hidden="true"></i>

								 </a>
								 &nbsp;&nbsp;
							<!-- </button> -->
						<?php endif; ?>
						<?php if ($this->_tpl_vars['pageData']['urls']['prevPage']): ?>
							<!-- <button type='button' id='listViewPrevButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewPrevButton' title='<?php echo $this->_tpl_vars['navStrings']['previous']; ?>
' class='button' <?php if ($this->_tpl_vars['prerow']): ?>onclick='return sListView.save_checks(<?php echo $this->_tpl_vars['pageData']['offsets']['prev']; ?>
, "<?php echo $this->_tpl_vars['moduleString']; ?>
")' <?php else: ?> onClick='location.href="<?php echo $this->_tpl_vars['pageData']['urls']['prevPage']; ?>
"'<?php endif; ?>>
							<i class="fa fa-arrow-left" aria-hidden="true"></i> -->
								 &nbsp;&nbsp;
								<a  id='listViewPrevButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' title='<?php echo $this->_tpl_vars['navStrings']['previous']; ?>
' <?php if ($this->_tpl_vars['prerow']): ?>onclick='return sListView.save_checks(<?php echo $this->_tpl_vars['pageData']['offsets']['prev']; ?>
, "<?php echo $this->_tpl_vars['moduleString']; ?>
")' <?php else: ?> onClick='location.href="<?php echo $this->_tpl_vars['pageData']['urls']['prevPage']; ?>
"'<?php endif; ?>>
																<i class="fa fa-angle-left fa-2x pagination-icon-bottom" aria-hidden="true"></i>

								</a>
								 &nbsp;&nbsp;

							<!-- </button> -->
						<?php else: ?>
							<!-- <button type='button' id='listViewPrevButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewPrevButton' class='button' title='<?php echo $this->_tpl_vars['navStrings']['previous']; ?>
' disabled='disabled'>
							<i class="fa fa-arrow-left" aria-hidden="true"></i> -->
								 &nbsp;&nbsp;
								<a id="listViewPrevButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
" title='<?php echo $this->_tpl_vars['navStrings']['previous']; ?>
' disabled='disabled' style="color:#6d6d6d">
																<i class="fa fa-angle-left fa-2x pagination-icon-bottom-disabled" aria-hidden="true"></i>
								</a>
								 &nbsp;&nbsp;

							<!-- </button> -->
						<?php endif; ?>
							<span class='pageNumbers'>(<?php if ($this->_tpl_vars['pageData']['offsets']['lastOffsetOnPage'] == 0): ?>0<?php else:  echo $this->_tpl_vars['pageData']['offsets']['current']+1;  endif; ?> - <?php echo $this->_tpl_vars['pageData']['offsets']['lastOffsetOnPage']; ?>
 <?php echo $this->_tpl_vars['navStrings']['of']; ?>
 <?php if ($this->_tpl_vars['pageData']['offsets']['totalCounted']):  echo $this->_tpl_vars['pageData']['offsets']['total'];  else:  echo $this->_tpl_vars['pageData']['offsets']['total'];  if ($this->_tpl_vars['pageData']['offsets']['lastOffsetOnPage'] != $this->_tpl_vars['pageData']['offsets']['total']): ?>+<?php endif;  endif; ?>)</span>
						<?php if ($this->_tpl_vars['pageData']['urls']['nextPage']): ?>
							<!-- <button type='button' id='listViewNextButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewNextButton' title='<?php echo $this->_tpl_vars['navStrings']['next']; ?>
' class='button' <?php if ($this->_tpl_vars['prerow']): ?>onclick='return sListView.save_checks(<?php echo $this->_tpl_vars['pageData']['offsets']['next']; ?>
, "<?php echo $this->_tpl_vars['moduleString']; ?>
")' <?php else: ?> onClick='location.href="<?php echo $this->_tpl_vars['pageData']['urls']['nextPage']; ?>
"'<?php endif; ?>>

							<i class="fa fa-arrow-right pagination-icon-bottom" aria-hidden="true"></i> -->
								 &nbsp;&nbsp;
								<a id="listViewNextButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
" <?php if ($this->_tpl_vars['prerow']): ?>onclick='return sListView.save_checks(<?php echo $this->_tpl_vars['pageData']['offsets']['next']; ?>
, "<?php echo $this->_tpl_vars['moduleString']; ?>
")' <?php else: ?> onClick='location.href="<?php echo $this->_tpl_vars['pageData']['urls']['nextPage']; ?>
"'<?php endif; ?>>
																<i class="fa fa-angle-right fa-2x pagination-icon-bottom" aria-hidden="true"></i>
								</a>
								 &nbsp;&nbsp;								
							<!-- </button> -->
						<?php else: ?>


							<!-- <button type='button' id='listViewNextButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewNextButton' class='button' title='<?php echo $this->_tpl_vars['navStrings']['next']; ?>
' disabled='disabled'>
							<i class="fa fa-arrow-right pagination-icon-bottom" aria-hidden="true"></i> -->
								 &nbsp;&nbsp;
								<a id="listViewNextButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
" title='<?php echo $this->_tpl_vars['navStrings']['next']; ?>
' disabled='disabled' style="color:#6d6d6d">
																<i class='fa fa-angle-right fa-2x pagination-icon-bottom-disabled' aria-hidden='true'></i>
								</a>
								 &nbsp;&nbsp;
							<!-- </button> -->
						<?php endif; ?>
						<?php if ($this->_tpl_vars['pageData']['urls']['endPage'] && $this->_tpl_vars['pageData']['offsets']['total'] != $this->_tpl_vars['pageData']['offsets']['lastOffsetOnPage']): ?>

							<!-- <button type='button' id='listViewEndButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewEndButton' title='<?php echo $this->_tpl_vars['navStrings']['end']; ?>
' class='button' <?php if ($this->_tpl_vars['prerow']): ?>onclick='return sListView.save_checks("end", "<?php echo $this->_tpl_vars['moduleString']; ?>
")' <?php else: ?> onClick='location.href="<?php echo $this->_tpl_vars['pageData']['urls']['endPage']; ?>
"'<?php endif; ?>>
								<i class="fa fa-forward" aria-hidden="true"></i> -->
								 &nbsp;&nbsp;
								<a id="listViewEndButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
" <?php if ($this->_tpl_vars['prerow']): ?>onclick='return sListView.save_checks("end", "<?php echo $this->_tpl_vars['moduleString']; ?>
")' <?php else: ?> onClick='location.href="<?php echo $this->_tpl_vars['pageData']['urls']['endPage']; ?>
"'<?php endif; ?>>
																<i class="fa fa-angle-double-right fa-2x pagination-icon-bottom" aria-hidden="true"></i>

								</a>
								 &nbsp;&nbsp;								
							<!-- </button> -->
						<?php elseif (! $this->_tpl_vars['pageData']['offsets']['totalCounted'] || $this->_tpl_vars['pageData']['offsets']['total'] == $this->_tpl_vars['pageData']['offsets']['lastOffsetOnPage']): ?>

							<!-- <button type='button' id='listViewEndButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewEndButton' title='<?php echo $this->_tpl_vars['navStrings']['end']; ?>
' class='button' disabled='disabled'>
							<i class="fa fa-forward" aria-hidden="true"></i> -->
							&nbsp;&nbsp;							
							<a id="listViewEndButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
" disabled='disabled' title='<?php echo $this->_tpl_vars['navStrings']['end']; ?>
' style="color:#6d6d6d">
							 								 	<i class="fa fa-angle-double-right fa-2x pagination-icon-bottom-disabled" aria-hidden="true"></i>

							 	</a>
								 &nbsp;&nbsp;							
							<!-- </button> -->
						<?php endif; ?>
					</td>
					<td nowrap='nowrap' width="4px" class="paginationActionButtons"></td>
				</tr>
			</table>
		</td>
	</tr>