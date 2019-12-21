

{if is_string($fields.reasonofreschedule_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.reasonofreschedule_c.name}" value="{ $fields.reasonofreschedule_c.options }">
{ $fields.reasonofreschedule_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.reasonofreschedule_c.name}" value="{ $fields.reasonofreschedule_c.value }">
{ $fields.reasonofreschedule_c.options[$fields.reasonofreschedule_c.value]}
{/if}
