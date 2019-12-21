<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class quote_ProductsViewEdit extends ViewEdit
{
 	public function __construct()
 	{
 		parent::ViewEdit();
 		$this->useForSubpanel = true;
 		$this->useModuleQuickCreateTemplate = true;

 	}
 	function display()
 	{
    echo $js =<<<EOD
    <script>
    $(document).ready(function(){
      $('#hsn_code_c').hide();
      $('#hsn_code_c_label').parent().hide();
      $('#sac_code_c').hide();
      $('#sac_code_c_label').parent().hide();
      var type = $('#type_c').val();

       
      if(type=='Products')
      {
        $('#hsn_code_c').show();
        $('#hsn_code_c_label').parent().show();
        $('#sac_code_c').hide();
        $('#sac_code_c_label').parent().hide();
      }
      else if(type=='Installation')
      {
        $('#hsn_code_c').hide();
        $('#hsn_code_c_label').parent().hide();
        $('#sac_code_c').show();
        $('#sac_code_c_label').parent().show();
      }
      else {
        $('#hsn_code_c').hide();
        $('#hsn_code_c_label').parent().hide();
        $('#sac_code_c').hide();
        $('#sac_code_c_label').parent().hide();
      }
      $('#type_c').change(function(){
        var type = $('#type_c').val();
        if(type=='Products')
        {
          $('#hsn_code_c').show();
          $('#hsn_code_c_label').parent().show();
          $('#sac_code_c').hide();
          $('#sac_code_c_label').parent().hide();
        }
        else if(type=='Installation')
        {
          $('#hsn_code_c').hide();
          $('#hsn_code_c_label').parent().hide();
          $('#sac_code_c').show();
          $('#sac_code_c_label').parent().show();
        }
        else {
          $('#hsn_code_c').hide();
          $('#hsn_code_c_label').parent().hide();
          $('#sac_code_c').hide();
          $('#sac_code_c_label').parent().hide();
        }
      });
    });
    </script>
EOD;
/*Written By: Anjali Ledade dated on: 28-06-2019 To convert unti price into Euro*/
    echo $inr = <<<INR
     <script>
    $(document).ready(function(){
        var priceValueINR = $("#unit_price_c").val();
      priceValueINR1 = parseFloat(priceValueINR.replace(",",""));
      if(priceValueINR1 > 0){

             INRvalue = (priceValueINR1 * 0.01276).toFixed(2);
            // alert(INRvalue);
             $("#unit_price_euro_c").val(INRvalue);
          }

   

     $("#unit_price_c").on("keyup", function() {
   //alert($(this).val()); 
      var priceValueINR = $(this).val();
      priceValueINR1 = parseFloat(priceValueINR.replace(",",""));


   //alert(priceValueINR1);
      if(priceValueINR1 > 0){

             INRvalue = (priceValueINR1 * 0.01276).toFixed(2);
            // alert(INRvalue);
             $("#unit_price_euro_c").val(INRvalue);
          }
});
});
       </script>
INR;
//written by pratik on 08072019 (to hide and show SQM/Box field)
echo $SQM = <<<SQM
     <script>
    $(document).ready(function(){
		var dropdown_val = $('#uom_c :selected').text();
		if(dropdown_val=='SQM')
		{
			$('#sqm_value_c_label').css('visibility','visible');
			$('#sqm_value_c').show();
		}else{
				$('#sqm_value_c').hide();
				$('#sqm_value_c_label').css('visibility','hidden');
				
		}	
		$("#uom_c").change(function(){
		var box_size = $(this).children("option:selected").val();
		if(box_size == 'SQM')
		{
			    $('#sqm_value_c_label').css('visibility','visible');
				$('#sqm_value_c').show();
				
		}else{
			$('#sqm_value_c').hide();
			$('#sqm_value_c_label').css('visibility','hidden');
		}
});
});
       </script>
SQM;
    		parent::display();
	}
}
?>
