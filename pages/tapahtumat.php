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
        /* CSS lomakkeelle */
.event-form {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff; /* White background for form */
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
}

.event-form h2 {
    font-size: 24px;
    color: #333; /* Dark text color */
    margin-bottom: 15px;
}

.event-form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.event-form input[type="text"],
.event-form textarea,
.event-form input[type="datetime-local"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.event-form input[type="submit"] {
    background-color: #007bff; /* Blue button background color */
    color: #fff; /* White text color */
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
}

.event-form input[type="submit"]:hover {
    background-color: #0056b3; /* Darker blue color on hover */
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
            <a href="osallistujat.php">Osallistujat</a>
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
    $password = ""; // Your database password    
    $dbname = "database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Tarkistetaan yhteys
    if ($conn->connect_error) {
        die("Yhteys epäonnistui: " . $conn->connect_error);
    }

    // Suoritetaan SQL-kysely tietojen hakemiseksi
    $sql = "SELECT id, title, description, address, start_time, end_time FROM events";
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
            echo "<div class='event-item'>
            <a href='poista_tapahtuma.php?id=" . $row["id"] . "'>Poista</a>
            </div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "Ei tuloksia";
    }

    // Suljetaan tietokantayhteys
    $conn->close();
    ?>

<div class="event-form">
    <h2>Lisää uusi tapahtuma</h2>
    <form method="post" action="/OTS23/model/addevent.php">
        <label for="title">Tapahtuman nimi:</label>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Kuvaus:</label>
        <textarea id="description" name="description" required></textarea><br>
        <label for="address">Osoite:</label>
        <input type="text" id="address" name="address" required><br>
        <label for="start_time">Aloitus-aika:</label>
        <input type="datetime-local" id="start_time" name="start_time" required><br>
        <label for="end_time">Lopetus-aika:</label>
        <input type="datetime-local" id="end_time" name="end_time" required><br>
        <input type="submit" value="Lisää tapahtuma">
    </form>
</div>



</body>
</html>
