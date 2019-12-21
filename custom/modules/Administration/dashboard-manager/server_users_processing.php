<?php

/*
 * Script:    DataTables server-side script for PHP and MySQL
 * Copyright: 2010 - Allan Jardine
 * License:   GPL v2 or BSD (3-point)
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

/* Array of database columns which should be read and sent back to DataTables. Use a space where
 * you want to insert a non-database field (for example a counter or static image)
 */

if (!defined('sugarEntry'))
    define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('config.php');

global $db, $sugar_config;
$aColumns = array('name', 'email', 'report_name', 'title', 'department', 'id');
$bColumns = array('u.first_name', 'u.last_name', 'ea.email_address', 'u.title', 'u.department');

/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "id";

/* DB table to use */
$sTable = "users";

/* Database connection information */

//	$gaSql['user']       = $sugar_config['dbconfig']['db_user_name'];
//	$gaSql['password']   = $sugar_config['dbconfig']['db_password'];
//	$gaSql['db']         = $sugar_config['dbconfig']['db_name'];
//	$gaSql['server']     = $sugar_config['dbconfig']['db_host_name'];


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
 * no need to edit below this line
 */

/*
 * MySQL connection
 */
//	$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
//		die( 'Could not open connection to server' );
//	
//	mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
//		die( 'Could not select database '. $gaSql['db'] );


/*
 * Paging
 */
$sLimit = "";
if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
    $sLimit = "LIMIT " . addslashes($_GET['iDisplayStart']) . ", " .
            addslashes($_GET['iDisplayLength']);
}


/*
 * Ordering
 */
if (isset($_GET['iSortCol_0'])) {
    $sOrder = "ORDER BY  ";
    for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
        if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
            $sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
				 	" . addslashes($_GET['sSortDir_' . $i]) . ", ";
        }
    }

    $sOrder = substr_replace($sOrder, "", -2);
    if ($sOrder == "ORDER BY") {
        $sOrder = "";
    }
}


/*
 * Filtering
 * NOTE this does not match the built-in DataTables filtering which does it
 * word by word on any field. It's possible to do here, but concerned about efficiency
 * on very large tables, and MySQL's regex functionality is very limited
 */
$sWhere = "";
if ($_GET['sSearch'] != "") {
    $sWhere = "(";
    for ($i = 0; $i < count($bColumns); $i++) {
        $sWhere .= $bColumns[$i] . " LIKE '%" . addslashes($_GET['sSearch']) . "%' OR ";
    }
    $sWhere .= " (SELECT CONCAT( COALESCE(users.first_name,''), ' ', COALESCE(users.last_name,'') ) as rn from users where u.reports_to_id=users.id) LIKE '%" . addslashes($_GET['sSearch']) . "%' OR ";
    $sWhere = substr_replace($sWhere, "", -3);
    $sWhere .= ') AND';
}

/* Individual column filtering */
for ($i = 0; $i < count($bColumns); $i++) {
    if ($_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
        if ($sWhere == "") {
            $sWhere = "WHERE ";
        } else {
            $sWhere .= " AND ";
        }
        $sWhere .= $bColumns[$i] . " LIKE '%" . addslashes($_GET['sSearch_' . $i]) . "%' ";
    }
}

//	$c_fid=$_GET['copy_from'];
/*
 * SQL queries
 * Get data to display
 */
$sQuery = "SELECT SQL_CALC_FOUND_ROWS DISTINCT u.id, (SELECT CONCAT( COALESCE(users.first_name
,''), ' ', COALESCE(users.last_name,'') ) as rn from users where u
.reports_to_id=users.id) AS report_name, CONCAT( COALESCE(u.first_name,''), ' ', COALESCE(u.last_name,'') ) AS name,  u.id AS id, u.title AS title, u.department AS department, u.reports_to_id AS reports_to_id, ea.email_address AS email FROM user_preferences AS up LEFT JOIN users AS u ON u.id = up.assigned_user_id LEFT JOIN email_addr_bean_rel AS ebr ON ebr.bean_id = u.id LEFT JOIN email_addresses AS ea ON ea.id = ebr.email_address_id where " . $sWhere . " u.deleted = '0' AND up.deleted =0 AND up.category = 'Home' AND ebr.bean_module = 'Users' AND ebr.deleted = '0' AND u.id != '" . $_GET['copy_from'] . "' " . $sOrder . " " . $sLimit . "";

//~ $sQuery = "
//~ SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
//~ FROM   $sTable
//~ $sWhere
//~ $sOrder
//~ $sLimit
//~ ";
//	$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
$rResult = $db->query($sQuery);
/* Data set length after filtering */
$sQuery = "SELECT FOUND_ROWS() as iFilteredTotal";
$rResultFilterTotal = $db->query($sQuery);
$aResultFilterTotal = $db->fetchByAssoc($rResultFilterTotal);
$iFilteredTotal = $aResultFilterTotal['iFilteredTotal'];
//	$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
//	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
//	$iFilteredTotal = $aResultFilterTotal[0];

/* Total data set length */
$sQuery = "SELECT COUNT(" . $sIndexColumn . ")as iTotal
		FROM   $sTable deleted='0'";
$rResultTotal = $db->query($sQuery);
$aResultTotal = $db->fetchByAssoc($rResultTotal);
$iTotal = $aResultTotal['iTotal'];
//	$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
//	$aResultTotal = mysql_fetch_array($rResultTotal);
//	$iTotal = $aResultTotal[0];


/*
 * Output
 */
$output = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData" => array()
);

while ($aRow = $db->fetchByAssoc($rResult)) {
    $row = array();
    //$row[]="";
    if ($_GET['user_selected'] == "all_selected") {
        $row[] = "<input type='checkbox' name='user_list[]' class='user_checkbox' value='" . $aRow['id'] . "' id='user_list_" . $aRow['id'] . "' checked='checked' disabled='disabled'>";
    } else {
        $row[] = "<input type='checkbox' name='user_list[]' class='user_checkbox' value='" . $aRow['id'] . "' id='user_list_" . $aRow['id'] . "'>";
    }


    for ($i = 0; $i < count($aColumns); $i++) {
        if ($aColumns[$i] == "name") {
            /* Special output formatting for 'version' column */
            $row[] = "<a href='index.php?module=Users&action=DetailView&record=" . $aRow['id'] . "' target='_blank'>" . $aRow[$aColumns[$i]] . "</a>";
        } else if ($aColumns[$i] != ' ') {
            /* General output */
            $row[] = $aRow[$aColumns[$i]];
        }
    }

    $output['aaData'][] = $row;
}

echo json_encode($output);
?>
