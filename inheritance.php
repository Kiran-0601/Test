<!DOCTYPE html>
<html>
<body>
<?php
class Phone // Parent class 
{
  protected $name; //can only access within derived class.
  protected $color;  // can only access within derived class.

  // This Function Automatically call when object of child/parent class is created.
  function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }
}

/* Child class of Parent class(Phone) (also called Derived class, extended class and subclass)*/
class IPhone extends Phone
{
  public $price=50000;
  protected $fetur= "Chip, A15 Bionic chip,Dual-camera system,Video Recording.";
  function detail() // Member function of child class.
  {
    echo "I am a $this->name and my color is $this->color ";  // accessing value of function of parent class.
    echo "My price is $this->price";  
  }
  function features()
  {
    echo "My Features are $this->fetur"; // can only access within derived class.
  }
}
class Oneplus extends IPhone   // Child class of Parent class(IPhone)
{
  function funct()
  {
    echo "I am a $this->name and my color is $this->color ";  // Member function of child class.
    $this->features();   // call function of parent class
    $this->detail();    // Call protected method from within derived class
  }
}

$Obj = new IPhone("Apple iPhone 13 Pro", "pink"); /* Create object (child class instance) */
$Obj2 = new Oneplus("Android", "red"); /* Create object (child class instance) */
$Obj->detail(); /*call member function of Childclass*/
$Obj->features(); /*call member function of ChildClass*/
$Obj2->funct(); /*call member function of ParentClass*/
?>
</body>
</html>
