<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password</title>
    <link rel="icon" type="image/png" href="assets/img/logo.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap4-neon-glow.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/particles.css">
    <link rel="stylesheet" href="assets/css/background.css">
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
        <h2 class="mb-3 text-center">Reset Your Password</h2>
        <div class="row py-4">
            <div class="col-md-6 offset-md-3">
                <form id="resetPasswordForm">
                    <div class="mb-3">
                        <label for="email">Enter your email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
                        </div>
                    </div>
                    <button class="btn btn-outline-success btn-shadow btn-lg btn-block" type="submit">Send Reset Link</button>
                    <br>
                    <p class="text-center"><a href="login.html" class="text-light">Back to Login</a></p>
                </form>
                <div id="responseMessage" class="text-center mt-3"></div>
            </div>
        </div>
    </div>

    <script src="assets/js/particles.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       $(document).ready(function(){
    $("#resetPasswordForm").submit(function(e){
        e.preventDefault(); // Prevent form from submitting normally

        var email = $("#email").val(); // Get the email value

        // Show a loading message
        $("#responseMessage").html("Sending reset link...");

        $.ajax({
            url: "functions/reset_password.php", // PHP script to handle the request
            type: "POST",
            data: {email: email},
            success: function(response){
                // Show the response message
                $("#responseMessage").html(response);
                
                // Redirect to the check-email page after sending the reset link
                if (response.includes("reset link has been sent")) {
                    setTimeout(function() {
                        window.location.href = "check-email.html"; // Redirect to the check-email page
                    }, 2000); // Delay the redirect for 2 seconds (optional)
                }
            },
            error: function(){
                // Show an error message
                $("#responseMessage").html("There was an error. Please try again later.");
            }
        });
    });
});

    </script>
</body>
</html>
