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

// Käsitellään lomakkeen tiedot
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $address = $_POST["address"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];

    // Suoritetaan SQL-kysely uuden tapahtuman lisäämiseksi
    $sql = "INSERT INTO events (title, description, address, start_time, end_time)
            VALUES ('$title', '$description', '$address', '$start_time', '$end_time')";

    if ($conn->query($sql) === TRUE) {
        echo "Tapahtuma lisätty onnistuneesti.";
    } else {
        echo "Virhe: " . $sql . "<br>" . $conn->error;
    }
}

// Suljetaan tietokantayhteys
$conn->close();
?>
