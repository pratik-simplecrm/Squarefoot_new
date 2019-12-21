<?php
 //~ ini_set('display_errors','On');
if(!defined('sugarEntry')) define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('config.php');
global $db; 
/*
$query_accounts = "SELECT id,team_id FROM accounts where team_id IS NOT NULL";
$result_accounts = $db->query($query_accounts);
while($row_accounts = $db->fetchByAssoc($result_accounts))
{
	$account_id = $row_accounts['id'];
	$team_id = $row_accounts['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','Accounts')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$account_id','$team_id','Accounts')";
	 $result_security_records = $db->query($security_group_records);
	
}
$query_contacts = "SELECT id,team_id FROM contacts where team_id IS NOT NULL";
$result_contacts = $db->query($query_contacts);
while($row_contacts = $db->fetchByAssoc($result_contacts))
{
	$contacts_id = $row_contacts['id'];
	$team_id = $row_contacts['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','Contacts')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$contacts_id','$team_id','Contacts')";
	$result_security_records = $db->query($security_group_records);
	
}
$query_leads = "SELECT id,team_id FROM leads where team_id IS NOT NULL";
$result_leads = $db->query($query_leads);
while($row_leads = $db->fetchByAssoc($result_leads))
{
	$leads_id = $row_leads['id'];
	$team_id = $row_leads['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','Leads')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$leads_id','$team_id','Leads')";
	 $result_security_records = $db->query($security_group_records);
	
}
$query_cases = "SELECT id,team_id FROM tasks where team_id IS NOT NULL";
$result_cases = $db->query($query_cases);
while($row_cases = $db->fetchByAssoc($result_cases))
{
	$cases_id = $row_cases['id'];
	$team_id = $row_cases['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','Tasks')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$cases_id','$team_id','Tasks')";
	 $result_security_records = $db->query($security_group_records);
	
}
$query_meetings = "SELECT id,team_id FROM meetings where team_id IS NOT NULL";
$result_meetings= $db->query($query_meetings);
while($row_meetings = $db->fetchByAssoc($result_meetings))
{
	$meetings_id = $row_meetings['id'];
	$team_id = $row_meetings['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','Meetings')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$meetings_id','$team_id','Meetings')";
	 $result_security_records = $db->query($security_group_records);
	
}

$query_opportunities = "SELECT id,team_id FROM opportunities where team_id IS NOT NULL";
$result_opportunities= $db->query($query_opportunities);

while($row_opportunities = $db->fetchByAssoc($result_opportunities))
{
	$opportunities_id = $row_opportunities['id'];
	$team_id = $row_opportunities['team_id'];
	//~ $query_security_record_id = "select uuid() as security_id";
	//~ $result_security_record_id = $db->query($query_security_record_id);
	//~ $row_security_record = $db->fetchByAssoc($result_security_record_id);
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','Opportunities')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$opportunities_id','$team_id','Opportunities')";
	 $result_security_records = $db->query($security_group_records);
	echo $i++;
}


$query_calls = "SELECT id,team_id FROM calls where team_id IS NOT NULL";
$result_calls= $db->query($query_calls);
while($row_calls = $db->fetchByAssoc($result_calls))
{
	$calls_id = $row_calls['id'];
	$team_id = $row_calls['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','Calls')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$calls_id','$team_id','Calls')";
	 $result_security_records = $db->query($security_group_records);
	
}

$query_notes = "SELECT id,team_id FROM notes where team_id IS NOT NULL";
$result_notes= $db->query($query_notes);
while($row_notes = $db->fetchByAssoc($result_notes))
{
	$notes_id = $row_notes['id'];
	$team_id = $row_notes['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','Notes')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$notes_id','$team_id','Notes')";
	 $result_security_records = $db->query($security_group_records);
	
}

$query_documents = "SELECT id,team_id FROM prospects where team_id IS NOT NULL";
$result_documents= $db->query($query_documents);
while($row_documents = $db->fetchByAssoc($result_documents))
{
	$documents_id = $row_documents['id'];
	$team_id = $row_documents['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','Prospects')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$documents_id','$team_id','Prospects')";
	 $result_security_records = $db->query($security_group_records);
	
}

$query_documents = "SELECT id,team_id FROM project where team_id IS NOT NULL";
$result_documents= $db->query($query_documents);
while($row_documents = $db->fetchByAssoc($result_documents))
{
	$documents_id = $row_documents['id'];
	$team_id = $row_documents['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','Project')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$documents_id','$team_id','Project')";
	 $result_security_records = $db->query($security_group_records);
	
}

$query_documents = "SELECT id,team_id FROM sugarfeed where team_id IS NOT NULL";
$result_documents= $db->query($query_documents);
while($row_documents = $db->fetchByAssoc($result_documents))
{
	$documents_id = $row_documents['id'];
	$team_id = $row_documents['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','SugarFeed')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$documents_id','$team_id','SugarFeed')";
	 $result_security_records = $db->query($security_group_records);
	
}


$query_simpl_projects = "SELECT id,team_id FROM arch_architectural_firm where team_id IS NOT NULL";
$result_simpl_projects= $db->query($query_simpl_projects);
while($row_simpl_projects = $db->fetchByAssoc($result_simpl_projects))
{
	$simpl_project_id = $row_simpl_projects['id'];
	$team_id = $row_simpl_projects['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','Arch_Architectural_Firm')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$simpl_project_id','$team_id','Arch_Architectural_Firm')";
	$result_security_records = $db->query($security_group_records);
	 
	 $custom_table = "INSERT INTO arch_architectural_firm_securitygroups_1_c(id,date_modified,deleted,arch_archi5700al_firm_ida,arch_architectural_firm_securitygroups_1securitygroups_idb) VALUES('$security_record_id', now(), 0,'$simpl_project_id','$team_id')";
	 $result_table = $db->query($custom_table);
	
}


$query_simpl_project_milestones = "SELECT id,team_id FROM arch_architects_contacts where team_id IS NOT NULL";
$result_simpl_project_milestones= $db->query($query_simpl_project_milestones);
while($row_simpl_project_milestones = $db->fetchByAssoc($result_simpl_project_milestones))
{
	$simpl_project_milestones_id = $row_simpl_project_milestones['id'];
	$team_id = $row_simpl_project_milestones['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','Arch_Architects_Contacts')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$simpl_project_milestones_id','$team_id','Arch_Architects_Contacts')";
	 $result_security_records = $db->query($security_group_records);
	 
	 $custom_table = "INSERT INTO arch_architects_contacts_securitygroups_1_c(id,date_modified,deleted,arch_archic5f3ontacts_ida,arch_architects_contacts_securitygroups_1securitygroups_idb) VALUES('$security_record_id' ,now(), 0,'$simpl_project_milestones_id','$team_id')";
	 $result_table = $db->query($custom_table);
	
}


$query_documents = "SELECT id,team_id FROM aos_line_item_groups where team_id IS NOT NULL";
$result_documents= $db->query($query_documents);
while($row_documents = $db->fetchByAssoc($result_documents))
{
	$documents_id = $row_documents['id'];
	$team_id = $row_documents['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','AOS_Line_Item_Groups')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$documents_id','$team_id','AOS_Line_Item_Groups')";
	 $result_security_records = $db->query($security_group_records);
	
}

$query_documents = "SELECT id,team_id FROM aos_product_categories where team_id IS NOT NULL";
$result_documents= $db->query($query_documents);
while($row_documents = $db->fetchByAssoc($result_documents))
{
	$documents_id = $row_documents['id'];
	$team_id = $row_documents['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','AOS_Product_Categories')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$documents_id','$team_id','AOS_Product_Categories')";
	 $result_security_records = $db->query($security_group_records);
	
}

$query_documents = "SELECT id,team_id FROM aos_products where team_id IS NOT NULL";
$result_documents= $db->query($query_documents);
while($row_documents = $db->fetchByAssoc($result_documents))
{
	$documents_id = $row_documents['id'];
	$team_id = $row_documents['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','AOS_Products')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$documents_id','$team_id','AOS_Products')";
	 $result_security_records = $db->query($security_group_records);
	
}

$query_documents = "SELECT id,team_id FROM aos_products_quotes where team_id IS NOT NULL";
$result_documents= $db->query($query_documents);
while($row_documents = $db->fetchByAssoc($result_documents))
{
	$documents_id = $row_documents['id'];
	$team_id = $row_documents['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','AOS_Products_Quotes')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$documents_id','$team_id','AOS_Products_Quotes')";
	 $result_security_records = $db->query($security_group_records);
	
}

$query_documents = "SELECT id,team_id FROM aos_quotes where team_id IS NOT NULL";
$result_documents= $db->query($query_documents);
while($row_documents = $db->fetchByAssoc($result_documents))
{
	$documents_id = $row_documents['id'];
	$team_id = $row_documents['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','AOS_Quotes')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$documents_id','$team_id','AOS_Quotes')";
	 $result_security_records = $db->query($security_group_records);
	
}


$query_simpl_project_milestones = "SELECT id,team_id FROM quote_products where team_id IS NOT NULL";
$result_simpl_project_milestones= $db->query($query_simpl_project_milestones);
while($row_simpl_project_milestones = $db->fetchByAssoc($result_simpl_project_milestones))
{
	$simpl_project_milestones_id = $row_simpl_project_milestones['id'];
	$team_id = $row_simpl_project_milestones['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','quote_Products')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$simpl_project_milestones_id','$team_id','quote_Products')";
	 $result_security_records = $db->query($security_group_records);
	 
	 $custom_table = "INSERT INTO quote_products_securitygroups_1_c(id,date_modified,deleted,quote_products_securitygroups_1quote_products_ida,quote_products_securitygroups_1securitygroups_idb,deleted) VALUES('$security_record_id',now(),0,'$simpl_project_milestones_id','$team_id',0)";
	 $result_table = $db->query($custom_table);
	
}


$query_simpl_project_milestones = "SELECT id,team_id FROM quote_product_category where team_id IS NOT NULL";
$result_simpl_project_milestones= $db->query($query_simpl_project_milestones);
while($row_simpl_project_milestones = $db->fetchByAssoc($result_simpl_project_milestones))
{
	$simpl_project_milestones_id = $row_simpl_project_milestones['id'];
	$team_id = $row_simpl_project_milestones['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','quote_Product_Category')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$simpl_project_milestones_id','$team_id','quote_Product_Category')";
	 $result_security_records = $db->query($security_group_records);
	 
	 $custom_table = "INSERT INTO quote_product_category_securitygroups_1_c(id,date_modified,deleted,quote_prodfe4eategory_ida,quote_product_category_securitygroups_1securitygroups_db,deleted) VALUES('$security_record_id',now(),0,'$simpl_project_milestones_id','$team_id',0)";
	 $result_table = $db->query($custom_table);
	
}

$query_simpl_project_milestones = "SELECT id,team_id FROM quote_quote where team_id IS NOT NULL";
$result_simpl_project_milestones= $db->query($query_simpl_project_milestones);
while($row_simpl_project_milestones = $db->fetchByAssoc($result_simpl_project_milestones))
{
	$simpl_project_milestones_id = $row_simpl_project_milestones['id'];
	$team_id = $row_simpl_project_milestones['team_id'];
	$security_record_id = create_guid();
	$security_groups_default = "INSERT INTO securitygroups_default(id,securitygroup_id,module) VALUES ('$security_record_id','$team_id','quote_Quote')";
	$result_security  = $db->query($security_groups_default);
	$security_group_records = "INSERT INTO securitygroups_records(id,record_id,securitygroup_id,module) VALUES ('$security_record_id','$simpl_project_milestones_id','$team_id','quote_Quote')";
	 $result_security_records = $db->query($security_group_records);
	 
	 $custom_table = "INSERT INTO quote_quote_securitygroups_1_c(id,date_modified,deleted,quote_quote_securitygroups_1quote_quote_ida,quote_quote_securitygroups_1securitygroups_idb,deleted) VALUES('$security_record_id',now(),0,'$simpl_project_milestones_id','$team_id',0)";
	 $result_table = $db->query($custom_table);
	
}
* 
*/
//~ echo "<pre>";

