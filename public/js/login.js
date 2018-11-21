var username_valid = false;
var pass_valid = false;

toggle_btn = function() {
    var btn = document.getElementById("submit-btn")
    if (username_valid && pass_valid ) {
        btn.disabled = false;
        btn.classList.remove("disabled-btn");
        btn.classList.add("register-btn");
    }
    else {
        btn.disabled = true;
        btn.classList.add("disabled-btn");
        btn.classList.remove("register-btn");
    }
}

document.querySelector("#username input").addEventListener("input", function() {
    if (this.value.length == 0) {
        username_valid = false;
    }
    else {
        username_valid = true;
    }
    toggle_btn();
});

document.querySelector("#password input").addEventListener("input", function() {
    if (this.value.length == 0) {
        pass_valid = false;
    }
    else {
        pass_valid = true;
    }
    toggle_btn();
})