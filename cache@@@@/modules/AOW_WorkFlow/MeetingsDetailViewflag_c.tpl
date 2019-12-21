

{if is_string($fields.flag_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.flag_c.name}" value="{ $fields.flag_c.options }">
{ $fields.flag_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.flag_c.name}" value="{ $fields.flag_c.value }">
{ $fields.flag_c.options[$fields.flag_c.value]}
{/if}
