$(function(){

    
    //rules and messages
    $('#room-cat-add').validate({
        rules:{
            'cat_id':{
                required:true,
            },

            'cat_name':{
                required:true,
            },
            'approximate_size':{
                required:true,
            },

            'maximum_adults':{
                required:true,
            },
            'bed_type':{
                required:true,
            },

            'connecting_rooms':{
                required:true,
            },
            'room_price':{
                required:true,
            },

            'cat_desc':{
                required:true,
            } 
                
        },     
        messages:{
            
            'cat_id':{
                required:'Please enter room category',
            },

            'cat_name':{
                required:'Please enter room category name',
            },
            'approximate_size':{
                required:'Please enter approximate size',
            },

            'maximum_adults':{
                required:'Please enter maximum adults',
            },
            'bed_type':{
                required:'Please enterbed type',
            },

            'connecting_rooms':{
                required:'Please enter this field',
            },
            'room_price':{
                required:'Please enter room price',
            },

            'cat_desc':{
                required:'Please enter room description',
            }
        },    
    });
});  