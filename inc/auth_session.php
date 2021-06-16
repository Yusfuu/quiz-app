<?php
session_start();

if (!empty($_POST['logout']) && $_POST['logout'] == true) {
    session_unset();
    session_destroy();
    exit("http://localhost/quizapp/login");
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: http://localhost/quizapp/login");
    exit;
} else {
    $id          = $_SESSION['id'];
    $email       = $_SESSION['email'];
    $fullname    = $_SESSION['fullname'];
    $username    = $_SESSION['username'];
    $avatar      = $_SESSION['avatar'];
    $description = $_SESSION['description'];
    $created_at  = $_SESSION['created_at'];
    $login       = $_SESSION['login'];
}
