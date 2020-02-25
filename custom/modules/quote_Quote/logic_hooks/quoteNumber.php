<?php

class quoteNumber{
	function quoteNumber( $bean, $event, $arguments ){
		global $db,$current_user;
		if(!($bean->fetched_row)){
			$branchCodeFetch = "SELECT name FROM pdf_quote_pdf WHERE branch = '".$bean->branch_c."'";
			$branchCodeFetchResult = $db->query($branchCodeFetch);
			$branchCodeFetchRow = $db->fetchByAssoc($branchCodeFetchResult);
			$qut_val = $branchCodeFetchRow['name'];
			
			//Generating Custom Quote Number
			//Syntax - City_Code-Finincial_Year-Concecutive_Number
			//Generating Finincial year for the Quote Number - Finincial_Year
			 $qut_year = date('m') < 4?date('Y')-1:date('Y');
			 //echo "  ".$qut_val.$qut_year;
			
			$query = "select custom_quote_num_c from quote_quote_cstm join quote_quote on (id_c=id and deleted=0) where custom_quote_num_c like '".$qut_val.$qut_year."%' order by date_entered desc limit 0,1";
			$query = $db->query($query);
			$query = $db->fetchByAssoc($query);
			//Replacing prefixes
			//echo "ssssssssss=".$query['custom_quote_num_c'];
			//echo "  replace code:".$qut_val.$qut_year;
			$query = str_replace($qut_val.$qut_year, "", $query['custom_quote_num_c']);
			
			//Adding Prefixes (set of Zeros for number to 11 digit)
			if($query < 10){
					$prefix .= "000";
			}elseif($query < 100){
					$prefix .= "00";
			}elseif($query < 1000){
					$prefix .= "0";
			}
			 
			//~ if($qut_val == 'PNA')
			//~ {
				//~ $query = "select custom_quote_num_c from quote_quote_cstm join quote_quote on (id_c=id and deleted=0) where custom_quote_num_c='PNA20140109' order by date_entered desc limit 0,1";
				//~ $query = $db->query($query);
				
			//~ }
             //echo "<br>";
             $query++;
			//echo $qut_val.$qut_year.$prefix.$query;
			
			$bean->custom_quote_num_c = $qut_val.$qut_year.$prefix.$query; 	//exit;	
		}
	}
}
