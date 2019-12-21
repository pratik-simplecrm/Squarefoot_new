{php}
global $db;
$content_query = $db->query("SELECT * FROM listview_field_background where id='1'");
$content_row = $db->fetchByAssoc($content_query);
$our_module= unserialize(base64_decode($content_row['all_module']));
$col=$this->get_template_vars('col');
$rowData=$this->get_template_vars('rowData');
$pageData=$this->get_template_vars('pageData');

                  foreach($our_module[$pageData['bean']['moduleDir']] as $fkey=>$field)
                        {
                     
                        if (strtoupper($fkey)==$col)
                        { 
                        
                        // print_r(array_key_exists('field_name',$our_module[$fkey])."-------->".$our_module[$fkey]."<br>");
                       
                        if (array_key_exists('field_name',$field))
                        {    
                      
                           $btkey= array_search($rowData[strtoupper($fkey)],$field['field_name']);
                         if(empty($btkey))
                         {
                             $btkey= array_search($rowData[strtoupper($fkey)],$field['field_name_value']);
                         }
                        echo "<span class='label' style='background-color:".$field['background_color'][$btkey].";color:".$field['text_color'][$btkey].";'>";
                        {/php}
                        {sugar_field parentFieldArray=$rowData vardef=$params displayType=ListView field=$col}
                        {php}
                        echo "</span>";


                        }else{
                        echo "<span class='label' style='background-color:".$field['background_color'][0].";color:".$field['text_color'][0].";'>";
                        {/php}
                        {sugar_field parentFieldArray=$rowData vardef=$params displayType=ListView field=$col}
                        {php}
                        echo "</span>";
                        }
                        }
                        }

                        if(!array_key_exists(strtolower($col),$our_module[$pageData['bean']['moduleDir']])) {
                        {/php}
                        {sugar_field parentFieldArray=$rowData vardef=$params displayType=ListView field=$col}
                        
                        {php}
                        }





{/php}
