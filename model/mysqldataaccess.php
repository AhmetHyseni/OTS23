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

    public function getParticipants() {
        $participants = array(); // Initialize an empty array to store participants
    
        // Prepare and execute a query to fetch participants
        $sql = "SELECT * FROM participants";
        $stmt = $this->databaseConnection->prepare($sql);
        $stmt->execute();
    
        // Fetch results and add them to the $participants array
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $participant = new Participant("Jaane", "Smmith", "jaang@example.com");
            $participant->setid($row['id']);
            $participant->setFirstName($row['first_name']);
            $participant->setLastName($row['last_name']);
            $participant->setEmail($row['email']);
            $participants[] = $participant;
        }
    
        return $participants;
    }
    
    public function updateParticipant(Participant $participant) {
        $id = $participant->getId(); // Assuming you have a method to retrieve the participant's ID
        $firstName = $participant->getFirstName();
        $lastName = $participant->getLastName();
        $email = $participant->getEmail();
    
        // Use a prepared statement to update the participant's information
        $sql = "UPDATE participants SET first_name = :firstName, last_name = :lastName, email = :email WHERE id = :id";
        $stmt = $this->databaseConnection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Assuming ID is an integer
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
    
    
    public function deleteParticipant($participantId)
    {
        // Define the SQL query to delete a participant by their ID
        $sql = "DELETE FROM participants WHERE id = :participantId";
        $stmt = $this->databaseConnection->prepare($sql);
        $stmt->bindParam(':participantId', $participantId, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            // Participant deleted successfully
            return true;
        } else {
            // Error occurred while deleting participant
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
        $sql = "SELECT * FROM events";
        $stmt = $this->databaseConnection->prepare($sql);

        if ($stmt->execute()) {
            // Fetch all events as an associative array
            $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $events;
        } else {
            // Error occurred while fetching events

          
            return [];
        }
    }

    public function updateEvents(Event $event)
    {
        $id = $event->getId();
        $title = $event->getTitle();
        $description = $event->getDescription();
        $address = $event->getAddress();
        $startTime = $event->getStartTime()->format('Y-m-d H:i:s');
        $endTime = $event->getEndTime()->format('Y-m-d H:i:s');

        // Use a prepared statement to update the participant's information
        $sql = "UPDATE events SET title = :title, description = :description, address = :address, startTime = :startTime, endTime = :endTime WHERE id = :id";
        $stmt = $this->databaseConnection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':lastName', $description);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':startTime', $startTime);
        $stmt->bindParam(':endTime', $endTime);

        if ($stmt->execute()) {
            // Participant updated successfully
            return true;
        } else {
            // Error occurred while updating participant

          
            return false;
        }
    }
    public function deleteEvent($eventId)
    {
        // Prepare and execute the SQL query to delete an event by its ID
        $sql = "DELETE FROM events WHERE id = :eventId";
        $stmt = $this->databaseConnection->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // Event deleted successfully
            return true;
        } else {
            // Error occurred while deleting event
            return false;
        }
    }



}

include_once "../env.php";

use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/../.env'))->load();


$host = "localhost"; // Database host (usually "localhost")
$dbdns = getenv("DATABASE_DNS"); // Your database name
$username = getenv("DATABASE_USERNAME"); // Your database username
$password = getenv("DATABASE_PASSWORD"); // Your database password

try {
    $databaseConnection = new PDO($dbdns, $username, $password);
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$dataAccess = new MySQLDataAccess($databaseConnection);

