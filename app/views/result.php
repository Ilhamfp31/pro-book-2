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
        <div id="result-header">
            <h1 class="page-header">Search Result</h1>
            <p id="total-result">Found <u><b><?php echo count($data['data']) ?></b></u> result(s)</p>
        </div>
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
</body>
</html>
