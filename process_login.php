<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "personal_information";

$conn = new mysqli("localhost", "root", "", "personal_information");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$checkQuery = "SELECT * FROM login WHERE username='$username'";
$checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows > 0) {
    header("Location: form_page.html");
} else {
    $insertQuery = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
    $conn->query($insertQuery);
    header("Location: form_page.html");
}
$conn->close();
?>
