<?php

class Home extends Controller
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
