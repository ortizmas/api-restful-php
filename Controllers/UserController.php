<?php

include '../../Models/User.php';

class UserController
{
    public function index()
    {
        $users = new User();
        return $users->findAll();
    }

    public function insert($obj)
    {
        $user = new User();
        $inserUser = $user->insert($obj);

        print_r($inserUser);
    }
}

?>