<?php 
// Arrays in PHP
// Arrays areone of the most versatile and powerfuldata structure in PHP
// They allow you to store multiple values in a single variable and are essential for many programming tasks

// Types of arrays in PHP
// PHP supports three main types of arrays

// 1. Indexed arrays (Numeric Arrays)
// Arrays with numeric keys startig from zero

$fruits = ["apple", "banana", "orange"];
echo $fruits[0] . "<br>"; // apple

$colors = ["red", "blue", "green"]; // Short array syntax (PHP 5.4+)
$numbers = array(1, 2, 3, 4, 5); // Traditional array syntax

// Adding elements to indexed arrays
$colors[] = "yellow"; // Adds to the end of the array
array_push($colors, "purple", "pink"); // Adds multiple values to the end

// 2. Associative arrays
// Arrays with named keys
$person = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];
echo $person["name"] . "<br>"; // Output: John

// Creating associative arrays
$user = [
    "id" => 1,
    "username" => "John Wick",
    "email" => "johnW@email.com"
];

$setting = array(
    "theme" => "dark",
    "notification" => true,
    "language" => "English"
);

// Adding elemens to associative arrays
$user["role"] = "admin";

// 3. Multidimensional arrays
// Array containing other arrays
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
echo $matrix[1][2] . "<br>"; // Outputs 6 (row at index 1, column at index 2

// Associative mulidimensional arrays
$users = [
    "John" => ["age" => 30, "email" => "john@email.com", "roles" => ["admin", "editor"]],
    "Jane" => ["age" => 25, "email" => "jane@email.com", "roles" => ["author"]]
];
//Output: john@email.com
echo $users ["John"]["email"] . "<br>";
// Output: author
echo $users ["Jane"]["roles"][0] . "<br>";


// Array manilupation
// Creating and modifying arrays
$fruits = ["apple", "banana", "orange"];

// Adding elements
$fruits[] = "grape"; // Adds to the end
array_push($fruits, "mango", "kiwi"); // Adds to the end
array_unshift($fruits, "pear"); // Adds to the beginning
echo var_dump($fruits) . "<br>";

// Removing elements
$last = array_pop($fruits); // Remove and return the last element
$first = array_shift($fruits); // Removes and returns the first element
unset($fruits[1]); // Removes a specific element. In this case, the one at index 1
echo var_dump($fruits) . "<br>";

// Slicing arrays
$slice = array_slice($fruits, 1, 2); // Extracts portion (offset, length)
echo var_dump($slice) . "<br>";

// Splicing arrays (modifies original array)
array_splice($fruits, 1, 2, ["pineapple", "melon"]);

// Merging arrays
$more_fruits = ["strawberry", "raspberry"];
$all_fruits = array_merge($fruits, $more_fruits);
echo var_dump($all_fruits) . "<br>";

// Combining arrays
$keys = ["a", "b", "c"];
$values = [1, 2, 3];
$combine = array_combine($keys, $values);
echo var_dump($combine) . "<br>";

// Checking array elements
$has_apple = in_array("apple", $fruits); // Check if value exists
$key = array_search("banana", $fruits); // Finds key of the value we provided
$exists = isset($fruits[0]); // Checks if the index we provided exists
echo var_dump($exists) . "<br>";

// Extracting keys and values
$keys = array_intersect_key($person); // Get all keys
$keys = array_values($person); // Get all values
echo var_dump($keys) . "<br>";


// 3. Array sorting
$numbers = [5, 3, 4, 1, 2];
$fruits = ["apple", "banana", "orange", "grape"];
$scores = ["John" => 85, "Alice" => 92, "Bob" => 78];

// Sorting indexed arrays
sort($numbers); // Sorts in ascending order (modify the original array) $numbers is now [1, 2, 3, 4, 5]
rsort($fruits); // Sorts in descending order. $fruits is now ["orange", "grape", "banana", "apple"]
print_r($numbers);
echo "<br>";


// Sorting associative arrays
asort($scores); // Sort by value but will maintain key association. 
// $scores is now ["Bob" => 78, "John" => 85, "Alice" => 92]
print_r($scores);
echo "<br>";

$descend = asort($scores); // Sort by value in descending order
// $sores is now["Alice" => 92, "John" => 85, "Bob" => 78]
print_r($descend);
echo "<br>";

