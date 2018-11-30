<?php
class Detail extends Controller
{
    public function index($bookid)
    {
        if (!isset($_SESSION)) {
            session_start();            
        }

        if (isset($_COOKIE['access_token'])) {
            if ($this->model('Token')->validateToken($_COOKIE['access_token'])) {
                $access_valid = true;
            } else {
                $access_valid = false;
            }
        } else {
            $access_valid = false;
        }

        if (!$access_valid) {
            header('Location: /login');
            exit();
        }
        else {
            setcookie("bookid", $bookid, time() + 3600,'/');
            $book = $this->model('Book');
            $soap = $this->model('SoapHelper');
            $review = $this->model('Reviews');
            $data['book'] = $soap->getBookByID($bookid);
            $data['book']['avg_rating'] = $book->readRatingByBookId($bookid)['avg_rating'];
            $data['recommendation'] = array($soap->getRecommendation($data['book']['category']));
            if (strlen($data['recommendation'][0]['synopsis']) > 300) {
                $data['recommendation'][0]['synopsis'] = substr($data['recommendation'][0]['synopsis'], 0, 300);
                $data['recommendation'][0]['synopsis'] .= "...";
            }
            $data['review'] = $review->readAllReviewsByBookId($bookid);
            $data["navigation"] = "Browse";
            $this->view('detail', $data);
        }
    }

    public function order() {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_COOKIE['access_token'])) {
            $user_id = $this->model('Token')->validateToken($_COOKIE['access_token']);
            if ($user_id) {
                $access_valid = true;
            } else {
                $access_valid = false;
            }
        } else {
            $access_valid = false;
        }

        if (!$access_valid) {
            header('Location: /login');
            exit();
        }

        $model = $this->model('Order');
        $model_user = $this->model('User');
        $soap = $this->model('SoapHelper');
        $entityBody = json_decode(file_get_contents('php://input'), true);
        //TODO MASUKKIN KARTU NASABAH ID
        $user = $model_user->readUserById($user_id);
        $orderid = $soap->buyBook($_COOKIE['bookid'], $entityBody['total'], $user['no_kartu']);
        if ($orderid != -1) {
            $model->createOrder($_COOKIE['bookid'], $user_id, $orderid);
        }
        echo $orderid;

    }
}
