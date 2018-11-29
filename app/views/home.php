<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="/public/css/main.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>
	<?php require_once('navbar.php') ?>
	<div class="container" ng-app="proBook" ng-controller="searchBook">
		<h1 class="page-header">Search Book</h1>
		<form id="form-search-box">
			<input ng-model="keyword" type="text" name="keyword" id="search-box" placeholder="Input search terms..">
			<input ng-click="submitSearch()" type="submit" value="Search" id="submit-search">
		</form>
		<?php if (is_array($data['data']) || is_object($data['data'])){
                foreach ($data['data'] as $element) { ?>
        <div class="result-element">
            <div class="result-wrapper">
                <img src="<?php echo $element['bookPicture']?>" class="thumbnail">
                <div class="result-description">
                    <p class="result-title"><?php echo $element['title']?></p>
                    <?php if(isset($element['author']) && isset($element['avg_rating'])) { ?>
                        <p class="result-info"><?php echo $element['author']?> - <?php echo sprintf('%0.1f', $element['avg_rating'])?>/5.0 (<?php echo $element['votes']?> votes)</p>
                    <?php } else { ?>
                        <p class="result-info"><?php echo $element['author']?> - No Rating (0 votes)</p>
                    <?php } ?>
                    <p class="result-desc"><?php echo $element['synopsis']?></p>
                    <a href="/detail/index/<?php echo $element['bookID']?>" class="detail-button">Detail</a>
                </div>
            </div>
        </div>
        <?php } } ?>
	</div>
	<script type="text/javascript" src="/public/js/search.js"></script>
</body>
</html>
