document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form submission

        // Create FormData object
        const formData = new FormData(form);

        // Validate form fields before submission
        let isValid = true;
        form.querySelectorAll(".form-control").forEach((input) => {
            if (!input.checkValidity()) {
                isValid = false;
                input.classList.add("is-invalid");
            } else {
                input.classList.remove("is-invalid");
            }
        });

        if (!isValid) {
            return; // If form is invalid, stop submission
        }

        // AJAX request to login.php
        fetch("functions/login.php", {
            method: "POST",
            body: formData,
        })
        .then((response) => response.json())
        .then((data) => {
            const messageContainer = document.createElement('div');
            messageContainer.classList.add('alert', 'alert-dismissible', 'fade', 'overlay-alert');
            messageContainer.setAttribute('role', 'alert');

            if (data.success) {
                messageContainer.classList.add('alert-success');
                messageContainer.innerHTML = `<strong>Success!</strong> ${data.message}`;

                // Redirect to dashboard or another page after a short delay
                setTimeout(() => {
                    window.location.href = "home.php"; // Change this to your dashboard page
                }, 3000);
            } else {
                messageContainer.classList.add('alert-danger');
                messageContainer.innerHTML = `<strong>Error:</strong> ${data.message}`;
            }

            // Append alert to the body
            document.body.appendChild(messageContainer);

            // Show the alert with fade-in effect
            setTimeout(() => {
                messageContainer.classList.add('show');
            }, 100);

            // Remove alert after 5 seconds
            setTimeout(() => {
                messageContainer.classList.remove('show');
                document.body.removeChild(messageContainer);
            }, 5000);
        })
        .catch((error) => {
            console.error("Error:", error);

            const messageContainer = document.createElement('div');
            messageContainer.classList.add('alert', 'alert-dismissible', 'fade', 'overlay-alert', 'alert-danger');
            messageContainer.setAttribute('role', 'alert');
            messageContainer.innerHTML = `<strong>Error:</strong> An error occurred. Please try again.`;
            document.body.appendChild(messageContainer);

            setTimeout(() => {
                messageContainer.classList.add('show');
            }, 100);

            setTimeout(() => {
                messageContainer.classList.remove('show');
                document.body.removeChild(messageContainer);
            }, 5000);
        });
    });
});
