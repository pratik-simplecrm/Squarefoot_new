<?php /* Smarty version 2.6.29, created on 2019-12-10 11:20:33
         compiled from modules/AOR_Reports/tpls/report.tpl */ ?>
<script src="modules/AOR_Conditions/conditionLines.js"></script>
<script>
    report_module = '{$report_module}';
</script>

<div>
    {$charts_content}
</div>

<div id='detailpanel_parameters' class='detail view  detail508 expanded hidden'>
    <form onsubmit="return false" id="EditView" name="EditView">
        <h4>
            <a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel('parameters');">
                <img border="0" id="detailpanel_parameters_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
            <a href="javascript:void(0)" class="expandLink" onclick="expandPanel('parameters');">
                <img border="0" id="detailpanel_parameters_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
                {sugar_translate label='LBL_PARAMETERS' module='AOR_Reports'}
            <script>
                document.getElementById('detailpanel_parameters').className += ' expanded';
            </script>
        </h4>
        <div id="conditionLines" class="panelContainer" style="min-height: 50px;">
        </div>
        <input id='updateParametersButton' class="panelContainer" type="button" value="{sugar_translate label='LBL_UPDATE_PARAMETERS' module='AOR_Reports'}"/>
        <script>
            {literal}
                $.each(reportParameters, function (key, val) {
                    loadConditionLine(val, 'EditView');
                });

                $(document).ready(function () {
                    $('#updateParametersButton').click(function () {
                        //Update the Detail view form to have the parameter info and reload the page
                        var _form = $('#formDetailView');

                        _form.find('input[name=action]').val('DetailView');
                        //Add each parameter to the form in turn
                        $('.aor_conditions_id').each(function (index, elem) {
                            $elem = $(elem);
                            var ln = $elem.attr('id').substr(17);
                            var id = $elem.val();

                            _form.append('<input type="hidden" name="parameter_id[]" value="' + id + '">');
                            var operator = $("#aor_conditions_operator\\[" + ln + "\\]").val();
                            _form.append('<input type="hidden" name="parameter_operator[]" value="' + operator + '">');
                            var fieldType = $('#aor_conditions_value_type\\[' + ln + '\\]').val();
                            _form.append('<input type="hidden" name="parameter_type[]" value="' + fieldType + '">');
                            var fieldInput = $('#aor_conditions_value\\[' + ln + '\\]').val();

                            // Fix for issue #1272 - AOR_Report module cannot update Date type parameter.
                            if ($('#aor_conditions_value\\[' + ln + '\\]\\[0\\]').length) {
                                var fieldValue = $('#aor_conditions_value\\[' + ln + '\\]\\[0\\]').val();
                                var fieldSign = $('#aor_conditions_value\\[' + ln + '\\]\\[1\\]').val();
                                var fieldNumber = $('#aor_conditions_value\\[' + ln + '\\]\\[2\\]').val();
                                var fieldTime = $('#aor_conditions_value\\[' + ln + '\\]\\[3\\]').val();
                                _form.append('<input type="hidden" name="parameter_value[]" value="' + fieldValue + '">');
                                _form.append('<input type="hidden" name="parameter_value[]" value="' + fieldSign + '">');
                                _form.append('<input type="hidden" name="parameter_value[]" value="' + fieldNumber + '">');
                                _form.append('<input type="hidden" name="parameter_value[]" value="' + fieldTime + '">');
                            }
                            // Fix for issue #1082 - change local date format to db date format
                            if ($('#aor_conditions_value\\[' + index + '\\]').hasClass('date_input')) { // only change to DB format if its a date
                                if ($('#aor_conditions_value\\[' + ln + '\\]').hasClass('date_input')) {
                                    /*Modified by Roshan Sorode for Reports issues for date filter issues 21 May 2018*/
                                    var fieldInput1 = MyformatDate(fieldInput,cal_date_format); 
                                    /*Modified by Roshan Sorode for Reports issues for date filter issues 21 May 2018*/
                                    fieldInput = $.datepicker.formatDate('yy-mm-dd', new Date(fieldInput1));
                                   // alert(ln + "----" + id + "------" + fieldInput)
                                }
                            }
                            _form.append('<input type="hidden" name="parameter_value[]" value="' + fieldInput + '">');
                        });
                        _form.submit();
                    });

                    // Make sure to change dates back to the user format
                    $('.aor_conditions_id').each(function (index, elem) {
                        if ($('#aor_conditions_value\\[' + index + '\\]').hasClass('date_input')) {
                            var dateValue = new Date($('#aor_conditions_value\\[' + index + '\\]').val());
                            var dateValueinUserFormat = dateValue.toLocaleFormat(cal_date_format);
                            $('#aor_conditions_value\\[' + index + '\\]').val(dateValueinUserFormat)
                        }
                    });
                });

                 /*Modified by Roshan Sorode for Reports issues for date filter issues 21 May 2018*/
                function MyformatDate(d1,z) {                    
                    var yy,mm,dd,zz;
                    switch (z){ // z - user defined date format
                        case '%Y-%m-%d': // 2010-12-23
                             zz = d1.split('-');
                             yy = zz[0];
                             mm = zz[1];
                             dd = zz[2];
                            break;
                        case '%m-%d-%Y': // 12-23-2018
                             zz = d1.split('-');
                             yy = zz[2];
                             mm = zz[0];
                             dd = zz[1];
                            break;
                        case '%d-%m-%Y': // 23-12-2010
                             zz = d1.split('-');
                             yy = zz[2];
                             mm = zz[1];
                             dd = zz[0];
                            break;
                        case '%Y/%m/%d': // 2010/12/23
                             zz = d1.split('/');
                             yy = zz[0];
                             mm = zz[1];
                             dd = zz[2];
                            break;
                        case '%m/%d/%Y': // 12/23/2010
                             zz = d1.split('/');
                             yy = zz[2];
                             mm = zz[0];
                             dd = zz[1];
                            break;
                        case '%d/%m/%Y': // 23/12/2010
                             zz = d1.split('/');
                             yy = zz[2];
                             mm = zz[1];
                             dd = zz[0];
                            break;
                        case '%Y.%m.%d': // 2010.12.23
                             zz = d1.split('.');
                             yy = zz[0];
                             mm = zz[1];
                             dd = zz[2];
                            break;                        
                        case '%d.%m.%Y': // 23.12.2010
                             zz = d1.split('.');
                             yy = zz[2];
                             mm = zz[1];
                             dd = zz[0];
                            break;
                        case '%m.%d.%Y': // 12.23.2010
                             zz = d1.split('.');
                             yy = zz[2];
                             mm = zz[0];
                             dd = zz[1];
                            break;    
                        
                            
                    }
                   return mm+"/"+dd+"/"+yy;
                }
                 /*Modified by Roshan Sorode for Reports issues for date filter issues 21 May 2018*/
            {/literal}
        </script>
        <script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function () {ldelim}
    initPanel('parameters', 'expanded');
        {rdelim});</script>
    </form>
