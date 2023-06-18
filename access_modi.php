<!DOCTYPE html>
<html>
<body>
<?php  
    class Fruit  
    {  
    public $color="Yellow";    // can be access from everywhere.
    protected $buy_price=100;  // can only access within derived class.
    private $sell_price=500;   // cannot access outside the class.
    protected $profit=400;     // can only access within derived class.
    function get_detail()  
    {  
    echo $this->color."<br>";
    echo $this->sell_price."<br/>";  // This private variable can only be accessed within the class.
    }  
    }
    class Mango extends Fruit  
    {
    function sell_price()
    {
    echo  $this->color."<br>";
    echo  $this->buy_price + $this->profit;  // this will be allowing subclasses to access protected variable
    echo  $this->sell_price."<br/>"; // this will not allow to access private variables.ERROR.
    }
    }     
    $obj= new Mango;  
    $obj->get_detail();  
    $obj->sell_price();   
    ?>  
 
</body>
</html>
