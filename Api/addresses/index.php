<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include('../../Controllers/AddressController.php');

$addresses = new AddressController();

foreach ($addresses->index() as $key => $address) {
    echo json_encode($address);
}

?>