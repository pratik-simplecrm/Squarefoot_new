<?php
class Leadscoring{
	public function getfieldlist($module_name,$no="NULL")
	{
		global $db, $sugar_config, $mod_strings;
        $bean = BeanFactory::getBean($module_name);
        $field_defs[$module_name] = $bean->getFieldDefinitions();
				foreach($field_defs[$module_name] as $fn)
		{
		//echo "<option value=".$fn['name'].">".$fn['name']."</option>";	
		
		//~ if(!empty($mod_strings[$fn['vname']]))
		//~ {
		//~ $get_lable=$mod_strings[$fn['vname']];	
		//~ }else{
		if($module_name=="Leads")
		{	
		include('modules/Leads/language/en_us.lang.php');	
		}else
		{
		include('modules/Opportunities/language/en_us.lang.php');	
		}
		$get_lable=$mod_strings[$fn['vname']];
		if(empty($get_lable))
		{
		if($module_name=="Leads")
		{	
		include('custom/modules/Leads/language/en_us.lang.php');	
		}else
		{
		include('custom/modules/Opportunities/language/en_us.lang.php');	
		}		$get_lable=$mod_strings[$fn['vname']];
		}
		//~ }
		if(!empty($get_lable))
		{
echo "<option value=".$fn['name'].">".str_replace(":","",$get_lable)."</option>";	
}
		}
	}
	
