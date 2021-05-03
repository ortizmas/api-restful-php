<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');

    require '../../Controllers/StateController.php';

    $state = new StateController();

    $id = isset($_GET['id']) ? $_GET['id'] : die();
    $result = $state->show($id);

    if ($state->name != null) {
        $state = [
            'name' => $state->name,
            'abbreviation' => $state->abbreviation
        ];

        http_response_code(200);
        echo json_encode($state);

    } else {
        // 404 Not found
        http_response_code(404);

        echo json_encode(['message' => 'No state foun!']);
    }

?>
