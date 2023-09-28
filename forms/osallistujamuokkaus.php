<?php
// Otetaan vastaan lomakkeen tiedot
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $email = $_POST["email"];

    echo "Tiedot lähetetty onnistuneesti";
    

}
?>