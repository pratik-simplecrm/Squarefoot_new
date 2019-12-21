<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class quote_ProductsViewDetail extends ViewDetail {


 	function quote_ProductsViewDetail(){
 		parent::ViewDetail();
 	}
 	function display(){
		echo $js = <<<EOD
		<script>
		$(document).ready(function(){
			  var type = $('#type_c').val();
        if(type =='Products')
        {
          $('#sac_code_c').parent().parent().append('<td></td><td></td>');
  				$('#sac_code_c').parent().prev().hide();
  				$('#sac_code_c').parent().hide();
        }
        else if(type =='Installation')
        {
          $('#hsn_code_c').parent().parent().append('<td></td><td></td>');
          $('#hsn_code_c').parent().prev().hide();
          $('#hsn_code_c').parent().hide();
        }
        else
        {
          $('#sac_code_c').parent().parent().append('<td></td><td></td>');
  				$('#sac_code_c').parent().prev().hide();
  				$('#sac_code_c').parent().hide();
          $('#hsn_code_c').parent().parent().append('<td></td><td></td>');
          $('#hsn_code_c').parent().prev().hide();
          $('#hsn_code_c').parent().hide();
        }
		});
		</script>
EOD;
			parent::display();

		}

}