</div>

<div id='detailpanel_report' class='detail view  detail508 expanded'>
    {counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
    <h4>
        <a href="javascript:void(0)" class="collapseLink" onclick="collapsePanel('report');">
            <img border="0" id="detailpanel_report_img_hide" src="{sugar_getimagepath file="basic_search.gif"}"></a>
        <a href="javascript:void(0)" class="expandLink" onclick="expandPanel('report');">
            <img border="0" id="detailpanel_report_img_show" src="{sugar_getimagepath file="advanced_search.gif"}"></a>
            {sugar_translate label='LBL_REPORT' module='AOR_Reports'}
        <script>
            document.getElementById('detailpanel_report').className += ' expanded';
        </script>
    </h4>
    <table id='FIELDS' class="panelContainer" cellspacing='{$gridline}'>
        {counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
        {counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
        {capture name="tr" assign="tableRow"}
            <tr>
                {counter name="fieldsUsed"}
                <td width='37.5%' colspan='4' >
                    {if !$fields.field_lines.hidden}
                        {counter name="panelFieldCount"}
                        <span id='field_lines_span'>
                            {$fields.field_lines.value}
                            {$report_content}
                        </span>
                    {/if}
                </td>
            </tr>
        {/capture}
        {if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
            {$tableRow}
        {/if}
    </table>
    <script type="text/javascript">SUGAR.util.doWhen("typeof initPanel == 'function'", function () {ldelim}
    initPanel('report', 'expanded');
        {rdelim});</script>
</div>

<script src="modules/AOR_Reports/Dashlets/AORReportsDashlet/AORReportsDashlet.js"></script>