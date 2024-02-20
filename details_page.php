<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 700px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .user-details {
            margin-top: 20px;
        }

        .detail {
            margin-bottom: 10px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }

        p {
            margin: 0;
        }

        .back-btn {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: red;
            font-weight: bold;

        }

    </style>
</head>
<body>
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "personal_information";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_GET['username'])) {
            $username = $_GET['username'];

            // Retrieve detailed information from the database based on the username
            $sql = "SELECT * FROM details WHERE username = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                echo '<h2>Personal Details</h2>';
                echo '<div class="user-details">';
                echo '<div class="detail"><label>Username:</label> <p>' . $row['username'] . '</p></div>';
                echo '<div class="detail"><label>Fullname:</label> <p>' . $row['fullname'] . '</p></div>';
                echo '<div class="detail"><label>Email:</label> <p>' . $row['email'] . '</p></div>';
                echo '<div class="detail"><label>Contact Number:</label> <p>' . $row['contactnumber'] . '</p></div>';
                echo '<div class="detail"><label>Street Address:</label> <p>' . $row['streetaddress'] . '</p></div>';
                echo '<div class="detail"><label>City:</label> <p>' . $row['city'] . '</p></div>';
                echo '<div class="detail"><label>State:</label> <p>' . $row['state'] . '</p></div>';
                echo '</div>';
            } else {
                echo "<p>User details not found for the username: $username</p>";
            }
        } else {
            echo "<p>Username parameter not provided</p>";
        }

        $conn->close();
        ?>
        
     <!--   <button onclick="deleteUser">DELETE USER</button> //-->
    </div>

        



</body>
</html>
