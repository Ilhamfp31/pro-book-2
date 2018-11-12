function loadProfile(imageURL) {
	var profilePicture = document.getElementsByClassName("pic-border")[0];

	profilePicture.style.background = 'url(\"' + imageURL + '\")';
	profilePicture.style.backgroundSize = "cover";
	profilePicture.style.backgroundPosition = "center";
}