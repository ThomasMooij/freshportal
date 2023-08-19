<?php
require_once("database.php");

// email check
if (isset($_GET["email"])) {
    $email = $_GET["email"];

    $checkEmailQuery = "SELECT * FROM employee WHERE email = '$email'";
    $checkEmailResult = getData($checkEmailQuery, 'fetch');

    if ($checkEmailResult) {
        die("Dit e-mailadres is al in gebruik.");
    }
}

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
$sql = "SELECT firstName, lastName, email, address, birthdate FROM employee";
$empoyees = getData($sql, 'fetchAll');

header("Content-Type: application/json");
echo json_encode($empoyees);
?>
