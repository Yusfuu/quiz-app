const email = document.getElementById('email');
const fullname = document.getElementById('fullname');
const username = document.getElementById('username');
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

    // validate email 
    if (!/^[\w\.]+@[a-zA-Z]{3,7}\.[a-zA-Z]{2,4}$/.test(email.value)) {
        putError(0, "Sorry, Enter a valid email address.");
        flag = false;
    } else {
        message[0].style.display = 'none';
    }

    // validate fullname
    if (!/^[a-zA-Z ]+$/.test(fullname.value)) {
        putError(1, "Sorry, Full name invalid.");
        flag = false;
    } else {
        message[1].style.display = 'none';
    }

    // validate username
    if (username.value.trim() === '') {
        putError(2, "Username can not be empty.");
        flag = false;
    } else {
        message[2].style.display = 'none';
    }

    // validate password
    if (!/^[\w\.\_]+$/.test(password.value)) {
        putError(3, 'Sorry, password must have (a-z-0-9) or periods');
        flag = false;
    } else {
        message[3].style.display = 'none';
    }

    // chack if all inputs is valid
    if (flag) {
        // send AJAX request 'POST' handling all data to server
        $.ajax({
            method: 'POST',
            url: 'http://localhost/quizapp/inc/register',
            data: {
                email: email.value,
                fullname: fullname.value,
                username: username.value,
                password: password.value,
            },
            beforeSend: function () {
            },
            // request send! wait response from server 
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


