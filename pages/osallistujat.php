<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Osallistujat</title>
    <style>

    body {
        font-family: Arial, sans-serif;
        color: white;
        background-color: #e6f7ff; 
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #333; 
    }

    table {
        width: 60%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: white; 
    }

    table, th, td {
        border: 1px solid #333; 
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #cce6ff;
    }

    tr:nth-child(odd) {
        background-color: #99ccff; 
    }

    form {
        background-color: white;
        padding: 20px;
        margin: 20px auto;
        width: 60%;
        border: 1px solid #333;
        border-radius: 5px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #333;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #333;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #666;
    }

    form {
    background-color: #e6f7ff; /* Vaaleansininen taustaväri lomakkeelle */
    padding: 20px;
    margin: 20px auto;
    width: 60%;
    border: 1px solid #333;
    border-radius: 5px;
    }


    </style>
</head>
<body>

    <div class="navigointi">
        <div class="navigointilinkki">
            <a href="asetukset.html">Asetukset</a>
        </div>
        <div class="navigointilinkki">
            <a href="käyttäjät.html">Käyttäjät</a>
        </div>
        <div class="navigointilinkki">
            <a href="osallistujat.php">Osallistujat</a>
        </div>
        <div class="navigointilinkki">
            <a href="tapahtumat.php">Tapahtumat</a>
        </div>

    </div>
        
    <h1>Osallistujalista</h1>
    <form action="" method="post">
        <label for="first_name">Etunimi:</label>
        <input type="text" name="first_name" required><br><br>

        <label for="last_name">Sukunimi:</label>
        <input type="text" name="last_name" required><br><br>

        <label for="email">Sähköposti:</label>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Lisää osallistuja">
    </form>

    <?php

include 'mysqldataaccess.php';
include 'datamodel.php';


    $conn = new mysqli($servername, $username, $password, $dbname);

    // Tarkistetaan yhteys
    if ($conn->connect_error) {
        die("Yhteys epäonnistui: " . $conn->connect_error);
    }

    // Tarkistetaan, onko lomaketta lähetetty
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Haetaan lomakkeelta syötetyt tiedot
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];

        // Lisätään tiedot tietokantaan
        $sql = "INSERT INTO participants (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "Osallistuja lisätty onnistuneesti.";
        } else {
            echo "Virhe: " . $sql . "<br>" . $conn->error;
        }
    }

    // Suoritetaan SQL-kysely osallistujien hakemiseksi
    $sql = "SELECT first_name, last_name, email FROM participants";
    $result = $conn->query($sql);

    // Tarkistetaan, onko tuloksia
    if ($result->num_rows > 0) {
        // Tulostetaan tiedot HTML-taulukkoon
        echo "<table>";
        echo "<tr><th>Etunimi</th><th>Sukunimi</th><th>Sähköposti</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"]. "</td><td>" . $row["email"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Ei osallistujia.";
    }

    // Suljetaan tietokantayhteys
    $conn->close();
    ?>
</body>
</html>