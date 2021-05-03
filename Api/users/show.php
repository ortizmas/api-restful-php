<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');

    require '../../Controllers/UserController.php';

    $user = new UserController();

    $id = isset($_GET['id']) ? $_GET['id'] : die();
    $result = $user->show($id);

    if ($user->name != null) {
        $user_arr = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ];

        http_response_code(200);
        echo json_encode($user_arr);

    } else {
        // 404 Not found
        http_response_code(404);

        echo json_encode(['message' => 'No state foun!']);
    }

?>
