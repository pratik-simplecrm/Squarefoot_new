<?php /* Smarty version 2.6.29, created on 2019-11-20 10:11:53
         compiled from modules/Users/tpls/DetailView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'modules/Users/tpls/DetailView.tpl', 50, false),array('function', 'sugar_evalcolumn', 'modules/Users/tpls/DetailView.tpl', 176, false),array('function', 'sugar_field', 'modules/Users/tpls/DetailView.tpl', 181, false),array('modifier', 'upper', 'modules/Users/tpls/DetailView.tpl', 53, false),array('modifier', 'count', 'modules/Users/tpls/DetailView.tpl', 130, false),)), $this); ?>
{*
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2017 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */
*}
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['headerTpl'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
{sugar_include include=$includes}
<div id="<?php echo $this->_tpl_vars['module']; ?>
_detailview_tabs"
<?php if ($this->_tpl_vars['useTabs']): ?>
class="yui-navset detailview_tabs"
<?php endif; ?>
>
    <?php if ($this->_tpl_vars['useTabs']): ?>
    {* Generate the Tab headers *}
    <?php echo smarty_function_counter(array('name' => 'tabCount','start' => -1,'print' => false,'assign' => 'tabCount'), $this);?>

    <ul class="yui-nav">
    <?php $_from = $this->_tpl_vars['sectionPanels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['section'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['section']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['panel']):
        $this->_foreach['section']['iteration']++;
?>
        <?php ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp));  $this->_smarty_vars['capture']['label_upper'] = ob_get_contents();  $this->assign('label_upper', ob_get_contents());ob_end_clean(); ?>
        {* override from tab definitions *}
        <?php if (( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == true )): ?>
            <?php echo smarty_function_counter(array('name' => 'tabCount','print' => false), $this);?>

            <li><a id="tab<?php echo $this->_tpl_vars['tabCount']; ?>
" href="javascript:void(0)"><em>{sugar_translate label='<?php echo $this->_tpl_vars['label']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}</em></a></li>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
        <?php echo smarty_function_counter(array('name' => 'tabCount','print' => false), $this);?>

        <li {if $IS_GROUP_OR_PORTAL}style="display: none;"{/if}>
            <a id="tab<?php echo $this->_tpl_vars['tabCount']; ?>
" href="javascript:void(0)"><em>{$MOD.LBL_ADVANCED}</em></a>
        </li>
        <?php echo smarty_function_counter(array('name' => 'tabCount','print' => false), $this);?>

        {if $SHOW_ROLES}
            <li>
                <a id="tab<?php echo $this->_tpl_vars['tabCount']; ?>
" href="javascript:void(0)"><em>{$MOD.LBL_USER_ACCESS}</em></a>
            </li>
        {/if}
    </ul>
    <?php endif; ?>
    <div <?php if ($this->_tpl_vars['useTabs']): ?>class="yui-content"<?php endif; ?>>
<?php echo smarty_function_counter(array('name' => 'panelCount','print' => false,'start' => 0,'assign' => 'panelCount'), $this);?>

<?php echo smarty_function_counter(array('name' => 'tabCount','start' => -1,'print' => false,'assign' => 'tabCount'), $this);?>

<?php $_from = $this->_tpl_vars['sectionPanels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['section'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['section']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['label'] => $this->_tpl_vars['panel']):
        $this->_foreach['section']['iteration']++;
 $this->assign('panel_id', $this->_tpl_vars['panelCount']);  ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp));  $this->_smarty_vars['capture']['label_upper'] = ob_get_contents();  $this->assign('label_upper', ob_get_contents());ob_end_clean(); ?>
  <?php if (( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == true )): ?>
    <?php echo smarty_function_counter(array('name' => 'tabCount','print' => false), $this);?>

    <?php if ($this->_tpl_vars['tabCount'] != 0): ?></div><?php endif; ?>
    <div id='tabcontent<?php echo $this->_tpl_vars['tabCount']; ?>
