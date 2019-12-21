<script type="text/javascript">
	function showrepo()
	{
	window.location="<?php echo $url ?>/index.php?module=Bhea_Custom_Reports&action=index&report=Report1";
		
	}
	
	function showreports()
	{
		window.location="<?php echo $url ?>/index.php?module=Bhea_Custom_Reports&action=index&report=Report2";
	}
	function showreports()
	{
		window.location="<?php echo $url ?>/index.php?module=Bhea_Custom_Reports&action=index&report=ageing_days";
	}
	// end. function
</script>
<h1>List of Reports</h1>
<form name="frmsales" id="frmsales" action="" method="post">
<input type="hidden" id="pathurl"  name="pathurl" value="<?php global $sugar_config;$url=$sugar_config['site_url'];{echo $url;}?>"/>
<table width="100%" border="0" align="center" class="list view">
<br />
<FONT SIZE="5" >
<a href="<?php echo $url ?>/index.php?module=Bhea_Custom_Reports&action=index&report=Report1 "><span style ="font-family: Times New Roman; font-size:20px;">1.Architect Report</span></a> 
<br />
<br />
  <a href="<?php echo $url ?>/index.php?module=Bhea_Custom_Reports&action=index&report=Report2"><span style ="font-family: Times New Roman;font-size:20px;">2.Weekly Performance Report</a> 
 <br />
<br /> 
<!--  <a href="<?php echo $url ?>/index.php?module=Bhea_Custom_Reports&action=index&report=scrm_Report"><span style ="font-family: Times New Roman;font-size:20px;">3.Weekly Performance Report (Beta)</a> 
 <br />
<br /> -->
 <a href="<?php echo $url ?>/index.php?module=Bhea_Custom_Reports&action=index&report=ageing_days"><span style ="font-family: Times New Roman;font-size:20px;">3.Ticket Ageing Days Report</a> 
 <br />
<br />

<!--<a href="<?php echo $url ?>/index.php?module=Bhea_Custom_Reports&action=index&report=reschedule_report"><span style ="font-family: Times New Roman;font-size:20px;">4.Rescheduled Ticket Report</a> 
 <br />
<br />-->
 </FONT>
</table>
</form>
