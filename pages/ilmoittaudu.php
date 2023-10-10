<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verkkosivusto</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <div class="navigointi">
        <div class="navigointilinkki">
            <a href="asetukset.html">Asetukset</a>
        </div>
        <div class="navigointilinkki">
            <a href="käyttäjät.html">Käyttäjät</a>
        </div>
        <div class="navigointilinkki">
            <a href="osallistujat.php">Osallistujat</a>
        </div>
        <div class="navigointilinkki">
            <a href="tapahtumat.php">Tapahtumat</a>
        </div>

    </div>



<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f7ff; /* Light blue background */
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .event-list {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff; /* White background for events */
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }
        .event-item {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .event-title {
            font-weight: bold;
            font-size: 30px;
            color: #333; /* Dark text color */
        }
        .event-date {
            color: #555;
        }
        /* CSS lomakkeelle */
.event-form {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff; /* White background for form */
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
}

.event-form h2 {
    font-size: 24px;
    color: #333; /* Dark text color */
    margin-bottom: 15px;
}

.event-form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.event-form input[type="text"],
.event-form textarea,
.event-form input[type="datetime-local"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.event-form input[type="submit"] {
    background-color: #007bff; /* Blue button background color */
    color: #fff; /* White text color */
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
}

.event-form input[type="submit"]:hover {
    background-color: #0056b3; /* Darker blue color on hover */
}

    </style>
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
