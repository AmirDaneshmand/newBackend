<?php

namespace App\Controllers;

session_start();

use DataBase;
use LDAP\Result;



class SignUp extends Login
{



    public function registerNewPerson($userName, $password, $type, $created_at, $updated_at)
    {
        if ($this->usernameExist($userName))
            return false;

        $param = [
            'table' => $type,
            'username' => $userName,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ];

        $query = 'INSERT INTO :table (username, password, type, created_at, updated_at) VALUES (:username, :password, :type, :created_at, :updated_at)';
        $this->db->query($query, $param);
        return true;
    }

    public function validate()
    {
        $user = $_POST['user'];
        $username = filter_input(INPUT_POST, $user->username, FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, $user->password, FILTER_SANITIZE_SPECIAL_CHARS);

        $user->username = $username;
        $user->password = $password;

        $_POST['user'] = $user;
    }
}
