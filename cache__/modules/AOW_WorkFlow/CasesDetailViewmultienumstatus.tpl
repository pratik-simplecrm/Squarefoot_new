
{if !empty($fields.status.value) && ($fields.status.value != '^^')}
<input type="hidden" class="sugar_field" id="{$fields.status.name}" value="{$fields.status.value}">
{multienum_to_array string=$fields.status.value assign="vals"}
{foreach from=$vals item=item}
<li style="margin-left:10px;">{ $fields.status.options.$item }</li>
{/foreach}
{/if}