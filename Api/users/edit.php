<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../../Controllers/UserController.php');

$data = file_get_contents('php://input');
$obj =  json_decode($data);

$id = $obj->id;

if (!empty($data)) {
    $user = new UserController();
    $update = $user->update($obj, $id);

    if ($update) {
        http_response_code(201);
        echo json_encode(array("message" => "Usuario alterado com sucesso!!"));
    } else {
        // 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Algo deu errado"));
    }
}




?>