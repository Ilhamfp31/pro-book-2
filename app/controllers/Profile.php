<?php

class Profile extends Controller
{
    public function index()
    {	
    	if (isset($_COOKIE['access_token'])) {
            $user_id = $this->model('Token')->validateToken($_COOKIE['access_token']);
            if ($user_id) {
                $access_valid = true;
            } else {
                $access_valid = false;
            }
        } else {
            $access_valid = false;
        }

    	if (!$access_valid) {
            header('Location: /login');
        }
        else {
            $data = $this->model("User")->readUserById($user_id);
            $data["navigation"] = "Profile";
        	$this->view("profile",$data);
        }
    }

     public function edit()
    {
        $id_user = $this->model('Token')->validateToken($_COOKIE['access_token']);
		if (isset($_COOKIE['access_token'])) {
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
        } else {
	        $data = $this->model("User")->readUserById($id_user);
	        $data["navigation"] = "Profile";
	        $this->view("editprofile", $data);
        }
    }

    public function save()
    {
    	session_start();

        if (isset($_COOKIE['access_token'])) {
            $user_id = $this->model('Token')->validateToken($_COOKIE['access_token']);
            if ($user_id) {
                $access_valid = true;
            } else {
                $access_valid = false;
            }
        } else {
            $access_valid = false;
        }

      	if ($access_valid){
	    	$user['id'] = $user_id;
	        $user['name'] = $_POST['name'];
	        $user['address'] = $_POST['address'];
	        $user['phone'] = $_POST['phone'];
            $user['no_kartu'] = $_POST['bank-account'];
			$name = $_FILES["avatar"]["name"];
			$tmp_name = $_FILES["avatar"]["tmp_name"];
			$dest = 'public/images/profile/';

			if(move_uploaded_file($_FILES["avatar"]["tmp_name"],$dest.$user['id'])){
				$user['userPicture'] = '../../'.$dest.$user['id'];
			} else {
                $user['userPicture'] = $_POST['avaHidden'];
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
