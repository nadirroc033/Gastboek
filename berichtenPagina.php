<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berichten</title>
    <!-- Voeg Font Awesome CSS toe voor de pictogrammen -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="berichtenpagina.css">
</head>

<body>
    <div class="navigation">
        <a href="frontpage.php"><i class="fas fa-home icon"></i> Home</a>
        <a href="index.php"><i class="fas fa-envelope icon"></i> Gastenboek</a>
    </div>

    <div class="container">
        <?php
        // Associatieve array voor profielfoto's op basis van namen
        $profilePictures = [
            "crypto" => "crypto.jpg",
            "nvdrr.a" => "nadir.jpeg",
            "ronaldo" => "ronaldo.jpg",
            "messi" => "messi.jpg",
            "elonmusk" => "elonmusk.jpg",
            "mobicep" => "mobicep.webp",
            "zorgvoorbalans" => "zorgvoorbalans.jpeg",
            "boef" => "boef.jpeg",
            "lijpe" => "Lijpe.jpg",
        ];

        // Controleer of het bestand bestaat
        $usersFile = "users.json";
        if (file_exists($usersFile)) {
            // Lees de inhoud van het bestand
            $usersData = file_get_contents($usersFile);
            // Decodeer de JSON-gegevens naar een associatieve array
            $users = json_decode($usersData, true);

            if ($users !== null) {
                // Loop door de gebruikers en toon de berichten
                foreach ($users as $user) {
                    $profileImg = 'profile.jpg'; // Standaard profielfoto
                    // Controleer of lname overeenkomt met een specifieke profielfoto
                    foreach ($profilePictures as $name => $picture) {
                        if (strpos(strtolower($user['lname']), $name) !== false) {
                            $profileImg = $picture;
                            break;
                        }
                    }

                    echo "<div class='tweet'>";
                    echo "<img src='$profileImg' class='profile-img' alt='Profile Image'>";
                    echo "<div class='content'>";
                    echo "<p class='name'><span style='color: #536471;'>@{$user['lname']}</span> <span class='username' style='margin-top: 2px;'>{$user['fname']} <i class='fas fa-check-circle verified-icon' style='margin-top: 2px;'></i></span><span class='timestamp'>" . getElapsedTime($user['datetime']) . "</span></p>"; // Aangepast
                    echo "<p class='text'>" . $user['comment'] . "</p>";
                    echo "<p class='interaction'>";
                    echo "<i class='fas fa-reply' style='color: #5B6B78;'></i><span>" . rand(0, 100) . "</span>";
                    echo "<i class='fas fa-retweet' style='color: #5B6B78;'></i><span>" . rand(0, 100) . "</span>";
                    echo "<i class='fas fa-heart' style='color: #5B6B78;'></i><span>" . rand(0, 1000) . "</span>";
                    echo "<i class='fas fa-eye' style='color: #5B6B78;'></i><span>" . rand(0, 10000) . "</span>";
                    echo "</p>"; // End .interaction
                    echo "</div>"; // End .content
                    echo "</div>"; // End .tweet
                }
            } else {
                echo "<p>Fout bij het decoderen van JSON-gegevens.</p>";
            }
        } else {
            echo "<p>Het bestand met gebruikersgegevens bestaat niet.</p>";
        }

        // Functie om de verstreken tijd te berekenen
        function getElapsedTime($datetime)
        {
            $now = new DateTime();
            $date = new DateTime($datetime);
            $interval = $now->diff($date);

            if ($interval->y > 0) {
                return $interval->format('%yy');
            } elseif ($interval->m > 0) {
                return $interval->format('%mm');
            } elseif ($interval->d > 0) {
                return $interval->format('%dd ');
            } elseif ($interval->h > 0) {
                return $interval->format('%hh');
            } elseif ($interval->i > 0) {
                return $interval->format('%im');
            } else {
                return 'Nu';
            }
        }
        ?>
    </div>
</body>

</html>