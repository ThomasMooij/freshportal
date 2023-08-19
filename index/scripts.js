document.addEventListener("DOMContentLoaded", function() {
    function fetchEmployees() {
        fetch("../utils/functions.php")
            .then(response => response.json()) 
            .then(data => {
            
                const employeeList = document.getElementById("employeeTable");
                employeeList.innerHTML = "";
                data.forEach(employee => {
                    console.log(employee)
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${employee.firstName} ${employee.lastName}</td>
                        <td>${employee.email}</td>
                        <td>${employee.address}</td>
                        <td>${employee.birthdate}</td>
                        <td>...</td>
                    `;
                    employeeTable.appendChild(row);
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
