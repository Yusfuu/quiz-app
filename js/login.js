const email = document.getElementById('email');
const password = document.getElementById('password');
const submit = document.getElementById('submit');
let message = document.querySelectorAll('.error');

function putError(node, txt) {
    message[node].style.display = 'initial';
    message[node].innerHTML = txt;
}

$('.eye').click(() => {
    let type = $('#password').attr("type");
    if (type == 'password') {
        $('#password').attr("type", "text");
        $('.eye').attr('src', 'img/eye_off.svg');
    } else {
        $('#password').attr("type", "password");
        $('.eye').attr('src', 'img/eye.svg');
    }
});

submit.addEventListener('click', () => {
    let flag = true;

    if (!/^[\w\.]+@[a-zA-Z]{3,7}\.[a-zA-Z]{2,4}$/.test(email.value)) {
        putError(0, "Sorry, Enter a valid email address.");
        flag = false;
    } else {
        message[0].style.display = 'none';
    }

    

    if (password.value.trim() === '') {
        putError(1, 'Enter a password');
        flag = false;
    } else {
        message[1].style.display = 'none';
    }

    if (flag) {

        $.ajax({
            method: 'POST',
            url: 'http://localhost/quizapp/inc/login',
            data: {
                email: email.value,
                password: password.value
            },
            success: function (data) {
                if (data.startsWith('http')) {
                    location.href = data;
                } else {
                    let sp = data.split(',');
                    putError(sp[0], sp[1]);
                }
            },
            error: function () {
                location.href = 'http://localhost/quizapp/error';
            }
        });
    }
});


