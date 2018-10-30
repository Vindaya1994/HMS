$(function(){

    

    //rules and messages
    $('#contact-form').validate({
        rules:{
            'fullname':{
                required:true,
                
            },
            'country':{
                required:true,
            },

            'email':{
                required:true,
                email:true,
            },
            'subject':{
                required:true,
               
            }
            
        },     
        messages:{
            'fullname':{
                required:'Please enter your name',
            },
            'country':{
                required:'Please enter your country',
            },
            'email':{
                required:'Please enter your email address',
                email:'Enter valid email address',
            },
            'subject':{
                required:'Please enter subject here',
            }    
        },
       
        
        
    });
});  