/*
//Data Migration For Aos_Quote Modules
$quote_field ="select Q.id, Q.name, Q.date_entered, Q.date_modified, Q.modified_user_id, Q.created_by, Q.description, Q.deleted, Q.assigned_user_id, Q.quote_quote_number, Q.quotation_status, Q.discount,  Q.currency_id, Q.sub_total, Q.discounted_total, Q.grand_total, Q.total_tax, Q.team_id, Q.type ,  Q.priority ,  Q.resolution ,  Q.work_log ,  Q.discount_checkbox , Q.insurance_checkbox, Q.insurance ,Q.quote_type, Q.terms_conditions , Q.quotation_category ,  Q.new_subtotal,Q.quotation_date,Qc.valid_until_c ,  Qc.purchase_order_number_c ,  Qc.original_p_o_date_c ,  Qc.team_list_c ,  Qc.decleration_c ,  Qc.certify_c ,  Qc.company_vat_details_c ,  Qc.branch_c ,  Qc.contact_id_c ,  Qc.contact_id1_c , Qc.custom_quote_num_c , Qc.copy_address_c ,  Qc.shipping_1_c ,  Qc.shipping_2_c ,  Qc.pdf_type_c,Qc.payment_terms_c ,Qc.billing_address_c, Qc.billing_address_city_c ,  Qc.billing_address_state_c ,  Qc.billing_address_postalcode_c , Qc.billing_address_country_c ,Qc.shipping_address_c, Qc.shipping_address_city_c ,  Qc.shipping_address_state_c , Qc.shipping_address_postalcode_c ,  Qc.shipping_address_country_c,shipping_c FROM quote_quote Q JOIN quote_quote_cstm Qc ON Q.id = Qc.id_c where Q.deleted = 0";

$result = $db->query($quote_field);
while($row =$db->fetchByAssoc($result))
{
$id = $row['id'];
$name = $row['name'];
$date_entered = $row['date_entered'];
$date_modified = $row['date_modified'];
$modified_user_id = $row['modified_user_id'];
$created_by = $row['created_by'];
$description = $row['description'];
$deleted = $row['deleted'];
$assigned_user_id = $row['assigned_user_id'];
$number = $row['quote_quote_number'];
$stage = $row['quotation_status'];
$discount = $row['discount'];
$currency_id = $row['currency_id'];
$sub_total = $row['sub_total'];
$discounted_total = $row['discounted_total'];
$grand_total = $row['grand_total'];
$total_tax = $row['total_tax'];
$team_id = $row['team_id'];
$type = $row['type'];
$priority = $row['priority'];
$resolution = $row['resolution'];
$work_log = $row['work_log'];
$discount_checkbox = $row['discount_checkbox'];
$insurance_checkbox = $row['insurance_checkbox'];
$quote_type = $row['quote_type'];
$insurance = $row['insurance'];
$terms_conditions = $row['terms_conditions'];
$quotation_category = $row['quotation_category'];
$new_subtotal = $row['new_subtotal'];
$quotation_date = $row['quotation_date'];
$discounted_total = $row['discounted_total'];
$expiration = $row['valid_until_c'];
$purchase_order_number = $row['purchase_order_number_c'];
$original_p_o_date = $row['original_p_o_date_c'];
$team_list = $row['team_list_c'];
$decleration = $row['decleration_c'];
$certify = $row['certify_c'];
$company_vat_details = $row['company_vat_details_c'];
$branch = $row['branch_c'];
$contact_id = $row['contact_id_c'];
$contact_id1 = $row['contact_id1_c'];
$custom_quote_num = $row['custom_quote_num_c'];
$pdf_type = $row['pdf_type_c'];
$term = $row['payment_terms_c'];
$billing_address_city = $row['billing_address_city_c'];
$billing_address_state = $row['billing_address_state_c'];
$billing_address_postalcode = $row['billing_address_postalcode_c'];
$billing_address_country = $row['billing_address_country_c'];
$shipping_address_city = $row['shipping_address_city_c'];
$shipping_address_state = $row['shipping_address_state_c'];
$shipping_address_postalcode = $row['shipping_address_postalcode_c'];
$shipping_address_country = $row['shipping_address_country_c'];
$shipping = $row['shipping_c'];
$shipping_address = $row['shipping_address_c'];
$billing_address = $row['billing_address_c'];


$query = "INSERT INTO aos_quotes(id, name, date_entered, date_modified, modified_user_id, created_by, description, deleted, assigned_user_id,  billing_address_city, billing_address_state, billing_address_postalcode, billing_address_country, shipping_address_city, shipping_address_state, shipping_address_postalcode, shipping_address_country, number,expiration,subtotal_amount, discount_amount,total_amount, currency_id, stage, term,tax_amount,shipping_amount, team_id, billing_address_street, shipping_address_street) VALUES ('$id','$name' ,'$date_entered', '$date_modified','$modified_user_id','$created_by','$description','$deleted','$assigned_user_id','$billing_address_city','$billing_address_state','$billing_address_postalcode','$billing_address_country','$shipping_address_city','$shipping_address_state','$shipping_address_postalcode','$shipping_address_country','$number','$expiration','$sub_total','$discount','$grand_total','$currency_id','$stage','$term','$total_tax','$shipping','$team_id','$billing_address', '$shipping_address')";
//~ 
$exc_query = $db->query($query);


$query1 ="INSERT INTO aos_quotes_cstm( id_c, insurance_checkbox_c, work_log_c, terms_conditions_c, company_vat_details_c, type_c, team_list_c, resolution_c, quote_type_c, quotation_category_c, priority_c, pdf_type_c, quotation_date_c, purchase_order_number_c, original_p_o_date_c, new_subtotal_c, insurance_c, decleration_c, contact_id_c, contact_id1_c, branch_c, certify_c, custom_quote_num_c, discount_checkbox_c, discounted_total_c, billing_address_c, shipping_address_c ) 
VALUES (
'$id',  '$insurance_checkbox',  '$work_log',  '$terms_conditions',  '$company_vat_details',  '$type',  '$team_list',  '$resolution',  '$quote_type',  '$quotation_category', '$priority',  '$pdf_type',  '$quotation_date',  '$purchase_order_number',  '$original_p_o_date',  '$new_subtotal',  '$insurance',  '$decleration',  '$contact_id',  '$contact_id1', '$branch',  '$certify',  '$custom_quote_num',  '$discount_checkbox',  '$discounted_total',  '$billing_address',  '$shipping_address')";

$exc_query1 = $db->query($query1);
}
*/

