<?php
class Login extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_COOKIE['access_token'])) {
            $access_valid =  ($_COOKIE['access_token'] == $_SESSION['access_token']) && (time() < $_SESSION['expire_token']);
        } else {
            $access_valid = false;
        }

        if ($access_valid) {
            $_SESSION['expire_token'] = time() + 1200;
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
                setcookie('id', $model->readUserIdByUsername($temp['username'])['userID'], time() + 1800, '/');
                $token = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1).substr(md5(time()),1);

                setcookie('access_token', $token , time() + 1800, '/');
                $_SESSION['access_token'] = $token;
                $_SESSION['expire_token'] = time() + 1200;

                $_SESSION['username'] = $temp['username'];
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
