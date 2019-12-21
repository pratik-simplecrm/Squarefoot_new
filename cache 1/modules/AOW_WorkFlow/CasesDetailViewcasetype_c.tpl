

{if is_string($fields.casetype_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.casetype_c.name}" value="{ $fields.casetype_c.options }">
{ $fields.casetype_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.casetype_c.name}" value="{ $fields.casetype_c.value }">
{ $fields.casetype_c.options[$fields.casetype_c.value]}
{/if}
