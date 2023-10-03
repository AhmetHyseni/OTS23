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

// Näytetään tapahtumat
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["title"] . "</strong><br>";
        echo "Kuvaus: " . $row["description"] . "<br>";
        echo "Osoite: " . $row["address"] . "<br>";
        echo "Alkaa: " . $row["start_time"] . "<br>";
        echo "Päättyy: " . $row["end_time"] . "</p>";
    }
} else {
    echo "Ei tapahtumia";
}

// Suljetaan tietokantayhteys
$conn->close();
?>
