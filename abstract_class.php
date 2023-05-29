<?php
// Parent class
abstract class Father {
  public $name;
  public function __construct($name) {
    $this->name = $name;
  }
  abstract public function intro() : string;
}

// Child classes
class Girlchild extends Father {
  public function intro() : string {
    return "Choose German quality! I'm an $this->name!";
  }
}

class Boychild extends Father {
  public function intro() : string {
    return "Proud to be Swedish! I'm a $this->name!";
  }
}

// Create objects from the child classes
$reema = new Girlchild("Reema");
echo $reema->intro();
echo "<br>";

$mehul = new Boychild("Mehul");
echo $volvo->intro();
echo "<br>";

$citroen = new citroen("Citroen");
echo $citroen->intro();
?>