		public function outerwrapper($field,$posted_array)
			{
			$wrapper_no=$posted_array['numItems'];
			$module_name=$posted_array['module'];
			$inner_div=$posted_array['inner_div'];

			global $db, $sugar_config,$app_list_strings;;
			$bean = BeanFactory::getBean($module_name);
			$field_defs[$module_name] = $bean->getFieldDefinitions();
			
			$condition_array=array('equal'=>'=','not_equal'=>'!=','like'=>'Like','empty'=>'Empty','non_empty'=>'Non Empty',);		
			foreach($condition_array as $key=>$cn)
			{
			$full_condition.="<option value='".$key."'>".$cn."</option>";  
			}

			if(!empty($field_defs[$module_name][$field]['options']))
			{
			if(count($app_list_strings[$field_defs[$module_name][$field]['options']])>=1)
			{
			$dp_element=$app_list_strings[$field_defs[$module_name][$field]['options']];	
			}else
			{
			$dp_element=$GLOBALS['app_list_strings'][$field_defs[$module_name][$field]['options']];
			}
			//echo $dp_element."<pre>";
			//print_r($dp_element);
			echo '<div class="panel panel-default custom-panel" id="field_box_'.$module_name.'_'.$field.'"><div class="panel-body"><div class="col-sm-5"><strong>Field:</strong>&nbsp;<span class="field_name">'.$field.'</span><input type="hidden" id="field_box_'.$module_name.'_'.$field.'field_name" value='.$field.'></div><div class="col-sm-5"><strong >Max Points:</strong>&nbsp;<span class="max_value">0</span><input type="hidden" name="max_value_input_'.$module_name.'[]" class="max_value_input" value="0"></div><a href="#" class="remove_field pull-right"><i class="fa fa-minus-square-o fa-2x"></i></a><hr><div class="field_box_wrapper" id="field_box_wrapper_'.$module_name.'_'.$wrapper_no.'"><div class="inner_wrapper" id="inner_wrapper_'.$module_name.'_'.$field.'_'.$inner_div.'"> <select name="'.$module_name.'['.$field.'][select_condition][]" class="select_condition" id="select_condition_'.$module_name.'_'.$field.'_'.$inner_div.'">'.$full_condition.'</select> <select name="'.$module_name.'['.$field.'][condition_value][]" class="condition_value" id="condition_value_'.$module_name.'_'.$field.'_'.$inner_div.'">';
			foreach($dp_element as $drp_opt)
			{
			echo '<option value="'.$drp_opt.'">'.$drp_opt.'</option>';
			}		
			echo '</select> &nbsp;&nbsp;<input type="text" name="'.$module_name.'['.$field.'][scoring_value][]" class="scoring_value" id="scoring_value_'.$module_name.'_'.$field.'_'.$inner_div.'" data-min_max data-min="0" data-max="30" data-toggle="just_number"/> <a id="add_field_box_button_'.$module_name.'_'.$wrapper_no.'" class="add_field_box_button"><i class="fa fa-plus-square-o fa-2x"></i></a><input id="unique_id_'.$module_name.'_'.$field.'" class="unique_id" type="hidden" value="'.$module_name.'_'.$field.'"></div></div></div></div>';
			}else
			{
			echo '<div class="panel panel-default custom-panel" id="field_box_'.$module_name.'_'.$field.'"><div class="panel-body"><div class="col-sm-5"><strong>Field:</strong>&nbsp;<span class="field_name">'.$field.'</span><input type="hidden" id="field_box_'.$module_name.'_'.$field.'field_name" value='.$field.'></div><div class="col-sm-5"><strong >Max Points:</strong>&nbsp;<span class="max_value">0</span><input type="hidden" name="max_value_input_'.$module_name.'[]" class="max_value_input" value="0"></div><a href="#" class="remove_field pull-right"><i class="fa fa-minus-square-o fa-2x"></i></a><hr><div class="field_box_wrapper" id="field_box_wrapper_'.$module_name.'_'.$wrapper_no.'"><div class="inner_wrapper" id="inner_wrapper_'.$module_name.'_'.$field.'_'.$inner_div.'"> <select name="'.$module_name.'['.$field.'][select_condition][]" class="select_condition" id="select_condition_'.$module_name.'_'.$field.'_'.$inner_div.'">'.$full_condition.'</select> <input type="text" name="'.$module_name.'['.$field.'][condition_value][]" class="condition_value" id="condition_value_'.$module_name.'_'.$field.'_'.$inner_div.'"/>&nbsp;&nbsp;<input type="text" name="'.$module_name.'['.$field.'][scoring_value][]" class="scoring_value" id="scoring_value_'.$module_name.'_'.$field.'_'.$inner_div.'" data-min_max data-min="0" data-max="30" data-toggle="just_number"/> <a id="add_field_box_button_'.$module_name.'_'.$wrapper_no.'" class="add_field_box_button"><i class="fa fa-plus-square-o fa-2x"></i></a><input id="unique_id_'.$module_name.'_'.$field.'" class="unique_id" type="hidden" value="'.$module_name.'_'.$field.'"></div></div></div></div>';
			}
			}	
	


public function innerwrapper($field,$posted_array)
			{

			$module_name=$posted_array['module'];
			$inner_div=$posted_array['inner_div'];

			global $db, $sugar_config,$app_list_strings;;
			$bean = BeanFactory::getBean($module_name);
			$field_defs[$module_name] = $bean->getFieldDefinitions();
			
			$condition_array=array('equal'=>'=','not_equal'=>'!=','like'=>'Like','empty'=>'Empty','non_empty'=>'Non Empty',);		
			foreach($condition_array as $key=>$cn)
			{
			$full_condition.="<option value='".$key."'>".$cn."</option>";  
			}

//~ echo "<pre>";
//~ echo $module_name;
//~ print_r($field_defs[$module_name]);
			if(!empty($field_defs[$module_name][$field]['options']))
			{
			if(count($app_list_strings[$field_defs[$module_name][$field]['options']])>=1)
			{
			$dp_element=$app_list_strings[$field_defs[$module_name][$field]['options']];	
			}else
			{
			$dp_element=$GLOBALS['app_list_strings'][$field_defs[$module_name][$field]['options']];
			}
			//~ echo $dp_element."<pre>";
			//~ print_r($dp_element);
			echo '<div class="inner_wrapper" id="inner_wrapper_'.$module_name.'_'.$field.'_'.$inner_div.'"> <select name="'.$module_name.'['.$field.'][select_condition][]" class="select_condition" id="select_condition_'.$module_name.'_'.$field.'_'.$inner_div.'">'.$full_condition.'</select> <select name="'.$module_name.'['.$field.'][condition_value][]" class="condition_value" id="condition_value_'.$module_name.'_'.$field.'_'.$inner_div.'">';
			foreach($dp_element as $drp_opt=>$drp_opt_val)
			{
			echo '<option value="'.$drp_opt.'">'.$drp_opt_val.'</option>';
			}		
			echo '</select> 
			<select name="'.$module_name.'['.$field.'][condition_key][]" class="condition_key" id="condition_key_'.$module_name.'_'.$field.'_'.$inner_div.'">';
			foreach($dp_element as $drp_opt=>$drp_opt_val)
			{
			echo '<option value="'.$drp_opt_val.'">'.$drp_opt_val.'</option>';
			}		
			echo '</select>
			&nbsp;&nbsp;<input type="text" name="'.$module_name.'['.$field.'][scoring_value][]" class="scoring_value" id="scoring_value_'.$module_name.'_'.$field.'_'.$inner_div.'"/><a href="#" class="remove_field_inner" id="remove_field_inner_'.$module_name.'_'.$field.'_'.$inner_div.'"  style="margin:2px"><i class="fa fa-minus-square-o fa-2x"></i></a></div>';
			}else
			{
			echo '<div class="inner_wrapper" id="inner_wrapper_'.$module_name.'_'.$field.'_'.$inner_div.'"> <select name="'.$module_name.'['.$field.'][select_condition][]" class="select_condition" id="select_condition_'.$module_name.'_'.$field.'_'.$inner_div.'">'.$full_condition.'</select> <input type="text" name="'.$module_name.'['.$field.'][condition_value][]" class="condition_value" id="condition_value_'.$module_name.'_'.$field.'_'.$inner_div.'"/>&nbsp;&nbsp;<input type="text" name="'.$module_name.'['.$field.'][scoring_value][]" class="scoring_value" id="scoring_value_'.$module_name.'_'.$field.'_'.$inner_div.'" data-min_max data-min="0" data-max="30" data-toggle="just_number"/> <a href="#" class="remove_field_inner" id="remove_field_inner_'.$module_name.'_'.$field.'_'.$inner_div.'"  style="margin:2px"><i class="fa fa-minus-square-o fa-2x"></i></a></div>';
			}
			}	
	
	}
?>
   
