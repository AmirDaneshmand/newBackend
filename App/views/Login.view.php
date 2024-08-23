<?php

use App\Controllers\Login;

// require "../controllers/Login.php";

// $loginController = new Login();

// Start the session
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        <label for="username">UserName : </label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password">
    </form>
</body>

</html>