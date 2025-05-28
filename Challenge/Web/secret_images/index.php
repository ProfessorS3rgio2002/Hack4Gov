<?php
// filepath: c:\xampp\htdocs\testing\Hack4Gov\Challenge\Web\secret_images\index.php

$criminals = [
    [
        "name" => "Choox",
        "description" => "Wanted for illegal game streaming.",
        "image" => "images/choox.jpg"
    ],
    [
        "name" => "Daniel",
        "description" => "Suspected of multiple fraud cases.",
        "image" => "images/daniel.jpg"
    ],
    [
        "name" => "Dogie",
        "description" => "Involved in smuggling operations.",
        "image" => "images/dogie.jpg"
    ],
    [
        "name" => "James",
        "description" => "Wanted for cybercrimes.",
        "image" => "images/james.jpg"
    ],
    [
        "name" => "Malupiton",
        "description" => "Known for high-profile heists.",
        "image" => "images/malupiton.jpg"
    ],
    [
        "name" => "Renejay",
        "description" => "Suspected of hacking activities.",
        "image" => "images/renejay.jpg"
    ],
    [
        "name" => "Robin",
        "description" => "Identity unknown. Investigate further.",
        "image" => "images/robin.jpg" // This image contains the hidden flag in metadata
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Database</title>
    <link rel="stylesheet" href="main.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .criminal-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 10px;
        }
        .criminal-card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .criminal-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .criminal-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .criminal-card h2 {
            margin: 10px 0;
            font-size: 1.5rem;
            color: #333;
        }
        .criminal-card p {
            font-size: 1rem;
            color: #666;
        }
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            .criminal-card h2 {
                font-size: 1.2rem;
            }
            .criminal-card p {
                font-size: 0.9rem;
            }
        }
       
    </style>
</head>
<body>
    <div class="container">
        <h1>Criminal Database</h1>
        <div class="criminal-list">
            <?php foreach ($criminals as $criminal): ?>
                <div class="criminal-card">
                    <img src="<?php echo $criminal['image']; ?>" alt="<?php echo $criminal['name']; ?>">
                    <h2><?php echo $criminal['name']; ?></h2>
                    <p><?php echo $criminal['description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    
    <img src="images/hack4gov.jpg"  class="background-image">
</body>
</html>