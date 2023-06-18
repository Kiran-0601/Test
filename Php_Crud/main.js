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
            fileToUpload: {
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
                required: 'select your gender',
            },
            fileToUpload: {
                required: 'Profile Picture is required..',
            },
        },
    });
});

function printClock() {
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    // Format the time values to always have two digits
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;
  
    // Print the time
    document.getElementById('txt').innerHTML = "Current Time is  " + hours + ':' + minutes + ':' + seconds;
}
// Use setTimeout to update and print the clock once
setTimeout(printClock, 0);
// Use setInterval to update and print the clock every second
setInterval(printClock, 1000);
