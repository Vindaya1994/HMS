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
        }, " must be at least 16 years old !");
    
    
        //check whether phone is a valid phone number
        jQuery.validator.addMethod("phoneUS", function (contactno, element) {
            contactno = contactno.replace(/\s+/g, "");
            return this.optional(element) || contactno.length == 10 ;
        }, "Please specify a valid phone number");
    
    
        //rules and messages
        $('#staff-add').validate({
            rules:{
                'fname':{
                    required:true,
                    validFName:true,
    
                },
                'lname':{
                    required:true,
                    validLName:true,
                },
                
                'email':{
                    required:true,
                    email:true,
                },
                'mobile':{
                    required:true,
                    digits: true,
                    phoneUS: true
                },
                'salary':{
                    required:true,
                    digits: true,
                    
                },
                
            },     
            messages:{
                'fname':{
                    required:'Please enter first name',
                },
                'lname':{
                    required:'Please enter last name',
                },
                'email':{
                    required:'Please enter  email address',
                    email:'Enter valid email address',
                },
                'mobile':{
                    required:'Please enter contact no',
                    digits:'Your mobile number should contain numbers',
                    phoneUS: 'Please specify a valid phone number'
                },
                'salary':{
                    required:'Please enter  salary',
                    digits:'Please enter valid amount',
                   
                },
                
            },
           
            
            
        });
    });  