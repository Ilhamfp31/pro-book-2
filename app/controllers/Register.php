<?php
class Register extends Controller
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
            $this->view("register", []);
        }
    }

    public function submit()
    {
        $user['name'] = $_POST['name'];
        $user['username'] = $_POST['username'];
        $user['email'] = $_POST['email'];
        $user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user['address'] = $_POST['address'];
        $user['phone'] = $_POST['phone'];
        $user['no_kartu'] = $_POST['bank-account'];


        $model = $this->model('User');
        if ($model->createUser($user)) {

            if (!isset($_SESSION)) {
                session_start();            
            }

            $id = $model->readUserIdByUsername($user['username'])['userID'];
            $token = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1).substr(md5(time()),1);

            setcookie('access_token', $token , time() + 1800, '/');
            $_SESSION['username'] = $user['username'];

            // Insert token to db
            $model_token = $this->model('Token');
            $temp_token = $model_token->insertToken($id, $token);
            header('Location: /home');
            exit();
        }
        else {
            echo "Internal Server Error";
            header('Location: /register');
            exit();
        }
    }

    public function username_availability($param)
    {
        $model = $this->model('User');
        $users = $model->readUserByUsername($param);
        $response['available'] = !$users;
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function email_availability($param)
    {
        $model = $this->model('User');
        $users = $model->readUserByEmail(base64_decode($param));
        $response['available'] = !$users;
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
