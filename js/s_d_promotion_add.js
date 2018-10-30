$(function(){
    
    //custom function for //
    $.validator.addMethod("validName", 
    function(value){
        return /^[a-zA-Z]*$/.test(value)
    },
    'Please enter valid promotion name'
    );

    //rules and messages
    $('#promotion-add').validate({
        rules:{
            'prm_caption':{
                required:true,
            },
            'prm_desc':{
                required:true,
                
            },
            'promotion_cat_id':{
                required:true,
            },
            'promotion_name':{
                required:true,
            },
            'package_details':{
                required:true,
                
                
            }
            
        },     
        messages:{
            'prm_caption':{
                required:'Please enter caption',
            },
            'prm_desc':{
                required:'Please enter promotion description',
            },
            'promotion_cat_id':{
                required:'Please select promotion category ',
                
            },
            'promotion_name':{
                required:'Please enterpromotion name ',
                
            },
            'package_details':{
                required:'Please enter package details',
                
               
            }
            
        },
       
        
        
    });
});  