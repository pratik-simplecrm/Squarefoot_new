<?php
ini_set('display_errors', 'On');

if (!defined('sugarEntry'))
    define('sugarEntry');
global $current_user;
require_once('include/entryPoint.php');

$db = DBManagerFactory::getInstance();
$tax_array = array();

$query = "SELECT name, tax_value from quote_quotetax where deleted=0";
$query = $db->query($query);

$i = 0;
while ($row = $db->fetchByAssoc($query)) {
    $tax_array[$i]['name'] = $row['name'];
    $tax_array[$i]['value'] = $row['tax_value'];
    $i++;
}
array_unshift($tax_array, array('name' => '', 'value' => ''));
$json_tax_array = json_encode($tax_array);
$is_admin = $current_user->is_admin;
if($is_admin =='1')
        {
            $edit_unitprice ='1';
        }
        else
        {
            $edit_unitprice ='0';
        }
?>
<script type="text/javascript" src ="include/javascript/quicksearch.js"></script>
<script type="text/javascript">
    var tableId = 'QuotesLineTable';
    var totRowCount = 0;
    var inlinefields = Array();
    var table_name = '';
    inlinefields[0] = false;

    var g_final_dis = 0;
    var g_total_tax = 0;
    var g_new_subtotal = 0;
    var g_grand_total = 0;
    var g_sub_total = 0;
    var group_count = 0;

    function setsqsValue(count, totRowCount)
    {
        var count = count;
        var totRowCount = totRowCount;
        var sqsObject = {
            form: 'EditView',
            method: 'query',
            modules: Array("quote_Products"),
            group: 'or',
            //field_list : Array('name', 'id'),
            field_list: Array('id', 'name', 'uom_c', 'unit_price_c', 'tax_class_c'),
            populate_list: Array('product_' + count + '_' + totRowCount, 'product_' + count + '_' + totRowCount + '_id'),
            conditions: Array({name: 'name', op: 'like_custom', end: '%', value: ''}),
            order: 'name',
            limit: '30'
        };
        sqs_objects["EditView_product_" + count + "_" + totRowCount] = sqsObject;

        //addToValidateBinaryDependency("EditView", "product_"+count+"_"+totRowCount, "alpha", false, "Error", "product_"+count+"_"+totRowCount+"_id" );
        SUGAR.util.doWhen("typeof(sqs_objects) != \'undefined\' && typeof(sqs_objects['EditView_product_'+count+'_'+totRowCount]) !=\'undefined\'", enableQS);
    }

    // added one extra parameter Sqm_Box (written by pratik and anjali on 09072019
    function addRow(count, quantity, prodName, productId, code, uom, amount, tax, discount, type, recordId, groupType, serviceTax, serviceTaxVal, Prod_Spec, pliID, Sqm_Box) {
        //$("#total_tax_"+count).val('0.00');
        // var count = count;
        // var rowcount = Number($('#rowcount').val())+count;
        // $('#rowcount').val(rowcount);

        if (!groupType) {
            var groupValue = $('#group_id_' + count).val();
            groupValue = $.trim(groupValue);
            if (typeof groupValue == 'undefined' || groupValue == '') {
                alert('Please select Group Name');
                return '';
            }
        }
        var table_name = tableId + '_' + count;
        group_count = count;
        //console.log('All group__ '+group_count);
        var table = document.getElementById(tableId + '_' + count);
        var totRowCount = $('#' + table_name + ' tr').length - 2;

        if (totRowCount) {
            $('[id*="qinrow_' + count + '"]').each(function () {
                var countRowId = $(this).attr('id');
                var arr = countRowId.split('_');
                totRowCount = arr[2];
            });
        }
        totRowCount++;
        setsqsValue(count, totRowCount);

        //table.rows.length=1;
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        //Adding Quantity
        row.id = "qinrow_" + count + "_" + totRowCount;
        /*
         var sqs_id = 'EditView'+'_product_'+count+'_'+totRowCount;
         sqs_objects[sqs_id] = {
         'id': sqs_id,
         'form': 'EditView',
         'method': 'query',
         'modules': ['quote_Products'],
         'group': 'or',
         'field_list': ['name', 'id'],
         'populate_list': ['product_'+count+'_'+totRowCount, 'product_'+count+'_'+totRowCount+'_id'],
         'conditions': [{
         'name': 'name',
         'op': 'like_custom',
         'end': '%',
         'value': ''
         }],
         'order': 'name',
         'limit': '30'
         };
         */
        var cell1 = row.insertCell(0);
        cell1.style.verticalAlign = "top";
        var element1 = document.createElement("input");
        element1.type = "text";
        element1.size = "10";
        element1.value = "1";
        element1.id = "quantity_" + count + "_" + totRowCount;
        element1.name = "quantity_" + count + "_" + totRowCount;

        var dCount = count + '_' + totRowCount;
        element1.setAttribute('onblur', 'calculate(\'' + dCount + '\',count)');
        addToValidate('EditView', element1.id, 'text', true, 'Quantity');
        cell1.appendChild(element1);
        if (quantity) {
            element1.value = quantity;
        }
        //Adding Product
        var cell2 = row.insertCell(1);
        cell2.style.verticalAlign = "top";
        var element2 = document.createElement("input");
        element2.id = "product_" + count + "_" + totRowCount;
        element2.name = "product_" + count + "_" + totRowCount;
        element2.size = "35";
        //element2.class="sqsEnabled";
        //element2.setAttribute('class', 'sqsEnabled yui-ac-input');
        element2.readOnly = true;
        addToValidate('EditView', element2.id, 'text', true, 'Product');
        cell2.appendChild(element2);
        if (prodName) {
            element2.value = prodName;
        }

        var elementHidden = document.createElement("input");
        elementHidden.id = "product_" + count + "_" + totRowCount + "_id";
        elementHidden.name = "product_" + count + "_" + totRowCount + "_id";
        elementHidden.type = "hidden";
        cell2.appendChild(elementHidden);
        if (productId) {
            elementHidden.value = productId;
        }

        var elementHidden2 = document.createElement("input");
        elementHidden2.id = "total_rows";
        elementHidden2.name = "total_rows";
        elementHidden2.value = totRowCount;
        elementHidden2.type = "hidden";
        cell2.appendChild(elementHidden2);

        var elementHidden3 = document.createElement("input");
        elementHidden3.id = "prod_rec_" + count + "_" + totRowCount + "_id";
        elementHidden3.name = "prod_rec_" + count + "_" + totRowCount + "_id";
        elementHidden3.type = "hidden";
        if (recordId) {
            elementHidden3.value = recordId;
        }
        cell2.appendChild(elementHidden3);
		
		//written by pratik and anjali on 09072019 start
		var element15 = document.createElement("input");
        element15.id = "sqm_box_" + count + "_" + totRowCount;
        element15.name = "sqm_box_" + count + "_" + totRowCount;
        element15.type = "number";
        element15.placeholder = "SQM/BOX";
        element15.className = "SQMBOX row";
        if (Sqm_Box) {
            element15.value = Sqm_Box;
        }
        cell2.appendChild(element15);
		//written by pratik and anjalion 09072019 end

        var element3 = document.createElement("button");
        element3.id = "btn_product";
        //element3.class="button firstChild";
        element3.type = "button";
        element3.tabindex = "131";
        element3.innerHTML = '<img src="themes/default/images/id-ff-select.png">';
        element3.name = "btn_product";
        //element3.setAttribute('onclick', 'open_popup( "quote_Products",  600,  400,  "",  true,  false,  {"call_back_function":"set_product_return","form_name":"EditView","field_to_name_array":{"id":"product_'+count+'_'+totRowCount+'_id","name":"product_'+count+'_'+totRowCount+'","prod_spec_c":"prod_spec_'+count+'_'+totRowCount+'","uom_c":"uom_'+count+'_'+totRowCount+'","unit_price_c":"price_'+count+'_'+totRowCount+'","tax_class_c":"quote_tax_'+count+'_'+totRowCount+'"}, "passthru_data":{"row_id":"'+count+'_'+totRowCount+'"}},  "single",  true );');

        if (groupValue == 'Product') {
            groupValue = 'Products';
        }
        element3.setAttribute('onclick', 'open_popup( "quote_Products",  600,  400,  "&type_c_advanced[]=' + groupValue + ' ",  true,  false,  {"call_back_function":"set_product_return","form_name":"EditView","field_to_name_array":{"id":"product_' + count + '_' + totRowCount + '_id","name":"product_' + count + '_' + totRowCount + '","prod_spec_c":"prod_spec_' + count + '_' + totRowCount + '","uom_c":"uom_' + count + '_' + totRowCount + '","unit_price_c":"price_' + count + '_' + totRowCount + '","tax_class_c":"quote_tax_' + count + '_' + totRowCount + '"}, "passthru_data":{"row_id":"' + count + '_' + totRowCount + '","group_type":"groupValue"}},  "single",  true );');
        cell2.appendChild(element3);

        var elementclear = document.createElement("button");
        elementclear.id = "btn_clr_product";
        //elementclear.class = "button lastChild";
        elementclear.type = "button";
        elementclear.innerHTML = '<img src="themes/default/images/id-ff-clear.png">';
        elementclear.name = "btn_clr_product";
        elementclear.setAttribute('onclick', 'clear_product(' + totRowCount + ',' + count + ')');
        cell2.appendChild(elementclear);

         var element13 = document.createElement("textarea");
        element13.id = "prod_spec_" + count + "_" + totRowCount;
        element13.name = "prod_spec_" + count + "_" + totRowCount;
        if (Prod_Spec) {
            element13.value = Prod_Spec;
        }
        cell2.appendChild(element13); 

        //Adding Remove Button
        var cell14 = row.insertCell(2);
        cell14.style.verticalAlign = "top";
        var element14 = document.createElement("input");
        element14.type = "text";
        element14.id = "code_" + count + "_" + totRowCount;
        element14.name = "code_" + count + "_" + totRowCount;
        element14.readOnly = true;
        element14.setAttribute('style', 'background-color: #DDDDDD;');
        element14.size = "10";
        cell14.appendChild(element14);
        if (code) {
            element14.value = code;
        }

        var cell7 = row.insertCell(3);
        cell7.style.verticalAlign = "top";
        var element8 = document.createElement("input");
        element8.type = "text";
        element8.id = "uom_" + count + "_" + totRowCount;
        element8.name = "uom_" + count + "_" + totRowCount;
        element8.readOnly = true;
        element8.setAttribute('style', 'background-color: #DDDDDD;');
        element8.size = "5";
        cell7.appendChild(element8);
        if (uom) {
            element8.value = uom;
        }

        //element8.value=amount;

        var cell3 = row.insertCell(4);
        cell3.style.verticalAlign = "top";
        var element4 = document.createElement("input");
        element4.type = "text";
        element4.id = "price_" + count + "_" + totRowCount;
        element4.name = "price_" + count + "_" + totRowCount;
        element4.className = "price_product";
        
        element4.size = "10";

        var dCount = count + '_' + totRowCount;
        //element4.setAttribute('onblur', 'calculate(\'' + dCount + '\',count)');
        element4.setAttribute('onchange', 'checkUnitPrice(\'' + dCount + '\',count)');
        cell3.appendChild(element4);
        if (amount) {
            element4.value = amount;
        }
        
        //Unit price readonly
		//~ $('[id*="price_1_"]').each(function(index){
			
			//~ var did = $(this).attr('id');
			//~ if($('#'+did).val() > 0){
				//~ element4.readOnly = true;
				//~ element4.setAttribute('style', 'background-color: #DDDDDD;');
			//~ }
		//~ });

        var newcell = row.insertCell(5);
        newcell.style.verticalAlign = "top";
        var elementdd = document.createElement("input");
        elementdd.type = "text";
        elementdd.name = "quote_tax_" + count + "_" + totRowCount;
        elementdd.id = "quote_tax_" + count + "_" + totRowCount;
        elementdd.readOnly = true;
        elementdd.setAttribute('style', 'background-color: #DDDDDD;');
        elementdd.size = "10";

        var dCount = count + '_' + totRowCount;
        elementdd.setAttribute('onchange', 'calculate(\'' + dCount + '\',count)');
        newcell.appendChild(elementdd);
        if (tax) {
            elementdd.value = tax;
        }
        /*
         var newcell = row.insertCell(4);
         newcell.style.verticalAlign= "top";
         var elementdd = document.createElement("select");
         elementdd.name = "quote_tax_"+count+"_"+totRowCount;
         elementdd.id="quote_tax_"+count+"_"+totRowCount;
         
         var dCount = count+'_'+totRowCount;
         elementdd.setAttribute('onchange', 'calculate(\''+dCount+'\',count)');
         newcell.appendChild(elementdd);
         var options = '<?php echo $json_tax_array; ?>';
         var result = JSON.parse(options);
         for(var i=0;i<result.length;i++) {
         var newOpt = document.createElement("option");
         newOpt.text = result[i].name;
         newOpt.value = result[i].value;
         elementdd.options.add(newOpt);
         }
         if(tax) {
         elementdd.value = tax;
         }
         */
        var cell4 = row.insertCell(6);
        cell4.style.verticalAlign = "top";
        var element5 = document.createElement("input");
        element5.type = "text";
        element5.size = "5";
        element5.id = "discount_" + count + "_" + totRowCount;
        element5.class = "";
        element5.name = "discount_" + count + "_" + totRowCount;
        element5.value = '0';
        
        
		
		//Readonly remaining discount fields
        //~ $('[id*="discount_1_"]').each(function(index){
			
			//~ var did = $(this).attr('id');
			//~ if($('#'+did).val() > 0){
				//~ element5.disabled = true; 
			//~ }
		//~ });
		

        var dCount = count + '_' + totRowCount;
        /*
         element5.setAttribute('onblur', 'calculate(\''+dCount+'\',count)');
         */
        element5.setAttribute('onblur', 'checkValidation(\'' + dCount + '\',count)');
        cell4.appendChild(element5);
        if (discount) {
            element5.value = discount;
        }
        // var cell21 = row.insertCell(7);
        // cell21.style.verticalAlign="top";
        var element21 = document.createElement("input");
        element21.type = "hidden";
        element21.size = "5";
        element21.id = "discount_amount_" + count + "_" + totRowCount;
        element21.class = "";
        element21.name = "discount_amount_" + count + "_" + totRowCount;
        element21.value = '0';
        cell4.appendChild(element21);

        // var cell22 = row.insertCell(7);
        // cell22.style.verticalAlign="top";
        var element22 = document.createElement("input");
        element22.type = "hidden";
        element22.size = "5";
        element22.id = "total_price_" + count + "_" + totRowCount;
        element22.class = "";
        element22.name = "total_price_" + count + "_" + totRowCount;
        element22.value = '0';
        cell4.appendChild(element22);

        var cell5 = row.insertCell(7);
        //cell5.style.verticalAlign = "top";
        var element6 = document.createElement("input");
        element6.type = "checkbox";
        element6.id = "in_" + count + "_" + totRowCount;
        element6.name = "in_" + count + "_" + totRowCount;

        var dCount = count + '_' + totRowCount;
        /*
         element6.setAttribute('onchange', 'calculate(\''+dCount+'\',count)');
         */
        element6.setAttribute('onchange', 'checkValidation(\'' + dCount + '\',count)');
        cell5.appendChild(element6);
        if (type == 1) {
            element6.setAttribute('checked', true);
        }
        
        //~ if(totRowCount >= 2 ) {
			
			//~ element6.disabled = true;
		//~ }
        
        var cell16 = row.insertCell(8);
        cell16.style.verticalAlign = "top";
        var element12 = document.createElement("input");
        element12.type = "text";
        element12.size = "5";
        element12.readOnly = true;
        element12.setAttribute('style', 'background-color: #DDDDDD;');
        element12.id = "service_tax_" + count + "_" + totRowCount;
        element12.name = "service_tax_" + count + "_" + totRowCount;
        var dCount = count + '_' + totRowCount;
        element12.setAttribute('onblur', 'calculate(\'' + dCount + '\',count)');
        //element12.value = $('#service_tax_val_'+count).val();
        cell16.appendChild(element12);
        if (serviceTax) {
            element12.value = serviceTax;
        }
        // var cell20 = row.insertCell(9);
        // cell20.style.verticalAlign="top";
        var element17 = document.createElement("input");
        element17.type = "hidden";
        element17.id = "charges_" + count + "_" + totRowCount;
        element17.name = "charges_" + count + "_" + totRowCount;
        //element4.readOnly = true;
        //element4.setAttribute('style', 'background-color: #DDDDDD;');
        element17.size = "10";

        var dCount = count + '_' + totRowCount;
        //cell17.setAttribute('onblur', 'calculate(\''+dCount+'\',count)');
        cell16.appendChild(element17);
        // var cell15 = row.insertCell(9);
        // cell15.style.verticalAlign = "top";
        // var element11 = document.createElement("input");
        // element11.type="text";
        // element11.size="10";
        // element11.id="service_tax_val_"+count+"_"+totRowCount;
        // element11.name="service_tax_val_"+count+"_"+totRowCount;
        // //element11.value = $('#service_tax_'+count).val();
        // cell15.appendChild(element11);
        // if(serviceTaxVal){
        // 	element11.value =serviceTaxVal;
        // }


        var cell6 = row.insertCell(9);
        cell6.style.verticalAlign = "top";
        var element7 = document.createElement("input");
        element7.type = "button";
        element7.value = "Remove";
        //var dCount = count+'_'+totRowCount;
        element7.setAttribute('onclick', "removeRow('" + totRowCount + "','" + count + "')");
        //element7.setAttribute('onclick', 'removeRow(\''+dCount+'\',count)');
        cell6.appendChild(element7);

        var cell8 = row.insertCell(10);
        //cell5.style.verticalAlign = "top";
        var element9 = document.createElement("input");
        element9.type = "hidden";
        element9.id = "group_id_" + count + "_" + totRowCount;
        element9.name = "group_id_" + count + "_" + totRowCount;
        element9.value = $('#group_id_' + count).val();
        if (groupType) {
            element9.value = groupType;
        }

        var element10 = document.createElement("input");
        element10.type = "hidden";
        element10.id = "dis_check_" + count + "_" + totRowCount;
        element10.name = "dis_check_" + count + "_" + totRowCount;
        if ($("#in_" + count + "_" + totRowCount).is(":checked")) {
            element10.value = '1';
        } else {
            element10.value = '0';
        }



        var element13 = document.createElement("input");
        element13.type = "hidden";
        element13.id = "pli_id_" + count + "_" + totRowCount;
        element13.name = "pli_id_" + count + "_" + totRowCount;
        element13.value = '';
        if (pliID) {
            element13.value = pliID;
        }

        cell8.appendChild(element9);
        cell8.appendChild(element10);
        // cell8.appendChild(element11);
        // cell8.appendChild(element12);
        cell8.appendChild(element13);

        inlinefields[totRowCount] = true;
        if (groupType) {
            $('#group_id_' + count).val(groupType);
        }
        // if(serviceTax){
        // 	$('#service_tax_'+count).val(serviceTax);
        // }
        // if(serviceTaxVal){
        // 	$('#service_tax_val_'+count).val(serviceTaxVal);
        // }
        calculate(dCount, count);


        $('[id*="in_"]').change(function () {
            var disc_check = $(this).attr('id');
            //alert(disc_check);
            var arr = disc_check.split('_');
            var disID = arr[1] + '_' + arr[2];
            if ($("#" + disc_check).is(":checked")) {
                //alert(arr[1]+'_'+arr[2]);
                $('#dis_check_' + disID).val('1');
            } else {
                $('#dis_check_' + disID).val('0');
            }
        });
    }

