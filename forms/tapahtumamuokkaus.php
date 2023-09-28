<?php
// Otetaan vastaan lomakkeen tiedot
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $address = $_POST["address"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];

    echo "Tiedot lähetetty onnistuneesti";
    

}
?>