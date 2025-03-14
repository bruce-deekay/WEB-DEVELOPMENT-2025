<?php 

// Handling GET requests
// process_search.php?query=php&category=tutorials
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $searchQuery = $_GET["query"] ?? "";
    $category = $_GET["category"] ?? "";

    echo "Searching for '$searchQuery' in category '$category' <br>";
}

?>