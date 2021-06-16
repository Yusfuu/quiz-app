<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require('auth_session.php');
    require('config.php');

    function getScore()
    {
        global $link, $id;
        $result = mysqli_query($link, "SELECT score FROM `scores` WHERE `user_id` = $id");
        $row = mysqli_fetch_assoc($result);
        return $row['score'];
    }

    if (!empty($_POST['get_score'])) {
        $setScore = getScore();
        mysqli_close($link);
        exit($setScore . "," .  $id);
    }

    if (!empty($_POST['score'])) {
        if (is_numeric($_POST['score'])) {
            $score = $_POST['score'] + getScore();
            mysqli_query($link, "UPDATE `scores` SET `score` = '$score' WHERE `user_id` = $id");
            mysqli_close($link);
            exit($id);
        }
    }
}
