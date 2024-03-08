<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn2"])) {
    // Controleer of het formulier is ingediend en op "btn2" is geklikt

    // Controleer of de vereiste velden zijn ingevuld
    if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["comment"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $comment = $_POST["comment"];

        date_default_timezone_set('Europe/Amsterdam'); // Stel de tijdzone in op Amsterdam
        $datetime = date("d-m-Y H:i"); // Krijg de huidige datum en tijd

        // Maak een associatieve array met de ingevoerde gegevens
        $data = array(
            'fname' => $fname,
            'lname' => $lname,
            'comment' => $comment,
            'datetime' => $datetime,
            'likes' => 0,
            'views' => 0
        );

        // Lees de bestaande gegevens uit het JSON-bestand
        $json_file = 'users.json';
        $current_data = file_get_contents($json_file);
        $array_data = json_decode($current_data, true);

        // Voeg de nieuwe gegevens toe aan de bestaande gegevens
        $array_data[] = $data;

        // Converteer de gegevens terug naar JSON-formaat
        $final_data = json_encode($array_data, JSON_PRETTY_PRINT);

        // Schrijf de gegevens terug naar het JSON-bestand
        file_put_contents($json_file, $final_data);

        // Geef het succesbericht weer
        echo "<div class='success-message' id='successMessage'>Het bericht is succesvol verzonden</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastenboek</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <!-- Voeg FontAwesome CSS toe voor de pictogrammen -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        
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

            <input type="submit" value="Plaats reactie" name="btn1" class="btn2">
            <input type="hidden" name="btn2" value="1">
        </form>

        <hr>
    </div>

    <script>
        // JavaScript om de melding na een bepaalde tijd te laten verdwijnen
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            setTimeout(function () {
                successMessage.style.opacity = '0';
            }, 4000); // 4 seconden (dezelfde duur als de animatie)
        }
    </script>

</body>

</html>