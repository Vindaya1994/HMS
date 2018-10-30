$(function(){

    
    //rules and messages
    $('#s_jobvacancies_add').validate({
        rules:{
            'vac_id':{
                required:true,
            },

            'position':{
                required:true,
            },
            'salary':{
                required:true,
            },

            'contract':{
                required:true,
            },
            'desc':{
                required:true,
            },
            
        },     
        messages:{
            
            'vac_id':{
                required:'Please enter vacancy id',
            },

            'position':{
                required:'Please enter position name',
            },
            'salary':{
                required:'Please enter salary amount',
            },

            'contract':{
                required:'Please enter contract',
            },
            'desc':{
                required:'Please enter description',
            },

           
        },    
    });
});  