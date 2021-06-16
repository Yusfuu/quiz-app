<?php include('inc/auth_session.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>setting</title>
    <link rel="stylesheet" href="css/setting.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="js/jquery.js"></script>
    <script defer src="js/setting.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <?php include('same/header.php') ?>

    <div class="container">
        <header class="header-profile">

        </header>
        <main>
            <div class="left">
                <div class="photo-left">
                    <div class="camera"><img src="https://img.icons8.com/fluent/42/000000/camera.png" /></div>
                    <img class="photo" src="storage/<?= $avatar ?>" />
                    <div class="modalM">
                        <img class="modal-img">
                    </div>
                </div>
                <div class="form-pic">
                    <a class="close">&times;</a>
                    <h3>My Photo</h3>
                    <form action="http://localhost/quizapp/inc/setting" method="POST" enctype="multipart/form-data">
                        <input class="file" name="file" type="file">
                        <button id="uploade" name="uploade">Upload</button>
                    </form>
                </div>
        </main>


        <section class="main-profile">
            <section>
                <h1>Login</h1>
                <div>
                    <span>Your e-mail:</span>
                    <input disabled value="<?= $email ?>" type="text">
                </div>
                <div>
                    <span>Your password:</span>
                    <input disabled value="***************" type="password">
                    <button class="button-password">change password</button>
                </div>
            </section>

            <section>
                <h1>user-information</h1>
                <div>
                    <span>Full Name</span>
                    <input class="fullname" value="<?= $fullname ?>" type="text">
                </div>
                <div style="margin-bottom: 0px;">
                    <span>Description</span>
                    <textarea class="desc" cols="38" rows="7"></textarea>
                </div>
                <button class="saveChange">Save change</button>
            </section>

        </section>


        <div class="delete">
            <span>Delete my account</span>
        </div>
    </div>
    <div id="alert"></div>
    <div class="flex">
        <div class="delete-overlay">
            <div class="modal">
                <a class="close">&times;</a>
                <div class="content">
                    <h2>Delete your Account ?</h2>
                    <p>This action is final and you will be unable to recover any data
                    </p>
                </div>
                <div class="buttons">
                    <a class="cancel" href="#0">Cancel</a>
                    <a class="accept" href="#0">Accept</a>
                </div>
            </div>
        </div>
    </div>

    <div class="flex2">
        <div class="password-overlay">
            <div class="modal">
                <a class="close">&times;</a>
                <div class="input">
                    <span>Current Password</span>
                    <input class="currentPassword" type="password">
                </div>
                <div class="input">
                    <span>New Password</span>
                    <input class="newPassword" type="password">
                </div>
                <div class="buttons">
                    <a class="cancel" href="#0">Cancel</a>
                    <a class="change" href="#0">Change</a>
                </div>
            </div>
        </div>
    </div>
</body>


</html>