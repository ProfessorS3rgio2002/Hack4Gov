<?php
session_start();
require_once "functions/db.php"; // Database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch user role from database
$user_id = $_SESSION['user_id'];
$query = "SELECT role FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $role = $row['role'];

    // Check if the user is an admin
    if ($role !== 'admin') {
        echo "<script>alert('Access Denied: You are not authorized to view this page.'); window.location.href='home.html';</script>";
        exit();
    }
} else {
    // If user does not exist
    session_destroy();
    header("Location: login.php");
    exit();
}
?>


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
    <link rel="stylesheet" href="assets/css/overlay.css">
    <link rel="stylesheet" href="assets/css/category.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/font-hack/2.020/css/hack.min.css'>
    <link rel="stylesheet" href="assets/css/background.css">
    <script src="assets/js/verify.js"></script>
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

  
    <div class="d-flex justify-content-center mt-3">
        <button id="add-challenge-btn" class="btn btn-outline-success" style="display: none;">
            Add Challenge
        </button>

         <!-- Toggle Challenges Button -->
    <button id="toggle-challenges-btn" class="btn btn-outline-warning ml-3">
        Loading...
    </button>

<!-- Toggle Filter by Date Button -->
    <button id="toggle-filter-by-date-btn" class="btn btn-outline-primary ml-3">
        Loading...
    </button>

</div>
    </div>

    <div id="success-message" class="alert alert-success text-center" style="display: none; position: fixed; top: 10px; right: 10px; z-index: 1050;">
        Challenge added successfully! 🎉
    </div>
    <div id="challenge-overlay" class="overlay">
        <div class="overlay-content card p-3" style="max-width: 400px; margin: auto; border-radius: 8px;">
            <h2 class="text-center text-light" style="font-size: 18px;">Add a New Challenge</h2>
            <form class="needs-validation" novalidate id="challenge-form">
                
                <!-- Row 1: Title & Description -->
                <div class="form-group">
                    <label for="challenge-title">Title</label>
                    <input type="text" class="form-control form-control-sm" id="challenge-title" required>
                    <div class="invalid-feedback">Challenge title is required.</div>
                </div>
                <div class="form-group">
                    <label for="challenge-description">Description</label>
                    <textarea class="form-control form-control-sm" id="challenge-description" rows="2" required></textarea>
                    <div class="invalid-feedback">Challenge description is required.</div>
                </div>
    
                <!-- Row 2: Category, Difficulty & Points -->
                <div class="form-row d-flex">
                    <div class="form-group col pr-1">
                        <label for="challenge-category">Category</label>
                        <select class="form-control form-control-sm" id="challenge-category" required>
                            <option value="">Choose...</option>
                            <option value="1">Cryptography</option>
                            <option value="2">Forensics</option>
                            <option value="3">Reverse Engineering</option>
                            <option value="4">Web Exploitation</option>
                            <option value="5">Steganography</option>
                            <option value="6">OSINT</option>
                        </select>
                        <div class="invalid-feedback">Select a category.</div>
                    </div>
                    <div class="form-group col px-1">
                        <label for="challenge-difficulty">Difficulty</label>
                        <select class="form-control form-control-sm" id="challenge-difficulty" required>
                            <option value="">Choose...</option>
                            <option value="Easy">Easy</option>
                            <option value="Medium">Medium</option>
                            <option value="Hard">Hard</option>
                        </select>
                        <div class="invalid-feedback">Select difficulty.</div>
                    </div>
                    <div class="form-group col pl-1">
                        <label for="challenge-points">Points</label>
                        <input type="number" class="form-control form-control-sm" id="challenge-points" required>
                        <div class="invalid-feedback">Enter points.</div>
                    </div>
                </div>
    
                <!-- Row 3: Flag, Hint & File -->
                <div class="form-row d-flex">
                    <div class="form-group col pr-1">
                        <label for="challenge-flag">Flag</label>
                        <input type="text" class="form-control form-control-sm" id="challenge-flag" required>
                        <div class="invalid-feedback">Enter flag.</div>
                    </div>
                    <div class="form-group col pl-1">
                        <label for="challenge-file">File Link</label>
                        <input type="text" class="form-control form-control-sm" id="challenge-file" required>
                        <div class="invalid-feedback">Enter file link.</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="challenge-hint">Hint</label>
                    <textarea class="form-control form-control-sm" id="challenge-hint" rows="2"></textarea>
                </div>
    
                <!-- Buttons -->
                <div class="form-row d-flex">
                    <div class="col pr-1">
                        <button class="btn btn-success btn-sm btn-block" type="submit">Submit</button>
                    </div>
                    <div class="col pl-1">
                        <button class="btn btn-danger btn-sm btn-block" type="button" id="close-overlay">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editChallengeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Challenge</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="editChallengeForm">
                        <input type="hidden" id="editChallengeId">
    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" id="editChallengeTitle">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" id="editChallengeCategory">
                                        <option value="">Choose...</option>
                                        <option value="1">Cryptography</option>
                                        <option value="2">Forensics</option>
                                        <option value="3">Reverse Engineering</option>
                                        <option value="4">Web Exploitation</option>
                                        <option value="5">Steganography</option>
                                        <option value="6">OSINT</option>
                                    </select>
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="editChallengeDescription" rows="3"></textarea>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Points</label>
                                    <input type="number" class="form-control" id="editChallengePoints">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Difficulty</label>
                                    <select class="form-control" id="editChallengeDifficulty">
                                        <option value="Easy">Easy</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Hard">Hard</option>
                                    </select>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>File Link</label>
                                    <input type="text" class="form-control" id="editChallengeFile">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Flag</label>
                                    <input type="text" class="form-control" id="editChallengeFlag">
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label>Hint</label>
                            <textarea class="form-control" id="editChallengeHint" rows="2"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveChallenge()">Save</button>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Delete Confirmation Modal -->
