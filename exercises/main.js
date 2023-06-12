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
      

    // Disable the submit button until the visitor has clicked a check box.

    $('#myCheckbox').click(function() {
      if ($(this).is(':checked')) {
        $('#submitButton').prop('disabled', false);
        $('#submitButton').css('backgroundColor', '#ff0066');
        $("#submitButton").click(function() {
          alert("Button clicked!");
        });

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

    // 23. How to detect a textbox's content has changed using jQuery?
    $(document).ready(function() {
      $("#txtchang").on("input", function() {
        $("#changetxtset").text("Text Changed");
      });
    });

    // 24. Remove a specific value from an array using jQuery.

    $('#removeButton').click(function() {
      var arr = ["jQuery", "JavaScript", "HTML", "Ajax", "Css"];
      var itemtoRemove = $('#myInput').val();
      console.log(itemtoRemove);
      arr.splice($.inArray(itemtoRemove, arr), 1);
      $("#newarray").text(arr);
      // console.log(arr);
    });

    // 26. Change button text using jQuery.
    $("#changeButton").click(function() {
      newtext = $("#setbtntext").val();
      $("#submittext").text(newtext); // Change the button text
    });

    // 27. Add options to a drop-down list using jQuery.
    $("#addButton").click(function() {
      var optionText = $("#myselect").val();
      var optionValue = $("#myselectval").val();
      
      var newOption = $("<option>").text(optionText).val(optionValue);
      $("#mySelected").append(newOption);
      $("#myselect").val(""); // Clear the input field
      $("#myselectval").val(""); // Clear the value field
    });

    //28. Set background-image using jQuery CSS property.

    //29. Delete all table rows except first one using jQuery.
    $("#deleteRows").click(function() {
      $("#rowcol tr:not(:first)").remove();
    });

    // 30. How to get the selected value and currently selected text of a dropdown box using jQuery?
    $("#getselValue").click(function() {
      var selectedValue = $("#mySelected").val();
      var selectedText = $("#mySelected").find(":selected").text();

      $("#selvalue").text(selectedValue + " " + selectedText);
    });

    // 31. Disable a link using jQuery
    $("#removelink").click(function() {
      $("#clickme").removeAttr("href");
    });

    // 32. Change a CSS class using jQuery && Add a CSS class using jQuery
    $('#button1').click(function(){
      $('#pid').removeClass('center').addClass('large');       
    });

    // 33.Count child elements using jQuery
    $("#countButton").click(function() {
      var count = $("#countchild").children().length;
      alert("Number of child elements:" + count);
    });

    // 34. Restrict "number"-only input for textboxes including decimal points.

    $(".numericInput").on("input", function() {
      var value = $(this).val();
      var filteredValue = value.replace(/[^0-9.]/g, '');
      $(this).val(filteredValue);
    });

    // 35. Remove a specific table row using jQuery

    $('#removebButton').click(function(){
      $("#rowcol tbody tr#row3").remove();
    });

    // 36. Set value in input text using jQuery.

    $("#settextused").val("Hello kiran");
   
    // 37. Set a value in a span using jQuery.
    $("#setValueButton").click(function() {
      $("#mySpan").text("Welcome to in jquery");
    });
    
    // 38.Find the class of the clicked element

    $("h2").click(function() {
      var colorClass = this.className;
      alert("My Class name is" + colorClass);
    });
    
    // 39. Set href attribute at runtime using jquery.

    $("#setHrefButton").click(function() {
      var newHref = "https://www.google.com/";
      $("#myLink").attr("href", newHref);
    });

    // 40. Remove disabled attribute using jQuery.
    $("#removeDisabledButton").click(function() {
      $("#removedis").removeAttr("disabled");
    });

    // 41. Find the total width of an element (including width, padding, and border) in jQuery
    console.log("Width + padding + borders : " + $("#myText").outerWidth());

    // 42. Change options of select using jQuery.

    $("#changeOptionsButton").click(function() {
      // Remove existing options
      $("#mySelect").empty();

      // Add new options
      $("#mySelect").append('<option value="hello">Hello</option>');
    });

    // 43. Access HTML form data using jQuery
    $("#submitFormButton").click(function() {
      $('#gettextshow').text($('#removedis').val());
    });

    //44. Add attribute using jQuery
    $("#add-attr").click(function () {
      $("#addAttr").attr("placeholder", "Plz Enter Value");
  });
  });