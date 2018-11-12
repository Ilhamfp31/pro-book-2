<?php 

if (isset($_COOKIE['id'])) {
	header("Location: /view/profile.php");
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="/view/css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>
	<div class="background">
		<div class="container">
			<h1> LOGIN </h1>
			<form action="/controller/login.php" method="POST" onsubmit="return validateField()">
				<table class="data-registration">
						<tr>
							<td class="align-right">Username</td>
							<td><input type="text" id="username" name="username"></td>
						</tr>
						<tr>
							<td class="align-right">Password</td>
							<td><input type="password" id="password" name="password"></td>
						</tr>
				</table>
				<span id="already"><a href="/view/register.php">Don't have an account?</a></span>
				<div class="button-login">
					<button type="submit" id="submit">LOGIN</button>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="/view/js/login.js"></script>
</body>
</html>