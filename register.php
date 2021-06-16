<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <script defer src="js/jquery.js"></script>
    <script defer src="js/register.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <title>Register</title>
</head>

<body>

    <div class="form">
        <div class="form-title">
            <h2>Create account</h2>
            <p>or <a href="http://localhost/quizapp/login">sign in</a></p>
        </div>
        <div class="input">
            <input autofocus autocomplete="off" placeholder="Email address" id="email" type="email">
            <p class="error"></p>
        </div>
        <div class="input">
            <input autocomplete="off" placeholder="Full Name" id="fullname" type="text">
            <p class="error"></p>
        </div>
        <div class="input">
            <input autocomplete="off" placeholder="Username" id="username" type="text">
            <p class="error"></p>
        </div>
        <div style="margin-bottom: 30px;" class="input">
            <input maxlength="30" autocomplete="off" placeholder="Password" id="password" type="password">
            <img class="eye" src="img/eye.svg">
            <p class="error"></p>
        </div>
        <div class="agree-term">
            <input id="agree" type="checkbox">
            <label for="agree">I agree all statements in <a href="#">Terms of service</a></label>
        </div>
        <input type="submit" id="submit" value="SIGN UP" />
        <style>

        </style>

        <div class="label">
            <span class="or">or sign up with</span>
        </div>

        <div class="social-media">
            <button class="fb"><img src="img/fb.png" alt=""></button>
            <button class="google"><img src="img/google.png" alt=""></button>
        </div>
    </div>


</body>

</html>