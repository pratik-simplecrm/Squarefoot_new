<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

require_once('include/MVC/Controller/SugarController.php');
require_once('modules/rls_Reports/classes/load.php');
require_once('modules/rls_Reports/license/OutfittersLicense.php');

/**
 * This is controller class for RLS Reports module
 * 
 * */
class rls_ReportsController extends SugarController
{
    /**
     * Override std constructor
     * 
     * */
    public function preProcess()
    {
        $license_strings = OutfittersLicense::loadLicenseStrings();
        $validate_license = OutfittersLicense::isValid('rls_Reports');
        if (!in_array($_REQUEST['action'], array("license", "outfitterscontroller")) && $validate_license !== true) {
            if (is_admin($current_user)) {
               // SugarApplication::appendErrorMessage($license_strings['LBL_MESSAGE_ERROR'] . ': ' . $validate_license);
            }
            //SugarApplication::appendErrorMessage($license_strings['LBL_MESSAGE_ERROR'] . ': ' . $validate_license);
            die($license_strings['LBL_MESSAGE_ERROR'] . ': ' . $validate_license);


        }
        // Bind Create Action
        if (isset($_REQUEST['action'])
            && $_REQUEST['action'] == 'EditView'
            && !isset($_REQUEST['record'])
            && !isset($_REQUEST['root'])
        ) {
            SugarApplication::redirect('index.php?module=rls_Reports&action=wizardStepOne');
        }

    }

    /**
     * Action for download PDF.
     *
     * */
    public function action_downloadPDF()
    {
        $report = loadbean('rls_Reports')->retrieve($_REQUEST['record']);
        \Reports\Settings\Storage::setFocus($report);
        $pdf = \Reports\PDF\Factory::load('DefaultType');
        $pdf->generateContent();
        
        exit($pdf->outputPdf());
    }

    /**
     * Load index dashboard.
     * 
     * */
    public function dashboardIndex()
    {
        $view  = new Dashboard\View();
        $pages = Dashboard\Tabs::getConfiguration();
        
        foreach ($pages as $page_guid => $page) {
            $dashlets = new Dashboard\Dashlets($page_guid); 
            
            $view->setTabsStack(array_merge(
                $view->getTabsStack(),
                array(
                    array(
                        'order' => $page['order'],
                        'title' => $page['pageTitle'],
                        'guid'  => $page_guid,
                    )
                )
            ));

            $view->setPageStack(array_merge(
                $view->getPageStack(),
                array(
                    array(
                        'dashlets' => $dashlets->getHtmlForDashlets(),
                        'guid'  => $page_guid,
                    )
                )
            ));
        }

        $view->getTemplate();
    }
    
    /**
     *  Copy dashboard configuration of current user to selected.
     * 
     */
    public function action_DashboardCopyCofiguration()
    {
        $pages = Dashboard\Tabs::getConfiguration();
        $dashlets = Dashboard\Dashlets::getConfiguration();

        if (isset($_REQUEST['selection_list']) and is_array($_REQUEST['selection_list'])) {
            foreach ($_REQUEST['selection_list'] as $user_id) {
                $user = loadbean('Users');
                $user->retrieve($user_id);

                $user->setPreference(
                    'pages', 
                    $pages, 
                    0, 
                    $_REQUEST['module']
                );
                $user->setPreference(
                    'dashlets', 
                    $dashlets, 
                    0, 
                    $_REQUEST['module']
                );
                
                $UserPreference = new UserPreference($user);
                $UserPreference->savePreferencesToDB();
            }
        } else {
            exit('Please select the record for copy!');
        }
        exit(translate('LBL_CONFIGURATION_IS_COPIED', 'rls_Reports'));
    }

    /**
     * Adding and Empty tab to the Dashboard
     * 
     */
    public function action_DashboardAddEmptyTab()
    {
        $tab_guid = Dashboard\Tabs::addEmptyTab();
        $dashlets = new Dashboard\Dashlets($tab_guid);
        $json     = getJSONobj();
        
        $dashlets->addEmptyDashlet();
        
        exit(
            $json->encode(array(
                'guid' => $tab_guid,
            ))
        ); 
    }
    
    /**
     * Removing Tab from the Dashboard
     * 
     */
    public function action_DashboardRemoveTab()
    {
        $dashlets = new Dashboard\Dashlets($_REQUEST['tab_guid']);
        $dashlets->removeAll();
        
        Dashboard\Tabs::removeTab($_REQUEST['tab_guid']);
        
        exit();
    }
    
