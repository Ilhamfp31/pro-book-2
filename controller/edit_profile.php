<?php
	
require_once('../model/user.php');

function isPhoneNumberValid($phoneNumber) {
	return strlen($phoneNumber) >= 9 && strlen($phoneNumber) <= 12;
}

function isDataValid($id, $user_name, $address, $phone_num, $profile_pic) {
	if (isset($id) && isset($user_name) && isset($address) && isset($phone_num) && isset($profile_pic)) {
		if ($user_name != "" && $address != "" && $phone_num != "" && $profile_pic != "") {
			return isPhoneNumberValid($phone_num);
		} else {
			return FALSE;
		}
	} else {
		return FALSE;
	}
}

if (isDataValid($_COOKIE['id'], $_POST['user_name'], $_POST['address'], $_POST['phone_num'], $_POST['profile_pic'])) {
	// add id into input assoc
	$input = array(
		'id' => $_COOKIE['id'],
		'name' => $_POST['user_name'],
		'address' => $_POST['address'],
		'phone_num' => $_POST['phone_num'],
		'profile_pic' => $_POST['profile_pic']	
	);

	$target_dir = "../view/asset/upload/";
	$target_file = $target_dir . basename($_FILES["upload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	// echo json_encode($_FILES["upload"]);

	if (!empty($_FILES["upload"]["tmp_name"])) {
		if(isset($_FILES["upload"])) {
		    $check = getimagesize($_FILES["upload"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["upload"]["size"] > 500000) {
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
		        // echo "The file ". basename( $_FILES["upload"]["name"]). " has been uploaded.";
		    } else {
		        // echo "Sorry, there was an error uploading your file.";
		    }
		}

		$input['profile_pic'] = "/view/asset/upload/".$_FILES['upload']['name'];
	}

	$user = User::updateUser($input);
}

header("Location: ../view/profile.php");

?>