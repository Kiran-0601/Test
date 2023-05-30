<?php
// Parent class
abstract class Father {
  public $name;
  public function __construct($name,$work) {
    $this->name = $name;
    $this->work = $work;
  }
  abstract public function work($work) : string;
}

// Child classes
class Girlchild extends Father {
  public function work() : string {
    return "$this->name is doing $this->work";
  }
}

class Boychild extends Father {
  public function work($work) : string {
    return "$this->name is a $this->work";
  }
}

// Create objects from the child classes
$reema = new Girlchild("Reema","study");
echo $reema->work();
echo "<br>";

$mehul = new Boychild("Mehul");
echo $mehul->work();
echo "<br>";

?>