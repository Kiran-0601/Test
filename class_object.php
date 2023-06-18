<!DOCTYPE html>
<html>
<body>
<?php
class Book {
  public $author;
  public $price;

  function set_author($author) {
    $this->author = $author;
  }
  function get_author(){
    return $this->author;
  }
  function set_price($price){
    $this->price = $price;
  }
  function get_price(){
    return $this->price;
  }  
}

$geeta = new Book();
$mahabharat = new Book();
$ramayan = new Book();

$geeta->set_author("Krishna");
echo $geeta->get_author()."<br>";

$mahabharat->set_author("Vedvyas");
echo $mahabharat->get_author()."<br>";

$ramayan->set_author("valmiki");
echo $ramayan->get_author()."<br>";

$geeta->set_price(300);
echo "The Price of Geeta is ". $geeta->get_price()."<br>";

$mahabharat->set_price(500);
echo "The price of Mahabharat is " .$mahabharat->get_price()."<br>";

$ramayan->set_price(500);
echo "The price of Ramayan is " .$ramayan->get_price()."<br>";
?>
</body>
</html>
