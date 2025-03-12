<?php 

// Static properties and methods
// Static members belog to the class itself not to any specific objects

class MathHelper{
    // Static property - Shared across all objects
    public static $pi = 3.14159;

    // Static counter to track instances
    private static $instanceCount = 0;

    public function __construct(){
        // Increment counter when a new object is created
        self::$instanceCount++;
    }

    // Static method - Can be called without creating an object
    public static function square($number){
        return $number * $number;
    }

    // Static method that uses static property
    public static function circleArea($radius){
        return self::$pi * self::square($radius);
    }

    // Static method to access private static property
    public static function getInstanceCount(){
        return self::$instanceCount;
    }

    // Non-static method
    public function displayInfo(){
        // Accessing static property from non-static method
        return "Pi value: " . self::$pi;
    }
}
// Access static property directly (pi)
echo MathHelper::$pi  . "<br>";
// print the value of 16, area of circle of radius 5 = 78.53975
echo MathHelper::square(4) . "<br>";
echo MathHelper::circleArea(5) . "<br>";


// Create instances
$helper1 = new MathHelper();
$helper2 = new MathHelper();

echo MathHelper::getInstanceCount() . "<br>"; // Output 2(number of instances)


// Static with inheritance
class AdvancedMathHelper extends MathHelper{
    // Overrides static property (creates a new one, doesn't change parent's)
    public static $pi = 3.14159265359;

    public static function cubeVolume($side){
        return self::square($side)*$side;
    }

    // Use parent's static method
    public static function displayParentPi(){
        return parent::$pi;
    }
}

echo AdvancedMathHelper::$pi . "<br>"; // Will give us the value of pi in AdvancedMathHelper
echo AdvancedMathHelper::displayParentPi() . "<br>"; // Will give us the value of pi in MathHelper
?>