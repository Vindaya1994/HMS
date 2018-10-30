$(function(){

    
    //rules and messages
    $('#room-add').validate({
        rules:{
            'option':{
                required:true,
            },

            'room_no':{
                required:true,
            }
        },     
        messages:{
            
            'option':{
                required:'Please enter room category',
            },
            'room_no':{
                required:'Please enter room no ',
                
            },
            
        },    
    });
});  