<?php 
session_start();
 if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: http://localhost/quizapp/login");
    exit;
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/game.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script defer src="js/game.js"></script>
</head>

<body>

    <header>
        <h1>Quiz-App</h1>
        <p>PLAY A GAME AND WIN</p>
    </header>

    <!-- overlay page -->
    <div class="saving">
        <div style="--i:1;"></div>
        <div style="--i:2;"></div>
        <div style="--i:3;"></div>
    </div>
    <div class="preload">
        <div class="loader"></div>
    </div>
    <div class="score">
        <canvas id="myChart" width="200" height="60"></canvas>
        <div class="go">
            <a href="http://localhost/quizapp/game"><img src="https://img.icons8.com/ios-filled/64/000000/synchronize.png"/>Retry</a>
        <a href="http://localhost/quizapp/profile">go to profile<img width="50" height="50" src="https://img.icons8.com/small/64/000000/gender-neutral-user.png"/></a>
        </div>
    </div>


    <div class="container">
        <section>
            <h2 class="pbq">QUESTION</h2>
            <ol class="progress-bar">
            </ol>
        </section>
        <h1 id="question"></h1>
        <div class="choice">
            <p class="choice-text" data-choice="1"></p>
        </div>
        <div class="choice">
            <p class="choice-text" data-choice="2"></p>
        </div>
        <div class="choice">
            <p class="choice-text" data-choice="3"></p>
        </div>
        <div class="choice">
            <p class="choice-text" data-choice="4"></p>
        </div>
    </div>

    <!-- Made with 💖 by Youssef Hajjari -->

</body>

</html>