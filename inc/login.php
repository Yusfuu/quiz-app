<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {

    session_start();
    require('config.php');

    $email       = mysqli_real_escape_string($link, trim($_POST['email']));
    $password    = mysqli_real_escape_string($link, $_POST['password']);

    $result = mysqli_query($link, "SELECT * FROM `users` WHERE email = '$email';");

    if (mysqli_num_rows($result) == 0) {
        exit("0,The email address you entered doesn't belong to any account.");
    } else {
        $rowuser = mysqli_fetch_assoc($result);
        if (!password_verify($password, $rowuser['password'])) {
            exit('1,Sorry your password was incorrect. Please double-check your password.');
        } else {
            $result  = mysqli_query($link, "SELECT * FROM `account` WHERE user_id = " . $rowuser['id'] . ";");
            $rowaccount = mysqli_fetch_assoc($result);
            unset($rowuser['password']);
            unset($rowaccount['user_id']);
            $_SESSION['id']          = $rowuser['id'];
            $_SESSION['email']       = $rowuser['email'];
            $_SESSION['fullname']    = $rowuser['fullname'];
            $_SESSION['username']    = $rowuser['username'];
            $_SESSION['avatar']      = $rowaccount['avatar'];
            $_SESSION['description'] = $rowaccount['description'];
            $_SESSION['created_at']  = $rowaccount['created_at'];
            $_SESSION['login'] = true;
            mysqli_close($link);
            exit('http://localhost/quizapp/profile');
        }
    }
} else {
    header('Location: http://localhost/quizapp/error');
}
