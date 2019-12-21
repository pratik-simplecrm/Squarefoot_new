
{if !empty($fields.reasonofreschedule_c.value) && ($fields.reasonofreschedule_c.value != '^^')}
<input type="hidden" class="sugar_field" id="{$fields.reasonofreschedule_c.name}" value="{$fields.reasonofreschedule_c.value}">
{multienum_to_array string=$fields.reasonofreschedule_c.value assign="vals"}
{foreach from=$vals item=item}
<li style="margin-left:10px;">{ $fields.reasonofreschedule_c.options.$item }</li>
{/foreach}
{/if}