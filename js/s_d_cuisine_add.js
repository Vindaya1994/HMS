$(function(){
    
    //custom function for meal name exist//
    $.validator.addMethod("validName", 
    function(value){
        return /^[a-zA-Z]*$/.test(value)
    },
    'Please enter valid cuisine name'
    );

    //rules and messages
    $('#cuisine-add').validate({
        rules:{
            'cid':{
                required:true,
            },
            'cname':{
                required:true,
                validName:true,
            }
            
        },     
        messages:{
            'cid':{
                required:'Please enter cuisine id',
            },
            'cname':{
                required:'Please enter cuisine name',
           
        }
       
        
    }   
    });   
});  