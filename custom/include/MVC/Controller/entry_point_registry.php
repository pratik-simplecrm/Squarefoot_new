<?php
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

$entry_point_registry['AsteriskController'] = array (
  'file' => 'custom/modules/Asterisk/include/controller.php',
  'auth' => true,
);
$entry_point_registry['AsteriskCallListener'] = array (
  'file' => 'custom/modules/Asterisk/include/callListener.php',
  'auth' => true,
);
$entry_point_registry['AsteriskCallCreate'] = array (
  'file' => 'custom/modules/Asterisk/include/callCreate.php',
  'auth' => true,
);
/*for Scheduled Reports Charts in email*/
$entry_point_registry['SendReportsinEmail'] = array (
  'file' => 'modules/AOR_Scheduled_Reports/sendReportsEmail.php', 
  'auth' => false,
);
$entry_point_registry['SendReportsinEmailUploadImage'] = array (
  'file' => 'modules/AOR_Scheduled_Reports/upload.php', 
  'auth' => false,
);
/*for Scheduled Reports Charts in email*/

$entry_point_registry['crmapi'] = array (
  'file' => 'crmapi.php', 
  'auth' => false,
);
 $entry_point_registry['QuoteProductQuantity'] = array (
   'file' => 'custom/modules/quote_QuoteProducts/getQuantity.php', 
   'auth' => false,
 );

//Written by: Anjali and Pratik dated pn:18072019 to reset upload file field start (PO Column option - opportunity module)
  $entry_point_registry['download1'] = array (
   'file' => 'download1.php', 
   'auth' => false,
 ); 
 //Written by: Anjali and Pratik dated pn:18072019 to reset upload file field start (PO Column option - opportunity module)
  
 //created for to calculate ticket ageing days - by pratik tambekar
 $entry_point_registry['calculateAgeingDays'] = array (
   'file' => 'custom/modules/Cases/calculateAgeingDays.php', 
   'auth' => false,
 ); 

//testing email written by pratik on 27032020
  $entry_point_registry['test_email'] = array (
   'file' => 'custom/test_email.php', 
   'auth' => false,
 ); 