' <?php if ($this->_tpl_vars['tabCount'] != 0): ?> class='yui-hidden'<?php endif; ?>>
  <?php endif; ?>

    <?php if (( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['panelDefault'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['panelDefault'] == 'collapsed' && isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == false )): ?>
        <?php $this->assign('panelState', $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['panelDefault']); ?>
    <?php else: ?>
        <?php $this->assign('panelState', 'expanded'); ?>
    <?php endif; ?>
<div id='detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
' class='detail view  detail508 <?php echo $this->_tpl_vars['panelState']; ?>
'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}

<?php if (! is_array ( $this->_tpl_vars['panel'] )): ?>
    {sugar_include type='php' file='<?php echo $this->_tpl_vars['panel']; ?>
'}
<?php else: ?>

    <?php if (! empty ( $this->_tpl_vars['label'] ) && ! is_int ( $this->_tpl_vars['label'] ) && $this->_tpl_vars['label'] != 'DEFAULT' && ( ! isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) || ( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == false ) )): ?>
    <h4>
      <a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel(<?php echo $this->_foreach['section']['iteration']; ?>
);">
      <img border="0" id="detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
      <a href="javascript:void(0)" class="expandLink" onclick="expandPanel(<?php echo $this->_foreach['section']['iteration']; ?>
);">
      <img border="0" id="detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
      {sugar_translate label='<?php echo $this->_tpl_vars['label']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}
    <?php if (isset ( $this->_tpl_vars['panelState'] ) && $this->_tpl_vars['panelState'] == 'collapsed'): ?>
    <script>
      document.getElementById('detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
').className += ' collapsed';
    </script>
    <?php else: ?>
    <script>
      document.getElementById('detailpanel_<?php echo $this->_foreach['section']['iteration']; ?>
').className += ' expanded';
    </script>
    <?php endif; ?>
    </h4>

    <?php endif; ?>
		<!-- PANEL CONTAINER HERE.. -->
  <table id='<?php echo $this->_tpl_vars['label']; ?>
' class="panelContainer" cellspacing='{$gridline}'>



	<?php $_from = $this->_tpl_vars['panel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rowIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rowIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row'] => $this->_tpl_vars['rowData']):
        $this->_foreach['rowIteration']['iteration']++;
?>
	{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
	{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
	{capture name="tr" assign="tableRow"}
	<tr>
		<?php $this->assign('columnsInRow', count($this->_tpl_vars['rowData'])); ?>
		<?php $this->assign('columnsUsed', 0); ?>
		<?php $_from = $this->_tpl_vars['rowData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['colIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['colIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['colData']):
        $this->_foreach['colIteration']['iteration']++;
?>
	    <?php if (! empty ( $this->_tpl_vars['colData']['field']['hideIf'] )): ?>
	    	{if !(<?php echo $this->_tpl_vars['colData']['field']['hideIf']; ?>
) }
	    <?php endif; ?>
			{counter name="fieldsUsed"}
			<?php if (empty ( $this->_tpl_vars['colData']['field']['hideLabel'] )): ?>
			<td width='<?php echo $this->_tpl_vars['def']['templateMeta']['widths'][($this->_foreach['colIteration']['iteration']-1)]['label']; ?>
%' scope="col">
				<?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
				    {if !$fields.<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
.hidden}
                <?php endif; ?>
				<?php if (isset ( $this->_tpl_vars['colData']['field']['customLabel'] )): ?>
			       <?php echo $this->_tpl_vars['colData']['field']['customLabel']; ?>

				<?php elseif (isset ( $this->_tpl_vars['colData']['field']['label'] ) && strpos ( $this->_tpl_vars['colData']['field']['label'] , '$' )): ?>
				   {capture name="label" assign="label"}<?php echo $this->_tpl_vars['colData']['field']['label']; ?>
{/capture}
			       {$label|strip_semicolon}:
				<?php elseif (isset ( $this->_tpl_vars['colData']['field']['label'] )): ?>
				   {capture name="label" assign="label"}{sugar_translate label='<?php echo $this->_tpl_vars['colData']['field']['label']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
			       {$label|strip_semicolon}:
				<?php elseif (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] )): ?>
				   {capture name="label" assign="label"}{sugar_translate label='<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['vname']; ?>
' module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
			       {$label|strip_semicolon}:
				<?php else: ?>
				   &nbsp;
				<?php endif; ?>
                <?php if (isset ( $this->_tpl_vars['colData']['field']['popupHelp'] ) || isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] ) && isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['popupHelp'] )): ?>
                   <?php if (isset ( $this->_tpl_vars['colData']['field']['popupHelp'] )): ?>
                     {capture name="popupText" assign="popupText"}{sugar_translate label="<?php echo $this->_tpl_vars['colData']['field']['popupHelp']; ?>
" module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
                   <?php elseif (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['popupHelp'] )): ?>
                     {capture name="popupText" assign="popupText"}{sugar_translate label="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['popupHelp']; ?>
" module='<?php echo $this->_tpl_vars['module']; ?>
'}{/capture}
                   <?php endif; ?>
                   {sugar_help text=$popupText WIDTH=400}
                <?php endif; ?>
                <?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
                {/if}
                <?php endif; ?>
                <?php endif; ?>
			</td>
			<td class="<?php if ($this->_tpl_vars['inline_edit'] && ! empty ( $this->_tpl_vars['colData']['field']['name'] ) && ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] == 1 || ! isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] ) )): ?>inlineEdit<?php endif; ?>" type="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type']; ?>
" field="<?php echo $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['name']; ?>
" width='<?php echo $this->_tpl_vars['def']['templateMeta']['widths'][($this->_foreach['colIteration']['iteration']-1)]['field']; ?>
%' <?php if ($this->_tpl_vars['colData']['colspan']): ?>colspan='<?php echo $this->_tpl_vars['colData']['colspan']; ?>
'<?php endif; ?> <?php if (isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type'] ) && $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['type'] == 'phone'): ?>class="phone"<?php endif; ?>>
			    <?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
			    {if !$fields.<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
.hidden}
			    <?php endif; ?>
				<?php echo $this->_tpl_vars['colData']['field']['prefix']; ?>

				<?php if (( $this->_tpl_vars['colData']['field']['customCode'] && ! $this->_tpl_vars['colData']['field']['customCodeRenderField'] ) || $this->_tpl_vars['colData']['field']['assign']): ?>
					{counter name="panelFieldCount"}
					<span id="<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
" class="sugar_field"><?php echo smarty_function_sugar_evalcolumn(array('var' => $this->_tpl_vars['colData']['field'],'colData' => $this->_tpl_vars['colData']), $this);?>
</span>
				<?php elseif ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']] && ! empty ( $this->_tpl_vars['colData']['field']['fields'] )): ?>
				    <?php $_from = $this->_tpl_vars['colData']['field']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subField']):
?>
				        <?php if ($this->_tpl_vars['fields'][$this->_tpl_vars['subField']]): ?>
				        	{counter name="panelFieldCount"}
				            <?php echo smarty_function_sugar_field(array('parentFieldArray' => 'fields','tabindex' => $this->_tpl_vars['tabIndex'],'vardef' => $this->_tpl_vars['fields'][$this->_tpl_vars['subField']],'displayType' => 'DetailView'), $this);?>
&nbsp;

				        <?php else: ?>
				        	{counter name="panelFieldCount"}
				            <?php echo $this->_tpl_vars['subField']; ?>

				        <?php endif; ?>
				    <?php endforeach; endif; unset($_from); ?>
				<?php elseif ($this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]): ?>
					{counter name="panelFieldCount"}
					<?php echo smarty_function_sugar_field(array('parentFieldArray' => 'fields','vardef' => $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']],'displayType' => 'DetailView','displayParams' => $this->_tpl_vars['colData']['field']['displayParams'],'typeOverride' => $this->_tpl_vars['colData']['field']['type']), $this);?>


				<?php endif; ?>
				<?php if (! empty ( $this->_tpl_vars['colData']['field']['customCode'] ) && $this->_tpl_vars['colData']['field']['customCodeRenderField']): ?>
				    {counter name="panelFieldCount"}
				    <span id="<?php echo $this->_tpl_vars['colData']['field']['name']; ?>
" class="sugar_field"><?php echo smarty_function_sugar_evalcolumn(array('var' => $this->_tpl_vars['colData']['field'],'colData' => $this->_tpl_vars['colData']), $this);?>
</span>
                <?php endif; ?>
				<?php echo $this->_tpl_vars['colData']['field']['suffix']; ?>

				<?php if (! empty ( $this->_tpl_vars['colData']['field']['name'] )): ?>
				{/if}
				<?php endif; ?>

				<?php if ($this->_tpl_vars['inline_edit'] && ! empty ( $this->_tpl_vars['colData']['field']['name'] ) && ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] == 1 || ! isset ( $this->_tpl_vars['fields'][$this->_tpl_vars['colData']['field']['name']]['inline_edit'] ) )): ?><div class="inlineEditIcon"> {sugar_getimage name="inline_edit_icon.svg" attr='border="0" ' alt="$alt_edit"}</div><?php endif; ?>
			</td>
	    <?php if (! empty ( $this->_tpl_vars['colData']['field']['hideIf'] )): ?>
			{else}

			<td>&nbsp;</td><td>&nbsp;</td>
			{/if}
	    <?php endif; ?>

		<?php endforeach; endif; unset($_from); ?>
	</tr>
	{/capture}
	{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
	{$tableRow}
	{/if}
	<?php endforeach; endif; unset($_from); ?>
	</table>
    <?php if (! empty ( $this->_tpl_vars['label'] ) && ! is_int ( $this->_tpl_vars['label'] ) && $this->_tpl_vars['label'] != 'DEFAULT' && ( ! isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) || ( isset ( $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] ) && $this->_tpl_vars['tabDefs'][$this->_tpl_vars['label_upper']]['newTab'] == false ) )): ?>
    <script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function() {ldelim} initPanel(<?php echo $this->_foreach['section']['iteration']; ?>
, '<?php echo $this->_tpl_vars['panelState']; ?>
'); {rdelim}); </script>
    <?php endif;  endif; ?>
</div>

{if $panelFieldCount == 0}

<script>document.getElementById("<?php echo $this->_tpl_vars['label']; ?>
").style.display='none';</script>
{/if}
<?php endforeach; endif; unset($_from);  if ($this->_tpl_vars['useTabs']): ?>
  </div>
<?php endif; ?>
 <?php echo smarty_function_counter(array('name' => 'tabCount','print' => false), $this);?>

    <div id='tabcontent<?php echo $this->_tpl_vars['tabCount']; ?>
' <?php if ($this->_tpl_vars['tabCount'] != 0): ?> class='yui-hidden'<?php endif; ?>>
        <div id="detailpanel_<?php echo $this->_tpl_vars['tabCount']+1; ?>
" class="detail view  detail508 expanded">
            <div id="settings">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
                    <tr>
                        <th colspan='4' align="left" width="100%" valign="top">
                            <h4>
                                <slot>{$MOD.LBL_USER_SETTINGS}</slot>
                            </h4>
                        </th>
                    </tr>
                    <tr>
                        <td scope="row">
                            <slot>{$MOD.LBL_RECEIVE_NOTIFICATIONS|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot><input class="checkbox" type="checkbox" disabled {$RECEIVE_NOTIFICATIONS}></slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_RECEIVE_NOTIFICATIONS_TEXT}&nbsp;</slot>
                        </td>
                    </tr>

                    <tr>
                        <td scope="row" valign="top">
                            <slot>{$MOD.LBL_REMINDER|strip_semicolon}:
                        </td>
                        <!--
                    <td valign="top" nowrap><slot>{include file="modules/Meetings/tpls/reminders.tpl"}</slot></td>
                    -->
                        <td valign="top" nowrap>
                            <slot>{include file="modules/Reminders/tpls/remindersDefaults.tpl"}</slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_REMINDER_TEXT}&nbsp;</slot>
                        </td>

                    </tr>

                    <tr>
                        <td valign="top" scope="row">
                            <slot>{$MOD.LBL_MAILMERGE|strip_semicolon}:</slot>
                        </td>
                        <td valign="top" nowrap>
                            <slot><input tabindex='3' name='mailmerge_on' disabled class="checkbox"
                                         type="checkbox" {$MAILMERGE_ON}></slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_MAILMERGE_TEXT}&nbsp;</slot>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" scope="row">
                            <slot>{$MOD.LBL_SETTINGS_URL|strip_semicolon}:</slot>
                        </td>
                        <td valign="top" nowrap>
                            <slot>{$SETTINGS_URL}</slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_SETTINGS_URL_DESC}&nbsp;</slot>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" valign="top">
                            <slot>{$MOD.LBL_EXPORT_DELIMITER|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot>{$EXPORT_DELIMITER}</slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_EXPORT_DELIMITER_DESC}</slot>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" valign="top">
                            <slot>{$MOD.LBL_EXPORT_CHARSET|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot>{$EXPORT_CHARSET_DISPLAY}</slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_EXPORT_CHARSET_DESC}</slot>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" valign="top">
                            <slot>{$MOD.LBL_USE_REAL_NAMES|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot><input tabindex='3' name='use_real_names' disabled class="checkbox"
                                         type="checkbox" {$USE_REAL_NAMES}></slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_USE_REAL_NAMES_DESC}</slot>
                        </td>
                    </tr>
                    {if $DISPLAY_EXTERNAL_AUTH}
                        <tr>
                            <td scope="row" valign="top">
                                <slot>{$EXTERNAL_AUTH_CLASS|strip_semicolon}:</slot>
                            </td>
                            <td valign="top" nowrap>
                                <slot><input id="external_auth_only" name="external_auth_only" type="checkbox"
                                             class="checkbox" {$EXTERNAL_AUTH_ONLY_CHECKED}></slot>
                            </td>
                            <td>
                                <slot>{$MOD.LBL_EXTERNAL_AUTH_ONLY} {$EXTERNAL_AUTH_CLASS}</slot>
                            </td>
                        </tr>
                    {/if}
                </table>
            </div>
            <div id='locale'>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
                    <tr>
                        <th colspan='4' align="left" width="100%" valign="top">
                            <h4>
                                <slot>{$MOD.LBL_USER_LOCALE}</slot>
                            </h4>
                        </th>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_DATE_FORMAT|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot>{$DATEFORMAT}&nbsp;</slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_DATE_FORMAT_TEXT}&nbsp;</slot>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_TIME_FORMAT|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot>{$TIMEFORMAT}&nbsp;</slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_TIME_FORMAT_TEXT}&nbsp;</slot>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_TIMEZONE|strip_semicolon}:</slot>
                        </td>
                        <td nowrap>
                            <slot>{$TIMEZONE}&nbsp;</slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_ZONE_TEXT}&nbsp;</slot>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_CURRENCY|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot>{$CURRENCY_DISPLAY}&nbsp;</slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_CURRENCY_TEXT}&nbsp;</slot>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_CURRENCY_SIG_DIGITS|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot>{$CURRENCY_SIG_DIGITS}&nbsp;</slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_CURRENCY_SIG_DIGITS_DESC}&nbsp;</slot>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_NUMBER_GROUPING_SEP|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot>{$NUM_GRP_SEP}&nbsp;</slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_NUMBER_GROUPING_SEP_TEXT}&nbsp;</slot>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_DECIMAL_SEP|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot>{$DEC_SEP}&nbsp;</slot>
                        </td>
                        <td>
                            <slot></slot>{$MOD.LBL_DECIMAL_SEP_TEXT}&nbsp;</td>
                    </tr>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_LOCALE_DEFAULT_NAME_FORMAT|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot>{$NAME_FORMAT}&nbsp;</slot>
                        </td>
                        <td>
                            <slot></slot>{$MOD.LBL_LOCALE_NAME_FORMAT_DESC}&nbsp;</td>
                    </tr>
                </table>
            </div>
            <div id='calendar_options'>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
                    <tr>
                        <th colspan='4' align="left" width="100%" valign="top">
                            <h4>
                                <slot>{$MOD.LBL_CALENDAR_OPTIONS}</slot>
                            </h4>
                        </th>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_PUBLISH_KEY|strip_semicolon}:</slot>
                        </td>
                        <td width="20%">
                            <slot>{$CALENDAR_PUBLISH_KEY}&nbsp;</slot>
                        </td>
                        <td width="65%">
                            <slot>{$MOD.LBL_CHOOSE_A_KEY}&nbsp;</slot>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>
                                <nobr>{$MOD.LBL_YOUR_PUBLISH_URL|strip_semicolon}:</nobr>
                            </slot>
                        </td>
                        <td colspan=2>{if $CALENDAR_PUBLISH_KEY}{$CALENDAR_PUBLISH_URL}{else}{$MOD.LBL_NO_KEY}{/if}</td>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_SEARCH_URL|strip_semicolon}:</slot>
                        </td>
                        <td colspan=2>
                            <slot>{if $CALENDAR_PUBLISH_KEY}{$CALENDAR_SEARCH_URL}{else}{$MOD.LBL_NO_KEY}{/if}</slot>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_ICAL_PUB_URL|strip_semicolon}: {sugar_help text=$MOD.LBL_ICAL_PUB_URL_HELP}</slot>
                        </td>
                        <td colspan=2>
                            <slot>{if $CALENDAR_PUBLISH_KEY}{$CALENDAR_ICAL_URL}{else}{$MOD.LBL_NO_KEY}{/if}</slot>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_FDOW|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot>{$FDOWDISPLAY}&nbsp;</slot>
                        </td>
                        <td>
                            <slot></slot>{$MOD.LBL_FDOW_TEXT}&nbsp;</td>
                    </tr>
                </table>
            </div>
            <div id='edit_tabs'>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="detail view">
                    <tr>
                        <th colspan='4' align="left" width="100%" valign="top">
                            <h4>
                                <slot>{$MOD.LBL_LAYOUT_OPTIONS}</slot>
                            </h4>
                        </th>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_USE_GROUP_TABS|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot><input class="checkbox" type="checkbox" disabled {$USE_GROUP_TABS}></slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_NAVIGATION_PARADIGM_DESCRIPTION}&nbsp;</slot>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" scope="row">
                            <slot>{$MOD.LBL_SUBPANEL_TABS|strip_semicolon}:</slot>
                        </td>
                        <td>
                            <slot><input class="checkbox" type="checkbox" disabled {$SUBPANEL_TABS}></slot>
                        </td>
                        <td>
                            <slot>{$MOD.LBL_SUBPANEL_TABS_DESCRIPTION}&nbsp;</slot>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
