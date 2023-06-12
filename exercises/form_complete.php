<!DOCTYPE html>
<html>
<head>
  <title>Scroll to Top Example</title>
  <link rel="stylesheet" href="style.css"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="main.js"></script>
</head>
<body>
  <h3>1. Scroll to the top of the page with jQuery.</h3>
  <p>=> Scroll the page and a red "Back to top" button will appear in the bottom right corner of the screen.</p>
  <div id="scrollToTopBtn">Back to top</div>
    
  <h3>2. Disable right click menu in html page using jquery.</h3>
  <p>=> Your Right click menu is Disabled.</p>

  <h3>3. Disable/enable the form submit button.</h3>
    <input type="button" class="button" id="btnsubmit" value="Click To Disable Button">
    <input type="button" class="button-sub" id="submit" value="Submit">

  <h3>=> Disable the submit button until the visitor has clicked a check box.</h3>
    <input type="checkbox" id="myCheckbox">
    <input type="submit" class="button-chk" id="submitButton" value="Submit" disable>
  <h3>5. Fix broken images automatically.Hide the broken img tag in the body section.</h3>
  <img src="images.jpeg" alt="Valid Image">
  
  <h3>6. Blink text using jQuery.</h3>
  <p class="blink"> This is not a standard tag in HTML.But still, you can use it to blink/flash a text on the web browser.</p>

  <h3>7. Create a Zebra Stripes table effect..</h3>
  <table border="01">
	  <tr>
	  	<th>Student Name</th>
	  	<th>Marks in Science</th>
	  </tr>
	  <tr>
	  	<td>Janet</td>
	  	<td>85.00</td>
	  </tr>
	  <tr>
	  	<td>David</td>
	  	<td>92.00</td>
	  </tr>
	  <tr>
	  	<td>Arthur</td>
	  	<td>79.00</td>
	  </tr>
  </table>

  <h3>8. Limit character input in the textarea including count.</h3>
  <textarea id="myTextarea" rows="4" cols="20" maxlength="15"></textarea>
  <p>Character Count: <span id="rchars">15</span></p>

  <h3>9. Make first word bold of all elements</h3>
  <div id="container">
    <p>Another example sentence.</p>
    <p>One more sentence to test.</p>
  </div>

  <h3>10. Create a div using jQuery with style tag.</h3>
  <button id="crtdiv">Create Div</button>

  <h3>11. Move one DIV element inside another using jQuery.</h3>
  <div class="parent">
  <button id="btndiv">hello</button>
  </div><br>
  <div class="child"></div>

  <h3>12. Select values from a JSON object using jQuery.</h3>
  <div id="selectjson"></div>

  <h3>13. Add a list elements within an unordered list element.</h3>
  <ul id="myList">
    <li>Item</li>
    <li>Item</li>
  </ul>
  <button id="btnlist" class="button">Add Item</button>
  
  <h3>14. Remove all the options of a select box and then add one option and select it.</h3>
  <select id='myColor'>
    <option value="Red">Red</option>
    <option value="Blue">Blue</option>
    <option value="Green">Green</option>
  </select>
  <button id="btnselect" class="button">Select Me</button>

  <h3>15. Underline all the words of a text using jQuery</h3>
  <p id="myText">This is a sample text.</p>

  <h3>16. How to get the value of a textbox using jQuery?</h3>
  <input type="text" id="txtval">
  <p id="getval"></p>

  <h3>17. Remove all CSS classes using jQuery.</h3>
  <div id="myElement" class="bold-first-word">Hello, World!</div><br>
  <button id="btnremove">Remove style</button>

  <h3>18. Remove style added with .css() function using jQuery</h3>
  <div id="removeatr" style="color: red; font-size: 20px; border: 2px solid; background-color: yellow;">Hello, World!</div>
  <button id="removecss">Remove css</button>

  <h3>19. Distinguish between left and right mouse click with jQuery.</h3>
  <button id="leftright">Click Me</button>

  <h3>20. Check if an object is a jQuery object.</h3>

  <h3>21. How to detect whether the user has pressed 'Enter Key' using jQuery.</h3>
  <textarea id="enterkey" rows="4"></textarea>

  <h3>22. Count number of rows and columns in a table using jQuery.</h3>
  <table id="rowcol" border="01">
    <tr>
      <td>Name</td>
      <td>City</td>
      <td>Number</td>
    </tr>
    <tr>
      <td>Kiran</td>
      <td>Godhra</td>
      <td>4029</td>
    </tr>
    <tr>
      <td>Mahek</td>
      <td>Vadodara</td>
      <td>2345</td>
    </tr>
    <tr>
      <td>Mahek</td>
      <td>Vadodara</td>
      <td>2345</td>
    </tr>
  </table><br>
  <button id="findrow">Find Rows/Columns</button>

  <h3>23. How to get textarea text using jQuery.</h3>
  <textarea id="gettextarea"></textarea>
  <p id="settext"></p>
</body>
</html>