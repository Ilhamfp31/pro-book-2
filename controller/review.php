<?php 

require_once('../model/review.php');
require_once('../model/book.php');

$rating = $_POST['star'];
$comment = $_POST['comment'];
$user_id = $_COOKIE["id"];
$book_id = $_GET['bookid'];

if(isset($rating, $comment)){
	$review = [
		'user_id' => $user_id,
		'book_id' => $book_id,
		'rating' => $rating,
		'message' => $comment,
	];
}else{
	header("Location: ../view/review.php");
	exit();
}

$newReview = Review::createReview($review);
$book_success = Book::updateBookRating($book_id);

if(empty($newReview)) {
	header("Location: ../view/review.php");
	exit();
} else {
	header("Location: ../view/history.php");
	exit();
}

?>