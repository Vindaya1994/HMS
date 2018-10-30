


function validatetype(){
	var num=document.getElementById("type").value;
	var a;
	var c=0;
	for(a=0;a<num.length;a++){
		var n=num.charAt(a);
		if(!isNaN(n)){
		c++;
	}
		
	}
	
	if(c!=0){
		document.getElementById("vehical_type").innerHTML="&nbsp Please enter a valid name";
	}else if(num==""){
		
		document.getElementById("vehical_type").innerHTML="&nbsp Please enter a valid name";
	}else{
		
		document.getElementById("vehical_type").innerHTML="";
	}
	
}


function validateprice(){
	
	
	var num=document.getElementById("price").value;
if(isNaN(num)){
		document.getElementById("price_per_km").innerHTML="&nbsp Please enter a price";
		
		
	}else{
		document.getElementById("price_per_km").innerHTML="";
		
		
	}

}

function validatepassen(){
	
	
	var num=document.getElementById("number").value;
if(isNaN(num)){
		document.getElementById("no_of_passangers").innerHTML="&nbsp Please enter an integer nuber";
		
		
	}else{
		document.getElementById("no_of_passangers").innerHTML="";
		
		
	}

}


