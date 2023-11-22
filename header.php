<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Gym Name</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #121212; 
            color: #fff; 
            padding-top: 80px; 
        }

        header {
            background-color: #1e1e1e;
            padding: 15px;
            color: #e44d26; 
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000; 
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #1e1e1e; 
            padding: 10px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #e44d26; 
        }

        @media (max-width: 1080px) {
            nav {
                flex-direction: column;
                align-items: center;
            }

            nav a {
                margin: 5px 0;
            }

            header {
                position: static; 
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Your Gym Name</h1>
    <p>Get Fit, Stay Fit!</p>
    <nav>
    <a href="index.php">Home</a>
    <a href="display.php">Display</a>
    <a href="#">Schedule</a>
    <a href="#">Contact</a>
</nav>
</header>


