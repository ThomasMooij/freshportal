document.addEventListener("DOMContentLoaded", function() {
    const errorMessage = document.getElementById("error");

    const addForm = document.getElementById("addForm");
    addForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const formData = new FormData(addForm);
        const email = formData.get("email");

        fetch("../utils/functions.php?email=" + encodeURIComponent(email))
            .then(response => response.text())
            .then(data => {
                console.log("email data" , data)
                if (data === "email is al in gebruik") {

                    errorMessage.textContent = data;
                } else {
                    errorMessage.textContent = "";
                    fetch("../utils/functions.php?action=add", {
                        method: "POST",
                        body: formData
                    })
                    .then(() => {
                        addForm.reset();
                        window.location.href = "index.php";
                    });
                }
            });
    });
});

const backButton = document.getElementById("back");
backButton.addEventListener("click", function() {
    window.location.href = "../index/index.php";
    alert("scripts werkt")
});
