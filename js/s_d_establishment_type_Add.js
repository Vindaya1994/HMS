$(function(){
    
    //custom function for meal name exist//
    $.validator.addMethod("validName", 
    function(value){
        return /^[a-zA-Z]*$/.test(value)
    },
    'Please enter valid establishment name'
    );

    //rules and messages
    $('#e-add').validate({
        rules:{
            'eid':{
                required:true,
            },
            'ename':{
                required:true,
                validName:true,
            }
            
        },     
        messages:{
            'eid':{
                required:'Please enter establishment id',
            },
            'ename':{
                required:'Please enter establishment name',
           
        }
       
        
    }   
    });   
});  