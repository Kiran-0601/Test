<?php
// Parent class
abstract class Father {  //contains at least one abstract method
  public $name;
  public $work;
  public function __construct($name,$work) {
    $this->name = $name;
    $this->work = $work;
  }
  abstract public function work(); // abstract method is only declared.

  abstract public function result($work);  // abstract method with argument..
}

// Child classes
class Girlchild extends Father {
  public function work()  {       // accessed abstract method of parent class in child class
    return "$this->name is $this->work...";
  }
  public function result($work, $const = "Dear") { // child class also defined optional arguments
    if($work=="playing"){
      return "{$const} You will not get good marks";
    }
    elseif ($work == "studying") {
      return "{$const} You will get good marks";
    }
  }
}

class Boychild extends Father {
  public function work()  {       // accessed abstract method of parent class in child class
    return "$this->name is a $this->work...";
  }
  public function result($work, $const = "Surely") {  // child class also defined optional arguments
    if($work=="playing"){
      return "{$const} You will not get good marks";
    }
    elseif ($work == "studying") {
      return "{$const} You will get good marks";
    }
  }
}

// Create objects from the child classes
$reema = new Girlchild("Reema","playing");
echo $reema->work();
echo $reema->result("playing");
echo "<br>";

$mehul = new Boychild("Mehul","studying");
echo $mehul->work();
echo $mehul->result("studying");
echo "<br>";

?>