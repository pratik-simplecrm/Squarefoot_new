<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

// If the Account Type is NOT FacilitatorCo or Venue or Caterer, we will not be displaying the Events subpanels (accounts_contacts_99 or evmgr_evs_contacts).
// If the Account Type is NOT Venue or Caterer, we will not be displaying the ForVenues or ForCaterers subpanels (accounts_accounts_99)
//     If the Account Type is Venue we will be showing the ForVenues subpanel and NOT the ForCaterers subpanel (handled in different script in view.edit and view.detail)
//     If the Account Type is Caterer we will be showing the ForCaterers subpanel and NOT the ForVenues subpanel (handled in different script in view.edit and view.detail) 
// Get the subpanel names for built-in subpanels from <Sugar_Directory>/modules/Accounts/metadata/subpaneldefs.php
// Get the subpanel names for added subpanels (after Installing the Published package) from <Sugar_Directory>/custom/Extension/modules/Accounts/Ext/Layoutdefs/<subpanel_def_file>
// or  (before installing Published Package) from <Sugar_Directory>/custom/modulebuilder/packages/Event_Manager/modules/<module>/relationships.php
if ( $this->_focus->account_type  !=  'FacilitatorCo'  &&  $this->_focus->account_type  !=  'Venue'  &&  $this->_focus->account_type  !=  'Caterer'   ) 
{
//  unset($layout_defs['Accounts']['subpanel_setup']['evmgr_evs_accounts']);
//  (Commented out; Code left in for future reference and to show that it was intentionally left out, not forgotten)
//  unset($layout_defs['Accounts']['subpanel_setup']['accounts_contacts_99']);
}
if ($this->_focus->account_type  !=  'Venue'  &&  $this->_focus->account_type  !=  'Caterer'   ) 
{
    unset($layout_defs['Accounts']['subpanel_setup']['accounts_accounts_99']);
}
if ($this->_focus->account_type  !=  'Venue' ) 
{
    unset($layout_defs['Accounts']['subpanel_setup']['evmgr_venrms_accounts']);
}
?>
