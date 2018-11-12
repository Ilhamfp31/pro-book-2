<?php 

require_once('../model/user.php');

function isUsernameValid($username) {
	$re = '/^[a-zA-Z0-9_]/';

	return preg_match($re,$username) === 1 && strlen($username) <= 20;
}

function isPhoneNumberValid($phoneNumber) {
	return strlen($phoneNumber) >= 9 && strlen($phoneNumber) <= 12;
}


function isDataValid($username, $password, $name, $email, $confirm_password, $address, $phone_num) {

	if (isset($username, $password, $name, $email, $confirm_password, $address, $phone_num)) {
		if($username != "" && $password != "" && $name != "" && $email != "" && $confirm_password != "" && $address != "" && $phone_num != "")
		{
			if($password !== $confirm_password) {
				return FALSE;
			}
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		     	return FALSE;
			}
			if(!isUsernameValid($username)){
				return FALSE;
			}
			if(!isPhoneNumberValid($phone_num)){
				return FALSE;	
			}
			$validateUsername = User::isUsernameExist($username);
			$validateEmail = User::isEmailExist($email);
			if ($validateUsername) {
				return FALSE;
			}
			if($validateEmail){
				return FALSE;
			}
			return TRUE;
		}
		return FALSE;
	}else{
		return FALSE;
	}
}

$user = [
	"username" => $_POST["username"],
	"password" => $_POST["password"],
	"email" => $_POST["email"],
	"phone_num" => $_POST["phone_number"],
	"profile_pic" => "/view/asset/default.jpg",
	"name" => $_POST["name"],
	"address" => $_POST["address"],
];

$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$address = $_POST['address'];
$phone_num = $_POST['phone_number'];
$email = $_POST['email'];

if(isDataValid($username, $password, $name, $email, $confirm_password, $address, $phone_num)){
	$user = User::createUser($user);
	header("Location: ../view/login.php");
	exit();
}else{
	header("Location: ../view/register.php");
	exit();
}


?>