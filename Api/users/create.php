<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../../Controllers/UserController.php');

$data = file_get_contents('php://input');
$obj =  json_decode($data);
// echo $obj->name;

if (!empty($data)) {
    $user = new UserController();
    $create = $user->insert($obj);

    if ($create) {
        http_response_code(201);
        echo json_encode(array("message" => "Usuario criado com sucesso!!"));
    } else {
        // 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Usuario não cadastrado"));
    }
}




?>