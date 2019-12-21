<?php

if (!defined('sugarEntry'))
    define('sugarEntry', true);
/**
 *  @copyright SimpleCRM http://www.simplecrm.com.sg
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SimpleCRM <info@simplecrm.com.sg>
 */

global $db, $timedate;

require_once('modules/AOS_PDF_Templates/PDF_Lib/mpdf.php');

$d_image = explode('?', SugarThemeRegistry::current()->getImageURL('company_logo.png'));
$graphs = $_POST["graphsForPDF"];
$unique_timestamp = $_POST['unique_timestamp'];
$graphHtml = "<div class='reportGraphs' style='width:100%; text-align:center;'>";
$report = new AOR_Report();
$report->retrieve($_POST['record']);

$scheduled_report = BeanFactory::getBean('AOR_Scheduled_Reports', $_POST['aor_scheduled_reportid']);
$email_recipients = $scheduled_report->get_email_recipients();

$chartsPerRow = $report->graphs_per_row;
$countOfCharts = count($graphs);
if ($countOfCharts > 0) {
    $width = ((int) 100 / $chartsPerRow);

    $modulusRemainder = $countOfCharts % $chartsPerRow;

    if ($modulusRemainder > 0) {
        $modulusWidth = ((int) 100 / $modulusRemainder);
        $itemsWithModulus = $countOfCharts - $modulusRemainder;
    }


    for ($x = 0; $x < $countOfCharts; $x++) {
        if (is_null($itemsWithModulus) || $x < $itemsWithModulus)
  //        $graphHtml.="<img src='" . $graphs[$x] . "' style='width:$width%;' />";
          $graphHtml.="<img src='" . $graphs[$x] . "' />";
        else
    //        $graphHtml.="<img src='" . $graphs[$x] . "' style='width:$modulusWidth%;' />";
            $graphHtml.="<img src='" . $graphs[$x] . "' />";
    }

    /*            foreach($graphs as $g)
      {
      $graphHtml.="<img src='.$g.' style='width:$width%;' />";
      } */
    $graphHtml.="</div>";
}
//echo $graphHtml;exit;
$head = '<table style="width: 100%; font-family: Arial; text-align: center;" border="0" cellpadding="2" cellspacing="2">
                <tbody style="text-align: left;">
                <tr style="text-align: left;">
                <td style="text-align: left;">
                
                </td>
                <tr style="text-align: left;">
                <td style="text-align: left;"></td>
                </tr>
                 <tr style="text-align: left;">
                <td style="text-align: left;">
                </td>
                <tr style="text-align: left;">
                <td style="text-align: left;"></td>
                </tr>
                <tr style="text-align: left;">
                <td style="text-align: left;">
                <b>' . strtoupper($report->name) . '</b>
                </td>
                </tr>
                </tbody>
                </table><br />' . $graphHtml;

$report->user_parameters = requestToUserParameters();

$printable = $report->build_group_report(-1, false);
/* Modified By Swapnil */
//        $stylesheet = file_get_contents('themes/Suite7/css/style.css');
$stylesheet = '<style type="text/css">'
        . 'body{font-family:Arial;}'
        . 'table{border-spacing: 0;border-collapse: collapse;}'
        . '.list td,.list th{text-align: left; border: solid 1px #bbb;padding: 5px;}'
        . '.list th {background: #2270A9;color:#fff;text-align: center !important;}'
        . '.list tr:nth-child(even) {background: #DAE4F0}'
        . '.list tr:nth-child(odd) {background: #fff}'
        . '</style>';
$html = '';
$html .= $stylesheet;
$html .= $head;
$html .= $printable;

ob_clean();
try {
    $pdf = new mPDF('en', 'A4', '', 'DejaVuSansCondensed', '15', '15', '28', '18');
    $pdf->setAutoFont();
    $pdf->SetHTMLHeader('<div><img src="' . $d_image[0] . '"/></div>');
    $pdf->WriteHTML($html);
    $pdf_name = str_replace(' ', '_', $report->name) . $unique_timestamp . '.pdf';
    $pdf->Output('upload/scheduled_reports/' . $pdf_name, "F");
    //$pdf->Output($pdf_name, "F");

    $emailObj = new Email();
    $defaults = $emailObj->getSystemDefaultEmail();
    $mail = new SugarPHPMailer();

    $mail->setMailerForSystem();
    $mail->IsHTML(true);
    $mail->From = $defaults['email'];
    $mail->FromName = $defaults['name'];
    $mail->Subject = from_html($report->name);
    $mail->Body = "This is auto-generated scheduled report";
    $mail->prepForOutbound();
    $success = true;
    $emails = $email_recipients;
    //print_r($emails);
    foreach ($emails as $email_address) {
        $mail->ClearAddresses();
        $mail->AddAddress($email_address);
        $mail->AddAttachment('upload/scheduled_reports/' . $pdf_name);
        $success = $mail->Send() && $success;
    }
    $current_time = date('Y-m-d H:i:s');
    //$scheduled_report->last_run = $current_time;
    $scheduled_report->last_run = $timedate->getNow()->asDb(false);
    $scheduled_report->save();
    //sleep(20);
    unlink('upload/scheduled_reports/' . $pdf_name);
    unlink('upload/scheduled_reports/phantomjs_' . $unique_timestamp . '.js');
} catch (mPDF_exception $e) {
    echo $e;
}

die;
?>