</div>
   <?php echo smarty_function_counter(array('name' => 'tabCount','print' => false), $this);?>

   
    <div id='tabcontent<?php echo $this->_tpl_vars['tabCount']; ?>
' <?php if ($this->_tpl_vars['tabCount'] != 0): ?> class='yui-hidden'<?php endif; ?>>
        <div id="detailpanel_<?php echo $this->_tpl_vars['tabCount']+1; ?>
" class="detail view  detail508 expanded">
            <div id="advanced">
                 <?php echo $this->_tpl_vars['ROLE_HTML']; ?>

             </div>
        </div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['footerTpl'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  if ($this->_tpl_vars['useTabs']): ?>
<script type='text/javascript' src='{sugar_getjspath file='modules/javascript/popup_helper.js'}'></script>
<script type="text/javascript" src="{sugar_getjspath file='cache/include/javascript/sugar_grp_yui_widgets.js'}"></script>
<script type="text/javascript">
var <?php echo $this->_tpl_vars['module']; ?>
_detailview_tabs = new YAHOO.widget.TabView("<?php echo $this->_tpl_vars['module']; ?>
_detailview_tabs");
<?php echo $this->_tpl_vars['module']; ?>
_detailview_tabs.selectTab(0);
</script>
<?php endif; ?>
<script type="text/javascript" src="include/InlineEditing/inlineEditing.js"></script>
<script type="text/javascript" src="modules/Favorites/favorites.js"></script>
<script type='text/javascript' src='{sugar_getjspath file='modules/Users/DetailView.js'}'></script>