    /**
     * Sets Caption of Tab
     * 
     */
    public function action_DashboardSetTabCaption()
    {
        Dashboard\Tabs::setCaption($_REQUEST['tab_guid'], $_REQUEST['value'] ? $_REQUEST['value'] : 'no_caption');
        exit();
    }
    
    /**
     * Returns HTML for Tab 
     * 
     */
    public function action_DashboardGetTabContent()
    {
        $dashlets          = new Dashboard\Dashlets($_REQUEST['tab_guid']);
        $view              = new Dashboard\View();
        $html_for_dashlets = $view->displayControls($_REQUEST['tab_guid']) . $dashlets->getHtmlForDashlets();
        
        exit($html_for_dashlets);
    }
    
    /**
     * Adds Empty Dashlet to the Tab 
     * 
     */
    public function action_DashboardAddEmptyDashlet()
    {
        $json     = getJSONobj();
        $dashlets = new Dashboard\Dashlets($_REQUEST['tab_guid']);
        $guid     = $dashlets->addEmptyDashlet();
        $content  = $dashlets->getCodeForOne($guid);
        
        exit(
            $json->encode(array(
                'guid' => $guid,
                'html' => $content,
            ))
        );
    }
    
    /**
     * Adds Empty Dashlet to the Tab 
     * 
     */
    public function action_DashboardSaveTabPosition()
    {
        $order_set = array();
        foreach ($_REQUEST['order'] as $tab_position) {
            $order_set[$tab_position['tab_guid']] = $tab_position['index'];
        }
        
        $result = Dashboard\Tabs::setOrder($order_set);
        
        exit($result ? 'ok' : 'false');
    }
    
    /**
     * Adds Empty Dashlet to the Tab 
     * 
     */
    public function action_DashboardSaveDashletPosition()
    {
        $dashlets = new Dashboard\Dashlets($_REQUEST['tab_guid']);
        $result = $dashlets->savePosition(array(
            'guid'   => $_REQUEST['dashlet_guid'],
            'column' => $_REQUEST['column'],
            'index'  => $_REQUEST['index'],
        ));  
        
        exit($result ? 'ok' : 'false');
    }
    
    /**
     * Adds Empty Dashlet to the Tab 
     * 
     */
    public function action_DashboardSaveLayout()
    {
        Dashboard\Layout::getInstance($_REQUEST['tab_guid'])
          ->setColumnsCount($_REQUEST['layout_type'])
          ->saveLayout();
        
        exit;
    }
    
