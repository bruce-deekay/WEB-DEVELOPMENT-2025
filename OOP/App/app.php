<?php

require_once 'autoloader.php';

// Now you can use classes without manual requirement
$userController = new App\Controllers\UserController();
$user = $userController -> getUser(1);
echo $user -> getName();

/*
Namespace key concepts:
- Namespaces help organize code and avoid naming conflicts
- Use the 'namespace' keyword at the top of yoour file
- Import classes with the 'use' keyword
- Create aliases with 'use Namespace\Class as Alias'
- Reference global namespaces with leading backslash (Namespace\Class)

Autoloading
- Automatically loads class files when they're needed 
- PSR-4 is a common standard for autoloading
- Composer provided robust autoloader functionality

*/

?>