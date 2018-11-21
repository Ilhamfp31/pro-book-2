<?php
class History extends Controller
{
    public function index()
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

            $data['data'] = $this->model("Order")->readHistoryByUserId($_COOKIE['id']);
            if (count($data) > 0){
            	$data["navigation"] = "History";
                $this->view("history", $data);
            }else{
                echo "<script>window.location.href='/home'; alert('No Previous Transactions'); </script>";
            }
        }
    }
}
