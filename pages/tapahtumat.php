<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Tapahtumat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: white; /* Valkoinen teksti */
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: black;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid white;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333; /* Tumma tausta otsikolle */
        }

        tr:nth-child(even) {
            background-color: #666; /* Tumma tausta parillisille riveille */
        }

        tr:nth-child(odd) {
            background-color: #444; /* Tumma tausta parittomille riveille */
        }
    </style>
</head>
<body>

<div class="navigointi">
        <div class="navigointilinkki">
            <a href="asetukset.html">Asetukset</a>
        </div>
        <div class="navigointilinkki">
            <a href="kayttajat.html">Käyttäjät</a>
        </div>
        <div class="navigointilinkki">
            <a href="osallistujat.html">Osallistujat</a>
        </div>
        <div class="navigointilinkki">
            <a href="tapahtumat.html">Tapahtumat</a>
        </div>

        <div class="navigointilinkki">
            <img src="logo.png" alt="Logo">
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
        echo "<table>";
        echo "<tr><th>Otsikko</th><th>Kuvaus</th><th>Osoite</th><th>Aloitus-aika</th><th>Lopetus-aika</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["title"]. "</td><td>" . $row["description"]. "</td><td>" . $row["address"]. "</td><td>" . $row["start_time"]. "</td><td>" . $row["end_time"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Ei tuloksia";
    }

    // Suljetaan tietokantayhteys
    $conn->close();
    ?>

</body>
</html>
