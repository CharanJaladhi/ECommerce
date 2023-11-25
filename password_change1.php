<?php
session_start();

// Database connection parameters
$servername = "localhost:3306";
$username = "root";
$password = "charan@462";
$dbname = "EcommerceWebsite";

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['confirmPassword']) && isset($_POST['confirmRePassword'])){
        $confirmPassword = $_POST['confirmPassword'];
        $confirmRePassword = $_POST['confirmRePassword'];
        $email=$_SESSION['mail'];
        $sql = "UPDATE USERS
                SET userPassword = '$confirmPassword', reEnterUserPassword = '$confirmRePassword'
                WHERE eMail = '$email'";
        
        if ($conn->query($sql) === TRUE) {
           echo '<script type="text/javascript">';
            echo 'alert("Password Updated Successfully!");';
            echo 'window.location.href = "login.php";'; // Redirect to home page
            echo '</script>';
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
session_destroy();

?>