<?php
require_once("../utils/database.php");
// require_once("../utils/functions.php");

$ID = $_GET["updateId"];
$sql = "SELECT firstName, lastName,email, address, birthDate FROM employee WHERE id=$ID";
$employee = getData($sql, "fetch");
$firstName = $employee['firstName'];
$lastName = $employee['lastName'];
$email = $employee['email'];
$address = $employee['address'];
$birthDate = $employee['birthDate'];


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     updateEmployee(); 
 
// }
?>



<!DOCTYPE html>
<html>
<head>
    <title>Medewerker Toevoegen</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <h1>Medewerker Toevoegen <?php echo $ID ?> </h1>  
    <div id="error" style="color: red;"></div> 
    <form id="updateForm" method="POST">
        <label for="firstName">voornaam aanpassen:</label>
        <input type="text" id="firstName" name="firstName" value=<?php echo $firstName ?> required><br>

        <label for="lastName">achternaam aanpassen:</label>
        <input type="text" id="lastName" name="lastName"  value=<?php echo $lastName ?>  required><br>

        <label for="email">email aanpassen:</label>
        <input type="email" id="email" name="email" value=<?php echo $email ?>  required><br>

        <label for="birthdate">geboorte datum aanpassen:</label>
        <input type="date" id="birthdate" name="birthdate" value=<?php echo $birthDate ?>  required><br>

        <label for="address">adres aanpassen:</label>
        <input type="text" id="address" name="address" value=<?php echo $address ?>  required><br>
        <button type="submit">Gegevens aanpassen </button>
    </form>
    <button id="back">Terug</button>
    
</body>
</html>
