
function validateParticipants(){
	var num=document.getElementById("participants").value;
	if(isNaN(num)){
		document.getElementById("pa").innerHTML="&nbsp Please enter a valid number";
	}else{
		
			document.getElementById("pa").innerHTML="";
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
		document.getElementById("pl").innerHTML="&nbsp please enter a valid place";
	}else if(num==""){
		
		document.getElementById("pl").innerHTML="&nbsp Please enter a valid place";
	}else{
		
		document.getElementById("pl").innerHTML="";
	}
	
}


function validateCheckin(){
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today = yyyy + '-' + mm + '-' + dd;



	var checkin=document.getElementById("checkin").value;
	
	if(today>checkin){
	document.getElementById("in").innerHTML="&nbsp Please enter a valid date";
		
	}else{
		document.getElementById("in").innerHTML="";
	}
	
	
}

function validateCheckout(){
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today = yyyy + '-' + mm + '-' + dd;



	var checkin=document.getElementById("checkout").value;
	
	if(today>checkin){
	document.getElementById("out").innerHTML="&nbsp Please enter a valid date";
		
	}else{
		document.getElementById("out").innerHTML="";
	}
	
	
}