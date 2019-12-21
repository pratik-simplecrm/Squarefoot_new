<?php
// A function to calculate (instead of hard-coding) the relationship name between two modules
// Thanks to Francesca Shiekh whose information is at http://forums.sugarcrm.com/members/francescas/ 
// This function is at
// http://developer.sugarcrm.com/2013/05/29/programmatically-find-the-name-of-the-relationship-between-two-modules/
function getRelationshipByModules ($m1, $m2)
{
	global $db,$dictionary,$beanList;
	$rel = new Relationship;
	if($rel_info = $rel->retrieve_by_sides($m1, $m2, $db))
	{
		$class = $beanList[$m1];
		$bean = new $class();
		$rel_name = $rel_info['relationship_name'];
		foreach($bean->field_defs as $field=>$def)
		{
			if(isset($def['relationship']) && $def['relationship']==$rel_name) return(array($def['name'], $m1));
		}
	}
	elseif($rel_info = $rel->retrieve_by_sides($m2, $m1, $db))
	{
		 $class = $beanList[$m2];
		 $bean = new $class();
		 $rel_name = $rel_info['relationship_name'];
		 foreach($bean->field_defs as $field=>$def)
		{
			if(isset($def['relationship']) && $def['relationship']==$rel_name) return(array($def['name'], $m2));
		}
	}
	return(FALSE);
}
?>
