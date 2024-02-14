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
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
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
    </style>
</head>

<body>

    <div class="container">
        <h1>Gastenboek</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $comment = $_POST['comment'];

            $datetime = date('d-m-Y H:i');

            $file = fopen("comment.html", "a");
            fwrite($file, "<div class='comment'>");
            fwrite($file, "<b>Voornaam:</b> $fname<br>");
            fwrite($file, "<b>Achternaam:</b> $lname<br>");
            fwrite($file, "<b>Datum en tijd:</b> $datetime<br>");
            fwrite($file, "<b>Reactie:</b> $comment<br>");
            fwrite($file, "</div><hr>");
            fclose($file);
        }
        ?>

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

            <input type="submit" value="Plaats reactie" class="btn">
        </form>

        <hr>

        <div class="comments">
            <?php require("comment.html"); ?>
        </div>
    </div>

</body>

</html>