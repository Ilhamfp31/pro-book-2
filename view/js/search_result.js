function createBooks(books) {
	books.forEach(function(book) {
		createBookContainer(book);
	}); 
}

function createBookContainer(book) {
	var bookContainer = document.createElement("div");
	var bookImage = document.createElement("div");
	var bookDetail = document.createElement("div");
	var bookTitle = document.createElement("h1");
	var bookSubtitle = document.createElement("p");
	var bookSynopsis = document.createElement("p");
	var detailButton = document.createElement("button");

	bookContainer.classList.add("book-container");
	bookImage.classList.add("book-image");
	bookDetail.classList.add("book-detail");
	bookTitle.classList.add("book-title");
	bookSubtitle.classList.add("book-subtitle");
	bookSynopsis.classList.add("book-synopsis");
	detailButton.classList.add("detail-button");

	bookImage.style.background = 'url(\"' + book["pic"] + '\")';
	bookImage.style.backgroundSize = "cover";
	bookImage.style.backgroundPosition = "center";
	bookTitle.textContent = book["title"];
	bookSubtitle.textContent = book["author"] + ' - ' + parseFloat(book["avg_rating"]).toFixed(1) + '/5.0 (' + book['number_of_reviews'] + ' votes)';
	bookSynopsis.textContent = book["synopsis"];
	detailButton.textContent = "Detail";
	detailButton.setAttribute("data-bookid", book["id"]);
	detailButton.addEventListener("click", function() {
		window.location.href = "/view/detail.php?id=" + this.getAttribute("data-bookid");
	});

	bookContainer.appendChild(bookImage);
	bookContainer.appendChild(bookDetail);
	bookDetail.appendChild(bookTitle);
	bookDetail.appendChild(bookSubtitle);
	bookDetail.appendChild(bookSynopsis);
	bookDetail.appendChild(detailButton);

	document.getElementById("book-placeholder").appendChild(bookContainer);
}