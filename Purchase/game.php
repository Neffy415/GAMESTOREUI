<?php
// Database credentials
$host = 'localhost';
$db = 'store';
$user = 'root';
$pass = '';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$cardno = $_POST['cardno'];
$cardname = $_POST['cardname'];
$expiration = $_POST['expiration'];
$cvv = $_POST['cvv'];
$code = $_POST['gamecode'];

// SQL to insert data using prepared statement
$sql = "INSERT INTO pay (Name, Card_No, Card_Name, Expiration, cvv, gamecode) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $cardno, $cardname, $expiration, $cvv, $code);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
