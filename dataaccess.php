<?php
class DataAccess
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

    // Implement other CRUD methods for Participants and Events
}
