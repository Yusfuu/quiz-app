<style>
    .header div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .header div a {
        margin-right: 30px;
        color: #ffffff;
        background-color: #8cc9f0;
        border-radius: 3px;
        cursor: pointer;
        font-weight: 300;
        padding: 0.2em 1.5em;
        text-align: center;
    }
</style>
<header class="header">
    <a class="logo" href="#">Quiz app</a>
    <div>
        <a class="go-game" href="http://localhost/quizapp/game">Play</a>
        <img class="pic" src="storage/<?= $avatar ?>">
    </div>
</header>
<div class="sidenav">
    <ul>
        <li class="name"><?= $fullname ?></li>
        <li><a href="http://localhost/quizapp/setting">Settings</a></li>
        <li><a href="http://localhost/quizapp/profile">Profile</a></li>
        <li><a href="#">Messages</a></li>
        <li><a class="logout">Log out</a></li>
        <li class="dm"><span>Dark mode</span><input type="checkbox" class="checkbox"></li>
    </ul>
</div>

<script>
    $(document).ready(function() {
        $('.pic').click(function() {
            $(".sidenav").fadeToggle(270);
        });
        $('.container').click(function() {
            $(".sidenav").fadeOut(270);
        });


        $('.logout').click(function() {
            $.ajax({
                method: 'POST',
                url: 'http://localhost/quizapp/inc/auth_session',
                data: {
                    logout: true
                },
                success: function(data) {
                    location.href = data;
                }
            });
        })
    });

    document.querySelector('.checkbox').addEventListener('change', (e) => {

        let text = ['a', 'p', 'li', 'h1', 'span', 'caption'];

        function colorText(ele, color) {
            for (let index = 0; index < ele.length; index++) {
                document.querySelectorAll(ele).forEach(element => {
                    element.style.color = color;
                });
            }
        }

        function backgroundcolorItem(element, color) {
            ele = document.querySelector(element);
            if (ele != null) {
                ele.style.backgroundColor = color;
            }
        }

        if (e.target.checked) {

            localStorage.setItem('darkMode', 'true');

            colorText(text, 'rgba(255,255,255,0.8)');

            backgroundcolorItem('body', '#191c20');
            backgroundcolorItem('.header', '#111417');

            backgroundcolorItem('main', '#25282c');
            backgroundcolorItem('.container', '#25282c');
            backgroundcolorItem('.sidenav', '#111417');
            backgroundcolorItem('.delete', '#191c20');

            document.querySelectorAll('tbody tr').forEach(tr => {
                tr.style.backgroundColor = '#32323d';
                tr.style.color = 'rgba(255,255,255,0.8)';
            });

        } else {

            localStorage.setItem('darkMode', 'false');

            colorText(text, '#1a1a1a');

            backgroundcolorItem('body', '#efefef');
            backgroundcolorItem('.header', '#ffffff');

            backgroundcolorItem('main', '#ffffff');
            backgroundcolorItem('.container', '#ffffff');
            backgroundcolorItem('.sidenav', '#ffffff');
            backgroundcolorItem('.delete', '#efefef');
            document.querySelectorAll('tbody tr').forEach(tr => {
                tr.style.backgroundColor = '#f3f3f3';
                tr.style.color = '#1a1a1a';
            });
        }

    });
</script>