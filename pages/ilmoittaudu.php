<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Lisää tarvittavat meta-tagit ja tyylitiedostot täällä -->
</head>
<body>
    <h1>Ilmoittautumislomake</h1>

    <form method="post" action="tallenna_ilmoittautuminen.php">
        <label for="event_id">Tapahtuman tunniste:</label>
        <input type="text" id="event_id" name="event_id" required><br>
        <label for="participant_id">Osallistujan tunniste:</label>
        <input type="text" id="participant_id" name="participant_id" required><br>
        <input type="submit" value="Ilmoittaudu">
    </form>
</body>
</html>
