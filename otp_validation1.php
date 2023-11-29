<?php
// Start the session
session_start();

// Database Connection
$servername = "localhost";
$username = "id21575166_root";
$password = "Charan@462";
$dbname = "id21575166_ecommercewebsite";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Handle OTP validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION["email"]) && isset($_SESSION["user_otp"]) && isset($_POST["entered_otp"])) {//checking whether the session("email") is set and whether 
                                                                                            // the user entered otp or not at the time of signing up for the first time
        $name=$_SESSION['name'];
        $email = $_SESSION["email"];
        $password=$_SESSION['password'];
        $rePassword=$_SESSION['rePassword'];
        $user_otp = $_SESSION["user_otp"];
        $entered_otp = $_POST["entered_otp"];
        if ($entered_otp == $user_otp) {
            // If OTP is valid, inserting the data into table
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $hashedRePassword = password_hash($rePassword, PASSWORD_DEFAULT);
            $sql = "INSERT INTO USERS (userName, eMail, userPassword, reEnterUserPassword, otp) VALUES ('$name', '$email', '$hashedPassword', '$hashedRePassword', $user_otp)";
            if ($conn->query($sql) === TRUE) {
                // Redirect to login page after successful signup
                echo '<script type="text/javascript">';
                echo 'alert("Succesfully registered!");';
                echo 'window.location.href = "login.php";'; 
                echo '</script>';
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            session_destroy();
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid OTP. Please try again.");';
            echo 'window.location.href = "signup.php";'; // If OTP is not valid redirecting to otp_validation page to re-enter
            echo '</script>';
            session_destroy();
        }
    } 
    else if (isset($_SESSION["user_otp1"]) && isset($_POST["entered_otp1"]) && isset($_SESSION["mail"])) {//checking whether the session("email") is set and whether 
                                                                            // the user entered otp or not at the time of signing up for the first time
        $user_otp = $_SESSION["user_otp1"];
        $entered_otp = $_POST["entered_otp1"];
        if ($entered_otp == $user_otp) {
            // If OTP is valid, redirecting to the file password_change.php
            echo '<script type="text/javascript">';
            echo 'alert("OTP Verified Successfully!");';
            echo 'window.location.href = "password_change.php";'; 
            echo '</script>';
            exit;
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid OTP. Please try again.");';
            echo 'window.location.href = "password_reset.php";'; // If OTP is not valid redirecting to otp_validation page to re-enter
            echo '</script>';
    }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("User not found or OTP expired.");';
        echo 'window.history.back();'; // If the session is not set or otp is not entered then Redirecting to signup page
        echo '</script>';
    }
}


// Close the database connection
$conn->close();

// Destroy the session to clean up session variables

?>