    /**
     * Indicate adding of the new tab
     * 
     */
    public function action_DashboardNewTabIndicator() 
    {
        exit('
            Adding new Tab ... 
        ');
    }
    
    
    
    /**
     * Get Accessible Modules List 
     * Ajax function
     * TODO add recording errors in the log
     * */
    public function action_getAccessibleModulesList()
    {
        Reports\Settings\Storage::setFocus($this->bean);
        Reports\Settings\Storage::load($_REQUEST['type']);
        
        $json     = getJSONobj();
        $settings = Reports\Settings\Storage::getSettings();   
        if (!isset($_REQUEST['moduleName'])) {
            exit(
                $json->encode(array(
                    array(
                        'data' => array(
                            'title' => $settings['data']['module_of_report'],
                            'attr' => array(
                                'id' => 'CHILD_PARAMETERS-'.$settings['data']['module_of_report'],
                                'class' => 'wizard-show-module-fields'
                            ),
                        ),
                        'state'=> 'closed',
                    )
                ))
            );

        } else {
            $mdoules =  new Reports\Configurator\ModulesControl;
            //$reportModuleList = $mdoules->getModulesCode($_REQUEST['moduleName']);
            $reportModuleList = $mdoules->setRootModule($_REQUEST['type'])->setRelationName($_REQUEST['relationName'])->getModulesCode($_REQUEST['type']);
            
            exit(
                $json->encode($reportModuleList)
            );
        }
    }
    
    
    /**
     * Get Accessible Fields list 
     * Ajax function
     * TODO add recording errors in the log
     * */
    public function action_getAccessibleFieldsList()
    {
        $fields_code = '';
        if(empty($_REQUEST['moduleName']) || !loadBean($_REQUEST['moduleName'])){
            exit($fields_code);
        }

        \Reports\Settings\Storage::load($_REQUEST['type']);
        $this->updateDrilldown();
        
        $fields =  new Reports\Configurator\FieldsControl;
        $fields_code = $fields->setStepName($_REQUEST['stepName'])
                              ->setModule($_REQUEST['moduleName'])
                              ->setReletion(isset($_REQUEST['reletionName'])?$_REQUEST['reletionName']:null)
                              ->getFieldsCode($_REQUEST['td_class_name']);
        exit($fields_code);
    }
    
    /**
     * Get Field row
     * Ajax function
     * TODO add recording errors in the log
     * */
    public function action_getFieldHtml()
    {
        $fieldHtmlcode = '';
        if(empty($_REQUEST['moduleName'])
            || !loadBean($_REQUEST['moduleName'])
            || empty($_REQUEST['fieldName'])
            || empty($_REQUEST['type'])
        ) {
            exit($fieldHtmlcode);
        }
        
        $this->updateDrilldown();

        $configurator = Reports\Configurator\Factory::load($_REQUEST['type']);
        $fieldHtmlcode = $configurator
                            ->setModule($_REQUEST['moduleName'])
                            ->setReletion($_REQUEST['reletionName'])
                            ->setFieldName($_REQUEST['fieldName'])
                            ->getFieldHTML($_REQUEST['fieldName']);
        exit($fieldHtmlcode);
    }

    /**
     * Action for get html list of configured filters, groupings etc.
     * after change drilldown settings.
     *
     * */
    public function action_getSelectedDataHtml()
    {
        $report = loadbean('rls_Reports');
        $report->retrieve($_REQUEST['record']);
        
        \Reports\Settings\Storage::setFocus($report);
        \Reports\Settings\Storage::load($_REQUEST['type']);

        $this->updateDrilldown();

        $class_name = 'Reports\Configurator\\' . $_REQUEST['class_step'];
        $display_filters = new $class_name();  
        exit($display_filters->display());
    }
    /**
     * Action for add records to Prospect List.
     *
     * */
    public function action_addToTargetlist()
    {
        $prospect_list_id=$_POST['prospect_list_id'];       
        $report = loadbean('rls_Reports');
        $report->retrieve($_POST['id']);        
        \Reports\Settings\Storage::setFocus($report);
        Reports\Settings\Storage::load();
        $settings = Reports\Settings\Storage::getSettings();
        if (isset($settings['grid']['type'])) {
          $spreadsheet = Reports\Grid\Factory::loadGrid('Grouped');
          $records_id=$spreadsheet->getRecordsId();
        }
        if($report->type=='Prospects'||
           $report->type=='Contacts' ||
           $report->type=='Users' ||
           $report->type=='Leads'    ||
           $report->type=='Accounts'){
                //Clear all records
                foreach ($records_id as $record_id) {
                    $related_ids.="'".$record_id."',";
                    $prospect_list_ids.="'".$prospect_list_id."',";         
                }
                 $related_ids=substr($related_ids,0,-1);
                 $prospect_list_ids=substr($prospect_list_ids,0,-1);
                 $sqldel = "DELETE FROM prospect_lists_prospects WHERE related_id in(".$related_ids.") AND prospect_list_id in(".$prospect_list_ids.") AND related_type = '".$report->type."'";
                 $resultdel = $GLOBALS['db']->query($sqldel); 
                //Add new records
               $sql_insert = "INSERT INTO prospect_lists_prospects (id,prospect_list_id,related_id,related_type,date_modified,deleted) VALUES";        
               foreach ($records_id as $record_id) {
                    $sql_insert.="(UUID(),'".$prospect_list_id."','".$record_id."','".$report->type."',CURDATE(),'0'),";             
                }
                $sql_insert=substr($sql_insert,0,-1);
                $result_insert = $GLOBALS['db']->query($sql_insert);
                $msg='Records successfully added to the Target List';
        }
        else { $msg='Adding records to target list is not allowed for this module';}
        
        exit($msg); 
    }

    /**
     * Check drilldown setting from ajax request.
     *
     * */
    public function updateDrilldown()
    {
        $drilldown = \Reports\Chart\Drilldown::getInstance();
        $drilldown->setDrilldown((isset($_REQUEST['drill_down']) and $_REQUEST['drill_down'] ? true : false));
    }
    
}