<?php
trait father {
  public function work() {
    echo "I can solve sums but i have no time."; 
  }
}

trait mother {
  public function work1() {
    echo "I can not solve sums."; 
  }
}
trait teacher {
    public function work2() {
      echo "I can solve sums, I will help you."; 
    }
}

class Boy {
  use father, teacher;   // accessed multiple inheritance by using traits.
}

class Girl {
  use mother, teacher;  // accessed multiple inheritance by using traits.
}

$ram = new Boy();
$ram->work();
$ram->work2();
echo "<br>";

$reema = new Girl();
$reema->work1();
$reema->work2();
?>