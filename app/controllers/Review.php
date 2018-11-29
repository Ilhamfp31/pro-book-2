<?php
class Review extends Controller
{
    public function index($orderid)
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

            setcookie("orderid", $orderid, time() + 3600, '/');
            $order = $this->model('Order');
            $data = $order->readReviewByOrderID($orderid);
            $_SESSION['orderID']=$orderid;
            $data["navigation"] = "History";
            $this->view('review', $data);
        }
    }

    public function submit()
    {
        if (!isset($_SESSION)) {
            session_start();            
        }

        if (isset($_COOKIE['access_token'])) {
            $access_valid =  ($_COOKIE['access_token'] == $_SESSION['access_token']) && (time() < $_SESSION['expire_token']);
        } else {
            $access_valid = false;
        }

       if($access_valid){ 
            $review['orderID'] = $_SESSION['orderID'];
            $review['comment'] = $_POST['comment'];
            $review['rating'] = $_POST['rating'];
            
            $model = $this->model('Reviews');

            if ($model->createReview($review)) {
            	header('Location: /history');
                $data["navigation"] = "History";
                $this->view('history',$data);
            }
            else {
                echo "Internal Server Error";
                header('Location: /home');
                exit();
            }
        } else {
            header('Location: /login');
            exit();
        }
    }
}
