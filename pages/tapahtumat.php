<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Tapahtumalista</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f7ff; /* Light blue background */
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .event-list {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff; /* White background for events */
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }
        .event-item {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .event-title {
            font-weight: bold;
            font-size: 30px;
            color: #333; /* Dark text color */
        }
        .event-date {
            color: #555;
        }
    </style>
</head>
<body>

<div class="navigointi">
        <div class="navigointilinkki">
            <a href="asetukset.html">Asetukset</a>
        </div>
        <div class="navigointilinkki">
            <a href="käyttäjät.html">Käyttäjät</a>
        </div>
        <div class="navigointilinkki">
            <a href="osallistujat.html">Osallistujat</a>
        </div>
        <div class="navigointilinkki">
            <a href="tapahtumat.php">Tapahtumat</a>
        </div>

    </div>

    <h1>Tapahtumalista</h1>

    <?php
    // Yhdistetään tietokantaan (korvaa tiedot omilla tiedoillasi)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "events_manager";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Tarkistetaan yhteys
    if ($conn->connect_error) {
        die("Yhteys epäonnistui: " . $conn->connect_error);
    }

    // Suoritetaan SQL-kysely tietojen hakemiseksi
    $sql = "SELECT title, description, address, start_time, end_time FROM events";
    $result = $conn->query($sql);

    // Tarkistetaan, onko tuloksia
    if ($result->num_rows > 0) {
        // Tulostetaan tiedot HTML-taulukkoon
        echo "<div class='event-list'>";
        while($row = $result->fetch_assoc()) {
            echo "<div class='event-item'>";
            echo "<p class='event-title'>" . $row["title"] . "</p>";
            echo "<p>" . $row["description"] . "</p>";
            echo "<p>Osoite: " . $row["address"] . "</p>";
            echo "<p class='event-date'>Aloitus-aika: " . $row["start_time"] . "</p>";
            echo "<p class='event-date'>Lopetus-aika: " . $row["end_time"] . "</p>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "Ei tuloksia";
    }

    // Suljetaan tietokantayhteys
    $conn->close();
    ?>

</body>
</html>
