$(function () {

    /*** Remove Saving & score overlay ***/
    $('.saving').hide();
    $('.score').hide();

    /*** CONSTANTS ***/
    const MAX_Q = 10;
    const CORRECT_Q = 1;
    const level = { easy: 'easy', medium: 'medium', hard: 'hard' }

    /*** proxy for access denied from localhost cross-origin ***/
    const proxy = "https://cors-anywhere.herokuapp.com/";

    /*** DOM ***/
    let choice = Array.from(document.querySelectorAll('.choice-text'));
    let ctx = document.getElementById('myChart').getContext('2d');
    for (let i = 0; i < MAX_Q; i++) {
        let li = document.createElement('li');
        document.querySelector('.progress-bar').appendChild(li);
    }
    let allLi = Array.from(document.querySelectorAll('ol li'));

    /***  VAR  ***/
    let questions = [];
    let score, current_question, correct_answer, incorrect_answer;
    let canComplet = true;
    let indexLi = 0;

    /*** function increment score ***/
    function increment(num) {
        score += num;
        return score;
    }

    /*** function decode entity of html string element  ***/
    function htmlToString(str) {
        return $("<textarea />").html(str).text();
    }

    /*** function return shuffled question[array] ***/
    function shuffle(array) {
        let randome = array.sort(() => {
            return .5 - Math.random();
        });
        return randome;
    }

    /*** function chart leaderboard ***/
    function chartIt() {
        let myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [`Correct : ${score}`, `incorrect : ${MAX_Q - score}`],
                datasets: [{
                    label: '# of Votes',
                    data: [score, MAX_Q - score],
                    backgroundColor: [
                        '#30e3ca',
                        '#ff1d58'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    }

    /*** function fetch api & return promise ***/
    async function lunchGame() {
        const response = await fetch(`https://opentdb.com/api.php?amount=${MAX_Q}&difficulty=${level.easy}&type=multiple`);
        const data = await response.json();
        try {
            for (let key of data.results) {
                questions.push({
                    question: key.question,
                    answers: [key.correct_answer, ...key.incorrect_answers, { correct: key.correct_answer }]
                });
            }
        } catch (error) {
            console.error(error);
        }
        startGame();
    }

    /*** function Strat Game ***/
    let startGame = () => {
        score = 0;
        nextQuestion();
    }

    /*** function go to next question ***/
    let nextQuestion = () => {

        if (questions.length == 0) {
            $('.saving').fadeIn(400, () => {
                $('header').hide();
                $('.container').hide();
            });
            $.ajax({
                method: 'POST',
                url: 'http://localhost/quizapp/inc/score',
                data: {
                    score: score
                },
                success: function (data) {
                    const obj = {
                        date: new Date().toLocaleDateString(),
                        times: 0
                    }
                    const total = JSON.parse(localStorage.getItem(`dashboard-${data}`)) || [obj];
                    if (total[total.length - 1].date != obj.date) total.push(obj);
                    total[total.length - 1].times += 1;
                    localStorage.setItem(`dashboard-${data}`, JSON.stringify(total));

                    $('.saving').fadeOut();
                    $('.score').fadeIn(400, () => {
                        chartIt();
                    });
                }
            });
            return;
        }

        questionIndex = Math.floor(Math.random() * questions.length);
        current_question = questions[questionIndex];
        correct_answer = current_question.answers.pop();
        incorrect_answer = shuffle(current_question.answers);

        //change html element question & choices
        document.getElementById('question').innerHTML = current_question.question;
        choice.forEach((ele, index) => {
            let n = choice[index].dataset['choice'] - 1;
            ele.innerHTML = incorrect_answer[n];
        });
        questions.splice(questionIndex, 1);
        canComplet = false;
    }

    choice.forEach((ele) => {
        if (!canComplet) return;
        canComplet = true;
        ele.addEventListener('click', event => {

            allLi[indexLi].classList.remove('is-active');
            allLi[indexLi].classList.add('is-complete');
            if (indexLi + 1 < MAX_Q) {
                allLi[indexLi + 1].classList.add('is-active');
                indexLi++;
            }

            choice.forEach(e => {
                e.setAttribute('style', 'pointer-events:none');
            });

            if (event.target.innerText == htmlToString(correct_answer.correct)) {
                ele.parentElement.style.backgroundColor = "#53a318";
                increment(CORRECT_Q);
            } else {
                ele.parentElement.style.backgroundColor = "#ff1d58";
                ele.parentElement.style.color = "#fff";
            }
            setTimeout(() => {
                nextQuestion();
                choice.forEach(e => {
                    e.removeAttribute('style');
                });
                ele.parentElement.removeAttribute('style');
            }, 700);
        });
    });

    /*** promise : launch game ***/
    lunchGame().then(() => {
        $(".loader").fadeOut();
        $(".preload").delay(400).fadeOut("slow");
    }).catch(error => console.error(error));

});
