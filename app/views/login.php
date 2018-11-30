<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="1039450104464-p0bpievqv6nfcbhrcvbl2vrdkg7jgnnk.apps.googleusercontent.com">
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
                        <div class="register-google-login">
                            <button id="submit-btn" class="disabled-btn" type="submit" disabled>LOGIN</button>
                            <div class="g-signin2" data-onsuccess="onSignIn">Google</div>
                        </div>
                        <p><a href="/register">Don't have an account? register
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="../../public/js/login.js"></script>
</body>
</html>