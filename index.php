<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastenboek</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
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
            /* Toegevoegd */
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

        .btn {
            background-color: #FAB713;
            color: #1D1D1D;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-family: cursive;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .comments {
            margin-top: 30px;
        }

        .comment {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        /* Popup melding */
        .popup-message {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #FAB713;
            color: #1D1D1D;
            padding: 10px 20px;
            border-radius: 5px;
            animation: slideIn 0.5s ease forwards;
            opacity: 0;
            z-index: 999;
        }

        @keyframes slideIn {
            from {
                bottom: -100px;
                opacity: 0;
            }

            to {
                bottom: 20px;
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Gastenboek</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="commentForm">
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

            <input type="submit" value="Plaats reactie" class="btn">
        </form>

        <hr>
    </div>

    <div class="popup-message" id="popupMessage">
        Het bericht is succesvol verzonden
    </div>

    <script>
        // JavaScript om de popup-melding weer te geven na het indienen van het formulier
        document.getElementById('commentForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Voorkom standaardformulierindiening
            var popupMessage = document.getElementById('popupMessage');
            popupMessage.style.opacity = '1';
            setTimeout(function () {
                popupMessage.style.opacity = '0';
            }, 4000); // 4 seconden (duur van de animatie)
        });
    </script>

</body>

</html>