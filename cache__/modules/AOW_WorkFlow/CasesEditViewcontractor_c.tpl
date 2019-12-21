
<input type="text" name="{$fields.contractor_c.name}" class="sqsEnabled" tabindex="1" id="{$fields.contractor_c.name}" size="" value="{$fields.contractor_c.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.contractor_c.id_name}" 
	id="{$fields.contractor_c.id_name}" 
	value="{$fields.scrm_vendors_id_c.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.contractor_c.name}" id="btn_{$fields.contractor_c.name}" tabindex="1" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
    "{$fields.contractor_c.module}", 
	600, 
	400, 
	"", 
	true, 
	false, 
	{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":{/literal}"{$fields.contractor_c.id_name}"{literal},"name":{/literal}"{$fields.contractor_c.name}"{literal}}}{/literal}, 
	"single", 
	true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.contractor_c.name}" id="btn_clr_{$fields.contractor_c.name}" tabindex="1" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.contractor_c.name}', '{$fields.contractor_c.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.contractor_c.name}']) != 'undefined'",
		enableQS
);
</script>