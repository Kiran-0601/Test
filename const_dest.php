<!DOCTYPE html>
<html>
<body>

<?php
class Book {
  //Member Variable
  public $author;
  public $price;

  // This Function Automatically call when object is created.
  function __construct($author,$price) {
    $this->author = $author;
    $this->price = $price;
  }
  
  // member function ..
  function get_author(){
    return $this->author;
  }
  function get_price(){
    return $this->price;
  }  
  //this is automatically called at the end of the script:
  function __destruct() {
    echo "The Book is {$this->author} and the Price is {$this->price}.<br>"; 
  }

}

// Creating new objects ..
$geeta = new Book("Krishna",200);
$mahabharat = new Book("Vedvyas",400);
$ramayan = new Book("Valmiki",500);

// Get the values of the objects..
echo $geeta->get_author()."<br>";
echo $geeta->get_price()."<br>";
echo $mahabharat->get_author()."<br>";
echo $mahabharat->get_price()."<br>";

?>
 
</body>
</html>
