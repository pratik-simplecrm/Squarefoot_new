<?php
if(!defined('sugarEntry')) die('Not a Valid Entry Point');
/**
 *  @copyright SimpleCRM http://www.simplecrm.com.sg
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SimpleCRM <info@simplecrm.com.sg>
 */


//require_once('modules/bhea_Reports/report_utils.php');

class AOS_ContractsController extends SugarController {
	
    function action_batch_wise_placement_status() {
        $this->view = 'batch_wise_placement_status';
    }

    function action_overall_fee_collection_status() {
        $this->view = 'overall_fee_collection_status';
    }

    function action_detailed_fee_collection_status() {
        $this->view = 'detailed_fee_collection_status';
    }        
}