<?php

$host = "localhost"; // Database host (usually "localhost")
$dbname = "events_manager"; // Your database name
$username = "root"; // Your database username
$password = ""; // Your database password

include 'datamodel.php';
include 'data_access.php';
include 'mysqldataaccess.php';

try {
    $databaseConnection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Otetaan vastaan lomakkeen tiedot
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $address = $_POST["address"];
    $startTime = $_POST["start_time"];
    $endTime = $_POST["end_time"];

    echo "Tiedot lähetetty onnistuneesti";

    $dataAccess = new MySQLDataAccess($databaseConnection); 
    $event = new Event($title, $description, $address, new DateTime($startTime), new DateTime($endTime));
    $dataAccess->addEvent($event);
    

}
?>