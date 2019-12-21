<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class Arch_Architects_ContactsViewDetail extends ViewDetail {


 	function Arch_Architects_ContactsViewDetail(){
 		parent::ViewDetail();
 	}
 	function display(){
		echo $js = <<<EOD
		<script>
		$(document).ready(function(){
			$('#whole_subpanel_arch_architects_contacts_opportunities_1').hide();
		});
		</script>
EOD;
			parent::display();
		
		}
		
}



