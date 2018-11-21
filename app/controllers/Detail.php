<?php
class Detail extends Controller
{
    public function index($bookid)
    {
        session_start();

        if (isset($_COOKIE['access_token'])) {
            $access_valid =  ($_COOKIE['access_token'] == $_SESSION['access_token']) && (time() < $_SESSION['expire_token']);
        } else {
            $access_valid = false;
        }

        if (!$access_valid) {
            header('Location: /login');
            exit();
        }
        else {
            $_SESSION['expire_token'] = time() + 1200;

            setcookie("bookid", $bookid, time() + 3600,'/');
            $book = $this->model('Book');
            $data['book'] = $book->readBooksAndRatingByBookId($bookid);
            $review = $this->model('Reviews');
            $data['review'] = $review->readAllReviewsByBookId($bookid);
            $data["navigation"] = "Browse";
            $this->view('detail', $data);
        }
    }

    public function order() {
        session_start();
        $_SESSION['expire_token'] = time()+1200;
        $model = $this->model('Order');
        $entityBody = json_decode(file_get_contents('php://input'), true);
        $orderid = $model->createOrder($_COOKIE['bookid'], $entityBody['total'], $_COOKIE['id']);
        echo $orderid;

    }
}