//Daa Migaration For AOS_products_Quote

//~ $select_quote_query = "SELECT 
//~ `id` ,  `name` ,  `date_entered` ,  `date_modified` ,  `modified_user_id` ,  `created_by` ,  `description` ,  `deleted` , `assigned_user_id` ,  `dis_check` ,  `discount` ,  `price` ,  `discounted_price` ,  `quantity` ,  `quote_id` ,  `product_id` , `tax` ,  `team_id` ,  `group_id_c` ,  `group_type_c` ,  `uom_c` ,  `price_c` ,  `discount_c` ,  `discounted_price_c` , `service_tax_c` ,  `service_tax_val_c` ,  `product_specification_c` ,  `shipping_c` 
//~ FROM  `quote_quoteproducts` 
//~ JOIN  `quote_quoteproducts_cstm` ON id = id_c WHERE deleted=0 GROUP BY group_id_c";
//~ // GROUP BY group_id_c
//~ $query_result = $db->query($select_quote_query);

//~ while($row = $db->fetchByAssoc($query_result))
//~ {
//~ 
//~ $id = $row['id'];
//~ $name = $row['name'];
//~ $date_entered = $row['date_entered'];
//~ $date_modified = $row['date_modified'];
//~ $modified_user_id = $row['modified_user_id'];
//~ $created_by = $row['created_by'];
//~ $description = $row['description'];
//~ $deleted = $row['deleted'];
//~ $assigned_user_id = $row['assigned_user_id'];
//~ $dis_check = $row['dis_check'];
//~ $discount = $row['discount'];
//~ $price = $row['price'];
//~ $discounted_price = $row['discounted_price'];
//~ $quantity = $row['quantity'];
//~ $quote_id = $row['quote_id'];
//~ $product_id = $row['product_id'];
//~ $team_id = $row['team_id'];
//~ $group_id_c = $row['group_id_c'];
//~ $group_type_c = $row['group_type_c'];
//~ $uom_c = $row['uom_c'];
//~ $price_c = $row['price_c'];
//~ $discount_c = $row['discount_c'];
//~ $discounted_price_c = $row['discounted_price_c'];
//~ $service_tax_c = $row['service_tax_c'];
//~ $service_tax_val_c = $row['service_tax_val_c'];
//~ $product_specification_c = $row['product_specification_c'];
//~ $shipping_c = $row['shipping_c'];
//~ 
			//~ //Start Insert to ass_products_quote
			//~ $insert_query_aos_product_quote = "INSERT INTO 
			//~ `aos_products_quotes`(`id`, `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `description`, `deleted`, `assigned_user_id`, `currency_id`, `item_description`, `product_qty`, `product_cost_price`, `product_cost_price_usdollar`, `product_list_price`, `product_list_price_usdollar`, `product_discount`, `product_discount_usdollar`, `product_discount_amount`, `product_discount_amount_usdollar`, `discount`, `product_unit_price`, `product_unit_price_usdollar`, `vat`, `parent_id`, `product_id`, `group_id`,`team_id`,`parent_type`) VALUES ('$id', '$name','$date_entered','$date_modified', '$modified_user_id','$created_by', '$description','$deleted','$assigned_user_id', '-99','$product_specification_c','$quantity', '$price_c','$price_c','$price_c','$price_c', '$discount','$discount','$discounted_price_c', '$discounted_price_c','Percentage','$price_c','$price_c', '$service_tax_val_c','$quote_id','$product_id', '$group_id_c','$team_id','AOS_Quotes')";
			 //~ 
			//~ $db->query($insert_query_aos_product_quote);
			//End 
