<?php
class Login extends Controller
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

        if ($access_valid) {
            header('Location: /home');
            exit();
        }
        else {
            $this->view("login", []);
        }
    }

    public function submit()
    {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        $model = $this->model('User');
        $temp = $model->readUserByUsername($username);

        if (count($temp) > 0){
            if (password_verify($password, $temp["password"]) or ($password==$temp['password'])){
                session_start();
                $id = $model->readUserIdByUsername($temp['username'])['userID'];
                setcookie('id', $id, time() + 1800, '/');
                $token = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1).substr(md5(time()),1);

                setcookie('access_token', $token , time() + 1800, '/');
                $_SESSION['username'] = $temp['username'];
                
                // Insert token to db
                $model_token = $this->model('Token');
                $temp_token = $model_token->insertToken($id, $token);

                
                header('Location: /home');
                exit();
            }else{
                echo "<script>window.location.href='/login'; alert('Wrong Password'); </script>";
            }
        }else{
            echo "<script>window.location.href='/login'; alert('Unknown Username'); </script>";
        }
    }
}
