<?php
class History extends Controller
{
    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();            
        }
        
        if (isset($_COOKIE['access_token'])) {
            $id_user = $this->model('Token')->validateToken($_COOKIE['access_token']);
            if ($id_user) {
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
            $data['data'] = $this->model("Order")->readHistoryByUserId($id_user);
            if (count($data) > 0){
            	$data["navigation"] = "History";
                $this->view("history", $data);
            }else{
                echo "<script>window.location.href='/home'; alert('No Previous Transactions'); </script>";
            }
        }
    }
}
