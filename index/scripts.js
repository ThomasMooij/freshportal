document.addEventListener("DOMContentLoaded", function() {
    function fetchEmployees() {
        fetch("../utils/functions.php")
            .then(response => response.json()) 
            .then(data => {
            
                const employeeList = document.getElementById("employees");
                employeeList.innerHTML = "";
                data.forEach(employee => {
                    console.log(employee);
                    const employeeDiv = document.createElement("div");
                    employeeDiv.className = "employee-item";
                    employeeDiv.innerHTML = `
                        <p>ID: ${employee.id}</p>
                        <p>Naam: ${employee.firstName + " " + employee.lastName}</p>
                        <p>Email: ${employee.email}</p>
                        <p>Geboortedatum: ${employee.birthdate}</p>
                        <p>Adres: ${employee.address}</p>
                    `;
                    employeeList.appendChild(employeeDiv);
                });
            })
            .catch(error => {
                console.error("error:", error);
            });
    }

    fetchEmployees();

        //add employee
        const addButton = document.getElementById("add");
        addButton.addEventListener("click", function() {
            window.location.href = "../addEmployee/index.php";
            alert("scripts werkt")
        });
});
