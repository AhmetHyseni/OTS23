<?php
$host = "localhost"; // Database host (usually "localhost")
$dbname = "database"; // Your database name
$username = "user1"; // Your database username
$password = "Qwerty1"; // Your database password

try {
    $databaseConnection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

include 'mysqldataaccess.php';
include 'datamodel.php';

$dataAccess = new MySQLDataAccess($databaseConnection);

// Example: Creating a new Participant
// $participant = new Participant("John Doe");  
// $dataAccess->addParticipant($participant);

// Example: Creating a new Event
//$event = new Event("opettaja", "random", "street", new DateTime(), new DateTime());
//$dataAccess->addEvent($event);

// Example: Retrieving Participants and Events
// $participants = $dataAccess->getParticipants();
// $events = $dataAccess->getEvents();
$participant = new Participant("Jaane", "Smmith", "janesse@example.com");

$dataAccess->updateParticipant($participant);

// Assuming you have an existing Participant object with the new data
//$updatedParticipant = new Participant(7, "NewFirstName", "NewLastName", "newemail@example.com");

// Retrieve the existing data for the participant from the database
//$existingParticipant = $dataAccess->getParticipantById($updatedParticipant->getId());

// Check if the participant exists
//if ($existingParticipant) {
  //  // Update the participant object with the new data
    //$existingParticipant->setFirstName($updatedParticipant->getFirstName());
//    $existingParticipant->setLastName($updatedParticipant->getLastName());
  //  $existingParticipant->setEmail($updatedParticipant->getEmail());

    // Update the participant in the database
  //  if ($dataAccess->updateParticipant($existingParticipant)) {
//        echo "Participant information updated successfully!";
 //   } else {
   //     echo "Error occurred while updating participant information.";
//    }
//} else {
  //  echo "Participant not found.";
//}

//$events = $dataAccess->getEvents();

// Loop through and display participants and events
// foreach ($addParticipant as $participant) {
  //   echo "Participant: " . $participant->getName() . " (ID: " . $participant->addID() . ")\n";
 //}

// foreach ($events as $event) {
//     echo "Event: " . $event->getTitle() . " (ID: " . $event->getID() . ")\n";
// }
