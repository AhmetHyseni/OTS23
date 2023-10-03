<?php
// Yhdistetään tietokantaan
$servername = "localhost";
$username = "root"; // Korvaa omalla käyttäjänimelläsi
$password = ""; // Korvaa omalla salasanallasi
$dbname = "events_manager";

$conn = new mysqli($servername, $username, $password, $dbname);

// Tarkistetaan yhteys
if ($conn->connect_error) {
    die("Yhteys epäonnistui: " . $conn->connect_error);
}

// Haetaan tapahtumat tietokannasta
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Muodostetaan tapahtumatiedot JSON-muodossa
$tapahtumat = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tapahtumat[] = $row;
    }
}

// Suljetaan tietokantayhteys
$conn->close();

// Tulostetaan tapahtumat JSON-muodossa
echo json_encode($tapahtumat);
?>
