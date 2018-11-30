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

    public function tokensignin()
    {
        header("Access-Control-Allow-Methods: POST");
        header("Content-Type: application/json; charset=UTF-8");
        $id_token = json_decode(file_get_contents("php://input"))->id_token;
        $payload = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=' . $id_token));

        $user_model = $this->model('User');
        if ($user = $user_model->readUserByEmail($payload->email)) {
            $token = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1).substr(md5(time()),1);
            setcookie('access_token', $token , time() + 1800, '/');
            $model_token = $this->model('Token');
            $temp_token = $model_token->insertToken($user['userID'], $token);

            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['username'] = $user['username'];
        }
        else {
            header("HTTP/1.1 404 Not Found");
        }      
    }
}
