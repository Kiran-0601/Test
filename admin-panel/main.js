$(document).ready(function() {
    var alertMessage = document.getElementById('alertMessage');
    
    // Hide the alert after 2 seconds
    setTimeout(function() {
        alertMessage.classList.remove('show');
    }, 2000);

    $('#signIn').validate({
        rules: {          
            email: {
               required: true,
               email: true,
            },
            pwd: {
                required : true,
            },
        },
        messages: {
            email:{
                required: "Enter Your Email",
                email: "Enter Valid Email",
            },
            pwd: {
                required : "Enter Password"
            },           
        },
      errorClass: 'error',
      errorElement: 'span',

    });
     
});