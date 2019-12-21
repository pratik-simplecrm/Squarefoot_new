var tableID = "QuotesLineTable";
function addRow(qty,prodName,amount,tax,discount,dis_check){
	
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	row.style.height ="25px";
	
	//Adding quantity
	 var cell1 = row.insertCell(0);
	if(qty){
		cell1.innerHTML=qty;
	} 
	//Adding product name
	var cell2 = row.insertCell(1);
	if(prodName){
		cell2.innerHTML=prodName;
	}
	//Adding amount
	var cell3 = row.insertCell(2);
	if(amount){
		cell3.innerHTML=amount;
	}
	//Adding tax
	var cell4 = row.insertCell(3);
	if(tax) {
		cell4.innerHTML=tax;
	}
    //Adding discount
	var cell5 = row.insertCell(4);
	if(discount){
		cell5.innerHTML=(dis_check ==1) ? discount+"%" : discount;
	}
	
}
