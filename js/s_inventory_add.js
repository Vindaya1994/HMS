$(function(){

    
    //rules and messages
    $('#item-add').validate({
        rules:{
            'name':{
                required:true,
            },

            'price':{
                required:true,
            },
            'total':{
                required:true,
            },

            'minimum':{
                required:true,
            },
            
        },     
        messages:{
            
            'name':{
                required:'Please enter item name',
            },

            'price':{
                required:'Please enter unit price',
            },
            'total':{
                required:'Please enter total stock amount',
            },

            'minimum':{
                required:'Please enterminimum stock amount',
            }

           
        },    
    });
});  