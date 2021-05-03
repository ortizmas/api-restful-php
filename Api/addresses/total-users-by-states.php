<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include('../../Controllers/AddressController.php');

$address = new AddressController();
$total = $address->getTotalUsersByStates();

foreach ( $total as $key => $totalUsers) {
    echo json_encode($totalUsers);
}

?>