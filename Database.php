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
            $dsn = "mysql:host={$config['host']}; dbname = {$config['dbname']}; charset = utf8mb4";
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


$newUserId = createUser($pdo, "John_Wick", "johnwick@email.com", "secure_password123");

if ($newUserId){
    echo "User created with ID: " . $newUserId;
}
    

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

?>