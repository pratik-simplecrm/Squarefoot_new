<?php

/**
 *  Get Left and Right columns html of modules list.
 *
 * @return array
 * */
function getStepOneColumnsHtml()
{
    global $moduleList, $app_list_strings, $mod_strings;

    $hide_module_list = array(
        'Home',
        'Calendar',
        'rls_Dashboards',
    );

    $left_column_html = '';
    $right_column_html = '';
    $num = 0;

    $custom_moduleList = $moduleList;
    $custom_moduleList[] = 'Users';
    foreach ($custom_moduleList as $module) {
        if (in_array($module, $hide_module_list)) {
            continue;
        }
        $num++;
        $html_module = '
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr valign="top">
                <td>
                    <img
                        name="' . $module . '"
                        class="report-type"
                        src="' . SugarThemeRegistry::current()->getImageURL('icon_ConnectorSearchFields.gif') . '"
                        onmouseout="document.' . $module . '.src=\'' . SugarThemeRegistry::current()->getImageURL('icon_ConnectorSearchFields.gif') . '\'"
                        onmouseover="document.' . $module . '.src=\'' . SugarThemeRegistry::current()->getImageURL('icon_ConnectorSearchFieldsOver.gif') . '\'"
                    >
                </td>
                <td>&nbsp;&nbsp;</td>
                <td><b>'. $app_list_strings["moduleList"][$module] .'</b><br>
                  '. $mod_strings["LBL_DETAILS_ICON"] .'
                </td>
            </tr>
            ';
        if ($num & 1) {
           $left_column_html .= $html_module;    
        } else {
           $right_column_html .= $html_module;    
        } 
    }
    
    return array(
        'left_column' => $left_column_html,
        'right_column' => $right_column_html,
    );
}
