$(function(){

    

    /*$.validator.addMethod("validCheckoutDate", function(value, element, min) {
        var today = new Date();
        var checkout = new Date(value);
        
        if (checkout > today && checkout>checkin) {
            return true;
        }
    
    }, "Enter valida checkout date");*/

   
    //rules and messages
    $('#meal-order-form').validate({
        rules:{
            'cus_email':{
                required:true,
                email:true,
            },

            'meal':{
                required:true,
                
            },
            'order_deli_date':{
                required:true,
                date:true,
                //validOrderDate: 0 
            },
            'room_no':{
                required:true,
            },
            'quantity':{
                required:true,
                min: 1,
                integer: true,
            },
            'order_deli_time':{
                required:true,
            },
        },     
        messages:{
            
            'cus_email':{
                required:'Please enter your email address',
                email:'Enter valid email address',
            },
            'order_deli_date':{
                required:'Please enter meal delivery date  ',
                date:'Please enter valid date',
                //validOrderDate: "Please enter valid delivery date!"
            },
            'room_no':{
                required:'Please select your room no ',
                
            },
            'quantity':{
                required:'Please select your room no ',
                min: "Please select positive number",
                integer: "Please select whole number ex. 1,2,3,4",  
    
               
            },
            'order_deli_time':{
                required:'Please select your room no ',
                
            },
             
        },    
    });
});  