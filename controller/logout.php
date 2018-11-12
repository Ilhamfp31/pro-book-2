<?php

// LOGOUT
if (isset($_COOKIE['id'])) {
	unset($_COOKIE['id']);
	setcookie('id', '', time() - 3600, '/');
}

header("Location: /view/login.php");

?>