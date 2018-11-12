function validateField() {
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;

	return username.length > 0 && password.length > 0;
}