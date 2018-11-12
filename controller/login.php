<?php

require_once('../model/user.php');

$username = $_POST['username'];
$password = $_POST['password'];



if(isset($username,$password)){
	if($username != "" && $password != ""){
		$user = [
			'username' => $username,
			'password' => $password,
		];
	}
}else{
	header("Location: ../view/profile.php");
	exit();
}

$user = User::getUserLogin($user['username'], $user['password']);

if (empty($user)) {
	header("Location: ../view/profile.php");
	exit();
} else {
	setcookie("id", $user["id"], time() + 86400, "/");
	header("Location: ../view/profile.php");
	exit();
}
	
?>