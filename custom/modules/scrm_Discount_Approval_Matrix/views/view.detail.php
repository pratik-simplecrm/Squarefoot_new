<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.detail.php');
class scrm_Discount_Approval_MatrixViewDetail extends ViewDetail {
	   
function scrm_Discount_Approval_MatrixViewDetail() {
 		parent::ViewDetail();
 	}

    public function display() {
		//$id = $_REQUEST['record'];
         $js1 = <<<YUO
	<script>
	//var j=0,k=0;
	$(document).ready(function(){
		var approval_level = $('#approval_levels_c').val();
		
		//alert(escalationlevel);
		if(approval_level.indexOf('Level1') != -1){
			
			$('#detailpanel_2').show();
		}
		else{
			$('#detailpanel_2').hide();
		}
		if(approval_level.indexOf('Level2') != -1){
			
			$('#detailpanel_3').show();
		}
		else{
			$('#detailpanel_3').hide();
		}
		if(approval_level.indexOf('Level3') != -1){
			
			$('#detailpanel_4').show();
		}
		else{
			$('#detailpanel_4').hide();
		}
});
	</script>
YUO;
echo $js1;

 parent::display();
	}
}
?>
