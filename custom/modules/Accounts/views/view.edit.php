<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');
require_once('modules/Accounts/views/view.edit.php');

class CustomAccountsViewEdit extends ViewEdit 
{
	function CustomAccountsViewEdit()
	{
		parent::ViewEdit();
	}

	public function display()
	{
		/*
		This modification hides/shows panels in the Accounts EditView (and DetailView with similar changes)
		based on the value selected for account_type.
		With this feature, you can have different account_types with different data displayed.
		I normally have the first page/tab common to all account_types
		and then have the second page/tab (and subsequent ones if present) change, based on the account_type
		Because of the way SugarCRM displays tabs versus panels, 
		- this will hide the contents of but not the title of a tab
		- this will hide both the contents of and title of a panel
		so I set the second tab with one common panel which all account_types display
		and then hide/show other panels on the second tab based on account_type

		To see what EditView panel names are used for the current EditView:
		- look in <sugar_root>/modules/Accounts/metadata/editviewdefs.php (for original panel names)
		- look in <sugar_root>/custom/modules/Accounts/metadata/editviewdefs.php (for user-created panel names)
		Make sure to use All-Caps when entering the panel name, even if the name shown above
		contains lower-case letters.
		*/

		$PreLoad = 'document.getElementById(\'account_type\').onchange();';

$js=<<<EOQ
		<script type="text/javascript">
			document.getElementById("account_type").onchange = function() 
			{
				var AccTypeVar = document.getElementsByName('account_type')[0].value;

				switch(AccTypeVar)
				{
					case 'FacilitatorCo':
						$('#LBL_EVENT_FACILITATOR_CO').parent().show();
						$('#LBL_EVENT_CATERER').parent().hide();
						$('#LBL_EVENT_VENUE').parent().hide();
						// alert("The account_type chosen was " + AccTypeVar + "\\nOnly the panels relevant to " + AccTypeVar + " will be displayed");
						break;
					case 'Caterer':
						$('#LBL_EVENT_FACILITATOR_CO').parent().hide();
						$('#LBL_EVENT_CATERER').parent().show();
						$('#LBL_EVENT_VENUE').parent().hide();
						// alert("The account_type chosen was " + AccTypeVar + "\\nOnly the panels relevant to " + AccTypeVar + " will be displayed");
						break;
					case 'Venue':
						$('#LBL_EVENT_FACILITATOR_CO').parent().hide();
						$('#LBL_EVENT_CATERER').parent().hide();
						$('#LBL_EVENT_VENUE').parent().show();
						// alert("The account_type chosen was " + AccTypeVar + "\\nOnly the panels relevant to " + AccTypeVar + " will be displayed");
						break;
					default:
						$('#LBL_EVENT_FACILITATOR_CO').parent().hide();
						$('#LBL_EVENT_CATERER').parent().hide();
						$('#LBL_EVENT_VENUE').parent().hide();
						// alert("The account_type chosen was " + AccTypeVar + "\\nThe standard panels will be displayed");
				}

			}
		$PreLoad;
		</script>
EOQ;

		$js2=<<<EOD
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script type="text/javascript">
				var count=0;
										
				$("#educational_institution_c").click(function () {
				
					var edu = $('input:checkbox[name=educational_institution_c]').is(':checked');					
					if(edu == true){					
						count++;
					}
					else{
						count =count-1;
					}					
					checkBoxCount(count);
				});
				
				$("#hospital_c").click(function () {
					var hosp = $('input:checkbox[name=hospital_c]').is(':checked');					
					if(hosp == true){					
						count++;
					}
					else{
						count =count-1;
					}					
					checkBoxCount(count);
				});
				
				$("#contractor_c").click(function () {
					var contractor = $('input:checkbox[name=contractor_c]').is(':checked');					
					if(contractor == true){					
						count++;
					}
					else{
						count =count-1;
					}					
					checkBoxCount(count);
				});
				
				$("#retail_c").click(function () {
					var retail = $('input:checkbox[name=retail_c]').is(':checked');					
					if(retail == true){					
						count++;
					}
					else{
						count =count-1;
					}					
					checkBoxCount(count);
				});
								
				$("#others_c").click(function () {
					var others = $('input:checkbox[name=others_c]').is(':checked');					
					if(others == true){					
						count++;
					}
					else{
						count =count-1;
					}					
					checkBoxCount(count);
				});
				$("#sports_c").click(function () {
					var sports = $('input:checkbox[name=sports_c]').is(':checked');					
					if(sports == true){					
						count++;
					}
					else{
						count =count-1;
					}					
					checkBoxCount(count);
				});
				
				$("#hotel_c").click(function () {
					var hotel = $('input:checkbox[name=hotel_c]').is(':checked');					
					if(hotel == true){					
						count++;
					}
					else{
						count =count-1;
					}					
					checkBoxCount(count);
				});
				
				$("#builder_c").click(function () {
					var builder = $('input:checkbox[name=builder_c]').is(':checked');					
					if(builder == true){					
						count++;
					}
					else{
						count =count-1;
					}					
					checkBoxCount(count);
				});
				$("#pharmaceutical_c").click(function () {
					var pharmaceutical = $('input:checkbox[name=pharmaceutical_c]').is(':checked');					
					if(pharmaceutical == true){					
						count++;
					}
					else{
						count =count-1;
					}					
					//alert(count);
					checkBoxCount(count);
				});	

				function checkBoxCount(count){
					var checkBoxCount =count;
					alert(checkBoxCount);
					if(count >0)
						return true;
					else
						return false;
				}
			</script>
			
			
EOD;

		parent::display();
		echo $js;
		//echo $js2;
	}
}
?>