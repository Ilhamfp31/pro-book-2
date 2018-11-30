<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="1039450104464-p0bpievqv6nfcbhrcvbl2vrdkg7jgnnk.apps.googleusercontent.com">
	<link rel="stylesheet" type="text/css" media="screen" href="/public/css/main.css" />
</head>
<body>
	<?php require_once('navbar.php') ?>
	<div class="container">
        <div id="result-header">
            <h1 class="page-header">History</h1>
        </div>
        <?php if (is_array($data['data']) || is_object($data['data'])){
            $a=count($data['data']);
            foreach ($data['data'] as $element) {?>
        <div class="result-element">
            <div class="history-section">
                <div class="history-detail">
                    <img src="<?php echo $element['bookPicture']?>" class="thumbnail">
                    <div class="history-description">
                        <p class="history-title"><?php echo $element['title']?></p>
                        <p class="history-desc">Jumlah : <?php echo $element['quantity']?></p>
                        <?php if(isset($element['reviewID'])) {?>
                            <p class="history-desc">Anda sudah memberikan review</p>
                        <?php } else {?>
                            <p class="history-desc">Belum direview</p>
                        <?php }?>
                    </div>
                </div>
                <div class="history-order">
                    <p class="history-info"><b><?php echo date('d F Y', strtotime($element['date']))?></b></p>
                    <p class="history-number"><b>Nomor Order : #<?php echo $a--;?></b></p>
                    <?php if(isset($element['reviewID'])) {?>
                    <?php } else {?>
                        <a href="/review/index/<?php echo $element['orderID']?>" class="detail-button">Review</a>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php } }?>
    </div>
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script>
        function onLoad() {
            gapi.load('auth2', function() {
            gapi.auth2.init();
            });
        }        
        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                console.log('User signed out.');
            });
        }
    </script>
</body>
</html>
