<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class HideDeleteButton {
	
	public function hide_delete_button() {
		
		
		global $db, $current_user;
		
		
		if(!is_admin($current_user)) {
			if($GLOBALS['app']->controller->action == 'listview') {
				
				echo $js = <<<HIDE
					<script>
						//$('li > #delete_listview_bottom').hide();
						//$('li > #delete_listview_top').hide();
					</script>
				
HIDE;
				
			}
		}
	}
	
}
