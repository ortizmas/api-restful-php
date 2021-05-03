<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    require '../../Controllers/CityController.php';

    $city = new CityController();
    $result = $city->index();
    $count = $result->rowCount();

    if ($count > 0) {
        
        $state_arr = [];
        $state_arr['data'] = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $city_item = array(
                'id' => $id,
                'name' => $name,
                'ibge_code' => $ibge_code,
                'state_id' => $state_id,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            );

            array_push($state_arr['data'], $city_item);
        }
        // 200 OK
        http_response_code(200);

        // JSON output
        echo json_encode($state_arr);

    } else {
        // 404 Not found
        http_response_code(404);

        echo json_encode(['message' => 'No state foun!']);
    }

?>
