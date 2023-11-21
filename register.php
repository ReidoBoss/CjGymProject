<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $dateJoined = date("Y-m-d");
    $expirationDate = date('Y-m-d', strtotime($dateJoined . ' +1 month'));

    $imageData = file_get_contents($_FILES["image"]["tmp_name"]);

    $stmt = $conn->prepare("INSERT INTO users (name, phone, email, date_joined, expiration_date, image_data) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssb", $name, $phone, $email, $dateJoined, $expirationDate, $imageData);
    $stmt->send_long_data(5, $imageData); 
    $stmt->execute();
    $stmt->close();

    include 'send_email.php'; 
    sendWelcomeEmail($email, $name, $expirationDate);
    

    

}
?>
