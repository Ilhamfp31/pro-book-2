var valid_check = document.getElementsByClassName("check-valid");
var invalid_check = document.getElementsByClassName("check-invalid");

var name_valid = false;
var username_valid = false;
var email_valid = false;
var phone_valid = false;
var pass_valid = false;
var confirm_pass_valid = false;
var address_valid = false;
var bank_account_valid = false;

toggle_btn = function() {
    var btn = document.getElementById("submit-btn")
    if (name_valid && username_valid && email_valid && phone_valid && pass_valid && confirm_pass_valid && address_valid && bank_account_valid) {
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

document.querySelector("#name input").addEventListener("input", function() {
    if (this.value.length == 0) {
        valid_check[0].setAttribute("style", "display : none");
        invalid_check[0].setAttribute("style", "display: none");
        name_valid = false;
    }
    else if (this.value.length <= 20) {
        valid_check[0].setAttribute("style", "display : inline-block");
        invalid_check[0].setAttribute("style", "display: none");
        name_valid = true;
    }
    else {
        valid_check[0].setAttribute("style", "display : none");
        invalid_check[0].setAttribute("style", "display: inline-block");
        name_valid = false;
    }
    toggle_btn();
});

var username_field = document.querySelector("#username input");
username_field.addEventListener("input", function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if (username_field.value.length == 0) {
                valid_check[1].setAttribute("style", "display : none");
                invalid_check[1].setAttribute("style", "display: none");
                username_valid = false;
            }
            else if (!response.available) {
                valid_check[1].setAttribute("style", "display : none");
                invalid_check[1].setAttribute("style", "display: inline-block");
                username_valid = false;
            }
            else {
                valid_check[1].setAttribute("style", "display : inline-block");
                invalid_check[1].setAttribute("style", "display: none");
                username_valid = true;
            }
            toggle_btn();
        }
    }
    xhttp.open('GET', '/register/username_availability/' + this.value);
    xhttp.send();

});

var emailRe = /\w+@[a-z]+\.[a-z]+/;
var email_field = document.querySelector("#email input");
email_field.addEventListener("input", function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if (email_field.value.length == 0) {
                valid_check[2].setAttribute("style", "display : none");
                invalid_check[2].setAttribute("style", "display: none");
                email_valid = false;
            }
            else if (emailRe.test(email_field.value) && response.available) {
                valid_check[2].setAttribute("style", "display : inline-block");
                invalid_check[2].setAttribute("style", "display: none");
                email_valid = true;
            }
            else {
                valid_check[2].setAttribute("style", "display : none");
                invalid_check[2].setAttribute("style", "display: inline-block");
                email_valid = false;
            }
            toggle_btn();
        }
    }
    xhttp.open('GET', '/register/email_availability/' + btoa(this.value));
    xhttp.send();
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

document.querySelector("#confirm-password input").addEventListener("input", function() {
    if (this.value.length == 0) {
        valid_check[3].setAttribute("style", "display : none");
        invalid_check[3].setAttribute("style", "display: none");
        confirm_pass_valid = false;
    }
    else if (this.value == document.querySelector("#password input").value) {
        valid_check[3].setAttribute("style", "display : inline-block");
        invalid_check[3].setAttribute("style", "display: none");
        confirm_pass_valid = true;
    }
    else {
        valid_check[3].setAttribute("style", "display : none");
        invalid_check[3].setAttribute("style", "display: inline-block");
        confirm_pass_valid = false;
    }
    toggle_btn();
})


document.querySelector("#address textarea").addEventListener("input", function() {
    if (this.value.length == 0) {
        address_valid = false;
    }
    else {
        address_valid = true;
    }
    toggle_btn();
})

document.querySelector("#phone input").addEventListener("input", function() {
    if (this.value.length == 0) {
        valid_check[4].setAttribute("style", "display : none");
        invalid_check[4].setAttribute("style", "display: none");
        phone_valid = false;
    }
    else if ((/^[0-9]+$/).test(this.value) && this.value.length >= 9 && this.value.length <= 12) {
        valid_check[4].setAttribute("style", "display : inline-block");
        invalid_check[4].setAttribute("style", "display: none");
        phone_valid = true;
    }
    else {
        valid_check[4].setAttribute("style", "display : none");
        invalid_check[4].setAttribute("style", "display: inline-block");
        phone_valid = false;
    }
    toggle_btn();
})

var bank_account_field = document.querySelector("#bank-account input");
bank_account_field.addEventListener("input", function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if (bank_account_field.value.length == 0) {
                valid_check[5].setAttribute("style", "display : none");
                invalid_check[5].setAttribute("style", "display: none");
                bank_account_valid = false;
            }
            else if ((/^[0-9]+$/).test(bank_account_field.value) && bank_account_field.value.length == 16 && response.values == 1) {
                valid_check[5].setAttribute("style", "display : inline-block");
                invalid_check[5].setAttribute("style", "display: none");
                bank_account_valid = true;
            } 
            else {
                valid_check[5].setAttribute("style", "display : none");
                invalid_check[5].setAttribute("style", "display: inline-block");
                bank_account_valid = false;
            }
            toggle_btn();
        }
    }
    xhttp.open("POST", "http://localhost:3000/validasi", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify({ "no_kartu": this.value }));
})

