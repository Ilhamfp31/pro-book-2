<?php
class Detail extends Controller
{
    public function index($bookid)
    {
        if (!isset($_SESSION)) {
            session_start();            
        }

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
        
        $_SESSION['expire_token'] = time()+1200;
        $model = $this->model('Order');
        $model_user = $this->model('User');
        $soap = $this->model('SoapHelper');
        $entityBody = json_decode(file_get_contents('php://input'), true);
        //TODO MASUKKIN KARTU NASABAH ID
        $user = $model_user->readUserById($_COOKIE['id']);
        $orderid = $soap->buyBook($_COOKIE['bookid'], $entityBody['total'], $user['no_kartu']);
        if ($orderid != -1) {
            $orderid = $model->createOrder($_COOKIE['bookid'], $_COOKIE['id'], $orderid);
        }
        echo $orderid;

    }
}
