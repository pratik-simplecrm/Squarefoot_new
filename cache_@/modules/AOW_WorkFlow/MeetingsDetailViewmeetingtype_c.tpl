

{if is_string($fields.meetingtype_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.meetingtype_c.name}" value="{ $fields.meetingtype_c.options }">
{ $fields.meetingtype_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.meetingtype_c.name}" value="{ $fields.meetingtype_c.value }">
{ $fields.meetingtype_c.options[$fields.meetingtype_c.value]}
{/if}
