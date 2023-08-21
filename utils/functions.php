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


// Post functions

if (isset($_GET["action"])) {
    $action = $_GET["action"];

    if ($action === "add") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $birthdate = $_POST["birthdate"];
            $address = $_POST["address"];
        
            $sql = "INSERT INTO employee (firstName, lastName, email, address, birthdate) VALUES (:firstName, :lastName, :email, :address, :birthdate)";
        
            try {
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':firstName', $firstName);
                $stmt->bindParam(':lastName', $lastName);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':address', $address);
                $stmt->bindParam(':birthdate', $birthdate);
                $stmt->execute();
                echo "Medewerker succesvol toegevoegd";
            } catch(PDOException $e) {
                echo "Fout bij toevoegen medewerker: " . $e->getMessage();
            }
        }
    } elseif ($action === "update") { 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $birthdate = $_POST["birthdate"];

            $sql = "UPDATE employee SET firstName = :firstName, lastName = :lastName, email = :email, address = :address, birthdate = :birthdate WHERE id = :id";

            try {
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':firstName', $firstName);
                $stmt->bindParam(':lastName', $lastName);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':address', $address);
                $stmt->bindParam(':birthdate', $birthdate);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                echo "Medewerker succesvol bijgewerkt";
            } catch(PDOException $e) {
                echo "Fout bij bijwerken medewerker: " . $e->getMessage();
            }
        }
    }
}

        $sql = "SELECT * FROM employee";
        $empoyees = getData($sql, 'fetchAll');

        header("Content-Type: application/json");
        echo json_encode($empoyees);



?>
