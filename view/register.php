<?php 

if (isset($_COOKIE['id'])) {
	header("Location: /view/profile.php");
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="/view/css/register.css">
	<link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>
	<div class="background">
		<div class="container">
		<h1> REGISTER </h1>
			<form action="/controller/register.php" method="POST" onsubmit="return validateField()">
				<table class="data-registration">
					<tr>
						<td class="align-right">Name</td>
						<td><input type="text" id="name" name="name"></td>
					</tr>
					<tr>
						<td class="align-right">Username</td>
						<td><input type="text" id="username" name="username" onkeyup="validateUsername()"> <img src="asset/success.png" id="validate-username"></td>
					</tr>
					<tr>
						<td class="align-right">Email</td>
						<td><input type="text" id="email" name="email" onkeyup="validateEmail()"> <img src="asset/failed.png" id="validate-email"></td>
					</tr>
					<tr>
						<td class="align-right">Password</td>
						<td><input type="password" id="password" name="password" onkeyup="validatePassword()"></td>
					</tr>
					<tr>
						<td class="align-right">Confirm Password</td>
						<td><input type="password" id="confirm_password" name="confirm_password" onkeyup="validatePassword()"></td>
					</tr>
					<tr>
						<td class="align-right">Address</td>
						<td><textarea id="address" rows="3" name="address" ></textarea></td>
					</tr>
					<tr>
						<td class="align-right">Phone Number</td>
						<td><input type="text" id="phone_number" name="phone_number" onkeyup="validatePhoneNumber()"></td>
					</tr>
				</table>
				<span id="already"><a href="/view/login.php">Already have an account?</a></span>
				<div class="button-register">
					<button type="submit" id="submit">REGISTER</button>
				</div>
			</form>
		</div>
	</div>
<script type="text/javascript" src="/view/js/register.js"></script>
</body>
</html>