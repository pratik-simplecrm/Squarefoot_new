//document.EditView.onsubmit = check;
function check(){
	
	if((document.getElementById("contractor_c").checked==true)||(document.getElementById("retail_c").checked==true)||(document.getElementById("others_c").checked==true)||(document.getElementById("hospital_c").checked==true)||(document.getElementById("educational_institution_c").checked==true)||(document.getElementById("pharmaceutical_c").checked==true)||(document.getElementById("builder_c").checked==true)||(document.getElementById("hotel_c").checked==true)||(document.getElementById("sports_c").checked==true)){
		return true;
	}else{
		alert("Select atleast one option from the More Information Panel");
		return false;
	}
}	
