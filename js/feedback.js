$(function(){

    
    //rules and messages
    $('#feedback-form').validate({
        rules:{
            'message':{
                required:true,
            },
        },     
        messages:{
            
            'message':{
                required:'Please enter your feedback',
            },
           
        },    
    });
});  