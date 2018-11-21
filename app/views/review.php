<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Review</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/public/css/main.css" />
</head>
<body>
    <?php require_once('navbar.php') ?>
        <div class="container">
            <div id="review-detail">
                <div id=review-desc>
                    <h1 class="page-header"><?php echo $data['title']?></h1>
                    <p id="author"><?php echo $data['author']?></p>
                </div>
                <img src=<?php echo $data['bookPicture']?> class="review-image">
            </div>
            <form action="/review/submit" id ="review-form" method="POST">
                <div class="review-rate">
                    <p id="review-addrate">Add Rating</p>
                    <div class="rating-star-wrapper">
                      <img src="/public/images/star.png" class="filled-star star star1">
                      <img src="/public/images/star-unfilled.png" class="unfilled-star star star1">
                      <img src="/public/images/star.png" class="filled-star star star2">
                      <img src="/public/images/star-unfilled.png" class="unfilled-star star star2">
                      <img src="/public/images/star.png" class="filled-star star star3">
                      <img src="/public/images/star-unfilled.png" class="unfilled-star star star3">
                      <img src="/public/images/star.png" class="filled-star star star4">
                      <img src="/public/images/star-unfilled.png" class="unfilled-star star star4">
                      <img src="/public/images/star.png" class="filled-star star star5">
                      <img src="/public/images/star-unfilled.png" class="unfilled-star star star5">
                    </div>
                    <input id="ratinginput" type="number" name="rating" value="">
                    <p id="review-addrate">Add Comment</p>
                    <textarea id = "commentinput" class ="comment-input" form ="review-form" name="comment"></textarea>
                </div>
                <div class ="comment-row">
                    <a href="/History" id = "back-button">Back</a>
                    <button id="save-button" class="disabled-save-button" type="submit" disabled>SAVE</button>
                </div>
            </form>
        </div>
    <script src="/public/js/review.js"></script>
</body>
</html>
