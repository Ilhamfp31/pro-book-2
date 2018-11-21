<?php

class Profile extends Controller
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
        }
        else {
        	$_SESSION['expire_token'] = time() + 1200;
            $data = $this->model("User")->readUserById($_COOKIE['id']);
            $data["navigation"] = "Profile";
        	$this->view(profile,$data);
        }
    }

     public function edit()
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
        } else {
        	$_SESSION['expire_token'] = time() + 1200;
	        $data = $this->model("User")->readUserById($_COOKIE['id']);
	        $data["navigation"] = "Profile";
	        $this->view("editprofile", $data);
        }
    }

    public function save()
    {
    	session_start();

    	if (isset($_COOKIE['access_token'])) {
          $access_valid =  ($_COOKIE['access_token'] == $_SESSION['access_token']) && (time() < $_SESSION['expire_token']);
      } else {
          $access_valid = false;
      }

      	if ($access_valid){
	    	$_SESSION['expire_token'] = time() + 1200;
	    	$user['id'] = $_COOKIE['id'];
	        $user['name'] = $_POST['name'];
	        $user['address'] = $_POST['address'];
	        $user['phone'] = $_POST['phone'];
			$name = $_FILES["avatar"]["name"];
			$tmp_name = $_FILES["avatar"]["tmp_name"];
			$dest = 'public/images/profile/';

			if(move_uploaded_file($_FILES["avatar"]["tmp_name"],$dest.$user['id'])){
				$user['userPicture'] = '../../'.$dest.$user['id'];
			} else {
				$user['userPicture'] = NULL;
			}

	        $model = $this->model('User');
	        if ($model->updateUserById($user)) {
	        	$data = $model->readUserById($user['id']);
	            $data["navigation"] = "Profile";
	            $this->view('profile',$data);
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
