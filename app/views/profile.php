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
	<div class="profile-header">
		<a id="edit-profile" href="/profile/edit"><img src="../../public/images/editprofile.png"></a>
		<img id="profile-image" src="<?php if(is_null($data['userPicture'])) { echo '../../public/images/profile/default.jpg'; } else { echo $data['userPicture']; }?>">
		<h1 id="profile-name"><?php echo $data['name']?></h1>
	</div>
	<div class="container">
		<h2> My Profile </h2>
		<div id ="profile-section">
			<div class ="profile-row">
				<div class ="profile-icon"><img src="../../public/images/user.png"></div>
				<div class ="profile-label">Username</div>
				<div class ="profile-value">
					<?php echo '@';
						echo $data['username'];?>	
				</div>
			</div>
			<div class ="profile-row">
				<div class ="profile-icon"><img src="../../public/images/mail.png"></div>
				<div class ="profile-label">Email</div>
				<div class ="profile-value"><?php echo $data['email']?></div>
			</div>
			<div class ="profile-row">
				<div class ="profile-icon"><img src="../../public/images/address.png"></div>
				<div class ="profile-label">Address</div>
				<div class ="profile-value"><?php echo $data['address']?></div>
			</div>
			<div class ="profile-row">
				<div class ="profile-icon"><img src="../../public/images/phone.png"></div>
				<div class ="profile-label">Phone number</div>
				<div class ="profile-value"><?php echo $data['phone']?></div>
			</div>
			<div class ="profile-row">
				<div class ="profile-icon"><img src="../../public/images/bank.png"></div>
				<div class ="profile-label">Bank account</div>
				<div class ="profile-value"><?php echo $data['no_kartu']?></div>
			</div>
		</div>
	</div>
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