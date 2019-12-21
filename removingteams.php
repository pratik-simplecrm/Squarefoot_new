<?php
//~ ini_set('display_errors','On');
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('config.php');
global $db; 

/*
$accounts="ALTER TABLE accounts DROP COLUMN team_id";
$result_accounts = $db->query($accounts);

$contacts = "ALTER TABLE contacts DROP COLUMN team_id";
$result_contacts = $db->query($contacts);

$opportunities = "ALTER TABLE opportunities DROP COLUMN team_id";
$result_opportunities = $db->query($opportunities);

$leads = "ALTER TABLE leads DROP COLUMN team_id";
$result_leads = $db->query($leads);

$cases = "ALTER TABLE tasks DROP COLUMN team_id";
$result_cases = $db->query($cases);

$meetings = "ALTER TABLE meetings DROP COLUMN team_id";
$result_meetings = $db->query($meetings);

$notes = "ALTER TABLE notes DROP COLUMN team_id";
$result_notes = $db->query($notes);

$calls = "ALTER TABLE calls DROP COLUMN team_id";
$result_calls = $db->query($calls);

$sugarfeed = "ALTER TABLE sugarfeed DROP COLUMN team_id";
$result_documents = $db->query($sugarfeed);
* 
*/ 

$arch_architects_contacts = "ALTER TABLE arch_architects_contacts DROP COLUMN team_id";
$result_projects = $db->query($arch_architects_contacts);

$arch_architectural_firm = "ALTER TABLE arch_architectural_firm DROP COLUMN team_id";
$result_milestones = $db->query($arch_architectural_firm);
/*
$project = "ALTER TABLE project DROP COLUMN team_id";
$result_invoice = $db->query($project);

$prospects1 = "ALTER TABLE quote_product_category DROP COLUMN team_id";
$result_story1 = $db->query($prospects1);

$prospects = "ALTER TABLE prospects DROP COLUMN team_id";
$result_story = $db->query($prospects);
$prospects2 = "ALTER TABLE quote_products DROP COLUMN team_id";
$result_story2 = $db->query($prospects2);
$prospects3 = "ALTER TABLE quote_quote DROP COLUMN team_id";
$result_story3 = $db->query($prospects3);

$prospects4 = "ALTER TABLE quote_quoteproducts DROP COLUMN team_id";
$result_story4 = $db->query($prospects4);

$prospects5 = "ALTER TABLE quote_quotes DROP COLUMN team_id";
$result_story5 = $db->query($prospects5);
*/ 
?>

