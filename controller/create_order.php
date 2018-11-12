<?php

require_once('../model/order.php');

// Handle post request
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

$input['user_id'] = $_COOKIE['id'];

$order = Order::createOrder($input);

if (empty($order)) {
    http_response_code(401);
} else {
    header("application/json");
    http_response_code(200);
    echo json_encode($order);
}

?>