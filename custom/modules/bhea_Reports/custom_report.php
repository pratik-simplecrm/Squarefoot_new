 <?php  
    // if(!defined('sugarEntry'))define('sugarEntry', true);
    // $url=$sugar_config['site_url']; 
    // global $current_user;
        
           // if(!$current_user->is_admin)  {
            // echo  "You don't have acccess to see Reports"   ;
            // exit;
            
        // } 
 ?>
<html>
    <head>

    </head> 
    <body>
    <h2>List of Reports</h2>
    <form name="frmsales" id="frmsales" action="" method="post">
        <input type="hidden" id="pathurl"  name="pathurl" value="<?php global $sugar_config;$url=$sugar_config['site_url'];{echo $url;}?>"/>
        <table width="100%" cellspacing="20" cellpadding="0" border="0" class="list view">
        
            
           
                
                
            <tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="<?php echo $url ?>/index.php?module=bhea_Reports&action=generateLeadReport"><span style ="font-family: calibri;font-size:16px;" ><b>1. Prospect Report</b></span></a> 
                </td>
            </tr>
            
             <tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="<?php echo $url ?>/index.php?module=bhea_Reports&action=generateOpportunityReportGroupBy"><span style ="font-family: calibri;font-size:16px;" ><b>2. Opportunity Report</b></span></a> 
                </td>
            </tr>
              <tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="<?php echo $url ?>/index.php?module=bhea_Reports&action=generateContactreport"><span style ="font-family: calibri;font-size:16px;" ><b>3. Contact Report</b></span></a> 
                </td>
            </tr>
            <tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="<?php echo $url ?>/index.php?module=bhea_Reports&action=generateCustomerReport"><span style ="font-family: calibri;font-size:16px;" ><b>4. Customer Report</b></span></a> 
                </td>
            </tr>
           <tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="<?php echo $url ?>/index.php?module=bhea_Reports&action=generateTopCustomerReport"><span style ="font-family: calibri;font-size:16px;" ><b>5. Top 10 Customers In Revenue</b></span></a> 
                </td>
            </tr>
			 <tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="<?php echo $url ?>/index.php?module=bhea_Reports&action=generateDailyCallReport"><span style ="font-family: calibri;font-size:16px;" ><b>6. User Wise Daily Call Report</b></span></a> 
                </td>
            </tr>
			 <tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="<?php echo $url ?>/index.php?module=bhea_Reports&action=generateDailyMeetingReport"><span style ="font-family: calibri;font-size:16px;" ><b>7. User Wise Daily Meeting Report</b></span></a> 
                </td>
            </tr>
			
			 <tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="<?php echo $url ?>/index.php?module=bhea_Reports&action=generateDailyQuoteReport"><span style ="font-family: calibri;font-size:16px;" ><b>8. User Wise Daily Quote Report</b></span></a> 
                </td>
            </tr>
			 <tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="<?php echo $url ?>/index.php?module=bhea_Reports&action=generateDailyArchitectReport"><span style ="font-family: calibri;font-size:16px;" ><b>9. Daily Report - New Architects</b></span></a> 
                </td>
            </tr>
			<tr class="oddListRowS1" height="20">
                <td class="nowrap" width="1%">
                <a target="_blank" style="text-decoration: none" href="<?php echo $url ?>/index.php?module=bhea_Reports&action=generateTopArchitectReport"><span style ="font-family: calibri;font-size:16px;" ><b>10. Top 10 Architects Giving References</b></span></a> 
                </td>
            </tr>
            
        </table>
    </form>
</body>
</html>
