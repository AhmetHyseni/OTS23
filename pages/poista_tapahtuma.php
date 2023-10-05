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

// Tarkistetaan, onko event_id mukana GET-parametrina
if (isset($_GET["id"])) {
    $event_id = $_GET["id"];

    // Suoritetaan SQL-kysely tapahtuman poistamiseksi
    $sql = "DELETE FROM events WHERE id = $event_id";

    if ($conn->query($sql) === TRUE) {
        echo "Tapahtuma poistettu onnistuneesti.";
    } else {
        echo "Virhe: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Tapahtuman tunnus puuttuu.";
}

// Suljetaan tietokantayhteys
$conn->close();
?>
