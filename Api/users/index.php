<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include('../../Controllers/UserController.php');

$users = new UserController();

foreach ($users->index() as $key => $user) {
    echo json_encode($user);
}

?>