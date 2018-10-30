$(function(){

    
    //rules and messages
    $('#reservation_cancel_form').validate({
        rules:{
            'reservation_num':{
                required:true,
            },
        },     
        messages:{
            
            'reservation_num':{
                required:'Please select reservation',
            },
           
        },    
    });
});  