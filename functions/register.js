document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form submission

        // Create a FormData object from the form
        const formData = new FormData(form);

        // Validate form fields before submission (optional)
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
            return; // If form is invalid, do not proceed
        }

        // AJAX request to register.php
        fetch("functions/register.php", {
            method: "POST",
            body: formData,
        })
        .then((response) => response.json())
        .then((data) => {
            const messageContainer = document.createElement('div');
            messageContainer.classList.add('alert', 'alert-dismissible', 'fade', 'overlay-alert');
            messageContainer.setAttribute('role', 'alert');

            if (data.success) {
                // Success message
                messageContainer.classList.add('alert-success');
                messageContainer.innerHTML = `<strong>Success!</strong> ${data.message}`;

                // Optionally, redirect to another page after 3 seconds
                setTimeout(() => {
                    window.location.href = "login.html";
                }, 3000); // Redirect after 3 seconds
            } else {
                // Error message
                messageContainer.classList.add('alert-danger');
                messageContainer.innerHTML = `<strong>Error:</strong> ${data.message}`;
            }

            // Append the alert container to the body to display it in the center
            document.body.appendChild(messageContainer);

            // Add 'show' class to trigger fade-in
            setTimeout(() => {
                messageContainer.classList.add('show');
            }, 100);

            // Automatically hide the message after 5 seconds
            setTimeout(() => {
                messageContainer.classList.remove('show');
                document.body.removeChild(messageContainer); // Remove alert from DOM
            }, 5000);
        })
        .catch((error) => {
            console.error("Error:", error);

            const messageContainer = document.createElement('div');
            messageContainer.classList.add('alert', 'alert-dismissible', 'fade', 'overlay-alert', 'alert-danger');
            messageContainer.setAttribute('role', 'alert');
            messageContainer.innerHTML = `<strong>Error:</strong> An error occurred. Please try again.`;
            document.body.appendChild(messageContainer);

            // Add 'show' class to trigger fade-in
            setTimeout(() => {
                messageContainer.classList.add('show');
            }, 100);

            // Automatically hide the error message after 5 seconds
            setTimeout(() => {
                messageContainer.classList.remove('show');
                document.body.removeChild(messageContainer); // Remove alert from DOM
            }, 5000);
        });
    });
});
