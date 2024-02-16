<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastenboek</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('achtergrond.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 120px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            animation: fadeIn 1s ease;
            background-image: linear-gradient(0deg, #788786, #ffffff);
        }

        .container:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .container:hover:before {
            opacity: 1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
            font-size: 36px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            animation: waterWave 1.5s infinite alternate;
        }

        @keyframes waterWave {
            0% {
                text-shadow: 0 0 10px #007bff;
            }

            100% {
                text-shadow: 0 0 10px #0056b3;
            }
        }

        p {
            text-align: center;
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
            overflow: hidden;
            white-space: nowrap;
            animation: typing 3s steps(40, end);
            font-family: cursive;
            font-weight: bold;
            margin-top: 10%;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        nav {
            text-align: center;
            margin-bottom: 20px;
        }

        nav a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #FAB713;
            color: #1D1D1D;
            border-radius: 5px;
            margin: 0 10px;
            transition: background-color 0.3s ease;
            font-family: cursive;
            font-weight: bold;
        }

        nav a:hover {
            background-color: #1D1D1D;
            color: #FAB713;
        }

        @import url("https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .content {
            position: relative;
        }

        .content h2 {
            color: #fff;
            font-size: 6em;
            position: absolute;
            transform: translate(-50%, -50%);
        }

        .content h2:nth-child(1) {
            color: transparent;
            -webkit-text-stroke: 2px #FAB713;
            margin-left: 50%;
            margin-top: -5%;
        }

        .content h2:nth-child(2) {
            color: #FAB713;
            animation: animate 4s ease-in-out infinite;
            margin-left: 50%;
            margin-top: -5%;
        }

        @keyframes animate {

            0%,
            100% {
                clip-path: polygon(0% 45%,
                        16% 44%,
                        33% 50%,
                        54% 60%,
                        70% 61%,
                        84% 59%,
                        100% 52%,
                        100% 100%,
                        0% 100%);
            }

            50% {
                clip-path: polygon(0% 60%,
                        15% 65%,
                        34% 66%,
                        51% 62%,
                        67% 50%,
                        84% 45%,
                        100% 46%,
                        100% 100%,
                        0% 100%);
            }
        }

        .wereldbol {
            width: 13%;
        }

        .interactie {
            width: 30%;
            margin-left: 20%;
        }

        .gastenboek {
            width: 26%;
            margin-left: 9%;
        }

        .logo {
            width: 33%;
            margin-left: 35%;
            margin-top: -29%;
        }
    </style>
</head>

<body>

    <div class="container">
        <section>
            <img class="logo" src="logo.png">

            <div class="content">

                <h2>Gastenboek</h2>
                <h2>Gastenboek</h2>
            </div>
        </section>
        <p>In ons gastenboek kun je jouw gedachten, ervaringen<br>en opmerkingen delen met anderen. Het is een
            <br>geweldige manier om feedback te geven,<br>herinneringen te delen en in contact te komen met<br>mensen
            van over de hele wereld.
        </p>

        <nav>
            <a href="index.php">Naar Gastenboek</a>
            <a href="berichtenPagina.php">Naar Berichten</a>
        </nav>
        <img class="wereldbol" src="wereldbol.png">
        <img class="interactie" src="Interactie.png">
        <img class="gastenboek" src="gastenboekpictogram.png">
    </div>

</body>

</html>