
{if !empty($fields.meetingtype_c.value) && ($fields.meetingtype_c.value != '^^')}
<input type="hidden" class="sugar_field" id="{$fields.meetingtype_c.name}" value="{$fields.meetingtype_c.value}">
{multienum_to_array string=$fields.meetingtype_c.value assign="vals"}
{foreach from=$vals item=item}
<li style="margin-left:10px;">{ $fields.meetingtype_c.options.$item }</li>
{/foreach}
{/if}