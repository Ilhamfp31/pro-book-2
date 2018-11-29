<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="/public/css/main.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://spin.js.org/spin.css">
</head>
<body>
	<?php require_once('navbar.php') ?>
	<div class="container" ng-app="proBook" ng-controller="searchBook">
		<h1 class="page-header">Search Book</h1>
		<form id="form-search-box">
			<input ng-model="keyword" type="text" name="keyword" id="search-box" placeholder="Input search terms..">
			<input ng-click="submitSearch()" type="submit" value="Search" id="submit-search">
		</form>
		
        <div class="result-element" ng-repeat="book in result">
            <div class="result-wrapper">
                <img src="{{book.image}}" class="thumbnail">
                <div class="result-description">
                    <p class="result-title">{{book.title}}</p>
                    <p class="result-info">{{book.author}} - {{book.avg_rating}} ({{book.votes}} votes)</p>
                    <p class="result-desc">{{book.description}}</p>
                    <a href="/detail/index/{{book.id}}" class="detail-button">Detail</a>
                </div>
            </div>
        </div>
	</div>
	<script type="text/javascript" src="/public/js/search.js"></script>
    <script src="https://spin.js.org/spin.js"></script>
</body>
</html>
