<!DOCTYPE html>
<html>
<head>
    <title>Osallistujat</title>
</head>
<body>
    <h1>Osallistujat</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nimi</th>
        </tr>
        <?php
        // Käytä DataAccess-luokkaa tietojen hakemiseen tietokannasta
        require_once 'eventti.php'; // Muuta tämä tarvittaessa

        // Luodaan tietokantayhteys
        $dataAccess = new DataAccess();

        // Haetaan osallistujat
        $osallistujat = $dataAccess->haeOsallistujat();

        // Tulostetaan osallistujat taulukkoon
        foreach ($osallistujat as $osallistuja) {
            echo "<tr>";
            echo "<td>" . $osallistuja['id'] . "</td>";
            echo "<td>" . $osallistuja['nimi'] . "</td>";
            echo "</tr>";
        }

        // Suljetaan tietokantayhteys
        $dataAccess->suljeYhteys();
        ?>
    </table>
</body>
</html>
