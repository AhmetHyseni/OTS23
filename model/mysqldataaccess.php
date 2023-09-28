<?php
class MySQLDataAccess
{
    private $databaseConnection;

    public function __construct($databaseConnection)
    {
        $this->databaseConnection = $databaseConnection;
    }

    // Add a new participant to the database
    public function addParticipant(Participant $participant)
    {
        $name = $participant->getName();

        // Prepare and execute the SQL query to insert the participant
        $sql = "INSERT INTO participants (name) VALUES (:name)";
        $stmt = $this->databaseConnection->prepare($sql);
        $stmt->bindParam(':name', $name);

        if ($stmt->execute()) {
            // Participant added successfully
            return true;
        } else {
            // Error occurred while adding participant
            return false;
        }
    }
    // EVENT --------------------------------------------------------------------------

    // Add a new event to the database
    public function addEvent(Event $event)
    {
        $title = $event->getTitle();
        $description = $event->getDescription();
        $address = $event->getAddress();
        $startTime = $event->getStartTime()->format('Y-m-d H:i:s');
        $endTime = $event->getEndTime()->format('Y-m-d H:i:s');

        // Prepare and execute the SQL query to insert the event
        $sql = "INSERT INTO events (title, description, address, start_time, end_time) VALUES (:title, :description, :address, :startTime, :endTime)";
        $stmt = $this->databaseConnection->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':startTime', $startTime);
        $stmt->bindParam(':endTime', $endTime);

        if ($stmt->execute()) {
            // Event added successfully
            return true;
        } else {
            // Error occurred while adding event
            return false;
        }
    }



    // Implement other CRUD methods for Participants and Events
}