//~ 
			//~ $insert_query_aos_product_quote_cstm = "INSERT INTO 
			//~ `aos_products_quotes_cstm`(`id_c`,`uom_c`) VALUES ('$id','$uom_c')";
			//~ $db->query($insert_query_aos_product_quote_cstm);
//~ 
//~ }
//~ 
//~ 
//Start insertion records to aos_line_item_groups
//~ $group_id = create_guid();

//~ $insert_line_item = "INSERT INTO `aos_line_item_groups`(`id`, `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `description`, `deleted`, `assigned_user_id`, `total_amt`, `total_amt_usdollar`, `discount_amount`, `discount_amount_usdollar`, `total_amount`, `total_amount_usdollar`, `parent_id`, `currency_id`, `team_id`,`parent_type`) VALUES ('$group_id_c', '$group_type_c','$date_entered','$date_modified', '$modified_user_id','$created_by', '$description','$deleted','$assigned_user_id','','','','','','','$quote_id','99','$team_id','AOS_Quotes')";
//~ $db->query($insert_line_item);
//~ }
//~ 
 //~ //End


//~ $select_query = "SELECT id from aos_line_item_groups where parent_id = '$quote_id' ";
//~ $result1 =$db->query($select_query);
//~ while($rows = $db->fetchByAssoc($result1))
//~ {
//~ $id =$rows['id'];

