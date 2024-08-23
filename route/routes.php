<?php

$router->get("/projects/newBackend/", "App/views/Login.view.php");
$router->get("/projects/newBackend/login", "App/views/Login.php");
$router->get("/projects/newBackend/signup", "App/views/Signup.php");
$router->get("/projects/newBackend/home", "App/views/homeController/home.php");
$router->get("/projects/newBackend/home/detail", "App/views/homeController/detail.php");
$router->get("/projects/newBackend/admin", "App/views/admin/admin.php");
