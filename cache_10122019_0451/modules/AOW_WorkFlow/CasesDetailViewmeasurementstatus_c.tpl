

{if is_string($fields.measurementstatus_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.measurementstatus_c.name}" value="{ $fields.measurementstatus_c.options }">
{ $fields.measurementstatus_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.measurementstatus_c.name}" value="{ $fields.measurementstatus_c.value }">
{ $fields.measurementstatus_c.options[$fields.measurementstatus_c.value]}
{/if}