//~ $update_aos_product = "UPDATE aos_products_quotes SET group_id = '$group_id_c' where id = '$id'";
//~ $db->query($update_aos_product);
//~ 
//~ }
//~ 
//~ $select_group_id = "SELECT parent_id 
//~ FROM  `aos_products_quotes` 
//~ WHERE group_id LIKE  '1__'
//~ GROUP BY parent_id";
//~ $result1 =$db->query($select_group_id);
//~ while($rows = $db->fetchByAssoc($result1))
//~ {
//~ $pid =$rows['parent_id'];
//~ $update_aos_product = "UPDATE aos_products_quotes SET group_id = UUID() where parent_id = '$pid'";
//~ $db->query($update_aos_product);
//~ }
//~ }
//~ 
//Updating quote_quoteproduct_cstm
//~ echo $select_group_id = "SELECT a.quote_id, b.group_id_c
//~ FROM `quote_quoteproducts` a, `quote_quoteproducts_cstm` b
//~ WHERE a.id = b.id_c
//~ AND (
//~ group_id_c = ''
//~ )
//~ GROUP BY quote_id";
//if group id is not blank add this for changing grouping to UUID

//~ AND (
//~ group_id_c LIKE '6__'
//~ OR group_id_c LIKE '6___'
//~ )
//~ GROUP BY quote_id";
//~ $result1 =$db->query($select_group_id);
//~ $guid_group = create_guid();
//~ $temp_arr = array();
//~ while($rows = $db->fetchByAssoc($result1))
//~ {
	//~ 
 //~ $pid =$rows['quote_id'];