//Code To Remove the Group Onclick of Remove Group Button

    function removeGroup(group_count) {
        //var sub_total_6 = $('#sub_total').val();
        //alert(sub_total_6);
        //$("#package_panel_"+group_count).remove();
        //alert(group_count);
        //alert($("#package_panel_"+group_count+" table tbody [id*='product_']").val());
        var totRowCount = 0;
        $("#package_panel_" + group_count + " table tbody [id*='product_']").each(function () {
            var productID = $(this).attr('id');
            var arr = productID.split('_');
            totRowCount = arr[2];
            //alert(rowCount);
            //var dCount = group_count+'_'+rowCount;
            //calculate(dCount,group_count);
        });
        //alert(totRowCount);

        var sub_total = $("#sub_total_" + group_count).val();
        var discount = $("#discounted_total_" + group_count).val();
        var discounted_total = $("#new_subtotal_" + group_count).val();
        var total_tax = $("#total_tax_" + group_count).val();
        var grand_total = $("#grand_total_" + group_count).val();

        sub_total = parseFloat($('#sub_total').val()) - parseFloat(sub_total);
        discount = parseFloat($('#discount').val()) - parseFloat(discount);
        discounted_total = parseFloat($('#discounted_total').val()) - parseFloat(discounted_total);
        total_tax = parseFloat($('#total_tax').val()) - parseFloat(total_tax);
        //alert(total_tax);
        grand_total = parseFloat($('#grand_total').val()) - parseFloat(grand_total);

        $('#sub_total').val(parseFloat(sub_total).toFixed(2));
        $('#discount').val(parseFloat(discount).toFixed(2));
        $('#discounted_total').val(parseFloat(discounted_total).toFixed(2));
        $('#total_tax').val(parseFloat(total_tax).toFixed(2));
        $('#grand_total').val(parseFloat(grand_total).toFixed(2));



        for (var rowCount = 1; rowCount <= totRowCount; rowCount++)
        {
            removeRow(rowCount, group_count);
        }

        $("#package_panel_" + group_count).remove();

    }

    function removeRow(rowCount, count) {
		
		//alert(rowCount);
        $('#old_pli_c').append(',' + $('#pli_id_' + count + "_" + rowCount).val());
        var row = document.getElementById("qinrow_" + count + "_" + rowCount);
        row.parentNode.removeChild(row);
        removeFromValidate("EditView", "product_" + count + "_" + rowCount);
        removeFromValidate("EditView", "quantity_" + count + "_" + rowCount);
        inlinefields[rowCount] = false;
        var dCount = count + '_' + rowCount;
		
		
		
        calculate(dCount, count);
    }

    function clear_product(rowCount, count) {
        $("#product_" + count + "_" + rowCount + ", #product_" + count + "_" + rowCount + "_id, #price_" + count + "_" + rowCount).val('');
        $("#discount_" + count + "_" + rowCount).val('0');
        var dCount = count + '_' + rowCount;
        calculate(dCount, count);
    }

    function checkValidation(dcount, count) {
        var discountValue = parseFloat($('#discount_' + dcount).val());
        var discChecked = $("#in_" + dcount).is(":checked");
        if (discChecked && discountValue > 100) {
            alert('Discount should not be more than 100%');
            $('#discount_' + dcount).val(0);
        }
        calculate(dcount, count);
    }

    function set_product_return(popup_reply_data) {
          //fetch the row number and then its specific details
        var row = popup_reply_data["passthru_data"]["row_id"];
        var uom = popup_reply_data["name_to_value_array"]["uom_" + row];
        var price = Number(popup_reply_data["name_to_value_array"]["price_" + row]);
        var quote_tax = popup_reply_data["name_to_value_array"]["quote_tax_" + row];
        var prod_id = popup_reply_data["name_to_value_array"]["product_" + row + "_id"];
        var prod_name = popup_reply_data["name_to_value_array"]["product_" + row];
        var prod_spec = popup_reply_data["name_to_value_array"]["prod_spec_" + row];
		
        // var type = popup_reply_data["name_to_value_array"]["type_c"+row];
        // alert(type);
        var branch = document.getElementById("branch_c").value;
		// written by pratik on 08072019
		var selectedCurrency = $('#currency_id_select :selected').text();//$(this).children("#s1 option:selected").val();
		var res = selectedCurrency.split(" ");
		// written by pratik on 08072019
        //console.log(branch);
		//console.log(res[0]);
        //alert(uom);
        $("#product_" + row + "_id").val(prod_id);
        $("#product_" + row).val(prod_name);
        $("#uom_" + row).val(uom);
        
        $("#quote_tax_" + row).val(quote_tax);
        $("#prod_spec_" + row).val(prod_spec);

        //When the UOM and Taxable is not fetching , then this code will get that thru Ajax call
        $.ajax({

            url: 'customAjax.php',
            type: 'GET',
            asyn: false,
            data: {product_id: prod_id,branch:branch},
            success: function (result) {
				//alert(result);
                var resObj = jQuery.parseJSON(result);
                //alert(resObj);
				console.log(resObj);
                $("#price_" + row).val(resObj.unit_price_c); 
                $("#uom_" + row).val(resObj.uom);
                $("#quote_tax_" + row).val(resObj.tax_class);
                $("#service_tax_" + row).val(resObj.gst_c);
                if (resObj.type == 'Products')
                {
                    $("#code_" + row).val(resObj.hsn_code_c);
                } else if (resObj.type == 'Installation')
                {
                    $("#code_" + row).val(resObj.sac_code_c);
                }
            }
        });
       
		
		
        calculate(row, count);
    }
    function checkUnitPrice(table_name, count)
    {
		$("#in_"+table_name).attr('disabled',true);
		$("#discount_" +table_name).attr('readOnly','readOnly');
		$('#GroupName_1').append('<input type="hidden" name="unit_price_changed" id="unit_price_changed" value="1">');
		/*
        // alert(table_name);
        // alert(count);
        //var current_user_name = '<?php echo $current_user_name ?>';
                //console.log(current_user_name);
                //var edit_unit_price = '<?php echo $edit_unitprice ?>';
                //console.log(edit_unit_price+'unit price');
                var amt = $("#price_" +table_name).val();
                var prod_id = $('#product_'+table_name+'_id').val();
                //console.log(prod_id);
                var branch = $('#branch_c').val();
               // if(edit_unit_price =='0')
                //{
                 $.ajax({

                    url: 'checkUnitPrice.php',
                    type: 'GET',
                    asyn: false,
                    data: {product_id: prod_id,branch:branch,amt:amt},
                    success: function (response) {
						var result = JSON.parse(response);
						$("#discount_" +table_name).val(result.discount);
						$("#price_" +table_name).val(result.unit_price);
						$("#in_"+table_name).attr('checked',true).attr('disabled',true);
						checkValidation(table_name,count);
						
						
                        
                    }
                });*/
            
    }
    function calculate(table_name, count) {
     
        var table_name = table_name;
        var group_count = ($('#group_counts').val() / 2);
        //alert(group_count);
//console.log('GGCC'+group_count);
        var table_count = table_name.slice(0, 1);
        var tableId = 'QuotesLineTable';
        var table_name = tableId + '_' + table_count;

        var totRowCount1 = $('#' + table_name + ' tr').length - 2;
        if (totRowCount1 >= 1) {
            var last_row_id = $('#' + table_name + ' tr:last').attr('id');
            //var last_row_id = last_row_id.slice(-1);
            var arr = last_row_id.split('_');
            var last_row_id = arr[2];

            var totRowCount = last_row_id;
        }
        var count = table_count;

        var sub_total = 0;
        var final_dis = 0;
        var new_subtotal = 0;
        var grand_total = 0;
        var total_tax = 0;
        //console.log(totRowCount);
        if (totRowCount1 == 0) {
            $("#sub_total_" + count).val('0');
            $("#discounted_total_" + count).val('0');
            $("#new_subtotal_" + count).val('0');
            $("#total_tax_" + count).val('0');
            $("#grand_total_" + count).val('0');

        }

        for (i = 1; i <= totRowCount; i++) {
            if (totRowCount) {
                var qty = ($("#quantity_" + count + "_" + i).val() != '') ? $("#quantity_" + count + "_" + i).val() : '0';

                var amt = ($("#price_" + count + "_" + i).val() != '') ? $("#price_" + count + "_" + i).val() : '0';
                //alert(amt);
                amt = amt * qty;
                //$("#amount_"+count+"_"+i).val(amt);
                var discount = ($("#discount_" + count + "_" + i).val() != '') ? $("#discount_" + count + "_" + i).val() : '0';
                var dis_check = $("#in_" + count + "_" + i).is(':checked');

                var gst = $("#service_tax_" + count + "_" + i).val();
                var tax_val = gst.split("%");
                var tax = tax_val[0];
                var dis1 = (dis_check) ? Number((discount * amt) / 100) : Number(discount * qty);
                $("#discount_amount_" + count + "_" + i).val(dis1);
                var total_price = Number(amt) - Number(dis1);
                $("#total_price_" + count + "_" + i).val(total_price);
                //var shipping = getHighestGST(gst, count, totRowCount).toFixed(2);
                //$("#shipping_amt_" + count).val(shipping);
                //shipping = shipping.replace(',', '');

                if (sub_total == '') {
                    if (isNaN(amt)) {
                        sub_total = 0;
                    } else {
                        sub_total = Number(amt);
                    }
                } else {
                    if (isNaN(amt)) {
                        sub_total = Number(sub_total);
                    } else {
                        sub_total = Number(sub_total) + Number(amt);
                    }
                }

                // //discounted total
                if (isNaN(final_dis) || isNaN(dis1)) {
                    final_dis = 0;
                } else {
                    final_dis = Number(final_dis) + Number(dis1);					// By Mohnish
                    //final_dis = Number(final_dis) + Number( Number(dis1)*Number(qty) );
                }

                // //new subtotal
                if (isNaN(final_dis) || isNaN(amt) || isNaN(final_dis)) {
                    new_subtotal = 0;
                } else {
                    new_subtotal = Number(new_subtotal) + Number(amt - final_dis);
                    //new_subtotal = Number(new_subtotal) + Number(sub_total-final_dis);
                }

                // //total tax
                if (isNaN(amt) || isNaN(tax)) {
                    amt = 0;
                    tax = 0;
                }

                row_amt = amt - dis1;
                total_tax = Number(total_tax) + Number((row_amt * tax / 100));

                // if(isNaN(total_tax) || isNaN(new_subtotal) || isNaN(tax)){
                //  total_tax = 0;
                // }else{
                //  total_tax = Number(total_tax) + Number((new_subtotal*tax)/100);
                // }

                // //shipping tax
                if (isNaN(shipping)) {
                    shipping = 0;
                } else {
                    shipping = Number(shipping)
                }
               
                // //grand total
                if (isNaN(new_subtotal) || isNaN(total_tax)) {
                    grand_total = 0;
                } else {
                    grand_total = Number(new_subtotal + total_tax + shipping);
                }

                //END

                var newSubtotal = sub_total - final_dis;
                // var newTax = amt * (tax/100);
                // newTax = Number($("#total_tax_"+count).val()) + Number(newTax);
                //alert(newTax);
				
				
				var Total = newSubtotal + total_tax + shipping;
				
				
				
                $("#sub_total_" + count).val(parseFloat(sub_total).toFixed(2));
                $("#discounted_total_" + count).val(parseFloat(final_dis).toFixed(2));
                //$("#new_subtotal_"+count).val(parseFloat(new_subtotal).toFixed(2));
                $("#new_subtotal_" + count).val(parseFloat(newSubtotal).toFixed(2));
                //$("#total_tax_" + count).val(parseFloat(total_tax).toFixed(2));
                //alert(tax);
                //$("#grand_total_" + count).val(parseFloat(Total).toFixed(2));

            } else {
                $("#sub_total_" + count).val(parseFloat(sub_total).toFixed(2));
                $("#discounted_total_" + count).val(parseFloat(final_dis).toFixed(2));
                $("#new_subtotal_" + count).val(parseFloat(new_subtotal).toFixed(2));
                $("#total_tax_" + count).val(parseFloat(total_tax).toFixed(2));
                $("#grand_total_" + count).val(parseFloat(grand_total).toFixed(2));

            }

        }
        var group_type = $('#group_id_'+count).val();
        //alert(group_type);
        //alert(total_tax);
        var structure_details = $('#structure_details_c').val();
        structure_details = parseFloat(structure_details.replace(/,/g, ''));
		//alert(structure_details);
        if(group_type =='Product')
        {
		
			if(structure_details)
			{    
						var shipping =getHighestGST(gst, count, totRowCount);
						total_tax = Number(total_tax) + Number(shipping);
						Total = Number(newSubtotal) + Number(total_tax) + Number(structure_details);
						//alert(Total);
						$("#total_tax_" + count).val(parseFloat(total_tax).toFixed(2));
						$("#shipping_amt_"+count).val(structure_details);
						$("#grand_total_" + count).val(parseFloat(Total).toFixed(2));
						
			}
			else
			{
				$("#charges_"+count+"_"+i).val('0.00');
				$("#shipping_amt_"+count+"_"+i).val('0.00');
				var total_tax = Number(total_tax);
				$("#total_tax_"+count).val(parseFloat(total_tax).toFixed(2));
				var Total = newSubtotal + total_tax;
				$("#grand_total_"+count).val(parseFloat(Total).toFixed(2));
                
			}
        }
        else
        {
            $("#charges_"+count+"_"+i).val('0.00');
			$("#shipping_amt_"+count+"_"+i).val('0.00');
			var total_tax = Number(total_tax);
			$("#total_tax_"+count).val(parseFloat(total_tax).toFixed(2));
			var Total = newSubtotal + total_tax;
			$("#grand_total_"+count).val(parseFloat(Total).toFixed(2));

        }
        var final_dis = 0;
        var g_total_tax = 0;
        var g_new_subtotal = 0;
        var g_grand_total = 0;
        var g_sub_total = 0;
        //console.log(count);
        for (var j = 1; j <= group_count; j++) {

            a = parseFloat(g_sub_total) + parseFloat($("#sub_total_" + j).val());
            g_sub_total = a;

            b = parseFloat(g_final_dis) + parseFloat($("#discounted_total_" + j).val());
            g_final_dis = b;

            c = parseFloat(g_new_subtotal) + parseFloat($("#new_subtotal_" + j).val());
            g_new_subtotal = c;

            d = parseFloat(g_total_tax) + parseFloat($("#total_tax_" + j).val());
            g_total_tax = d;

            e = parseFloat(g_grand_total) + parseFloat($("#grand_total_" + j).val());
            g_grand_total = e;
        }
		
		// code written by pratik on 07082019 start (Kerala 1% cess code)
		var one_percent_shipping_1 = 0;
		
		 var state_name1 = $( "#branch_c option:selected" ).text();
		if($("#unregistered_user_c").prop('checked') == true && state_name1 == 'Kerala')
		{
									$('#LBL_EDITVIEW_PANEL13 tr:nth-child(6)').show();	
									if($("#cess_amount_c").length != 0)
									{
										$('#cess_amount_c').prop('readonly',true);
										$('#cess_amount_c').css("background-color", "rgb(221, 221, 221)");
									}

									var check_GT = $("#grand_total").val();
									if(check_GT==0.00 || isNaN(check_GT))
									{ 
										
											$("#grand_total").val('0.00');
											if($("#cess_amount_c").length != 0)
											{
												$("#cess_amount_c").val('0.00');
												
											}
									}
									var check_GT1 = $("#grand_total_"+count).val();
									if(check_GT1==0.00 || isNaN(check_GT1))
									{
											if($("#one_per_cess_"+count).length != 0)
											{
												$("#one_per_cess_"+count).val('0.00');
											}
									}
									 if($("#shipping_amt_"+count).length != 0)
									{
										var other_chargess = $("#shipping_amt_"+count).val();	
										if(other_chargess>0 && other_chargess!=0)
										{
											
											 var other_chargess1 = (1 / 100) * other_chargess;
											 var one_per_cess_1 = $("#one_per_cess_"+count).val();	
											 var final_cess1_for_kerala = parseFloat(Number(other_chargess1) + Number(one_per_cess_1)).toFixed(2);
											 $("#one_per_cess_"+count).val(final_cess1_for_kerala);	
											 var GT1 = $("#grand_total_"+count).val();	
											 var final_cesss = parseFloat(Number(GT1) + Number(other_chargess1)).toFixed(2);
											 $("#grand_total_"+count).val(final_cesss);	
										}
									} 
									
			
				if(group_type =='Product')
				{
					    $("#inner_table_"+count+" "+"tr:nth-child(6)").show();
						
						if($("#new_subtotal_"+count).length != 0 || $("#sub_total_"+count).length != 0) 
						{

							var discounted_subtotal_1 =  $("#new_subtotal_"+count).val();
							var sub_total_1 =  $("#sub_total_"+count).val();
							if(discounted_subtotal_1>=0)
							{
							
								var one_per_of_discounted_subtotal_1 = (1 / 100) * discounted_subtotal_1;
								var one_percent_1 = parseFloat(Number(one_per_of_discounted_subtotal_1)).toFixed(2);	
							    
								if(structure_details>=0)
								{
									
									var structure_details_1 = (1 / 100) * structure_details;
									var structure_details_1_1 = parseFloat(Number(structure_details_1)).toFixed(2);
								}else if(isNaN(structure_details))
								{
									var structure_details_1_1 = parseFloat(Number(0.00));
								}
							   // alert(one_percent_1);
								//alert(structure_details_1_1);
								var final_cess_for_kerala = parseFloat(Number(one_percent_1) + Number(structure_details_1_1)).toFixed(2);
								if($("#one_per_cess_"+count).length != 0)
								{
									$("#one_per_cess_"+count).val(final_cess_for_kerala);
								}
								if($("#grand_total_"+count).length != 0)
								{
									var update_GT2 = parseFloat(Number(Total) + Number(final_cess_for_kerala)).toFixed(2);
									$("#grand_total_"+count).val(update_GT2);
								}
																
							}
							
							else if(sub_total_1>=0)
							{
								var one_per_of_sub_total_1 = (1 / 100) * sub_total_1;
								var one_percent_1 = parseFloat(Number(one_per_of_sub_total_1)).toFixed(2);	
								
								if(structure_details>=0)
								{
									
									var structure_details_1 = (1 / 100) * structure_details;
									var structure_details_1_1 = parseFloat(Number(structure_details_1)).toFixed(2);
								}else if(isNaN(structure_details))
								{
									var structure_details_1_1 = parseFloat(Number(0.00));
								}
								
								var final_cess_for_kerala = parseFloat(Number(one_percent_1) + Number(structure_details_1_1)).toFixed(2);
								if($("#one_per_cess_"+count).length != 0)
								{
									$("#one_per_cess_"+count).val(final_cess_for_kerala);
								}
								if($("#grand_total_"+count).length != 0)
								{
									var update_GT2 = parseFloat(Number(Total) + Number(final_cess_for_kerala)).toFixed(2);
									$("#grand_total_"+count).val(update_GT2);
								}
							
							}
							
						}
				}
				if(group_type =='Installation')
				{
					    $("#inner_table_"+count+" "+"tr:nth-child(6)").show();
						if($("#new_subtotal_"+count).length != 0 || $("#sub_total_"+count).length != 0) 
						{

							var discounted_subtotal_1 =  $("#new_subtotal_"+count).val();
							var sub_total_1 =  $("#sub_total_"+count).val();
							if(discounted_subtotal_1>=0)
							{
							
								var one_per_of_discounted_subtotal_1 = (1 / 100) * discounted_subtotal_1;
								var one_percent_1 = parseFloat(Number(one_per_of_discounted_subtotal_1)).toFixed(2);	
							
							
								var final_cess_for_kerala = parseFloat(Number(one_percent_1) + Number(one_percent_shipping_1)).toFixed(2);
								if($("#one_per_cess_"+count).length != 0)
								{
									$("#one_per_cess_"+count).val(final_cess_for_kerala);
								}
								if($("#grand_total_"+count).length != 0)
								{
									var update_GT2 = parseFloat(Number(Total) + Number(final_cess_for_kerala)).toFixed(2);
									$("#grand_total_"+count).val(update_GT2);
								}
																
							}
							
							else if(sub_total_1>=0)
							{
								var one_per_of_sub_total_1 = (1 / 100) * sub_total_1;
								var one_percent_1 = parseFloat(Number(one_per_of_sub_total_1)).toFixed(2);	
								
								
								
								var final_cess_for_kerala = parseFloat(Number(one_percent_1) + Number(one_percent_shipping_1)).toFixed(2);
								if($("#one_per_cess_"+count).length != 0)
								{
									$("#one_per_cess_"+count).val(final_cess_for_kerala);
								}
								if($("#grand_total_"+count).length != 0)
								{

									var update_GT2 = parseFloat(Number(Total) + Number(final_cess_for_kerala)).toFixed(2);
									$("#grand_total_"+count).val(update_GT2);
								}
							
							}
							
						}


				}				
								
								
		}else{
					 $("#inner_table_"+count+" "+"tr:nth-child(6)").hide();
					 $('#LBL_EDITVIEW_PANEL13 tr:nth-child(6)').hide();					 
		}
		// code written by pratik on 07082019 End (Kerala 1% cess code)
		
        //alert(g_new_subtotal);
        //alert(g_sub_total);
        grandTotal(g_sub_total, g_final_dis, g_total_tax, g_new_subtotal, g_grand_total);
    }
    function getHighestGST(gst, count, totRowCount)
    {
        var structure_details = $('#structure_details_c').val();
        var group_type = $('#group_id_' + count).val();
        structure_details = parseFloat(structure_details.replace(/,/g, ''));
        //alert(structure_details);
        if (group_type == 'Product')
        {
            var Tax = new Array();
            for (i = 1; i <= totRowCount; i++) {
                var gst = $("#service_tax_" + count + "_" + i).val();
                //alert(gst);
                var Tax_val = gst.split("%");
                var TaxVal = Tax_val[0];
                Tax[i] = TaxVal;
            }
            var high_tax = Tax.toString().replace(/^,|,$/g, '');
            var arr = high_tax.split(",").map(Number);
            var largest = arr[0];
            for (var i = 1; i < arr.length; i++) {
                if (arr[i] > largest) {
                    largest = arr[i];
                }
            }
            //alert(largest);
            if (structure_details)
            {
                shipping = Number((structure_details * largest) / 100);
                //alert(shipping);
            } else
            {
                shipping = 0;
            }
        } else
        {
            shipping = 0;
        }
        return shipping;
        //calculate(totRowCount, count);
    }
    function grandTotal(g_sub_total, g_final_dis, g_total_tax, g_new_subtotal, g_grand_total) {

								
        // var g_sub_total = g_sub_total;
        // var g_final_dis = g_final_dis;
        // var total_tax = g_total_tax;
        // var g_total_tax = g_new_subtotal;
        // var g_grand_total = g_grand_total;
        R = 0;
        $(".SubTotal").each(function () {
            R = parseFloat(R) + parseFloat($(this).val());
        });
        subtotal_c = R;
        $('#sub_total').val(subtotal_c.toFixed(2));

        R = 0;
        $(".Discount").each(function () {
            R = parseFloat(R) + parseFloat($(this).val());
        });
        discount_c = R;
        $('#discount').val(discount_c.toFixed(2));

        R = 0;
        $(".DiscountSubtotal").each(function () {
            R = parseFloat(R) + parseFloat($(this).val());
        });
        discounted_total_c = R;
        $('#discounted_total').val(discounted_total_c.toFixed(2));
         //alert(discounted_total_c);
        //$("#total_tax").val(parseFloat(g_total_tax).toFixed(2));

        R = 0;
        $(".TotalTax").each(function () {
            R = parseFloat(R) + parseFloat($(this).val());
        });
        tax_total_c = R;
        $('#total_tax').val(tax_total_c.toFixed(2));

        R = 0;
        $(".ShippingAmt").each(function () {
            var shipping_amt = $(this).val();
            shipping_amt = shipping_amt.replace(',', '');
            R = parseFloat(R) + parseFloat(shipping_amt);
        });
        shipping = R;
        $('#shipping_c').val(shipping.toFixed(2));
        
        R = 0;
        $(".GrandTotal").each(function () {
            R = parseFloat(R) + parseFloat($(this).val());
        });
        grand_total_c = R;
        $('#grand_total').val(grand_total_c.toFixed(2));
		
		
		
		//console.log(subtotal_c);
		//console.log(discounted_total_c);
		//console.log(shipping);
	
		// code written by pratik on 07082019 start (kerala Cess 1%)
		var state_name1 = $( "#branch_c option:selected" ).text();
		if($("#unregistered_user_c").prop('checked') == true && state_name1 == 'Kerala')
		{
			
			var one_per_shipping = 0; 
			if($("#discounted_total").length != 0 && $("#sub_total").length != 0) 
			{
				if(discounted_total_c>=0)
				{
					
					var cal_one_per_of_disc = (1 / 100) * discounted_total_c;
					var one_per_discounted = parseFloat(Number(cal_one_per_of_disc)).toFixed(2);
					
					var final_Cess_amt = $("#cess_amount_c").val();
					if(shipping>=0)
					{
						var one_per_shipping = (1 / 100) * shipping;
						var final_cess_for_kerala_amt = parseFloat(Number(one_per_shipping) + Number(one_per_discounted)).toFixed(2);
					}else{
						
						var final_cess_for_kerala_amt = parseFloat(Number(one_per_shipping) + Number(one_per_discounted)).toFixed(2);
					}
					if($("#cess_amount_c").length != 0)
					{
						$("#cess_amount_c").val(final_cess_for_kerala_amt);
					}
					
					
					
				}
				 else if(subtotal_c>=0)
				{
					
					var cal_one_per_of_subtotal = (1 / 100) * subtotal_c;
					var one_per_subtotal = parseFloat(parseFloat(R) + Number(cal_one_per_of_subtotal)).toFixed(2);
					
					
					var final_Cess_amt = $("#cess_amount_c").val();
					
					if(shipping>=0)
					{
						var one_per_shipping = (1 / 100) * shipping;
						var final_cess_for_kerala_amt = parseFloat(Number(one_per_shipping) + Number(one_per_subtotal)).toFixed(2);
					}else{
						var final_cess_for_kerala_amt = parseFloat(Number(one_per_shipping) + Number(one_per_subtotal)).toFixed(2);
					}
					if($("#cess_amount_c").length != 0)
					{
						$("#cess_amount_c").val(final_cess_for_kerala_amt);
					}
					
					
					
				}
				
			}
		}
		// code written by pratik on 07082019 end  (kerala Cess 1%)
        /*
         $("#sub_total").val(parseFloat(g_sub_total).toFixed(2));
         $("#discount").val(parseFloat(g_final_dis).toFixed(2));
         $("#discounted_total").val(parseFloat(g_new_subtotal).toFixed(2));
         $("#total_tax").val(parseFloat(g_total_tax).toFixed(2));
         $("#grand_total").val(parseFloat(g_grand_total).toFixed(2));
         */
    }


    /*
     function addRowEdit(count,quantity, prodName, productId, uom, amount, tax, discount, type, recordId){
     var count = count;
     var table_name = tableId+'_'+count;
     group_count =count;
     console.log('All group__ '+group_count);
     var table = document.getElementById(tableId+'_'+count);
     var totRowCount = $('#'+table_name +' tr').length-2;
     
     totRowCount++;
     //table.rows.length=1;
     var rowCount = table.rows.length;
     var row = table.insertRow(rowCount);
     //Adding Quantity
     row.id="qinrow_"+count+"_"+totRowCount;
     var cell1 = row.insertCell(0);
     cell1.style.verticalAlign = "top";
     var element1 = document.createElement("input");
     element1.type="text";
     element1.size="1";
     element1.value="1";
     element1.id="quantity_"+count+"_"+totRowCount;
     element1.name="quantity_"+count+"_"+totRowCount;
     
     var dCount = count+'_'+totRowCount;
     element1.setAttribute('onblur', 'calculate(\''+dCount+'\',count)');
     addToValidate('EditView', element1.id, 'text', true,'Quantity' );
     cell1.appendChild(element1);
     if(quantity){
     element1.value=quantity;
     }
     //Adding Product
     var cell2 = row.insertCell(1);
     cell2.style.verticalAlign = "top";
     var element2 = document.createElement("input");
     element2.id="product_"+count+"_"+totRowCount;
     element2.name="product_"+count+"_"+totRowCount;
     element2.size="35";
     element2.readOnly = true;
     addToValidate('EditView', element2.id, 'text', true,'Product' );
     cell2.appendChild(element2);
     if(prodName){
     element2.value=prodName;
     }
     
     var elementHidden = document.createElement("input");
     elementHidden.id = "product_"+count+"_"+totRowCount+"_id";
     elementHidden.name = "product_"+count+"_"+totRowCount+"_id";
     elementHidden.type = "hidden";
     cell2.appendChild(elementHidden);
     if(productId){
     elementHidden.value=productId;
     }
     
     var elementHidden2 = document.createElement("input");
     elementHidden2.id = "total_rows";
     elementHidden2.name = "total_rows";
     elementHidden2.value = totRowCount;
     elementHidden2.type = "hidden";
     cell2.appendChild(elementHidden2);
     
     var elementHidden3 = document.createElement("input");
     elementHidden3.id = "prod_rec_"+count+"_"+totRowCount+"_id";
     elementHidden3.name = "prod_rec_"+count+"_"+totRowCount+"_id";
     elementHidden3.type = "hidden";
     if(recordId) {
     elementHidden3.value = recordId;
     }
     cell2.appendChild(elementHidden3);
     
     var element3 = document.createElement("button");
     element3.id = "btn_product";
     //element3.class="button firstChild";
     element3.type="button";
     element3.tabindex="131";
     element3.innerHTML='<img src="themes/20reasons/images/id-ff-select.png?v=i4ZUX_KVIb0_YisNrUIQ3A">';
     element3.name="btn_product";
     element3.setAttribute('onclick', 'open_popup( "quote_Products",  600,  400,  "",  true,  false,  {"call_back_function":"set_product_return","form_name":"EditView","field_to_name_array":{"id":"product_'+count+'_'+totRowCount+'_id","name":"product_'+count+'_'+totRowCount+'","uom_c":"uom_'+count+'_'+totRowCount+'","unit_price_c":"price_'+count+'_'+totRowCount+'","tax_class_c":"quote_tax_'+count+'_'+totRowCount+'"}, "passthru_data":{"row_id":"'+count+'_'+totRowCount+'"}},  "single",  true );');
     cell2.appendChild(element3);
     
     var elementclear =  document.createElement("button");
     elementclear.id = "btn_clr_product";
     //elementclear.class = "button lastChild";
     elementclear.type = "button";
     elementclear.innerHTML = '<img src="themes/20reasons/images/id-ff-clear.png?v=i4ZUX_KVIb0_YisNrUIQ3A">';
     elementclear.name = "btn_clr_product";
     elementclear.setAttribute('onclick', 'clear_product('+rowCount+','+count+')');
     cell2.appendChild(elementclear);
     //Adding Remove Button
     
     var cell7 = row.insertCell(2);
     cell7.style.verticalAlign = "top";
     var element8 = document.createElement("input");
     element8.type="text";
     element8.id="uom_"+count+"_"+totRowCount;
     element8.name="uom_"+count+"_"+totRowCount;
     element8.readOnly = true;
     element8.setAttribute('style', 'background-color: #DDDDDD;');
     element8.size="10";
     cell7.appendChild(element8);
     if(uom){
     element8.value=uom;
     }
     
     //element8.value=amount;
     
     var cell3 = row.insertCell(3);
     cell3.style.verticalAlign = "top";
     var element4 = document.createElement("input");
     element4.type="text";
     element4.id="price_"+count+"_"+totRowCount;
     element4.name="price_"+count+"_"+totRowCount;
     element4.readOnly = true;
     element4.setAttribute('style', 'background-color: #DDDDDD;');
     element4.size="10";
     cell3.appendChild(element4);
     if(amount){
     element4.value=amount;
     }
     
     var newcell = row.insertCell(4);
     newcell.style.verticalAlign= "top";
     var elementdd = document.createElement("input");
     elementdd.type="text";
     elementdd.name = "quote_tax_"+count+"_"+totRowCount;
     elementdd.id="quote_tax_"+count+"_"+totRowCount;
     elementdd.readOnly = true;
     elementdd.setAttribute('style', 'background-color: #DDDDDD;');
     elementdd.size="15";
     
     var dCount = count+'_'+totRowCount;
     elementdd.setAttribute('onchange', 'calculate(\''+dCount+'\',count)');
     newcell.appendChild(elementdd);
     if(tax) {
     elementdd.value = tax;
     }
     
     var cell4 = row.insertCell(5);
     cell4.style.verticalAlign = "top";
     var element5 = document.createElement("input");
     element5.type="text";
     element5.size="5";
     element5.id="discount_"+count+"_"+totRowCount;
     element5.class="";
     element5.name="discount_"+count+"_"+totRowCount;
     element5.value='0';
     
     var dCount = count+'_'+totRowCount;
     element5.setAttribute('onblur', 'calculate(\''+dCount+'\',count)');
     cell4.appendChild(element5);
     if(discount){
     element5.value=discount;
     }
     
     var cell5 = row.insertCell(6);
     //cell5.style.verticalAlign = "top";
     var element6 = document.createElement("input");
     element6.type="checkbox";
     element6.id="in_"+count+"_"+totRowCount;
     element6.name="in_"+count+"_"+totRowCount;
     
     var dCount = count+'_'+totRowCount;
     element6.setAttribute('onchange', 'calculate(\''+dCount+'\',count)');
     cell5.appendChild(element6);
     if(type==1){
     element6.setAttribute('checked',true);
     }
     
     var cell6 = row.insertCell(7);
     cell6.style.verticalAlign = "top";
     var element7 = document.createElement("input");
     element7.type="button";
     element7.value = "Remove";
     //var dCount = count+'_'+totRowCount;
     element7.setAttribute('onclick', "removeRow('"+totRowCount+"','"+count+"')");
     //element7.setAttribute('onclick', 'removeRow(\''+dCount+'\',count)');
     cell6.appendChild(element7);
     
     var cell8 = row.insertCell(8);
     //cell5.style.verticalAlign = "top";
     var element9 = document.createElement("input");
     element9.type="hidden";
     element9.id="group_id_"+count+"_"+totRowCount;
     element9.name="group_id_"+count+"_"+totRowCount;
     element9.value = $('#group_id_'+count).val();
     
     var element10 = document.createElement("input");
     element10.type="hidden";
     element10.id="dis_check_"+count+"_"+totRowCount;
     element10.name="dis_check"+count+"_"+totRowCount;
     if( $("#in_"+count+"_"+totRowCount).is(":checked") ){
     element10.value = '1';
     }
     else{
     element10.value = '0';
     }
     cell8.appendChild(element9);
     cell8.appendChild(element10);
     
     inlinefields[totRowCount] = true;
     }
     
     //Code To Remove the Group Onclick of Remove Group Button
     
     function removeGroup(group_count){
     
     var sub_total = $("#sub_total_"+group_count).val();
     var discount = $("#discounted_total_"+group_count).val();
     var discounted_total = $("#new_subtotal_"+group_count).val();
     var total_tax = $("#total_tax_"+group_count).val();
     var grand_total = $("#grand_total_"+group_count).val();
     
     sub_total = parseFloat($('#sub_total').val()) - parseFloat(sub_total);
     discount = parseFloat($('#discount').val()) - parseFloat(discount);
     discounted_total = parseFloat($('#discounted_total').val()) - parseFloat(discounted_total);
     total_tax = parseFloat($('#total_tax').val()) - parseFloat(total_tax);
     grand_total = parseFloat($('#grand_total').val()) - parseFloat(grand_total);
     
     $('#sub_total').val( parseFloat(sub_total).toFixed(2) );
     $('#discount').val( parseFloat(discount).toFixed(2) );
     $('#discounted_total').val( parseFloat(discounted_total).toFixed(2) );
     $('#total_tax').val( parseFloat(total_tax).toFixed(2) ) ;
     $('#grand_total').val( parseFloat(grand_total).toFixed(2) );
     
     $("#package_panel_"+group_count).remove();
     }
     */

</script>
