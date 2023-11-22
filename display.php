<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display User Information</title>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <style>

        .permission-button {
            background-color: #e44d26; 
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .permission-button:hover {
            background-color: #d1401d; 
        }
    </style>
</head>
<body>
    <div id="scanner-container" class="hidden">
        <video id="scanner" width="100%"></video>
    </div>

    <form id="userIdForm" action="" method="post">
        <input type="text" id="scannedUserId" class="hidden" name="userId" readonly> 
    </form>

    <button id="requestPermission" class="permission-button" onclick="requestCameraPermission()">Allow Camera</button>

    <script>
        function requestCameraPermission() {
            const requestButton = document.getElementById('requestPermission');
            const scannerContainer = document.getElementById('scanner-container');
            const scanner = new Instascan.Scanner({ video: document.getElementById('scanner') });

            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scannerContainer.classList.remove('hidden');
                    requestButton.classList.add('hidden');
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });

            scanner.addListener('scan', function (content) {
                document.getElementById('scannedUserId').value = content;
                scanner.stop();
                scannerContainer.classList.add('hidden');
                submitForm();
            });
        }

        function submitForm() {
            const userId = document.getElementById('scannedUserId').value;
            if (userId.trim() !== '') {
                document.getElementById('userIdForm').submit();
            }
        }
    </script>
</body>
</html>

<?php
?>


<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo "<div class='user-info'>";
        echo "<h2>User Information</h2>";
        echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
        echo "<p><strong>Phone:</strong> " . $row["phone"] . "</p>";
        echo "<p><strong>Date Joined:</strong> " . $row["date_joined"] . "</p>";
        echo "<p><strong>Expiration Date:</strong> " . $row["expiration_date"] . "</p>";

        echo "<div class='user-image'>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($row["image_data"]) . "' alt='User Image'>";
        echo "</div>";

        $currentDate = date("Y-m-d");
        if ($currentDate > $row["expiration_date"]) {
            echo "<p class='expired'><strong>User is expired!</strong></p>";
        } else {
            echo "<p class='not-expired'><strong>User is not expired.</strong></p>";
        }

        echo "</div>";
    } else {
        echo "<p class='not-found'>Member not found.</p>";
    }

    $stmt->close();
}
?>