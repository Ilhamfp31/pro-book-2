<?php

require_once('../model/user.php');

// Handle post request
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

$result = User::isUsernameExist($input["username"]);

if ($result) {
	http_response_code(401);
} else {
	http_response_code(200);
}

?>