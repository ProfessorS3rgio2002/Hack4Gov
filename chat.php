<?php include "functions/session_check.php";
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chat</title>
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
    <link rel="stylesheet" href="assets/css/chat.css">
    <script src="assets/js/verify.js"></script>
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
                      <a href="#" class="p-3 text-decoration-none text-light">Chat</a>
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
  
    <h1 class="display-3" style="text-align: center"><b>WELCOME!<span class="vim-caret">͏͏&nbsp;</span></b></h1>
    <div class="lead mb-3 text-mono text-success"style="text-align: center">
        Are you ready for Hack4Gov 2025?
    </div>

    <!-- Chat Container -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Chat Room
            </div>
            <div class="card-body" id="chat-box" style="height: 300px; overflow-y: scroll;">
                <!-- Messages will be displayed here -->
            </div>
            <div class="card-footer">
                <div class="input-group">
                    <input type="text" id="message-input" class="form-control" placeholder="Type a message...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="send-button">Send</button>
                    </div>
                </div>
                <div id="typing-indicator" class="text-muted" style="display: none;">Someone is typing...</div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="assets/js/particles.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/profile2.js"></script>
    <script>
        const user_id = <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'null'; ?>;
        const username = "<?php echo $_SESSION['username']; ?>";
        const role = "<?php echo $_SESSION['role']; ?>"; 
        const rank = "<?php echo isset($_SESSION['rank']) ? $_SESSION['rank'] : 'Unknown'; ?>"; // Handle undefined rank

        const ws = new WebSocket('ws://localhost:3001');

        ws.onopen = function() {
            console.log("Connected to WebSocket Server");
        };

        ws.onmessage = function(event) {
            const messageData = JSON.parse(event.data);
            const chatBox = document.getElementById('chat-box');
            const isSentByUser = messageData.username === username;

            if (messageData.type === 'typing') {
                const typingIndicator = document.getElementById('typing-indicator');
                typingIndicator.style.display = 'block';
                setTimeout(() => {
                    typingIndicator.style.display = 'none';
                }, 1000);
            } else {
                chatBox.innerHTML += formatMessage(messageData, isSentByUser);
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        };

        document.getElementById('send-button').addEventListener('click', sendMessage);
        document.getElementById('message-input').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                sendMessage();
            } else {
                ws.send(JSON.stringify({ type: 'typing', username: username }));
            }
        });

        function sendMessage() {
            const messageInput = document.getElementById('message-input');
            const message = messageInput.value.trim();

            if (message !== '') {
                const messageData = {
                    user_id: user_id,
                    username: username,
                    role: role,
                    rank: rank,
                    message: message,
                    timestamp: Date.now()
                };

                ws.send(JSON.stringify(messageData));
                messageInput.value = '';
            }
        }

        function getBadge(role) {
            switch(role) {
                case "admin": return `<span class="badge admin">Admin</span>`;
                case "moderator": return `<span class="badge mod">Moderator</span>`;
                default: return ''; // Return an empty string for regular users
            }
        }

        function getRankIcon(rank) {
            switch(rank) {
                case "Newbie":
                    return `<i class="fas fa-user text-muted" style="color:#D3D3D3;"></i>`;
                case "Script Kiddie":
                    return `<i class="fas fa-code" style="color:#17b06b;"></i>`;
                case "Wannabe Hacker":
                    return `<i class="fas fa-terminal" style="color:#1E90FF;"></i>`;
                case "Anonymous":
                    return `<i class="fas fa-user-secret" style="color:#FF0000;"></i>`;
                default:
                    return `<i class="fas fa-user text-muted" style="color:#D3D3D3;"></i>`;
            }
        }

        function formatMessage(data, isSentByUser) {
            const badge = getBadge(data.role);
            const rankIcon = `<i class="rank-icon">${getRankIcon(data.rank)}</i>`;
            const messageClass = isSentByUser ? 'sent' : 'received';

            return `
                <div class="message-card ${messageClass}">
                    <div class="message-header">
                        ${badge} <strong>${data.username}</strong> ${rankIcon}
                    </div>
                    <div class="message-body">
                        ${data.message}
                    </div>
                    <span class="timestamp">${formatTimestamp(data.timestamp)}</span>
                </div>
            `;
        }

        function formatTimestamp(timestamp) {
            const date = new Date(timestamp);
            return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }

        document.addEventListener("DOMContentLoaded", function() {
            fetchChatHistory(); // Load messages from the database
        });

        function fetchChatHistory() {
            fetch('functions/get_messages.php')
                .then(response => response.json())
                .then(messages => {
                    const chatBox = document.getElementById('chat-box');
                    chatBox.innerHTML = ""; // Clear chat box before inserting messages

                    messages.forEach(messageData => {
                        const isSentByUser = messageData.username === username;
                        chatBox.innerHTML += formatMessage(messageData, isSentByUser);
                    });

                    chatBox.scrollTop = chatBox.scrollHeight; // Scroll to the latest message
                })
                .catch(error => console.error('Error fetching chat history:', error));
        }
    </script>
  </body>
</html>