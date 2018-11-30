function order() {
    var total_order_element = document.getElementById("total-order");
    var token = document.getElementById("token").value;
    console.log("token: "+token);
    var sum_order = total_order_element.options[total_order_element.selectedIndex].value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/detail/order");
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhttp.onreadystatechange = function() {
        console.log(this.responseText);
        if (this.readyState == 4 && this.status == 200 && this.responseText != -1) {
            document.getElementById("text-msg-detail").innerHTML = "Pemesanan Berhasil!";
            document.getElementById("transaction-number").innerHTML = this.responseText;
            document.getElementById("notif").setAttribute("style", "display: flex");
            document.getElementById("check-notif").src = "/public/images/check.png";
        } else {
            document.getElementById("text-msg-detail").innerHTML = "Pemesanan Gagal!";
            document.getElementById("transaction-number").innerHTML = -1;
            document.getElementById("notif").setAttribute("style", "display: flex");
            document.getElementById("check-notif").src = "/public/images/close.png";

        }
    }
    xhttp.send(JSON.stringify({
        total : sum_order,
        token : token}));
}

function close_notif() {
    document.getElementById("notif").setAttribute("style", "display: none");
}