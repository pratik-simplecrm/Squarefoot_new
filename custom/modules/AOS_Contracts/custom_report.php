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

	global $current_user;
    global $db;
    //~ $login_user_id = $current_user->id;
    
 ?>
<!-- <html>
    <head>

    </head>  
    <body>

        <input type="hidden" id="pathurl"  name="pathurl" value="<?php global $sugar_config;$url=$sugar_config['site_url'];{echo $url;}?>"/>
        <table width="100%" cellspacing="20" cellpadding="0" border="0" class="list view">    
        <th><h1><b>Reports</b></h1></th> 
			
       		<tr class="evenListRowS1" height="20" id='advisor'>
				<td class="nowrap" width="1%" style="padding-left:15px !important;">
				<a target="_blank" style="text-decoration: none" href="<?php echo $url ?>/index.php?module=AOS_Contracts&action=programme_report"><span style ="font-family: Arial;font-size:15.5px;" ><b>    <span style="font-size:21px;">»</span>&nbsp;ASCI Programme Summary Report</b></span></a> 
				</td>
			</tr>

		  </table>
</body>
</html> -->
 <?php  

 ?>
<html>
    <head>

    </head> 
    <body>
   <!--   <h2>List Of Reports</h2>-->
    <form name="frmsales" id="frmsales" action="" method="post">
        <input type="hidden" id="pathurl"  name="pathurl" value="<?php global $sugar_config;$url=$sugar_config['site_url'];{echo $url;}?>"/>

		<table width="100%" cellspacing="20" cellpadding="0" border="0" class="list view">    
        	<th><h1><b>Reports</b></h1></th>       
            <tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="index.php?module=AOS_Contracts&action=overall_fee_collection_status"><span style ="font-family: Arial;font-size:14px;" ><b>1.&nbsp;Overall Fee Collection Status</b></span></a> 
                </td>
            </tr>

            <tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="index.php?module=AOS_Contracts&action=detailed_fee_collection_status"><span style ="font-family: Arial;font-size:14px;" ><b>2.&nbsp;Detailed Fee Collection Status</b></span></a> 
                </td>
            </tr>              
            <tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="index.php?module=AOS_Contracts&action=batch_wise_placement_status"><span style ="font-family: Arial;font-size:14px;" ><b>3.&nbsp;Batch Wise Placement Status</b></span></a> 
                </td>
            </tr>                              
		 </table>

    </form>
</body>
</html>
