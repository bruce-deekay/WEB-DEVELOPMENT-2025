<?php 

// Visibility and access modifiers
// Access modifiers control how properties and methods can be accessed

class BankAccount{
    // Private properties - Only accessible within the class
    private $accountNumber;
    private $balance;

    // Protected property - Accessible within this class and child classes
    protected $type;

    // Public - Accessible from anywhere
    public $ownername;

    // Constructor
    public function __construct($ownername, $accountNumber, $balance)
    {
        $this -> ownername = $ownername;
        $this -> accountNumber = $accountNumber;
        $this -> balance = $balance;
        $this -> type = "Standard";
    }

    public function deposit($amount){
        if ($amount > 0){
            $this -> balance += $amount;
            return true;
            return $this -> balance;
        }
        return false;
    }

    public function withdraw($amount){
        if($amount > 0 && $this -> hasSufficientFunds($amount)){
            $this -> balance -= $amount;
            return true;
        }
    }

    // Private method - Only accessible within this class
private function hasSufficientFunds($amount){
    return $this -> balance >= $amount;
}


// Public method to access private property
public function getBalance(){
    return $this -> balance;
}

// Protected method - Accessible in this class and child classes
protected function changeType($newType){
    $this -> type = $newType;
}

}
// Create a public method which can be called from anywhere and the method(to deposit funds) to return true if the amount you want to deposit is greater than zero. For you to withdraw, the amount should be greater than zero and you should have enough funds



$account = new BankAccount("John Wick", "12345678", 1000);

// Public property
echo $account -> ownername . "<br>"; // Output John Wick

// echo $account -> balance . "<br>; // This will cause an error because we are accessing a private property

echo $account -> getBalance() . "<br>"; // Output 1000

$account -> deposit(500);

echo $account -> getBalance() . "<br>"; // Output 1500

//
// $account -> hasSufficientFunds(100);
/*
Access modifiers explained:
    - Public is accessible from anyhwere
    - Private is accessible within the class itself
    - Protected is accessible within the class and any child class

This conept is called encapsulation - Hiding internal state and requiring all interaction to be through public methods    */

// Next - Imheritance (Create a new file called vehicle.php)




?>