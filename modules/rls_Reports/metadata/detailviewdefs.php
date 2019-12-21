<?php
// created: 2016-08-09 21:52:13
$viewdefs['rls_Reports']['DetailView'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'buttons' => 
      array (
        0 => 'EDIT',
        1 => 'DUPLICATE',
        2 => 'DELETE',
        3 => 
        array (
          'customCode' => '
                <input title="{$MOD.LBL_DOWNLOAD_PDF}"
                       id="download_pdf"
                       accessKey="D"
                       class="button"
                       type="button"
                       name="button"
                       value="{$MOD.LBL_DOWNLOAD_PDF}"
                       onclick="Reports.Pdf.downloadPDF(\'{$fields.id.value}\');"
                >
                ',
        ),
        4 => 
        array (
          'customCode' => '<input title="{$APP.LBL_EXPORT}"
                     id="export_csv"
                     class="button"  
                     type="button"  
                     name="button" 
                     value="{$APP.LBL_EXPORT}" 
                     onclick="this.form.return_module.value=\'rls_Reports\';  
                                 this.form.return_action.value=\'DetailView\';  
                                 this.form.action.value=\'exportCSV\';  
                                 this.form.return_id.value=\'{$id}\';"  
                      
                      /> ',
        ),
      ),
    ),
    'maxColumns' => '2',
    'widths' => 
    array (
      0 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
      1 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
    ),
    'includes' => 
    array (
      0 => 
      array (
        'file' => 'modules/rls_Reports/js/DetailView.js',
      ),
    ),
    'useTabs' => true,
    'tabDefs' => 
    array (
      'LBL_DETAILS' => 
      array (
        'newTab' => true,
        'panelDefault' => 'expanded',
      ),
      'LBL_CHART_OPTIONS' => 
      array (
        'newTab' => true,
        'panelDefault' => 'expanded',
      ),
    ),
  ),
  'panels' => 
  array (
    'lbl_details' => 
    array (
      0 => 
      array (
        0 => 'name',
        1 => 'assigned_user_name',
      ),
      1 => 
      array (
        0 => 'description',
      ),
    ),
    'lbl_chart_options' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'chart_type',
          'label' => 'LBL_CHART_TYPE',
        ),
      ),
    ),
  ),
);