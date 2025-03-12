<?php 

// Class definition

class Person {
    // Properties (attributes)
    public $name;
    public $age;

    // Constructor - Initializes the object
    public function __construct($name, $age){
        $this -> name = $name;
        $this -> age = $age;
    }

    // Methods - (function inside a class)
    public function greet(){
        return "Hello, my name is {$this -> name} and I am {$this -> age} years old.";
    }

    // Another method
    public function haveBirthday(){
        $this -> age++; // Increment age by 1
        return "Happy Birthday! Now I'm {$this -> age} years old";
    }
}

// Creating objects (instance of the class)
$john = new Person("John", 30); // Creates a new person object
$jane = new Person("Jane", 25); // Creates another person object

// Accessing properties
echo $john->name . "<br>"; // Output: John

// Calling methods
echo $john -> greet() . "<br>"; // Output: Hello, my name is John and I am 30 years old
echo $jane -> haveBirthday() . "<br>"; // Output: Happy Birthday! Now I'm 26 years old

// Checking instance type
if ($john instanceof Person){
    echo "John  is a Person object <br>";
}
/*
Things to understand about classes and objects:
- Classes define structure and behaviour
- Objects are specific insances with their own property values
- The $this keyword refers to the current object instance
- Methods are functions that belong to a class
- The constructor is a special method called when creating objects
 */

?>