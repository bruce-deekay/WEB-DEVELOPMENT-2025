<?php 

// PHP functions
// Functions are reusable blocks of code that perform specific tasks.
// They help organize your code, reduce repetition and make your programs more modular and maintainable

// Syntax:
/*
function function_name() {
    Code to execute
}
    */

function sayHello(){
    echo "Hello, World!<br>";
}
sayHello(); // Outputs Hello, World!

//Function with parameters
// Parameters allow you to pass data into functions
function greet($name){
    echo "Hello, $name <br>";
}
// Calling with an argument
greet("Bruce");
greet("Bob");
greet("Bernice");

// Function with return value
// The return statement ends the function and sends a value back
// Functions with return value, you have to capture that value first and echo it out
function add($a, $b){
    $result = $a + $b;
    return $result; // Function execution stops here
    echo "This will never execute"; //Unreachable
}

// Capturing the return value
$sum = add(5, 3); // Sum now contains 8
echo "The sum is: $sum <br>";

// Early returns for conditional logic
function checkAge(int $age){
    if ($age < 0){
        return "You haven't been born yet <br>"; //Early return for invalid input
    } elseif ($age < 18){
        return "You are a minor <br>";
    } else {
        return "You are an adult <br>";
    }
}
echo checkAge(0);

// Create a function that takes 2 integers and returns the power of the first integer raised to the second integer

function power(int $a, int $b){
    $c = pow($a, $b);
    return $c;
}
echo "The power is: " . power(5, 2);

// 2. Function parameters
// Parameter - Pieaces of information passed through a function
function multiply(int $a, int $b){
    return $a * $b;
}
// multiply(); // Error - Missing required arguments

// Optional parameters
function _power($base, $exponent = 2){
    return pow($base, $exponent);
}

echo _power(4) . "<br>"; // 16 (4^2) - Uses default exponent
echo _power(2, 3) . "<br>"; // 8 (2^3) - Overrides default exponent

// Named arguments (PHP 8+)
// Allows specifying arguments by name, improving readability
function createUser($name, $email, $role = 'user', $active = true){
    // Function body
}

// Using named arguments
createUser(
    name: 'John Depp',
    email: "johndepp@gmail.com",
    active: false // Role ommitted, will use default
);

// Type declarations (PHP 7.0+)
// Ensures parameters are of the specified value
function divide(float $a, float $b): float{
    if ($b == 0){
        throw new Exception("Division by zero!");
    }
    return $a/$b;
}

// Nullable types(PHP 8.0+)
// Allows parameters to be null
function findUser(?int $id): ?array {
    if ($id == null){
        return null;
    }
    // Code to find user
}

// Variable-length argumentss list
// The ... operator (splat/rest operator) allows accepting any number of arguments
function sum(...$numbers){
    $total = 0;
    foreach ($numbers as $number){
        $total += $number;
    }
    return $total;
}
echo sum(1, 2, 3, 4, 5) . "<br>";  // 15

function calculateAverage(array $numbers){
    $total = array_sum($numbers);
    $count = count($numbers);
    return $count > 0 ? $total/$count : 0;
}    
$scores = [85, 92, 78, 95, 88];
echo calculateAverage($scores); // 87.6


?>