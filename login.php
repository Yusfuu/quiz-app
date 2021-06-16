<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/jquery.js"></script>
    <script defer src="js/login.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>

    <div class="form">

        <div class="form-title">
            <h2>Sign in</h2>
            <p>or <a href="http://localhost/quizapp/register">create account</a></p>
        </div>

        <div class="input">
            <input autocomplete="off" placeholder="Email address" id="email" type="email">
            <p class="error"></p>
        </div>
        <div style="margin-bottom: 30px;" class="input">
            <input autocomplete="off" placeholder="Password" id="password" type="password">
            <img class="eye" src="img/eye.svg">
            <p class="error"></p>
        </div>
        <div class="checkbox">
            <input type="checkbox" id="remember" />
            <label for="remember">Remember me</label>
            <a class="fyp" href="#">Forgot your password?</a>
        </div>
        <input type="submit" id="submit" value="SIGN UP" />

        <div class="label">
            <span class="or">or with</span>
        </div>

        <div class="social-media">
            <button class="fb"><img src="img/fb.png"></button>
            <button class="google"><img src="img/google.png"></button>
        </div>
    </div>

</body>

</html>