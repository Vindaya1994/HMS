$(function(){

    
    //rules and messages
    $('#item-add').validate({
        rules:{
            'option':{
                required:true,
            },

            
        },     
        messages:{
            
            'option':{
                required:'Please enter item name',
            },
           
            
        },    
    });
});  