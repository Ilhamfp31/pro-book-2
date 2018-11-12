<?php
	
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/user.php');

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

?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="/view/css/search.css">
	<link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>
	<div class="header">
		<span id="pro">Pro-</span><span id="book">Book</span> 
		<span class="header2"> 
			<span id="user">Hi, <?php echo $user["username"]?></span> <span id="logicon" onclick="window.location.href = '/controller/logout.php'"><img class='logout' src='/view/asset/poweroff.png'></span>
		</span>
	</div>
	<div class="main-section">
		<a href="/view/search.php"><div class="browse"><strong class="font2em">B</strong>rowse</div></a>
		<a href="/view/history.php"><div class="history"><strong class="font2em">H</strong>istory</div></a> 
		<a href="/view/profile.php"><div class="profile"><strong class="font2em">P</strong>rofile</div></a>
	</div>
	<div class="container">
		<span id="search-book">Search Book</span>
		<form action="/view/search_result.php" method="get" onsubmit="return validateSearch()">
			<div>
				<input type="text" id="search-box" name="search" placeholder="Input search terms...."></input>
			</div>
			<button id="submit" type="submit">Search</button>
		</form>
	</div>
	<script type="text/javascript" src="/view/js/search.js"></script>
</body>
</html>
