<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class Arch_Architectural_FirmViewDetail extends ViewDetail {


 	function Arch_Architectural_FirmViewDetail(){
 		parent::ViewDetail();
 	}
 	function display(){
		echo $js = <<<EOD
		<script>
		$(document).ready(function(){
			$('#whole_subpanel_arch_architectural_firm_opportunities_1').hide();
		});
		</script>
EOD;
			parent::display();
		
		}
		
}



