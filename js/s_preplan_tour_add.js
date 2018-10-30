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
		document.getElementById("tour_name").innerHTML="&nbsp Please enter a valid name";
	}else if(num==""){
		document.getElementById("tour_name").innerHTML="&nbsp Please enter a valid name";
	}else{
		document.getElementById("tour_name").innerHTML="";
	}
	
}

function validateplaces(){
	var num=document.getElementById("places").value;
	var a;
	var c=0;
	for(a=0;a<num.length;a++){
			var n=num.charAt(a);
			if(!isNaN(n)){
				c++;
			}
	}
	
	if(c!=0){
		document.getElementById("places_to_visit").innerHTML="&nbsp Please enter a valid place";
	}else if(num==""){
		document.getElementById("places_to_visit").innerHTML="&nbsp Please enter a valid place";
	}else{
		document.getElementById("places_to_visit").innerHTML="";
	}
	
}


function validateplrice(){
	
	var num=document.getElementById("pricepp").value;
	if(isNaN(num)){
		document.getElementById("price").innerHTML="&nbsp Please enter a price";	
	}else{
		document.getElementById("price").innerHTML="";
	}

}

function validateparticipants(){
		
	var num=document.getElementById("participants").value;
	if(isNaN(num)){
		document.getElementById("no_of_participant").innerHTML="&nbsp Please enter a integer value";
	}else{
		document.getElementById("no_of_participant").innerHTML="";
	}

}

function validatedate(){
		
	var num=document.getElementById("day").value;
	if(isNaN(num)){
		document.getElementById("no_of_days").innerHTML="&nbsp Please enter a integer value";
	}else{
		document.getElementById("no_of_days").innerHTML="";
	}

}


