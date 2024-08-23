<?php
require './helper.php';
require basePath('route/Router.php');

require basePath('Database.php');
$config = require basePath('config/db.php');

$db = new DataBase($config);


$router = new Router();

$routes = require basePath('route/routes.php');




$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);
