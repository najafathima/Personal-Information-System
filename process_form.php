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
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$contactnumber = $_POST['contactnumber'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$streetaddress = $_POST['streetaddress'];
$city = $_POST['city'];
$state = $_POST['state'];

$sql = "INSERT INTO details (username, fullname, email, contactnumber, birthdate, gender, streetaddress, city, state)
        VALUES ('$username', '$fullname', '$email', '$contactnumber', '$birthdate', '$gender', '$streetaddress', '$city', '$state')";

if ($conn->query($sql) === TRUE) {

    header("Location: home_page.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
