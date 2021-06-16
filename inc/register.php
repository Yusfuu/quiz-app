<?php
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    !empty($_POST['email']) && !empty($_POST['fullname']) &&
    !empty($_POST['username']) && !empty($_POST['password'])
) {
    require('config.php');

    function escape($data)
    {
        global $link;
        $data = trim($data);
        $data = mysqli_real_escape_string($link, $data);
        return $data;
    }

    function is_existe($query)
    {
        global $link;
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1) {
            return true;
        } else {
            return false;
        }
    }

    $email       = escape($_POST['email']);
    $fullname    = escape($_POST['fullname']);
    $username    = escape($_POST['username']);

    if (is_existe("SELECT * FROM `users` WHERE email = '$email';")) {
        exit("0,This email address is already in use.");
    }

    if (is_existe("SELECT * FROM `users` WHERE username = '$username';")) {
        exit("2,This username isn't available. Please try another.");
    } else {
        $password  =  mysqli_real_escape_string($link, password_hash($_POST['password'], PASSWORD_DEFAULT));
        mysqli_query($link, "INSERT INTO `users` (`email`, `fullname`, `username`, `password`) VALUES ('$email', '$fullname', '$username', '$password');");
        $id = mysqli_insert_id($link);
        mysqli_query($link, "INSERT INTO `scores` (`user_id`) VALUES (" . $id . ");");
        mysqli_query($link, "INSERT INTO `account` (`user_id`) VALUES (" . $id . ");");
        mysqli_close($link);
        exit("http://localhost/quizapp/login");
    }
} else {
    header('Location: http://localhost/quizapp/error');
}
