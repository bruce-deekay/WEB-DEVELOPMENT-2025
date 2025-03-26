<?php

class User{
    private $db;

    public function __construct(){
        $this->db=new DataBase;
    }

    // Register user
    public function register($data){
        $this->db->query('INSERT_INTO users (username, email, password) VALUES (:username, :email, :password)');

        // Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['email'], PASSWORD_DEFAULT));

        // eXECUTE
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


    // Login user
    public function login($username, $password){
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        // Check if we got the row
        if ($row){
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)){
                return $row;
            } else{
                return false;
            }
        } else {
            return false;
        }
    }


    // Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($this->db->rowCount()>0){
            return true;
        } else {
            return false;
        }
    }


    // Find user by username
    public function fundUserByUsername($username){
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        if ($this->db->rowCount()>0){
            return true;
        } else {
            return false;
        }
    }


    // Get user by ID
    public function getUserByID($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        if ($this->db->rowCount()>0){
            return true;
        } else {
            return false;
        }
    }
}

?>