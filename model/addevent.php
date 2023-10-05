<?php
include 'datamodel.php';
// Otetaan vastaan lomakkeen tiedot
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $address = $_POST["address"];
    $startTime = $_POST["start_time"];
    $endTime = $_POST["end_time"];

    echo "Tiedot lähetetty onnistuneesti";
    

}
$addEvent = new Event($title, $description, $address, $startTime, $endTime);
?>