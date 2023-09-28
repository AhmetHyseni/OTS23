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

}