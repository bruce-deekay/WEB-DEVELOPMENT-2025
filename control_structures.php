<?php
// CONTROL STRUCTURES IN PHP
 // Control structures determine the execution of your code based o conditions and logic.
 // They're the foundation of programming logic that allow your scripts to make decisions and operations.

 // 1. Conditional Statements
 // Conditional statements execute different code blocks whether certain conditions are true or false.

 // 1.1 if, elseif, else
 // Syntax:
/* if(condition){
    code to be ececuted if condition is true
 }*/

 $age = 20;
 if($age >= 18){
    echo "You are an adult <br>"; // This code oly executes if the condition is true
 }

 // if-else statement
 // Synax:
/* if(condition){
    code to execute if condition is true
 } else {
    code to execute if condition is false
 }*/
$temperature = 15;
if($temperature > 30){
    echo "It's hot outside <br>";
}else{
    echo "It's not hot outside <br>";
}

// if-elseif-else statement
// Allows checking multiple conditions in sequence
$grade = 85;
if($grade >= 90){
    // First condition executes if grade is 90 or above
    echo "A - Excellent! <br>";
}elseif($grade >= 80){
    // Second condition - Only checked if first condition is false
    // Executes if grade is between 80 and 89
    echo "B - Good job! <br>";
}else if($grade >= 70){
    // Third condition - Only checked if all previous conditions are false
echo"C - Satisfactory <br>";
}elseif($grade >= 60){
    // Fourth condition - Only checked if all previous conditions are false
echo "D - You passed but you can do better! <br>";
}else{
    // Executes if all above conditions are false
echo "F - You need to improve";
}
/*
Important notes:
- Conditions are evaluated from top to bottom
- Once a condition is true, it's code b;ock excecutes and PHP skips all remaining conditions
- The else block is optional and provides a default case
- You can have as many elseif blocks as needed
*/

// Nested if statements - placing if statements inside other if statements
$isLoggedIn = true;
$isAdmin = true;

if($isLoggedIn){
    // Outer condition - Checks if user is logged in
    echo "Welcome back! <br>";
    if($isAdmin){
        // Inner condition - Only checks if outer condition is true
        // Checks if thelogged in user is an admin.
        echo "You have administrators priviledges. <br>";
        }else{
            // Executes if user is logged in but not an admin
            echo "You have user priviledges. <br>";
    }
    }else {
        // Executes if user is not logged in
        echo"Please log in to continue";
}

// 1.2 Switch statement
// The switch statement provides an elegant way to compare a variable against many different values

//Switch syntax:
/*switch(expression){
    case value:
        code;
        break; 
    default:
        code;
}*/

$dayOfWeek = date("l"); // Gets the current date name
// echo $dayOfWeek;

switch ($dayOfWeek){
    case "Monday":
        // Executes if $dayOfWeek equals "Monday"
        echo "It's the start of the work week <br>";
        break; // The break statement prevents fall-through to the next case
        // Multiple cases without break statements will "fall through"
    case "Tuesday":
        echo "It's Tuesday<br>";
    case "Wednesday":
    case "Thursday":
        echo "It's midweek day. <br>";
    case "Friday":
    case "Saturday":
    default:
    // Optional default case that executes if no ase matches 
    echo"Invalid day of the week <br>";
    // No break is needed in the default case

}
/* Important notes: 
- Switch uses loose comparison (==) not strict comparison (===)
- Without break, executes "fall through" to the next case
- The default case is optional
- Switch is often cleaner than multiple elseif statements when comparing values*/

// 1.3 Ternary operator
// A shorthand way of writing simple if-else statements
// Syntax
// condition ? value_if_true : value_is_false
$age = 20;
$status = ($age >= 18) ? "adult" : "minor";
echo "You are an $status .<br>";

//Equivalent if-statement
if($age >= 18){
    $status = "adult";
} else {
    $status = "minor";
}

// Nested ternary operators (ca be hard to read, use with caution
$score = 75;

$grade = ($score >= 90) ? "A": (($score >= 80) ? "B" : (($score >= 70) ? "C" : "F"));

/* Tips for ternary operators:
    - Best for simple conditions
    - Use parenthesis for clarity
    - Avoid deep nesting - it makes code harder to read
    - Don't use for complex logic - use if/else instead*/


// 2 LOOPS
// Loops allow you to execute code repeatedly based on certain conditions, making repetitive tasks more efficient
// Syntax:
/*
while (condition){
    code to execute
}
*/

$counter = 1;

while ($counter <= 5){
    // This code executes as long as the condition is true
    echo "Count: $counter <br>.";
    $counter++; // Increment counter - CRUCIAL to avoid infinite loops
}

/* Important notes
- The condition is evaluated before each iteration
- If the condition is false initially, the loop never executes
- Always ensure the loop condition will eventually become false
- Be careful to avoid infinite loops(when condition never becomes false) */


// Example: Using while to process data until a condition is met
$done = false;

while(!$done){
    // Simulate some codition that might change $done to true
    $randomNumber = rand(1, 10);
    if ($randomNumber > 8){ // Add a space between if and the opening parenthesis to avoid displaying an error message on else
        echo "Found a random number greater than eight: $randomNumber <br>";
        $done = true; // This will exit the loop
    } else {
        echo "Still looking... Got: $randomNumber <br>";
    }
}

// Example: Reading data from a file until end-of-file
$file = fopen("Data.txt", "r");
while (!feof($file)){
    // Process each line of file until end of file is reached
    $line = fgets ($file);
    echo $line . "<br>";
}
fclose($file);

// Alternative syntax (for HTMP templates)
/*
while ($condition) :
    Code to execute
endwhile;
*/

