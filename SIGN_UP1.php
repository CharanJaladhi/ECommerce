<?php
session_start();
//Check if the user is already logged in, redirect to home.php if so
if (isset($_SESSION['userName'])) {
    echo '<script type="text/javascript">';
    echo 'alert("You need to logout before you want to register!");';
    echo 'window.history.back();'; // Redirect to another_page
    echo '</script>';
   exit;
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "charan@462";
$dbname = "EcommerceWebsite";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Step 3: Handle user signup and OTP email sending
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["username"]) && isset($_POST["reEnterPassword"])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rePassword = $_POST['reEnterPassword'];
        $user_otp = rand(100000, 999999); // Generate a 6-digit OTP

        $sql = "SELECT * FROM USERS WHERE eMail = '$email'";
        $sql1 = "SELECT * FROM USERS WHERE userName = '$name'";
        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_query($conn, $sql1);
        if ($result || $result1) {
            if (mysqli_num_rows($result1) == 1) {
                echo '<script type="text/javascript">';
                echo 'alert("User name already taken!");';
                echo 'window.history.back();'; // Redirect to another_page
                echo '</script>';
                exit;
            } 
            else if (mysqli_num_rows($result) == 1) {
                echo '<script type="text/javascript">';
                echo 'alert("Mail already Registered!");';
                echo 'window.history.back();'; // Redirect to another_page
                echo '</script>';
                exit;
            }
            else {
                // Create and send an email with the OTP
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Your SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'fashionurself10@gmail.com'; // Your email address
                $mail->Password = 'dvjyofifykcgzysc'; // Your email password
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('fashionurself10@gmail.com', 'Fashion Urself');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Fasion Urself Verification Code : ' . $user_otp;
                $mail->Body = 'FASHION URSELF WELCOMES YOU ^_^ .
                            Elevate your style with Fashion Urself.
                            Discover quality fashion, shop hassle-free, and stay in the fashion loop. 
                            Connect with us for the latest trends and personalized service. HERE IS YOUR OTP: ' . $user_otp;

                if (!$mail->send()) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Email could not be sent. Please try again later.");'; 
                    echo '</script>';
                // echo "Email could not be sent. Please try again later. Error: " . $mail->ErrorInfo;
                } else {
                    // Store email and user_otp in sessions
                    //session_start();
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['rePassword'] = $rePassword;
                    $_SESSION['user_otp'] = $user_otp;
                    session_write_close(); // Close the session for writing
                    // Redirect to OTP validation page
                    header('Location: otp_validation.php');
                    exit;
                }
            }
        } 
        else{
            echo "Database error: " . mysqli_error($conn);
        }   
    }
}

// Close the database connection
$conn->close();
?>