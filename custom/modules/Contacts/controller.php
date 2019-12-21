<?php
require_once('include/MVC/Controller/SugarController.php');
class ContactsController extends SugarController
{
    function ContactsController(){
		parent::SugarController();
	}
  function action_popup(){
    global $current_user;
        if(!empty($_REQUEST['account_id']))
          $_SESSION[$current_user->id]=$_REQUEST['account_id'];
        //#END

	   require_once('custom/modules/Contacts/Contacts_InPopupView.php');
		 $this->view_object_map['bean'] = $this->bean;
		 $this->view = 'popup';
		 $GLOBALS['view'] = $this->view;
		 $this->bean = new Contacts_InPopupView(); 
    }
}
