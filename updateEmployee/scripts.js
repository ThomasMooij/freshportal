document.addEventListener("DOMContentLoaded", function() {
    const updateForm = document.getElementById("updateForm");
    const errorMessage = document.getElementById("error");

    updateForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData(updateForm);

        fetch("../utils/functions.php?action=update", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data)
            if (data.startsWith("Fout")) {
                errorMessage.textContent = data;
            } else {
                errorMessage.textContent = "";
                alert("Medewerker succesvol bijgewerkt");
                window.location.href = "../index/index.php"; // Terug naar overzicht
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });

    const backButton = document.getElementById("back");
    backButton.addEventListener("click", function() {
        window.location.href = "../index/index.php";
    });
});
