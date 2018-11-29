function order() {
    var total_order_element = document.getElementById("total-order");
    var sum_order = total_order_element.options[total_order_element.selectedIndex].value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/detail/order");
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhttp.onreadystatechange = function() {
        console.log(this.responseText);
        if (this.readyState == 4 && this.status == 200 && this.responseText != -1) {
            document.getElementById("transaction-number").innerHTML = this.responseText;
            document.getElementById("notif").setAttribute("style", "display: flex");
        }
    }
    xhttp.send(JSON.stringify({total : sum_order}));
}

function close_notif() {
    document.getElementById("notif").setAttribute("style", "display: none");
}