<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'testuser');
define('DB_PASSWORD', 'testpassword');
define('DB_NAME', 'testuser');
 
/* Yritetään kirjautua tietokantaan, jonka tiedot yllä */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
// $viesti = "Kirjautuminen onnistui tietokantaan " . DB_NAME;
// echo ($viesti);
?>