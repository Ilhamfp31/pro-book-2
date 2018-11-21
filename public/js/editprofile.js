function FileSelected()
{
    file = document.getElementById('ava').files[document.getElementById('ava').files.length - 1];
   	console.log(file.name);
    document.getElementById('filebox').textContent = file.name;
}

var name_valid = true;
var picture_valid = false;
var phone_valid = true;
var address_valid = true;

toggle_btn = function() {
	var btn = document.getElementById("save-button")
    if (name_valid && picture_valid && phone_valid  && address_valid) {
        btn.disabled = false;
        btn.classList.remove("disabled-save-button");
        btn.classList.add("save-button");
    }
    else {
        btn.classList.add("disabled-save-button");
        btn.classList.remove("save-button");
    }
}

document.getElementById("nameinput").addEventListener("input", function() {
    if (this.value.length ==  0 || this.value.length > 20) {
        name_valid = false;
    }
    else {
        name_valid = true;
    }
    toggle_btn();
});

document.getElementById("ava").addEventListener("input", function() {
    if (this.val == '') {
        picture_valid = true;
    }
    else {
        picture_valid = true;
    }
    toggle_btn();
})

document.getElementById("addressinput").addEventListener("input", function() {
    if (this.value.length == 0) {
        address_valid = false;
    }
    else {
        address_valid = true;
    }
    toggle_btn();
})
document.getElementById("phoneinput").addEventListener("input", function() {
    if (this.value.length == 0) {
        phone_valid = false;
    }
    else if ((/^[0-9]+$/).test(this.value) && this.value.length >= 9 && this.value.length <= 12) {
        phone_valid = true;
    }
    else {
        phone_valid = false;
    }
    toggle_btn();
})
