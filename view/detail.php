<?php
require_once('../model/book.php');
require_once('../model/review.php');
require_once('../model/user.php');

$user_id = $_COOKIE['id'];

if (empty($user_id)) {
    header('Location: /view/login.php');
    exit();
}

$book_id = $_GET['id'];

$user = User::getUserById($user_id);
$book = Book::getBookById($book_id);
$reviews = Review::getReviewByBookId($book_id);

if (empty($book_id) || empty($book)) {
    header('Location: /view/search.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Detail</title>
    <link rel="stylesheet" type="text/css" href="/view/css/detail.css">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body onload='changeRating(<?php echo $book['avg_rating']; ?>)'>
    <div class="header">
        <span id="pro">Pro-</span><span id="book">Book</span> 
        <span class="header2"> 
            <span id="user">Hi, <?php echo $user["username"]; ?></span> <span id="logicon" onclick="window.location.href = '/controller/logout.php'"><img class='logout' src='/view/asset/poweroff.png'></span>
        </span>
    </div>
    <div class="main-section">
        <a href="/view/search.php"><div class="browse"><strong class="font2em">B</strong>rowse</div></a>
        <a href="/view/history.php"><div class="history"><strong class="font2em">H</strong>istory</div></a> 
        <a href="/view/profile.php"><div class="profile"><strong class="font2em">P</strong>rofile</div></a>
    </div>
    <div class="main-page">
        <div class="book-detail">
            <div class="book-text-desc">
                <h1 id="book-title"><?php echo $book["title"];?></h1>
                <p id="book-author"><?php echo $book["author"]; ?></p>
                <p id="book-desc"><?php echo $book["synopsis"]; ?></p>
            </div>
            <div class="book-nontext-desc">
                <img id="book-image" src=<?php echo $book["pic"]; ?>>
                <div class="book-ratings">
                    <img id="star-1" src="asset/empty_star.png">
                    <img id="star-2" src="asset/empty_star.png">
                    <img id="star-3" src="asset/empty_star.png">
                    <img id="star-4" src="asset/empty_star.png">
                    <img id="star-5" src="asset/empty_star.png">
                </div> 
                <div class="book-ratings-num">
                    <p class='ratings' id="book-ratings-num">-/5.0</p>
                </div>
            </div>
        </div>
        <div class="book-order">
            <h2>Order</h2>
            <div class="order-detail">
                <p id='jumlah'>Jumlah: </p>
                <select id='order-quantity'>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                </select> 
            </div>
            <button type='button' id='order-submit' onclick="processOrder()">Order</button> 
        </div>
        <div id='book-reviews-list' class="book-reviews">
            <h2>Reviews</h2>
            <?php if (is_array($reviews) || is_object($reviews)) { ?>
                <?php foreach($reviews as $review) {
                    echo '<div class=\'review-unit\'>';
                        echo '<img class=\'review-pic\' src=' . $review["profile_pic"] . '>';
                        echo '<div class=\'review-detail\'>';
                            echo '<h3 class=\'review-name\'>@' . $review["username"] . '</h3>';
                            echo '<p class=\'review-desc\'>' . $review["message"] . '</p>';
                        echo '</div>';
                        echo '<div class=\'review-rating\'>';
                            echo '<img class=\'review-star\' src=\'asset/full_star.png\'>';
                            echo '<p class=\'ratings\'>' . number_format((float)$review["rating"], 1, '.', '') . '/5.0</p>';
                        echo '</div>';
                    echo '</div>';
                }?>
            <?php } ?>
        </div>
    </div>
    <div id="notification-background">
        <div class='notification'>
            <img class='exit-image' src='/view/asset/exit.png' onclick="closeNotification()">
            <div class='notif-detail'>
                <img class='check-image' src='/view/asset/check.png'>
                <div class='notif-text'>
                    <h4>Pemesanan Berhasil!</>
                    <p id='notif-no'>Nomor Transaksi : 3</p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/detail.js"></script>
</body>
</html>
