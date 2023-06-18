<html>
<body>
<?php
interface Father {
  public function bussiness();
}

interface Mother {
    public function job();
}

interface Child extends Father, Mother{    // Multiple Inheritance by using interfaces
    public function study();
}

class Boy {
    public function play() {
        echo "My brother is playing.";
    }
}

class Girl extends Boy implements Child {  // Accessed Multiple Inheritance by using Interface..

  public function bussiness() {
    echo "My father is doing bussiness.";
  }
  public function job() {
    echo "My mother is doing job.";
  }
  public function study() {
    echo "I m doing study.";
  }
}
$child = new Girl();
$child->bussiness();
$child->job();
$child->study();
$child->play();
?> 
</body>
</html>