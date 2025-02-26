<?php
// Shortcut to comment statements is ctrl + /

// Variables in php are containers for storing data.
// They always start with a '$' symbol 
// PHP is loosely typed meaning they can hold different types of data
// The type is determined by the value assigned

// 1. Strings - text enclosed in quotes
$name = "Bruce Wayne"; // Double quotes allow variable interpolation
$name = 'Bruce Wayne'; // Single quots treat everything as literal text.

// 2. Integer - Whole numbers
$age = 24; // No decimal point

// 3. Floats/Double - Numbers wih decimal points
$height = 5.11; 

// 4. Boolean - true/false values
$is_student = true;

// 5. Null - Represents a variable with no value
$bank_account = null;

// Checking variable types. We have 2 methods ie:
// var_dump() - Outputs type and variable
// gettype() - Outputs jst the type

echo var_dump($bank_account) . "<br>";

// 6. Array - Ordered collection of values
$fruits = ["apple", "banana", "pineappe"];

echo gettype($bank_account) . "<br>";

echo gettype($age) . "<br>";

echo gettype($name) . "<br>";

echo gettype($height) . "<br>";

echo gettype($fruits) . "<br>";

// Type casting - Converting between types
$string_number = "42";
$actual_number = (int)$string_number;

echo gettype($string_number) . "<br>";
echo gettype($actual_number) . "<br>";

// Constants - These are values that can't be changed. They can be created in 2 ways:
define("Max_users", 100); // 1. Using define() function
const Min_age = 18; // 2. Using const keyword
 echo Max_users . "<br>";
 echo Min_age . "<br>";
 echo var_dump(Max_users) . "<br>";
 echo var_dump(Min_age) . "<br>";

// Variable interpolation in stings
echo "My name is $name. <br>"; //This type of interpolation works in double quotes

echo 'My name is '. $name . '.'; //String concatination with dot operator.


?>