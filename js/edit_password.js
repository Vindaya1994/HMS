$(function(){

        //rules and messages
    $('#change-pwd-form').validate({
        rules:{
            'opwd':{
                required:true,
                
            },
            'npwd':{
                required:true,
                minlength:8,
            },
            'con_pwd':{
                required:true,
                equalTo:'#npwd',
            }
        },     
        messages:{
           
            'opwd':{
                required:'Please enter  the old password',
            },
            'npwd':{
                required:'Please enter a new password',
                minlength:'Your password should be minimum 8 characters',
            },
            'con_pwd':{
                required:'Please confirm your password',
                minlength:'New Password and confirm password must be same',
            }    
        },
       
        
        
    });
});  