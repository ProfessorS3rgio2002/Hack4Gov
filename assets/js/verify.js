document.addEventListener("DOMContentLoaded", function () {
    fetch("functions/getUserData.php")
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                window.location.href = "login.html"; // Redirect if not logged in
                return;
            }

            // Set User Data
            document.getElementById("user-points").textContent = data.points + " Points";
            document.getElementById("user-username").textContent = data.username;
            document.getElementById("user-rank").textContent = data.rank;   

            // Check if the user is an Admin or Moderator
            if (data.role === "admin" || data.role === "moderator") {
                document.getElementById("add-challenge-btn").style.display = "block"; // Show Add Challenge button
            } else {
                document.getElementById("add-challenge-btn").style.display = "none"; // Hide for non-admin, non-moderator users
            }

         
        })
        .catch(error => console.error("Error fetching user data:", error));
});
