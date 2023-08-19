<?php
require_once("database.php");

// email check
if (isset($_GET["email"])) {
    $email = $_GET["email"];

    $checkEmailQuery = "SELECT * FROM employee WHERE email = '$email'";
    $checkEmailResult = getData($checkEmailQuery, 'fetch');

    if ($checkEmailResult) {
        die("email is al in gebruik");
    }
}

// Delete employee
if (isset($_GET["verwijderId"])) {
    $verwijderId = $_GET["verwijderId"];

    $deleteQuery = "DELETE FROM employee WHERE id = '$verwijderId'";

    try {
        $conn->exec($deleteQuery);
    } catch(PDOException $e) {
        echo json_encode(["error" => "Fout bij verwijderen medewerker: " . $e->getMessage()]);
    }
}
//update employee


// add new employee
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];
    $address = $_POST["address"];

    $sql = "INSERT INTO employee (firstName, lastName, email, address ,birthdate) VALUES ('$firstName','$lastName', '$email','$address','$birthdate')";

    try {
        $conn->exec($sql);
        echo "Medewerker succesvol toegevoegd";
    } catch(PDOException $e) {
        echo "Fout bij toevoegen medewerker: " . $e->getMessage();
    }
}

// get employee list
$sql = "SELECT * FROM employee";
$empoyees = getData($sql, 'fetchAll');

header("Content-Type: application/json");
echo json_encode($empoyees);
?>
