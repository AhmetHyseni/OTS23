<?php
// Otetaan vastaan lomakkeen tiedot
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    // Tallenna tiedot tietokantaan
    $host = "localhost"; // Tietokantapalvelimen osoite
    $username = "root"; // Tietokantakäyttäjänimi
    $password = ""; // Tietokantakäyttäjän salasana
    $database = "events_manager"; // Tietokannan nimi
    
    // Luo tietokantayhteys
    $conn = new mysqli($host, $username, $password, $database);
    
    // Tarkista yhteys
    if ($conn->connect_error) {
        die("Tietokantayhteyden virhe: " . $conn->connect_error);
    }
    
    // Suorita SQL-kysely tiedon tallentamiseksi
    $sql = "INSERT INTO participants (first_name, email) VALUES ('$name', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Tiedot tallennettu onnistuneesti!";
    } else {
        echo "Virhe: " . $sql . "<br>" . $conn->error;
    }
    
    // Sulje tietokantayhteys
    $conn->close();
}
?>
