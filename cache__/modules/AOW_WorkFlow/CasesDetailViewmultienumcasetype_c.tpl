
{if !empty($fields.casetype_c.value) && ($fields.casetype_c.value != '^^')}
<input type="hidden" class="sugar_field" id="{$fields.casetype_c.name}" value="{$fields.casetype_c.value}">
{multienum_to_array string=$fields.casetype_c.value assign="vals"}
{foreach from=$vals item=item}
<li style="margin-left:10px;">{ $fields.casetype_c.options.$item }</li>
{/foreach}
{/if}