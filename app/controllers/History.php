<?php
class History extends Controller
{
    public function index()
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
