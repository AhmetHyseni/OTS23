<!DOCTYPE html>
<html>
<head>
    <title>Osallistujien tiedot</title>
</head>
<body>
    <h1>Osallistujien tiedot</h1>
    <table border="1">
        <tr>
            <th>Etunimi</th>
            <th>Sukunimi</th>
            <th>Sähköposti</th>
        </tr>
        
        <?php
        // Oletetaan, että olet jo yhdistänyt tietokantaan ja luonut tarvittavan yhteyden, esim. $conn
        // Tämä on yksinkertainen esimerkki, joka käyttää mysqli-kirjastoa

        $servername = "localhost"; // Tietokantapalvelimen osoite
        $username = "root"; // Tietokantakäyttäjän nimi
        $password = ""; // Tietokantakäyttäjän salasana
        $dbname = "events_manager"; // Tietokannan nimi

        // Luodaan yhteys
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Tarkistetaan yhteys
        if (!$conn) {
            die("Yhteyden muodostaminen epäonnistui: " . mysqli_connect_error());
        }
        
        $query = "SELECT title, description, address FROM events";
        $result = mysqli_query($conn, $query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "</tr>";
        }
        
        // Muista vapauttaa tietokantayhteys, kun olet valmis
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
