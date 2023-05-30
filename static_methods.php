<?php
class classname{
  public static $value = "Hello";    // Defined static property
  public static function method(){   // Defined static method
    echo "Good Morning";
  }
  public function method2(){
    echo self::$value;  // called static property
    self::method(); // called static methods
  }
}
class subclass extends classname{
    public function method3()
    {
        echo parent::$value;     // called static property from child class
        echo parent::method();   // To call a static method from a child class
    }
}
echo classname::$value;  // call static property
classname::method(); // call static method using class name without creating object.

$name = new classname();
$name->method2();
$name = new subclass();
$name->method3();
?>