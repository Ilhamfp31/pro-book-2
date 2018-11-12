<?php
	
require_once('../model/user.php');
require_once('../model/book.php');

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

$title = urldecode($_GET["search"]);
if (empty($title)) {
	header("Location: /view/search.php");
}

$books = Book::getBooksByTitle($title);
$booksJSON = json_encode($books);
$booksHTML = htmlspecialchars($booksJSON);
$booksCount = count($books);


echo <<<HTML

<!DOCTYPE html>
<head>
	<title>Search Result</title>
	<link rel="stylesheet" href="/view/css/search_result.css">
	<link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body onload="createBooks({$booksHTML})">
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
	<div class="search-result-container">
		<div id="search-result">Search Result</div>
		<div id="search-number">Found <u id="result-number">{$booksCount}</u> result(s)</div>
	</div>
	<div id="book-placeholder">
	</div>
	<script type="text/javascript" src="/view/js/search_result.js"></script>
</body>

HTML;
?>
