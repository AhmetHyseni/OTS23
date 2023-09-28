<?php
class DataAccess {
    private $databaseConnection;

    public function __construct($databaseConnection) {
        $this->databaseConnection = $databaseConnection;
    }

    public function addParticipant(Participant $participant) {
        // Extract values from the $participant object
    }
    

    public function getParticipants(Participant $participant) {
        // Hae osallistujat tietokannasta ja palauta ne taulukkona
    }

    public function updateParticipant(Participant $participant) {
        // Päivitä osallistuja tietokannassa
    }

    public function deleteParticipant(Participant $participant) {
        // Poista osallistuja tietokannasta
    }

    public function addEvent(Event $event) {
        // Lisää tapahtuma tietokantaan
    }

    public function getEvents() {
        // Hae tapahtumat tietokannasta ja palauta ne taulukkona
    }

    public function updateEvent(Event $event) {
        // Päivitä tapahtuma tietokannassa
    }

    public function deleteEvent(Event $event) {
        // Poista tapahtuma tietokannasta
    }
}
?>
