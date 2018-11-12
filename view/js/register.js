function validateField() {
	var username = document.getElementById("username").value;
	var name = document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;
	var confirmPassword = document.getElementById("confirm_password").value;
	var address = document.getElementById("address").value;
	var phoneNumber = document.getElementById("phone_number").value;

	return isUsernameValid(username) && isEmailValid(email) && isPhoneNumberValid(phoneNumber)
			&& isPasswordValid(password, confirmPassword) && name.length > 0 && address.length > 0;
}


function isPhoneNumberValid(phoneNumber) {
	var re =  /^\d+$/;

	return re.test(phoneNumber) && phoneNumber.length >= 9 && phoneNumber.length <= 12;
}

function validatePhoneNumber(){
	var phoneNumber = document.getElementById("phone_number").value;
	var phoneNumberField = document.getElementById("phone_number");

	if (isPhoneNumberValid(phoneNumber)) {
		phoneNumberField.style.background = "#41f471";
	} else {
		phoneNumberField.style.background = "#f44262";
	}

	if (phoneNumber.length === 0) {
		phoneNumberField.style.background = "FFFFFF";
	}
}

function isPasswordValid(password, confirmPassword) {
	return password === confirmPassword && password.length > 0;
}

function validatePassword(){
	var password = document.getElementById("password").value;
	var confirmPassword = document.getElementById("confirm_password").value;
	var confirmPasswordField = document.getElementById("confirm_password");

	if (isPasswordValid(password, confirmPassword)){
		confirmPasswordField.style.background = "#41f471";	
	} else{
		confirmPasswordField.style.background = "#f44262";
	}

	if(confirmPassword.length === 0 && password.length === 0){
		confirmPasswordField.style.background = "#FFFFFF";
	}
}

function isEmailValid(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	return re.test(email);
} 

function checkEmailExist(email, callback) {
	var body = {
		email : email
	};

	var requestBody = JSON.stringify(body);
	var xhttp = new XMLHttpRequest();

	xhttp.open("POST","/controller/check_email.php", true);
	xhttp.setRequestHeader("Content-type", "application/json");
	xhttp.send(requestBody);

	xhttp.onreadystatechange = function() {
		if (this.readyState === 4) {
			if (this.status === 200) {
				return callback(false);
			} else {
				return callback(true);
			}
		}
	}
}

 //reference for this regex: https://stackoverflow.com/questions/46155/how-to-validate-an-email-address-in-javascript
function validateEmail(){
	var email = document.getElementById("email").value;
	var emailField = document.getElementById("email");
	var validateImage = document.getElementById("validate-email");
	//TODO: bener -> cek DB
	if (isEmailValid(email)){
		checkEmailExist(email, function(exist) {
			if (!exist) {
				emailField.style.background = "#41f471";
				validateImage.style.display = "inline";
				validateImage.setAttribute("src", "asset/success.png")
			} else {
				emailField.style.background = "#f44262";
				validateImage.style.display = "inline";
				validateImage.setAttribute("src", "asset/failed.png")
			}
		});
	} else {
		emailField.style.background = "#f44262";
		validateImage.style.display = "inline";
		validateImage.setAttribute("src", "asset/failed.png")
	}

	if(email.length === 0){
		emailField.style.background = "#FFFFFF";
		validateImage.style.display = "none";
		validateImage.setAttribute("src", "asset/failed.png")
	}	
}

function isUsernameValid(username) {
	var re = /^[a-zA-Z0-9_]*$/;

	return re.test(username) && username.length !== 0 && username.length <= 20;
} 

function checkUsernameExist(username, callback) {
	var body = {
		username : username
	};

	var requestBody = JSON.stringify(body);
	var xhttp = new XMLHttpRequest();

	xhttp.open("POST","/controller/check_username.php", true);
	xhttp.setRequestHeader("Content-type", "application/json");
	xhttp.send(requestBody);

	xhttp.onreadystatechange = function() {
		if (this.readyState === 4) {
			if (this.status === 200) {
				return callback(false);
			} else {
				return callback(true);
			}
		}
	}
}

function validateUsername(){
	var username = document.getElementById("username").value;
	var usernameField = document.getElementById("username");
	var validateImage = document.getElementById("validate-username");

	if (isUsernameValid(username)) {
		checkUsernameExist(username, function(exist) {
			if (!exist) {
				usernameField.style.background = "#41f471";
				validateImage.style.display = "inline";
				validateImage.setAttribute("src", "asset/success.png")
			} else {
				usernameField.style.background = "#f44262";
				validateImage.style.display = "inline";
				validateImage.setAttribute("src", "asset/failed.png")
			}
		});
	} else {
		usernameField.style.background = "#f44262";
		validateImage.style.display = "inline";
		validateImage.setAttribute("src", "asset/failed.png")
	}

	if(username.length === 0){
		usernameField.style.background = "#FFFFFF";
		validateImage.style.display = "none";
		validateImage.setAttribute("src", "asset/failed.png")
	}	
}