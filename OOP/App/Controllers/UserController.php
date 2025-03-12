<?php 
// Folder wherewe put the logic

namespace App\Conrollers;

use App\Models\User;
use App\Services\Logger as LogService;

class UserController {
    public function getUser($id){
        // Using the imported class user
        $user = new User($id, "Chuck Norris");

        // Using a class with full namespace
        // $validator = new \App\Validators\UserValidator();

        // Using an aliased classes
        // $logger = new LogService();

        return $user;
    }
}

?>