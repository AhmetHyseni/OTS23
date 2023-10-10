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

    // Suoritetaan SQL-kysely tapahtuman hakemiseksi
    $sql = "SELECT * FROM events WHERE id = $event_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Tapahtuma löytyi, näytetään lomake muokkausta varten
        $row = $result->fetch_assoc();
?>
        <html>
        <body>
            <h2>Muokkaa tapahtumaa</h2>
            <form action="tallenna_muutokset.php" method="post">
                <input type="hidden" name="event_id" value="<?php echo $row['id']; ?>">
                Otsikko: <input type="text" name="otsikko" value="<?php echo $row['otsikko']; ?>"><br>
                Kuvaus: <textarea name="kuvaus"><?php echo $row['kuvaus']; ?></textarea><br>
                Päivämäärä: <input type="date" name="paivamaara" value="<?php echo $row['paivamaara']; ?>"><br>
                <input type="submit" value="Tallenna muutokset">
            </form>
        </body>
        </html>
<?php
    } else {
        echo "Tapahtumaa ei löytynyt.";
    }
} else {
    echo "Tapahtuman tunnus puuttuu.";
}

// Suljetaan tietokantayhteys
$conn->close();
?>
