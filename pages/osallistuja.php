<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tietokannasta tiedot</title>
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
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white; /* Valkoinen tausta taulukolle */
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333; /* Tumma tausta otsikolle */
            color: white; /* Valkoinen teksti otsikolle */
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
    <h1>Tapahtuma ja Osallistuja ID</h1>

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

    // Suoritetaan SQL-kysely tietojen hakemiseksi (vaihtamalla sarakkeiden nimet)
    $sql = "SELECT event_id, participant_id FROM events_participants";
    $result = $conn->query($sql);

    // Tarkistetaan, onko tuloksia
    if ($result->num_rows > 0) {
        // Tulostetaan tiedot HTML-taulukkoon
        echo "<table>";
        echo "<tr><th>Tapahtuma ID</th><th>Osallistuja ID</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["event_id"]. "</td><td>" . $row["participant_id"]. "</td></tr>";
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
