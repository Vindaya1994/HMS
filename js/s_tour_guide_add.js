


function validatename(){
	var num=document.getElementById("name").value;
	var a;
	var c=0;
	for(a=0;a<num.length;a++){
		var n=num.charAt(a);
		if(!isNaN(n)){
		c++;
	}
		
	}
	
	if(c!=0){
		document.getElementById("tg_name").innerHTML="&nbsp Please enter a valid name";
	}else if(num==""){
		
		document.getElementById("tg_name").innerHTML="&nbsp Please enter a valid name";
	}else{
		
		document.getElementById("tg_name").innerHTML="";
	}
	
}

function validatecontact(){
	
	
	var num=document.getElementById("contact").value;
	var len=num.length;
	var f=num.charAt(0);
	if(isNaN(num)){
		document.getElementById("tg_contact").innerHTML="&nbsp Please enter a validcontact number";
		
	}else if(len!=10){
		document.getElementById("tg_contact").innerHTML="&nbsp Should be 10 characters";
		
		
	}else if(f!='0'){
		document.getElementById("tg_contact").innerHTML="&nbsp Should start with 0";
		
		
	}else{
		document.getElementById("tg_contact").innerHTML="";
		
		
	}

}

function validatenic(){
	
	
	var num=document.getElementById("nic").value;
	var len=num.length;
	var f=num.charAt(9);
	
	var first=num.substr(0,9);
	if(len!=10){
		document.getElementById("tg_nic").innerHTML="&nbsp Should be 10 characters";
		
		
	}else if(isNaN(first)){
		document.getElementById("tg_nic").innerHTML="&nbsp Check first 9 characters";
		
		
	}else if(f!="V" && f!="v"){
		document.getElementById("tg_nic").innerHTML="&nbsp Check the last character";
		
		
	}else{
		document.getElementById("tg_nic").innerHTML="";
		
		
	}

}

function validateprice(){
	
	
	var num=document.getElementById("price").value;
if(isNaN(num)){
		document.getElementById("tg_price").innerHTML="&nbsp Please enter a price";
		
		
	}else{
		document.getElementById("tg_price").innerHTML="";
		
		
	}

}