//~ $guid_group = create_guid();	
//~ 
//~ $insert_query = "UPDATE quote_quoteproducts l JOIN quote_quoteproducts_cstm lc ON l.id = lc.id_c  SET lc.group_id_c = '$guid_group'  Where l.quote_id = '$pid' ";
//if group id is not blank add this for changing grouping to UUID
////~ And (
////~ lc.group_id_c LIKE '6__'
////~ OR lc.group_id_c LIKE '6___'
////~ )";
 //~ $insert_result_lead = $db->query($insert_query);

//~ }


/*Query for calcualting total for all AOS_Products_Quotes
 * Start
 */
/*
 $total_calculation ="SELECT * FROM aos_products_quotes Q JOIN aos_products_quotes_cstm QC ON Q.id = QC.id_c where Q.deleted =0"; 
 $total_result = $db->query($total_calculation);
 while($tot_rows =$db->fetchByAssoc($total_result))
 {			
		$id =$tot_rows['id'];
		$cost =$tot_rows['product_list_price'];
		$quantity=$tot_rows['product_qty'];
		$tax =$tot_rows['vat_percent_c'];
		$prod_disc = $tot_rows['product_discount'];
		$prod_total = $tot_rows['product_total_price'];
		//~ $prod_total_tax = $tot_rows['vat_amt'];

	 //~ if(($cost != 0.000000) && ($quantity != 0.0000) && ($prod_total == 0.000000)){
		//~ //echo $quantity;echo "<br>";
		//~ //echo $cost;echo "<br>";
	$par_id = $tot_rows['parent_id'];
	 $tot_amount =round($quantity * $cost,2);
	 $total_disc =round(($tot_amount * $prod_disc)/100 ,2);
	 
	 $total_tax =round((($tot_amount-$total_disc) * $tax)/100 ,2);
	 
	 $prod_total =round($tot_amount - $total_disc + $total_tax ,2);
	 
	$total_update_query ="UPDATE aos_products_quotes SET product_total_price= '$prod_total' ,product_total_price_usdollar='$prod_total', vat_amt ='$total_tax', vat_amt_usdollar= '$total_tax', product_discount_amount_usdollar= '$total_disc', product_discount_amount= '$total_disc' where id ='$id'";
	$db->query($total_update_query);
	 
 //~ }
	 
 } 
*/ 




