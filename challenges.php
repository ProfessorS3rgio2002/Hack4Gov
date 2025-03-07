<?php include "functions/session_check.php"; ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Challenges</title>
    <link rel="icon" type="image/png" href="assets/img/logo.jpg">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap4-neon-glow.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/points.css">
    <link rel="stylesheet" href="assets/css/category.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/font-hack/2.020/css/hack.min.css'>
    <link rel="stylesheet" href="assets/css/background.css">
    <style>


    </style>
  </head>
  <body>
    <div id="particles-js"></div>
    <div class="navbar-dark text-white">
      <div class="container">
        <nav class="navbar px-0 navbar-expand-lg navbar-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
                      <a href="home.php" class="p-3 text-decoration-none text-light">Home</a>
                      <a href="challenges.php" class="p-3 text-decoration-none text-light">Challenges</a>
                      <a href="rules.php" class="p-3 text-decoration-none text-light">Rules</a>
                      <a href="leaderboard.php" class="p-3 text-decoration-none text-light">Leaderboard</a>
                      <?php if ($role === 'admin'): ?>
                <a href="admin.php" class="p-3 text-decoration-none text-light">Admin</a>
            <?php endif; ?>
            <div class="nav-right d-flex justify-content-end align-items-center" style="gap: 15px;">
                <div id="user-username" class="text-light font-weight-bold">Loading...</div>
                
                <div class="rank-container">
                    <i id="rank-icon" class="fas fa-medal"></i>
                    <span id="user-rank" class="rank-badge">Loading...</span>
                </div>
            
                <div class="points-container">
                    <i class="fas fa-trophy text-warning"></i>
                    <span id="user-points" class="points-badge">Loading...</span>
                </div>
            
                <a href="functions/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
            </div>
            
          </div>
        </nav>
      </div>
    </div>
    <h1 class="display-3" style="text-align: center"><b>Quest ZONE!<span class="vim-caret">͏͏&nbsp;</span></b></h1>
    <div class="lead mb-3 text-mono text-success" style="text-align: center">
        Are you ready to solve the quests?
    </div>
    <div id="alert-container" style="position: fixed; top: 17%; left: 50%; transform: translateX(-50%); width: 50%; z-index: 1050;"></div>

    <div class="container">
        <div id="accordion"></div>
    </div>
    
    <script>
     document.addEventListener("DOMContentLoaded", function () {
    fetch("functions/fetch_challenges.php")
        .then(response => response.json())
        .then(data => {
            const accordion = document.getElementById("accordion");
            const solvedChallenges = data.solved_challenges.map(id => parseInt(id));

            let categories = {};

            // Group challenges by category
            data.challenges.forEach(challenge => {
                if (!categories[challenge.category_name]) {
                    categories[challenge.category_name] = [];
                }
                categories[challenge.category_name].push(challenge);
            });

            // Function to get difficulty badge
            function getDifficultyBadge(difficulty) {
                switch (difficulty) {
                    case "Easy":
                        return `<span class="badge badge-success badge-sm ml-2">Easy</span>`;
                    case "Medium":
                        return `<span class="badge badge-warning badge-sm ml-2">Medium</span>`;
                    case "Hard":
                        return `<span class="badge badge-danger badge-sm ml-2">Hard</span>`;
                    default:
                        return `<span class="badge badge-secondary badge-sm ml-2">${difficulty}</span>`;
                }
            }

            // Render challenges grouped by category
            Object.keys(categories).forEach(category => {
                let categoryClass = `category-${category.toLowerCase().replace(/\s+/g, '-')}`;

                let categoryHtml = `
                    <div class="category-container">
                        <h3 class="category-title ${categoryClass}">${category}</h3>`;

                categories[category].forEach((challenge, index) => {
                    const isSolved = solvedChallenges.includes(parseInt(challenge.challenge_id));
                    const difficultyBadge = getDifficultyBadge(challenge.difficulty); // Get difficulty badge
                    const solvedCount = challenge.solved_count || 0; // Number of users who solved this challenge

                    categoryHtml += `
                        <div class="panel panel-default ${isSolved ? 'solved' : ''}" 
                             style="${isSolved ? 'opacity: 0.7; pointer-events: none;' : ''}">
                            <div class="panel-heading">
                                <a ${isSolved ? 'style="pointer-events: none;"' : ''} 
                                   data-toggle="collapse" href="#collapse${category.replace(/\s+/g, '') + index}">
                                    <div class="panel-title">
                                        <h4>
                                            ${challenge.title}
                                            ${difficultyBadge} <!-- Difficulty Badge -->
                                            ${isSolved ? '<span class="badge badge-success ml-2">Solved</span>' : ''}
                                            <p style="float:right">
   <span class="badge mr-3" style="background-color: #d0e8ff; color: #004085; font-weight: bold; padding: 2px 6px; font-size: 12px; border-radius: 5px;">
    ${solvedCount} Solved
</span>
 <!-- Moved before points -->
    ${challenge.points} points
</p>
                                        </h4>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse${category.replace(/\s+/g, '') + index}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>${challenge.description}</p>
                                    <br>
                                    <div class="row justify-content-between">
                                        <div class="col-xl-4 align-self-center">
                                             <a href="${challenge.file}" target="_blank" rel="noopener noreferrer"
                                               class="btn btn-shadow text-mono btn-outline-success" 
                                               style="width:100%" ${isSolved ? 'disabled' : ''}>
                                                <span class="fa fa-download mr-2"></span>Download challenge
                                            </a>
                                        </div>
                                        <div class="col-xl-4 align-self-center">
                                            <button class="btn btn-outline-warning btn-shadow w-100" 
        data-toggle="modal" data-target="#hint-${category.replace(/\s+/g, '-')}-${index}" 
        ${isSolved ? 'disabled' : ''}>
    <i class="far fa-lightbulb mr-2"></i>Get Hint
</button>

                                        </div>
                                         <div class="col-xl-4 align-self-center">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="flag${category.replace(/\s+/g, '') + index}" 
                                                       placeholder="Enter Flag" aria-label="Enter Flag" 
                                                       ${isSolved ? 'disabled' : ''}>
                                                <div class="input-group-append">
                                                   <button class="btn btn-outline-success" 
        onclick="submitFlag(${challenge.challenge_id}, 'flag${category.replace(/\s+/g, '') + index}')">GO!</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="modal fade" id="hint-${category.replace(/\s+/g, '-')}-${index}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">${challenge.hint}</div>
        </div>
    </div>
</div>
`;
                });

                categoryHtml += `</div>`; // Close category container
                accordion.innerHTML += categoryHtml;
            });
        });
});





function submitFlag(challengeId, flagId) {
    let flagInputElement = document.getElementById(flagId);

    if (!flagInputElement) {
        console.error("Error: Flag input field not found with ID:", flagId);
        alert("Error: Flag input field not found!");
        return;
    }

    let flagInput = flagInputElement.value;

    fetch("functions/submit_flag.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `challenge_id=${challengeId}&flag=${encodeURIComponent(flagInput)}`
    })
    .then(response => response.json())
    .then(result => {
        let alertContainer = document.getElementById("alert-container");

        let alertBox = document.createElement("div");
        alertBox.className = `alert ${result.success ? "alert-success" : "alert-danger"} alert-dismissible fade show`;
        alertBox.role = "alert";
        alertBox.innerHTML = `
            ${result.message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        `;

        alertContainer.innerHTML = ""; // Clear previous alerts
        alertContainer.appendChild(alertBox);

        setTimeout(() => {
            alertBox.remove(); 
            if (result.success) {
                location.reload(); // Refresh the page if submission is successful
            }
        }, 3000); // Auto-remove alert and reload after 3s
    });
}


    </script>
    <script src="assets/js/particles.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/sessionCheck.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
   <script src="assets/js/profile2.js"></script>
</body>
</html>