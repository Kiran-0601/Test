  $(document).ready(function() {

    // 1. Scroll to the top of the page when the button is clicked
    $(window).scroll(function() {
      if ($(this).scrollTop() > 0) {
        $('#scrollToTopBtn').fadeIn();
      } else {
        $('#scrollToTopBtn').fadeOut();
      }
    });

    $('#scrollToTopBtn').click(function() {
      $('html, body').animate({ scrollTop: 0 }, 'normal');
    });

    // 2. Disable right click menu in html page using jquery.
    $(document).on('contextmenu', function(e) {
      return false;
    });

    // 3. Disable/enable the form submit button.
    $('#btnsubmit').click(function() {
     
      if ($('#submit').prop('disabled')) {
        $('#submit').prop('disabled', false);
        $('#submit').css('backgroundColor', '#ff0066');
        $(this).val('Click To Disable button');
      } else {
        $('#submit').prop('disabled', true);
        $('#submit').css('backgroundColor', 'lightpink');
        $(this).val('Click To Enable button');
      }

    });

    $('#submit').click(function() {
      alert("Button clicked");
    });
    $('#submitButton').click(function() {
      alert("Button clicked");
    });    

    // Disable the submit button until the visitor has clicked a check box.

    $('#myCheckbox').click(function() {
      if ($(this).is(':checked')) {
        $('#submitButton').prop('disabled', false);
        $('#submitButton').css('backgroundColor', '#ff0066');

      } else {
        $('#submitButton').prop('disabled', true);
        $('#submitButton').css('backgroundColor', 'lightpink');
      }
    });

    // 4.Hide the broken img tag in the body section    
    $('img').on('error', function() {
      $(this).hide();
    });

    // 5. Blink text using jQuery.
    function fnBlink() {
      $(".blink").fadeOut(1000);
      $(".blink").fadeIn(1000);
    }
    setInterval(fnBlink, 1000);

    // 6. Create a Zebra Stripes table effect.
    $("table tr:odd").css("background-color", "pink");

    // 7. Limit character input in the textarea including count.
    maxLength = 15;
    $('textarea').keyup(function() {
      var textlen = maxLength - $(this).val().length;
      $('#rchars').text(textlen);
    });

    // 8. Make first word bold of all elements
    $('#container').find('*').each(function() {
      var text = $(this).html();
      var firstWord = text.replace(/^(\w+)/, '<span class="bold-first">$1</span>');
      $(this).html(firstWord);
    });

    // 9. Create a div using jQuery with style tag.
    $('#crtdiv').click(function() {
      var div = $('<div>', {
        text: 'Hello, world!',
        css: {
        backgroundColor: 'yellow',
        fontSize: '15px',
        width: '20%',
        padding: '10px',
        }
      });
      $('#crtdiv').after(div);
    });

    // 10. Move one DIV element inside another using jQuery.
    $('#btndiv').click(function() {
      $('#btndiv').appendTo('.child');
    });

    // 11. Select values from a JSON object using jQuery.
    colors = { "color1": "Red", "color2": "Green", 'color3': "Blue" };
    $.each(colors, function(key, value) {
      $('#selectjson').append($("<option/>", {
        value: key,
        text: value
      }));
    });

    // 12. Add a list elements within an unordered list element.
    $('#btnlist').click(function() {
      $('#myList').append('<li>Item</li>');
    });

    // 13. Remove all the options of a select box and then add one option and select it.
    $('#btnselect').click(function() {
      $("#myColor").empty().append(
     '<option value = "gfg">Hello</option>');
    });

    // 14. Underline all the words of a text using jQuery
    $('#myText').css('text-decoration', 'underline');      

    //15. How to get the value of a textbox using jQuery?     
    $('#txtval').keyup(function() {
      $('#getval').text($('#txtval').val());
    });

    // 16. Remove all CSS classes using jQuery.
    $('#btnremove').click(function() {
      $('#myElement').removeClass();
    });

    // 17. Remove style added with .css() function using jQuery
    $('#removecss').click(function() {
      $('#removeatr').css('background-color', '');
      $("#removeatr").css("border", "0");
      $("#removeatr").css("color", "");
      $("#removeatr").css("font-size", "");
    });
    
    // 18. Distinguish between left and right mouse click with jQuery.    
    $('#leftright').mousedown(function(event) {
      if (event.which === 1) {
        alert("Left key clicked");
      } else if (event.which === 3) {
        alert("Right key clicked");
      }
    });

    // 19. Check if an object is a jQuery object.
    var name = { type: "girlname" }
    obj = $('body');

    if (name.jquery)
    {
      console.log('name is a jQuery object.');    
    }
    if (obj.jquery)
    {
      console.log('obj is a jQuery object.');    
    }
    
    // 20. How to detect whether the user has pressed 'Enter Key' using jQuery.
    $('#enterkey').keydown(function(event) {
      if (event.keyCode === 13 || event.which === 13) {
        alert("Enter key pressed");
      }
    });

    // 21. Count number of rows and columns in a table using jQuery.
    $('#findrow').click(function() {
      var rowCount = $('#rowcol').find('tr').length;
      var columnCount = $('#rowcol').find('tr:first td').length;
      alert("Number of rows " + rowCount + " & Number of columns " + columnCount);
    });
       
    // 22. How to get textarea text using jQuery.    
    $('#gettextarea').keyup(function() {
      var text = $(this).val();
      $('#settext').text(text);
    });
  });