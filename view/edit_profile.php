<?php

require_once('../model/user.php');

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

$userJSON = json_encode($user);
$userHTML = htmlspecialchars($userJSON);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="/view/css/edit_profile.css">
	<link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body onload="loadUserData(<?php echo $userHTML ?>)">
	<div class="header">
		<span id="pro">Pro-</span><span id="book">Book</span> 
		<span class="header2"> 
			<span id="user">Hi, <?php echo $user['username'] ?></span> <span id="logicon" onclick="window.location.href = '/controller/logout.php'"><img class='logout' src='/view/asset/poweroff.png'></span>
		</span>
	</div>
	<div class="main-section">
		<a href="/view/search.php"><div class="browse"><strong class="font2em">B</strong>rowse</div></a>
		<a href="/view/history.php"><div class="history"><strong class="font2em">H</strong>istory</div></a> 
		<a href="/view/profile.php"><div class="profile"><strong class="font2em">P</strong>rofile</div></a>
	</div>
	<div id="edit-profile">Edit Profile</div>
	 
	<div id="profile-pic"> </div>
	<form action="/controller/edit_profile.php" method="POST" enctype="multipart/form-data" onsubmit="return isFieldValid()">
		<div id="browse-img">
			<div class="text-update"><span>Update profile picture</span></div>
			<div class="height-50"><input type="text" name="profile_pic" id="input-update">
				<label for="viaupload">
					<!-- <button type="button" id="browse-update">Browse..</button> -->
					<span id="span-button">Browse..</span>
					<input type="file" id="viaupload" name="upload">
				</label>
			</div>
		</div>
		<div class="container">
			<table class="table-profile">
				<tr>
					<td class="width-200">Name</td>
					<td class="width-81"><input type="text" id="name" name="user_name"></td>
				</tr>
				<tr>
					<td class="width-200">Address</td>
					<td class="width-81"><textarea id="address" rows="3" name="address"></textarea></td>
				</tr>
				<tr>
					<td class="width-200">Phone Number</td>
					<td class="width-81"><input type="text" id="phone_number" name="phone_num" onkeyup="validatePhoneNumber()"></td>
				</tr>
			</table>
		</div>
		<div class="button-container">
			<a href="/view/profile.php"><button id="back-button" type="button">Back</button></a>
			<button id="save-button" type="submit">Save</button>
		</div>
	</form>
	<script type="text/javascript" src="/view/js/edit_profile.js"></script>
</body>
