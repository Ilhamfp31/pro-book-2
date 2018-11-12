<?php  

require_once("../model/review.php");
require_once("../model/book.php");
require_once("../model/user.php");

if (!isset($_COOKIE["id"])) {
	header("Location: /view/login.php");
	exit();
}

$user_id = $_COOKIE["id"];
$user = User::getUserById($user_id);

$book_id = $_GET['bookid'];
$book = Book::getBookById($book_id);


if (empty($book)) {
	header("Location: /view/history.php");
	exit();
}

$data = [
	'book_id' => $book_id,
	'user_id' => $user_id,
];
if(!Review::checkReview($data)){
	header("Location: /view/history.php");
	exit();
}

?>

<script type="text/javascript">
	var bookPic = "<?php echo $book['pic'] ?>";
	var userID = "<?php echo $user['id'] ?>";
	var bookID = "<?php echo $book['id'] ?>";

</script>

<!DOCTYPE html>
<html>
<head>
	<title>Review</title>
	<link rel="stylesheet" type="text/css" href="/view/css/review.css">
	<link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body onload="loadBookData(bookPic)">
	<div class="header">
		<span id="pro">Pro-</span><span id="book">Book</span> 
		<span class="header2"> 
			<span id="user">Hi, <?php echo $user['username'] ?></span> <span id="logicon" onclick="window.location.href = '/controller/logout.php'"><img class='logout' src='/view/asset/poweroff.png'></span>
		</span>
	</div>
	<div class="main-section">
		<a href="/view/search.php"><div class="browse"><strong class="font2em">B</strong>rowse</div></a>
		<a href="/view/history.php"><div class="history"><strong class="font2em">H</strong>istory</div></a> 
		<a href="/view/profile.php"><div class="profile"><strong class="font2em">P</strong>rofile</div></a>
	</div>
	<div class="book-section">
		<div class="title-book">
			<div class="title"><span id="book-title"><?php echo $book['title'] ?></span></div>
			<div class="author"><?php echo $book['author'] ?></div>
		</div>
		<div class="book-pic"></div>
	</div>
	<div class="review-section">
		<span id="add-rating">Add Rating</span>
		<div class="review">
			<img src="asset/empty_star.png" class="img-star star1" onclick="setStar(0)"> 
			<img src="asset/empty_star.png" class="img-star star2" onclick="setStar(1)"> 
			<img src="asset/empty_star.png" class="img-star star3" onclick="setStar(2)"> 
			<img src="asset/empty_star.png" class="img-star star4" onclick="setStar(3)"> 
			<img src="asset/empty_star.png" class="img-star star5" onclick="setStar(4)">
		</div>
	</div>
	<form action="../controller/review.php?bookid=<?php echo $book['id'] ?>" method="POST" onsubmit="return validateField()">
		<div class="comment-section">
			<span id="add-comment">Add Comment</span>
			<div class="comment">
				<textarea rows="5" id="user-comment" name="comment"></textarea>
			</div>
		</div>
		<a href="/view/history.php"><button type="button" id="back">Back</button></a>
		<input type="hidden" name="star" id="input-star" value="0">
		<input type="hidden" name="userid" id="passuser" value="69">
		<input type="hidden" name="bookid" id="passbook" value="6969">
		<button type="submit" id="submit">Submit</button>
	</form>
	<script type="text/javascript" src="/view/js/review.js"></script>
</body>
</html>