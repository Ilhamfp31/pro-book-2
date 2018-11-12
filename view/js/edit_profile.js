function loadUserData(response) {
	// get html element
	var profilePicture = document.getElementById("profile-pic");
	var name = document.getElementById("name");
	var address = document.getElementById("address");
	var phoneNumber = document.getElementById("phone_number");
	var username = document.getElementById("user");
	var profileField = document.getElementById("input-update");

	username.textContent = 'Hi, ' + response["username"];
	name.value = response["name"];
	address.value = response["address"];
	phoneNumber.value = response["phone_num"];
	profileField.value = response["profile_pic"];
	profilePicture.style.background = 'url(\"' + response["profile_pic"] + '\")';
	profilePicture.style.backgroundSize = "cover";
	profilePicture.style.backgroundPosition = "center";
}

function isPhoneNumberValid(phoneNumber) {
	return phoneNumber.length >= 9 && phoneNumber.length <= 12;
}

function isFieldValid() {
	var phoneNumber = document.getElementById("phone_number").value;
	var name = document.getElementById("name").value;
	var address = document.getElementById("address").value;
	var profileField = document.getElementById("input-update").value;

	return isPhoneNumberValid(phoneNumber) && address.length > 0 && name.length > 0 && profileField.length > 0;
}

function validatePhoneNumber(){
	var phoneNumber = document.getElementById("phone_number").value;
	var phoneNumberField = document.getElementById("phone_number");

	if (isPhoneNumberValid(phoneNumber)) {
		phoneNumberField.style.background = "#FFFFFF";
	} else {
		phoneNumberField.style.background = "#f44262";
	}

	if (phoneNumber.length === 0) {
		phoneNumberField.style.background = "FFFFFF";
	}
}