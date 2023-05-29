<?php
class Hello {
  const WISHING = "Hello Good Morning";
  const GREETINGS = "Have a Good Day !!";
  public function intro() {
    echo self::GREETINGS; // access constant inside class by using self keyword.
  }
}

echo Hello::WISHING; // access constant outside the class.
$hello = new Hello();
$hello->intro();
?> 