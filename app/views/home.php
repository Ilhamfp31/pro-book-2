<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="/public/css/main.css" />
</head>
<body>
	<?php require_once('navbar.php') ?>
	<div class="container">
		<h1 class="page-header">Search Book</h1>
		<form action="/home/search" method="POST" id="form-search-box">
			<input type="text" name="keyword" id="search-box" placeholder="Input search terms..">
			<input type="submit" value="Search" id="submit-search">
		</form>
	</div>
</body>
</html>
