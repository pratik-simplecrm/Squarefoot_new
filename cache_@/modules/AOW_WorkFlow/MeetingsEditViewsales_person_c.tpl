
<input type="text" name="{$fields.sales_person_c.name}" class="sqsEnabled" tabindex="1" id="{$fields.sales_person_c.name}" size="" value="{$fields.sales_person_c.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.sales_person_c.id_name}" 
	id="{$fields.sales_person_c.id_name}" 
	value="{$fields.user_id_c.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.sales_person_c.name}" id="btn_{$fields.sales_person_c.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_LABEL"}"
onclick='open_popup(
    "{$fields.sales_person_c.module}", 
	600, 
	400, 
	"", 
	true, 
	false, 
	{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":{/literal}"{$fields.sales_person_c.id_name}"{literal},"name":{/literal}"{$fields.sales_person_c.name}"{literal}}}{/literal}, 
	"single", 
	true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.sales_person_c.name}" id="btn_clr_{$fields.sales_person_c.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.sales_person_c.name}', '{$fields.sales_person_c.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.sales_person_c.name}']) != 'undefined'",
		enableQS
);
</script>