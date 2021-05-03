<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include('../../Controllers/UserController.php');

$users = new UserController();

foreach ($users->index() as $key => $user) {
    echo json_encode($user);
}

?>