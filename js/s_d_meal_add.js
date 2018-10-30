$(function(){
    
    //custom function for meal name exist//
    $.validator.addMethod("validName", 
    function(value){
        return /^[a-zA-Z]*$/.test(value)
    },
    'Please enter valid Meal name'
    );

    //rules and messages
    $('#add_meal').validate({
        rules:{
            'meal_id':{
                required:true,
            },
            'meal_name':{
                required:true,
                validName:true,
            },
            'meal_desc':{
                required:true,
            },
            'eType':{
                required:true,
            },
            'price_per_meal':{
                required:true,
                digits: true,
                
            },
            'cType':{
                required:true,
            }
            
        },     
        messages:{
            'meal_id':{
                required:'Please enter meal id',
            },
            'meal_name':{
                required:'Please enter meal name',
            },
            'meal_desc':{
                required:'Please enter  meal description',
                
            },
            'eType':{
                required:'Please select an establishment type',
                
            },
            'price_per_meal':{
                required:'Please enter  salary',
                digits:'Please enter valid amount',
               
            },
            'cType':{
                required:'Please select a cuisine ',
                
            }
            
        },
       
        
        
    });
});  