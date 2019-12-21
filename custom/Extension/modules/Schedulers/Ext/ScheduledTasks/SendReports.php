<?php
array_push($job_strings, 'SendReports_Job');
function SendReports_Job()
{
    require_once('modules/rls_Reports/classes/load.php');
    require_once('modules/rls_Reports/license/OutfittersLicense.php');
    global $db, $timedate;
    $now_db = $timedate->nowDb();
    $sql = 'SELECT id
            FROM rls_scheduling_reports
            WHERE deleted=0
                  AND subscribe_active=1
                  AND next_run<\'' . $now_db . '\'';
    $result = $db->query($sql);

    while ($row = $db->fetchByAssoc($result)) {
        if ($RLS_Scheduling_Reports = loadBean('RLS_Scheduling_Reports')->retrieve($row['id'])) {

            $users_email_list = getFieldsList(
                $RLS_Scheduling_Reports,
                'Users',
                'rls_scheduling_reports_users',
                'email1'
            );
            $contacts_email_list = getFieldsList(
                $RLS_Scheduling_Reports,
                'Contacts',
                'rls_scheduling_reports_contacts',
                'email1'
            );
            $emails_list = array_merge($users_email_list, $contacts_email_list);

            if (empty($emails_list)) {
                $RLS_Scheduling_Reports->last_run = $now_db;
                if($RLS_Scheduling_Reports->single_launch){
                    $RLS_Scheduling_Reports->subscribe_active = 0;
                }
                $RLS_Scheduling_Reports->save();
                continue;
            }

            $reports_list = getFieldsList(
                $RLS_Scheduling_Reports,
                'rls_Reports',
                'rls_scheduling_reports_rls_reports',
                'id'
            );

            foreach ($reports_list as $report_id) {
                $report_bean = loadBean('rls_Reports')->retrieve($report_id);
                saveReportPDF($report_bean);
                foreach ($emails_list as $email_address) {
                    sendReportToEmail($report_bean, $email_address, $now_db);
                }
                unlink("upload/emails_report.pdf");
            }
            $RLS_Scheduling_Reports->last_run = $now_db;

            if($RLS_Scheduling_Reports->single_launch){
                $RLS_Scheduling_Reports->subscribe_active = 0;
            }
            $RLS_Scheduling_Reports->save();
        }
    }
    return true;
}


function getFieldsList($bean, $module_name, $rel, $field_name)
{
    $fields_list = array();
    $bean->load_relationship($rel);
    $rel_records_list = $bean->$rel->getBeans();
    foreach ($rel_records_list as $rel_record) {
        $record_bean = loadBean($module_name)->retrieve($rel_record->id);
        $fields_list[] = $record_bean->$field_name;
    }
    return $fields_list;
}


function saveReportPDF($report_bean)
{
    \Reports\Settings\Storage::setFocus($report_bean);
    $pdf = \Reports\PDF\Factory::load('DefaultType');
    $pdf->generateContent();
    $pdf->setNameOfPdf('emails_report.pdf');
    $pdf->savePdfToDisk('upload');
}

function sendReportToEmail($reports_bean, $email_address, $now_db)
{

    $subject = $reports_bean->name . ' ' . $now_db;
    $emailObj = new Email();
    $defaults = $emailObj->getSystemDefaultEmail();
    $mail = new SugarPHPMailer();
    $mail->setMailerForSystem();
    $mail->From = $defaults['email'];
    $mail->FromName = $defaults['name'];
    $mail->ClearAllRecipients();
    $mail->ClearReplyTos();
    $mail->Subject = from_html($subject);
    $mail->Body = from_html($reports_bean->description);
    $mail->prepForOutbound();
    $mail->AddAddress($email_address);
    $file_name = $subject . '.pdf';
    $location = "upload/emails_report.pdf";
    $mime_type = 'application/pdf';
    $mail->AddAttachment($location, $file_name, 'base64', $mime_type);
    if ($mail->Send()) {
        return true;
    }
    return false;
}