/*
$select_product_total ="SELECT group_id,parent_id FROM aos_products_quotes where deleted =0 ";
$execute_select =$db->query($select_product_total);
while($fet_rows =$db->fetchByAssoc($execute_select))
{
	$line_id =$fet_rows['group_id'];
	$line_id1 =$fet_rows['parent_id'];

	
	
	
	$quote_product ="SELECT * FROM aos_products_quotes WHERE group_id = '$line_id' and parent_id = '$line_id1'";
	
	$result =$db->query($quote_product);
	$total_amt = 0;
	$total_tax = 0;
	$prod_disc_amt = 0;
	while($rows = $db->fetchByAssoc($result))
	{	
		$grp_id =$rows['group_id'];
		$parent_id =$rows['parent_id'];
		$total_from_group = $rows['product_total_price'];

		$total_vat_from_group = $rows['vat_amt'];
		$total_vat_from_group =str_replace('-','',$total_vat_from_group);
		//~ //$product_disc_amt = $rows['product_discount_amount'];
		//~ //$prod_disc = $rows['product_discount'];
		$cost =$rows['product_list_price'];
		$quantity=$rows['product_qty'];
		//~ $tax =$tot_rows['vat'];
		$prod_disc = $rows['product_discount'];
		
		
		$tot_amount =round($quantity * $cost,2);
		$total_disc =round(($tot_amount * $prod_disc)/100 ,2); 
		$prod_disc_amt = round($prod_disc_amt + $total_disc ,2);
		$total_amt = round($total_amt + $total_from_group,2);
		$total_tax = round($total_tax + $total_vat_from_group, 2);
		
		
		
	}
	$sub_total = round($total_amt - $total_disc);
	$grand_group_total = round($sub_total + $total_tax);
	
	
	$line_item_update_query ="UPDATE aos_line_item_groups SET total_amt= '$total_amt' ,total_amt_usdollar= '$total_amt' ,tax_amount= '$total_tax' ,tax_amount_usdollar= '$total_tax' ,discount_amount_usdollar= '$prod_disc_amt' ,discount_amount= '$prod_disc_amt', subtotal_amount_usdollar= '$sub_total', subtotal_amount= '$sub_total', total_amount_usdollar= '$grand_group_total',total_amount= '$grand_group_total' WHERE id = '$line_id'";
	 $db->query($line_item_update_query);
}


 */



