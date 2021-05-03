<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require '../../Controllers/StateController.php';

$state = new StateController();
$result = $state->index();

// foreach ($result->fetchAll() as $key => $value) {
//     echo json_encode($value);
// }

if (count($result->fetchAll()) > 0) {
    
    $state_arr = array();
    $state_arr['data'] = array();

    while ($row = $result->setFetchMode(PDO::FETCH_ASSOC)) {
        extract($row);
        $state_item = array(
            'id' => $id,
            'name' => $name,
            'abbreviation' => $abbreviation,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        );

        array_push($state_item['data'], $state_item);
    }

    // JSON output
    echo json_encode($state_arr);

} else {
    echo json_encode(['message' => 'No state foun!']);
}

?>