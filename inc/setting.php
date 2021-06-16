<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('config.php');
    require('auth_session.php');

    if (!empty($_POST['currentPassword']) && !empty($_POST['newPassword'])) {
        $currentPassword = mysqli_real_escape_string($link, $_POST['currentPassword']);
        $newPassword = mysqli_real_escape_string($link, $_POST['newPassword']);
        $result = mysqli_query($link, "SELECT password FROM `users` WHERE id = '$id';");
        $row = mysqli_fetch_assoc($result);
        if (password_verify($currentPassword, $row['password'])) {
            $password = password_hash($newPassword, PASSWORD_DEFAULT);
            mysqli_query($link, "UPDATE users SET password = '$password' WHERE users.id = $id");
            mysqli_close($link);
            exit('updated');
        } else {
            exit('Current Password is Incorrect');
        }
    }

    //update user inforamtion
    if (!empty($_POST['fullname']) || !empty($_POST['desc'])) {
        $fullname = mysqli_real_escape_string($link, $_POST['fullname']);
        $desc = mysqli_real_escape_string($link, $_POST['desc']);
        if (!empty(trim($desc))) {
            $desc = trim($desc);
            $desc = htmlspecialchars($desc);
            $desc = stripslashes($desc);
            mysqli_query($link, "UPDATE account SET description = '$desc' WHERE account.user_id = $id");
        }
        if ($fullname != 'not') {
            mysqli_query($link, "UPDATE users SET fullname = '$fullname' WHERE users.id = $id");
            $_SESSION['fullname'] = $fullname;
        }
        $_SESSION['description'] = $desc;
        mysqli_close($link);
        exit('ok');
    }

    //Delete Account
    if (!empty($_POST['delete']) && $_POST['delete'] == true) {
        if ($avatar != "default") {
            unlink("../storage/" . $avatar);
        }
        mysqli_query($link, "DELETE FROM users WHERE id = $id;");
        mysqli_close($link);
        session_unset();
        session_destroy();
        exit('http://localhost/quizapp/home');
    }

    if (isset($_POST['uploade'])) {

        $fileName = explode(".", $_FILES['file']['name']);
        $extension = strtolower(end($fileName));

        if ($avatar != "default") {
            unlink("../storage/" . $avatar);
        }
        $file = uniqid($id, true) . "." .  $extension;
        $avatar = "../storage/" . $file;
        move_uploaded_file($_FILES["file"]["tmp_name"], $avatar);
        mysqli_query($link, "UPDATE account SET avatar = '$file' WHERE user_id = '$id'");
        $_SESSION['avatar'] = $file;
        header("Location: http://localhost/quizapp/setting");
    }
}
