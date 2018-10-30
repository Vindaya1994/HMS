$(function(){
    //rules and messages
    $('#jobvacancy-form').validate({
        rules:{
            'fullname':{
                required:true,
            },

            'email':{
                required:true,
                email:true,
            },
            'type':{
                required:true,
               
            }
            
        },     
        messages:{
            
            'fullname':{
                required:'Please enter full name',
            },
            'email':{
                required:'Please enter email address ',
                email:'Please enter valid email address',
            },
            'type':{
                required:'Please enter job position ',
                
            }
            
        },    
    });
});  