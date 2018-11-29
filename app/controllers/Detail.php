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
            $soap = $this->model('SoapHelper');
            $data['book'] = $soap->getBookByID($bookid);
            $review = $this->model('Reviews');
            $data['review'] = $review->readAllReviewsByBookId($bookid);
            $data["navigation"] = "Browse";
            $this->view('detail', $data);
        }
    }

    public function order() {
        if (!isset($_SESSION)) {
            session_start();
        }
        $model = $this->model('Order');
        $entityBody = json_decode(file_get_contents('php://input'), true);
        $orderid = $model->createOrder($_COOKIE['bookid'], $entityBody['total'], $_COOKIE['id']);
        echo $orderid;

    }
}
