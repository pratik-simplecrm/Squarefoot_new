<?php

require_once('include/MVC/View/views/view.list.php');
require_once('modules/Tasks/TasksListViewSmarty.php');

class TasksViewList extends ViewList
{
    /**
     * @see ViewList::preDisplay()
     */
    public function preDisplay(){
         parent::preDisplay();

          }
  	function display()
 	{
		
		parent::display();
 	}

}

?>
