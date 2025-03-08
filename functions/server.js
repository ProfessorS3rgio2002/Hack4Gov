require('dotenv').config();
const WebSocket = require('ws');
const mysql = require('mysql2');

const wss = new WebSocket.Server({ port: 3001 });

// Database Connection
const db = mysql.createConnection({
    host: process.env.DB_HOST || "localhost",
    user: process.env.DB_USER || "root",
    password: process.env.DB_PASS || "",
    database: process.env.DB_NAME || "ctf"
});

db.connect(err => {
    if (err) {
        console.error("Database Connection Failed:", err);
    } else {
        console.log("Connected to Database");
    }
});

wss.on('connection', ws => {
    console.log("New user connected");

    ws.on('message', message => {
        try {
            let data = JSON.parse(message);

            if (data.type === 'typing') {
                // Broadcast typing event to all clients
                wss.clients.forEach(client => {
                    if (client.readyState === WebSocket.OPEN && client !== ws) {
                        client.send(JSON.stringify(data));
                    }
                });
            } else if (data.user_id && data.message) {
                // Insert message into database
                let query = "INSERT INTO messages (user_id, message, timestamp) VALUES (?, ?, ?)";
                db.query(query, [data.user_id, data.message, new Date(data.timestamp)], (err, result) => {
                    if (err) {
                        console.error("Database Error:", err);
                    }
                });

                // Broadcast message to all clients
                wss.clients.forEach(client => {
                    if (client.readyState === WebSocket.OPEN) {
                        client.send(JSON.stringify(data));
                    }
                });
            }
        } catch (error) {
            console.error("Invalid JSON received:", error);
        }
    });

    ws.on('close', () => {
        console.log("User disconnected");
    });
});

console.log("WebSocket server running on ws://localhost:3001");