<?php include "functions/session_check.php"; ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <link rel="icon" type="image/png" href="assets/img/logo.jpg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap4-neon-glow.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/particles.css">
    <link rel="stylesheet" href="assets/css/points.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/font-hack/2.020/css/hack.min.css'>
    <link rel="stylesheet" href="assets/css/overlay.css">
    <link rel="stylesheet" href="assets/css/background.css">
  </head>
  <body>
    <div id="particles-js"></div>
    <div class="navbar-dark text-white">
      <div class="container">
          <nav class="navbar px-0 navbar-expand-lg navbar-dark">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" 
                  aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
                      <!-- <a href="admin.html" class="p-3 text-decoration-none text-light">Admin</a> -->
                  </div>
                  <!-- Added ml-auto to push nav-right to the right side -->
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
  
    <h1 class="display-3" style="text-align: center"><b>WELCOME!<span class="vim-caret">͏͏&nbsp;</span></b></h1>
    <div class="lead mb-3 text-mono text-success"style="text-align: center">
        Are you ready to solve the quests?
    </div>
   
    <!-- Hack4Gov CTF Rules Section -->
<div class="container mt-5">
    <div class="card bg-dark text-white border-success">
        <div class="card-header text-center text-success">
            <h3>Hack4Gov CTF Rules</h3>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush text-light">
                <li class="list-group-item bg-dark border-success">
                    <strong>1. No Flag Sharing:</strong> Do <strong>not</strong> share flags or solutions with others. Violators may have their points reset or face disqualification.
                </li>
                <li class="list-group-item bg-dark border-success">
                    <strong>2. No AI Assistance:</strong> Using AI tools to generate or solve challenges is <strong>strictly prohibited</strong>.
                </li>
                <li class="list-group-item bg-dark border-success">
                    <strong>3. Brute Force Restrictions:</strong> Unless stated, brute-forcing login pages, flags, or inputs is <strong>not allowed</strong>.
                </li>
                <li class="list-group-item bg-dark border-success">
                    <strong>4. Respect the Platform:</strong> Do not attack or exploit the CTF platform itself (e.g., DDoS, SQL injections, account tampering).
                </li>
                <li class="list-group-item bg-dark border-success">
                    <strong>5. Stay Ethical:</strong> Hack4Gov is a learning-focused environment. Any form of cheating will lead to consequences.
                </li>
            </ul>
        </div>
    </div>
</div>


<script src="assets/js/verify.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
    <script src="assets/js/particles.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="functions/add_challenge.js"></script>
    <script src="assets/js/profile2.js"></script>
  </body>

</html>
