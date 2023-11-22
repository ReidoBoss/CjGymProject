<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CJ Fitness Gym - User Information Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212; 
            color: #fff; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #1e1e1e; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            width: 80%; 
            text-align: center;
        }

        h2 {
            color: #e44d26; 
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #ddd;
        }

        input {
            width: 50%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #555; 
            border-radius: 4px;
            box-sizing: border-box;
            color: #fefefe; 
            background-color: #333; 
        }

        input[type="submit"] {
            background-color: #e44d26;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #d1401d; 
        }

        img {
            max-width: 10%; 
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <form action="register.php" method="post" enctype="multipart/form-data">
    <br>    <br>    
    <br>        <br>    
    <br>    

    
    <img src="assets/logo.png" alt="CJ Fitness Gym Logo">
        <h2>CJ Fitness Gym - User Information Form</h2>

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="image">Select Image:</label>
        <input type="file" name="image" accept="image/*" required>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
