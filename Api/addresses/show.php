<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');

    require '../../Controllers/AddressController.php';

    $address = new AddressController();

    $id = isset($_GET['id']) ? $_GET['id'] : die();
    $result = $address->show($id);

    if ($address->id != null) {
        $address = [
            'id' => $address->id,
            'cep' => $address->cep,
            'street' => $address->street,
            'number' => $address->number,
            'district' => $address->district,
            'additional' => $address->additional,
            'city_id' => $address->city_id,
            'user_id' => $address->user_id
        ];

        http_response_code(200);
        echo json_encode($address);

    } else {
        // 404 Not found
        http_response_code(404);

        echo json_encode(['message' => 'No state foun!']);
    }

?>
