const date = [];
const time = [];
$.ajax({
    method: 'POST',
    url: 'http://localhost/quizapp/inc/score',
    data: {
        get_score: true
    },
    success: function (data) {
        
        progress(data.split(',')[0]);
        let json = JSON.parse(localStorage.getItem(`dashboard-${data.split(',')[1]}`));
        if (json != null) {
            for (let i = 0; i < json.length; i++) {
                date.push(json[i].date);
                time.push(json[i].times);
            }
        }
        chartIt();
    }
});

function progress(data) {
    $('.number-stat').text(data);
    $('.avg').text(`${data / 10}%`);
    document.querySelector(".progress").animate([
        { width: '0px' },
        { width: `${data / 10}%` }
    ], {
        duration: 1400,
        easing: 'ease-out',
        fill: 'forwards'
    });
}

$('.photo').click(() => {
    $('.modal').fadeIn();
    $('.header').hide();
    $('.modal-img').attr('src', $('.photo').attr('src'));
});
$('.modal').click(() => {
    $('.modal').fadeOut();
    $('.header').show();
});

function chartIt() {

    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: date.length != 0 ? date : [1],
            datasets: [{
                fill: false,
                label: 'Dashboard',
                data: time.length != 0 ? time : [1],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });
}