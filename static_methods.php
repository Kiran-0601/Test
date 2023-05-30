<?php
class classname{
  public static function method(){
    echo "Good Morning";
  }
  public function method2(){
    self::method(); // called static methods
  }
}
class subclass extends classname{
    public function method3()
    {
        echo parent::method();   //To call a static method from a child class
    }
}

classname::method(); // call static method using class name without creating object.

$name = new classname();
$name->method2();
$name = new subclass();
$name->method3();
?>