<?php
session_start();
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


//Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


function send_password_reset($stored_mail,$user_otp){
      
    // Create and send an email with the Password Reset otp
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'fashionurself10@gmail.com'; // Your email address
    $mail->Password = 'dvjyofifykcgzysc'; // Your email password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('fashionurself10@gmail.com', 'Fashion Urself');
    $mail->addAddress($stored_mail);
    $mail->isHTML(true);
    $mail->Subject = 'Fasion Urself Password Reset Link';
    $email_template = '
        <h2>Hello User ^_^</h2>
        </br>
        <h3>HERE IS YOUR OTP FOR PASSWORD RESET:</h3>'.$user_otp;
    $mail->Body = $email_template;
    if (!$mail->send()) {
        echo '<script type="text/javascript">';
        echo 'alert("Email could not be sent. Please try again later.");'; 
        echo '</script>';
        // echo "Email could not be sent. Please try again later. Error: " . $mail->ErrorInfo;
    } 
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['entered_reset_mail'])){ //check whether data entered in the field or not
        $entered_mail=$_POST['entered_reset_mail'];
        $entered_mail = mysqli_real_escape_string($conn, $entered_mail);
        $sql="SELECT eMail from USERS where eMail='$entered_mail' LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        //now checking whether the mail(user) exists in the database or not
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $stored_mail = $row['eMail'];
                if (($entered_mail == $stored_mail)) {//if user exists
                    $user_otp = rand(100000, 999999); //Generates random number
                    send_password_reset($stored_mail,$user_otp);//calling function to send mail
                    $_SESSION['mail']=$stored_mail; //storing in sessions for further usage
                    $_SESSION['user_otp1'] = $user_otp; //storing in sessions for further usage
                    $_SESSION['status']="We have sent mail to </br> $stored_mail"; //storing in sessions for further usage
                    session_write_close(); // Close the session for writing
                    header("Location:password_reset.php");
                    exit(0);
                } 
            } else {//if not exists
                $_SESSION['status']="Email not found, please enter a valid email"; //storing in sessions for further usage
                session_write_close(); // Close the session for writing
                header("Location:password_reset.php");
                exit(0);

            }
        } else {
            echo "Database error: " . mysqli_error($conn);
        }
    }

}

// Close the database connection
$conn->close();
?>