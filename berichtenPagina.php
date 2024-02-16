<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berichten</title>
    <!-- Voeg Font Awesome CSS toe voor de pictogrammen -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: TwitterChirp, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f5f8fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }

        .tweet {
            border: 1px solid #ccd6dd;
            border-radius: 10px;
            padding: 15px;
            background-color: #fff;
            margin-bottom: 15px;
        }

        .tweet .profile-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
            float: left;
        }

        .tweet .content {
            overflow: hidden;
        }

        .tweet .name {
            color: #536471;
            font-size: 16px;
            margin-bottom: 5px;
            font-family: TwitterChirp, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            text-overflow: unset;
        }

        .tweet .username {
            color: rgb(15, 20, 25);
            font-weight: bold;
            font-size: 14px;
            margin-right: 10px;
            margin-left: 6px;
            float: left;
            margin-top: 2px;
            /* Aangepast */
            font-family: TwitterChirp, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        .tweet .verified-icon {
            color: #1da1f2;
            font-size: 14px;
            margin-right: 2px;
            vertical-align: middle;
            margin-top: 2px;
            /* Aangepast */
            /* Aangepast */
        }

        .tweet .timestamp {
            color: #8899a6;
            font-size: 12px;
            margin-top: 5px;
            display: inline-block;
        }

        .tweet .text {
            margin-top: 5px;
        }

        .tweet .interaction {
            color: #5B6B78;
            font-size: 14px;
            margin-top: 10px;
        }

        .tweet .interaction i {
            margin-right: 10px;
            font-size: 16px;
        }

        .tweet .interaction span {
            margin-right: 20px;
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
            font-size: 26px;
            display: flex;
            align-items: center;
            border-radius: 50px;
            padding: 10px;
            transition: background-color 0.3s ease;
            border: 1px solid transparent;
        }

        .navigation a:hover {
            background-color: #ccc;
            color: #1D1D1D;
            border-color: #ccc;
        }


        .icon {
            margin-right: 5px;
        }
    </style>
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