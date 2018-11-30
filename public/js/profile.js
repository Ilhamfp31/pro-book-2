// console.log("No kartu: " + document.getElementById("no-kartu").value);
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var response = JSON.parse(this.responseText);
        document.getElementById("qr-img").src = response.values
    }
}
xhttp.open("POST", "http://localhost:3000/qrcode", true);
xhttp.setRequestHeader("Content-type", "application/json");
xhttp.send(JSON.stringify({ "no_kartu": document.getElementById("no-kartu").value }));
