document.addEventListener("DOMContentLoaded", function() {
    function fetchEmployees() {
        fetch("../utils/functions.php?action=getAll")
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
                        <td>    
                            <button class="edit-button">Bewerken</button>
                            <button class="delete-button">Verwijderen</button>
                        </td>
                    `;
                    employeeTable.appendChild(row);
                    
                    const editButtons = row.querySelectorAll(".edit-button");
                    console.log(editButtons)
                    editButtons.forEach(editButton => {
                        editButton.addEventListener("click", function() {
                            window.location.href = `../updateEmployee/index.php?updateId=${employee.id}`;
                        });
                    });
                
                    const deleteButtons = row.querySelectorAll(".delete-button");
                    deleteButtons.forEach(deleteButton => {
                        deleteButton.addEventListener("click", function() {
                            const confirmDelete = confirm(`Weet je zeker dat je ${employee.firstName} wilt verwijderen?`);
                            if (confirmDelete) {
                                fetch(`../utils/functions.php?verwijderId=${employee.id}`)
                                    .then(response => response.json())
                                    .then(result => {
                                        // alert(`Medewerker ${employee.firstName} verwijderd`);
                                        console.log(result);
                                        // window.location.reload();
                                    })
                                    .catch(error => {
                                        console.error("error:", error);
                                    });
                                    alert(`Medewerker ${employee.firstName} verwijderd`);
                                    window.location.reload();
                                    }
                                  
                                  });
                                });
                });
            })
            .catch(error => {
                console.error("error:", error);
            });
    }

    fetchEmployees();

//redirect button
  const addButton = document.getElementById("add");
  addButton.addEventListener("click", function() {
      window.location.href = "../addEmployee/index.php";
      alert("scripts werkt")
  });
// action buttons

});

