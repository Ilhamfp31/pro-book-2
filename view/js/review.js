var star = document.querySelectorAll(".img-star");

function loadBookData(bookPic){
	var bookPicture = document.querySelector(".book-pic");
	bookPicture.style.background = 'url(\"' + bookPic + '\")';
	bookPicture.style.backgroundSize = "cover";
	bookPicture.style.backgroundPosition = "center";
}

// NOTE : STAR INDEX VARIABEL KEBALIK (PALING KIRI KE KANAN : 4 3 2 1 0)
function setStar(idx){
	var star = document.querySelectorAll(".img-star");
	for (var i=4; i>=idx; i--){
		star[i].setAttribute("src","asset/full_star.png");
	}
	for (var i=0; i<=idx-1;i++){
		star[i].setAttribute("src","asset/empty_star.png");
	}
	
	document.getElementById("input-star").value = 5-idx;
}

function validateField(){
	var dataStar = document.getElementById("input-star").value;
	var reviewComment = document.getElementById("user-comment").value;

	return dataStar != 0 && reviewComment.length > 0;
}

