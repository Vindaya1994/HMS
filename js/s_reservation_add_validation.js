$(function(){

    //check checkin date is a vailde one
    $.validator.addMethod("validCheckinDate", function(value, element, min) {
        var today = new Date();
        var checkin = new Date(value);
        
        if (checkin > today) {
            return true;
        }
    
    }, "Enter valida checkin date");

    /*$.validator.addMethod("validCheckoutDate", function(value, element, min) {
        var today = new Date();
        var checkout = new Date(value);
        
        if (checkout > today && checkout>checkin) {
            return true;
        }
    
    }, "Enter valida checkout date");*/

    $.validator.addMethod("validCheckoutDate", function(value, element) {
        var startdatevalue = $('.validCheckinDate.').val();
        return Date.parse(startdatevalue) < Date.parse(value);
        }, "Your checkout date must be greater than checkin date");

    //rules and messages
    $('#admin-reservation').validate({
        rules:{
            'option1':{
                required:true,
            },

            'option2':{
                required:true,
            },

            'check_in':{
                required:true,
                date:true, 
                validCheckinDate: 0 
            },
            'check_out':{
                required:true,
                date:true,
                validCheckoutDate: 0 
            },
        },     
        messages:{
            
            'option1':{
                required:'Please enter customer id',
            },
            'option2':{
                required:'Please enter room category',
            },
            'check_in':{
                required:'Please enter check in date ',
                date:'Please enter valid date',
                validCheckinDate: "Please enter valid checkin date!"
            },
            'check_out':{
                required:'Please enter check out date ',
                date:'Please enter valid date',
                validCheckoutDate: "Please enter valid checkout date!"
            }
             
        },    
    });
});  