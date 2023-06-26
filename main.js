$(document).ready(function() {

    var alertMessage = document.getElementById('alertMessage');

    // Hide the alert after 3 seconds
    setTimeout(function() {
        alertMessage.classList.remove('show');
    }, 3000);

    $.validator.addMethod("checkEmailExists", function(value, element) {
        var exists = false;
        $.ajax({
          url: "check_email.php",
          method: "POST",
          async: false,
          data: { email: value },
          dataType: "json",
          success: function(response) {
            exists = response.exists;
          }
        });
        return !exists;
    }, "Email already exists.");
    
    $.validator.addMethod( "lettersonly", function( value, element ) {
        return this.optional( element ) || /^[a-z]+$/i.test( value );
    }, "Only Alphabets and Whitespaces are allowed" );

    $.validator.addMethod( "forselect", function( value, element, param ) {
        return value != '0';
    }, "Selct country" );

    $.validator.addMethod("password", function(value, element) {
        return /^(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/.test(value);
    }, "Password must be at least 8 characters long and contain at least one special character");

    $('#signUp').validate({
        rules: {
            fname: {
                required: true,
                lettersonly: true,
            },
            lname: {
                required: true,
                lettersonly: true,
            },
            country: {
                forselect: true,
            },
            mobile: {
                required: true,
                digits: true,
                maxlength: 10,
            },
            email: {
               required: true,
               email: true,
               checkEmailExists: true
            },
            dob: {
                required : true,
            },
            pwd: {
                required : true,
                password : true
            },
            cpwd: {
                required: true,
                equalTo: "#pwd"
            },
            gender: {
                required: true,
            },
            agree: {
                required: true,
            }

        },
        messages: {
            fname: {
                required: "Enter Your First Name",
            },
            lname: {
                required: "Enter Your Last Name",
            },           
            mobile: {
                required: "Enter Your Mobile Number",
                digits: "Please enter only digits",
                maxlength : "Mobile number Should be 10 Digits..",
            },
            email:{
                required: "Enter Your Email",
                email: "Enter Valid Email",
            },
            dob: {
                required: "Select Date Of Birth",
            },
            pwd: {
                required: "Enter Password",
            },
            cpwd: {
                required: "Enter confirm password.",
                equalTo: "Passwords and Confirm Password should be same"
            },
            gender: {
                required: 'Select your gender',
            },
            agree: {
                required: 'Agree all conditions',
            }
        },
        errorClass: 'error',        
        errorElement: 'span',
        errorPlacement: function(error, element) {
            if (element.is(':radio')) {
                error.insertAfter('#gendererror');
            }
            else if (element.is(':checkbox')) {
                error.insertAfter('#agreeerror');
            }
            else {
                error.insertAfter(element); // Default error placement for other fields
            }
        },       
    });

    $('#signin').validate({
        rules: {          
            email: {
               required: true,
               email: true,
            },
            pwd: {
                required : true,
                password : true
            },
        },
        messages: {
            email:{
                required: "Enter Your Email",
                email: "Enter Valid Email",
            },
            pwd: {
                required: "Enter Password",
            },
        },
      errorClass: 'error',
      errorElement: 'span',

    });

    $('#changePassword').validate({
        rules: {
            pwd: {
               required: true,
               password : true
            },
            npwd: {
                required: true,
                password : true
            },
            
            cpwd: {
                required : true,
                equalTo: "#npwd"
            },
        },
        messages: {
            pwd: {
                required: "Enter Old Password",
             },
             npwd: {
                required: "Enter New Password",
             },
             cpwd: {
                 required : "Enter New Password",
                 equalTo: "New Password and Confirm Password should be same."
            },
        },
      errorClass: 'error',
      errorElement: 'span',
    });

    $('#editForm').validate({
        rules: {
            fname: {
                required: true,
                lettersonly: true,
            },
            lname: {
                required: true,
                lettersonly: true,
            },
            country: {
                required: true,
            },
            mobile: {
                required: true,
                digits: true,
                maxlength: 10,
            },          
            dob: {
                required : true,
            },           
            gender: {
                required: true,
            },          
        },
        messages: {
            fname: {
                required: "Enter Your First Name",
            },
            lname: {
                required: "Enter Your Last Name",
            },
            country: {
                required: "Select Country",
            },            
            dob: {
                required: "Select Date Of Birth",
            },          
            gender: {
                required: 'Select your gender',
            },         
        },
        errorClass: 'error',        
        errorElement: 'span',
        errorPlacement: function(error, element) {
            if (element.is(':radio')) {
                error.insertAfter('#gendererror');
            }
            else {
                error.insertAfter(element); // Default error placement for other fields
            }
        },       
    });

    $('#forgotpassword').validate({
        rules: {
            email: {
               required: true,
               email: true,
            },
        },
        messages: {
            email:{
                required: "Enter Your Email",
                email: "Enter Valid Email",
            },
        },
      errorClass: 'error',
      errorElement: 'span',

    });

    $('#resetpassword').validate({
        rules: {
            npwd: {
               required: true,
               password: true,
            },
            cpwd: {
                required: true,
                equalTo: "#npwd",
            },
        },
        messages: {
            npwd:{
                required: "Enter New password",
            },
            cpwd: {
                required: "Enter Confirm password",
                equalTo: "New Password and confirm password should be same",
            },
        },
      errorClass: 'error',
      errorElement: 'span',

    });
});