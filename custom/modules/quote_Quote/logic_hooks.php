<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
$hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array();
$hook_array['after_save'] = Array();

//order, comments, file path, class name, function name
//$hook_array['before_save'][] = Array(1, 'generating different numbers for different type of quotes', 'custom/modules/quote_Quote/quoteNumGen.php','QuoteNumGen', 'autoIncrementQN');
//
$hook_array['after_save'][] = Array(1, 'saving the line items in database', 'custom/modules/quote_Quote/logic_hooks/line_item_save.php','LineItemSave', 'line_item_after_save');
$hook_array['after_save'][] = Array(2, 'saving the line items in database', 'custom/modules/quote_Quote/logic_hooks/address_save.php','AddressSave', 'address_after_save');
$hook_array['before_save'][] = Array(1, 'Save Quote Number', 'custom/modules/quote_Quote/logic_hooks/quoteNumber.php','quoteNumber', 'quoteNumber');
$hook_array['before_save'][] = Array(2, 'Approval status check', 'custom/modules/quote_Quote/DiscountApproval.php','DiscountApproval', 'approval_status_check');

$hook_array['process_record'] = Array();
$hook_array['process_record'][] = Array(1, 'Quotes valid until ', 'custom/modules/quote_Quote/QuoteValidUntil.php','QuoteValidUntil', 'quote_valid_until');

$hook_array['after_save'][] = Array(3, 'Discount Approval', 'custom/modules/quote_Quote/DiscountApproval.php','DiscountApproval', 'discount_approval');
$hook_array['after_save'][] = Array(4, 'Sending Email for Product Cost', 'custom/modules/quote_Quote/SendEmailforProductCost.php','SendEmailforProductCost', 'send_email_for_product');
?>
