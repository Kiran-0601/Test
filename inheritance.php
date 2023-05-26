<!DOCTYPE html>
<html>
<body>
<?php
class Phone // Parent class 
{
  protected $name; //can only access within derived class.
  protected $color;  // can only access within derived class.

  // This Function Automatically call when object of child class is created.
  function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }
}

/* Child class (also called Derived class, extended class and subclass)*/
class IPhone extends Phone
{
  public $price=50000;
  protected $fetur= "Chip, A15 Bionic chip,Dual-camera system,Video Recording.";
  function detail()
  {
    echo "I am a $this->name and my color is $this->color ";  // Member function of child class.
    echo "My price is $this->price";  
  }

  function features(){
    echo "My Features are $this->fetur";
  }
}

class Oneplus extends IPhone{
  public $name;
  public $color;

  function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }
}

$Obj = new IPhone("Apple iPhone 13 Pro", "pink"); /* Create object (child class instance) */
$Obj2 = new Oneplus("Android", "red"); /* Create object (child class instance) */
$Obj->detail(); /*call member function of Childclass*/
$Obj->features(); /*call member function of ChildClass*/
$Obj2->detail(); /*call member function of ParentClass*/
$Obj2->features(); //call member function of ParentClass 
?>
</body>
</html>
