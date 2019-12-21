<?php
//ini_set('display_errors', 'On');
if (!defined('sugarEntry')) {
	define('sugarEntry', true);
}

require_once 'include/entryPoint.php';
require_once 'include/database/DBManager.php';
require_once 'config.php';
global $db, $cnt1, $Content, $Content1;
$select_report = $_REQUEST['report_select'];

global $db;


$Content = "Start Date, End Date,Team Name, User Name, Target, Target to date, Leads Created Count,Opp. Created Count,Opp.Created Value,Opp.Won Count,Opp.Won Value,Opp.Lost Count,Opp.Lost Value, Calls Made, Meetings Held,Architects Count,Architects Calls Made,Architects Meetings Held,Active/Inactive\n";


require_once 'scrmCustomReport.php';
$content = getWeeklyPerformanceReport();

$count = count($content);

for ($j = 0; $j < $count; $j++) {
	// if ($user_status[$j] == 'Active') {
	$Content .= $_REQUEST['from'] . "," . $_REQUEST['to'] . "," . $content[11][$j] . "," . $content[0][$j] . "," . $content[16][$j] . "," . $content[18][$j] . "," . $content[1][$j] . "," . $content[2][$j] . "," . $content[3][$j] . "," . $content[4][$j] . "," . $content[5][$j] . "," . $content[6][$j] . "," . $content[7][$j] . "," . $content[8][$j] . "," . $content[9][$j] . "," . $content[13][$j] . "," . $content[15][$j] . "," . $content[14][$j] . "," . $content[20][$j] . "\n";
	
}

ob_clean();
$FileName = "CustomReport_Details_" . date("Ymd") . ".csv";

header('Content-Type: application/csv');
// header("Content-length: " . filesize($NewFile));
header('Content-Disposition: attachment; filename="' . $FileName . '"');

print $Content;
exit;
ob_end_clean();
?>