<div id="deleteConfirmModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger"><i class="fas fa-exclamation-triangle"></i> Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>Are you sure you want to delete this challenge? This action cannot be undone.</p>
                <input type="hidden" id="deleteChallengeId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>








    
    
    
    <div class="container">
        <div id="accordion"></div>
    </div>

    
    
    <script>
    document.addEventListener("DOMContentLoaded", function () {
    fetch("functions/fetch_challenges_admin.php")
        .then(response => response.json())
        .then(data => {
            const accordion = document.getElementById("accordion");

            const solvedChallenges = Array.isArray(data.solved_challenges) 
                ? data.solved_challenges.map(id => parseInt(id)).filter(id => !isNaN(id)) 
                : [];

            let categories = {};

            if (Array.isArray(data.challenges)) {
                data.challenges.forEach(challenge => {
                    if (!categories[challenge.category_name]) {
                        categories[challenge.category_name] = [];
                    }
                    categories[challenge.category_name].push(challenge);
                });
            } else {
                console.error("Error: 'challenges' is not an array", data.challenges);
                return;
            }

            function getDifficultyBadge(difficulty) {
                const badgeColors = {
                    "Easy": "success",
                    "Medium": "warning",
                    "Hard": "danger"
                };
                const colorClass = badgeColors[difficulty] || "secondary";
                return `<span class="badge badge-${colorClass} badge-sm ml-2">${difficulty}</span>`;
            }

            let htmlContent = "";

            Object.keys(categories).forEach(category => {
                let categoryClass = `category-${category.toLowerCase().replace(/\s+/g, '-')}`;
                let categoryHtml = `
                    <div class="category-container">
                        <h3 class="category-title ${categoryClass}">${category}</h3>`;

                categories[category].forEach((challenge, index) => {
                    const isSolved = solvedChallenges.includes(parseInt(challenge.challenge_id));
                    const difficultyBadge = getDifficultyBadge(challenge.difficulty);
                    const solvedCount = challenge.solved_count || 0;
                    const flagId = `flag-${category.replace(/\s+/g, '')}-${index}`;

                    categoryHtml += `
                        <div class="panel panel-default ${isSolved ? 'solved' : ''}" 
                             style="${isSolved ? 'opacity: 0.7; pointer-events: none;' : ''}">
                            <div class="panel-heading">
                                <a ${isSolved ? 'style="pointer-events: none;"' : ''} 
                                   data-toggle="collapse" href="#collapse${category.replace(/\s+/g, '') + index}">
                                    <div class="panel-title">
                                        <h4>
                                            ${challenge.title}
                                            ${difficultyBadge}
                                            ${isSolved ? '<span class="badge badge-success ml-2">Solved</span>' : ''}
                                            <p style="float:right">
                                                <span class="badge mr-3" style="background-color: #d0e8ff; color: #004085; font-weight: bold; padding: 2px 6px; font-size: 12px; border-radius: 5px;">
                                                    ${solvedCount} Solved
                                                </span>
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
                                                <input type="text" class="form-control" id="${flagId}" 
                                                       value="${challenge.flag}" readonly>
                                                <div class="input-group-append">
                                                 <button class="btn btn-sm btn-outline-primary" 
    onclick="editChallenge(${challenge.challenge_id}, 
                           '${challenge.title}', 
                           '${challenge.description}', 
                           '${challenge.points}', 
                           '${challenge.file}', 
                           '${challenge.flag}', 
                           '${challenge.hint ? challenge.hint.replace(/'/g, "\\'") : ''}', 
                           '${challenge.difficulty}',
                           '${challenge.category_id}')">
    <i class="fas fa-edit"></i>
</button>

                                                    <button class="btn btn-sm btn-outline-danger" onclick="deleteChallenge(${challenge.challenge_id})">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
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
                        </div>`;
                });

                categoryHtml += `</div>`;
                htmlContent += categoryHtml;
            });

            accordion.innerHTML = htmlContent;
        })
        .catch(error => console.error("Error fetching challenges:", error));
});