//Migrating tax field into AOS_product_quotes

//~ $query ="Select tax ,id from quote_quoteproducts ";
//~ $result= $db->query($query);
//~ while($rows =$db->fetchByAssoc($result))
//~ {
	//~ $tax =$rows['tax'];
	//~ $id =$rows['id'];
	//~ $update="Update aos_products_quotes_cstm SET tax_c='$tax' where id_c= '$id'";
	//~ $db->query($update);
//~ }

/*
//Migrating shipping field into AOS_product_quotes

$query ="SELECT service_tax_c, id_c, service_tax_val_c FROM quote_quoteproducts_cstm";
$result= $db->query($query);
while($rows =$db->fetchByAssoc($result))
{
	$tax =$rows['service_tax_c'];
	$id =$rows['id_c'];
	$vat_percent =$rows['service_tax_val_c'];
	if($id != '')
	{
	echo $update="Update aos_products_quotes_cstm C JOIN aos_products_quotes P ON C.id_c = P.id SET P.vat='$tax', C.vat_percent_c='$vat_percent' where C.id_c= '$id'";
	}
	 $db->query($update);
}
* 
*/ 

/*
//Migrating discount from quote_quoteProducts to aos_product_quotes

$query ="SELECT discount_c, id_c FROM quote_quoteproducts_cstm";
$result= $db->query($query);
while($rows =$db->fetchByAssoc($result))
{
	$discount =$rows['discount_c'];
	$id =$rows['id_c'];
	//~ $vat_percent =$rows['service_tax_val_c'];
	if($id != '')
	{
	$update="Update aos_products_quotes SET product_discount_usdollar='$discount', product_discount= '$discount' where id= '$id'";
	$db->query($update);
	}
	 //~ $db->query($update);
}
* 
*/ 

/*
$query ="SELECT A.billing_address_state AS region, id
FROM accounts A
WHERE A.billing_address_country = 'India'
AND billing_address_state
IN (
'400001'
)
AND A.deleted =0";

$result =$db->query($query);

while($row = $db->fetchByAssoc($result))
{

$id = $row['id'];
 $query1 ="UPDATE accounts SET billing_address_state= 'Mumbai' WHERE billing_address_state IN (
'400001'
) AND id ='$id'";
 $db->query($query1);
}
* 
*/


/*
//Moving Expected closed to actual date

$query ="SELECT id ,  date_closed 
FROM  opportunities 
WHERE deleted =0
AND  sales_stage =  'Closed Won'";
$result = $db->query($query);

while($row = $db->fetchByAssoc($result))
{
$id = $row['id'];
$date_closed =$row['date_closed'];

$update_query ="UPDATE opportunities_cstm SET actual_date_closed_c= '$date_closed' where id_c ='$id'";
$db->query($update_query);
}
* 
*/ 


?>
