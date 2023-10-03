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
    <h1>Osallistujalista</h1>

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

    // Suoritetaan SQL-kysely tietojen hakemiseksi (muuttaen sarakkeet first_name, last_name ja emailiksi)
    $sql = "SELECT first_name, last_name, email FROM participants";
    $result = $conn->query($sql);

    // Tarkistetaan, onko tuloksia
    if ($result->num_rows > 0) {
        // Tulostetaan tiedot HTML-taulukkoon
        echo "<table>";
        echo "<tr><th>Etunimi</th><th>Sukunimi</th><th>Sähköposti</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"]. "</td><td>" . $row["email"]. "</td></tr>";
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