function editChallenge(id, title, description, points, file, flag, hint, difficulty, categoryId) {
    document.getElementById("editChallengeId").value = id;
    document.getElementById("editChallengeTitle").value = title;
    document.getElementById("editChallengeDescription").value = description;
    document.getElementById("editChallengePoints").value = points;
    document.getElementById("editChallengeFile").value = file;
    document.getElementById("editChallengeFlag").value = flag;
    document.getElementById("editChallengeHint").value = hint ?? "";
    document.getElementById("editChallengeDifficulty").value = difficulty;
    document.getElementById("editChallengeCategory").value = categoryId; // Set category selection
    $('#editChallengeModal').modal('show');
}


function saveChallenge() {
    let challengeId = document.getElementById("editChallengeId").value;
    let title = document.getElementById("editChallengeTitle").value;
    let description = document.getElementById("editChallengeDescription").value.replace(/(\r\n|\n|\r)/gm, " "); // Remove line breaks
    let points = document.getElementById("editChallengePoints").value;
    let file = document.getElementById("editChallengeFile").value;
    let flag = document.getElementById("editChallengeFlag").value;
    let hint = document.getElementById("editChallengeHint").value;
    let difficulty = document.getElementById("editChallengeDifficulty").value;
    let categoryId = document.getElementById("editChallengeCategory").value; // Get selected category

    // Form data to send
    let formData = new FormData();
    formData.append("challenge_id", challengeId);
    formData.append("title", title);
    formData.append("description", description);
    formData.append("points", points);
    formData.append("file", file);
    formData.append("flag", flag);
    formData.append("hint", hint);
    formData.append("difficulty", difficulty);
    formData.append("category_id", categoryId); // Add category ID

    // Send the update request using Fetch API
    fetch("functions/update_challenge.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            // Hide the edit modal
            $("#editChallengeModal").modal("hide");

            // Show success message
            $("#success-message").html("Challenge updated successfully! 🎉").fadeIn().delay(2000).fadeOut();

            // Reload page after 1 second
            setTimeout(() => {
                location.reload();
            }, 1000);
        } else {
            // Show error message
            $("#error-message").html("Error: " + data.message).fadeIn().delay(3000).fadeOut();
        }
    })
    .catch(error => console.error("Error:", error));
}





