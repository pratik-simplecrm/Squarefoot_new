<?php
// created: 2019-12-09 04:15:43
$mod_strings = array (
  'LBL_ID' => 'ID',
  'LBL_DATE_ENTERED' => 'Date Created',
  'LBL_DATE_MODIFIED' => 'Date Modified',
  'LBL_MODIFIED' => 'Modified By',
  'LBL_MODIFIED_ID' => 'Modified by ID',
  'LBL_MODIFIED_NAME' => 'Modified by User Name',
  'LBL_CREATED' => 'Created By',
  'LBL_CREATED_ID' => 'Created by ID',
  'LBL_DESCRIPTION' => 'Description:',
  'LBL_DELETED' => 'Deleted',
  'LBL_NAME' => 'Opportunity Name',
  'LBL_CREATED_USER' => 'Created User',
  'LBL_MODIFIED_USER' => 'Modified User',
  'LBL_LIST_NAME' => 'Name',
  'LBL_EDIT_BUTTON' => 'Edit',
  'LBL_REMOVE' => 'Remove',
  'LBL_ASSIGNED_TO_ID' => 'Assigned User:',
  'LBL_ASSIGNED_TO_NAME' => 'Assigned to:',
  'LBL_SECURITYGROUPS' => 'Security Groups',
  'LBL_SECURITYGROUPS_SUBPANEL_TITLE' => 'Security Groups',
  'LBL_MODULE_NAME' => 'Opportunities',
  'LBL_MODULE_TITLE' => 'Opportunities: Home',
  'LBL_SEARCH_FORM_TITLE' => 'Opportunity Search',
  'LBL_VIEW_FORM_TITLE' => 'Opportunity View',
  'LBL_LIST_FORM_TITLE' => 'Opportunity List',
  'LBL_OPPORTUNITY_NAME' => 'Opportunity Name:',
  'LBL_OPPORTUNITY' => 'Opportunity:',
  'LBL_INVITEE' => 'Contacts',
  'LBL_CURRENCIES' => 'Currencies',
  'LBL_LIST_OPPORTUNITY_NAME' => 'Name',
  'LBL_LIST_ACCOUNT_NAME' => 'Customer Name',
  'LBL_LIST_AMOUNT' => 'Opportunity Amount',
  'LBL_LIST_AMOUNT_USDOLLAR' => 'Amount',
  'LBL_LIST_DATE_CLOSED' => 'Expected Close Date',
  'LBL_LIST_SALES_STAGE' => 'Sales Stage',
  'LBL_ACCOUNT_ID' => 'Account ID',
  'LBL_CURRENCY_ID' => 'Currency ID',
  'LBL_CURRENCY_NAME' => 'Currency Name',
  'LBL_CURRENCY_SYMBOL' => 'Currency Symbol',
  'db_sales_stage' => 'LBL_LIST_SALES_STAGE',
  'db_name' => 'LBL_NAME',
  'db_amount' => 'LBL_LIST_AMOUNT',
  'db_date_closed' => 'LBL_LIST_DATE_CLOSED',
  'UPDATE' => 'Opportunity - Currency Update',
  'UPDATE_DOLLARAMOUNTS' => 'Update U.S. Dollar Amounts',
  'UPDATE_VERIFY' => 'Verify Amounts',
  'UPDATE_VERIFY_TXT' => 'Verifies that the amount values in opportunities are valid decimal numbers with only numeric characters(0-9) and decimals(.)',
  'UPDATE_FIX' => 'Fix Amounts',
  'UPDATE_FIX_TXT' => 'Attempts to fix any invalid amounts by creating a valid decimal from the current amount. Any modified amount is backed up in the amount_backup database field. If you run this and notice bugs, do not rerun it without restoring from the backup as it may overwrite the backup with new invalid data.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Update the U.S. Dollar amounts for opportunities based on the current set currency rates. This value is used to calculate Graphs and List View Currency Amounts.',
  'UPDATE_CREATE_CURRENCY' => 'Creating New Currency:',
  'UPDATE_VERIFY_FAIL' => 'Record Failed Verification:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Current Amount:',
  'UPDATE_VERIFY_FIX' => 'Running Fix would give',
  'UPDATE_INCLUDE_CLOSE' => 'Include Closed Records',
  'UPDATE_VERIFY_NEWAMOUNT' => 'New Amount:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'New Currency:',
  'UPDATE_DONE' => 'Done',
  'UPDATE_BUG_COUNT' => 'Bugs Found and Attempted to Resolve:',
  'UPDATE_BUGFOUND_COUNT' => 'Bugs Found:',
  'UPDATE_COUNT' => 'Records Updated:',
  'UPDATE_RESTORE_COUNT' => 'Record Amounts Restored:',
  'UPDATE_RESTORE' => 'Restore Amounts',
  'UPDATE_RESTORE_TXT' => 'Restores amount values from the backups created during fix.',
  'UPDATE_FAIL' => 'Could not update - ',
  'UPDATE_NULL_VALUE' => 'Amount is NULL setting it to 0 -',
  'UPDATE_MERGE' => 'Merge Currencies',
  'UPDATE_MERGE_TXT' => 'Merge multiple currencies into a single currency. If there are multiple currency records for the same currency, you merge them together. This will also merge the currencies for all other modules.',
  'LBL_ACCOUNT_NAME' => 'Customer Name:',
  'LBL_AMOUNT' => 'Opportunity Amount:',
  'LBL_AMOUNT_USDOLLAR' => 'Amount:',
  'LBL_CURRENCY' => 'Currency:',
  'LBL_DATE_CLOSED' => 'Expected Close Date:',
  'LBL_TYPE' => 'Type:',
  'LBL_CAMPAIGN' => 'Campaign:',
  'LBL_NEXT_STEP' => 'Next Step:',
  'LBL_LEAD_SOURCE' => 'Showroom Walk in Source',
  'LBL_SALES_STAGE' => 'Sales Stage:',
  'LBL_PROBABILITY' => 'Probability (%):',
  'LBL_DUPLICATE' => 'Possible Duplicate Opportunity',
  'MSG_DUPLICATE' => 'The opportunity record you are about to create might be a duplicate of a opportunity record that already exists. Opportunity records containing similar names are listed below.<br>Click Save to continue creating this new opportunity, or click Cancel to return to the module without creating the opportunity.',
  'LBL_NEW_FORM_TITLE' => 'Create Opportunity',
  'LNK_NEW_OPPORTUNITY' => 'Create Opportunity',
  'LNK_OPPORTUNITY_LIST' => 'View Opportunities',
  'ERR_DELETE_RECORD' => 'A record number must be specified to delete the opportunity.',
  'LBL_TOP_OPPORTUNITIES' => 'My Top Open Opportunities',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Are you sure you want to remove this contact from the opportunity?',
  'OPPORTUNITY_REMOVE_PROJECT_CONFIRM' => 'Are you sure you want to remove this opportunity from the project?',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Opportunities',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activities',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'History',
  'LBL_RAW_AMOUNT' => 'Raw Amount',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Showroom Walk in',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Contacts',
  'LBL_DOCUMENTS_SUBPANEL_TITLE' => 'Documents',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Projects',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Assigned User',
  'LBL_MY_CLOSED_OPPORTUNITIES' => 'My Closed Opportunities',
  'LBL_TOTAL_OPPORTUNITIES' => 'Total Opportunities',
  'LBL_CLOSED_WON_OPPORTUNITIES' => 'Closed Won Opportunities',
  'LBL_CAMPAIGN_OPPORTUNITY' => 'Campaigns',
  'LBL_PROJECT_SUBPANEL_TITLE' => 'Projects',
  'LABEL_PANEL_ASSIGNMENT' => 'Assignment',
  'LNK_IMPORT_OPPORTUNITIES' => 'Import Opportunities',
  'LBL_EDITLAYOUT' => 'Edit Layout',
  'LBL_EXPORT_CAMPAIGN_ID' => 'Campaign ID',
  'LBL_OPPORTUNITY_TYPE' => 'Opportunity Type',
  'LBL_EXPORT_ASSIGNED_USER_NAME' => 'Assigned User Name',
  'LBL_EXPORT_ASSIGNED_USER_ID' => 'Assigned User ID',
  'LBL_EXPORT_MODIFIED_USER_ID' => 'Modified By ID',
  'LBL_EXPORT_CREATED_BY' => 'Created By ID',
  'LBL_EXPORT_NAME' => 'Name',
  'LBL_CONTACT_HISTORY_SUBPANEL_TITLE' => 'Related Contacts\' Emails',
  'TWITTER_USER_C' => 'Twitter User',
  'LBL_AOS_CONTRACTS' => 'Contracts',
  'LBL_AOS_QUOTES' => 'Quotes',
  'LBL_ACCOUNTS' => 'Customers',
  'LBL_LEADS' => 'Showroom Walk in',
  'LBL_FLOORING_TYPE' => 'Flooring Type',
  'LBL_QUOTE_QUOTES_OPPORTUNITIES_FROM_QUOTE_QUOTES_TITLE' => 'quote_Quotes Old',
  'LBL_CLOSURE_DATE' => 'Closure Date',
  'LBL_TEAM_NAME_TEAM_ID' => 'Assigned Team (related  ID)',
  'LBL_TEAM_NAME' => 'Assigned Team',
  'LBL_EDITVIEW_PANEL1' => 'Others',
  'LBL_QUOTE_QUOTE_OPPORTUNITIES_FROM_QUOTE_QUOTE_TITLE' => 'Quote',
  'LBL_LAST_CONTACTED_DATE' => 'Last Contacted Date',
  'LBL_OPPORTUNITIES_SIMPL_FEED_BACK_FORM_1_FROM_SIMPL_FEED_BACK_FORM_TITLE' => 'Feed Back Form',
  'LBL_ACTUAL_DATE_CLOSED' => 'Actual Date Closed',
  'LBL_UPLOAD_PO_COPY' => 'Upload PO Copy',
  'LBL_UPLOAD_PO_COPY_NOTE_ID' => 'Upload PO Copy (related Note ID)',
  'LBL_UPLOAD_QUOTE_CSTM_ACTIVITY_COUNT_ID' => 'Upload Quote (related  ID)',
  'LBL_UPLOAD_QUOTE' => 'Upload Quote',
  'LBL_UPLOAD_DOCUMENTS' => 'Upload Documents',
  'LBL_ATTACHMENT' => 'Attachment',
  'LBL_NEWATTACHEMENT' => 'newattachement',
  'LBL_ATTAHMENT' => 'Attachment',
  'LBL_FILENAME' => 'Opportunity Attachment',
  'LBL_OPPORTUNITIES_CASES_1_FROM_CASES_TITLE' => 'Cases',
  'LBL_SUPERVISOR_USER_ID' => 'Supervisor (related User ID)',
  'LBL_SUPERVISOR' => 'Supervisor',
  'LBL_MEETINGTYPE' => 'Meeting Type',
  'LBL_REASONFORRSCHEDULE' => 'Reason for Re-schedule',
  'LBL_EDITVIEW_PANEL2' => 'New Panel 2',
  'LBL_TRIGGERFIELD' => 'Trigger Field',
  'LBL_SERVICECOORDINATOR_USER_ID' => 'Service Co-ordinator (related User ID)',
  'LBL_SERVICECOORDINATOR' => 'Service Co-ordinator',
  'LBL_SALESCOORDINATOR_USER_ID' => 'Sales Co-ordinator (related User ID)',
  'LBL_SALESCOORDINATOR' => 'Sales Co-ordinator',
  'LBL_BHEA_ARCHITECTURAL_FIRMS_OPPORTUNITIES_1_FROM_BHEA_ARCHITECTURAL_FIRMS_TITLE' => 'Architectural Firms',
  'LBL_BHEA_ARCHI_ARCHITECTS_CONTACT_OPPORTUNITIES_1_FROM_BHEA_ARCHI_ARCHITECTS_CONTACT_TITLE' => 'Architects',
  'LBL_ARCH_ARCHITECTS_CONTACTS_OPPORTUNITIES_1_FROM_ARCH_ARCHITECTS_CONTACTS_TITLE' => 'Architects',
  'LBL_ARCH_ARCHITECTURAL_FIRM_OPPORTUNITIES_1_FROM_ARCH_ARCHITECTURAL_FIRM_TITLE' => 'Architectural Firms',
  'LBL_INSTALLATION_STATUS' => 'Installation Status',
  'LBL_FEEBACK_EMAIL_SENT' => 'feeback email sent',
  'AOS_Quotes' => 'Quotes Standard',
  'LBL_OPPORTUNITIES_AOS_QUOTES_1_FROM_AOS_QUOTES_TITLE' => 'Quotes Standard',
  'LBL_DETAILVIEW_PANEL2' => 'New Panel 2',
  'LBL_INSTALLATION_COMPLETED' => 'Installation Completed',
  'LBL_OPPORTUNITIES_SCORING' => 'Opportunity Score',
  'LBL_FILE_MIME_TYPE' => 'File Mime Type',
  'LBL_FILE_URL' => 'File URL',
  'LBL_EVMGR_EVS_OPPORTUNITIES_FROM_EVMGR_EVS_TITLE' => 'Events',
);