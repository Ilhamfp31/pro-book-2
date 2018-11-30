<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-signin-client_id" content="1039450104464-p0bpievqv6nfcbhrcvbl2vrdkg7jgnnk.apps.googleusercontent.com">
	<link rel="stylesheet" type="text/css" media="screen" href="/public/css/main.css" />
</head>
<body>
	<?php require_once('navbar.php') ?>
	<div id="edit-profile-container" class="container">
		<h1 id="edit-profile-header"class="page-header">Edit Profile</h1>
		<div id ="edit-profile-section">
			<form action="/Profile/save" method="POST" id="edit-profile-form"  enctype="multipart/form-data">
				<div class ="edit-profile-row">
					<img id="edit-profile-image" src="<?php if(is_null($data['userPicture'])) { echo '../../public/images/profile/default.jpg'; } else { echo $data['userPicture']; }?>">
					<div class="edit-profile-label">
						<label for="avatar"> Update Profile Picture </label>
						<div id="image-input">
							<div id="filebox"></div>
							<input type="button" id="browse-button" onclick="document.getElementById('ava').click()" value="Browse ..." />
							<input id = "avaHidden" class ="edit-profile-input" type="text" name="avaHidden" value="<?php if(is_null($data['userPicture'])) { echo '../../public/images/profile/default.jpg'; } else { echo $data['userPicture']; }?>" hidden>
							<input type="file" id="ava" name="avatar" onchange="FileSelected()" accept="image/*">
						</div>
					</div>
				</div>
				<div class ="edit-profile-row">
					<label class = "edit-profile-label" for="name"> Name </label>
					<input id = "nameinput" class ="edit-profile-input" type="text" name="name" value="<?php echo $data['name']?>">
				</div>
				<div class ="edit-profile-row">
					<label id = "addresslabel" class = "edit-profile-label" for="address"> Address </label>
					<textarea id = "addressinput" class ="edit-profile-input" form="edit-profile-form" name="address"><?php echo $data['address']?></textarea>
				</div>
				<div class ="edit-profile-row">
					<label class = "edit-profile-label" for="phone"> Phone Number </label>
					<input id = "phoneinput" class ="edit-profile-input" type="text" name="phone" value="<?php echo $data['phone']?>" >
				</div>
				<div class ="edit-profile-row">
					<label class = "edit-profile-label" for="bank-account"> Bank Account </label>
					<input id = "bankinput" class ="edit-profile-input" type="text" name="bank-account" value="<?php echo $data['no_kartu']?>" >
				</div>
				<div class ="edit-profile-row" id = "edit-profile-button-row">
					<!-- <button onclick="location.href='/Profile'" id="cancel-button" type="button">Back</button> -->
					<a href="/Profile" id = "cancel-button">Back</a>
					<!-- <button id="save-button" type="button">Save</button> -->
					<input type="submit" value="Save" id="save-button" class="save-button">
				</div>
			</form>
		</div>
	</div>
	<script src="../../public/js/editprofile.js"></script>
	<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script>
        function onLoad() {
            gapi.load('auth2', function() {
            gapi.auth2.init();
            });
        }        
        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                console.log('User signed out.');
            });
        }
    </script>
</body>
</html>
