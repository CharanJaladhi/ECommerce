<?php
session_start();

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['confirmPassword']) && isset($_POST['confirmRePassword'])){
        $confirmPassword = $_POST['confirmPassword'];
        $confirmRePassword = $_POST['confirmRePassword'];
        $hashedPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
        $hashedRePassword = password_hash($confirmRePassword, PASSWORD_DEFAULT);
        $email=$_SESSION['mail'];
        $sql = "UPDATE USERS
                SET userPassword = '$hashedPassword', reEnterUserPassword = '$hashedRePassword'
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
