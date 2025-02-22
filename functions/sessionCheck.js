function checkUserSession() {
    fetch("functions/getUserData.php")
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                window.location.href = "login.html"; // Redirect if not logged in
            } else {
                // Update username and points in the navbar
                document.getElementById("user-username").textContent = data.username;
                document.getElementById("user-points").textContent = data.points + " Points";
            }
        })
        .catch(error => console.error("Error checking session:", error));
}

// Run on page load
checkUserSession();
