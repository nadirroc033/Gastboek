<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Haal data op van index.php (voornaam, achernaam, bericht)
    $voornaam = $_POST['fname'];
    $achternaam = $_POST['lname'];
    $message = $_POST['comment'];
    
    // Krijg de huidige tijd en datum
    $currentDateTime = new DateTime();

    // Formatteer de huidige tijd en datum als een string
    $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');

    // stuk tekst in JSON format opgehaald. Bestaande json (lijst met berichten)
    $jsonData = file_get_contents("users.json");

    // omzetten in een associative array
    $data = json_decode($jsonData);

    // nieuwe informatie toevoegen
    $data[] = [
        'voornaam' => $voornaam,
        'achternaam' => $achternaam,
        'comment' => $message,
        'DateTime' => $formattedDateTime, // gebruik de geformatteerde huidige tijd en datum
    ];

    // zet de data weer om naar json
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    // sla de data op in users.json
    file_put_contents('users.json', $jsonData);

    echo "Message saved successfully!";
}
?>
