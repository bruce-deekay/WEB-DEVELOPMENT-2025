<?php

// Create a database connection class
class Database{
    private static $instance = null;
    private $conn;

    // Private constructor
    private function __construct(){
        // Get credentials from a secure connection
        $config = include 'config/database.php';

        try {
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
            $this -> conn = new PDO($dsn, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e){
            die("Connection failed: " . $e -> getMessage());
        }
    }

    // Get database instance
    public static function getInstance(){
        if (self::$instance === null){
            self::$instance = new self;
        }
    return self::$instance;
    }

    // Get the PDO connection
    public function getConnection(){
        return $this -> conn;
    }

}

// Basic CRUD Operations
// CRUD stands for Create, Read, Update and Delete - The four basic operaions performed on database records

// Create (INSERT)
function createUser($pdo, $username, $email, $password){
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try{
        // Prepare the SQL statement
        $stmt = $pdo -> prepare("
            INSERT INTO users (username, email, password, created_at)
            VALUES (:username, :email, :password, NOW())
            ");

        // Bind parameters
        $stmt -> bindParam(':username', $username);
        $stmt -> bindParam(':email', $email);
        $stmt -> bindParam(':password', $hashed_password);
        
        // Execute the statement
        $stmt -> execute();

        // Get the ID of the newly created user
        return $pdo -> lastInsertId();

    } catch (PDOException $e){
        echo "Error creating user: " .$e->getMessage();
        return false;
    }
}

// Usage
$db = DataBase::getInstance();
// $pdo = $db -> getConnection();
if ($db !== null) {
    $pdo = $db->getConnection();  // Call the method only if $db is not null
} else {
    echo "Database object is null.";
}

/*
$newUserId = createUser($pdo, "John_Wick", "johnwick@email.com", "secure_password123");

if ($newUserId){
    echo "User created with ID: " . $newUserId;
}
 */   

    /*
function createProduct($pdo, $name, $price, $description){
    try{
        $stmt = $pdo -> prepare("
        INSERT INTO products (name, price, description, created_at)
        VALUES (:name, :price, :description, NOW())
        ");

        // Execute with associative array
        $stmt -> execute([
            ':name' => $name,
            ':price' => $price,
            ':description' => $description
        ]);

        return $pdo->lastInsertId();
    } catch (PDOException $e){
        echo "Error creating product: " . $e -> getMessage();
        return false;
    }
}

// usage: Create several products
$productId = createProduct($pdo, "Smartphone", 599.99, "Latest model with advanced features");
if ($productId){
    echo "Product created with ID: " . $productId;
}
*/

// Inserting mutiple records at once
function createMultipleRecord($pdo, $records){
    try {
        // Begin transaction for mutiple inserts
        $pdo->beginTransaction();

        $stmnt = $pdo->prepare("
        INSERT INTO items (name, category, price)
        VALUES (:name, :category, :price)  
        ");

        // Insert each record
        foreach ($records as $record){
            $stmnt->execute([
                ':name' => $record['name'],
                ':category' => $record['category'],
                ':price' => $record['price']
            ]);
        }

        // Commit the transaction
        $pdo->commit();
        return true;
    } catch (PDOException $e){
        // Roll back if something wen wrong
        $pdo->rollBack();
        echo "Error creating records: " . $e->getMessage();
        return false;
    }
}

// Usage
$items = [
    [
        'name'=>'Laptop',
        'category'=>'Electronics',
        'price'=>999.99
    ],
    [
            'name'=>'Headphones',
            'category'=>'Accessories',
            'price'=>149.99
    ],
    [
        'name'=>'Mouse',
        'category'=>'Peripherals',
        'price'=>29.99
    ]
];

/*
    if (createMultipleRecord($pdo, $items)){
        echo "All items created successfully";
    }
*/

// Read (Select)
// 1. Retrieving a single record by ID
function getUserById($pdo, $userId){
    try{
        $stmnt = $pdo->prepare("SELECT id, username, email, password, created_at FROM users WHERE id = :id");
        $stmnt->execute([':id'=>$userId]);

        // Fetch a single
        return $stmnt->fetch(); // Return false if no record found
    } catch (PDOException $e){
        echo "Error retrieving user: " . $e->getMessage();
        return false;
    }
}

// Example usage
/*
$user = getUserById($pdo, 1);
if ($user){
    echo "Username: " . $user['username'] . ", Email: " . $user['email'];
} else{
    echo "User not found";
}
    */

    /*
// Example usage
// Get 10 users from the beginning(first page)
$users = getAllUsers($pdo);

// Get 20 users from the beginning
$users = getAllUsers($pdo, 20);

// Get 10 users starting from the 11th user (second page of 10)
// $users = getAllUsers($pdo, 10, 10);

// Display users
foreach ($users as $user){
    echo "Username: {$user['username']}, Email: {$user['email']} <br>";
}
    */

// 2. Retrieving multiple records
function getAllUsers($pdo, $limit = 10 /* A limit specifies the number that you want */, $offset = 0 /*An offset is a default */){
    try {
        $stmt = $pdo->prepare("
                SELECT * FROM users
                ORDER BY created_at DESC
                LIMIT :limit OFFSET :offset
        ");

        // Bind parameters (must be bound as integers for LIMIT/OFFSET)
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch all rows
        return $stmt->fetchAll();
    } catch (PDOException $e){
        echo "Error retrieving users: " .$e->getMessage();
        return[];
    }
}

// Example usage

// 3. Retrieving with conditions
function searchUsers($pdo, $searchTerm){
    try{
        $searchTerm = "%$searchTerm%"; // Add wildcards for like querries
        $stmt = $pdo->prepare("
            SELECT * FROM users
            WHERE username LIKE :term1
            OR email LIKE :term2
            ORDER BY username
        ");

        $stmt->bindValue(':term1', $searchTerm, PDO::PARAM_STR);
        $stmt->bindValue(':term2', $searchTerm, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e){
        echo "Error searching users: " . $e->getMessage();
        return[];
    }
}

// Example usage
// Search for users with "john" in username or email
$searchResults = searchUsers($pdo, "john");

// Display search results
if (count($searchResults) > 0){
    echo "Found " . count($searchResults) . "users:<br>";
    foreach ($searchResults as $user){
        echo "Username: {$user['username']}, Email: {$user['email']} <br>";
    }
} else {
    echo "No users were found. <br>";
}


// 4. Counting records
function countUsers($pdo){
    try{
        $stmnt = $pdo->query("SELECT COUNT(*) FROM users");
        return $stmnt->fetchColumn();
    } catch (PDOException $e){
        echo "Error counting users: " . $e->getMessage();
        return 0;
    }
}

/*
// Example Usage
$totalUsers = countUsers($pdo);
echo "Total number of users: $totalUsers";
*/

// Update (UPDATE) -> UPDATE table_name SET column_name = new_value;
// 1. Updating a single record
function updateUser($pdo, $userId, $data){
    try{
        // Build the SET part of the querry dynamically
        $fields = [];
        $values = [];

        foreach ($data as $field => $value){
            $fields[] = "$field = :$field";
            $values[":$field"] = $value;
        }

        // Add the user ID to the values array
        $values[':id'] = $userId;

        $sql = "UPDATE users SET " . implode(", ", $fields) . " WHERE ID = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($values);

        // Return number of affected rows
        return $stmt->rowCount();
    }catch(PDOException $e){
        echo "Error updating user: " . $e->getMessage();
        return false;
    }
}

/*
// Usage
$updated = updateUser($pdo, 1, [
    'username' => 'new_username',
    'email' => 'new_email@email.com',
]);

if ($updated){
    echo "User updated successfully. Rows affected: $updated";
} else {
    echo "No changes made or user not found";
}
*/

// 3. Updating multiple records
function updateProductPrices($pdo, $productId, $increasePercentage){
    try{
        $stmnt = $pdo->prepare("
        UPDATE products
        SET price = price * (1 + :percentage / 100)
        WHERE id = :product_id
        ");

        $stmnt->execute([
            ':percentage'=>$increasePercentage,
            ':id'=>$productId
        ]);

        return $stmnt->rowCount();

    } catch (PDOException $e){
        echo "Error updating prices." . $e->getMessage();
        return false;
    }
}

/*
// Usage
$newPrice = updateProductPrices($pdo,1, 5);

if ($newPrice){
    echo "Price has been updated successfully. $rowsUpdated product affected.";
} else {
    echo "No changes were made!";
}
    */

// Delete (DELETE) FROM table_name WHERE column = value;
// Deleting a single record

function deleteUser($pdo, $userId){
    try{
        $stmnt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmnt->execute([':id'=>$userId]);

        // Return number of rows affected
        return $stmnt->rowCount();
    } catch (PDOException $e){
        echo "Error deleting user!" .$e->getMessage();
        return false;
    }
}

/*
// Usage
$killUser = deleteUser($pdo, 2);
if ($killUser){
    echo "User has been deleted successfully";
} else {
    echo "No users were found or could be deleted";
}
    */

// 2. Soft delete (marking as deleted instead of acual deletion)
function softDeleteUser($pdo, $userId){
    try{
        $stmnt=$pdo->prepare("
        UPDATE users
        SET deleted_at = NOW(), active = 0
        WHERE id = :id;
        ");
        $stmnt->execute([':id'=>$userId]);

        // Return number of rows affected
        return $stmnt->rowCount();
    } catch (PDOException $e){
        echo "Error soft-deleting user." . $e->getMessage();
        return false;
    }
}

//Usage
$moveTrash = softDeleteUser($pdo, 2);
if($moveTrash){
    echo "User successfully moved to trash";
} else {
    echo "No users were found or moved to trash";
}

?>