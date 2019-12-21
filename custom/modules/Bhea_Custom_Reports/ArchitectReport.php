<?php
$from='';

global $sugar_config;$url=$sugar_config['site_url'];	
global $current_user,$user_name,$user_id;
		$user=$_REQUEST['id'];
                $user_id=$current_user->id;
                $user_name=$current_user->user_name; 
global $db;
$options="";
$query1 = "SELECT securitygroup_id FROM securitygroups_users WHERE user_id  ='$user_id' AND deleted=0";
 	$result=$db->query($query1); 
 	 while($getteams1=$db->fetchByAssoc($result))
 	 {
 	 
 	  $team_id = $getteams1['securitygroup_id'];
	  $sql="SELECT name FROM securitygroups where id='$team_id'";
	  $result1=$db->query($sql);
	  $row=$db->fetchByAssoc($result1);	
	//  $id=$row["id"];
    	  $thing=$row["name"];
    	  $values.=$row["name"];
    	  $options.="<OPTION VALUE=\"$thing\">".$thing;

}
              

?>
<script type="text/javascript" language="javascript1.1">
	function showrepo()
	{
		
		
		var from= document.getElementById("from").value;
		from=from.replace('/','-');
		from=from.replace('/','-');
		// alert('from');
		

		var url=document.getElementById("pathurl").value;
		var id='<?php echo $user_id; ?>';
		var name1='<?php echo $values; ?>';
		//
		var name = document.getElementById('name').value;
		
		
		var fld = document.getElementById('name');
		var values = [];
		for (var i = 0; i < fld.options.length; i++) {
  		if (fld.options[i].selected) {
    			values.push(fld.options[i].value);
  		}
		}

		var url=url+'/ArchitectReportCSV.php?from='+from+'&id='+id+'&name='+values;
	   location.href=url
	}
	// end. function
</script>
<h3>Architect Report</h3>
<form name="frmsales" id="frmsales" action="<?php echo $self; ?>" method="post">
<input type="hidden" name="to_pdf" value="1"/>
<input type="hidden" id="pathurl"  name="pathurl" value="<?php global $sugar_config;$url=$sugar_config['site_url'];{echo $url;}?>"/>
<table width="100%" border="0" align="center" class="list view">
  <tr>
    <td width="25%" align="left" valign="middle" class="">From
      <input type="text" id="from" name="from" value="<?php $from=$_REQUEST['from']; if($from!='1970-01-01'){echo $from;}?>"/> 
		<img border="0" src="themes/default/images/jscalendar.gif" id="fromb" align="absmiddle" />
	<script type="text/javascript">
		Calendar.setup({inputField    : "from",
						button        : "fromb",
						align         : "right"});
		</script> </td>
    <td  width="20%" align="left" valign="middle" class="">Team Name

	<SELECT NAME="name[]" id="name" multiple="multiple">
	<!--  <option selected="selected" value="">Project Name</option>-->
	<option selected="selected" value=" "> </option>
	<?php print($options) ?>	
	</SELECT> 
	</td>
	
	
	 
	  </tr>
<tr>
    <td colspan="2" align="left" valign="middle" class=""><input type="button" name="generate_report" id="generate_report" value="Generate Report" onClick="showrepo();"/></td>
  </tr>
</table>
</form>



