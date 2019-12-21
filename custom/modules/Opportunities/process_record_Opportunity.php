<?php
	if(!defined('sugarEntry') || !sugarEntry) die('Not a valid entry point');
	class process_record_opportunity_class
	{
		public function process_record_opportunity_method($bean, $event, $arguments)
		{
			//echo "<pre>";
			//print_r($bean->id);
		    //$bean->filename= "<a href='index.php?entryPoint=download'>aaaa</a>";
			$link = '<a href=index.php?entryPoint=download1&id='.$bean->id.'&type=Opportunities>'.$bean->filename.'</a>';
			//echo $file_name = $bean-s>filename.' '.$bean->id;
			//echo $link;
			$bean->filename = $link;

		}
	}
