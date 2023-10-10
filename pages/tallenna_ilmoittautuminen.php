<?php
// Tarkista, että lomakkeen tiedot on lähetetty POST-metodilla
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Otetaan vastaan lomakkeen tiedot
    $event_id = $_POST["event_id"];
    $participant_id = $_POST["participant_id"];
    
    // Luo tietokantayhteys (korvaa tiedot omillasi)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "events_manager";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Tarkistetaan yhteys
    if ($conn->connect_error) {
        die("Yhteys epäonnistui: " . $conn->connect_error);
    }

    // Suorita SQL-kysely ilmoittautumisen tallentamiseksi
    $sql = "INSERT INTO events_participants (event_id, participant_id) VALUES ('$event_id', '$participant_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Ilmoittautuminen onnistui!";
    } else {
        echo "Virhe ilmoittautumisessa: " . $conn->error;
    }
    
    // Suljetaan tietokantayhteys
    $conn->close();
}
?>
