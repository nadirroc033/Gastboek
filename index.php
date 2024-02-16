<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastenboek</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- Voeg FontAwesome CSS toe voor de pictogrammen -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

        /* Bijgewerkte CSS voor de knoppen */
        .btn {
            background-color: transparent;
            color: #1D1D1D;
            padding: 10px 20px;
            border: 1px solid transparent;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            font-family: cursive;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #ccc;
            border-color: #ccc;
        }

        .btn2 {
            background-color: rgb(29, 155, 240);
            color: white;
            padding: 10px 20px;
            border: 1px solid transparent;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            font-family: TwitterChirp, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .btn2:hover {
            background-color: #1d86f0;
            border-color: #1d86f0;
        }

        .navigation {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .navigation a {
            margin-right: 10px;
            text-decoration: none;
            color: #1D1D1D;
            font-weight: bold;
            font-size: 16px;
            display: inline-block;
            border-radius: 4px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .navigation a:hover {
            background-color: #ccc;
            border-radius: 50px;
        }

        .navigation a .icon {
            margin-right: 5px;
        }

        /* Aangepaste stijl voor het succesbericht */
        .success-message {
            text-align: center;
            color: #FAB713;
            position: absolute;
            bottom: 20px;
            /* Van onder naar boven */
            right: 20px;
            /* Van rechts naar links */
            opacity: 0;
            animation: showNotification 4s ease forwards;
            z-index: 999;
        }

        /* Aangepaste animatie */
        @keyframes showNotification {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }

            10% {
                transform: translateX(0);
                opacity: 1;
            }

            90% {
                transform: translateX(0);
                opacity: 1;
            }

            100% {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="navigation">
            <a href="frontpage.php" class="btn"><i class="fas fa-home icon"></i> Home</a>
            <a href="berichtenPagina.php" class="btn"><i class="fas fa-envelope icon"></i> Berichten</a>
        </div>
        <h1>Gastenboek</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="fname">Voornaam:</label>
                <input type="text" id="fname" name="fname" required>
            </div>

            <div class="form-group">
                <label for="lname">Achternaam:</label>
                <input type="text" id="lname" name="lname" required>
            </div>

            <div class="form-group">
                <label for="comment">Reactie:</label>
                <textarea name="comment" id="comment" rows="4" required></textarea>
            </div>

            <input type="submit" value="Plaats reactie" class="btn2">
        </form>

        <!-- Het succesbericht tonen -->
        <div class="success-message" id="successMessage">
            Het bericht is succesvol verzonden
        </div>

        <hr>
    </div>

    <script>
        // JavaScript om de melding na een bepaalde tijd te laten verdwijnen
        document.querySelector('form').addEventListener('submit', function (event) {
            var successMessage = document.getElementById('successMessage');
            setTimeout(function () {
                successMessage.style.opacity = '1';
            }, 0); // Start direct na het indienen van het formulier
            setTimeout(function () {
                successMessage.style.opacity = '0';
            }, 4000); // 4 seconden (dezelfde duur als de animatie)
        });
    </script>

</body>

</html>