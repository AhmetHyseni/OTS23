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
        $firstName = $participant->getFirstName();
        $lastName = $participant->getLastName();
        $email = $participant->getEmail();

    
        $sql = "INSERT INTO participants (first_name, last_name, email) VALUES (:firstName, :lastName, :email)";
        $stmt = $this->databaseConnection->prepare($sql);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            // Participant added successfully
            return true;
        } else {
            // Error occurred while adding participant
            return false;
        }
    }

    public function updateParticipant(Participant $participant) {
        $firstName = $participant->getFirstName();
        $lastName = $participant->getLastName();
        $email = $participant->getEmail();
    
        // Use a prepared statement to update the participant's information
        $sql = "UPDATE participants SET first_name = :firstName, last_name = :lastName, email = :email";
        $stmt = $this->databaseConnection->prepare($sql);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
    
        if ($stmt->execute()) {
            // Participant updated successfully
            return true;
        } else {
            // Error occurred while updating participant
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
    public function getEvents()
    {
    }



}