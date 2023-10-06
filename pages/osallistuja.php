<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ilmoittautuminen tapahtumaan</title>
</head>
<body>
    <h1>Ilmoittautuminen tapahtumaan</h1>

    <?php
    // Tarkista, onko lomake lähetetty
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Tarkista, että ID on annettu
        if (!empty($_POST["event_id"])) {
            // Tässä voit lisätä koodin, joka käsittelee ilmoittautumista tietokantaan
            $event_id = $_POST["event_id"];
            // Voit lisätä tietokantaoperaatiot tässä

            // Ohjaa käyttäjä "tapahtuma.php" -sivulle annetun event_id:n kanssa
            header("Location: tapahtuma.php?id=" . $event_id);
            exit(); // Lopeta tämän sivun suoritus
        } else {
            echo "<p>Anna tapahtuman ID ilmoittautuaksesi.</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="event_id">Tapahtuman ID:</label>
        <input type="text" name="event_id">
        <input type="submit" value="Ilmoittaudu">
    </form>
</body>
</html>
