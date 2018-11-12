<?php

require_once('../model/user.php');

// Handle post request
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

$result = User::isEmailExist($input["email"]);

if ($result) {
	http_response_code(401);
} else {
	http_response_code(200);
}

?>
