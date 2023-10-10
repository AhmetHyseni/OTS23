<?php

$host = "localhost"; // Database host (usually "localhost")
$dbname = "events_manager"; // Your database name
$username = "root"; // Your database username
$password = ""; // Your database password

try {
    $databaseConnection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}



include 'mysqldataaccess.php';
include 'datamodel.php';


// Example: Creating a new Participant
// $participant = new Participant("John Doe");  
// $dataAccess->addParticipant($participant);

// Example: Creating a new Event
$event = new Event("opettaja", "random", "street", new DateTime(), new DateTime());
//$dataAccess->addEvent($event);

// Example: Retrieving Participants and Events
// $participants = $dataAccess->getParticipants();
// $events = $dataAccess->getEvents();


#$participant = new Participant("Jaane", "Smmith", "janesse@example.com");
#$participant->setid(7);
#$dataAccess->updateParticipant($participant);

#$participant = new Participant("Jaane", "Smmith", "janesse@example.com");
#$dataAccess->addParticipant($participant);

$dataAccess->deleteParticipant(9);

//$events = $dataAccess->getEvents();

// Loop through and display participants and events
// foreach ($addParticipant as $participant) {
//   echo "Participant: " . $participant->getName() . " (ID: " . $participant->addID() . ")\n";
//}

foreach ($events as $eventx) {
    echo "Event: " . $eventx->getTitle() . " Description: " . $eventx->getDescription() . " Address: " . $eventx->getAddress() . " Start Time: " . $eventx->getStartTime() . " End Time: " . $eventx->getEndTime() . " (ID: " . $eventx->getID() . ") <br>";
}
