<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../public/css/main.css" />
</head>
<body>
    <div class="container">
        <section id="flex-register-container">
            <div id="outer-register-box">
                <div id="register-box">
                    <h1>REGISTER</h1>
                    <form action="/register/submit" method="POST">
                        <div id="name">
                            <label for="name">Name</label>
                            <input type="text" name="name">
                            <img class="check-valid" src="/public/images/orange-check.png">
                            <img class="check-invalid" src="/public/images/orange-x.png">
                        </div>
                        <div id="username">
                            <label for="username">Username</label>
                            <input type="text" name="username">
                            <img class="check-valid" src="/public/images/orange-check.png">
                            <img class="check-invalid" src="/public/images/orange-x.png">
                        </div>
                        <div id="email">
                            <label for="email">Email</label>
                            <input type="text" name="email">
                            <img class="check-valid" src="/public/images/orange-check.png">
                            <img class="check-invalid" src="/public/images/orange-x.png">
                        </div>
                        <div id="password">
                            <label for="password">Password</label>
                            <input type="password" name="password"></div>
                        <div id="confirm-password">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" name="confirmPassword">
                            <img class="check-valid" src="/public/images/orange-check.png">
                            <img class="check-invalid" src="/public/images/orange-x.png">
                        </div>
                        <div id="address">
                            <label for="address">Address</label>
                            <textarea name="address" rows="3"></textarea>
                        </div>
                        <div id="phone">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone">
                            <img class="check-valid" src="/public/images/orange-check.png">
                            <img class="check-invalid" src="/public/images/orange-x.png">
                        </div>
                        <a href="/login">Already have an account?</a>
                        <button id="submit-btn" class="disabled-btn" type="submit" disabled>REGISTER</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="../../public/js/register.js"></script>
</body>
</html>