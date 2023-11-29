<?php
session_start();

// Check if the user is already logged in, redirect to home.php if so
if (isset($_SESSION['userName'])) {
    header("Location: home.html");
    exit;
}

// Database connection parameters
$servername = "localhost";
$username = "id21575166_root";
$password = "Charan@462";
$dbname = "id21575166_ecommercewebsite";

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize user input (prevent SQL injection)
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if the user exists in the database
    $sql = "SELECT * FROM USERS WHERE userName = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['userPassword'];

            // Verify the password using password_verify
            if (password_verify($password, $stored_password)) {
                // Authentication successful
                $_SESSION['userName'] = $row['userName'];
                $_SESSION['userMail'] = $row['eMail'];

                echo '<script type="text/javascript">';
                echo 'alert("Successfully logged in!");';
                echo 'window.location.href = "home.php";';
                echo '</script>';
                exit();
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Invalid Password!");';
                echo 'window.history.back();'; // Redirect to another_page
                echo '</script>';
                exit;
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("User Not Found!");';
            echo 'window.history.back();'; // Redirect to another_page
            echo '</script>';
            exit;
        }
    } else {
        echo "Database error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
