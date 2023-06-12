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
    <tr id="row3">
      <td>Mahek</td>
      <td>Vadodara</td>
      <td>2345</td>
    </tr>
  </table><br>
  <button id="findrow">Find Rows/Columns</button>

  <h3>23. How to get textarea text using jQuery.</h3>
  <textarea id="gettextarea"></textarea>
  <p id="settext"></p>

  <h3>24. How to detect a textbox's content has changed using jQuery?</h3>
  <input type="text" id="txtchang" class="txt-button" placeholder="Type something...">
  <p id="changetxtset"></p>

  <h3>25. Remove a specific value from an array using jQuery.</h3>
  <p>Your array is "jQuery, JavaScript, HTML, Ajax, Css" </p>
  <input type="text" class="txt-button" id="myInput" placeholder="Enter a word which want to remove from above..">
  <button id="removeButton">Remove</button>
  <p id="newarray"></p>

  <h3>26. Change button text using jQuery.</h3>
  <button id="changeButton" class="button">Click me</button>
  <input type="text" class="txt-button" placeholder="Plz type here button name" id="setbtntext">
  <button id="submittext" class="button">Type in textbox</button>

  <h3>27. Add options to a drop-down list using jQuery.</h3>
  <input type="text" id="myselect" placeholder="Option Text" class="normal-text">
  <input type="text" id="myselectval" placeholder="Option Value" class="normal-text">
  <button id="addButton" class="button">Add Option</button>
  
  <select id="mySelected">
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
  </select>

  <h3>28. Set background-image using jQuery CSS property.</h3>

  <h3>29. Delete all table rows except first one using jQuery.</h3>
  <p>=> When you click below button all rows deleted from table which is given in point 22.</p>
  <button id="deleteRows" class="button">Delete Rows</button>

  <h3>30. How to get the selected value and currently selected text of a dropdown box using jQuery?</h3>
  <button id="getselValue">Get Selected Value and Text</button>
  <p id="selvalue">plz select value from point 27 then will able to show current value and text.</p>

  <h3>31. Disable a link using jQuery</h3>
  <a href="https://www.google.com/" id="clickme">Click here</a>
  <button id="removelink" class="button">Remove Link</button>

  <h3>32. Change a CSS class using jQuery & Add a CSS class using jQuery</h3>
  <p id="pid"  class="center">Hello World !!!</p>
  <input id="button1" type="button" class="button" value="Click to change the Class" />

  <h3>33.Count child elements using jQuery</h3>
  <div id="countchild">
    <p>Red</p>
    <p>White</p>
    <p>Green</p>
    <p>Black</p>
    <p>Blue</p>
    <p>Orange</p>
  </div>
  <button id="countButton">Count Child Elements</button>

  <h3>34. Restrict "number"-only input for textboxes including decimal points.</h3>
  <input type="text" class="numericInput" placeholder="Numeric input"/>

  <h3>35. Remove a specific table row using jQuery</h3>
  <p>Remove Specifc row from table of point 22</p>
  <button id="removebButton">Remove Text</button>

  <h3>36. Set value in input text using jQuery.</h3>
  <input type="text" id="settextused">

  <h3>37. Set a value in a span using jQuery.</h3>
  Hello World !! <span id="mySpan"></span>
  <button id="setValueButton">Set Value</button>
  
  <h3>38. Find the class of the clicked element</h3>
  <h2 class="button">Click me To know my class name</h2>

  <h3>39. Set href attribute at runtime using jquery.</h3>
  <a id="myLink" href="#">Click me</a>
  <button id="setHrefButton" class="button">Set Href Link</button>

  <h3>40. Remove disabled attribute using jQuery.</h3>
  <input type="text" id="removedis" disabled>
  <button id="removeDisabledButton">Remove Disabled</button>

  <h3>41.Find the total width of an element (including width, padding, and border) in jQuery</h3>
  <p id="myText" class="abc">Hello World welcome to jquery !!</p>

  <h3>42. Change options of select using jQuery.</h3>

  <select id="mySelect">
    <option value="default">Default Option</option>
  </select>
  <button id="changeOptionsButton" class="button">Change Options</button>

  <h3>43. Access HTML form data using jQuery</h3>
  <p id="gettextshow"></p>
  <button type="button" id="submitFormButton" class="button">Submit</button>

  <h3>44. Add attribute using jQuery</h3>
  <input type="text" id="addAttr">
  <button id="add-attr" class="button">Add Placeholder Attribute</button>
</body>
</html>