function deleteChallenge(challengeId) {
    // Set the challenge ID in the modal for reference
    document.getElementById("deleteChallengeId").value = challengeId;

    // Show the Bootstrap modal
    $("#deleteConfirmModal").modal("show");
}

document.getElementById("confirmDeleteBtn").addEventListener("click", function() {
    let challengeId = document.getElementById("deleteChallengeId").value;

    fetch("functions/delete_challenge.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `challenge_id=${challengeId}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            // Hide modal
            $("#deleteConfirmModal").modal("hide");

            // Show success message
            let successMessage = document.getElementById("success-message");
            successMessage.innerHTML = "Challenge deleted successfully! 🎉";
            successMessage.style.display = "block";

            // Auto-hide message and refresh the page after 1 second
            setTimeout(() => {
                successMessage.style.display = "none";
                location.reload();
            }, 1000);
        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(error => console.error("Error:", error));
});





    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fetch the current global status of challenges
        fetch("functions/get_global_status.php")
            .then(response => response.json())
            .then(data => {
                const toggleButton = document.getElementById("toggle-challenges-btn");
                if (data.success) {
                    const currentStatus = data.status;
                    toggleButton.textContent = currentStatus === "enabled" ? "Disable All Challenges" : "Enable All Challenges";
                    toggleButton.dataset.status = currentStatus;
                } else {
                    toggleButton.textContent = "Error Loading Status";
                    toggleButton.disabled = true;
                }
            })
            .catch(error => {
                console.error("Error fetching global status:", error);
                const toggleButton = document.getElementById("toggle-challenges-btn");
                toggleButton.textContent = "Error Loading Status";
                toggleButton.disabled = true;
            });

        // Handle the toggle button click
        document.getElementById("toggle-challenges-btn").addEventListener("click", function () {
            const toggleButton = this;
            const currentStatus = toggleButton.dataset.status;
            const newStatus = currentStatus === "enabled" ? "disabled" : "enabled";

            fetch("functions/toggle_global_status.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ status: newStatus }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toggleButton.textContent = newStatus === "enabled" ? "Disable All Challenges" : "Enable All Challenges";
                        toggleButton.dataset.status = newStatus;
                        alert(`Challenges have been ${newStatus}`);
                    } else {
                        alert("Failed to update global status");
                    }
                })
                .catch(error => {
                    console.error("Error toggling global status:", error);
                    alert("An error occurred while updating the status.");
                });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fetch the current filter_by_date status
        fetch("functions/get_global_status.php?setting=filter_by_date")
            .then(response => response.json())
            .then(data => {
                const filterButton = document.getElementById("toggle-filter-by-date-btn");
                if (data.success) {
                    const currentStatus = data.status;
                    filterButton.textContent = currentStatus === "enabled" ? "Disable Date Filter" : "Enable Date Filter";
                    filterButton.dataset.status = currentStatus;
                } else {
                    filterButton.textContent = "Error Loading Status";
                    filterButton.disabled = true;
                }
            })
            .catch(error => {
                console.error("Error fetching filter status:", error);
                const filterButton = document.getElementById("toggle-filter-by-date-btn");
                filterButton.textContent = "Error Loading Status";
                filterButton.disabled = true;
            });

        // Handle the filter by date button click
        document.getElementById("toggle-filter-by-date-btn").addEventListener("click", function () {
            const filterButton = this;
            const currentStatus = filterButton.dataset.status;
            const newStatus = currentStatus === "enabled" ? "disabled" : "enabled";

            fetch("functions/toggle_global_status.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ setting: "filter_by_date", status: newStatus }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        filterButton.textContent = newStatus === "enabled" ? "Disable Date Filter" : "Enable Date Filter";
                        filterButton.dataset.status = newStatus;
                        alert(`Date filter has been ${newStatus}`);
                    } else {
                        alert("Failed to update date filter status");
                    }
                })
                .catch(error => {
                    console.error("Error toggling date filter:", error);
                    alert("An error occurred while updating the date filter.");
                });
        });
    });
</script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="functions/add_challenge.js"></script>
    <script src="assets/js/particles.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="functions/sessionCheck.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
   <script src="assets/js/profile2.js"></script>
</body>
</html>