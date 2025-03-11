<?php 

// Abstraction and interfaces
// Abstraction allow you to define what classes must do without specifying how they do it
// Abstract class - Cannot be instanciated(You cannot create an object from it)
abstract class Shape{
    protected $color;

    public function __construct($color){
        $this -> color;
    }

    // Regular method - fully implemented
    public function getColor(){
        return $this -> color;
    }

    // Abstract method -> Must be implemented by the child classes
    abstract public function calculateArea();

    // Abstract method with parameters
    abstract public function draw($canvas);
}

class Circle extends Shape{
    private $radius;

    public function __construct($color, $radius){
        parent::__construct($color);
        $this -> radius = $radius;
    }

    // Implementation of abstract method
    public function calculateArea(){
        return pi() * $this -> radius * $this -> radius;
    }

    // Implemetation of abstract method with parameters
    public function draw($canvas){
        return "Drawing a {$this -> color} circle with radius {$this -> radius} on {$this -> radius}.";
    }
}

class Rectangle extends Shape{
    private $width;
    private $height;

    public function __construct($width, $height, $color){
        parent::__construct($color);
        $this -> width = $width;
        $this -> height = $height;

    }

    public function calculateArea()
    {
        return $this -> width * $this -> height;
    }

    public function draw($canvas){
        return "Drawing a {$this -> color} rectangle with a width of {$this -> width} and a height of {$this -> height} on {$canvas}.";
    }
}

// Using the classes
// $shape = new Shape("red"); // Error - cannot instantiate an abstract class

$circle = new Circle("blue", 5);
echo $circle -> calculateArea() . "<br>"; // Output 78.54
echo $circle -> draw ("HTML5 Canvas") . "<br>";


// Interface - defines a contract that classes must fulfill
interface Loggable{
    // Interface methods are abstract by default
    public function logInfo();
    public function getLogType();
}

// Interface for printable objects
interface Printable {
    public function printOutput();
}

// Class implementing multiple interfaces
class user implements Loggable, Printable{
    private $username;
    private $email;
     public function __construct($username, $email)
     {
        $this -> username = $username;
        $this -> email = $email;
     }

     // Implementing loggable information
     public function logInfo(){
        return "User: {$this -> username}, Email: {$this -> email}";
     }

     public function getLogType(){
        return "USER_LOG";
     }

     // Implementing the printable interface method
     public function printOutput(){
        return "Username: {$this -> username}\n Email: {$this -> email}";
     }
}

$user = new User("johnwick", "jwick@email.com");
echo $user -> logInfo() . "<br>";
echo $user -> printOutput() . "<br>";

/*
Key concepts:
- Abstract classes can have both abstract and concrete methods
- Abstract methods must be implemented by child classes
- Classes can implement multiple interfaces (unlike inheritance) 
- Interfaces contain only method declarations, no implementations
- Interfaces create a "contract" that implementing classes must */


?>