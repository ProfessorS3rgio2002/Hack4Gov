<?php include "functions/session_check.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Leaderboard</title>
    <link rel="icon" type="image/png" href="assets/img/logo.jpg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap4-neon-glow.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/points.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/font-hack/2.020/css/hack.min.css'>
    <link rel="stylesheet" href="assets/css/background.css">
    <link rel="stylesheet" href="assets/css/leaderboard.css">
    
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
    <h1 class="display-2" style="text-align: center">Leaderboard!<span class="vim-caret">͏͏&nbsp;</span></h1>
    <div class="lead mb-3 text-mono text-success" style="text-align: center">
        Where the world gets Ranked!
    </div>
    <div class="jumbotron bg-transparent mb-0 radius-0">
      <div class="container">
          <div class="row">
            <div class="col-xl-6">

            </div>
            <div class="container">
              <div class="leaderboard-table">
                  <table class="table table-hover table-dark">
                      <thead>
                          <tr class="bg-dark">
                              <th>#</th>
                              <th>Username</th>
                              <th>Challenges Solved</th>
                              <th>Points</th>
                          </tr>
                      </thead>
                      <tbody id="leaderboard-body">
                          <!-- Data will be inserted here -->
                      </tbody>
                  </table>
              </div>
          </div>
      
          <script>
        document.addEventListener("DOMContentLoaded", function () {
    fetch("functions/leaderboard.php")
        .then(response => response.json())
        .then(data => {
            let leaderboardBody = document.getElementById("leaderboard-body");
            leaderboardBody.innerHTML = ""; // Clear existing rows

            data.forEach((user, index) => {
                let rankIcon = "";
                if (index === 0) {
                    rankIcon = "🥇"; // Gold
                } else if (index === 1) {
                    rankIcon = "🥈"; // Silver
                } else if (index === 2) {
                    rankIcon = "🥉"; // Bronze
                } else {
                    rankIcon = `<i class="fas fa-code text-cyan"></i>`; // Default user icon
                }

                // Rank badge icons based on user rank
                let userRankIcon = "";
                switch (user.rank) {
                    case "Newbie":
                        userRankIcon = `<i class="fas fa-user text-muted"></i>`;
                        break;
                    case "Script Kiddie":
                        userRankIcon = `<i class="fas fa-code" style="color:#17b06b;"></i>`;
                        break;
                    case "Wannabe Hacker":
                        userRankIcon = `<i class="fas fa-terminal" style="color:#1E90FF;"></i>`;
                        break;
                    case "Anonymous":
                        userRankIcon = `<i class="fas fa-user-secret text-danger"></i>`;
                        break;
                    default:
                        userRankIcon = `<i class="fas fa-user text-muted"></i>`;
                        break;
                }

                let row = `
                    <tr class="${index < 3 ? 'top-rank' : ''}">
                        <th scope="row">${rankIcon} ${index + 1}</th>
                        <td> ${user.username} ${userRankIcon}</td>
                        <td> ${user.challenges_solved}</td>
                        <td><i class="fas fa-trophy text-warning"></i> ${user.total_points}</td>
                    </tr>
                `;
                leaderboardBody.innerHTML += row;
            });
        })
        .catch(error => console.error("Error fetching leaderboard:", error));
});

          </script>
          

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="assets/js/sessionCheck.js"></script>
    <script src="assets/js/profile2.js"></script>
    <script src="assets/js/particles.js"></script>
<script src="assets/js/app.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
