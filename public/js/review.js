var comment_valid = false;
var rating_valid = false;

toggle_btn = function(){
    var btn = document.getElementById("save-button")
    if (comment_valid && rating_valid) {
        btn.disabled = false;
        btn.classList.remove("disabled-save-button");
        btn.classList.add("save-button");
    }
    else {
        btn.disabled = true;
        btn.classList.add("disabled-save-button");
        btn.classList.remove("save-button");
    }
}

document.getElementById("commentinput").addEventListener("input", function() {
    if (this.value.length == 0) {
        comment_valid = false;
    }
    else {
        comment_valid = true;
    }
    toggle_btn();
});

var filled_stars = document.getElementsByClassName("filled-star");
var unfilled_stars = document.getElementsByClassName("unfilled-star");

for (var i = 0; i < unfilled_stars.length; i++) {
  unfilled_stars[i].addEventListener("mouseover", function() {
    var num_star;
    if (this.classList.contains("star1")) {
      num_star = 0;
    }
    else if (this.classList.contains("star2")) {
      num_star = 1;
    }
    else if (this.classList.contains("star3")) {
      num_star = 2;
    }
    else if (this.classList.contains("star4")) {
      num_star = 3;
    }
    else if (this.classList.contains("star5")) {
      num_star = 4;
    }
    for (var j = 0; j <= num_star; j++) {
      unfilled_stars[j].setAttribute("style", "display: none");
      filled_stars[j].setAttribute("style", "display: inline-block");
    }
    document.getElementById("ratinginput").setAttribute("value", num_star+1);
    if (num_star > 0) {
      rating_valid = true;
    }
    else {
      rating_valid = false;
    }
  })
}

for (var i = 0; i < filled_stars.length; i++) {
  filled_stars[i].addEventListener("mouseover", function() {
    var num_star;
    if (this.classList.contains("star1")) {
      num_star = 0;
    }
    else if (this.classList.contains("star2")) {
      num_star = 1;
    }
    else if (this.classList.contains("star3")) {
      num_star = 2;
    }
    else if (this.classList.contains("star4")) {
      num_star = 3;
    }
    else if (this.classList.contains("star5")) {
      num_star = 4;
    }
    console.log("num star is", num_star);
    for (var j = filled_stars.length-1; j > num_star; j--) {
      filled_stars[j].setAttribute("style", "display: none");
      unfilled_stars[j].setAttribute("style", "display: inline-block");
    }
    document.getElementById("ratinginput").setAttribute("value", num_star+1);
    if (num_star > 0) {
      rating_valid = true;
    }
    else {
      rating_valid = false;
    }
  })
}
