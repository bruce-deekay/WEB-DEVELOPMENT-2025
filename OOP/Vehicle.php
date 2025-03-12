<?php 

// Inheritance
// Inheritance allows a class to inherit properties and methods from another class

// Parent class(base class)
class Vehicle{
    protected $make;
    protected $model;
    protected $year;
    protected $fuelLevel;

    public function __construct($make, $model, $year){
        $this -> make = $make;
        $this -> model = $model;
        $this -> year = $year;
    }

    public function getMakeModel(){
        return"{$this -> year} {$this -> make} {$this -> model}";
    }

    public function drive($distance){
        $this -> fuelLevel -= $distance * 0.1; // Simplified fuel consumption
        return "Drove {$distance} miles. Fuel remaining: {$this -> fuelLevel}%";
    }

}

// Child class (inherits from vehicle)
class Car extends Vehicle{
    private $numDoors;

    // Note how the child constructor calls the parent constructor
    public function __construct($make, $model, $year, $numDoors){
        parent::__construct($make, $model, $year);
        $this -> numDoors = $numDoors;
    }

    // static - class
    // instance - method

    // Additional method specific to cars
    public function honk(){
        return "Beep beep!";
    }

    // Override the parent's drive method
    public function drive($distance){
        $this -> fuelLevel -= $distance * 0.06; // Cars are more fuel efficient
        return "Car drove {$distance} miles. Fuel remaining: {$this -> fuelLevel}%";
    }
}

// Another child class
class Truck extends Vehicle{
    private $cargoCapacity;

    public function __construct($make, $model, $year, $cargoCapacity){
        parent :: __construct($make, $model, $year);
        $this -> cargoCapacity = $cargoCapacity;
    }

    public function loadCargo($amount){
        return "{$amount} lbs of cargo. Capacity: {$this -> cargoCapacity}";
    }

    // Override the parent's drive method
    public function drive($distance){
        $this -> fuelLevel -= $distance * 0.15; // Trucks use more fuel
        return "Truck drove {$distance} miles. Fuel remaining: {$this -> fuelLevel}%";
    }
}

// Creating and using child objects
$car = new car("Toyota", "Corolla", 2020, 4);
echo $car -> getMakeModel() . "<br>"; // From parent class - Output: 2020 Toyota Corolla
echo $car -> honk() . "<br>"; // From child class - Output: Beep beep!
echo $car -> drive(10) . "<br>"; // Overridden method - Car drove 10 miles. Fuel remaining: 99.5%


$truck = new Truck("Ford", "F-122", 2019, 2000);
echo $truck -> getMakeModel() . "<br>"; // From parent class
echo $truck -> loadCargo(1500) . "<br>"; // From parent class
echo $truck -> drive(10) . "<br>"; // From parent class

/*
Key inheritance properties:
- Child classes inherit all non-private properties and methods from parent
- Child classes can add their own properties and methods
- Child classes can override parent methods to change behavior
- The 'parent::' keyword accesses the parent class methods
- A class can only extend one parent class(single inheritance) */
?>