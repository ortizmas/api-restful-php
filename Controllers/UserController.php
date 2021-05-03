<?php

include '../../Models/User.php';

class UserController
{
    public function index()
    {
        $users = new User();
        return $users->findAll();

    }
}

?>