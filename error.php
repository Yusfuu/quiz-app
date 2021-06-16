<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <title>Whoops !!</title>
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(90deg, #48c6ef 0%, #6f86d6 100%);
    }

    h1 {
        font-size: 5.5rem;
        color: #2e2e2e;
        font-weight: 700;
        text-align: center;
        text-shadow: 0px 10px 10px rgba(0, 0, 0, 0.1);
        animation: header 0.9s ease-out;
    }

    @keyframes header {
        0% {
            opacity: 0;
            transform: translateY(-80px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    button {
        font-family: 'Roboto', sans-serif;
        border: 1px solid rgba(255, 255, 255, .5);
        color: #ffffff;
        letter-spacing: 0.03rem;
        display: block;
        margin: 0 auto;
        padding: .9rem 1.5rem;
        font-size: .9rem;
        background: transparent;
        cursor: pointer;
        transition: 0.3s ease-in;
        animation: btn 1s ease-in-out;
        margin-top: 200px;
    }

    button:hover {
        box-shadow: -8px 8px 18px rgba(0, 0, 0, 0.3);
        border-color: rgba(255, 255, 255, .8);
    }

    @keyframes btn {
        0% {
            display: none;
            opacity: 0;
            transform: translateY(80px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media screen and (max-width: 800px) {
        h1 {
            font-size: 3.2rem;

        }
    }
</style>

<body>

    <div>
        <h1 id="head">Whoops!<br>Something Went Wrong</h1>
        <button onclick="location.href = ''">BACK TO HOMEPAGE</button>
    </div>

</body>

</html>