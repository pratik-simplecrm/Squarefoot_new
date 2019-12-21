<?php
/* 
	Created By: Pratik Tambekar
	Description: Created for Upload file size must be less than or equal to 2MB 
*/
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.edit.php');
//require_once('modules/Accounts/AccountsListViewSmarty.php');
error_reporting('Off');
class DocumentsViewEdit extends ViewEdit
{
    /**
     * @see ViewList::preDisplay()
     */
	var $useForSubpanel = true;  //boolean variable to determine whether view can be used for subpanel creates
    var $useModuleQuickCreateTemplate = true;	 //boolean variable to determine whether or not SubpanelQuickCreate has a separate display 
    public function preDisplay(){
         parent::preDisplay();

          }
  	function display()
 	{
		 global $db, $current_user, $sugar_config;
		 $flag = 0;
		  $doc_id = $this->bean->id;
		  
		 echo $choose_file=<<<CFILE
		<script>
			$(document).ready(function(){
			
				$("#filename_file").change(function(){
					const fi = document.getElementById('filename_file'); 
					// Check if any file is selected. 
					if (fi.files.length > 0) { 
						for (const i = 0; i <= fi.files.length - 1; i++) { 
			  
							const fsize = fi.files.item(i).size; 
							const file = Math.round((fsize / 1024)); 
							// The size of the file. 
							if (file >= 2048) { 
								alert( 
								  "File too Big, please select a file less than or equal to 2MB"); 
								  $("#filename_file").val('');
							} /* else{
								document.getElementById('filename_file').innerHTML = '<b>'
								+ file + '</b> KB'; 
							}  */
						} 
					} 
				 
	         
});
});
		</script>
CFILE;
		parent::display();
 	}

}
?>