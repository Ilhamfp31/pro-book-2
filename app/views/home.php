<!DOCTYPE html>
<html ng-app="proBook">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="/public/css/main.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://loading.io/css/loading.css">
</head>
<body>
	<?php require_once('navbar.php') ?>
	<div class="container" ng-controller="searchBook">
		<h1 class="page-header">Search Book</h1>
		<form id="form-search-box">
			<input ng-model="keyword" type="text" name="keyword" id="search-box" placeholder="Input search terms..">
			<input ng-click="submitSearch()" type="submit" value="Search" id="submit-search">
		</form>

        <p id="not-found">Not Found</[]>

        <div class="lds-css ng-scope" id="loading-spinner">
            <div class="lds-spinner" style="100%;height:100%">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
		
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
	<script src="/public/js/search.js"></script>
</body>
</html>
