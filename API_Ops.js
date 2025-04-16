document.addEventListener("DOMContentLoaded", function () {
    const userNameField = document.querySelector('input[name="user_name"]');
    const password = document.querySelector('input[name="password"]');
    const confirm = document.querySelector('input[name="confirm_password"]');
    const form = document.querySelector("form");

    // Username availability check
    userNameField.addEventListener("blur", function () {
        const username = userNameField.value.trim();
        if (!username) return;

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "check_username.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.responseText === "taken") {
                alert("Username already exists. Please choose another.");
                userNameField.setAttribute("data-valid", "no");
                userNameField.focus();
            } else {
                userNameField.setAttribute("data-valid", "yes");
            }
        };

        xhr.send("user_name=" + encodeURIComponent(username));
    });

    // Form validation
    form.addEventListener("submit", function (e) {
        if (userNameField.getAttribute("data-valid") === "no") {
            e.preventDefault();
            alert("Please choose another username.");
            return;
        }

        if (password.value !== confirm.value) {
            e.preventDefault();
            alert("Passwords do not match!");
        }
    });
});

// WhatsApp Number Validation using RapidAPI
function validateWhatsApp() {
    const number = document.getElementById("whatsapp").value.trim();
    const statusDiv = document.getElementById("whatsappStatus");

    if (!number) {
        statusDiv.textContent = "Please enter a number first.";
        statusDiv.style.color = "orange";
        return;
    }

    fetch("https://whatsapp-number-validator3.p.rapidapi.com/wav3/validate?number=" + encodeURIComponent(number), {
        method: "GET",
        headers: {
            "X-RapidAPI-Key": "YOUR_RAPID_API_KEY", // Replace with your actual key
            "X-RapidAPI-Host": "whatsapp-number-validator3.p.rapidapi.com"
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.valid) {
            alert("Valid WhatsApp Number.");
            statusDiv.textContent = "Valid WhatsApp Number.";
            statusDiv.style.color = "green";
        } else {
            alert("Invalid WhatsApp Number.");
            statusDiv.textContent = "Invalid WhatsApp Number.";
            statusDiv.style.color = "red";
        }
    })
    .catch(err => {
        alert("API error or limit exceeded.");
        statusDiv.textContent = "Unable to validate number. Try again later.";
        statusDiv.style.color = "gray";
    });
}
