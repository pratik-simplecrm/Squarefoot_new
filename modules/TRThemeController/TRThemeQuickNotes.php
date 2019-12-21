<?php

class TRThemeQuickNotes {

    public static function getQuickNotesForBean($lastN = 10) {
        global $current_user, $db, $beanFiles, $beanList;
        $quicknotes = array();

        if ($GLOBALS['db']->dbType == 'mssql'){
            $quicknotesRes = $db->query("SELECT TOP $lastN qn.*,u.user_name FROM trquicknotes AS qn LEFT JOIN users AS u ON u.id=qn.user_id WHERE qn.bean_id='{$_REQUEST['record']}' AND qn.bean_type='{$_REQUEST['currentModule']}' AND (qn.user_id = '".$current_user->id."' OR qn.trglobal = '1') AND qn.deleted = 0 ORDER BY qn.trdate DESC");
        }else{
            $quicknotesRes = $db->limitQuery("SELECT qn.*,u.user_name FROM trquicknotes AS qn LEFT JOIN users AS u ON u.id=qn.user_id WHERE qn.bean_id='{$_REQUEST['record']}' AND qn.bean_type='{$_REQUEST['currentModule']}' AND (qn.user_id = '".$current_user->id."' OR qn.trglobal = '1') AND qn.deleted = 0 ORDER BY qn.trdate DESC", 0, $lastN);
        }

        if ($GLOBALS['db']->dbType == 'mssql' || $db->getRowCount($quicknotesRes) > 0) {
			while ( $thisQuickNote = $db->fetchByAssoc($quicknotesRes)) {
				$quicknotes[]=array(
							'id' => $thisQuickNote['id'],
							'user_id' => $thisQuickNote['user_id'],
							'user_name' => $thisQuickNote['user_name'],
							'own' => ($thisQuickNote['user_id']==$current_user->id || $current_user->is_admin) ? '1' : '0',
							'date' => $GLOBALS['timedate']->to_display_date_time($thisQuickNote['trdate']),
							'text' => nl2br($thisQuickNote['text']),
							'global' => $thisQuickNote['trglobal']
						);
			}
		}

		return json_encode($quicknotes);
	}

	public static function getQuickNotesCount($lastN = 10){
        global $current_user, $db;
        $quicknotesRec = $db->fetchByAssoc($db->query("SELECT count(*) AS noteCount FROM trquicknotes WHERE bean_id='{$_REQUEST['record']}' AND bean_type='{$_REQUEST['module']}'  AND (user_id = '".$current_user->id."' OR trglobal = '1') AND deleted = 0"));

        return $quicknotesRec['noteCount'];
	}

	public static function saveQuickNote() {
		global $current_user, $db;
		$guid = create_guid();
		$db->query("INSERT INTO trquicknotes (id, bean_type, bean_id, user_id, trdate, trglobal, text, deleted) VALUES ('{$guid}', '{$_REQUEST['currentModule']}', '{$_REQUEST['record']}', '".$current_user->id."', '" . gmdate('Y-m-d H:i:s') . "', {$_REQUEST['global']}, '{$_REQUEST['text']}', 0)");
		$quicknotes[]=array(
				'id' => $guid,
				'user_id' => $current_user->id,
				'user_name' => $current_user->user_name,
				'date' => $GLOBALS['timedate']->to_display_date_time(gmdate('Y-m-d H:i:s')),
				'text' => nl2br($_REQUEST['text']),
				'global' => $_REQUEST['global']
		);
		return json_encode($quicknotes);
	}

	public static function editQuickNote() {
		global $current_user, $db;
		$db->query("UPDATE trquicknotes SET text = '{$_REQUEST['text']}', trglobal = '{$_REQUEST['global']}' WHERE id = '{$_REQUEST['id']}'" . (!$current_user->is_admin ? " AND user_id='".$current_user->id."'":""));
		return true;
	}
	public static function deleteQuickNote() {
		global $current_user, $db;
		$db->query("UPDATE trquicknotes SET deleted = 1 WHERE id='{$_REQUEST['id']}'" . (!$current_user->is_admin ? " AND user_id='".$current_user->id."'":""));
	}
}