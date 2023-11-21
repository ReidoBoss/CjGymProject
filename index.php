<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
</head>
<body>
    <h2>User Information Form</h2>

    <form action="register.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="image">Select Image:</label>
        <input type="file" name="image" accept="image/*" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
