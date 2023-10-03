<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tietokannasta tiedot</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        color: Black;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #333; /* Tumma teksti */
    }

    table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: white; /* Valkoinen tausta taulukolle */
    }

    table, th, td {
        border: 1px solid #333; /* Tummat reunukset */
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #cce6ff; /* Vaaleansininen tausta parillisille riveille */
    }

    tr:nth-child(odd) {
        background-color: #99ccff; /* Vaaleansininen tausta parittomille riveille */
    }
</style>

</head>
<body>
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

