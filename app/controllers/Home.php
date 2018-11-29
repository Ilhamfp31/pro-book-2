<?php

class Home extends Controller
{
    public function index()
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

            $data = $this->model("User")->readUserById($_COOKIE['id']);
            $data["navigation"] = "Browse";
            $this->view('home' ,$data);
        }
    }

    public function search()
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
            $data["navigation"] = "Browse";
            $this->view("result", $data);
        }
    }

    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();            
        }
        session_destroy();
        $temp = $this->model("Token")->deleteToken($_COOKIE['access_token']);
        setcookie("id", "", time() - 3600,'/');
        setcookie("access_token","",time()-3600,'/');
        header("location: /login");
        exit();
    }

    public function searchbook($keyword)
    {
        $data = $this->model("Book")->readBooksByKeyword($keyword);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
