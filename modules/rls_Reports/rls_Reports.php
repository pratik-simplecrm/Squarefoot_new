<?PHP
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

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/rls_Reports/rls_Reports_sugar.php');
class rls_Reports extends rls_Reports_sugar {
  
  function rls_Reports(){ 
      parent::rls_Reports_sugar();
  }
  
  /**
   * Override standard Save
   * 
   * */
  public function Save()
  {
      $save_type = '';
      if (isset($_REQUEST['save_type'])) {
          $save_type = $_REQUEST['save_type'];
      }
      $this->setReportSettings($save_type);
      parent::Save();
  }
  
  /**
   * Sets Reports settings into field
   * 
   * */
  public function setReportSettings($save_type = '')
  {
      if (!isset($_REQUEST['wizard'])) {
          $_REQUEST['wizard'] = array();
      }
      
      Reports\Settings\Storage::setFocus($this);
      Reports\Settings\Storage::load();

      $settings_values = new \Reports\Settings\Report;
      $settings_array = $settings_values->prepareUserSettings($_REQUEST['wizard']);

      if ($save_type) {
          $reports_settings = Reports\Settings\Storage::getReportsSettings();
          foreach ($settings_array['DisplayFilters']['controls'] as $controll_name => $controll_data) {
              $reports_settings['DisplayFilters']['controls'][$controll_name] = $controll_data;
              $reports_settings['DisplayFilters']['operator'] = $settings_array['DisplayFilters']['operator'];
          }
          $settings_array = $reports_settings;
      }

      $settings_array = $this->fixRequest($settings_array);
      $this->reports_settings = serialize($settings_array);
  }

  /**
   * Fix special simbols for save into bean.
   *
   * @param array $data data for fix
   * @return array
   * */
  public function fixRequest($data)
  {
      if (is_array($data)) {
          foreach ($data as $key => $value) {
              if (is_array($value)) {
                  $data[$key] = $this->fixRequest($value);
              } else {
                  $data[$key] = html_entity_decode(($value));
              }
          }
      } 
      return $data;
  }

  
}

