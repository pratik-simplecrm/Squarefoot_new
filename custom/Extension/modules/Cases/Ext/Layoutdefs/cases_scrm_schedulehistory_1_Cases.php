<?php
 // created: 2019-11-04 18:00:32
$layout_defs["Cases"]["subpanel_setup"]['cases_scrm_schedulehistory_1'] = array (
  'order' => 100,
  'module' => 'scrm_ScheduleHistory',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CASES_SCRM_SCHEDULEHISTORY_1_FROM_SCRM_SCHEDULEHISTORY_TITLE',
  'get_subpanel_data' => 'cases_scrm_schedulehistory_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
