function processOrder() {
    var user_id = getCookie("id");

    if (!user_id) {
        window.location.href = "/view/login.php";
    }

    var book_id = getUrlParam('id', null);
    if (!book_id) {
        //Param nya ga bener
    }

    var quantity = document.getElementById('order-quantity').value;
    var body = {
        'book_id' : book_id,
        'quantity' : quantity
    };

    var requestBody = JSON.stringify(body);
    var xhttp = new XMLHttpRequest();
    
    xhttp.open("POST", "/controller/create_order.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(requestBody);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                triggerNotification(JSON.parse(this.responseText)["id"]);
            } else {
                alert("NOT OK");
            }
        }
    }
}

function triggerNotification(id) {
    document.getElementById('notif-no').textContent = 'Nomor Transaksi : ' + id;
    document.getElementById('notification-background').style.display = "block";
}

function closeNotification() {
    document.getElementById('notification-background').style.display = "none";
}

function changeRating(avgRating) {
    var bookRating = document.getElementById("book-ratings-num");

    bookRating.textContent = avgRating.toFixed(1) + '/5.0';

    for (var i = 1; i <= 5; i++) {
        var star = document.getElementById("star-" + i);
        if (avgRating >= i) {
            star.src = 'asset/full_star.png';
        }
        else if ((avgRating + 0.5) >= i) {
            star.src = 'asset/half_star.png';
        }  
        else {
            star.src = 'asset/empty_star.png';
        }
    }
}

function getUrlParam(parameter, defaultvalue) {
    var urlparameter = defaultvalue;
    if(window.location.href.indexOf(parameter) > -1){
        urlparameter = getUrlVars()[parameter];
        }
    return urlparameter;
}

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}