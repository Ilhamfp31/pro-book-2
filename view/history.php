<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/order.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/user.php');

$user_id = $_COOKIE['id'];

if (empty($user_id)) {
    header('Location: /view/login.php');
    exit();
}

$user = User::getUserById($user_id);
$histories = Order::getHistoryByUser($user_id);

function parseDate($timestamp) {
    $date = explode(' ', $timestamp)[0];
    $date = explode('-', $date);
    $month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    return $date[2] . ' ' . $month[$date[1] - 1] . ' ' . $date[0];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Purchase History</title>
    <link rel="stylesheet" type="text/css" href="/view/css/history.css">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>
    <div class="header">
        <span id="pro">Pro-</span><span id="book">Book</span> 
        <span class="header2"> 
            <span id="user">Hi, <?php echo $user["username"]; ?></span><span id="logicon" onclick="window.location.href = '/controller/logout.php'"><img class='logout' src='/view/asset/poweroff.png'></span>
        </span>
    </div>
    <div class="main-section">
        <a href="/view/search.php"><div class="browse"><strong class="font2em">B</strong>rowse</div></a>
        <a href="/view/history.php"><div class="history"><strong class="font2em">H</strong>istory</div></a> 
        <a href="/view/profile.php"><div class="profile"><strong class="font2em">P</strong>rofile</div></a>
    </div>
    <div id='history-list' class="main-page">
        <h1>History</h1>
        <?php if (is_array($histories) || is_object($histories)) { ?>
            <?php foreach($histories as $history) { ?>
                <div class='history-unit'>
                    <img class='book-pic' src=<?php echo $history["pic"]; ?>>
                    <div class='book-details'>
                        <h2 class='book-name'><?php echo $history["title"]; ?></h2>
                        <h4 class='order-quantity'>Jumlah : <?php echo $history["quantity"]; ?></h4>
                        <h4 class='review-exist'>
                        
                        <?php if ($history["is_reviewed"] == 1) { ?>
                            Anda sudah memberikan review
                        <?php } else { ?>
                            Belum direview
                        <?php } ?>
                        </h4>
                    </div>
                    <div class='order-details'>
                        <h3 class='order-date'><?php echo parseDate($history["timestamp"]); ?></h3>
                        <h3 class='order-num'>Nomor Order: #<?php echo $history["order_id"]; ?></h3>
                        <?php if ($history["is_reviewed"] != 1) { ?>
                            <button type='button' class='review-book' onclick="window.location.href = '/view/review.php?bookid=<?php echo $history["book_id"]; ?>'">Review</button>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</body>
</html>
