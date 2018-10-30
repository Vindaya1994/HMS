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


    //check whether cusomer age more than 18
    $.validator.addMethod("minAge", function(value, element, min) {
        var today = new Date();
        var birthDate = new Date(value);
        var age = today.getFullYear() - birthDate.getFullYear();
        if (age > min+1) {
            return true;
        }
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age >= min;
    }, "You are not old enough!");


    //check whether phone is a valid phone number
    jQuery.validator.addMethod("phoneUS", function (contactno, element) {
        contactno = contactno.replace(/\s+/g, "");
        return this.optional(element) || contactno.length == 10 ;
    }, "Please specify a valid phone number");


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
                minAge: 16
                //check_date_of_birth: true ,
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
                phoneUS: true
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
                minAge: "You must be at least 16 years old!"
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
                digits:'Your mobile number should contain numbers',
                phoneUS: 'Please specify a valid phone number'
            },
            'username':{
                required:'Please enter your username',
                minlength:'Your username should be minimum 5 characters',
                remote: "Username is already exists.Please try agin with another username."
            },
            'pwd':{
                required:'Please submit the password',
                minlength:'Your password should be minimum 8 characters',
            },
            'con_pwd':{
                required:'Please confirm your password',
                minlength:'Password and confirm password must be same',
            }    
        },
       
        
        
    });
});  