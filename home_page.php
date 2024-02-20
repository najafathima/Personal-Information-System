<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "personal_information";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT username, fullname, city FROM details";
$result = $conn->query($sql);

if ($result === FALSE) {
    die("Error executing the query: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Page</title>
    <link rel="stylesheet" href="home_page.css">
    <style>
        .user-details {
            width: 700px;
            display: none; /* Hide details by default */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: aqua;
        }
    </style>

</head>
<body>

<nav class="top">
        <a class="top-logo" href="#">
            <img src="logo.jpg" height="40px" width="40px">
        </a>

        <div class="search-container">
            <input type="text" class="search-input" placeholder="Search...">
            <button class="search-icon" type="button">
                <img src="magnify.png" alt="Search">
            </button>
            <button class="login-button">Login</button>
        </div>

    </nav>

    <div class="left">
        
        <div class="left-icon icon-home">
            <img src="home.png" height="25px" width="25px">
        </div>
        <div class="left-icon icon-settings">
            <img src="profile.png" height="25px" width="25px"> 
        </div>
        <div class="left-icon icon-profile">
            <img src="pin.png" height="25px" width="25px">
        </div>
        <div class="left-icon icon-profile">
            <img src="profile.png" height="25px" width="25px">
        </div>
        <div class="left-icon icon-profile">
            <img src="contact-mail.png" height="25px" width="25px">
        </div>
        <div class="left-icon icon-profile">
            <img src="settings.png" height="25px" width="25px">
        </div>
    </div>

    <button class="add-button" onclick="redirectToLogin()"> Add</button>


    <div class="result-container" >

        <?php
        if ($result->num_rows > 0) {
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                if ($count % 3 == 0) {
                    echo '<div class="clearfix"></div>';
                }
                echo '<div class="user-box" onclick="showDetails(\''. $row['username'] .'\')">';
                echo '<p>Username: ' . $row['username'] . '</p>';
                echo '<p>Fullname: ' . $row['fullname'] . '</p>';
                echo '<p>City: ' . $row['city'] . '</p>';
                echo '</div>';
                $count++;
            }
        } 

        ?>

    </div>


    <div id="details-container" class="user-details"></div>

    

    <?php $conn->close(); ?>
    
    <script>
        function showDetails(username) {
            // Redirect to details_page with the selected username
            window.location.href = 'details_page.php?username=' + username;
        }

        function deleteUser(username) {
            // Confirm deletion
            if (confirm("Are you sure you want to delete this user?")) {
                // Redirect to delete_user.php with the selected username
                window.location.href = 'delete_user.php?username=' + username;
            }
        }

        function redirectToLogin() {
            // Redirect to details_page with the selected username
            window.location.href = 'login_page.html';
        }
    </script>
    
</body>
</html>
