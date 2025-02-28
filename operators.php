<?php

// Operators in php alloe you to perform operations on variables and values.
// They are fundamental building blocks for creating expressions that manipulate data in your programs.

// 1. Arithmetic operators
// These operatos perform basic mathematical operations.

$x = 10;
$y = 5;
echo "<b>1. Arithmetic operators </b><br>";
// addition (+) - Adds two values
$sum = $x + $y;

// subtraction (-) - Subtracts two values
$difference = $x - $y;

// multiplication (*) - Multiplies two values
$product = $x * $y;

// division (/) - Divides two values
// Division by zero will cause a fatal error
$quotient = $x / $y;

// Modulus (%) - Returns the remainder of a division
// 10 divided by 3 equals 3 with a remainder of 1. Modulus operator will return 1 as the result
$remainder = $x % $y;

//Exponent (**) - Raises the left operand to the power of the right operand
$power = $x ** $y;

// Integer division (intdiv()) - PHP 7+
// Returns the integer quotient of a division
// 10 divided by 3 equals 3 with a remainder of 1. intdiv() will return 3 as the result
$intDivision = intdiv($x, $y);

echo "The sum is: $sum. <br>";
echo "The difference is: $difference. <br>";
echo "The product is: $product. <br>";
echo "The quotient is: $quotient. <br>";
echo "The remainder is: $remainder. <br>";
echo "The exponent is: $power. <br>";
echo "The integer division is: $intDivision. <br>";

// 2.ASSIGNMENT OPERATORS
// These operatos assign values to variables.
echo "<b>2.Assignment Operators </b><br>";
// Basic assignment operator (=) e.g: 
$x = 10; //Assigns 10 to variable x

//Combined assignment operators
$x = 10;
echo "x = $x <br>";
$x += 5; // We want to add 5 to the value of x which is 10 i.e $x = $x + 5 which is 15
echo "x += 5 = $x <br>";
$x -= 3; // Equivalent to: $x = $x - 3; Result: 12
echo "x -= 3 = $x <br>";
$x *= 2; // Equivalent to: $x = $x * 2; Result: 24
echo "x *= 2 = $x <br>";
$x /= 4; //Equivalent to: $x = $x / 4; Result: 6
echo "x /= 4 = $x <br>";
$x %= 4; //Equivalent to: $x = $x % 4; Result: 2
echo "x %= 4 = $x <br>";
$x **=3; //Equivalent to: $x = $x ** 3; Result: 8
echo "x **=3 = $x <br>";

// Combined assignment operators perform operatons and assignment in one step

// 3. COMPARISON OPERATORS
// These operators compare 2 values and return a boolean result(true/false).
echo "<b>3. Comparison Operators </b><br>";
// Equal (==)
echo "5 == 5" . var_dump(5 == 5) . "<br>"; // bool(true)
echo "5 == \"5\"" . var_dump(5 == "5") . "<br>"; // bool(true) // Values are equal after type juggling. Equal to only checks the value not the datatype

// identical (===)
// Identical operator checks whether the value and datatypes are equal
echo "5 === 5" . var_dump(5 === 5) . "<br>"; // bool(true)
echo "5 === \"5\"" . var_dump(5 === "5") . "<br>"; // bool(false)

// Not equal (!= or <>)
echo "5 != 10" . var_dump( 5 != 10) . "<br>";
echo "5 <> -5" . var_dump( 5 <> -5) . "<br>";

// Not identical (!==)
echo "5 !== \"5\"" . var_dump(5 !== "5") . "<br>"; // bool(true) - Different datatypes

// Greater than (>)
echo "10 > 5" . var_dump(10 > 5) . "<br>"; // bool(true)

// Less that (<)
echo "5 < 10" . var_dump(5 < 10) . "<br>"; // bool(true)

// Greater than or equal to (>=)
echo "10 >= 10" . var_dump(10 >= 10) . "<br>"; // bool(true)

// Less than or equal to (<=)
echo "5 <= 5 " . var_dump(5 <= 5) . "<br>"; // bool(true)


// LOGICAL OPERATORS

echo "<b> 4. Logical Operators </b> <br>";
// These operators perform logical operations on boolean values - AND, OR, NOT, XOR

// 1. And (&&, and) - All operands must be true to have a true result
echo "<b><i>a. Logical operator AND (&&, and) </i></b> <br>";
echo "true && true" . var_dump(true && true) . "<br>"; // bool(true)
echo "true && false" . var_dump(true && false) . "<br>"; // bool(false)
echo "false && true" . var_dump(false && true) . "<br>";// bool(false)
echo "false && false" .var_dump(false && false) . "<br>";// bool(false)

