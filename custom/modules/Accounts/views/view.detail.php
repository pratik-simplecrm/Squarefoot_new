<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.detail.php');
class AccountsViewDetail extends ViewDetail {
	   
function AccountsViewDetail() {
 		parent::ViewDetail();
 	}

    public function display() {
		//$id = $_REQUEST['record'];
         $js1 = <<<YUO
	<script>
	//var j=0,k=0;
	$(document).ready(function(){
		$('#whole_subpanel_accounts_quote_quote_1').hide();
		$('#whole_subpanel_account_aos_quotes').hide();
		
});
	</script>
YUO;
echo $js1;

 parent::display();
	}
}
?>
