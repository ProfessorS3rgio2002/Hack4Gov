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

            // Add Admin or Moderator Badge
            if (data.role === "admin") {
                const adminBadge = document.createElement("span");
                adminBadge.className = "badge badge-danger ml-2";
                adminBadge.innerText = "Admin";
                document.getElementById("user-username").appendChild(adminBadge);
            } else if (data.role === "moderator") {
                const moderatorBadge = document.createElement("span");
                moderatorBadge.className = "badge badge-success ml-2";
                moderatorBadge.innerText = "Moderator";
                document.getElementById("user-username").appendChild(moderatorBadge);
            }

            // Update Rank Icon and Color
            const rankBadge = document.getElementById("user-rank");
            const rankContainer = document.querySelector(".rank-container");
            const rankIcon = document.getElementById("rank-icon");
            switch (data.rank) {
                case "Newbie":
                    rankIcon.className = "fas fa-user text-muted";
                    rankContainer.style.boxShadow = "0 0 10px rgba(169, 169, 169, 0.5)";
                    rankBadge.style.color = "#D3D3D3";
                    break;
                case "Script Kiddie":
                    rankIcon.className = "fas fa-code text-cyan ";
                    rankIcon.style.color = "#17b06b";
                    rankContainer.style.boxShadow = "0 0 10px rgba(0, 188, 212, 0.5)";
                    rankBadge.style.color = "#FF0000";
                    break;
                case "Wannabe Hacker":
                    rankIcon.className = "fas fa-terminal text-blue";
                    rankContainer.style.boxShadow = "0 0 10px rgba(30, 144, 255, 0.5)";
                    rankBadge.style.color = "#1E90FF";
                    break;
                case "Anonymous":
                    rankIcon.className = "fas fa-user-secret text-lightgray";
                    rankContainer.style.boxShadow = "0 0 10px rgba(211, 211, 211, 0.5)";
                    rankBadge.style.color = "#FF0000";
                    break;
                default:
                    rankIcon.className = "fas fa-user text-muted";
                    rankContainer.style.boxShadow = "0 0 10px rgba(169, 169, 169, 0.5)";
                    rankBadge.style.color = "#D3D3D3";
                    break;
            }
        })
        .catch(error => console.error("Error fetching user data:", error));
});
