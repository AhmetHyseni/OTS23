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
        // Tapahtuma löytyi, tuodaan tiedot lomakkeeseen
        $row = $result->fetch_assoc();
?>
        <!-- Liitä tapahtumamuokkaus.html-tiedosto ja tulosta tiedot lomakkeessa -->
<!DOCTYPE html>
<html>
    <head>
        <?php
         include 'mysqldataaccess.php';
         include 'datamodel.php';
         include 'data_access.php'; 
        ?>
        <meta charset="UTF-8" />
        <title>Verkkosivusto</title>
        <link rel="stylesheet" type="text/css" href="/OTS23/forms/styles.css" />

        <?php
        function connect() {
            $dataAccess= new MySQLDataAccess($databaseConnection);
            $dataAccess->updateEvents($event);
        }
        ?>
        
    
    </head>
  <body>
    
    <div class="navigointi">
      <div class="navigointilinkki">
        <a href="/OTS23/pages/asetukset.html">Asetukset</a>
      </div>
      <div class="navigointilinkki">
        <a href="/OTS23/pages/käyttäjät.html">Käyttäjät</a>
      </div>
      <div class="navigointilinkki">
        <a href="/OTS23/pages/osallistujat.html">Osallistujat</a>
      </div>
      <div class="navigointilinkki">
        <a href="/OTS23/pages/tapahtumat.html">Tapahtumat</a>
      </div>
    </div>

    <h1>Muokkaa tapahtumaa:</h1>
    <form  method="post">

      <label for="title">Otsikko:</label>
      <input type="text" name="title" id="title" required><br><br>

      <label for="description">Kuvaus:</label>
      <input type="text" name="description" id="description" required><br><br>

      <label for="address">Tapahtumapaikka:</label>
      <input type="text" name="address" id="address" required><br><br>

      <label for="start_time">Aloitus:</label>
      <input type="datetime-local" name="start_time" id="start_time" required><br><br>

      <label for="end_time">Loppuu:</label>
      <input type="datetime-local" name="end_time" id="end_time" required><br><br>

      <input type="submit"  value="Tallenna" onclick="connect()">
      <a href="/OTS23/pages/tapahtumat.html">
        <input type="button" value="Peruuta" />
     </a>
      
    </form>
  </body>
</html>
        <script>
            // Täytä lomake tiedoilla tietokannasta
            document.getElementById('title').value = '<?php echo $row['title']; ?>';
            document.getElementById('description').value = '<?php echo $row['description']; ?>';
            document.getElementById('address').value = '<?php echo $row['address']; ?>';
            document.getElementById('start_time').value = '<?php echo $row['start_time']; ?>';
            document.getElementById('end_time').value = '<?php echo $row['end_time']; ?>';
        </script>
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
