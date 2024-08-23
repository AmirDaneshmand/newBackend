<?php

namespace App\Controllers;

use DataBase;



class Login
{
    protected $db;

    public function __construct()
    {
        $config = require basePath("config/db.php");
        $this->db = new DataBase($config);
    }


    public function getUseInfo($userName)
    {
        $table = 'persons';
        $param = [
            'table' => $table,
            'username' => $userName,
        ];
        $query = "SELECT * FROM :table WHERE username = :username";
        $user = $this->db->query($query, $param)->fetch();
        return $user;
    }

    public function checkPass($userName, $password)
    {
        $table = 'persons';
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $param = [
            'table' => $table,
            'username' => $userName,
            'password' => $hashPass
        ];
        $query = "SELECT username, password, personType FROM :table WHERE username = :username";
        $user = $this->db->query($query, $param)->fetch();



        if ($user['password'] != $hashPass)
            return false;

        return true;
    }

    public function usernameExist($userName)
    {
        $table = 'persons';
        $param = [
            'table' => $table,
            'username' => $userName,
        ];
        $query = "SELECT username FROM :table WHERE username = :username";
        $user = $this->db->query($query, $param)->fetch();


        if ($user)
            return true;
        return false;
    }

    public function validate()
    {
        $user = $_GET['user'];
        $username = filter_input(INPUT_GET, $user->username, FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_GET, $user->password, FILTER_SANITIZE_SPECIAL_CHARS);
        $newUser = [
            'username' => $username,
            'password' => $password
        ];
        $_GET['user'] = $newUser;
    }
}
