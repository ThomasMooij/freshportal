<!DOCTYPE html>
<html>
<head>
    <title>Medewerker Toevoegen</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <h1>Medewerker Toevoegen</h1>  
    <div id="error" style="color: red;"></div> 
    <form id="addForm" method="POST">
        <label for="firstName">uw voornaam:</label>
        <input type="text" id="firstName" name="firstName" required><br>

        <label for="lastName">uw achternaam:</label>
        <input type="text" id="lastName" name="lastName" required><br>

        <label for="email">uw email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="birthdate">uw geboorte datum:</label>
        <input type="date" id="birthdate" name="birthdate" required><br>

        <label for="address">uw adres:</label>
        <input type="text" id="address" name="address" required><br>
        <button type="submit">Toevoegen </button>
    </form>
    <button id="back">Terug</button>
</body>
</html>
