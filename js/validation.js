



$(function(){

    //custom function for validated first name//
    $.validator.addMethod("validFName", 
        function(value) {
            return /^[a-zA-Z]*$/.test(value)
        },
        'Please enter valid first name '
    );

    //custom function for validated last name//
    $.validator.addMethod("validLName", 
    function(value) {
        return /^[a-zA-Z]*$/.test(value)
    },
    'Please enter valid last name'
    );

    //custom function for usename exist//
    $.validator.addMethod("validLName", 
    function(value) {
        return /^[a-zA-Z]*$/.test(value)
    },
    'Please enter valid last name'
    );


    //rules and messages
    $('#register-form').validate({
        rules:{
            'fname':{
                required:true,
                validFName:true,

            },
            'lname':{
                required:true,
                validLName:true,
            },
            'birthdate':{
                required:true,
                date:true,
            },
            'country':{
                required:true,
            },

            'email':{
                required:true,
                email:true,
            },
            'contactno':{
                required:true,
                digits: true,
                minlength:10,
            },
            'username':{
                required:true,
                minlength:5,
                
            },
            'pwd':{
                required:true,
                minlength:8,
            },
            'con_pwd':{
                required:true,
                equalTo:'#pwd',
            }
        },     
        messages:{
            'fname':{
                required:'Please enter your first name',
            },
            'lname':{
                required:'Please enter your last name',
            },
            'birthdate':{
                required:'Please enter your birth date',
                date:'Please enter valid birth of date',
            },
            'country':{
                required:'Please enter your country',
            },
            'email':{
                required:'Please enter your email address',
                email:'Enter valid email address',
            },
            'contactno':{
                required:'Please enter your contact no',
                digits:'Please enter only digits',
                minlength:'Please specify a valid SL phone number'
            },
            'username':{
                required:'Please enter your username',
                minlength:'Your username should be minimum 5 characters',
            },
            'pwd':{
                required:'Please submit the password',
                minlength:'Your password should be at least 8 characters long',
            },
            'con_pwd':{
                required:'Please confirm your password',
                minlength:'You need to enter the same password',
            }      

        
        },
       
        
    });
});  