$('.camera img, .form-pic .close').click(() => {
    $('.form-pic').fadeToggle(300);
});

$('.delete span').click(() => {
    $('.flex').fadeIn(300);
});
$('.modal .close, .buttons .cancel').click(() => {
    $('.flex, .flex2').fadeOut(300);
});

$('.button-password').click(() => {
    $('.flex2').fadeIn(300);
});

let url = 'http://localhost/quizapp/inc/setting';

$('.change').click(() => {
    let currentPassword = $('.currentPassword').val();
    let newPassword = $('.newPassword').val();
    if (!/^[\w\.\_]+$/.test(currentPassword) || !/^[\w\.\_]+$/.test(newPassword)) {
        alertOverlay('Sorry, password invalid');
        return;
    } else {
        $.ajax({
            method: 'POST',
            url: url,
            data: {
                currentPassword: currentPassword,
                newPassword: newPassword,
            },
            success: function (data) {
                if (data == 'updated') {
                    alertOverlay('Password update Succesfuly');
                    $('.flex, .flex2').fadeOut(300);
                } else {
                    alertOverlay(data);
                }
            },
            error: function () {
                location.href = 'http://localhost/quizapp/error';
            }
        });
    }

});

/***********Delete Account**************/
$('.accept').click(() => {
    $.ajax({
        method: 'POST',
        url: url,
        data: {
            delete: true
        },
        success: function (data) {
            location.href = data;
        },
        error: function () {
            location.href = 'http://localhost/quizapp/error';
        }
    });
});
/***********Delete Account**************/

/***********Update information**************/
let currentName = $('.fullname').val();

$('.saveChange').click(() => {
    let desc = $('.desc').val();
    let fullname = $('.fullname').val();

    if (!/^[a-zA-Z ]+$/.test(fullname)) {
        alertOverlay('invalid Name');
        return;
    } else {
        $.ajax({
            method: 'POST',
            url: url,
            data: {
                fullname: fullname == currentName ? 'not' : fullname,
                desc: desc
            },
            success: function (data) {
                if (data == 'ok') {
                    $('.desc').val('');
                    $('.sidenav .name').text(fullname);
                    alertOverlay('Update Succesfuly');
                }
            },
            error: function () {
                location.href = 'http://localhost/quizapp/error';
            }
        });
    }

});
/***********Update information**************/

document.querySelector(".file").addEventListener('change', (e) => {
    let file = e.target.files[0];
    if (file.name.length > 0) {
        if (file.type === "image/png" || file.type === "image/jpeg" || file.type === "image/svg") {
            if (file.size >= 100000) {
                alertOverlay('Sorry, your image is too large.');
            } else {
                document.querySelector(".file").style.display = 'none';
                document.querySelector('#uploade').style.display = 'initial';
            }
        } else {
            alertOverlay("Sorry, only JPG, PNG & SVG files are allowed.");
        }
    }
});


function alertOverlay(txt) {
    $('#alert').fadeIn();
    $('#alert').text(txt);
    setTimeout(() => {
        $('#alert').fadeOut(400, function () {
            $('#alert').text('');
        });
    }, 6000);
}


$('.photo').click(() => {
    $('.modalM').fadeIn();
    $('.header').hide();
    $('.modal-img').attr('src', $('.photo').attr('src'));
});
$('.modalM').click(() => {
    $('.modalM').fadeOut();
    $('.header').show();
});
