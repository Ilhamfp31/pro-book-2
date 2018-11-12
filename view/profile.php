<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/model/user.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/book.php');

if (!isset($_COOKIE["id"])) {
	header("Location: /view/login.php");
	exit();
}

$id = $_COOKIE["id"];
$user = User::getUserById($id);

if (empty($user)) {
	header("Location: /view/login.php");
	exit();
}

$imageURL = htmlspecialchars($user['profile_pic']);

echo <<<HTML

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="/view/css/profile.css">
	<link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body onload="loadProfile('{$imageURL}')">
	<div class="header">
		<span id="pro">Pro-</span><span id="book">Book</span> 
		<span class="header2"> 
			<span id="user">Hi, {$user['username']}</span> <span id="logicon" onclick="window.location.href = '/controller/logout.php'"><img class='logout' src='/view/asset/poweroff.png'></span>
		</span>
	</div>
	<div class="main-section">
		<a href="/view/search.php"><div class="browse"><strong class="font2em">B</strong>rowse</div></a>
		<a href="/view/history.php"><div class="history"><strong class="font2em">H</strong>istory</div></a> 
		<a href="/view/profile.php"><div class="profile"><strong class="font2em">P</strong>rofile</div></a>
	</div>
	<div class="profile-pic">
		<a href="/view/edit_profile.php"><span class="edit-pic"><img src="asset/edit.png"></span></a>
		<div class="pic-border"></div>
		<div class="name">{$user['name']}</div>
	</div>
	<div class="user-profile">
		<span id="my-profile">My Profile</span>
		<table class="table-profile">
			<tr>
				<td class="width-35"><img class="icon-table" src="asset/user.png"> Username</td>	
				<td id="username" class="width-65">@{$user['username']}</td>	
			</tr>
			<tr>
				<td class="width-35"><img class="icon-table" src="asset/email.png"> Email</td>	
				<td id="email" class="width-65">{$user['email']}</td>	
			</tr>
			<tr>
				<td class="width-35"><img class="icon-table" src="asset/address.png"> Address</td>	
				<td id="address" class="width-65">{$user['address']}</td>	
			</tr>
			<tr>
				<td class="width-35"><img class="icon-table" src="asset/phone.png"> Phone Number</td>	
				<td id="phone-number" class="width-65">{$user['phone_num']}</td>	
			</tr>
		</table>
	</div>
	<script type="text/javascript" src="/view/js/profile.js"></script>
</body>
</html>


HTML;
?>
