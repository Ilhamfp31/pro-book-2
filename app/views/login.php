<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../public/css/main.css" />
</head>
<body>
    <div class="container">
        <section id="flex-register-container">
            <div id="outer-register-box">
                <div id="register-box">
                    <h1>LOGIN</h1>
                    <form action="/login/submit" method="POST">
                        <div id="username">
                            <label for="username">Username</label>
                            <input type="text" name="username">
                        </div>
                        <div id="password">
                            <label for="password">Password</label>
                            <input type="password" name="password">
                        </div>
                        <a href="/register">Don't have an account?</a>
                        <button id="submit-btn" class="disabled-btn" type="submit" disabled>LOGIN</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="../../public/js/login.js"></script>
</body>
</html>