//2.2 Do-while loops
// It is similar to while but guarantees that the code executes at least once because the condition is checked after the execution.
// Syntax:
/*
do{
    code to execute
} while (condition)
 */

$counter = 1;
do{
    // The code block executes first then the condition is checked
    echo "Count: $counter <br>";
    $counter++;
} while ($counter <= 5);

/*
Key differences from while loop
- The code always executes at least once even if the condition is false
- Condition is checked after each iteration
- Appropriate when you need to process something at least once. */

// Example
/*
do{
    $input = getInput(); // This function gets input from the user
    $valid = validateInput(); // Assume this validates the input

    if(!$valid){
        echo "Invalid input, please try again.";
    }
}while (!$valid); // Keep asking until valid input is provided
*/

// Example where loop body executes despite condition being false
$number = 10;
do{
    echo "This runs once even if the condition is false <br>";
} while($number < 5);

//2.3 For loop
// Used when you know the number of iterations in advance
// Syntax:
/*
for (initialization; condition; increment/decrement){
    code to execute
}
*/
// 1. Initialization - runs once at the beginning
// 2. Condition - checked before each iteration
// 3. Increment/ decrement - runs after each iteration

for ($i = 1; $i <= 5 ; $i++){
    echo "Iteration: $i <br>";
}
/*
How the loop works:
1. Initialize $i = 1
2. Check if $i <= 5 (true) 
3. Execute the loop body
4. Increment $i
5. Check if $i <= 5 (true)
6. Execute the loop body
... and so on until $i becomes 6 and the condition is false */

// Ommitting parts of a for loop
$i = 0;
for(; $i < 5;){
    echo "Iteration2 : $i <br>";
    $i++;
}

// Using for loops with arrays
$fruits = ["apple", "banana", "orange", "grape", "mango"];
$fruitCount = count($fruits);

for($i = 0; $i < $fruitCount; $i++){
    echo "Fruit at index $i: " . $fruits[$i] . "<br>";
}

// ALternative syntax(for HTML template)
for ($i = 0; $i < 10; $i++):
    // code
endfor;

/*
When to use for loops:
    - When you know the exact number of iterations in advance
    - When working with array indices
    - For mathematical sequences
    - When you need a counter variable */

// 2.4 For each loop
// Specifically designed for iterating through arrays and objects
// Syntax:
/*
foreach (array_expression as $value){
    code to be executed
}
    */

// or
/*
foreach (array_expression as $key => $value){
    // code to be executed
}
    */

// Basic foreach on indexed array
$colors = ["red", "green", "blue"];
foreach($colors as $color){
    // $color takes the value of each element in sequence
    echo "Color: $color <br>";
}
/*
How it works:
1. First iteration: $color = red
2. Second iteration: $color = green
3. Third iteration: $color = blue
 */

 // Foreach with key => value on associative array
 $person = [
    "name" => "John",
    "age" => "30",
    "city" => "Newyork"
 ];

 foreach($person as $key => $value){
    //$key contains the array key (e.g., "name", "age")
    // $value contains the corresponding value (e.g. "John", 30)
    echo "$key: $value <br>";
 }

// Iterating over nested arrays
$users = [
    ["name" => "Alice", "email" => "alice@gmail.com"],
    ["name" => "Bob", "email" => "bob@gmail.com"]
];
foreach($users as $user){
    echo "Name: " .$user["name"] . ", Email: " . $user["email"] . "<br>";
}

/*
Advantages of foreach:
    - No need to initialize counters or check array bounds.
    - Works with all aray types(indexed, associative or multidimensional) 
    - More readable and less prone to error
    - Automatically handles the correct number of iterations */

// 2.5 Loop Control Statements
// Statements that change the normal flow of loops
// break -> Exits the loop immediately
for($i = 1; $i <= 10; $i++){
    if($i == 5){
        echo "Breaking at $i <br>";
        break; // Immediately exits the loop when $i = 5
    }
    echo "Iteration: $i <br>";
}
// After the break execution continues with the code after the loop

// Continue statement - Skips the rest of the iteration
for($i = 1; $i <= 10; $i++){
    if($i % 2 == 0){
        continue; // Skips even numbers
    }
    echo "Odd number: $i <br>";
}
// After the continue, the loop jumps to the next iteration
/*
Best practices:
- Use break when you've found what you are looking for or met a termination condition.
- Use continue to skip iterations that don't meet certain criteria
- Avoid exessive use of break and continue as they can make code harder to follow */

// 3. Include and Require Statements
// These statements allow you to include code from other files, promoting code reuse and organization.

// Include - Includes and evaluates the specified file
include 'header.php';
// If file doesn't exist, include throws a warning but script continues(program will still run)

// include_once - Includes the file only once
include_once 'functions.php';
// If the file was already included, it wont be included again 
// Useful for functions or class definitions to avoid redeclaration errors

// require - Similar to include but produces a fatal error if the file doesn't exist
require 'config.php';
// Script will stop if file is not found - use when the file is absolutely necessary

// require_once - Requires the file only once
require_once 'database.php';
// Fatal error if not found, includes only once
// Most commonly used for critical class definitions

/*
When to use each:
- Use required when the file is critical to the application
- Use include when the file is optional
- Use _once versions when the file contains functions or classes to prevent redifinition errors

Paths:
- Relativepaths are relative to the current script
- Absolute paths start from the file system root
- You can use variables in path: include $file_path
*/
// Example of a common directory structure and includes
require_once 'config/database.php'; // Database configuration
require_once "includes/functions.php"; // Helper functions
include 'templates/header.php'; // Site header(HTML)
// content goes here
include "templates/footer.php"; // Site footer(HTML)
    

?>