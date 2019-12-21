<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


// If the Account Type is NOT FacilitatorCo or Venue or Caterer, we will not be displaying the Events subpanels (accounts_contacts_99 or evmgr_evs_contacts).
// Note: Neither of these is the subanel showing who attended Events.  That subpanel connects to Contacts from EvMgr_EvParts.
// The evmgr_evs_contacts subpanel shows people who worked an event.  They may or may not be full-time employees of a facilitator, caterer or venue company.
// The accounts_contacts_99 subpanel shows people who worked on a contract basis for a facilitatorCo, venue or caterer.  They would not be full-time employees of a facilitator, caterer or venue company so would not be captured via that relationship.


if ( $this->_focus->account_type_imported  !=  'FacilitatorCo'  &&  $this->_focus->account_type_imported  !=  'Venue'  &&  $this->_focus->account_type_imported  !=  'Caterer'   ) 
{
//  (Commented out; Code left in for future reference and to show that it was intentionally left out, not forgotten)
//	unset($layout_defs['Contacts']['subpanel_setup']['evmgr_evs_contacts']);
//   unset($layout_defs['Contacts']['subpanel_setup']['accounts_contacts_99']);
}
if ( $this->_focus->account_type_imported  !=  'FacilitatorCo' ) 
{
    unset($layout_defs['Contacts']['subpanel_setup']['evmgr_pgms_contacts']);
}

// If the Account Type is NOT Venue, we will not be displaying The Venue Rooms Contacts subpanels
// Get the correct subpanel names from the relationship definitions in Module Builder
if ( $this->_focus->account_type_imported  !=  'Venue' ) 
{
    unset($layout_defs['Contacts']['subpanel_setup']['evmgr_venrms_contacts']);
}

//	(Commented out; Code left in for future reference and to show that it was intentionally left out, not forgotten)
//	If the Account Type is NOT Caterer, we will not be displaying The Caterer Contacts subpanels
//	Get the correct subpanel names from the relationship definitions in Module Builder
if ( $this->_focus->account_type_imported  !=  'Caterer' ) 
{
//    unset($layout_defs['Contacts']['subpanel_setup']['evmgr_evs_contacts_2']);
}
?>
