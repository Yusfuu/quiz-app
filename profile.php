<?php include('inc/auth_session.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="js/jquery.js"></script>
    <script defer src="js/profile.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <?php include('same/header.php') ?>
    <div class="container">
        <header class="header-profile"></header>
        <main>
            <div class="left">
                <div class="photo-left">
                    <img class="photo" src="storage/<?= $avatar ?>" />
                    <div class="modal">
                        <img class="modal-img">
                    </div>
                </div>
                <p class="fullname"><?= $fullname ?></p>
                <p class="info"><?= $email ?></p>
                <div class="stats">
                    <div class="stat" style="padding-right: 50px;">
                        <p class="number-stat">0</p>
                        <p class="desc-stat">scores</p>
                    </div>
                    <div class="stat" style="padding-left: 50px;">
                        <p class="number-stat avg">0%</p>
                        <p class="desc-stat">average</p>
                    </div>
                </div>

                <div class="bar">
                    <div class="progress"></div>
                </div>

                <p class="desc">
                    <?php if ($description == null) {
                        echo 'Your description';
                    } else {
                        echo $description;
                    } ?>
                </p>
            </div>

            <canvas id="myChart" height="125"></canvas>

            <table class="content-table">
                <caption>Leaderboard</caption>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require('inc/config.php');
                    $result = mysqli_query($link, "SELECT users.fullname, scores.score FROM  scores JOIN users WHERE users.id = scores.user_id ORDER BY scores.score DESC LIMIT 10;");
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $i . "</td><td>" . $row['fullname'] . "</td><td>" . $row['score'] . "</td></tr>";
                        $i++;
                    }

                    mysqli_close($link);
                    ?>
                </tbody>
            </table>
        </main>
    </div>

    <div class="sign">
        <p>Made with 💖 by Youssef Hajjari</p>
    </div>
</body>


</html>