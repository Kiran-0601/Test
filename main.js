$(document).ready(function() {
    $.validator.addMethod( "lettersonly", function( value, element ) {
        return this.optional( element ) || /^[a-z]+$/i.test( value );
    }, "Only Alphabets and Whitespaces are allowed" );
    $('#myForm').validate({
        rules: {
            name: {
                required: true,
                lettersonly: true,
            },
            email: {
               required: true,
               email: true,
            },
            website: {
                url : true,
            },
            mono: {
                required: true,
                digits: true,
                maxlength: 10,
            },
            gender: {
                required: true,
            },
            
        },
        messages: {
            name: {
                required: "Enter Your Name",
            },           
            email:{
                required: "Enter Your Email",
                email: "Enter Valid Email",
            },
            website: {
                url: "Enter valid URL",
            },
            mono: {
                required: "Enter Your Mobile Number",
                digits: "Please enter only digits",
                maxlength : "Mobile number Should be 10 Digits..",
            },
            gender: {
                required: 'Select your gender',
            },
           
        },
        errorClass: 'error', // Set the custom error class
        errorElement: 'span', // Use <span> for error messages
        errorPlacement: function(error, element) {
        // Custom error placement logic
        if (element.attr('name') === 'gender') {
          error.insertAfter('#gendererr'); // Append error message to specific element
        } else {
          error.insertAfter(element); // Default error placement for other fields
        }
    }
    });
});