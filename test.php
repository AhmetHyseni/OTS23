<?php
$host = "localhost"; // Database host (usually "localhost")
$dbname = "events_manager"; // Your database name
$username = "login"; // Your database username
$password = "password123"; // Your database password

try {
    $databaseConnection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

include 'dataaccess.php';
include 'Participant.php';
include 'Event.php';

$dataAccess = new DataAccess($databaseConnection);

// Example: Creating a new Participant
$participant = new Participant("John Doe");
$dataAccess->addParticipant($participant);

// Example: Creating a new Event
$event = new Event("Sample Event");
$dataAccess->addEvent($event);

// Example: Retrieving Participants and Events
$participants = $dataAccess->getParticipants();
$events = $dataAccess->getEvents();

// Loop through and display participants and events
foreach ($participants as $participant) {
    echo "Participant: " . $participant->getName() . " (ID: " . $participant->getID() . ")\n";
}

foreach ($events as $event) {
    echo "Event: " . $event->getTitle() . " (ID: " . $event->getID() . ")\n";
}
