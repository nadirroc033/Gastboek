<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Haal data op van index.php (voornaam, achternaam, bericht)
    $voornaam = $_POST['fname'];
    $achternaam = $_POST['lname'];
    $message = $_POST['comment'];

    // Krijg de huidige tijd en datum
    $currentDateTime = new DateTime();

    // Formatteer de huidige tijd en datum als een string
    $formattedDateTime = $currentDateTime->format('d-m-Y H:i');

    // stuk tekst in JSON format opgehaald. Bestaande json (lijst met berichten)
    $jsonData = file_get_contents("users.json");

    // omzetten in een associative array
    $data = json_decode($jsonData, true);

    // nieuwe informatie toevoegen
    $data[] = [
        'fname' => $voornaam,
        'lname' => $achternaam,
        'comment' => $message,
        'datetime' => $formattedDateTime, // gebruik de geformatteerde huidige tijd en datum
        'likes' => 0,
        'views' => 0
    ];

    // zet de data weer om naar json
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    // sla de data op in users.json
    file_put_contents('users.json', $jsonData);

    // Terugkeren naar de indexpagina of een andere pagina indien gewenst
    header("Location: index.php");
    exit(); // Zorg ervoor dat er geen code wordt uitgevoerd na de redirect
}
?>