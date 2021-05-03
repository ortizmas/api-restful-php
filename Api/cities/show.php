<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');

    require '../../Controllers/CityController.php';

    $city = new CityController();

    $id = isset($_GET['id']) ? $_GET['id'] : die();
    $result = $city->show($id);

    if ($city->name != null) {
        $city_arr = [
            'name' => $city->name,
            'ibge_code' => $city->ibge_code,
            'state_id' => $city->state_id
        ];

        http_response_code(200);
        echo json_encode($city_arr);

    } else {
        // 404 Not found
        http_response_code(404);

        echo json_encode(['message' => 'No state foun!']);
    }

?>