ksort($scores); // Sort by key in ascending order
// Scores is now ["Alice" => 92, "Bob" => 78, "John" => 85]

krsort($scores); // Sort by key in descending order
// Scores is now["John" => 85, "Bob" => 78, "Alice" => 92]

// Natural order for sorting (for human readable strings)
$files = ["img1.jpg", "img10.jpg", "img2.jpg"];
sort($files); // Standard sort: ["img1.jpg", "img10.jpg", "img2.jpg"]. It will sort out the ones first then the twos and so on
natsort($files); // Natural sort: ["img1.jpg", "img2.jpg", "img10.jpg"]. It will sort out according to the order of natural numbers


// Shuffle array elements randomly
shuffle($numbers);


// 4. Array Iterations
$fruits = ["apple", "banana", "orange", "grape"];
$person = [    "name" => "John",    "age" => 30,    "city" => "New York"];

// Using for each (most common way)
foreach($fruits as $fruit){
    echo $fruit . "\n";
}

// Using for loop for indexed arrays
for ($i = 0; $i < count($fruits); $i++){
    echo $fruits[$i] . "\n"; 
}

// Iterating through multidimensional arrays
$users = [
    ["name" => "John", "email" => "john@email.com"], 
    ["name" => "Jane", "email" => "jane@email.com"]];

foreach($users as $user){
    echo "Name: " . $user["name"] . ", Email: " . $user["email"] . "\n";
}


// 5. Array Operations
$a = ["apple", "banana"];
$b = ["orange", "mango"];
$c = ["a" => 1, "b" =>2];
$d = ["b" => 3, "c" => 4];

// Union operator(+)
$result = $a + $b; // $result is: ["apple", "banana", "orange", "mango"] only if keys do not overlap

$result = $c + $d; // $result is ["a" => 1, "b" => 2, "c" => 4]
// Note for duplicate keys, value of the first array ($c) are kept

// Equality operator (===)
// Returns true if the operator have the same key/value pairs (order doesn't matter)
var_dump($a === $b); // False

// Inequality operator (!= or <>)
var_dump($a != $b); // True

// Non-identity operator (!==)
var_dump($a !== $b); // True

// Comparing arrays


// 6. Array Functions
// Finding array size and dimensions(number of rows and columns)
$fruits = ["apple", "banana", "orange", "grape"];

echo count($fruits) . "<br>"; // 4 - Number of elements
echo sizeof($fruits) . "<br>"; // 4 - Alias for count()

$matrix = [[1, 2], [3, 4]];
echo count($matrix, COUNT_RECURSIVE) . "<br>"; //6 - Counts all elements recursively

// Utility functions
$is_array = is_array($fruit); // true
$is_empty = empty($fruits); // false
$key_exists = array_key_exists("name" , $person); // check if key exists

// Mathematical functions
$numbers = [1, 2, 3, 4, 5];

echo array_sum($numbers) . "<br>"; // 15 - Sum of values
echo array_product($numbers) . "<br>"; // 120 - Product of values
echo min($numbers) . "<br>"; // 1 - Minimum value
echo max($numbers) . "<br>"; // 5 - Maximum value

// Conversion functions
$string = implode(", ", $fruits); //"apple, banana, orange" - Array to string
$array = explode(", ", $string); // ["apple", "banana", "orange"] - String to array

// Set operations
$set1 = [1, 2, 3, 4];
$set2 = [3, 4, 5, 6];

$intersection = array_intersect($set1, $set2); // [3, 4] - Elements in both arrays
$difference = array_diff($set1, $set2); // [1, 2] - Elements in $set1 but not $set2
$union = array_unique(array_merge($set1, $set2)); // [1, 2, 3, 4, 5, 6] - All unique elements

// Column extraction from array of arrays
$users = [
   ["name" => "John",  "email" => "john@email.com",],
    ["name" => "Jane", "email" => "jane@email.com"]
];

$names = array_column($users, "name"); // ["John", "Jane"]
$emails_by_id = array_column($users, "email", "id"); // [1 => "john@email.com", 2 => "jane@email.com"]

// Arrays are functional data stuctures in PHP and mastering them is essential for effective PHP programming. They provide powerful ways to store, manipulate, and process collections of data


?>