// 2. OR(||, or) - At least one of the operands must be true for you to have a true result
echo "<b><i>a. Logical operator OR (||, or) </i></b> <br>";
echo "true || true" . var_dump(true || true) . "<br>";
echo "true || false" . var_dump(true || false) . "<br>";
echo "false || true" . var_dump(false || true) . "<br>";
echo "false || false" . var_dump(false || false) . "<br>";

// 3. NOT (!) - Reverses a codition
echo "<b><i>a. Logical operator NOT (!) </i></b> <br>";
echo var_dump(!true) . "<br>";
echo var_dump(!false) . "<br>";
// var_dump(not true);

// 4. XOR (xor) - Exclusive OR, true if one is true, but not both
echo "<b><i>a. Logical operator XOR (xor) </i></b> <br>";
echo var_dump(true xor true) . "<br>"; // bool(true)
echo var_dump(true xor true) . "<br>"; // bool(false)


// String Operators
// Operators for orking with strings
echo "<b>5. String Operators </b> <br>";
$firstName = "Bruce";
$lastName = "Wayne";
$fullName = $firstName . " " . $lastName . "<br>";
echo $fullName;

// Concatenation assignment (.=)
$text = "<strong>Hello </strong>";
$text .= " world"; //$text now contains "Hello world
$text .= "!";
echo $text . "<br>";

// Arrays Operation
echo "<b>6. Array Operators </b> <br>";
// Operators for working with arrays
// Union (+)
echo "<b><i>a. Union operator(+) </i></b> <br>";

$array1 = ["a" => "apple", "b" => "banana"];
$array2 = ["a" => "blueberry", "b" => "chery"];
$result = $array1 + $array2;
echo var_dump($result) . "<br>";
// Note: If keys exist in both arrays, the first arrray's value are kept

// Equality(==)
echo "<b><i>b. Equality operator(==) </i></b> <br>";

$array1 = [1,2,3];
$array2 = [1,2,3];
echo var_dump($array1 == $array2) . "<br>"; // bool(true) = same key/value pairs

// Idenity(===)
echo "<b><i>c. Idenity operator(===) </i></b> <br>";
$array1 = [1,2,3];
$array2 = ["1","2","3"];
echo var_dump($array1 === $array2) . "<br>"; // bool(false) = different types of datatype

// Inequality(!=, <>)
echo "<b><i>c. Inequality operator(!=, <>) </i></b> <br>";
echo var_dump($array1 != $array2) . "<br>"; // bool(true)

// Non-identity(!==)
echo "<b><i>d. Non-identity operator(!==) </i></b> <br>";
echo var_dump($array1 !== $array2) . "<br>"; // bool(true)

// Increment/decrement operators
echo "<b>7. Array Operators </b> <br>";
// These operators increse or decrease variables by one
// Pre-increment(++$x)
echo "<b><i>a. Pre-increment operator(++\$variable) </i></b> <br>";
$x = 5;
$y = ++$x; //$x is incremented to 6 and assigned to $y
echo $y . "<br>";

// Post-increment ($x++)
echo "<b><i>b. Post-increment operator(\$variable++) </i></b> <br>";
$x = 5;
$y = $x++; //$x is assigned to y, then incremented to 6.
// $x is 6, $y is 5
echo $x . "<br>";
echo $y . "<br>";

// Pre-decrement(--$variable)
echo "<b><i>a. Pre-decrement operator(--\$variable) </i></b> <br>";
$x = 5;
$y = --$x; // $x is decremented to 4, then assigned to $y. 
echo $x . "<br>";
echo $y . "<br>";

// Post-decrement($variable--)
echo "<b><i>b. Post-decrement operator(\$variable--) </i></b> <br>";
$x = 5;
$y = $x--; // $x is assigned to $y and then decremented to 4
echo $x . "<br>";
echo $y . "<br>";

// Special Operators
echo "<b>8. Special Operators </b> <br>";
// PHP includes some special operators for specific purposes

// Ternary Operator (?:)
echo "<b><i>a. Ternary operator(?:) </i></b> <br>";
$age = 20;
$status = ($age >= 18) ? "adult" : "minor";
// If condition is true, first value is returned otherwise, second value is returned.
echo $status . "<br>";

// Operator precedence
// Like in Mathematics, PHP operators have a specific order of precedence
// PEMDAS(Parenthesis, Exponents i.e power, Multiplication, Division, Addition and Subtraction)

$a = 3;
$b = 5;
if ($a = $b){ // Assigns $b to $a
    echo "This will always execute";
}

// Operators are a powerful tool in PHP that let you manipulate variables and perform calculatios efficiently. Understamding how they work and their precedence is essential for writing correct and effective PHP code
?>