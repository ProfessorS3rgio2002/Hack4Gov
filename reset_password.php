<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
    <link rel="icon" type="image/png" href="assets/img/logo.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap4-neon-glow.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/particles.css">
    <link rel="stylesheet" href="assets/css/background.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       $(document).ready(function() {
     // Function to validate the form
     function validateForm() {
         var password = document.getElementById("password").value;
         var confirmPassword = document.getElementById("confirmPassword").value;
         var passwordField = document.getElementById("password");
         var confirmPasswordField = document.getElementById("confirmPassword");
         
         // Reset feedback
         passwordField.classList.remove("is-invalid");
         confirmPasswordField.classList.remove("is-invalid");

         var valid = true;

         // Validate password length (at least 6 characters)
         if (password.length < 6) {
             passwordField.classList.add("is-invalid");
             valid = false;
         }

         // Check if passwords match
         if (password !== confirmPassword) {
             confirmPasswordField.classList.add("is-invalid");
             valid = false;
         }

         return valid;
     }

     // Handle form submission with AJAX
     $("#resetPasswordForm").submit(function(e) {
         e.preventDefault(); // Prevent the default form submission

         if (validateForm()) {
             var formData = new FormData(this);

             $.ajax({
    url: "functions/update_password.php",  // The PHP script to handle the password update
    type: "POST",
    data: formData,
    processData: false,  // Tell jQuery not to process the data
    contentType: false,  // Tell jQuery not to set the content type
    success: function(response) {
        // Assuming 'response' is a JSON object
        var data = JSON.parse(response);  // Parse the response as JSON
        
        const messageContainer = document.createElement('div');
        messageContainer.classList.add('alert', 'alert-dismissible', 'fade', 'overlay-alert');
        messageContainer.setAttribute('role', 'alert');

        if (data.success) {
            messageContainer.classList.add('alert-success');
            messageContainer.innerHTML = `<strong>Success!</strong> ${data.message}`;

            // Redirect to home page after a short delay
            setTimeout(() => {
                window.location.href = "home.html"; // Change this to your dashboard page
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
    },
    error: function() {
        const messageContainer = document.createElement('div');
        messageContainer.classList.add('alert', 'alert-dismissible', 'fade', 'overlay-alert', 'alert-danger');
        messageContainer.setAttribute('role', 'alert');
        messageContainer.innerHTML = `<strong>Error:</strong> An error occurred. Please try again.`;
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
    }
});

         }
     });
 });

    </script>
</head>
<body>
    <div id="particles-js"></div>

    <div class="navbar-dark text-white">
        <div class="container">
            <nav class="navbar px-0 navbar-expand-lg navbar-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a href="index.html" class="pl-md-0 p-3 text-light">Home</a>
                        <a href="login.html" class="p-3 text-decoration-none text-light active">Login</a>
                        <a href="registration.html" class="p-3 text-decoration-none text-light">Register</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="container py-5 mb-5">
        <h2 class="mb-3 text-center">Create New Password</h2>
        <div class="row py-4">
            <div class="col-md-6 offset-md-3">
                <form id="resetPasswordForm" method="post">
                    <!-- Hidden Token Field -->
                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">

                    <div class="mb-3">
                        <label for="password">New Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">#</span>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Make sure nobody's behind you ;)" required>
                            <div class="invalid-feedback">Please enter a valid password (at least 6 characters).</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                        <div class="invalid-feedback">Passwords do not match.</div>
                    </div>

                    <button class="btn btn-outline-success btn-shadow btn-lg btn-block" type="submit">Update Password</button>
                </form>
                <br>
                <div id="responseMessage"></div>
                <p class="text-center"><a href="login.html" class="text-light">Back to Login</a></p>
            </div>
        </div>
    </div>

    <script src="assets/js/particles.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>
