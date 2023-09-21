<?php
require_once 'datamodel.php';

// Luodaan osallistujat
$participant1 = new Participant("John", "Doe", "john@example.com");
$participant2 = new Participant("Jane", "Smith", "jane@example.com");

// Luodaan tapahtuma
$event1 = new Event(
    "Tapahtuma 1",
    "Tämä on ensimmäinen tapahtuma",
    "Tapahtumapaikka 1",
    new DateTime("2023-09-15 10:00:00"),
    new DateTime("2023-09-15 12:00:00")
);

// Lisätään osallistujat tapahtumaan
$event1->addParticipant($participant1);
$event1->addParticipant($participant2);

// Tulostetaan tiedot HTML-sivulle
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tapahtumat</title>
</head>

<body>
    <h1><?php echo $event1->getTitle(); ?></h1>
    <p><?php echo $event1->getDescription(); ?></p>
    <p>Paikka: <?php echo $event1->getAddress(); ?></p>
    <p>Alkaa: <?php echo $event1->getStartTime()->format('Y-m-d H:i:s'); ?></p>
    <p>Päättyy: <?php echo $event1->getEndTime()->format('Y-m-d H:i:s'); ?></p>
    <h2>Osallistujat:</h2>
    <ul>
        <?php foreach ($event1->getParticipants() as $participant) : ?>
            <li><?php echo $participant->getFirstName() . " " . $participant->getLastName(); ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>