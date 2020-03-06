<?php 
 $GLOBALS["dictionary"]["scrm_ScheduleHistory"]=array (
  'table' => 'scrm_schedulehistory',
  'audited' => true,
  'inline_edit' => true,
  'duplicate_merge' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
      'inline_edit' => false,
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => 255,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'required' => true,
      'importable' => 'required',
      'duplicate_merge' => 'enabled',
      'merge_filter' => 'selected',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'inline_edit' => false,
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'inline_edit' => false,
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 6,
      'cols' => 80,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'scrm_schedulehistory_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'scrm_schedulehistory_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'scrm_schedulehistory_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
    ),
    'SecurityGroups' => 
    array (
      'name' => 'SecurityGroups',
      'type' => 'link',
      'relationship' => 'securitygroups_scrm_schedulehistory',
      'module' => 'SecurityGroups',
      'bean_name' => 'SecurityGroup',
      'source' => 'non-db',
      'vname' => 'LBL_SECURITYGROUPS',
    ),
    'reasonofreschedule_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'Re-Schedule',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'reasonofreschedule_c',
      'vname' => 'LBL_REASONOFRESCHEDULE',
      'type' => 'enum',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 'reasonofreschedule_list',
      'studio' => 'visible',
      'dependency' => NULL,
      'id' => 'scrm_ScheduleHistoryreasonofreschedule_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'startdate_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'Start Date & Time',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'startdate_c',
      'vname' => 'LBL_STARTDATE',
      'type' => 'datetimecombo',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'size' => '20',
      'enable_range_search' => false,
      'dbType' => 'datetime',
      'id' => 'scrm_ScheduleHistorystartdate_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'user_id_c' => 
    array (
      'inline_edit' => 1,
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'user_id_c',
      'vname' => 'LBL_CREATEDBY_USER_ID',
      'type' => 'id',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '36',
      'size' => '20',
      'id' => 'scrm_ScheduleHistoryuser_id_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'createdby_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'Created By',
      'required' => false,
      'source' => 'non-db',
      'name' => 'createdby_c',
      'vname' => 'LBL_CREATEDBY',
      'type' => 'relate',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id_name' => 'user_id_c',
      'ext2' => 'Users',
      'module' => 'Users',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      'id' => 'scrm_ScheduleHistorycreatedby_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'cases_scrm_schedulehistory_1' => 
    array (
      'name' => 'cases_scrm_schedulehistory_1',
      'type' => 'link',
      'relationship' => 'cases_scrm_schedulehistory_1',
      'source' => 'non-db',
      'module' => 'Cases',
      'bean_name' => 'Case',
      'vname' => 'LBL_CASES_SCRM_SCHEDULEHISTORY_1_FROM_CASES_TITLE',
      'id_name' => 'cases_scrm_schedulehistory_1cases_ida',
    ),
    'cases_scrm_schedulehistory_1_name' => 
    array (
      'name' => 'cases_scrm_schedulehistory_1_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_CASES_SCRM_SCHEDULEHISTORY_1_FROM_CASES_TITLE',
      'save' => true,
      'id_name' => 'cases_scrm_schedulehistory_1cases_ida',
      'link' => 'cases_scrm_schedulehistory_1',
      'table' => 'cases',
      'module' => 'Cases',
      'rname' => 'name',
    ),
    'cases_scrm_schedulehistory_1cases_ida' => 
    array (
      'name' => 'cases_scrm_schedulehistory_1cases_ida',
      'type' => 'link',
      'relationship' => 'cases_scrm_schedulehistory_1',
      'source' => 'non-db',
      'reportable' => false,
      'side' => 'right',
      'vname' => 'LBL_CASES_SCRM_SCHEDULEHISTORY_1_FROM_SCRM_SCHEDULEHISTORY_TITLE',
    ),
    'casetype_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'Case Type',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'casetype_c',
      'vname' => 'LBL_CASETYPE',
      'type' => 'enum',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 'casetype_list',
      'studio' => 'visible',
      'dependency' => false,
      'id' => 'scrm_ScheduleHistorycasetype_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'user_id1_c' => 
    array (
      'inline_edit' => 1,
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'user_id1_c',
      'vname' => 'LBL_SUPERVISOR_USER_ID',
      'type' => 'id',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '36',
      'size' => '20',
      'id' => 'scrm_ScheduleHistoryuser_id1_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'supervisor_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'Supervisor',
      'required' => false,
      'source' => 'non-db',
      'name' => 'supervisor_c',
      'vname' => 'LBL_SUPERVISOR',
      'type' => 'relate',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id_name' => 'user_id1_c',
      'ext2' => 'Users',
      'module' => 'Users',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      'id' => 'scrm_ScheduleHistorysupervisor_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'reasonforreschedule_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'Reason for Re-schedule',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'reasonforreschedule_c',
      'vname' => 'LBL_REASONFORRESCHEDULE',
      'type' => 'text',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'size' => '20',
      'studio' => 'visible',
      'rows' => '4',
      'cols' => '30',
      'id' => 'scrm_ScheduleHistoryreasonforreschedule_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'account_id_c' => 
    array (
      'inline_edit' => 1,
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'account_id_c',
      'vname' => 'LBL_ACCOUNTNAME_ACCOUNT_ID',
      'type' => 'id',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '36',
      'size' => '20',
      'id' => 'scrm_ScheduleHistoryaccount_id_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'accountname_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'Account Name',
      'required' => false,
      'source' => 'non-db',
      'name' => 'accountname_c',
      'vname' => 'LBL_ACCOUNTNAME',
      'type' => 'relate',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id_name' => 'account_id_c',
      'ext2' => 'Accounts',
      'module' => 'Accounts',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      'id' => 'scrm_ScheduleHistoryaccountname_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'opportunity_id_c' => 
    array (
      'inline_edit' => 1,
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'opportunity_id_c',
      'vname' => 'LBL_OPPORTUNITY_OPPORTUNITY_ID',
      'type' => 'id',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '36',
      'size' => '20',
      'id' => 'scrm_ScheduleHistoryopportunity_id_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'opportunity_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'Opportunity',
      'required' => false,
      'source' => 'non-db',
      'name' => 'opportunity_c',
      'vname' => 'LBL_OPPORTUNITY',
      'type' => 'relate',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id_name' => 'opportunity_id_c',
      'ext2' => 'Opportunities',
      'module' => 'Opportunities',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      'id' => 'scrm_ScheduleHistoryopportunity_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'branch_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'Branch',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'branch_c',
      'vname' => 'LBL_BRANCH',
      'type' => 'enum',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 'branch_list',
      'studio' => 'visible',
      'dependency' => false,
      'id' => 'scrm_ScheduleHistorybranch_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'case_number_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'Ticket Number',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'case_number_c',
      'vname' => 'LBL_CASE_NUMBER_C',
      'type' => 'varchar',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '100',
      'size' => '20',
      'id' => 'scrm_ScheduleHistorycase_number_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
    'casenumber_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'Case number',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'casenumber_c',
      'vname' => 'LBL_CASENUMBER',
      'type' => 'int',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'enable_range_search' => false,
      'disable_num_format' => '1',
      'min' => false,
      'max' => false,
      'id' => 'scrm_ScheduleHistorycasenumber_c',
      'custom_module' => 'scrm_ScheduleHistory',
    ),
  ),
  'relationships' => 
  array (
    'scrm_schedulehistory_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'scrm_ScheduleHistory',
      'rhs_table' => 'scrm_schedulehistory',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'scrm_schedulehistory_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'scrm_ScheduleHistory',
      'rhs_table' => 'scrm_schedulehistory',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'scrm_schedulehistory_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'scrm_ScheduleHistory',
      'rhs_table' => 'scrm_schedulehistory',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'securitygroups_scrm_schedulehistory' => 
    array (
      'lhs_module' => 'SecurityGroups',
      'lhs_table' => 'securitygroups',
      'lhs_key' => 'id',
      'rhs_module' => 'scrm_ScheduleHistory',
      'rhs_table' => 'scrm_schedulehistory',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'securitygroups_records',
      'join_key_lhs' => 'securitygroup_id',
      'join_key_rhs' => 'record_id',
      'relationship_role_column' => 'module',
      'relationship_role_column_value' => 'scrm_ScheduleHistory',
    ),
  ),
  'optimistic_locking' => true,
  'unified_search' => true,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'scrm_schedulehistorypk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'templates' => 
  array (
    'security_groups' => 'security_groups',
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => true,
);